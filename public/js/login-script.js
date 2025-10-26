//password toggle
const password = document.getElementById("password");
const togglePassword = document.getElementById("togglePassword");

togglePassword.addEventListener("click", () => {
  const isPasswordType = password.type === "password";
  password.type = isPasswordType ? "text" : "password";
  togglePassword.classList.toggle("fa-eye-slash", isPasswordType);
  togglePassword.classList.toggle("fa-eye", !isPasswordType);
});

// parent login
const parentToggleBtn = document.getElementById("parentToggleBtn");
const parentLoginWrapper = document.getElementById("parentLoginWrapper");
const closeParentBtn = document.getElementById("closeParentBtn");

parentToggleBtn.addEventListener("click", () => {
  parentLoginWrapper.classList.toggle("active");
  parentToggleBtn.classList.toggle("active");
});

closeParentBtn.addEventListener("click", () => {
  parentLoginWrapper.classList.remove("active");
  parentToggleBtn.classList.remove("active");
});

// auto tab and paste support
function autoTabAndPaste(inputs) {
  inputs.forEach((input, idx) => {
    input.addEventListener("focus", function () {
      this.select();
    });

    input.addEventListener("input", function (e) {
      this.value = this.value.replace(/[^0-9]/g, "");

      if (this.value.length === this.maxLength && idx < inputs.length - 1) {
        inputs[idx + 1].focus();
      }

      checkAndFetchSecurityQuestion();
    });

    input.addEventListener("keydown", function (e) {
      if (e.key === "Backspace" && this.value.length === 0 && idx > 0) {
        e.preventDefault();
        inputs[idx - 1].focus();
        inputs[idx - 1].select();
        setTimeout(checkAndFetchSecurityQuestion, 50);
      }

      if (e.key === "Delete") {
        this.value = "";
        setTimeout(checkAndFetchSecurityQuestion, 50);
      }

      const allowedKeys = [
        "Backspace",
        "Delete",
        "Tab",
        "ArrowLeft",
        "ArrowRight",
        "ArrowUp",
        "ArrowDown",
      ];
      if (!allowedKeys.includes(e.key) && (e.key < "0" || e.key > "9")) {
        if (e.key.length === 1) {
          e.preventDefault();
        }
      }
    });

    input.addEventListener("paste", function (e) {
      e.preventDefault();
      const pasteData = (e.clipboardData || window.clipboardData)
        .getData("text")
        .replace(/\D/g, "");

      if (pasteData.length >= inputs.length) {
        for (let i = 0; i < inputs.length; i++) {
          inputs[i].value = pasteData.charAt(i);
        }
        inputs[inputs.length - 1].focus();
        checkAndFetchSecurityQuestion();
      } else if (pasteData.length > 0) {
        let startIdx = idx;
        for (
          let i = 0;
          i < pasteData.length && startIdx + i < inputs.length;
          i++
        ) {
          inputs[startIdx + i].value = pasteData.charAt(i);
        }
        let lastFilledIdx = Math.min(
          startIdx + pasteData.length,
          inputs.length - 1
        );
        inputs[lastFilledIdx].focus();
        checkAndFetchSecurityQuestion();
      }
    });
  });
}

const idDigits = document.querySelectorAll(".id-number input:not([readonly])");
autoTabAndPaste(Array.from(idDigits));

// fetch security Q
function checkAndFetchSecurityQuestion() {
  const digit2 = document.querySelector('input[name="digit2"]').value;
  const digit3 = document.querySelector('input[name="digit3"]').value;
  const digit5 = document.querySelector('input[name="digit5"]').value;
  const digit6 = document.querySelector('input[name="digit6"]').value;
  const digit7 = document.querySelector('input[name="digit7"]').value;
  const digit8 = document.querySelector('input[name="digit8"]').value;

  const securityAnswerSection = document.getElementById(
    "securityAnswerSection"
  );
  const securityQuestionText = document.getElementById("securityQuestionText");
  const securityAnswerInput = document.getElementById("parent_security_answer");
  const parentLoginBtn = document.querySelector(
    'button[name="parent_authenticate"]'
  );

  let dynamicErrorDiv = document.getElementById("parentDynamicError");
  if (!dynamicErrorDiv) {
    dynamicErrorDiv = document.createElement("div");
    dynamicErrorDiv.id = "parentDynamicError";
    dynamicErrorDiv.className = "error-message";
    dynamicErrorDiv.style.display = "none";
    const idNumberDiv = document.querySelector(".id-number");
    idNumberDiv.parentNode.insertBefore(
      dynamicErrorDiv,
      idNumberDiv.nextSibling
    );
  }

  // Hide the error.message first
  dynamicErrorDiv.textContent = "";
  dynamicErrorDiv.style.display = "none";

  if (digit2 && digit3 && digit5 && digit6 && digit7 && digit8) {
    const parentId =
      "C" + digit2 + digit3 + "-" + digit5 + digit6 + digit7 + digit8;
    //AJAX example
    fetch(
      "/login/security-question?action=get_security_question&parent_id=" +
        encodeURIComponent(parentId)
    )
      .then((response) => response.json())
      .then((data) => {
        if (data.success) {
          // If success show security Q and enable login btn
          securityQuestionText.textContent = data.question;
          securityAnswerSection.classList.add("show");
          parentLoginBtn.disabled = false;

          dynamicErrorDiv.textContent = "";
          dynamicErrorDiv.style.display = "none";
        } else {
          // If fail hides security-section and disable login btn
          dynamicErrorDiv.textContent =
            data.message || "ID number hasn't been registered.";
          dynamicErrorDiv.style.display = "block"

          securityAnswerSection.classList.remove("show");
          securityAnswerInput.value = "";
          securityQuestionText.textContent = "";
          parentLoginBtn.disabled = true;
        }
      })
      .catch((error) => {
        console.error("Error fetching security question:", error);
        dynamicErrorDiv.textContent = "An error occurred. Please try again.";
        dynamicErrorDiv.style.display = "block";

        securityAnswerSection.classList.remove("show");
        securityAnswerInput.value = "";
        securityQuestionText.textContent = "";
        parentLoginBtn.disabled = true;
      });
  } else {
    // If not fill tanan id it will hide security-section
    securityAnswerSection.classList.remove("show");
    dynamicErrorDiv.textContent = "";
    dynamicErrorDiv.style.display = "none";
    securityAnswerInput.value = "";
    securityQuestionText.textContent = "";
    parentLoginBtn.disabled = true;
  }
}

document.addEventListener("DOMContentLoaded", function () {
  checkAndFetchSecurityQuestion();
});

// reCAPTCHA v3
// AJAX example
grecaptcha.ready(function () {
  grecaptcha
    .execute("6Lfod-YrAAAAAJHEWDGLF8ZWhmV40eELvq8prMaL", {
      action: "login",
    })
    .then(function (token) {
      document.getElementById("g-recaptcha-response").value = token;
    });
});

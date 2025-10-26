function autoTabAndPaste(inputs) {
  inputs.forEach((input, idx) => {
    input.addEventListener("input", () => {
      input.value = input.value.replace(/[^0-9]/g, "");
      if (input.value.length === input.maxLength && idx < inputs.length - 1) {
        inputs[idx + 1].focus();
      }
    });
    input.addEventListener("keydown", (e) => {
      if (e.key === "Backspace" && input.value.length === 0 && idx > 0) {
        inputs[idx - 1].focus();
      }
    });
    input.addEventListener("paste", (e) => {
      e.preventDefault();
      const pasteData = (e.clipboardData || window.clipboardData)
        .getData("text")
        .replace(/\D/g, "");
      if (pasteData.length !== inputs.length) return;
      for (let i = 0; i < inputs.length; i++) {
        inputs[i].value = pasteData.charAt(i);
      }
      inputs[inputs.length - 1].focus();
    });
  });
}
const idDigits = document.querySelectorAll(".id-number input:not([readonly])");
autoTabAndPaste(idDigits);
const verifyDigits = document.querySelectorAll(".verification-code input");
autoTabAndPaste(verifyDigits);
const password = document.getElementById("password");
const confirm_password = document.getElementById("confirm_password");
const passwordStrength = document.getElementById("passwordStrength");
const sendCodeBtn = document.getElementById("sendCodeBtn");
const emailInput = document.getElementById("emailInput");
const togglePassword = document.getElementById("togglePassword");
const toggleConfirmPassword = document.getElementById("toggleConfirmPassword");

function checkPasswordStrength(pw) {
  let strength = 0;
  if (pw.length >= 8) strength++;
  if (/[A-Z]/.test(pw)) strength++;
  if (/[0-9]/.test(pw)) strength++;
  if (/[^A-Za-z0-9]/.test(pw)) strength++;
  return strength;
}
password.addEventListener("input", () => {
  let strength = checkPasswordStrength(password.value);
  let text = "",
    color = "";
  if (strength <= 1) {
    text = "Weak";
    color = "red";
  } else if (strength === 2) {
    text = "Normal";
    color = "orange";
  } else {
    text = "Strong";
    color = "green";
  }
  passwordStrength.textContent = " " + text;
  passwordStrength.style.color = color;
});

function toggleVisibility(inputElem, iconElem) {
  if (inputElem.type === "password") {
    inputElem.type = "text";
    iconElem.classList.remove("fa-eye");
    iconElem.classList.add("fa-eye-slash");
  } else {
    inputElem.type = "password";
    iconElem.classList.remove("fa-eye-slash");
    iconElem.classList.add("fa-eye");
  }
}
togglePassword.addEventListener("click", () => {
  toggleVisibility(password, togglePassword);
});
toggleConfirmPassword.addEventListener("click", () => {
  toggleVisibility(confirm_password, toggleConfirmPassword);
});
let cooldownSeconds = 0;
let countdownInterval = null;

function setCooldown(seconds) {
  cooldownSeconds = seconds;
  sendCodeBtn.disabled = true;
  sendCodeBtn.textContent = "Code Sent!";
  setTimeout(() => {
    updateButtonLabel();
    countdownInterval = setInterval(() => {
      cooldownSeconds--;
      updateButtonLabel();
      if (cooldownSeconds <= 0) {
        clearInterval(countdownInterval);
        sendCodeBtn.disabled = false;
        sendCodeBtn.textContent = "Send Code";
      }
    }, 1000);
  }, 1000);
}

function updateButtonLabel() {
  sendCodeBtn.textContent = `Resend (${cooldownSeconds}s)`;
}
sendCodeBtn.addEventListener("click", () => {
  const email = emailInput.value.trim();
  if (!email) {
    alert("Please enter your email first");
    return;
  }
  sendCodeBtn.disabled = true;
  sendCodeBtn.textContent = "Sending...";
  //AJAX example
  fetch("/register/send-code", {
    method: "POST",
    headers: {
      "Content-Type": "application/x-www-form-urlencoded",
    },
    body: new URLSearchParams({
      send_code: "1",
      email: email,
    }),
  })
    .then((res) => res.json())
    .then((data) => {
      if (data.success) {
        setCooldown(300);
      } else {
        alert(data.message);
        sendCodeBtn.disabled = false;
        sendCodeBtn.textContent = "Send Code";
      }
    })
    .catch(() => {
      alert("Failed to send request");
      sendCodeBtn.disabled = false;
      sendCodeBtn.textContent = "Send Code";
    });
});

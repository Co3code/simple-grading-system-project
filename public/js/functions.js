document.getElementById("showPasswords").addEventListener("change", function () {
  const fields = [
    document.getElementById("currentPassword"),
    document.getElementById("newPassword"),
    document.getElementById("confirmPassword"),
  ];

  fields.forEach((field) => {
    field.type = this.checked ? "text" : "password";
  });
});

// Select the password field and button
const passwordField = document.getElementById("password");
const toggleButton = document.getElementById("password-addon");

// Toggle password visibility on button click
toggleButton.addEventListener("click", function () {
    if (passwordField.type === "password") {
        passwordField.type = "text";
        toggleButton.innerHTML = '<i class="ri-eye-off-fill align-middle"></i>'; // Change icon to "eye-off" for hidden
    } else {
        passwordField.type = "password";
        toggleButton.innerHTML = '<i class="ri-eye-fill align-middle"></i>'; // Change icon back to "eye" for visible
    }
});

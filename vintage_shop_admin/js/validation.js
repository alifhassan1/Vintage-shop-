

document.addEventListener("DOMContentLoaded", function () {
    document.getElementById("registerForm").addEventListener("submit", function (event) {
        let isValid = true;

        // Get form elements
        let firstName = document.getElementById("firstname").value.trim();
        let lastName = document.getElementById("lastname").value.trim();
        let username = document.getElementById("username").value.trim();
        let email = document.getElementById("email").value.trim();
        let password = document.getElementById("password").value.trim();
        let confirmPassword = document.getElementById("confirmpassword").value.trim();
        let phone = document.getElementById("phone").value.trim();
        let address = document.getElementById("address").value.trim();
        let gender = document.getElementById("gender").value;

        let errorMessages = [];

        // First Name Validation
        if (firstName === "") {
            errorMessages.push("First name is required.");
        }

        // Last Name Validation
        if (lastName === "") {
            errorMessages.push("Last name is required.");
        }

        // Username Validation
        if (username === "") {
            errorMessages.push("Username is required.");
        }

        // Email Validation
        let emailPattern = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
        if (email === "" || !emailPattern.test(email)) {
            errorMessages.push("Enter a valid email address.");
        }

        // Password Validation
        if (password.length < 6) {
            errorMessages.push("Password must be at least 6 characters.");
        }

        // Confirm Password Validation
        if (password !== confirmPassword) {
            errorMessages.push("Passwords do not match.");
        }

        // Phone Validation
        let phonePattern = /^[0-9]{10}$/;
        if (!phonePattern.test(phone)) {
            errorMessages.push("Enter a valid 10-digit phone number.");
        }

        // Address Validation
        if (address === "") {
            errorMessages.push("Address is required.");
        }

        // Gender Validation
        if (gender === "") {
            errorMessages.push("Please select a gender.");
        }

        // Display errors if any
        let errorContainer = document.getElementById("errorMessages");
        errorContainer.innerHTML = "";
        if (errorMessages.length > 0) {
            event.preventDefault();
            errorMessages.forEach(error => {
                let p = document.createElement("p");
                p.style.color = "red";
                p.textContent = error;
                errorContainer.appendChild(p);
            });
        }
    });
});


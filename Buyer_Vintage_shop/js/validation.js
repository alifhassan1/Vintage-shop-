function validateForm() {
    var firstName = document.forms["registrationForm"]["first_name"].value;
    var lastName = document.forms["registrationForm"]["last_name"].value;
    var email = document.forms["registrationForm"]["email"].value;
    var password = document.forms["registrationForm"]["password"].value;
    var confirmPassword = document.forms["registrationForm"]["confirm_password"].value;
    var phone = document.forms["registrationForm"]["phone"].value;
    var userType = document.forms["registrationForm"]["user_type"].value;

    // First Name and Last Name validation
    if (firstName == "" || lastName == "") {
        alert("First Name and Last Name are required.");
        return false;
    }

    // Email validation
    var emailPattern = /^[a-zA-Z0-9._%+-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,}$/;
    if (!email.match(emailPattern)) {
        alert("Please enter a valid email address.");
        return false;
    }

    // Password validation
    if (password == "") {
        alert("Password is required.");
        return false;
    }

    // Confirm Password validation
    if (confirmPassword == "") {
        alert("Confirm Password is required.");
        return false;
    }

    // Passwords match check
    if (password !== confirmPassword) {
        alert("Passwords do not match.");
        return false;
    }

    // User Type validation
    if (userType == "") {
        alert("Please select a user type.");
        return false;
    }

    // Phone validation (optional, but if entered, should match the pattern)
    if (phone && !/^\d{11}$/.test(phone)) {
        alert("Please enter a valid 11-digit phone number.");
        return false;
    }

    // Return true if all validations pass
    return true;
}

function validatePasswordForm() {
    var password = document.forms["passwordForm"]["password"].value;

    // Password validation
    if (password == "") {
        alert("Password is required to verify your identity.");
        return false;
    }

    return true;
}
function validateProfileForm() {
    // Get form data
    var firstName = document.forms["profileForm"]["first_name"].value;
    var lastName = document.forms["profileForm"]["last_name"].value;
    var email = document.forms["profileForm"]["email"].value;

    // Check if the required fields are empty
    if (firstName == "" || lastName == "" || email == "") {
        alert("Please fill in all required fields.");
        return false;
    }

    // Optionally, add more validation, such as email format validation
    var emailPattern = /^[a-zA-Z0-9._-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,6}$/;
    if (!emailPattern.test(email)) {
        alert("Please enter a valid email address.");
        return false;
    }

    return true; // Allow form submission if all validations pass
}

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sign In</title>
    <link rel="stylesheet" href="../styles/signin.css">
    <style>
        .error {
            color: red;
            font-size: 0.9em;
        }
    </style>
    <script>
        function validateForm() {
            let isValid = true;

            // Clear previous error messages
            document.getElementById("username-error").textContent = "";
            document.getElementById("password-error").textContent = "";

            const username = document.getElementById("username").value.trim();
            const password = document.getElementById("password").value.trim();

            if (username === "") {
                document.getElementById("username-error").textContent = "Username cannot be empty.";
                isValid = false;
            }

            if (password === "") {
                document.getElementById("password-error").textContent = "Password cannot be empty.";
                isValid = false;
            }

            return isValid;
        }
    </script>
</head>
<body>
    <div class="form-container">
        <form method="post" action="../controller/signincheek.php" onsubmit="return validateForm()">
            <label for="username">UserName:</label>
            <input type="text" id="username" name="username" value="" />
            <span id="username-error" class="error"></span>

            <label for="password">Password:</label>
            <input type="password" id="password" name="password" value="" />
            <span id="password-error" class="error"></span>

            <input type="submit" name="submit" value="Submit" />
        </form>
        <div class="signup-link">
            <a href="../view/signup.php">Sign up</a>
        </div>
    </div>
</body>
</html>

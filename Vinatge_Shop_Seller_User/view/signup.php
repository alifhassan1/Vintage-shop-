<html>
<head>
    <title>Signup</title>
</head>

<style>
    body {
        font-family: Arial, sans-serif;
        background-color: #f8f9fa;
        display: flex;
        justify-content: center;
        align-items: center;
        min-height: 100vh;
        margin: 0;
    }

    form {
        background: #ffffff;
        padding: 20px 30px;
        border-radius: 10px;
        box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        width: 400px;
    }

    label {
        display: block;
        font-weight: bold;
        margin-bottom: 5px;
    }

    input[type="text"],
    input[type="email"],
    input[type="password"],
    input[type="number"] {
        width: 100%;
        padding: 8px;
        margin-bottom: 5px;
        border: 1px solid #ddd;
        border-radius: 5px;
        box-sizing: border-box;
    }

    span {
        color: red;
        font-size: 0.9em;
        display: block;
        margin-bottom: 10px;
    }

    input[type="submit"] {
        background: #007bff;
        color: white;
        padding: 10px 15px;
        border: none;
        border-radius: 5px;
        cursor: pointer;
        width: 100%;
    }

    input[type="submit"]:hover {
        background: rgb(179, 98, 0);
    }
</style>

<body>
    <form method="post" action="../controller/signupcheek.php" enctype="">  
        <label for="username">UserName:</label>
        <input type="text" id="username" name="username" value="" /> 
        <span id="usernameError"></span>

        <label for="fullname">Full Name:</label>
        <input type="text" id="fullname" name="fullname" value="" />
        <span id="fullnameError"></span>

        <label for="email">Email:</label>
        <input type="email" id="email" name="email" value="" />
        <span id="emailError"></span>

        <label for="phone">Phone Number:</label>
        <input type="text" id="phone" name="phone" value="" />
        <span id="phoneError"></span>

        <label for="password">Password:</label>
        <input type="password" id="password" name="password" value="" />
        <span id="passwordError"></span>

        <label for="confirmpassword">Confirm Password:</label>
        <input type="password" id="confirmpassword" name="confirmpassword" value="" />
        <span id="confirmpasswordError"></span>

        <label for="companyname">Company Name:</label>
        <input type="text" id="companyname" name="companyname" value="" />
        <span id="companynameError"></span>

        <label for="nidNumber">Nid Number:</label>
        <input type="number" id="nidNumber" name="nidNumber" value=""> 
        <span id="nidNumberError"></span>

        <label for="tinNumber">Tin Number:</label>
        <input type="number" id="tinNumber" name="tinNumber" value="">
        <span id="tinNumberError"></span>

        <input type="submit" name="submit" value="Submit" />
    </form>

    <script>
        document.forms[0].onsubmit = function (event) {
            let valid = true;

            function validateField(fieldId, errorId) {
                const input = document.getElementById(fieldId);
                const errorSpan = document.getElementById(errorId);

                if (input.value.trim() === '') {
                    errorSpan.textContent = 'This field is required';
                    valid = false;
                } else {
                    errorSpan.textContent = '';
                }
            }

            validateField('username', 'usernameError');
            validateField('fullname', 'fullnameError');
            validateField('email', 'emailError');
            validateField('phone', 'phoneError');
            validateField('password', 'passwordError');
            validateField('confirmpassword', 'confirmpasswordError');
            validateField('companyname', 'companynameError');
            validateField('nidNumber', 'nidNumberError');
            validateField('tinNumber', 'tinNumberError');

            if (!valid) {
                event.preventDefault();
            }
        };
    </script>
</body>
</html>

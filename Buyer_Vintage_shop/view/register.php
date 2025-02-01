<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Buyer Registration - Vintage Shop</title>
    <link rel="stylesheet" href="../css/style.css">
    <script src="../js/validation.js" defer></script>
</head>
<body>
    <form name="registrationForm" method="POST" action="../index.php?action=register" onsubmit="return validateForm()">
        <h2>Welcome to Vintage Shop</h2>
        <fieldset>
            <legend>Buyer Registration</legend>
            <table>
                <tr>
                    <td>First Name:</td>
                    <td><input type="text" name="first_name" required></td>
                </tr>
                <tr>
                    <td>Last Name:</td>
                    <td><input type="text" name="last_name" required></td>
                </tr>
                <tr>
                    <td>Email Address:</td>
                    <td><input type="email" name="email" required></td>
                </tr>
                <tr>
                    <td>Password:</td>
                    <td><input type="password" name="password" required></td>
                </tr>
                <tr>
                    <td>Confirm Password:</td>
                    <td><input type="password" name="confirm_password" required></td>
                </tr>
                <tr>
                    <td>Phone Number:</td>
                    <td><input type="tel" name="phone"></td>
                </tr>
                <tr>
                    <td>Address:</td>
                    <td><input type="text" name="address"></td>
                </tr>
                <tr>
                    <td>City:</td>
                    <td><input type="text" name="city"></td>
                </tr>
                <tr>
                    <td>Country:</td>
                    <td><input type="text" name="country"></td>
                </tr>
                <tr>
                    <td>Postal Code:</td>
                    <td><input type="text" name="postal_code"></td>
                </tr>
                <tr>
                    <td>Shipping Address:</td>
                    <td><textarea name="shipping_address" rows="4"></textarea></td>
                </tr>
                <tr>
                    <td>User Type:</td>
                    <td>
                        <input type="radio" name="user_type" value="buyer" required> Buyer
                        <input type="radio" name="user_type" value="seller"> Seller
                        <input type="radio" name="user_type" value="guest"> Guest
                    </td>
                </tr>
            </table>
        </fieldset>
        <input type="submit" value="Sign Up">
        <input type="reset" value="Clear" class="clear-cart-button">
    </form>
</body>
</html>

<?php
session_start();
if(!isset($_SESSION['status1']))
{
    echo "no";
}
?>
<center>
    <table>
        <tr>
            <td>

<h1>Welcome <?= $_SESSION['username'] ?></h1>

<ul>
    <li><a href="userinfo.php">Edit Profile</a></li><br>
    <li><a href="../view/contract.html">Contract</a></li><br><br>
    <li><a href="add_products.php">Add Product</a></li><br><br>
    <li><a href="view_product.php">View Products</a></li><br><br>



    <li><a href="../controller/logout.php">Logout</a></li>
</ul>
</td>
</tr>
</table>
</center>
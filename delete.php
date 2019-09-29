<?php include "layout/header.php";
include "model/product.php";
include "model/category.php";
include "config/database.php";
?>
<?php
$db = new Database();
$connection = $db->create_connection();
$product = new product($connection);
$id = $_REQUEST[id];
$product_del=$product->delete($id);


if ($product_del)
{
    echo"<script> alert ('product successfully deleted')</script>";
    echo"<script> window.location.href = 'index.php' </script>";
}
else
{
    echo"<script> alert ('unable to delete product')</script>";
}

?>
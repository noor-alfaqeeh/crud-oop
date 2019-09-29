<?php include "layout/header.php";
include "model/product.php";
include "model/category.php";
include "config/database.php";
?>
<?php
$db = new Database();
$connection = $db->create_connection();

$category = new category ($connection);
$categories = $category->get_categories();
$product = new product($connection);
//$products=$product->create();
$products=$product->read();

?>



<div class="container">

    <table class='table table-hover mt-4'>
    <tr>
    <th>ID</th>
    <th>Product</th>
    <th>Description</th>
    <th>Price</th>
    <th>Category</th>
    
    <th>Actions</th>
    </tr>
        <?php
    foreach($products as $product) {
        ?>
        <tr>
            <td><?php echo $product[id];?> </td>
            <td><?php echo $product[name];?></td>
            <td> <?php echo $product[description];?></td>
            <td> <?php echo $product[price];?></td>
            <td> <?php echo $product[category_id];?></td>

            <td>
                <a class='btn btn-success' href='edit.php' role='button'>Success</a>
                <a role='button' class='btn btn-danger' href='delete.php?id= <?php echo $product[id]; ?>'>Delete</a>
            </td>
        </tr>
        <?php
    }

        ?>
           </table>

</div>


<?php include "layout/footer.php" ?>

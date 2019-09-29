<?php include "layout/header.php";
include "model/product.php";
include "model/category.php";
include "config/database.php";

?>

<?php
$db =new Database();
$connection =$db->create_connection();

$category = new category ($connection);
$categories = $category->get_categories();
?>

    <div class="container mt-4">

        <form action="<?php $_SERVER ["PHP_SELF"]?> " method ="POST" >
            <div class="form-group">
                <label for="product_name">Product Name</label>
                <input type="text" class="form-control" id="product_name" aria-describedby="product_name" placeholder="product name" name="product_name">

            </div>
            <div class="form-group">
                <label for="price">Price</label>
                <input type="number" class="form-control" id="price" placeholder=" product price" name="product_price">
            </div>
            <div class="form-group">
                <label for="description">Product Description</label>
                <textarea class="form-control" id="description" rows="3" name="description"></textarea>
            </div>


            <select class="custom-select mb-4" name="category_id">
                <option selected>Open this select menu</option>

                    <?php
                    foreach ($categories as $category)
                    {
                        echo "<option value=$category[id]>$category[name]</option>";
                    }
                    ?>

            </select>

            <button type="submit" class="btn btn-primary mb-4" name="submit">Submit</button>
        </form>



    </div>

<?php
if(isset($_POST["submit"]))
{
    $product=new product($connection);
    $product->name=$_POST["product_name"];
    $product->price=$_POST["product_price"];
    $product->description=$_POST["description"];
    $product->category_id=$_POST["category_id"];


    if($product->create())
    {
        echo"<div class='alert alert-success container'>product successfully created</div>";
    }
    else
        {
        echo"<div class='alert alert-danger container'>unable to create product</div>";
    }
}


?>
<?php include "layout/footer.php" ?>
<?php
// retrieve one product will be here
 
// set page header
$page_title = "Update Product";
include_once "../../header.php";
 
// contents will be here
 echo "<div class='right-button-margin'>";
    echo "<a href='../admin.php' class='btn btn-default pull-right'>Read Products</a>";
echo "</div>";
// set page footer
include_once "../../footer.php";
// get ID of the product to be edited
$id = isset($_GET['id']) ? $_GET['id'] : die('ERROR: missing ID.');
 
// include database and object files
include_once '../../config/database.php';
include_once '../class/office.php';
// get database connection
$database = new Database();
$db = $database->getConnection();
// prepare objects
$office = new Office($db);
// set ID property of product to be edited
$office->id = $id;
// read the details of product to be edited
$office->readOne();
 
?>
<!-- 'update product' form will be here -->
<form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"] . "?id={$id}");?>" method="post">
    <table class='table table-hover table-responsive table-bordered'>
 
        <tr>
            <td>Name</td>
            <td><input type='text' name='name' value='<?php echo $office->name; ?>' class='form-control' /></td>
        </tr>
        <tr>
            <td></td>
            <td>
                <button type="submit" class="btn btn-primary">Update</button>
            </td>
        </tr>
 
    </table>
</form>
<!-- post code will be here -->
 
 <?php 
// if the form was submitted
if($_POST){
 
    // set product property values
    $office->name = $_POST['name'];
    // update the product
    if($office->update()){
        echo "<div class='alert alert-success alert-dismissable'>";
            echo "Product was updated.";
        echo "</div>";
    }
 
    // if unable to update the product, tell the user
    else{
        echo "<div class='alert alert-danger alert-dismissable'>";
            echo "Unable to update product.";
        echo "</div>";
    }
}
?>

<?php
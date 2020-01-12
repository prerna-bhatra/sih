<?php
include_once '../../config/database.php';
include_once "../class/office.php";
$database=new Database();
$db=$database->getConnection();
$office=new Office($db);
$page_title="Add Office";
include_once "../../header.php";
?>
<div class="row">
	<div class="col-md-4">
		<form method="POST" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
		<label>Office Name			<input type="name" name="name" class="form-control" required>
				</label>

			<button type="submit" class="btn btn-primary">Add </button>
			<a href="../admin.php" class="btn btn-primary">Saved Offices</a>
		</form>
	</div>
</div>
<?php
if($_POST){
    // set product property values
    $office->name = $_POST['name'];   // create the product
    if($office->add()){
        echo "<div class='alert alert-success'>Product was created.</div>";
    }
 
    // if unable to create the product, tell the user
    else{
        echo "<div class='alert alert-danger'>Unable to create product.</div>";
    }
}
?>
<?php
include_once "../../footer.php";
?>
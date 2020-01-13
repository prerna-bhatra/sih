<?php
// check if value was posted
if($_GET){
    // include database and object file
    include_once '../../config/database.php';
    include_once '../class/office.php';
    // get database connection
    $database = new Database();
    $db = $database->getConnection();
    // prepare product object
    $office=new Office($db);
    // set product id to be deleted
    $office->id=$_GET['id'];
    // delete the product
    if($office->Delete()){
        echo "Object was deleted.";
        
    }
    // if unable to delete the product
    else{
        echo "Unable to delete object.";
    }
}
?>
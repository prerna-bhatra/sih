<?php
// page given in URL parameter, default page is one
$page = isset($_GET['page']) ? $_GET['page'] : 1;
// set number of records per page
$records_per_page = 5;
// calculate for the query LIMIT clause
$from_record_num = ($records_per_page * $page) - $records_per_page;
// retrieve records here
include_once '../config/database.php';
include_once 'class/office.php';
$database=new Database();
$db=$database->getConnection();

$office=new Office($db);
$stmt = $office->readAll($from_record_num, $records_per_page);
$num = $stmt->rowCount();
$page_title="Add Office";
include_once "../header.php";
?>
<nav>
	<ul>
		<li><a href="add/addoffice.php" class="btn btn-success">New Office</a></li>
	</ul>
</nav>

<?php

if($num>0){
    echo "<table class='table table-hover table-responsive table-bordered'>";
        echo "<tr>";
            echo "<th>Office Name</th>";
            echo "<th>Actions</th>";
        echo "</tr>";
 
        while ($row = $stmt->fetch(PDO::FETCH_ASSOC)){
 
            extract($row);
 
            echo "<tr>";
                echo "<td>{$name}</td>";
               /* echo "<td>";
                    $category->id = $category_id;
                    $category->readName();
                    echo $category->name;
                echo "</td>";*/
 
                echo "<td>";
                    // read one, edit and delete button will be here
                // read, edit and delete buttons
				echo "<a href='read_one.php?id={$id}' class='btn btn-primary left-margin'>
				    <span class='glyphicon glyphicon-list'></span> Read
				</a>
				 
				<a href='update/update_office.php?id={$id}' class='btn btn-info left-margin'>
				    <span class='glyphicon glyphicon-edit'></span> Edit
				</a>
				 
				<a href ='delete/delete_office.php?id={$id}'
                class='btn btn-danger delete-object'>
				    <span class='glyphicon glyphicon-remove'></span> Delete
				</a>";
                echo "</td>";
 
            echo "</tr>";
 
        }
 
    echo "</table>";
    // paging buttons will be here
}
// tell the user there are no products
else{
    echo "<div class='alert alert-info'>No products found.</div>";
}
// the page where this paging is used
$page_url = "index.php?";
 
// count all products in the database to calculate total pages
$total_rows = $office->countAll();
 
// paging buttons here
include_once '../paging.php';
include_once "../footer.php";
?>
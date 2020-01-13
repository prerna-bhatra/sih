<?php
class Office 
{
	private $conn;
    private $table_name = "office";
    public $id;
    public $name;
	public function __construct($db){
        $this->conn = $db;
    }
    function add()
    {
    	$insert_query="INSERT INTO
                    " . $this->table_name . "
                SET
                    name=:name";
         $stmt = $this->conn->prepare($insert_query);
         $this->name=htmlspecialchars(strip_tags($this->name));
         $stmt->bindParam(":name", $this->name);


         if($stmt->execute()){
            return true;
        }else{
            return false;
        }
    }

     function readAll($from_record_num, $records_per_page){
 
    $query = "SELECT
                *
            FROM
                " . $this->table_name . "
            ORDER BY
                name ASC
            LIMIT
                {$from_record_num}, {$records_per_page}";
 
    $stmt = $this->conn->prepare( $query );
    $stmt->execute();
 
    return $stmt;
}
// used for paging products
public function countAll(){
 
    $query = "SELECT id FROM " . $this->table_name . "";
 
    $stmt = $this->conn->prepare( $query );
    $stmt->execute();
 
    $num = $stmt->rowCount();
 
    return $num;
}


function readOne(){
 
    $query = "SELECT
                *
            FROM
                " . $this->table_name . "
            WHERE
                id = ?
            LIMIT
                0,1";
 
    $stmt = $this->conn->prepare( $query );
    $stmt->bindParam(1, $this->id);
    $stmt->execute();
 
    $row = $stmt->fetch(PDO::FETCH_ASSOC);
 
    $this->name = $row['name'];
}
function update(){
 
    $query = "UPDATE
                " . $this->table_name . "
            SET
                name = :name
            WHERE
                id = :id";
 
    $stmt = $this->conn->prepare($query);
 
    // posted values
    $this->name=htmlspecialchars(strip_tags($this->name));
    $stmt = $this->conn->prepare($query);
    $stmt->bindParam(':id', $this->id);
    // bind parameters
    $stmt->bindParam(':name', $this->name);
    // execute the query
    if($stmt->execute()){
        return true;
    }
 
    return false;    
}

function Delete(){
    $query = "DELETE FROM " . $this->table_name . " WHERE id = ?";
    $stmt = $this->conn->prepare($query);
    $stmt->bindParam(1, $this->id);
 
    if($stmt->execute()){
        return true;
    }else{
        return false;
    }
}

}
?>
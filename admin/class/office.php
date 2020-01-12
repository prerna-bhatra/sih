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
}

?>
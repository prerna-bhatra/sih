<?php
class USER
{
    
    private $db;
    function __construct($DB_con)
    {
      $this->db = $DB_con;
    }
   public function login($umail,$upass)
    {
       try
       {
          $stmt = $this->db->prepare("SELECT * FROM users WHERE uname=:umail AND password=:upass  LIMIT 1");
          $stmt->execute(array( ':umail'=>$umail,':upass'=>$upass));
          $userRow=$stmt->fetch(PDO::FETCH_ASSOC);
          $role=$userRow['role'];
          if($stmt->rowCount() > 0)
          {
            
             /*if(password_verify($upass, $userRow['password']))
             {
                $_SESSION['user_session'] = $userRow['id'];
                return true;
             }
             else
             {
                return false;
             }*/
             if($role==1)
             {
                return 1;
             }
             else if($role==1)
             {
                return 2;
             }
          }
          else
          {
            return false;
          }
       }
       catch(PDOException $e)
       {
           echo $e->getMessage();
       }
   }
 
   public function is_loggedin()
   {
      if(isset($_SESSION['user_session']))
      {
         return true;
      }
   }
 
   public function redirect($url)
   {
       header("Location: $url");
   }
 
   public function logout()
   {
        session_destroy();
        unset($_SESSION['user_session']);
        return true;
   }
}
?>

<?php
include 'config.php';

if(isset($_POST['create']))
{
  
  try
  {
    $name             = $_POST['cat_name'];
    $email            = $_POST['email'];
    $contact_number   = $_POST['contact_number'];
    $create_date      = date('Y-m-d');
    $status           = 1;
    
    if(empty($name))
    {
      throw new Exception("Name cannot be empty!");
    }
    
    $stmt = $db->prepare("INSERT INTO users (name, email, contact_number, create_date, status) VALUES(?, ?, ?, ?)");
    $stmt->execute(array($name, $email, $contact_number, $create_date, $status));
    
    $success = "The record inserted successfully...!";
  }
  catch(Exception $e)
  {
    $error = $e->getMessage();
  }
    
}

?>

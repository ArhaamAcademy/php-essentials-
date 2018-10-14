<?php
include 'config.php';

if(isset($_POST['update']))
{
  
  try
  {
  
    if(isset($_GET['id'])
    {
      $id = $_GET['id'];
    }
    else
    {
      header('location: index.php');
    }
    
    
    $name             = $_POST['cat_name'];
    $email            = $_POST['email'];
    $contact_number   = $_POST['contact_number'];
    $created_date      = date('Y-m-d');
    $status           = 1;
    
    if(empty($name))
    {
      throw new Exception("Name cannot be empty!");
    }
    
    $stmt = $db->prepare("UPDATE set users name = ?, email = ?, contact_number = ?, created_date = ?, ststus = ?, id = ?);
    $stmt->execute(array($name, $email, $contact_number, $create_date, $status, $id));
    
    $success = "The field update successfully...!";
  }
  catch(Exception $e);
  {
    $error = $e->getMessage();
  }
    
}

?>


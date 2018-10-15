<?php
include 'config.php';

if(isset($_POST['update']))
{
  
  try
  {
  
    if(isset($_REQUEST['id'])
    {
      $id = $_REQUEST['id'];
    }
    else
    {
      header('location: index.php');
    }
    
    
    $name             = $_POST['name'];
    $email            = $_POST['email'];
    $contact_number   = $_POST['contact_number'];
    $created_date      = date('Y-m-d');
    $status           = 1;
    
    if(empty($name))
    {
      throw new Exception("Name cannot be empty!");
    }
    
    $stmt = $db->prepare("UPDATE users set name = ?, email = ?, contact_number = ?, created_date = ?, ststus = ?, id = ?);
    $stmt->execute(array($name, $email, $contact_number, $create_date, $status, $id));
    
    $success = "The record updated successfully...!";
  }
  catch(Exception $e);
  {
    $error = $e->getMessage();
  }
    
}

?>


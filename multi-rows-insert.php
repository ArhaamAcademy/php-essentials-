<form action="" method="POST" >
  <input type="number" name="production_total[]" value="0" required>
  <input type="hidden" name="loom_id[]" value="<?php echo $row['id'];?>">
</form>

<?php
if(isset($_POST['add_production'])){
    try {
        
        if(isset($_POST['production_date'])){
            $production_date = $_POST['production_date'];
        }else{
            $production_date     = date('Y-m-d');
        }

        $sql = "INSERT INTO tbl_production (loom_id, production_date, production_total, status, created_on, modified_on) VALUES";
       
        for($j=0;$j<$_POST['numbers'];$j++){
            $sql .="('".$_POST['loom_id'][$j]."', '".$production_date."', '".$_POST['production_total'][$j]."', '".$_POST['status']."', '".$_POST['created_on']."', '".$_POST['modified_on']."'),";
  
        }
        $sql = rtrim($sql,",");
        $db->exec($sql);
        
        $_SESSION['message'] = "New record created successfully";
    }
    catch(PDOException $e)
    {
        $_SESSION['err_message'] = $e->getMessage();
    }

}

?>

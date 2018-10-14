<?php

if(isset($_REQUEST['id'])){
	
	$id = $_REQUEST['id'];

	$stmt = $db->prepare("DELETE FROM users WHERE id = ?");
	$stmt->execute(array($id));
	
	$delete_msg = "The data deleted sucdessfully..!";

}

?>

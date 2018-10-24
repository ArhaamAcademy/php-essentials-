

<?

-------------------------------------------------------------------
Config.php with PDO
-------------------------------------------------------------------


$dbhost = 'localhost';
$dbname = 'cmspdo';
$dbuser = 'root';
$dbpass = '';

try {
	$db = new PDO("mysql:host={$dbhost};dbname={$dbname}",$dbuser,$dbpass);
	$db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION, PDO::FETCH_OBJ);
	$db->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_OBJ);
}

catch(PDOException $e){
	echo "Connection error".$e->getMessage();
}


// Old code for normal MySQL

//mysql_connect('localhost','root','') or die('Cannot connect to the server....!');
//mysql_select_db('login_pdo') or die('Database cannot find...!');



-------------------------------------------------------------------
Insert to MySQL with PDO
-------------------------------------------------------------------

$field1 = $_POST['field1'];
$field2 = $_POST['field2'];
$field3 = $_POST['field3'];

$stmt = $db->prepare("INSERT INTO table (field1, field2, field3) VALUES(?, ?, ?)");
$stmt->execute(array($field1, $field2, $field3));


-------------------------------------------------------------------
Retrive with PDO
-------------------------------------------------------------------
$id = 1;

$stmt = $db->prepare("SELECT * FROM table WHERE id =?");
$stmt->execute(array($id));
$result = $stmt->fetchAll();
foreach($result as $row)
{

}

-------------------------------------------------------------------
Update with PDO
-------------------------------------------------------------------

$field1 = $_POST['field1'];
$field2 = $_POST['field2'];
$field3 = $_POST['field3'];

$stmt = $db->prepare("UPDATE table SET field1=?, field2=?, field3=? WHERE cat_id=?");
$stmt->execute(array($field1, $field2, $field3));


-------------------------------------------------------------------
Delete with PDO
-------------------------------------------------------------------
$id = 1;

$stmt = $db->prepare("DELETE FROM table WHERE id =?");
$stmt->execute(array($id));

-------------------------------------------------------------------
Showing Error/ Success Message
-------------------------------------------------------------------

						
	if(isset($error_message)){
		echo "<div class='text-danger message'>".$error_message."</div>";
	}
	
	if(isset($success_message)){
		echo "<div class='text-danger message'>".$success_message."</div>";
	}
	

					
-------------------------------------------------------------------
All About Date
-------------------------------------------------------------------


//Setting timezone

date_default_timezone_set('Asia/Dhaka');


//get to date (2018-01-20)
$date1 = date('Y-m-d'); 

//get to date (2018 Jan Mon)
$date1 = date('Y-M-D'); 


// get timestamp value of to date 
$timestamp1 strtotime(date('Y-m-d'));

-------------------------------------------------------------------
Using substr 
-------------------------------------------------------------------

// get specific part of a string value.
$date = date("Y-m-d");
$day = substr($con_date,8,2);
$month = substr($con_date,5,2);
$year = substr($con_date,0,4);

echo $day.' '.$month.' '.$year;
-------------------------------------------------------------------
Explode and Implode
-------------------------------------------------------------------
// before adding data
$ids = implode(",",$_POST["ids"]);

// when retrieve
$ids_array = explode(",",$ids]);
echo $ids_array[0];
echo $ids_array[1];

?>

-------------------------------------------------------------------
Fancy Box Using
-------------------------------------------------------------------

 <!--FancyBox jQuery between <head></head> tags-->
    <script type="text/javascript" src="http://code.jquery.com/jquery-latest.min.js" ></script>
    <link rel="stylesheet" href="../js/fancy-box/source/jquery.fancybox.css" type="text/css" media="screen" />
    <script type="text/javascript" src="../js/fancy-box/source/jquery.fancybox.pack.js"></script>

-------------------------------------------------------------------

<!--FancyBox Before Body Tag ending </body>-->
    
    <script type="text/javascript">
    
    	$(document).ready(function(){
			$(".fancybox").fancybox();
		});
	
    </script>


-------------------------------------------------------------------
Bootstrap 3 Using
-------------------------------------------------------------------
<!--Bootstrap's CSS & JavaScript between <head></head> tags-->
	
    <link href="../css/bootstrap.min.css" rel="stylesheet">
	<link href="../css/custom-style.css" rel="stylesheet">

<!-- jQuery (necessary for Bootstrap's JavaScript plugins) Before Body </body>-->
    <script src="https://code.jquery.com/jquery.js"></script>
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="../js/bootstrap.min.js"></script>

-------------------------------------------------------------------
CK Editor Using Link: http://ckeditor.com
-------------------------------------------------------------------
<!--CKEditor-->
    <script type="text/javascript" src="ckeditor/ckeditor.js"></script>
    <!--CKEditor End-->
	
	<textarea class="ckeditor form-control" name="description" cols="30" rows="10" placeholder="Description" ></textarea>
	<script type="text/javascript">
	
		CKEDITOR.replace('description');
	
	</script>

<?
-------------------------------------------------------------------
Getting the next auto increment value of a table
-------------------------------------------------------------------

$stmt = $db->prepare("SHOW TABLE STATUS LIKE 'tbl_post'");
$stmt->execute();
$result = $stmt->fetchAll();
foreach($result as $row)
$new_id = $row[10]; // here 10 is fixed. always use 10 here to get auto increment id

-------------------------------------------------------------------
Getting File Extension
-------------------------------------------------------------------

$up_filename=$_FILES["photo"]["name"];
$file_basename = substr($up_filename, 0, strripos($up_filename, '.')); // strip extension
$file_ext = substr($up_filename, strripos($up_filename, '.')); // strip name
$f1 = strtotime(date('Y-m-d H:i:s')). $file_ext;

move_uploaded_file($_FILES["photo"]["tmp_name"],"upload/" . $f1);

@unlik($_FILES["photo"]["tmp_name"]);

-------------------------------------------------------------------
Checking if file is png or jpg or jpeg or gif
-------------------------------------------------------------------

if(($file_ext!='.png')&&($file_ext!='.jpg')&&($file_ext!='.jpeg')&&($file_ext!='.gif')) 
	throw new Exception("Only jpg, jpeg, png and gif format images are allowed to upload");


-------------------------------------------------------------------
Showing Limited numbers of Words
-------------------------------------------------------------------

// Exarpt by word count
  <?php
  	$pieces = explode(" ", $row['post_description']);
	$final_words = implode(" ", array_splice($pieces, 0, 150));
	$final_words = $final_words.' ...';
  ?>
  <?php echo $final_words; ?>
  <!--Showing Limited numbers of words end-->
  
-------------------------------------------------------------------
Showing Day, month & Year with wishes format: Function: substr();
-------------------------------------------------------------------

<?php
  	$post_date = $row['post_date'];
	$day = substr($post_date,8,2);
	$month = substr($post_date,5,2);
	$year = substr($post_date,0,4);
	
	if($month == '01') {$month = "Jan"; }
	if($month == '02') {$month = "Feb"; }
	if($month == '03') {$month = "Mar"; }
	if($month == '04') {$month = "Apr"; }
	if($month == '05') {$month = "May"; }
	if($month == '06') {$month = "Jun"; }
	if($month == '07') {$month = "Jul"; }
	if($month == '08') {$month = "Aug"; }
	if($month == '09') {$month = "Sep"; }
	if($month == '10') {$month = "Oct"; }
	if($month == '11') {$month = "Nov"; }
	if($month == '12') {$month = "Dec"; }
	
	echo $day.' '.$month.' '.$year;
  ?>	

-------------------------------------------------------------------
Email Validation checking
-------------------------------------------------------------------

if(!(preg_match("/^[_a-z0-9-]+(\.[_a-z0-9-]+)*@[a-z0-9-]+(\.[a-z0-9-]+)*(\.[a-z]{2,3})$/", $_POST['c_email']))) {
	throw new Exception("Please enter a valid email address.");
}

-------------------------------------------------------------------


-------------------------------------------------------------------
-------------------------------------------------------------------
-------------------------------------------------------------------
-------------------------------------------------------------------
-------------------------------------------------------------------

<?php
require_once('config.php');
?>
<?php

if(isset($_POST)){

	$firstname 		= $_POST['firstname'];
	$lastname 		= $_POST['lastname'];
	$email 			= $_POST['email'];
	$phonenumber	= $_POST['phonenumber'];
	$city           =$_POST['city'];
    $profession     =$_POST['profession'];
    $edutitle       =$_POST['edutitle'];
    $graduation     =$_POST['graduation'];
    $edutype        =$_POST['edutype'];
    $jobname        =$_POST['jobname'];
    $startdate      =$_POST['startdate'];
    $enddate        =$_POST['enddate'];
    $location       =$_POST['location'];
    $company        =$_POST['company'];


		$sql = "INSERT INTO registration (firstname, lastname, email, phonenumber, city, profession, edutitle, graduation, edutype, jobname, startdate, enddate, location, company ) VALUES(?,?,?,?,?,?,?,?,?,?,?,?,?,?)";
		$stmtinsert = $db->prepare($sql);
		$result = $stmtinsert->execute([$firstname, $lastname, $email, $phonenumber, $city, $profession, $edutitle, $graduation, $edutype, $jobname, $startdate, $enddate, $location, $company]);
		if($result){
			echo 'Successfully saved.';
		}else{
			echo 'There were erros while saving the data.';
		}
}else{
	echo 'No data';
}
if (isset($_POST["save1"])){
    header('Location:view.php');
}
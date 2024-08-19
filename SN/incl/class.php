<?php
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}
/*
user class is to connect with database
 */	
 $con=mysqli_connect("localhost","root","NAWAZ316naji;","aht");
class user
{
	public function __construct()
	{
		if (mysqli_connect_errno()) {
			echo "Conntection faild with database";
			exit;
		}
	}
}
$obj=new user;
 	function clean_input($input){
	$data=trim($input);
	$data=stripcslashes($data);
	$data=htmlspecialchars($data);
	return $data;
}
?>
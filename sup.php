<?php
$cname = $_GET['cname'];
$contact = $_GET['contact'];
$mail = $_GET['cmail'];
$address = $_GET['caddress'];
$dis = $_GET['cdis'];
$state = $_GET['cstate'];
$pin = $_GET['cpin'];
$pass = $_GET['pass'];

$conn=mysqli_connect("localhost","root","","info");
$s1="SELECT EMAIL FROM data WHERE EMAIL='$mail'";
 $query = mysqli_query($conn,$s1 );
	$user=mysqli_fetch_array($query);
	if($user){
		echo "<script type='text/javascript'>alert('Mail already Exists.Please try with different Mail');window.location.href='index.php'</script>";
		 
	}else{

$sql = "INSERT INTO `data`(`NAME`, `CONTACT`, `EMAIL`, `ADDRESS`, `District`, `State`, `Pincode`, `PASSWORD`) VALUES ('$cname','$contact', '$mail', 
		'$address', '$dis', '$state', '$pin', '$pass')";
$show=mysqli_query($conn,$sql);
if($show){
	echo "<script type='text/javascript'>alert('Registered successfully please login to your account');</script>";
  header("location:index.php");
}
}
?>
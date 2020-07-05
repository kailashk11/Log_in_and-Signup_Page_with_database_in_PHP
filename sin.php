<?php
session_start();

    $conn = mysqli_connect("localhost","root","","info");

    $un = $_GET['mail'];
    $pw = $_GET['pass'];
      
      $_SESSION['mail']=$un;
   

      $s1="SELECT EMAIL,PASSWORD FROM data WHERE EMAIL='$un' AND PASSWORD='$pw'";
      if(!isset($_COOKIE["member_login11"])){
          $s1 .="AND PASSWORD= '" . $pw . "'";
    }
    $query = mysqli_query($conn,$s1 );
	$user=mysqli_fetch_array($query);
       if ($user) {
       $_SESSION["EMAIL"] = $user["EMAIL"];

            if(!empty($_GET['remember'])) {
              setcookie ("member_login11",$_GET["mail"],time()+ (10 * 365 * 24 * 60 * 60));
            } else {
              if(isset($_COOKIE["member_login11"])) {
                setcookie ("member_login11","");
              }
      }
      echo "<script type='text/javascript'>alert('Login Sucessfully');</script>";
       header("location:prof.php");
       $_SESSION['temp']=$un;

  } else {
      echo "<script type='text/javascript'>alert('Invalid Credentials'); window.location.href='index.php';</script>";
}
    ?>
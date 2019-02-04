<!DOCTYPE html>
<html>
<head>
	<title> Login</title>
<?php 

  include 'templates/header.php';
  include 'config.php';
  session_start();
?>

<center> Student Login </center>
<br><br>
</head>

<style type="text/css">

head
{
	color: blue;
	font-size: 30px;
}

</style>

<body>

<div class="container" style="text-align:center;">

<form  method="POST">

 <p>Username:<input type="email" name="uname"></p><br>
 <p>Password:<input type="password" name="upass"></p><br>
 <input type="submit" name="submit" value="Login">

</form>

</div>

<?php

if (isset($_POST['submit']))
{	

$name=$_POST['uname'];
$pass=$_POST['upass'];
// echo $uname;
// echo $upass;

$res=mysqli_query($db, " SELECT * FROM ulogin ");

if(mysqli_num_rows($res) >0) 
{

  	while ($result=mysqli_fetch_array($res))
	 {       
      
        $uname=$result['uname'];
	    $upass=$result['upass']; 
	    $rollno=$result['rollno'];	

if ($name == $result['uname'] && $pass == $result['upass'])
{
 
    $_SESSION['urollno']=$rollno;

    echo '<script>window.location.href = "details.php";</script>';

}

elseif ($name!= $result['uname'] && $pass==$result['upass'])
 {

	echo "Invalid Username";

}

 elseif ($name==$result['uname'] && $pass != $result['upass'])
{
 

   echo "Pls Check U r password";


}



}

}

else

{

echo "User invalid".mysqli_connect_error().$sql ;

}

}

?>

</body>
<br>
<br>
<br>

<?php

include 'templates/footer.php';

?>

</html>
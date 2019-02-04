<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<?php

  include 'templates/header.php';
  session_start();
  
?>
<style type="text/css">
	
.card-body
{
    background-color:white;
	display: block;
	text-decoration: none;
	text-align: left; 
	position: center;	
	font-family: "Open Sans",sans-serif;
	letter-spacing: 0.75;
	border-radius: 20px;
	font-size: 20px; 	
} 

 
.card-title
{

	color: blue;

}


.card-body:hover
{

  box-shadow: 4px 4px 8px 8px lightgrey;
  
}

</style>

<?php

 include('config.php'); 

?>

<?php 

 $rollno=$_SESSION["urollno"];
 $dept_code=$_SESSION['dept_code'];
 $sem=$_SESSION['sem'];
 $result23=mysqli_query($db, "SELECT * FROM student_master WHERE register_no='$rollno'");
  
?>

<link rel="stylesheet" type="text/css" href="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/css/bootstrap.min.css">

<body>
<div class="card">
<div class="card-body">
<div class="container center_div ">
<div class="row">
<div class="card-title">Course-info</div>

<form action="details2.php">

<?php 

while ($res=mysqli_fetch_array($result23)) 
  {

?>	

<p>Graduate:&nbsp;&nbsp;&nbsp;&nbsp;<input type="text"  value="<?php echo "UG";?>" disabled="disabled"> </p><br>
<p>Department:&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
<input type="text"  value="<?php echo $res['dept'];?>"  disabled ></p><br>

<?php

}

?>
</form>
<br>
<br>
<div class="row">
&emsp;<div class="card-title">Semester info</div>

    <form action="details2.php">
    <p>Sem Start Date:&emsp;
    <input type="date" disabled ></p><br>
    <p>Sem End Date:&emsp;
    <input type="date" disabled ></p><br>
    </form>
    </div>
</div>
</div>
<a href="details.php"><< Previous </a>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<a href="details3.php">Next>></a>
</div>
</div>
</div>	   
</body>
<br><br><br>
<?php 

 include 'templates/footer.php';

?>
</html>
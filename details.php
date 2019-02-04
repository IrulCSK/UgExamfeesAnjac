<!DOCTYPE html>
<html>

<?php include 'templates/header.php';?>

<?php

session_start();

$rollno=$_SESSION['urollno'];

include('config.php');

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

<link rel="stylesheet" type="text/css" href="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/css/bootstrap.min.css">


<body>
<center>
<br>

<div class="card" style="width:50% ";"height:100%">
<div class="card-body">
<div class="container ">
<form class="form" action="details.php" id="basic" method="POST">
<h2 class="card-title" style="margin-left:50px; text-align:center;" id="h2">Basic info</h2><br><br>
<div class="form-group">
<?php

$result=mysqli_query($db," SELECT * FROM student_master WHERE register_no='$rollno'");
$res=mysqli_fetch_array($result);

if($res['register_no']==$rollno)
{

 $_SESSION['dept_code']=$res['dept_code'];
 $_SESSION['sem']=$res['sem'];
    
?>

<div class="img-rounded">
<?php 

echo '<img src="data:image/jpeg;base64,'.base64_encode( $res['Photo'] ).'"; height=200 ; width=200; style="margin-left:8em; ">'; 

?>
</div>
<div class="row">   
<p>Rollno:
<input type="text" value="<?php echo $rollno;?>" disabled></p><br></div>
<div class="row">
<p>Name:  
<input type="text" value="<?php echo $res['name'];?>" disabled></p><br></div>
<div class="row">
<p>Email: 
<input type="email" value="<?php echo $res['email_id'];?>" disabled></p><br></div>
<div class="row">
<p>MobileNo:
<input type="text" value="<?php  echo $res['mobile_no'];?>" disabled></p><br></div>
<div class="row"> 
<p>Gender:
<input type="text" value="<?php echo $res['gender'];?>" disabled></p><br></div>
<div class="row">
<p>Date of Birth:
<input type="date" value="<?php echo $res['dob']; ?>"   disabled></p><br></div>
<div class="row">
<p>Community :
<input type="text" value="<?php echo $res['caste']; ?>" disabled></p><br></div>
<div class="row">
<p>Address:
<textarea disabled><?php echo $res['address'];?></textarea></p><br>
</div>

<?php  

}
 
elseif ($res['rollno']!=$res)

{
	
echo "2";

}

?>
<br>

&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;

<a href="details2.php">Next>></a>
</div>
</div>
</form>
</div>
</div>
</div>
</div>
</div>
<br><br><br>
<?php 

include 'templates/footer.php';

?>
</center>
</body>
</html>  
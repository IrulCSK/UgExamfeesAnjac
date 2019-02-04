<!DOCTYPE html>
<html>

<?php include 'templates/header.php';?>

<?php

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

&nbsp;&nbsp;&nbsp;<label class="control-label" for="rollno" > Rollno:</label>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;

<input type="text" name="rollno"  class="inputs"  name="cheroll">
<input type="button" value="Yes" name="rollbtn"><br>





<?php
if ($_SERVER['REQUEST_METHOD']=="POST")
{
    
$rollno=$_POST['cheroll'];

if (isset($_POST['rollbtn'])) 
{ 

$query="SELECT name,email,mobno,fname,fmobno,dob,community,preaddress,peraddress FROM baseinfo Where rollno=$rollno ";
$result=mysqli_query($query);
     
while ($row=mysql_fetch_assoc($query)) 
{

$name=$row['name'];
$email=$row['email'];
$mobno=$row['mobno'];
$fname=$row['fname'];
$fmobno=$row['fmobno'];
$dob=$row['dob'];
$community=$row['community'];
$preaddress=$row['preaddress'];
$peraddress=$row['peraddress'];


}
}
}

?>
<label class="control-label" for="name"> Name:</label> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
<input type="text" name="name"  class="inputs"  value="<?php if (isset('name')) { echo $name ;} else echo "";?>" disabled="disabled"  placeholder="" id="name"> <br>
<label class="control-label" for="email"> Email: </label>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
<input type="email" name="email"  class="inputs"  value="<?php if (isset('email')) { echo $email ;} ?>" disabled="disabled" placeholder="" id="email"><br>

<label class="control-label" for="Mobno"> MobileNo: </label>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
<input type="text" name="umob" maxlength="10" class="inputs" id="mobno" disabled="disabled" placeholder="" value="<?php  if (isset('mobno')) { echo $mobno ;}?>"   placeholder="" ><br>
</form>
 <form class="form" action="details.php" >
<label class="control-label" for="Father Name:">Father Name:</label>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
<input type="text" name="fname" class="inputs"  value="<?php if (isset('fname')) { echo $fname ;}  ?>"  placeholder="" disabled="disabled" id="fname" ><br>
<label class="control-label" for="fMobno">  Father MobileNo: </label>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
<input type="text" name="umob" class="inputs" maxlength="10"   value="<?php if (isset('fmobno')) { echo $fmobno ;} ; ?>" placeholder=""  id="fmobno"   disabled="disabled" ><br>
<label class="control-label" > Date of Birth: </label>&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
<input type="date" name="dob" class="inputs"  value="<?php  if (isset('dob')) { echo $dob ;} ;?>"   id="dob" placeholder=""  disabled="disabled" ><br>
<label class="control-label" for="caste"> Community: </label>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
<input type="text" name="caste" class="inputs"  value="<?php if (isset('community')) { echo $community ;} ;?>"  placeholder="" id="caste" disabled="disabled"  ><br>
<label class="control-label" for="preaddress">Present Address:</label>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
<textarea  class="inputs" id="preaddress"  disabled="disabled"  placeholder="" value="<?php if (isset('preaddress')) { echo $preaddress ;}?>" ></textarea><br>
<label class="control-label" for="preaddress">Permanent Address:</label>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
<textarea  class="inputs"  id="peraddress"   value="<?php if (isset('peraddress')) { echo $peraddress ;} ;?>" placeholder=""  disabled="disabled" ></textarea><br>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;


<a href="details2.php">Next>></a>

</div>
</div>
</form>

</div>
</div>
</div>
</div>
</div>
<?php 

include 'templates/footer.php';

?>
</center>
</body>
</html>  
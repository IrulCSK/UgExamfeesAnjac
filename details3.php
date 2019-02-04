<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>

<?php 
   
   include 'templates/header.php';
   session_start();
   include('config.php');
   $rollno=$_SESSION['urollno'];
   
   $dept_code=$_SESSION['dept_code'];
   $sem=$_SESSION['sem'];

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
    border:1px solid lightgrey;
} 

.card-title
{
	
	color: blue;
	text-align: center;
	font-size: 25px;

}

.card-body:hover
{

  box-shadow: 4px 4px 8px 8px lightgrey;

}

</style>

<?php

$sql="SELECT * from subject_master WHERE dept_code='$dept_code' and sem='$sem'";

$result=mysqli_query($db,$sql);

?>
<link rel="stylesheet" type="text/css" href="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/css/bootstrap.min.css">
<body>

<div class="card">
<div class="container center_div ">
<div class="card-title">Regular Papers</div>
<div class="card-body">
<form class="form">
<table class="table">
<thead class="thead-dark">
	<tr>
	<th>S.NO</th>
	<th>Subject Code</th>
	<th>Subject Name</th>
	<th>Paper Type</th>
	<th>Fees(Rs.)</th>
	</tr>
</thead>
<tbody>
<?php
$i=1;
$sum=0;
while ($res=mysqli_fetch_array($result))
{
  
echo"<tr>";
echo"<td>".$i++."</td>";
echo"<td>".$res['subject_code'] ."</td>";
echo"<td>".$res['subject_name']."</td>";
echo"<td>".$res['subject_type'] ."</td>";
echo"<td>".$res['regular_fee_aided']."</td>";
echo"</tr>";
$sum+=$res['regular_fee_aided'];

}
?>

</tbody>
</table>

<?php
 

$arsql="SELECT * FROM mark_details";
$result2=mysqli_query($db,$arsql);
$res2=mysqli_fetch_array($result2);
$arres=$res2['result'];
$rollno=$res2['register_no'];
$sem=$res2['sem'];
$subjectcode=$res2['subject_code'];

?> 

<?php 
if ($arres=='RA')
 {

 $arval=" SELECT * from subject_master WHERE dept_code='$dept_code' and sem='$sem'";
 $arval2=mysqli_query($db,$arval);
 $res3=mysqli_fetch_array($arval2);
 $subjectcode2=$res3['subject_code'];

if ($subjectcode==$subjectcode2)
{

?>

<div class="card-title">Arrear Papers</div>
<table class="table">
<thead class="thead-dark">s

	<tr>
	<th>S.NO</th>
	<th>Subject Code</th>
	<th>Subject Name</th>
	<th>PaperType</th>
	<th>Fees(Rs.)</th>
	</tr>

</thead> 
<tbody>

<?php

$i=1;
$sum2=0;

while ($res3=mysqli_fetch_array($arval2))
{

echo"<tr>";
echo"<td>".$i++."</td>";
echo"<td>".$res3['subject_code'] ."</td>";
echo"<td>".$res3['subject_name']."</td>";
echo"<td>".$res3['subject_type'] ."</td>";
echo"<td>".$res3['arrear_fee_aided']."</td>";
$sum2+=$res3['arrear_fee_aided'];
echo"</tr>";
}
}
}
?>
</tbody>
</table>
</form>
</div>
<br><br>
<div class="card-title">Other Fees-info</div>
<form class="form"> 
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<input type="text" disabled="disabled" placeholder="Mark Statement Fees:">
<input type="text" disabled="disabled"  placeholder="<?php  $mark=135;  echo $mark;?>" ><br><br>
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<label> Total Fees: </label>&nbsp;&nbsp;&nbsp;
<input type="text" disabled="disabled"  value="<?php  if ($subjectcode==$res3['subject_code']) {
	# code...
 echo $sum+$mark+$sum2;} else { echo $sum+$mark;} ?>"> <br><br>

&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<input type="submit" class="btn btn-success" name="submit" id="submit">

</form>

<?php

if (isset($_POST['submit']))
{

echo '<script> windows.alert("Submitted Successfully"); </script>';
}

?> 

<br>
<br>
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;

<a href="details2.php"> << Previous</a>

</div>
</div> 
</div>
</body>
<br><br><br>

<?php

include 'templates/footer.php';

?>

</html> 
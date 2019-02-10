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
$sum=135;
$arreardiv=false;
$sqlar="SELECT a.subject_code,a.subject_name,a.subject_type,
a.arrear_fee_aided FROM subject_master a,mark_details b WHERE a.sem =b.sem and a.subject_code=b.subject_code and b.result='RA' and b.register_no='$rollno'";
$sqlqueryar=mysqli_query($db,$sqlar);
if(mysqli_num_rows($sqlqueryar)>0)
{
$arreardiv=true;
}
else
{
	
}

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
$sql="SELECT a.subject_name,a.subject_code,a.subject_type,a.regular_fee_aided FROM subject_master a,mark_details b WHERE a.sem =b.sem and a.subject_code=b.subject_code and b.result='P' and b.register_no='$rollno'";
$result=mysqli_query($db,$sql);
// $res=mysqli_fetch_assoc($result);

?>
<link rel="stylesheet" type="text/css" href="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/css/bootstrap.min.css">
<body>
<div class="card">
<div class="container center_div ">
<div class="card-body">
<form class="form">
<div class="card-title">Regular Papers</div>
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
if(mysqli_num_rows($result)>0)
{
while ($res=mysqli_fetch_assoc($result))
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
}
?>
</tbody>
</table>
<div id="arrear" <?php if($arreardiv===false){?>style="display:none"<?php } ?>>
<div class="card-title">Arrear Papers</div>
<table class="table">
<thead class="thead-dark">

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

$sqlar="SELECT a.subject_code,a.subject_name,a.subject_type,
a.arrear_fee_aided FROM subject_master a,mark_details b WHERE a.sem =b.sem and a.subject_code=b.subject_code and b.result='RA' and b.register_no='$rollno'";
$sqlqueryar=mysqli_query($db,$sqlar);

$j=1;

if(mysqli_num_rows($sqlqueryar)>0)
{ 	
while($res1=mysqli_fetch_assoc($sqlqueryar))
{

echo"<tr>";
echo"<td>".$j++."</td>";
echo"<td>".$res1['subject_code'] ."</td>";
echo"<td>".$res1['subject_name']."</td>";
echo"<td>".$res1['subject_type'] ."</td>";
echo"<td>".$res1['arrear_fee_aided']."</td>";
$sum+=$res1['arrear_fee_aided'];
echo"</tr>";

}
}
else
{
echo "no rows selected";
}

?>
</tbody>
</table>
</div>
</form>
</div>
<br><br>
<div class="card-title">Other Fees-info</div>
<form class="form-group"> 
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<input type="text" disabled="disabled" placeholder="Mark Statement Fees:">
<input type="text" disabled="disabled"  placeholder="<?php  $mark=135;  echo $mark;?>" ><br><br>
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<label> Total Fees: </label>&nbsp;&nbsp;&nbsp;
<input type="text" disabled="disabled"  
value="
<?php
echo $sum; 
?>"> <br><br>

&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<input type="submit" class="btn btn-success" name="submit" value="submit" id="submit">


</form>

<?php
if (isset($_POST['submit']))
{

?><script>alert("Submitted Successfully");
</script>
<?php

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
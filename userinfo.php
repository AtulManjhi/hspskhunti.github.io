<?php 

$con = mysqli_connect('localhost','root');
if($con){
	echo 'Successful';
}
else{
	echo 'Connection Error';
}

mysqli_select_db($con,'example');

$user = $_POST['user'];
$email = $_POST['email'];
$mobile = $_POST['mobile'];
$address = $_POST['address'];


$query = "insert into userinfo (name,email,mobile,address)
values('$user','$email','$mobile','$address')";

mysqli_query($con,$query);

$sub = "Regarding your registration.";
$msg ="
<html>
<head>
<title>HTML email</title>
</head>
<body>
<p>Following details are submitted.</p>
<table border=2 cellspacing=0 cellpadding=5>
<tr>
<th>Name</th>
<th>Mobile</th>
<th>E-mail</th>
<th>Address</th>
</tr>
<tr>
<td>".$user."</td>
<td>".$mobile."</td>
<td>".$email."</td>
<td>".$address."</td>
</tr>
</table>
</body>
</html>
";
$headers = "MIME-Version: 1.0" . "\r\n";
$headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";
$headers .= "From: noreply@hspskhunti.com";
mail($email,$sub,$msg,$headers);

header('location:index.php');

 ?>
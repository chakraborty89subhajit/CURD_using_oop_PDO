<?php
//include'./class_curd.php';
include'./db.php';
if(isset($_POST['submit'])){
	$id=$_POST['id'];
	$first_name=$_POST['first_name'];
	$last_name=$_POST['last_name'];
//echo"$id "." "."$first_name"." "."$last_name";
	if($curd->create($id,$first_name,$last_name)){
echo "insert successfully<br>";
	}else{
echo "create problem<br>";
	}
	
}else{
echo "submit problem<br>";
}
?>
<html>
	<head>
		<title>curd using gui in php</title>
	</head>
	<body>

		<div class="container" align=center>
			<h2>insert data</h2>
			<table border="1" ><tr>
<form method="post" action="add.php">
	<tr><td>id:</td><td><input type="text" name="id"/><br></td></tr>
    <tr><td>first_name:</td><td><input type="text" name="first_name"/><br></td></tr>
    <tr><td>last_name:</td><td><input type="text" name="last_name"/><br></td></tr>
   <tr><td> <input type="submit" value="submit" name="submit" ></td><td><a href="index.php">back to index</a></td></tr>
</form>
</tr>
</table>
</div>
</body>
</html>
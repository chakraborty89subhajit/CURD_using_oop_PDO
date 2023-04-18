<?php 
include './db.php';



?>
<?php
if(isset($_POST['delete_btn']))
{
	$id=$_GET['id'];
	$curd->delete($id);
	 header("location:delete.php?deleted");
}

if(isset($_GET['deleted']))
{
?>
<div class="delete_success">
	<strong>record deleted</strong>

</div>
<?php
}else{

	?>
	<div class="delete_not_success">
	<strong>record  not deleted</strong>

</div>

	<?php
}

?>
<div class="container">
	<?php
if(isset($_GET['id']))
{
	?>
	<table>
		<tr>
			<th>id</th>
			<th>first_name</th>
			<th>last_name</th>

		</tr>
		<?php
$stmt=$db->prepare("select * from user where id=:id");
$stmt->execute(array(":id"=>$_GET['id']));
while($row=$stmt->fetch(PDO::FETCH_ASSOC)){
		?>
<tr>
	<td><?php echo $row['id'];?></td>
	<td><?php echo $row['first_name'];?></td>
	<td><?php echo $row['last_name'];?></td>

</tr>
<?php 
}
?>
	</table>

	<?php
}

?>

</div>
<div>
	<p>
		<?php
if(isset($_GET['id']))
{
		?>
<form method="post" >
	
	<button type="submit" name="delete_btn">delete_btn</button>
	<a href="index.php">back to index</a>
</form>


		<?php
}
?>
	</p>
	<a href="index.php">back to index</a>
</div>
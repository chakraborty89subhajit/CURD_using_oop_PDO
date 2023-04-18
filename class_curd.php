<?php
class curd{
      private $db;
	function __construct($db_con){
          $this->db=$db_con;
	}

public function create($id,$first_name,$last_name){
try{
	$stmt=$this->db->prepare("insert into user(id,first_name,last_name) values(?,?,?)");
$stmt->bindparam(1,$id);
$stmt->bindparam(2,$first_name);
$stmt->bindparam(3,$last_name);
$stmt->execute();
return true;
}catch(Exception $e){
	echo $e->getMessage();
}

}


public function delete($id){
	$stmt=$this->db->query("delete from user where id='$id'");
	//$stmt->bindparam(1,$id);
	$stmt->execute();
	return true;
}

public function paging($query,$record_per_page){
$starting_position=0;
if(isset($_GET['page_no'])){
	$starting_position=($_GET['page_no']-1)*$record_per_page;
}
$query2=$query." limit $starting_position,$record_per_page";
return $query2;
}

public function pagelink($query,$record_per_page){
	$self=$_SERVER['PHP_SELF'];
	
	$stmt=$this->db->prepare($query);
	$stmt->execute();
	$total_no_of_records=$stmt->rowCount();
	if ($total_no_of_records>0){
		?>
<ul>
	<?php
$total_no_of_pages=ceil($total_no_of_records/$record_per_page);
$current_page=1;
if(isset($_GET["page_no"])){
	$current_page=$_GET['page_no'];
}
if($current_page!=1){
	$previous=$current_page-1;
	echo "<li><a href='".$i."?page_no=1' >".$i."</a></li>";
	echo "<li><a href='".$i."?page_no=".$current_page."' >".$current_page."</a></li>";
}
for($i=1;$i<=$total_no_of_pages;$i++){
	if($i==$current_page){
		echo "<li><a href='".$self."?page_no=".$i."' style='color:red;'>".$i."</a></li>";
	}else{
	 echo "<li><a href='".$self."?page_no=".$i."''>".$i."</a></li>";	
	}
}
	?>
}
}

</ul>







		<?php
	}
}


	public function dataView($query){
		$stmt=$this->db->prepare($query);
		
		$stmt->execute();

		if($stmt->rowcount()>0){

			while($row=$stmt->fetch(PDO::FETCH_ASSOC)){

				?>
<tr>
<td><?php if(isset($row['id']))print($row['id'])?></td>
	<td><?php if(isset($row['first_name']))print($row['first_name'])?></td>
	<td><?php if(isset($row['last_name']))print($row['last_name'])?></td>
	<td><a href="delete.php?id=<?php  echo $row['id'] ?>">delete</a></td>
	<td><a href="upadte.php?id=<?php  echo $row['id'] ?>">update</a></td>
</tr>

				<?php


			}
		}
	}
}
?>
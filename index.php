<?php
include'./db.php';
?>
<html>
	<head>
		<title>data in the table</title>
	</head>
	<body>
		<a href="add.php">click to add data in table</a><br>
		<div class="table">
		<table border="1">
           <tr>
           	<th>id</th>
           	<th>first_name</th>
           	<th>last_name</th>
           	<th colspan="2">action</th>

           </tr>
           <?php
            $query="select * from user";
            $record_per_page=3;
           $query2= $curd->paging($query,$record_per_page);
          // echo $query2;
            $curd->dataView($query2);
           ?>

           <tr>
           	<td colspan="5" align="center">
           		<div class="pagination">

                   <?php $curd->pagelink($query,$record_per_page);?>
           		</div>
           	</td>
           </tr>
		</table>
	</div>
	</body>
</html>
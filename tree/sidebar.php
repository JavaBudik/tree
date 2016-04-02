<?php $bool = true; 
		if (isset($_GET['c_id'])) {
			$comp_id = $_GET['c_id'];
		} else $bool = false;
		if ($bool) {
		include('pdo.php');
		$sql = $db->prepare("SELECT * from companies where id = :c_id");
		$data = array ('c_id'=>$comp_id);		
		$sql->execute($data);
		$sql->setFetchMode(PDO::FETCH_OBJ);
		$result = $sql->fetchAll();
		$id_parent = $result[0]->parent_id;
		$data2 = array ('p_id'=>$id_parent);
		$sql2 = $db->prepare("SELECT * from companies where id = :p_id");		
		$sql2->execute($data2);
		$sql2->setFetchMode(PDO::FETCH_OBJ);
		$result2 = $sql2->fetchAll();
		}
		
		?>
		<aside>

		    <form action="edit_delete.php" method="get" name="company-info">
			<table class="company-form">
				<tr><td>Company name:</td>
				</tr>
				<tr><td>
				<input type="text" name="c_name" value="<?php if (isset($result)) echo $result[0]->c_name ?>">
				</td>
				</tr>
				<tr><td>Estimated earnings ($):</td>
				</tr>
				<tr><td><input type="text" name="earnings" value="<?php if (isset($result)) echo $result[0]->earning ?>"></td>
				</tr>
				<tr><td>Parent company: </td>
				</tr>
				<tr><td>
					<input id="edit_comp" type="text" name="choose2" value="<?php if (isset($result) and ($result[0]->parent_id!=0)) 
					{ echo $result2[0]->c_name; } else echo 'No parents';  ?>" disabled>
										
				</td>
				</tr>
				<input type="hidden" name="id" value="<?php if (isset($result)) echo $result[0]->id; else echo -1; ?>">
				<tr>	
					<td><input type="submit" name="Save" value="Save" size="30px">
					<input type="submit" name="Delete" value="Delete"></td>				
				</tr>				
			</table>			
			</form>
			
			<form action="#" method="get" name="add-form">
				<br>
				<input type="button" value="Add company" onclick="add_delete()" >
			</form>
			<form action="add_company.php" method="get" name="add-company" class="hiding">
				<br>
				<table class="company-form">
				<tr><td>Company name:</td>
				</tr>
				<tr><td><input type="text" name="company-name"></td>
				</tr>
				<tr><td>Estimated earnings ($):</td>
				</tr>
				<tr><td><input type="text" name="earnings"></td>
				</tr>
				<tr><td>Parent company: </td>
				</tr>
				<tr><td>
					<select id="choose_comp" size="1" name="choose">
					<option disabled>Choose company</option>
					<option value="0">No parents</option>
				</td>
				</tr>
				<tr>	
					<td><input type="submit" name="Save" value="Save">
								
				</tr>				
			</table>			
			</form>	
		<script type="text/javascript">
		
$.getJSON('ajax.php', function (data) {
	data.forEach(function(item) {
		$('#choose_comp').append($('<option value="'+item['id']+'">'+item['c_name']+'</option>'));
	});
});
		
		</script>
		</aside>
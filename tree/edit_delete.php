<?php 
include('pdo.php');
$c_name = $_GET["c_name"];
$earning = $_GET["earnings"];
$id = $_GET["id"];
if (isset($_GET['Save'])) $operation_type = 'save';
if (isset($_GET['Delete'])) $operation_type = 'del';
if ($operation_type == 'save') {
$data = array ('c_name'=>$c_name, 'earning'=>$earning);
$sql = $db->prepare("UPDATE companies SET c_name='".$c_name."', earning='".$earning."' WHERE id=".$id."");
$sql->execute($data);
}
if ($operation_type == 'del') {	
	del($id);
}

function del($item) {
	global $db;
		$sql = $db->prepare("DELETE FROM companies WHERE id=".$item."");
        $sql->execute();
		$data = array ('parent_id'=>$item);
		$sql2 = $db->prepare("SELECT * FROM companies WHERE parent_id= :parent_id");
		$sql2->execute($data);
		$sql2->setFetchMode(PDO::FETCH_OBJ);
					$res=$sql2->fetchAll();
					foreach ($res as $row) {
						$sql = $db->prepare("DELETE FROM companies WHERE parent_id=".$row->parent_id."");
                        $sql->execute();
					}		
	}
$url = $_SERVER['HTTP_HOST'];
header('Location: http://'.$url); 

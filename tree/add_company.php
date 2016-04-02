<?php
include('pdo.php');
$c_name = $_GET["company-name"];
$parent_id = $_GET["choose"];
$earning = $_GET["earnings"];
$data = array ('parent_id'=>$parent_id, 'c_name'=>$c_name, 'earning'=>$earning);
$sql = $db->prepare("INSERT INTO companies(parent_id,c_name,earning) VALUES(:parent_id,:c_name,:earning)");
$sql->execute($data);
$url = $_SERVER['HTTP_REFERER'];
header('Location: '.$url); 
?>
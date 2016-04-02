<?php
include('pdo.php');
//$data = array ('id'=>$id, 'c_name'=>$c_name);
$sql = $db->prepare("SELECT id, c_name from companies");
$sql->execute();
$results = $sql->fetchAll(PDO::FETCH_ASSOC);
$json = json_encode($results);
echo($json);

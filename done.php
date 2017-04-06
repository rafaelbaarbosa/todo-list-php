<?php

require_once 'app/init.php';

if(isset($_GET['id'])){
	$id = $_GET['id'];

	$doneQuery = $db->prepare("
		UPDATE activities
		SET done = 1
		WHERE id = :id
	");

	$doneQuery->execute([
		'id' => $id
	]);
}

header("Location: index.php");

?>
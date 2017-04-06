<?php

require_once 'app/init.php';

if(isset($_GET['id'])){
	$id = $_GET['id'];

	$deleteQuery = $db->prepare("
		DELETE FROM activities
		WHERE id = :id
	");

	$deleteQuery->execute([
		'id' => $id
	]);
}

header("Location: index.php");

?>
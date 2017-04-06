<?php

require_once 'app/init.php';

if(isset($_POST['description'])){
	$description = trim($_POST['description']);

	if(!empty($description)){
		$insertQuery = $db->prepare("
			INSERT INTO activities (description, done)
			VALUES (:description, 0)
		");

		$insertQuery->execute([
			'description' => $description
		]);
	}
}

header('Location: index.php');

?>
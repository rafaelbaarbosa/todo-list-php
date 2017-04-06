<?php

require_once 'app/init.php';

$activitiesQuery = $db->prepare("
	SELECT id, description, done
	FROM activities
");

$activitiesQuery->execute();

$activities = $activitiesQuery->rowCount() ? $activitiesQuery : [];

?>

<!DOCTYPE html>
<html>

	<head>
		<meta charset="utf-8">
		<title>To do</title>

		<link rel="stylesheet" href="style.css">
		<link href="https://fonts.googleapis.com/css?family=Comfortaa" rel="stylesheet">

		<meta name="viewport" content="width=device-width, initial-scale=1.0">
	</head>

	<body>

		<div class="container">

			<h1>To do.</h1>

			<?php if(!empty($activities)): ?>

			<ul class="activities">

				<?php foreach($activities as $item): ?>
				<li>
					<span class="item<?php echo $item['done'] ? ' item-done' : '' ?>"><?php echo $item['description']; ?></span>

					<?php if(!$item['done']): ?>
						<a href="#" class="done-button">Done</a>
					<?php endif; ?>
					
					<a href="#" class="delete-button">Delete</a>
				</li>
				<?php endforeach; ?>

			</ul>
			<?php else: ?>
				<p>You haven't added any activities yet.</p>

			<?php endif; ?>

			<form class="item-add" action="insert.php" method="post">
				<input type="text" name="name" class="input" placeholder="Type your new activity here!" autocomplete="off" required>
				<input type="submit" value="Add" class="submit">
			</form>
		</div>

	</body>
</html>
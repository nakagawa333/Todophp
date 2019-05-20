<?php

require_once "init.php";


$user = $db->prepare("
	select id,name,done
	from Todo
	where user = :user
");

$user ->execute([
	"user" => $_SESSION["user_id"]
]);

$items = $user->rowCount() ? $user :[];

foreach($items as $item){
	echo $item->name,"<br>";
}


?>


<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

	<meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- icon -->
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.6.3/css/all.css" integrity="sha384-UHRtZLI+pbxtHCWp1t77Bi1L4ZtiqrqD80Kn4Z8NTSRyMA2Fd33n5dQ8lWUE00s/" crossorigin="anonymous">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">

    <!-- font5 -->
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.6.3/css/all.css" integrity="sha384-UHRtZLI+pbxtHCWp1t77Bi1L4ZtiqrqD80Kn4Z8NTSRyMA2Fd33n5dQ8lWUE00s/" crossorigin="anonymous">

    <link rel="stylesheet" type="text/css" href="{{ url_for('static', filename='main.css') }}">
	<title>Todo</title>
</head>

<body>
	<div class="container" style="margin:auto;">
		<div class="row" >
	<div class="list">
		<h1 class="header">To do.</h1>

		<?php if(!empty($items)): ?>
		<ul>
			<?php foreach($items as $item): ?>
			<li>
				<span class="item"><?php echo $item["name"]?></span>
				<a href="#" class="form-button">Mark as done</a>
			</li>
		<?php endforeach; ?>
		</ul>
		<?php else: ?>
			<p>You have'nt added any items yet.</p>
		<?php endif;?>

		<form class="item-add" action="add.php" method="post">
			<input type="text" name="name" placeholder="Type a new item here."autocomplete="off">
			<input type="submit" value="Add" class="submit">
		</form>
	</div>
</div>
	</div>

 <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
 <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
 <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
</body>
</html>

<style>
li{
	list-style:none;
}
</style>
<?php

require_once 'init.php';

if (isset($_POST["name"])){
	$name = trim($_POST["name"]);

	if(!empty($name)){
		$added = $db->prepare("
			insert into Todo (name.user,done,created)
			values (:name. :user,0,NOW())
			");

		$added->execute([
			'name' => $name,
			'user' => $_SESSION["user_id"]
		]);
	}


}
header("Location:Todo.php");  ##リダイレクト
?>
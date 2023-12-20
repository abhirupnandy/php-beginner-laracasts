<?php
	
	$config = require 'config.php';
	$db = new Database($config['database'], 'admin', 'admin@123');
	
	$heading = 'Note';
	
	$id = $_GET['id'];
	$user_id = 1;
	
	$note = $db -> query('SELECT * FROM myapp.notes WHERE id = :id', ['id' => $id]) -> findOrFail();
	
	authoorize($note['user_id'] === $user_id);
	
	require 'views/note.view.php';
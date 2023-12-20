<?php
	
	$config = require 'config.php';
	$db = new Database($config['database'], 'admin', 'admin@123');
	
	$heading = 'My Notes';
	
	$user_id = 2;
	
	$notes = $db -> query('SELECT * FROM myapp.notes WHERE user_id =:user_id', ['user_id' => $user_id]) -> get();
	
	
	require 'views/notes.view.php';
<?php
    session_start();
    unset($_SESSION["buname"]);
    session_destroy();
    echo json_encode(array(
		'username' => null
	));
    header('Location: index.html'); 
	exit();

?>
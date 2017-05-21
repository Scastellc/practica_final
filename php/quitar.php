<?php 
	/*		Para eliminar la session		*/
	session_start();
	session_destroy();
	unset($_SESSION);

	header("Location: ../index.php");
?>

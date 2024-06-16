<?php 
	
	session_start();
	
	session_destroy();
	
	header("location: http://localhost/ProyectoTICs/index.php?mod=21");
	
?>
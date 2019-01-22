<?php
	session_start();
	session_unset();
	unset($_COOKIE['esadmin']);
	unset($_COOKIE['nombre']); //destruir las coockies al cerrar sesion
	unset($_COOKIE['idusuario']); //destruir las coockies al cerrar sesion
	setcookie('esadmin', null, -1, '/');
	setcookie('nombre', null, -1, '/');  //como no las destruye se le establece de nuevo con NULO y tiempo negativo
	setcookie('idusuario', null, -1, '/');  //como no las destruye se le establece de nuevo con NULO y tiempo negativo
	session_destroy(); //destruir las sesiones
	header('Location: ../index.php');
?>
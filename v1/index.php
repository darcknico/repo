<?php
require 'vistas/VistaJson.php';
require 'datos/ConexionBD.php';
print $_GET['PATH_INFO'].'\n';
print ConexionBD::obtenerInstancia()->obtenerBD()->errorCode();

$peticion = explode('/', $_GET['PATH_INFO']);

//obtener recurso
$recurso = array_shift($peticion);
$recursos_existentes = array('contactos','usuarios');

//comprobar si existe el recurso
if (!in_array($recurso, $recursos_existentes)){
	//respuesta error
	print("recurso inexistente");
}

$metodo = strtolower($_SERVER['REQUEST_METHOD']);

switch ($metodo) {
	case 'get':
		// procesar metodo get
		break;
	case 'post':
		// procesar metodo post
		break;
	case 'put':
		//procesar metodo put
		break;
	case 'delete':
		//procesar metodo delete
		break;
	default:
		//metodo no aceptado
		break;
}

$vista = new VistaJson();

set_exception_handler(function ($exception) use ($vista) {
	$cuerpo = array (
		"estado"=>$exception->estado,
		"mensaje"=>$exception->getMenssage()
		);
	if($exception->getCode()) {
		$vista->estado=$exception->getCode();
	} else {
		$vista->estado = 500;
	}
	$vista->imprimir($cuerpo);
}
);
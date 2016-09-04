<?php

/**
*  Clase de excepcion que contenga el estado de error
*/
class ExcepcionApi extends Exception
{
	public $estado;

	function __construct($estado, $mensaje, $codigo = 400)
	{
		$this->estado = $estado;
		$this->message = $mensaje;
		$this->code = $codigo;
	}
}
<?php
//CREADO EN EL VIDEO "45 Yii Framework en Espanol PHP ACCIONES FILTROS Y CONTROLADOR PARTE 3"
class MiFiltro extends CFilter
{
	public $parametro1=null;
	
	function preFilter($filterChain)
	{
		
		$filterChain->run(); // para que siga otro filtro
		return true; // o false si no quieres que la accion se ejecute
	}
	function postFilter($filterChain)
	{
	
		
	}
}
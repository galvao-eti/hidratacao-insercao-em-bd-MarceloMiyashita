<?php
namespace Alfa;

class BancodeDados
{  
	public static $instancia;
	public $usuario;
	public $senha;
	public $host;
	public $base;

	public static function Singleton($u,$s,$h,$b)
	{
 		if(self::$instancia === null)
 		{
 			$class = __CLASS__;
 			self::$instancia = new $class($u,$s,$h,$b);
 		}
 		return self::$instancia;
	}

	private  function __construct($u,$s,$h,$b)
	{
		$dsn = 'mysql:dbname=' . $b .
	}
}
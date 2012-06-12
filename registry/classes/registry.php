<?php defined('SYSPATH') or die('No direct access allowed.');

class Registry extends ArrayObject
{
	private static $_registry=null;

	public static function getInstance()
	{	
		if(self::$_registry==null)
		{
			self::$_registry= new self();
		}
		return self::$_registry;
	}
	
	public  static function setInstance($oInstance=array())
	{
		self::$_registry=$oInstance;
	}
	
	public static function get($sKey=null,$default=null)
	{
		if($sKey!=null)
		{
			$oReg = Registry::getInstance();
			if (isset($oReg[$sKey]))
			{
				return $oReg[$sKey];
			}
			else
			{
				return ( ($default!=null) ? $default : null );
			}
		}
		else
		{
			return null;
		}	
	}
	
	public static function set($sKey,$value)
	{
		$oReg = self::getInstance();
		$oReg[$sKey]=$value;
		self::setInstance($oReg);
		return $oReg;
	}
	
	public static function fetchAllKeys()
	{
		$oReg = self::getInstance();
		return array_keys($oReg);
	}
	
	public static function fetchAllValues()
	{
		$oReg = self::getInstance();
		return array_values($oReg);
	}
	
	public static function isRegistered($sKey = null)
	{
		if($sKey!=null)
		{
			$oReg = self::getInstance();
			return array_key_exists($sKey, $oReg);
		}
		else
		{
			return false;	
		}
	}
}
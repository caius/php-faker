<?php

/**
* 
*/
class Phone_Number extends Faker
{
	/**
		* Do nothing on being instanced
		*
		* @return void
		* @author Caius Durling
		*/
		
	private static $_formats = array('+##(#)##########','+##(#)##########','0##########','0##########','###-###-####','(###)###-####','1-###-###-####','###.###.####','###-###-####','(###)###-####','1-###-###-####','###.###.####','###-###-####x###','(###)###-####x###','1-###-###-####x###','###.###.####x###','###-###-####x####','(###)###-####x####','1-###-###-####x####','###.###.####x####','###-###-####x#####','(###)###-####x#####','1-###-###-####x#####','###.###.####x#####');
	
	public function __construct()
	{
	}

	public function __get($var)
	{
		return $this->$var();
	}

	public function phone_number()
	{
		return parent::numerify( parent::random( self::$_formats ) );
	}
}


?>
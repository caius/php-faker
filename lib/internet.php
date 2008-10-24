<?php

/**
* Internet Class
*/
class Internet extends Faker
{
	/**
	 * Do nothing on being instanced
	 *
	 * @return void
	 * @author Caius Durling
	 */
	 
	private static $_domain_suffix = array('co.uk','com','us','org','ca','biz','info','name');
	private static $_free = array('gmail.com','googlemail.com','yahoo.com','hotmail.com','hotmail.co.uk');
	private static $_name_formats = array(array('first_name'),array('first_name','surname'));
	
	public function __construct()
	{
	}
	
	public function __get( $var )
	{
		if ( strpos( $var, "(" ) && strpos( $var, ")" ) ) {
			return $this->$var;
		} else {
			return $this->$var();
		}
	}
	
	public function domain_suffix()
	{
		return parent::random( self::$_domain_suffix );
	}
	
	public function domain_word()
	{
		$result = explode( ' ', parent::__get('Company')->name );
		$result = $result[0];
		$result = strtolower( $result );
		$result = preg_replace( "/\W/", '', $result );
		return $result;
	}
	
	public function domain_name()
	{
		$result[] = $this->domain_word;
		$result[] = $this->domain_suffix;
		return join( $result, '.' );
	}
	
	public function user_name( $name = null )
	{
		if ( $name ) {
			return $this->sanitise_name( $name );
		}
		
		// get first_name, surname
		$n = parent::__get('Name');
		$a = parent::random( self::$_name_formats );
		
		foreach ( $a as $method ) {
			$na[] = $n->$method;
		}
		
		// run sanitise_name()
		$na = join( ' ', $na );
		$result = $this->sanitise_name( $na );
		return $result;
	}
	
	public function email( $name = null)
	{
		return join( array( $this->user_name($name), $this->domain_name() ), "@" );
	}
	
	public function free_email( $name = null)
	{
		return join( array( $this->user_name($name), parent::random( self::$_free ) ), "@" );
	}
	
	protected function sanitise_name( $name )
	{
		$name = strtolower( $name );
		$n = explode(' ', $name );
		$n = preg_replace("/\W/", "", $n);
		$d = array( '.', '_');
		// Randomise the array order
		shuffle( $n );
		return join( $n, parent::random( $d ) );
	}
	
}

?>
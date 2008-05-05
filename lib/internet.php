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
		$domains = array( 'co.uk', 'com', 'us', 'org', 'ca', 'biz', 'info', 'name' );
		return parent::random( $domains );
	}
	
	public function domain_word()
	{
		$com = new Company;
		$result = explode( ' ', $com->name );
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
		$formats = array(
				array( 'first_name' ),
				array( 'first_name', 'surname' )
			);
		$n = new Name;
		
		$a = parent::random( $formats );
		
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
		$free = array( 'gmail.com', 'googlemail.com', 'yahoo.com', 'hotmail.com', 'hotmail.co.uk' );
		return join( array( $this->user_name($name), parent::random( $free ) ), "@" );
	}
	
	protected function sanitise_name( $name )
	{
		// Downcase it
		$name = strtolower( $name );
		// Replace spaces with either . or _
		$n = explode( ' ', $name );
		
		$n = array_map( create_function( '$name', 'return preg_replace( "/\W/", "", $name );' ), $n );
		
		$d = array( '.', '_');
		// Randomise the array order
		shuffle( $n );
		return join( $n, parent::random( $d ) );
	}
	
}

?>
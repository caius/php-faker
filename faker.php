<?php

/**
 * Class for generating fake data
 * 
 * @package Faker
 * @version 0.1-dev
 * @copyright 2007 Caius Durling
 * @author Caius Durling
 * 
 */

/**
* Faker Class
* 
* @package Faker
*/
class Faker
{
	public function __construct()
	{
	}
	
	public function __tostring()
	{
		return "";
	}
		
	public function __get( $var )
	{
		return new $var;
	}
	
	// todo: use __autoload()
	
	/**
	 * Returns a random element from a passed array
	 *
	 * @param array $array 
	 * @return string
	 * @author Caius Durling
	 */	
	protected function random( &$array )
	{
		return $array[ array_rand( $array ) ];
	}
	
	/**
	 * Returns a random number between 0 and 9
	 *
	 * @return integer
	 * @author Caius Durling
	 */
	protected function rand_num()
	{
		$a = range( 0, 9 );
		return $this->random( $a );
	}
	
	/**
	 * Returns a random letter from a to z
	 *
	 * @return string
	 * @author Caius Durling
	 */
	protected function rand_letter()
	{
		$a = range( 'a', 'z' );
		return $this->random( $a );
	}
	
	
	/**
	 * Replaces all occurrences of # with a random number
	 *
	 * @param string $string String you wish to have parsed
	 * @return string
	 * @author Caius Durling
	 */
	public function numerify( $string )
	{
		foreach ( str_split( $string ) as $char ) {
			$result[] = str_replace( '#', $this->rand_num(), $char );
		}
		return join( $result );
	}
	
	/**
	 * Replaces all occurrences of ? with a random letter
	 *
	 * @param string $string String you wish to have parsed
	 * @return string
	 * @author Caius Durling
	 */
	public function lexify( $string )
	{
		foreach ( str_split( $string ) as $char ) {
			$result[] = str_replace( '?', $this->rand_letter(), $char );
		}
		return join( $result );
	}
	
	/**
	 * Replaces all occurrences of # with a random number and
	 * replaces all occurrences of ? with a random letter
	 *
	 * @param string $string String you wish to have parsed
	 * @return string
	 * @author Caius Durling
	 */
	public function bothify( $string )
	{
		$result = $this->numerify( $string );
		$result = $this->lexify( $result );
		return $result;
	}
	
}

// Include the library files
include 'lib/address.php';
include 'lib/company.php';
include 'lib/internet.php';
include 'lib/name.php';
include 'lib/phone_number.php';
include 'lib/lorem.php';

?>
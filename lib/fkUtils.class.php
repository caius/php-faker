<?php

/**
 * Class for generating fake data
 * 
 * @package Faker
 * @version 0.2
 * @copyright 2007 Caius Durling
 * @author Caius Durling
 * @author ifunk
 * @author FionaSarah
 * 
 */

/**
 * Faker Class
 * 
 * @package Faker
 */
class fkUtils
{

  public static $instance;

  public static function getInstance ()
  {
    return self::$instance ? self::$instance : self::$instance = new self();
  }

  /**
   * Returns a random element from a passed array
   *
   * @param array $array 
   * @return string
   * @author Caius Durling
   */
  public function random (&$array)
  {
    return $array[mt_rand(0, count($array) - 1)];
  }

  /**
   * Returns a random number between 0 and 9
   *
   * @return integer
   * @author Caius Durling
   */
  public function randNum ()
  {
    return mt_rand(0, 9);
  }

  /**
   * Returns a random letter from a to z
   *
   * @return string
   * @author Caius Durling
   */
  public function randLetter ()
  {
    return chr(mt_rand(97, 122));
  }

  /**
   * Replaces all occurrences of # with a random number
   *
   * @param string $string String you wish to have parsed
   * @return string
   * @author Caius Durling
   */
  public function numerify ($string)
  {
    foreach (str_split($string) as $char) {
      $result[] = str_replace('#', $this->randNum(), $char);
    }
    return join($result);
  }

  /**
   * Replaces all occurrences of ? with a random letter
   *
   * @param string $string String you wish to have parsed
   * @return string
   * @author Caius Durling
   */
  public function lexify ($string)
  {
    foreach (str_split($string) as $char) {
      $result[] = str_replace('?', $this->randLetter(), $char);
    }
    return join($result);
  }

  /**
   * Replaces all occurrences of # with a random number and
   * replaces all occurrences of ? with a random letter
   *
   * @param string $string String you wish to have parsed
   * @return string
   * @author Caius Durling
   */
  public function bothify ($string)
  {
    $result = $this->numerify($string);
    $result = $this->lexify($result);
    return $result;
  }
  
  function __set ($property, $value)
  {
    throw new Exception('Unknow property "' . $property . '"');
  }

}

?>
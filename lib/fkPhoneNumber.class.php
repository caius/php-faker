<?php

/**
 * 
 */
class fkPhoneNumber
{

  /**
   * Do nothing on being instanced
   *
   * @return void
   * @author Caius Durling
   */
  
  private static $_formats = array('+##(#)##########', '+##(#)##########', '0##########', '0##########', 
  '###-###-####', '(###)###-####', '1-###-###-####', '###.###.####', '###-###-####', '(###)###-####', 
  '1-###-###-####', '###.###.####', '###-###-####x###', '(###)###-####x###', '1-###-###-####x###', 
  '###.###.####x###', '###-###-####x####', '(###)###-####x####', '1-###-###-####x####', '###.###.####x####', 
  '###-###-####x#####', '(###)###-####x#####', '1-###-###-####x#####', '###.###.####x#####');

  public function phoneNumber ()
  {
    return fkUtils::getInstance()->numerify(fkUtils::getInstance()->random(self::$_formats));
  }
  
  function __set ($property, $value)
  {
    throw new Exception('Unknow property "' . $property . '"');
  }
}

?>
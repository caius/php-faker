<?php

/**
 * @author Stéphane R. Robert
 */
class fkDate
{
  
  /**
   * 
   * @return string A random date
   */
  public function date()
  {
    return date("m-d-Y", 
      mktime(
        rand(0,23), 
        rand(0,59), 
        rand(0,59)
    ));
  }
  
  /**
   * @return string A random datetime
   */
  public function dateTime()
  {
    return date("m-d-Y H:i:s", 
      mktime(
        rand(0,23), 
        rand(0,59), 
        rand(0,59), 
        rand(1,12), 
        rand(1,31), 
        rand(1900, 2020)
    ));
  }
}

?>
<?php

/**
 * Internet Class
 */
class fkInternet
{

  /**
   * Do nothing on being instanced
   *
   * @return void
   * @author Caius Durling
   */
  
  private static $_domainSuffix = array('co.uk', 'com', 'us', 'org', 'ca', 'biz', 'info', 'name');

  private static $_free = array('gmail.com', 'googlemail.com', 'yahoo.com', 'hotmail.com', 'hotmail.co.uk');

  private static $_name_formats = array(array('firstName'), array('firstName', 'surname'));

  public function domainSuffix ()
  {
    return fkUtils::getInstance()->random(self::$_domainSuffix);
  }

  public function domainWord ()
  {
    $result = explode(' ', Faker::company()->name());
    $result = $result[0];
    $result = strtolower($result);
    $result = preg_replace("/\W/", '', $result);
    return $result;
  }

  public function domainName ()
  {
    $result[] = $this->domainWord();
    $result[] = $this->domainSuffix();
    return join($result, '.');
  }

  public function userName ($name = null)
  {
    if ($name) {
      return $this->sanitiseName($name);
    }
    
    // get first_name, surname
    $n = Faker::name();
    $a = fkUtils::getInstance()->random(self::$_name_formats);
    
    foreach ($a as $method) {
      $na[] = $n->$method();
    }
    
    // run sanitiseName()
    $na = join(' ', $na);
    $result = $this->sanitiseName($na);
    return $result;
  }

  public function email ($name = null)
  {
    return join(array($this->userName($name), $this->domainName()), "@");
  }

  public function freeEmail ($name = null)
  {
    return join(array($this->userName($name), fkUtils::getInstance()->random(self::$_free)), "@");
  }

  protected function sanitiseName ($name)
  {
    $name = strtolower($name);
    $n = explode(' ', $name);
    $n = preg_replace("/\W/", "", $n);
    $d = array('.', '_');
    // Randomise the array order
    shuffle($n);
    return join($n, fkUtils::getInstance()->random($d));
  }
  
  function __set ($property, $value)
  {
    throw new Exception('Unknow property "' . $property . '"');
  }

}

?>
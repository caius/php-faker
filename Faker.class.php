<?php
require_once dirname(__FILE__) . '/autoload.php';

final class Faker
{

  function __set ($property, $value)
  {
    throw new Exception('Unknow property "' . $property . '"');
  }

  private static $address;

  public static function address ()
  {
    return self::$address ? self::$address : self::$address = new fkAddress();
  }

  private static $company;

  public static function company ()
  {
    return self::$company ? self::$company : self::$company = new fkCompany();
  }

  private static $internet;

  public static function internet ()
  {
    return self::$internet ? self::$internet : self::$internet = new fkInternet();
  }

  private static $lorem;

  public static function lorem ()
  {
    return self::$lorem ? self::$lorem : self::$lorem = new fkLorem();
  }

  private static $name;

  public static function name ()
  {
    return self::$name ? self::$name : self::$name = new fkName();
  }

  private static $phone;

  public static function phoneNumber ()
  {
    return self::$phone ? self::$phone : self::$phone = new fkPhoneNumber();
  }
  
  private static $date;

  public static function date ()
  {
    return self::$date ? self::$date : self::$date = new fkDate();
  }
}
<?php

function fk_faker_autoload($class)
{
  require_once dirname(__FILE__) . "/lib/$class.class.php";
}

spl_autoload_register('fk_faker_autoload');
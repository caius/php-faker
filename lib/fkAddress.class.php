<?php

/**
 * Address Class
 * 
 * @package faker
 */
class fkAddress
{

  /**
   * Do nothing on being created
   *
   * @return void
   * @author Caius Durling
   */
  
  private static $_us_states = array('Alabama', 'Alaska', 'Arizona', 'Arkansas', 'California', 'Colorado', 
  'Connecticut', 'Delaware', 'Florida', 'Georgia', 'Hawaii', 'Idaho', 'Illinois', 'Indiana', 'Iowa', 'Kansas', 
  'Kentucky', 'Louisiana', 'Maine', 'Maryland', 'Massachusetts', 'Michigan', 'Minnesota', 'Mississippi', 
  'Missouri', 'Montana', 'Nebraska', 'Nevada', 'NewHampshire', 'NewJersey', 'NewMexico', 'NewYork', 
  'NorthCarolina', 'NorthDakota', 'Ohio', 'Oklahoma', 'Oregon', 'Pennsylvania', 'RhodeIsland', 'SouthCarolina', 
  'SouthDakota', 'Tennessee', 'Texas', 'Utah', 'Vermont', 'Virginia', 'Washington', 'WestVirginia', 'Wisconsin', 
  'Wyoming');

  private static $_us_states_abbr = array('AL', 'AK', 'AS', 'AZ', 'AR', 'CA', 'CO', 'CT', 'DE', 'DC', 'FM', 'FL', 
  'GA', 'GU', 'HI', 'ID', 'IL', 'IN', 'IA', 'KS', 'KY', 'LA', 'ME', 'MH', 'MD', 'MA', 'MI', 'MN', 'MS', 'MO', 
  'MT', 'NE', 'NV', 'NH', 'NJ', 'NM', 'NY', 'NC', 'ND', 'MP', 'OH', 'OK', 'OR', 'PW', 'PA', 'PR', 'RI', 'SC', 
  'SD', 'TN', 'TX', 'UT', 'VT', 'VI', 'VA', 'WA', 'WV', 'WI', 'WY', 'AE', 'AA', 'AP');

  private static $_us_zipcode_formats = array('#####', '#####-####');

  private static $_street_suffix = array('Alley', 'Avenue', 'Branch', 'Bridge', 'Brook', 'Brooks', 'Burg', 
  'Burgs', 'Bypass', 'Camp', 'Canyon', 'Cape', 'Causeway', 'Center', 'Centers', 'Circle', 'Circles', 'Cliff', 
  'Cliffs', 'Club', 'Common', 'Corner', 'Corners', 'Course', 'Court', 'Courts', 'Cove', 'Coves', 'Creek', 
  'Crescent', 'Crest', 'Crossing', 'Crossroad', 'Curve', 'Dale', 'Dam', 'Divide', 'Drive', 'Drive', 'Drives', 
  'Estate', 'Estates', 'Expressway', 'Extension', 'Extensions', 'Fall', 'Falls', 'Ferry', 'Field', 'Fields', 
  'Flat', 'Flats', 'Ford', 'Fords', 'Forest', 'Forge', 'Forges', 'Fork', 'Forks', 'Fort', 'Freeway', 'Garden', 
  'Gardens', 'Gateway', 'Glen', 'Glens', 'Green', 'Greens', 'Grove', 'Groves', 'Harbor', 'Harbors', 'Haven', 
  'Heights', 'Highway', 'Hill', 'Hills', 'Hollow', 'Inlet', 'Inlet', 'Island', 'Island', 'Islands', 'Islands', 
  'Isle', 'Isle', 'Junction', 'Junctions', 'Key', 'Keys', 'Knoll', 'Knolls', 'Lake', 'Lakes', 'Land', 'Landing', 
  'Lane', 'Light', 'Lights', 'Loaf', 'Lock', 'Locks', 'Locks', 'Lodge', 'Lodge', 'Loop', 'Mall', 'Manor', 
  'Manors', 'Meadow', 'Meadows', 'Mews', 'Mill', 'Mills', 'Mission', 'Mission', 'Motorway', 'Mount', 'Mountain', 
  'Mountain', 'Mountains', 'Mountains', 'Neck', 'Orchard', 'Oval', 'Overpass', 'Park', 'Parks', 'Parkway', 
  'Parkways', 'Pass', 'Passage', 'Path', 'Pike', 'Pine', 'Pines', 'Place', 'Plain', 'Plains', 'Plains', 'Plaza', 
  'Plaza', 'Point', 'Points', 'Port', 'Port', 'Ports', 'Ports', 'Prairie', 'Prairie', 'Radial', 'Ramp', 'Ranch', 
  'Rapid', 'Rapids', 'Rest', 'Ridge', 'Ridges', 'River', 'Road', 'Road', 'Roads', 'Roads', 'Route', 'Row', 'Rue', 
  'Run', 'Shoal', 'Shoals', 'Shore', 'Shores', 'Skyway', 'Spring', 'Springs', 'Springs', 'Spur', 'Spurs', 
  'Square', 'Square', 'Squares', 'Squares', 'Station', 'Station', 'Stravenue', 'Stravenue', 'Stream', 'Stream', 
  'Street', 'Street', 'Streets', 'Summit', 'Summit', 'Terrace', 'Throughway', 'Trace', 'Track', 'Trafficway', 
  'Trail', 'Trail', 'Tunnel', 'Tunnel', 'Turnpike', 'Turnpike', 'Underpass', 'Union', 'Unions', 'Valley', 
  'Valleys', 'Via', 'Viaduct', 'View', 'Views', 'Village', 'Village', 'Villages', 'Ville', 'Vista', 'Vista', 
  'Walk', 'Walks', 'Wall', 'Way', 'Ways', 'Well', 'Wells');

  private static $_uk_counties = array('Avon', 'Bedfordshire', 'Berkshire', 'Borders', 'Buckinghamshire', 
  'Cambridgeshire', 'Central', 'Cheshire', 'Cleveland', 'Clwyd', 'Cornwall', 'CountyAntrim', 'CountyArmagh', 
  'CountyDown', 'CountyFermanagh', 'CountyLondonderry', 'CountyTyrone', 'Cumbria', 'Derbyshire', 'Devon', 
  'Dorset', 'DumfriesandGalloway', 'Durham', 'Dyfed', 'EastSussex', 'Essex', 'Fife', 'Gloucestershire', 
  'Grampian', 'GreaterManchester', 'Gwent', 'GwyneddCounty', 'Hampshire', 'Herefordshire', 'Hertfordshire', 
  'HighlandsandIslands', 'Humberside', 'IsleofWight', 'Kent', 'Lancashire', 'Leicestershire', 'Lincolnshire', 
  'Lothian', 'Merseyside', 'MidGlamorgan', 'Norfolk', 'NorthYorkshire', 'Northamptonshire', 'Northumberland', 
  'Nottinghamshire', 'Oxfordshire', 'Powys', 'Rutland', 'Shropshire', 'Somerset', 'SouthGlamorgan', 
  'SouthYorkshire', 'Staffordshire', 'Strathclyde', 'Suffolk', 'Surrey', 'Tayside', 'TyneandWear', 
  'Warwickshire', 'WestGlamorgan', 'WestMidlands', 'WestSussex', 'WestYorkshire', 'Wiltshire', 'Worcestershire');

  private static $_uk_countries = array('England', 'Scotland', 'Wales', 'Northern Ireland');

  private static $_uk_postcode_formats = array('??## #??', '??# #??');

  private static $_street_name_formats = array('firstName', 'surname');

  public function streetSuffix ()
  {
    return fkUtils::getInstance()->random(self::$_street_suffix);
  }

  public function streetName ()
  {
    $method = fkUtils::getInstance()->random(self::$_street_name_formats);
    $result[] = Faker::name()->$method();
    $result[] = self::streetSuffix();
    return implode($result, " ");
  }

  public function streetAddress ()
  {
    return fkUtils::getInstance()->numerify(implode(" ", array('#####', self::streetName())));
  }

  public function abodeAddress ($include_street = false)
  {
    if ($include_street) {
      $str[] = '#####';
    }
    $formats = array('Apt. ###', 'Suite ###');
    $str[] = fkUtils::getInstance()->random($formats);
    if ($include_street) {
      $str[] = self::streetName();
    }
    return fkUtils::getInstance()->numerify(implode(" ", $str));
  }

  ######### UK Only ###########
  

  public function ukCounty ()
  {
    return fkUtils::getInstance()->random(self::$_uk_counties);
  }

  public function ukCountry ()
  {
    return fkUtils::getInstance()->random(self::$_uk_countries);
  }

  public function postCode ()
  {
    $a = fkUtils::getInstance()->random(self::$_uk_postcode_formats);
    $result = fkUtils::getInstance()->bothify($a);
    return strtoupper($result);
  }

  ###### American Only ########
  

  public function usState ()
  {
    return fkUtils::getInstance()->random(self::$_us_states);
  }

  public function usStateAbbr ()
  {
    return fkUtils::getInstance()->random(self::$_us_states_abbr);
  }

  public function zipCode ()
  {
    $a = fkUtils::getInstance()->random(self::$_us_zipcode_formats);
    $result = fkUtils::getInstance()->numerify($a);
    return $result;
  }
  
  function __set ($property, $value)
  {
    throw new Exception('Unknow property "' . $property . '"');
  }
}
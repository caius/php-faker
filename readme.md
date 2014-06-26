# Faker

Faker is a package that generates random fake data for you.

Requirements:

* PHP5

To use it simply call the Faker facade.

eg:
  
  <?php
    // Do this so it can find the classes needed
    include( 'Faker.class.php' );
    // Output a random lorem sentence, using an instance of fkLorem
    echo Faker::lorem()->sentence();
  ?>

You only need to include `Faker.class.php` as it autoload all the files under lib/ automatically as they are needed.

## CHANGELOG

* 0.4
  Updates by Stéphane R. Richard

  Deep refactoring, involving :
  - Files, classes and methods names
  - No more inheritance from Faker
  - Moved Faker to fkUtils
  - Added a facade class Faker, which provides roughly the same API as the old Faker class
  - No more \_\_get() and \_\_set() magic, use of explicit methods call instead

  Added SPL autoloading

* 0.3
  Updates by Fiona

* 0.2
  Updates by Adam for speed using PHP native functions and static variables

  > From my own tests it performs roughly 10x faster than 0.1-dev -- ifunk

* 0.1-dev
  Initial Release

## LICENCE

Released under the MIT Licence

Copyright (c) 2008 Caius Durling  
Portions Copyright (c) 2008 Adam Royle  
Portions Copyright (c) 2008 Fiona Burrows  
Portions Copyright (c) 2010 Stéphane R. Richard  

Permission is hereby granted, free of charge, to any person obtaining a copy of this software and associated documentation files (the "Software"), to deal in the Software without restriction, including without limitation the rights to use, copy, modify, merge, publish, distribute, sublicense, and/or sell copies of the Software, and to permit persons to whom the Software is furnished to do so, subject to the following conditions:

* The above copyright notice and this permission notice shall be included in all copies or substantial portions of the Software.

THE SOFTWARE IS PROVIDED "AS IS", WITHOUT WARRANTY OF ANY KIND, EXPRESS OR IMPLIED, INCLUDING BUT NOT LIMITED TO THE WARRANTIES OF MERCHANTABILITY, FITNESS FOR A PARTICULAR PURPOSE AND NONINFRINGEMENT. IN NO EVENT SHALL THE AUTHORS OR COPYRIGHT HOLDERS BE LIABLE FOR ANY CLAIM, DAMAGES OR OTHER LIABILITY, WHETHER IN AN ACTION OF CONTRACT, TORT OR OTHERWISE, ARISING FROM, OUT OF OR IN CONNECTION WITH THE SOFTWARE OR THE USE OR OTHER DEALINGS IN THE SOFTWARE.

See http://github.com/caius/php-faker for contact details.  

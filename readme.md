***
This fork of php-faker is based on Caius Durling's php-faker:
http://github.com/caius/php-faker/commit/5a5ef830c6fc887b1824e211a03f3fc0ada45700

From my own tests it performs roughly 10x faster than Caius' version.

Enjoy.

- ifunk
***



Faker is a package that generates random fake data for you.

Requirements:

* PHP5

To use it simply create a new faker object and then call a subclass & method.

eg:
	
	<?php
		// Do this so it can find the classes needed
		include( 'faker.php' );
		// Create new faker object
		$faker = new Faker;
		// Output a random name
		echo $faker->Name->name;
	?>

You only need to include `faker.php` as it includes all the files under lib/ automatically.

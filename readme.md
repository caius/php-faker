# Faker Readme
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

***

# Version History


* 0.2
	Updates by ifunk for speed using PHP native functions and static variables
	> From my own tests it performs roughly 10x faster than 0.1-dev -- ifunk

* 0.1-dev
	Initial Release
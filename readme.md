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

<?php require_once 'Faker.class.php'; ?>
<html>
	<head>
		<title>Generating random data</title>
	</head>
	<body>
		
		<?php
		$arr = array(
			'name' => array(
					'name',
					'firstName',
					'surname',
					'prefix',
					'suffix',
				),
			'address' => array(
					'streetSuffix',
					'streetName',
					'streetAddress',
					'abodeAddress',
					array( 'abodeAddress', true ),
					'ukCounty',
					'ukCountry',
					'postCode',
					'usState',
					'usStateAbbr',
					'zipCode'
				),
			'phoneNumber' => array(
					'phoneNumber'
				),
			'company' => array(
					'name',
					'suffix',
					'catchPhrase',
					'bs',
				),
			'internet' => array(
					'domainSuffix',
					'domainWord',
					'domainName',
					'userName',
					array( 'userName', 'caius durling' ),
					'email',
					array( 'email', 'caius durling' ),
					'freeEmail',
					array( 'freeEmail', 'caius durling' ),
				),
			'lorem' => array(
					'words',
					'sentence',
					'sentences',
					'paragraph',
					'paragraphs',
				)
			);
?>

	<table>
		<legend>Faker::</legend>
		<tr>
			<th>PHP Statement</th>
			<th>Output</th>
		</tr>
		<?php for ($i = 0; $i < 10; $i++):?>
  		<?php
  		foreach ($arr as $class => $methods) {
  			foreach ($methods as $method) {
  				if ( is_array( $method ) ) {
  					?>
  						<tr>
  							<td>Faker::<?php echo $class ?>-><?php echo $method[0] ?>( <?php echo $method[1] ?> )</td>
  							<?php if ( strpos( $method[1], "'" ) ): ?>
  								<td><?php echo call_user_func(array('Faker', $class))->$method[0]( '$method[1]' ) ?></td>
  							<?php else: ?>
  								<td><?php echo call_user_func(array('Faker', $class))->$method[0]( $method[1] ) ?></td>
  							<?php endif ?>
  						</tr>
  					<?php
  				} else {
  				?>
  					<tr>
  						<td>Faker::<?php echo $class ?>-><?php echo $method ?>()</td>
  						<td><?php echo call_user_func(array('Faker', $class))->$method() ?></td>
  					</tr>
  				<?php
  				}
  			}
  		}
  	
  		?>
		<?php endfor;?>
	
	</table>
		
</body>
</html>
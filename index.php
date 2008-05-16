<?php include 'faker.php'; ?><html>
	<head>
		<title>Generating random data</title>
	</head>
	<body>
		
		<?php
		$arr = array(
			'Name' => array(
					'name',
					'first_name',
					'surname',
					'prefix',
					'suffix',
				),
			'Address' => array(
					'street_suffix',
					'street_name',
					'street_address',
					'abode_address',
					array( 'abode_address', true ),
					'uk_county',
					'uk_country',
					'post_code',
					'us_state',
					'us_state_abbr',
					'zip_code'
				),
			'Phone_Number' => array(
					'phone_number'
				),
			'Company' => array(
					'name',
					'suffix',
					'catch_phrase',
					'bs',
				),
			'Internet' => array(
					'domain_suffix',
					'domain_word',
					'domain_name',
					'user_name',
					array( 'user_name', 'caius durling' ),
					'email',
					array( 'email', 'caius durling' ),
					'free_email',
					array( 'free_email', 'caius durling' ),
				),
			'Lorem' => array(
					'words',
					'sentence',
					'sentences',
					'paragraph',
					'paragraphs',
				)
			);
?>

	<table>
		<legend>$f = new Faker</legend>
		<tr>
			<th>PHP Statement</th>
			<th>Output</th>
		</tr>
	
		<?php
	
		$f = new Faker;
	
		foreach ($arr as $class => $methods) {
			foreach ($methods as $method) {
				if ( is_array( $method ) ) {
					?>
						<tr>
							<td>$f-><?php echo $class ?>-><?php echo $method[0] ?>( <?php echo $method[1] ?> )</td>
							<?php if ( strpos( $method[1], "'" ) ): ?>
								<td><?php echo $f->$class->$method[0]( '$method[1]' ) ?></td>
							<?php else: ?>
								<td><?php echo $f->$class->$method[0]( $method[1] ) ?></td>
							<?php endif ?>
						</tr>
					<?php
				} else {
				?>
					<tr>
						<td>$f-><?php echo $class ?>-><?php echo $method ?></td>
						<td><?php echo $f->$class->$method ?></td>
					</tr>
				<?php
				}
			}
		}
	
		?>
	
	</table>
		
</body>
</html>
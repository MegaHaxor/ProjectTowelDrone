<html>
<head>
<style>

table {
	/* #width: 100%; */
}

table, th, td {
	border: 1px solid black;
	border-collapse: collapse;
}

</style>
</head>

<body>
<?php
	include 'Spyc.php';

	$debug = true;	// cant be changed lol

	$filename = 'data.json';

	$json_file = fopen($filename, 'r');

	$json = file_get_contents($filename);

	fclose($json_file);

	if ($debug) {
		echo '<p>file contents: ', $json, '<br> <br>';

		$sensor_data = json_decode($json);
		echo 'json converted to object: ';
		var_dump($sensor_data);
		echo '<br> <br>';

		$associative = true;
		$sensor_data = json_decode($json, $associative);
		echo 'json converted to associative array: ';
		var_dump($sensor_data);
		echo '<br> <br> </p>';
	}

	echo '<table> <thead> <tr> ';
	foreach ($sensor_data as $key => $value) {
		echo '<th> ' . $key . ' </th>';
	}
	echo '</tr> </thead>';

	echo '<tbody> <tr> ';
	foreach ($sensor_data as $key => $value) {
		echo '<td> ' . $value . ' </td>';
	}
	echo '</tr> </tbody> </table>';
	echo '<br> ';

	if($debug) {
		echo '<p>Python config converted to php: ';
		$config = spyc_load_file('config.yaml');
		var_dump($config);
		echo '</p>';

		echo "<p hidden> After much research I have learned that my parser, spyc, is 
			not treating the 2nd line from python's output as a child of the 
			first node because of the indentation of the leading '-'. It is
			on the same indentation so it is treated as the next entry in the 
			sequence. Pyyaml treats the '-' as part of the indentation, though.
			I think this is because spyc supports yaml 1.0 and not 1.1. This is
			mostly here as a reminder to my future self. I think we should either both 
			use libYAML (C library), convert yaml to json before sending it 
			around, or use json directly. Json is so much nicer than yaml. </p>";


		echo '<p>my_config converted to php: ';
		$config = spyc_load_file('my_config.yaml');
		var_dump($config);
		echo '</p>';

	}

	echo '<form method="POST" id="config">';
	foreach ($config[0] as $device => $settings) {
		echo "<p> $device settings</p>";
		foreach ($settings as $name => $setting) {
			echo '<label for="' . $name . '">' . $name . '</label>';
			echo '<input type="text" id="' . $name . '">';
			echo '<br><br>';
		}
	}
	echo '<input type="submit">'; 

	echo '</form>';
?>
</body>
</html>

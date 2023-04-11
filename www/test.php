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

	$debug = false;

	$filename = 'data.json';

	$json_file = fopen($filename, 'r');

	$json = file_get_contents($filename);

	fclose($json_file);

	$sensor_data_obj = json_decode($json);
	$associative = true;

	$sensor_data = json_decode($json, $associative);

	if ($debug) {
		echo '<p>file contents: ', $json, '<br> <br>';

		echo 'json converted to object: ';
		var_dump($sensor_data_obj);
		echo '<br> <br>';

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

	$config_file = "my_config.json";
	$config_json = file_get_contents($config_file);
	$config = json_decode($config_json, $associative=false);
	if($debug) {
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
		var_dump($config);
		echo '<br>json error message: ' . json_last_error_msg();
		echo '</p>';

	}

	echo '<form method="post" action="configSubmit.php" id="config">';
	
	if (is_array($config)) {
		$config = $config[0];
	}
	
	foreach ($config as $device => $settings) {
		echo "<p> $device settings</p>";
		
		if (is_array($settings)) {
			$settings = $settings[0];
		}
		
		foreach ($settings as $name => $setting) {
			if (!is_array($setting) and !is_object($setting)) {
				if (is_bool($setting)) {
					echo '<label for="' . $device . '[' . $name . ']">' . $name . '</label>';
					echo '<select name="' . $device . '[' . $name . ']">';
					echo '<option>true</option>';
					$selected = $setting ? "" : "selected";
					echo "<option $selected>false</option>"; 
					echo "</select>";
					echo '<br><br>';
				}
				else {
					echo '<label for="' . $device . '[' . $name . ']">' . $name . '</label>';
					echo '<input type="text" name="' . $device . '[' . $name . ']" value="' . $setting . '">';
					echo '<br><br>';
				}
			}
		}
	}
	echo '<input type="submit">'; 

	echo '</form>';
?>
</body>
</html>

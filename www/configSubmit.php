<html>
<?php
/*
	echo "Server request method: " . $_SERVER["REQUEST_METHOD"] . "<br>";
	echo "isset post: " . isset($_POST) . '<br>';
	echo "POST dump: <br>";
	echo "<pre>";
	print_r($_POST);
	var_dump($_POST);
 */
	// convert some cases to bool types
	foreach($_POST as $device => $settings) {
		foreach ($settings as $set_name => $setting) {
			if ($setting == "true") {
				$_POST[$device][$set_name] = true;
			}
			else if ($setting == "false") {
				$_POST[$device][$set_name] = false;
			}
		}
	}

	echo "<p> new config file:</p>";
	echo "<pre>";
	echo $out_json = json_encode($_POST, JSON_PRETTY_PRINT | JSON_NUMERIC_CHECK);
	echo "</pre>";

	$config_file = fopen("my_out_config.json", "w");
	fwrite($config_file, $out_json);
	fclose($config_file);

?>
</html>

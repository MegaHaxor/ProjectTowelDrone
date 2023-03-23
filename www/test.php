<html>
<head>
<style>

table {
	width: 100%;
}

table, th, td {
	border: 1px solid black;
	border-collapse: collapse;
}

</style>
</head>

<body>
<?php
	$debug = true;

	$filename = "data.json";

	$json_file = fopen($filename, "r");

	$json = file_get_contents($filename);

	fclose($json_file);

	if ($debug) {
		echo "file contents: ", $json, "<br> <br>";

		$sensor_data = json_decode($json);
		echo "json converted to object: ";
		var_dump($sensor_data);
		echo "<br> <br>";

		$associative = true;
		$sensor_data = json_decode($json, $associative);
		echo "json converted to associative array: ";
		var_dump($sensor_data);
		echo "<br> <br>";
	}

	echo "<table> <tr> ";
	foreach ($sensor_data as $key => $value) {
		echo "<th> " . $key . " </th>";
	}
	echo "</tr>";

	echo "<tr> ";
	foreach ($sensor_data as $key => $value) {
		echo "<td> " . $value . " </td>";
	}
	echo "</tr";


?>
</body>
</html>

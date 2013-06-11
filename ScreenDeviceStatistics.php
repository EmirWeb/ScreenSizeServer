<?php

include 'Constants.php';

$query = "SELECT * FROM " . $TABLE_NAME_DEVICE_INFORMATION . " NATURAL JOIN " . $TABLE_NAME_SCREEN_DETAILS . ";";

$database = new mysqli($URL, $USER_NAME, $PASSWORD, $DATABASE);
$results = $database->query($query);

?>
<html>
<body>

<?php
while ($row = $results->fetch_assoc()){
	$count = $row[$TABLE_COLUMN_NAME_COUNT];
	include 'ExtractDeviceInformation.php';
	
	$deviceInofmationId = $row[$TABLE_COLUMN_NAME_DEVICE_INFORMATION_ID];
	$insertCountIncrement = "UPDATE $TABLE_NAME_DEVICE_INFORMATION SET $TABLE_COLUMN_NAME_COUNT=$count WHERE $TABLE_COLUMN_NAME_DEVICE_INFORMATION_ID = $deviceInofmationId;";
	$database->query($insertCountIncrement);
}
?>
</body>
</html>


<?php

$database->close();

?>
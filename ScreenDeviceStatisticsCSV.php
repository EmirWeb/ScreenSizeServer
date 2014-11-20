<?php

include 'Constants.php';

$portraitQuery = "(SELECT * FROM $TABLE_NAME_SCREEN_DETAILS WHERE $TABLE_COLUMN_NAME_IS_PORTRAIT = 1)";
$landscapeQuery = "(SELECT * FROM $TABLE_NAME_SCREEN_DETAILS WHERE $TABLE_COLUMN_NAME_IS_PORTRAIT = 0)";
$orientationQuery = "(SELECT * FROM $portraitQuery as $TABLE_COLUMN_NAME_PORTRAIT , $landscapeQuery as $TABLE_COLUMN_NAME_LANDSCAPE WHERE ";

$query = "SELECT DISTINCT ".


" $TABLE_NAME_FULL_DEVICE_INFORMATION.$REQUEST_DEVICE_NAME_KEY,  " .
" $TABLE_NAME_FULL_DEVICE_INFORMATION.$REQUEST_CANONICAL_NAME_KEY,  " .
" $TABLE_NAME_FULL_DEVICE_INFORMATION.$REQUEST_DENSITY_KEY,  " .
" $TABLE_NAME_FULL_DEVICE_INFORMATION.$REQUEST_DENSITY_NAME_KEY,  " .
" $TABLE_NAME_FULL_DEVICE_INFORMATION.$REQUEST_SCREEN_SIZE_KEY,  " .
" $TABLE_COLUMN_NAME_PORTRAIT.$REQUEST_DEVICE_PIXEL_HEIGHT_KEY AS $TABLE_COLUMN_PORTRAIT_DEVICE_PIXEL_HEIGHT_KEY,  " .
" $TABLE_COLUMN_NAME_PORTRAIT.$REQUEST_DEVICE_PIXEL_WIDTH_KEY AS $TABLE_COLUMN_PORTRAIT_DEVICE_PIXEL_WIDTH_KEY,  " .
" $TABLE_COLUMN_NAME_PORTRAIT.$REQUEST_CONTENT_VIEW_PIXEL_HEIGHT_KEY AS $TABLE_COLUMN_PORTRAIT_CONTENT_VIEW_PIXEL_HEIGHT_KEY,  " .
" $TABLE_COLUMN_NAME_PORTRAIT.$REQUEST_CONTENT_VIEW_PIXEL_WIDTH_KEY AS $TABLE_COLUMN_PORTRAIT_CONTENT_VIEW_PIXEL_WIDTH_KEY,  " .
" $TABLE_COLUMN_NAME_PORTRAIT.$REQUEST_NAV_BAR_HEIGHT_KEY AS $TABLE_COLUMN_PORTRAIT_NAV_BAR_HEIGHT_KEY,  " .
" $TABLE_COLUMN_NAME_PORTRAIT.$REQUEST_NAV_BAR_WIDTH_KEY AS $TABLE_COLUMN_PORTRAIT_NAV_BAR_WIDTH_KEY,  " .
" $TABLE_COLUMN_NAME_PORTRAIT.$REQUEST_STATUS_BAR_HEIGHT_KEY AS $TABLE_COLUMN_PORTRAIT_STATUS_BAR_HEIGHT_KEY,  " .
" $TABLE_COLUMN_NAME_PORTRAIT.$REQUEST_TITLE_BAR_HEIGHT_KEY AS $TABLE_COLUMN_PORTRAIT_TITLE_BAR_HEIGHT_KEY,  " .

" $TABLE_COLUMN_NAME_LANDSCAPE.$REQUEST_DEVICE_PIXEL_HEIGHT_KEY AS $TABLE_COLUMN_LANDSCAPE_DEVICE_PIXEL_HEIGHT_KEY,  " .
" $TABLE_COLUMN_NAME_LANDSCAPE.$REQUEST_DEVICE_PIXEL_WIDTH_KEY AS $TABLE_COLUMN_LANDSCAPE_DEVICE_PIXEL_WIDTH_KEY,  " .
" $TABLE_COLUMN_NAME_LANDSCAPE.$REQUEST_CONTENT_VIEW_PIXEL_HEIGHT_KEY AS $TABLE_COLUMN_LANDSCAPE_CONTENT_VIEW_PIXEL_HEIGHT_KEY,  " .
" $TABLE_COLUMN_NAME_LANDSCAPE.$REQUEST_CONTENT_VIEW_PIXEL_WIDTH_KEY AS $TABLE_COLUMN_LANDSCAPE_CONTENT_VIEW_PIXEL_WIDTH_KEY,  " .
" $TABLE_COLUMN_NAME_LANDSCAPE.$REQUEST_NAV_BAR_HEIGHT_KEY AS $TABLE_COLUMN_LANDSCAPE_NAV_BAR_HEIGHT_KEY,  " .
" $TABLE_COLUMN_NAME_LANDSCAPE.$REQUEST_NAV_BAR_WIDTH_KEY AS $TABLE_COLUMN_LANDSCAPE_NAV_BAR_WIDTH_KEY,  " .
" $TABLE_COLUMN_NAME_LANDSCAPE.$REQUEST_STATUS_BAR_HEIGHT_KEY AS $TABLE_COLUMN_LANDSCAPE_STATUS_BAR_HEIGHT_KEY,  " .
" $TABLE_COLUMN_NAME_LANDSCAPE.$REQUEST_TITLE_BAR_HEIGHT_KEY AS $TABLE_COLUMN_LANDSCAPE_TITLE_BAR_HEIGHT_KEY " .

"FROM $TABLE_NAME_FULL_DEVICE_INFORMATION, $portraitQuery as $TABLE_COLUMN_NAME_PORTRAIT, $landscapeQuery as $TABLE_COLUMN_NAME_LANDSCAPE WHERE $TABLE_COLUMN_NAME_PORTRAIT.$TABLE_COLUMN_NAME_DEVICE_INFORMATION_ID = $TABLE_COLUMN_NAME_LANDSCAPE.$TABLE_COLUMN_NAME_DEVICE_INFORMATION_ID AND $TABLE_COLUMN_NAME_PORTRAIT.$TABLE_COLUMN_NAME_DEVICE_INFORMATION_ID =  $TABLE_NAME_FULL_DEVICE_INFORMATION.$TABLE_COLUMN_NAME_DEVICE_INFORMATION_ID".
" ORDER BY $TABLE_NAME_FULL_DEVICE_INFORMATION.$REQUEST_DEVICE_NAME_KEY;";

$database = new mysqli($URL, $USER_NAME, $PASSWORD, $DATABASE);
$results = $database->query($query);

$csvSeparator = "\t";

$content = "";
$id = 0;
while ($row = $results->fetch_assoc()){

	$deviceName = $row[$REQUEST_DEVICE_NAME_KEY];
	$canonicalName= $row[$REQUEST_CANONICAL_NAME_KEY];
	$density = $row[$REQUEST_DENSITY_KEY];
	$densityName = $row[$REQUEST_DENSITY_NAME_KEY];
	$screenSize = $row[$REQUEST_SCREEN_SIZE_KEY];


	$portraitDevicePixelHeight = $row[$TABLE_COLUMN_PORTRAIT_DEVICE_PIXEL_HEIGHT_KEY];
	$portraitDevicePixelWidth = $row[$TABLE_COLUMN_PORTRAIT_DEVICE_PIXEL_WIDTH_KEY];
	$portraitContentViewPixelHeight = $row[$TABLE_COLUMN_PORTRAIT_CONTENT_VIEW_PIXEL_HEIGHT_KEY];
	$portraitContentViewPixelWidth = $row[$TABLE_COLUMN_PORTRAIT_CONTENT_VIEW_PIXEL_WIDTH_KEY];
	$portraitNavBarHeight = $row[$TABLE_COLUMN_PORTRAIT_NAV_BAR_HEIGHT_KEY];
	$portraitNavBarWidth = $row[$TABLE_COLUMN_PORTRAIT_NAV_BAR_WIDTH_KEY];
	$portraitStatusBarHeight = $row[$TABLE_COLUMN_PORTRAIT_STATUS_BAR_HEIGHT_KEY];
	$portraitTitleBarHeight = $row[$TABLE_COLUMN_PORTRAIT_TITLE_BAR_HEIGHT_KEY];

	$landscapeDevicePixelHeight = $row[$TABLE_COLUMN_LANDSCAPE_DEVICE_PIXEL_HEIGHT_KEY];
	$landscapeDevicePixelWidth = $row[$TABLE_COLUMN_LANDSCAPE_DEVICE_PIXEL_WIDTH_KEY];
	$landscapeContentViewPixelHeight = $row[$TABLE_COLUMN_LANDSCAPE_CONTENT_VIEW_PIXEL_HEIGHT_KEY];
	$landscapeContentViewPixelWidth = $row[$TABLE_COLUMN_LANDSCAPE_CONTENT_VIEW_PIXEL_WIDTH_KEY];
	$landscapeNavBarHeight = $row[$TABLE_COLUMN_LANDSCAPE_NAV_BAR_HEIGHT_KEY];
	$landscapeNavBarWidth = $row[$TABLE_COLUMN_LANDSCAPE_NAV_BAR_WIDTH_KEY];
	$landscapeStatusBarHeight = $row[$TABLE_COLUMN_LANDSCAPE_STATUS_BAR_HEIGHT_KEY];
	$landscapeTitleBarHeight = $row[$TABLE_COLUMN_LANDSCAPE_TITLE_BAR_HEIGHT_KEY];

	$csv .= $deviceName;
	$csv .= $csvSeparator;

	$csv .= $canonicalName;
	$csv .= $csvSeparator;

	$csv .= $portraitDevicePixelWidth;
	$csv .= $csvSeparator;

	$csv .= $portraitDevicePixelHeight;
	$csv .= $csvSeparator;

	$csv .= $density;
	$csv .= $csvSeparator;

	$csv .= $portraitNavBarHeight;
	$csv .= $csvSeparator;

	$csv .= $portraitNavBarWidth;
	$csv .= $csvSeparator;

	$csv .= $portraitTitleBarHeight;
	$csv .= $csvSeparator;

	$csv .= $portraitStatusBarHeight;
	$csv .= $csvSeparator;

	$csv .= $portraitContentViewPixelWidth;
	$csv .= $csvSeparator;

	$csv .= $portraitContentViewPixelHeight;
	$csv .= $csvSeparator;

	$csv .= $landscapeNavBarHeight;
	$csv .= $csvSeparator;

	$csv .= $landscapeNavBarWidth;
	$csv .= $csvSeparator;

	$csv .= $landscapeTitleBarHeight;
	$csv .= $csvSeparator;

	$csv .= $landscapeStatusBarHeight;
	$csv .= $csvSeparator;

	$csv .= $landscapeContentViewPixelWidth;
	$csv .= $csvSeparator;

	$csv .= $landscapeContentViewPixelHeight;
	$csv .= "\n";

	$content .=$csv;
	$id ++;
}

function getCsvSchema() {
	$csvSchema = "";

	$csvSchema .= "deviceName";
	$csvSchema .= $csvSeparator;

	$csvSchema .= "canonicalName";
	$csvSchema .= $csvSeparator;

	$csvSchema .= "portraitDevicePixelWidth";
	$csvSchema .= $csvSeparator;

	$csvSchema .= "portraitDevicePixelHeight";
	$csvSchema .= $csvSeparator;

	$csvSchema .= "density";
	$csvSchema .= $csvSeparator;

	$csvSchema .= "portraitNavBarHeight";
	$csvSchema .= $csvSeparator;

	$csvSchema .= "portraitNavBarWidth";
	$csvSchema .= $csvSeparator;

	$csvSchema .= "portraitTitleBarHeight";
	$csvSchema .= $csvSeparator;

	$csvSchema .= "portraitStatusBarHeight";
	$csvSchema .= $csvSeparator;

	$csvSchema .= "portraitContentViewPixelWidth";
	$csvSchema .= $csvSeparator;

	$csvSchema .= "portraitContentViewPixelHeight";
	$csvSchema .= $csvSeparator;

	$csvSchema .= "landscapeNavBarHeight";
	$csvSchema .= $csvSeparator;

	$csvSchema .= "landscapeNavBarWidth";
	$csvSchema .= $csvSeparator;

	$csvSchema .= "landscapeTitleBarHeight";
	$csvSchema .= $csvSeparator;

	$csvSchema .= "landscapeStatusBarHeight";
	$csvSchema .= $csvSeparator;

	$csvSchema .= "landscapeContentViewPixelWidth";
	$csvSchema .= $csvSeparator;

	$csvSchema .= "landscapeContentViewPixelHeight";
	$csvSchema .= "\n";

	return $csvSchema;
}

?>

<?php echo(getCsvSchema());?>
<?php echo($csv);?>

<?php

$database->close();

?>
<?php

include 'Constants.php';

$portraitQuery = "(SELECT * FROM $TABLE_NAME_SCREEN_DETAILS WHERE $TABLE_COLUMN_NAME_IS_PORTRAIT = 1)";
$landscapeQuery = "(SELECT * FROM $TABLE_NAME_SCREEN_DETAILS WHERE $TABLE_COLUMN_NAME_IS_PORTRAIT = 0)";
$orientationQuery = "(SELECT * FROM $portraitQuery as $TABLE_COLUMN_NAME_PORTRAIT , $landscapeQuery as $TABLE_COLUMN_NAME_LANDSCAPE WHERE ";

$query = "SELECT DISTINCT ".


" $TABLE_NAME_DEVICE_INFORMATION.$REQUEST_DEVICE_NAME_KEY,  " .
" $TABLE_NAME_DEVICE_INFORMATION.$REQUEST_DENSITY_KEY,  " .
" $TABLE_NAME_DEVICE_INFORMATION.$REQUEST_DENSITY_NAME_KEY,  " .
" $TABLE_NAME_DEVICE_INFORMATION.$REQUEST_SCREEN_SIZE_KEY,  " .
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

"FROM $TABLE_NAME_DEVICE_INFORMATION, $portraitQuery as $TABLE_COLUMN_NAME_PORTRAIT, $landscapeQuery as $TABLE_COLUMN_NAME_LANDSCAPE WHERE $TABLE_COLUMN_NAME_PORTRAIT.$TABLE_COLUMN_NAME_DEVICE_INFORMATION_ID = $TABLE_COLUMN_NAME_LANDSCAPE.$TABLE_COLUMN_NAME_DEVICE_INFORMATION_ID AND $TABLE_COLUMN_NAME_PORTRAIT.$TABLE_COLUMN_NAME_DEVICE_INFORMATION_ID =  $TABLE_NAME_DEVICE_INFORMATION.$TABLE_COLUMN_NAME_DEVICE_INFORMATION_ID".
" ORDER BY $TABLE_NAME_DEVICE_INFORMATION.$REQUEST_DEVICE_NAME_KEY;";

$database = new mysqli($URL, $USER_NAME, $PASSWORD, $DATABASE);
$results = $database->query($query);

?>
<html>
<body>

<?php

function calculateDp($pixel,$density){
	return $dp = (int)($pixel / $density);
}

function getMeasurements ($yPixel, $xPixel, $density){
	$yDp = calculateDp($yPixel, $density);
	$xDp = calculateDp($xPixel, $density);
	return "$xPixel x $yPixel px ($xDp x $yDp dp)";
}

function getDpMeasurement ($pixel, $density){
	$dp = calculateDp($pixel, $density);
	return "($dp dp)";

}

function getPixelMeasurement ($pixel){
	return "$pixel px";
}

function getMeasurement ($pixel, $density){
	return getPixelMeasurement($pixel) . " " . getDpMeasurement($pixel,$density);
}

function getScreenDetails($navBarHeight, $navBarWidth, $titleBarHeight, $statusBarHeight,$contentViewPixelWidth ,$contentViewPixelHeight, $density){
	$html ="<table>";


	// Navigation bar
	$html .="<tr>";
	$html .="<td>";
	$html .="Navigation bar width";
	$html .="</td>";
	$html .="<td>";
	if ($navBarHeight != 0){
		$navBarMeasurement = getMeasurement($navBarHeight, $density);
		$html .=$navBarMeasurement;
	}else if ($portraitNavBarWidth != 0){
		$navBarMeasurement = getMeasurement($navBarWidth, $density);
		$html .=$navBarWidth;
	}else{
		$html .="No navigation bar found";
	}

	$html .="</td>";
	$html .="</tr>";


	// Title bar
	$html .="<tr>";
	$html .="<td>";
	$html .="Title bar width";
	$html .="</td>";
	$html .="<td>";
	if ($titleBarHeight != 0){
		$titleBarMeasurement = getMeasurement($titleBarHeight, $density);
		$html .=$titleBarMeasurement;
	}else{
		$html .="No title bar found";
	}

	$html .="</td>";
	$html .="</tr>";


	// Status bar
	$html .="<tr>";
	$html .="<td>";
	$html .="Status bar width";
	$html .="</td>";
	$html .="<td>";
	if ($statusBarHeight != 0){
		$statusBarMeasurement = getMeasurement($statusBarHeight, $density);
		$html .=$statusBarMeasurement;
	}else{
		$html .="No status bar found";
	}

	$html .="</td>";
	$html .="</tr>";



	// ContentView
	$html .="<tr>";
	$html .="<td>";
	$html .="Content View";
	$html .="</td>";
	$html .="<td>";
	$statusBarMeasurement = getMeasurements($contentViewPixelWidth,$contentViewPixelHeight, $density);
	$html .=$statusBarMeasurement;

	$html .="</td>";
	$html .="</tr>";



	$html .="</table>";
	return $html;
}

while ($row = $results->fetch_assoc()){

	$deviceName = $row[$REQUEST_DEVICE_NAME_KEY];
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


	$html = "<h1>$deviceName</h1>";
	$deviceMeasurements = getMeasurements($portraitDevicePixelWidth, $portraitDevicePixelHeight, $density);
	$html .= "<p>$deviceMeasurements</p>";
	$html .= "<p>$densityName</p>";
	$html .= "<p>$screenSize</p>";
	

	$html .= "<h2>Portrait Details<h2>";
	$html .= getScreenDetails($portraitNavBarHeight, $portraitNavBarWidth, $portraitTitleBarHeight, $portraitStatusBarHeight, $portraitContentViewPixelWidth, $portraitContentViewPixelHeight, $density);
	$html .= "<h2>Landscape Details<h2>";
	$html .= getScreenDetails($landscapeNavBarHeight, $landscapeNavBarWidth, $landscapeTitleBarHeight, $landscapeStatusBarHeight, $landscapeContentViewPixelWidth, $landscapeContentViewPixelHeight, $density);

	echo $html;
}
?>
</body>
</html>


<?php

$database->close();

?>
<?php

include 'Constants.php';

$data = file_get_contents('php://input');
$json = json_decode($data, true);


header('Content-type: application/json');

function isScreenDetailsSet($screenDetails)
{

	include 'Constants.php';

	return isset($screenDetails[$REQUEST_DEVICE_PIXEL_HEIGHT_KEY]) &&
	isset($screenDetails[$REQUEST_DEVICE_PIXEL_WIDTH_KEY]) &&
	isset($screenDetails[$REQUEST_WINDOW_PIXEL_HEIGHT_KEY]) &&
	isset($screenDetails[$REQUEST_WINDOW_PIXEL_WIDTH_KEY]) &&
	isset($screenDetails[$REQUEST_CONTENT_VIEW_PIXEL_HEIGHT_KEY]) &&
	isset($screenDetails[$REQUEST_CONTENT_VIEW_PIXEL_WIDTH_KEY]) &&
	isset($screenDetails[$REQUEST_NAV_BAR_HEIGHT_KEY]) &&
	isset($screenDetails[$REQUEST_NAV_BAR_WIDTH_KEY]) &&
	isset($screenDetails[$REQUEST_STATUS_BAR_HEIGHT_KEY]) &&
	isset($screenDetails[$REQUEST_TITLE_BAR_HEIGHT_KEY]);
}

function getScreenDetailsInsertQuery($database, $deviceInformationId, $isPortrait, $screenDetails)
{

	include 'Constants.php';

	$devicePixelHeight = $database->escape_string($screenDetails[$REQUEST_DEVICE_PIXEL_HEIGHT_KEY]);
	$devicePixelWidth = $database->escape_string($screenDetails[$REQUEST_DEVICE_PIXEL_WIDTH_KEY]);
	$windowPixelHeight = $database->escape_string($screenDetails[$REQUEST_WINDOW_PIXEL_HEIGHT_KEY]);
	$windowPixelWidth = $database->escape_string($screenDetails[$REQUEST_WINDOW_PIXEL_WIDTH_KEY]);
	$contentViewPixelHeight = $database->escape_string($screenDetails[$REQUEST_CONTENT_VIEW_PIXEL_HEIGHT_KEY]);
	$contentViewPixelWidth = $database->escape_string($screenDetails[$REQUEST_CONTENT_VIEW_PIXEL_WIDTH_KEY]);
	$navBarHeight = $database->escape_string($screenDetails[$REQUEST_NAV_BAR_HEIGHT_KEY]);
	$navBarWidth = $database->escape_string($screenDetails[$REQUEST_NAV_BAR_WIDTH_KEY]);
	$statusBarHeight = $database->escape_string($screenDetails[$REQUEST_STATUS_BAR_HEIGHT_KEY]);
	$titleBarHeight = $database->escape_string($screenDetails[$REQUEST_TITLE_BAR_HEIGHT_KEY]);


	$insertDeviceInformation =  "INSERT INTO $TABLE_NAME_SCREEN_DETAILS (" .
	"$TABLE_COLUMN_NAME_DEVICE_INFORMATION_ID, " .
	"$TABLE_COLUMN_NAME_IS_PORTRAIT, " . 
	"$REQUEST_DEVICE_PIXEL_HEIGHT_KEY, " .
	"$REQUEST_DEVICE_PIXEL_WIDTH_KEY, " .
	"$REQUEST_WINDOW_PIXEL_HEIGHT_KEY, " .
	"$REQUEST_WINDOW_PIXEL_WIDTH_KEY, " .
	"$REQUEST_CONTENT_VIEW_PIXEL_HEIGHT_KEY, " .
	"$REQUEST_CONTENT_VIEW_PIXEL_WIDTH_KEY, " .
	"$REQUEST_NAV_BAR_HEIGHT_KEY, " .
	"$REQUEST_NAV_BAR_WIDTH_KEY, " .
	"$REQUEST_STATUS_BAR_HEIGHT_KEY, " .
	"$REQUEST_TITLE_BAR_HEIGHT_KEY" .
	") VALUES (".
	"$deviceInformationId, " .
	"$isPortrait, " .
	"$devicePixelHeight, ".
	"$devicePixelWidth, ".
	"$windowPixelHeight, ".
	"$windowPixelWidth, ".
	"$contentViewPixelHeight, ".
	"$contentViewPixelWidth, ".
	"$navBarHeight, ".
	"$navBarWidth, ".
	"$statusBarHeight, ".
	"$titleBarHeight".
	");";

	return $insertDeviceInformation;


}

if (
isset($json[$REQUEST_PORTRAIT_SCREEN_DETAILS_KEY]) &&
isset($json[$REQUEST_LANDSCAPE_SCREEN_DETAILS_KEY]) &&
isset($json[$REQUEST_VERSION_CODE_NAME_KEY]) &&
isset($json[$REQUEST_VERSION_INCREMENTAL_KEY]) &&
isset($json[$REQUEST_VERSION_RELEASE_KEY]) &&
isset($json[$REQUEST_VERSION_SDK_STRING_KEY]) &&
isset($json[$REQUEST_VERSION_SDK_INTEGER_KEY]) &&
isset($json[$REQUEST_BOARD_KEY]) &&
isset($json[$REQUEST_BOOT_LOADER_KEY]) &&
isset($json[$REQUEST_BRAND_KEY]) &&
isset($json[$REQUEST_CPU_ABI_KEY]) &&
isset($json[$REQUEST_CPU_ABI_2_KEY]) &&
isset($json[$REQUEST_DEVICE_KEY]) &&
isset($json[$REQUEST_DISPLAY_KEY]) &&
isset($json[$REQUEST_FINGER_PRINT_KEY]) &&
isset($json[$REQUEST_HARDWARE_KEY]) &&
isset($json[$REQUEST_HOST_KEY]) &&
isset($json[$REQUEST_DEVICE_ID_KEY]) &&
isset($json[$REQUEST_MANUFACTURER_KEY]) &&
isset($json[$REQUEST_PRODUCT_KEY]) &&
isset($json[$REQUEST_RADIO_KEY]) &&
isset($json[$REQUEST_TAGS_KEY]) &&
isset($json[$REQUEST_TIME_KEY]) &&
isset($json[$REQUEST_TYPE_KEY]) &&
isset($json[$REQUEST_UNKNOWN_KEY]) &&
isset($json[$REQUEST_USER_KEY]) &&
isset($json[$REQUEST_DENSITY_NAME_KEY]) &&
isset($json[$REQUEST_SCREEN_SIZE_KEY]) &&
isset($json[$REQUEST_DENSITY_KEY]) &&
isset($json[$REQUEST_XDPI_KEY]) &&
isset($json[$REQUEST_YDPI_KEY]) &&
is_array($json[$REQUEST_PORTRAIT_SCREEN_DETAILS_KEY]) &&
is_array($json[$REQUEST_LANDSCAPE_SCREEN_DETAILS_KEY]) &&
isScreenDetailsSet($json[$REQUEST_PORTRAIT_SCREEN_DETAILS_KEY]) &&
isScreenDetailsSet($json[$REQUEST_LANDSCAPE_SCREEN_DETAILS_KEY])
) {
	$database = new mysqli($URL, $USER_NAME, $PASSWORD, $DATABASE);

	$portraitScreenDetails = $json[$REQUEST_PORTRAIT_SCREEN_DETAILS_KEY];
	$landscapeScreenDetails = $json[$REQUEST_LANDSCAPE_SCREEN_DETAILS_KEY];
	$versionCodeName = $json[$REQUEST_VERSION_CODE_NAME_KEY];
	$versionIncremental = $json[$REQUEST_VERSION_INCREMENTAL_KEY];
	$versionRelease = $database->escape_string($json[$REQUEST_VERSION_RELEASE_KEY]);
	$versionSdkString = $database->escape_string($json[$REQUEST_VERSION_SDK_STRING_KEY]);
	$versionSdkInteger = $database->escape_string($json[$REQUEST_VERSION_SDK_INTEGER_KEY]);
	$board =$database->escape_string( $json[$REQUEST_BOARD_KEY]);
	$bootLoader = $database->escape_string($json[$REQUEST_BOOT_LOADER_KEY]);
	$brand = $database->escape_string($json[$REQUEST_BRAND_KEY]);
	$cpuAbi = $database->escape_string($json[$REQUEST_CPU_ABI_KEY]);
	$cpuAbi2 = $database->escape_string($json[$REQUEST_CPU_ABI_2_KEY]);
	$device = $database->escape_string($json[$REQUEST_DEVICE_KEY]);
	$display = $database->escape_string($json[$REQUEST_DISPLAY_KEY]);
	$fingerPrint = $database->escape_string($json[$REQUEST_FINGER_PRINT_KEY]);
	$hardwade = $database->escape_string($json[$REQUEST_HARDWARE_KEY]);
	$host = $database->escape_string($json[$REQUEST_HOST_KEY]);
	$deviceId = $database->escape_string($json[$REQUEST_DEVICE_ID_KEY]);
	$manufacturer = $database->escape_string($json[$REQUEST_MANUFACTURER_KEY]);
	$product = $database->escape_string($json[$REQUEST_PRODUCT_KEY]);
	$radio = $database->escape_string($json[$REQUEST_RADIO_KEY]);
	$tags = $database->escape_string($json[$REQUEST_TAGS_KEY]);
	$time = $database->escape_string($json[$REQUEST_TIME_KEY]);
	$type = $database->escape_string($json[$REQUEST_TYPE_KEY]);
	$unkown = $database->escape_string($json[$REQUEST_UNKNOWN_KEY]);
	$user = $database->escape_string($json[$REQUEST_USER_KEY]);
	$densityName = $database->escape_string($json[$REQUEST_DENSITY_NAME_KEY]);
	$screenSize = $database->escape_string($json[$REQUEST_SCREEN_SIZE_KEY]);
	$density = $database->escape_string($json[$REQUEST_DENSITY_KEY]);
	$xdpi = $database->escape_string($json[$REQUEST_XDPI_KEY]);
	$ydpi = $database->escape_string($json[$REQUEST_YDPI_KEY]);

	$insertDeviceInformation =  "INSERT INTO $TABLE_NAME_DEVICE_INFORMATION (" .
	"$REQUEST_VERSION_CODE_NAME_KEY, " .
	"$REQUEST_VERSION_INCREMENTAL_KEY, " .
	"$REQUEST_VERSION_RELEASE_KEY, " .
	"$REQUEST_VERSION_SDK_STRING_KEY, " .
	"$REQUEST_VERSION_SDK_INTEGER_KEY, " .
	"$REQUEST_BOARD_KEY, " .
	"$REQUEST_BOOT_LOADER_KEY, " .
	"$REQUEST_BRAND_KEY, " .
	"$REQUEST_CPU_ABI_KEY, " .
	"$REQUEST_CPU_ABI_2_KEY, " .
	"$REQUEST_DEVICE_KEY, " .
	"$REQUEST_DISPLAY_KEY, " .
	"$REQUEST_FINGER_PRINT_KEY, " .
	"$REQUEST_HARDWARE_KEY, " .
	"$REQUEST_HOST_KEY, " .
	"$REQUEST_DEVICE_ID_KEY, " .
	"$REQUEST_MANUFACTURER_KEY, " .
	"$REQUEST_PRODUCT_KEY, " .
	"$REQUEST_RADIO_KEY, " .
	"$REQUEST_TAGS_KEY, " .
	"$REQUEST_TIME_KEY, " .
	"$REQUEST_TYPE_KEY, " .
	"$REQUEST_UNKNOWN_KEY, " .
	"$REQUEST_USER_KEY, " .
	"$REQUEST_DENSITY_NAME_KEY, " .
	"$REQUEST_SCREEN_SIZE_KEY, " .
	"$REQUEST_DENSITY_KEY, " .
	"$REQUEST_XDPI_KEY, " .
	"$REQUEST_YDPI_KEY, " .
	"$TABLE_COLUMN_NAME_COUNT " .
	") VALUES (".
	"'$versionCodeName', ".
	"'$versionIncremental', ".
	"'$versionRelease', ".
	"'$versionSdkString', ".
	"'$versionSdkInteger', ".
	"'$board', ".
	"'$bootLoader', ".
	"'$brand', ".
	"'$cpuAbi', ".
	"'$cpuAbi2', ".
	"'$device', ".
	"'$display', ".
	"'$fingerPrint', ".
	"'$hardwade', ".
	"'$host', ".
	"'$deviceId', ".
	"'$manufacturer', ".
	"'$product', ".
	"'$radio', ".
	"'$tags', ".
	"$time, ".
	"'$type', ".
	"'$unkown', ".
	"'$user', ".
	"'$densityName', ".
	"'$screenSize', ".
	"$density, ".
	"$xdpi, ".
	"$ydpi, ".
	"0 ".
	");";


	$queryDeviceInformation =  "SELECT $TABLE_COLUMN_NAME_COUNT, $TABLE_COLUMN_NAME_DEVICE_INFORMATION_ID FROM $TABLE_NAME_DEVICE_INFORMATION WHERE " .
	"$REQUEST_VERSION_CODE_NAME_KEY = '$versionCodeName' AND " .
	"$REQUEST_VERSION_INCREMENTAL_KEY = '$versionIncremental' AND " .
	"$REQUEST_VERSION_RELEASE_KEY = '$versionRelease' AND " .
	"$REQUEST_VERSION_SDK_STRING_KEY = '$versionSdkString' AND " .
	"$REQUEST_VERSION_SDK_INTEGER_KEY= '$versionSdkInteger' AND " .
	"$REQUEST_BOARD_KEY = '$board' AND " .
	"$REQUEST_BOOT_LOADER_KEY = '$bootLoader' AND " .
	"$REQUEST_BRAND_KEY = '$brand' AND " .
	"$REQUEST_CPU_ABI_KEY = '$cpuAbi' AND " .
	"$REQUEST_CPU_ABI_2_KEY = '$cpuAbi2' AND " .
	"$REQUEST_DEVICE_KEY = '$device' AND " .
	"$REQUEST_DISPLAY_KEY = '$display' AND " .
	"$REQUEST_FINGER_PRINT_KEY = '$fingerPrint' AND " .
	"$REQUEST_HARDWARE_KEY = '$hardwade' AND " .
	"$REQUEST_HOST_KEY = '$host' AND " .
	"$REQUEST_DEVICE_ID_KEY = '$deviceId' AND " .
	"$REQUEST_MANUFACTURER_KEY = '$manufacturer' AND " .
	"$REQUEST_PRODUCT_KEY = '$product' AND " .
	"$REQUEST_RADIO_KEY = '$radio' AND " .
	"$REQUEST_TAGS_KEY = '$tags' AND " .
	"$REQUEST_TYPE_KEY = '$type' AND " .
	"$REQUEST_UNKNOWN_KEY= '$unkown' AND " .
	"$REQUEST_USER_KEY = '$user' AND " .
	"$REQUEST_DENSITY_NAME_KEY = '$densityName' AND " .
	"$REQUEST_SCREEN_SIZE_KEY = '$screenSize' AND " .
//	"$REQUEST_TIME_KEY = '$time' AND " .
	"$REQUEST_DENSITY_KEY = $density ".
	
	";";

	$queryResults = $database->query($queryDeviceInformation);
	if ($row = $queryResults->fetch_assoc()){
		$count = $row[$TABLE_COLUMN_NAME_COUNT]+1;
		$deviceInofmationId = $row[$TABLE_COLUMN_NAME_DEVICE_INFORMATION_ID];
		$insertCountIncrement = "UPDATE $TABLE_NAME_DEVICE_INFORMATION SET $TABLE_COLUMN_NAME_COUNT=$count WHERE $TABLE_COLUMN_NAME_DEVICE_INFORMATION_ID = $deviceInofmationId;";
		$database->query($insertCountIncrement);
	}else {
		$database->query($insertDeviceInformation);
		$deviceInformationId = $database->insert_id;

		$insertScreenSize = getScreenDetailsInsertQuery($database, $deviceInformationId, 1, $portraitScreenDetails);
		$database->query($insertScreenSize);

		$insertScreenSize = getScreenDetailsInsertQuery($database, $deviceInformationId, 0, $landscapeScreenDetails);
		$database->query($insertScreenSize);
	}

	$database->close();


	http_response_code(200);
} else {
	http_response_code(412);
	die("Unable to process");
}


?>
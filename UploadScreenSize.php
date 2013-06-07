<?php


$URL = "localhost";
$USER_NAME = "root";
$PASSWORD = "root";
$DATABASE = "DeviceInformation";

$REQUEST_PORTRAIT_SCREEN_DETAILS_KEY = "portraitScreenDetails";
$REQUEST_LANDSCAPE_SCREEN_DETAILS_KEY = "landscapeScreenDetails";
$REQUEST_VERSION_CODE_NAME_KEY = "versionCodeName";
$REQUEST_VERSION_INCREMENTAL_KEY = "versionIncremental";
$REQUEST_VERSION_RELEASE_KEY = "versionRelease";
$REQUEST_VERSION_SDK_STRING_KEY = "versionSdkString";
$REQUEST_VERSION_SDK_INTEGER_KEY = "versionSdkInteger";
$REQUEST_BOARD_KEY = "board";
$REQUEST_BOOT_LOADER_KEY = "bootLoader";
$REQUEST_BRAND_KEY = "brand";
$REQUEST_CPU_ABI_KEY = "cpuAbi";
$REQUEST_CPU_ABI_2_KEY = "cpuAbi2";
$REQUEST_DEVICE_KEY = "device";
$REQUEST_DISPLAY_KEY = "display";
$REQUEST_FINGER_PRINT_KEY = "fingerPrint";
$REQUEST_HARDWARE_KEY = "hardwade";
$REQUEST_HOST_KEY = "host";
$REQUEST_DEVICE_ID_KEY = "deviceId";
$REQUEST_MANUFACTURER_KEY = "manufacturer";
$REQUEST_PRODUCT_KEY = "product";
$REQUEST_RADIO_KEY = "radio";
$REQUEST_TAGS_KEY = "tags";
$REQUEST_TIME_KEY = "time";
$REQUEST_TYPE_KEY = "type";
$REQUEST_UNKNOWN_KEY = "unkown";
$REQUEST_USER_KEY = "user";
$REQUEST_DENSITY_NAME_KEY = "densityName";
$REQUEST_SCREEN_SIZE_KEY = "screenSize";
$REQUEST_DENSITY_KEY = "density";
$REQUEST_XDPI_KEY = "xdpi";
$REQUEST_YDPI_KEY = "ydpi";



$REQUEST_DEVICE_PIXEL_HEIGHT_KEY = "devicePixelHeight";
$REQUEST_DEVICE_PIXEL_WIDTH_KEY = "devicePixelWidth";
$REQUEST_WINDOW_PIXEL_HEIGHT_KEY = "windowPixelHeight";
$REQUEST_WINDOW_PIXEL_WIDTH_KEY = "windowPixelWidth";
$REQUEST_CONTENT_VIEW_PIXEL_HEIGHT_KEY = "contentViewPixelHeight";
$REQUEST_CONTENT_VIEW_PIXEL_WIDTH_KEY = "contentViewPixelWidth";
$REQUEST_NAV_BAR_HEIGHT_KEY = "navBarHeight";
$REQUEST_NAV_BAR_WIDTH_KEY = "navBarWidth";
$REQUEST_STATUS_BAR_HEIGHT_KEY = "statusBarHeight";
$REQUEST_TITLE_BAR_HEIGHT_KEY = "titleBarHeight";

$TABLE_NAME_DEVICE_INFORMATION = "deviceInformation";
$TABLE_COLUMN_NAME_DEVICE_INFORMATION_ID = "deviceInformationId";
$TABLE_COLUMN_NAME_SCREEN_SIZE_ID = "screenSizeId";
$TABLE_COLUMN_NAME_SCREEN_SIZE_ID = "deviceInformationId";
$TABLE_COLUMN_NAME_IS_PORTRAIT = "isPortrait";

$RESPONSE_SUCCESS_KEY = "success";

header('Content-type: application/json');

function checkScreenDetails($screenDetails)
{
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


	$insertDeviceInformation =  "INSERT INTO $TABLE_NAME_DEVICE_INFORMATION (" .
	"$TABLE_COLUMN_NAME_SCREEN_SIZE_ID, " .
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


}

if (
isset($_POST[$REQUEST_PORTRAIT_SCREEN_DETAILS_KEY]) &&
isset($_POST[$REQUEST_LANDSCAPE_SCREEN_DETAILS_KEY]) &&
isset($_POST[$REQUEST_VERSION_CODE_NAME_KEY]) &&
isset($_POST[$REQUEST_VERSION_INCREMENTAL_KEY]) &&
isset($_POST[$REQUEST_VERSION_RELEASE_KEY]) &&
isset($_POST[$REQUEST_VERSION_SDK_STRING_KEY]) &&
isset($_POST[$REQUEST_VERSION_SDK_INTEGER_KEY]) &&
isset($_POST[$REQUEST_BOARD_KEY]) &&
isset($_POST[$REQUEST_BOOT_LOADER_KEY]) &&
isset($_POST[$REQUEST_BRAND_KEY]) &&
isset($_POST[$REQUEST_CPU_ABI_KEY]) &&
isset($_POST[$REQUEST_CPU_ABI_2_KEY]) &&
isset($_POST[$REQUEST_DEVICE_KEY]) &&
isset($_POST[$REQUEST_DISPLAY_KEY]) &&
isset($_POST[$REQUEST_FINGER_PRINT_KEY]) &&
isset($_POST[$REQUEST_HARDWARE_KEY]) &&
isset($_POST[$REQUEST_HOST_KEY]) &&
isset($_POST[$REQUEST_DEVICE_ID_KEY]) &&
isset($_POST[$REQUEST_MANUFACTURER_KEY]) &&
isset($_POST[$REQUEST_PRODUCT_KEY]) &&
isset($_POST[$REQUEST_RADIO_KEY]) &&
isset($_POST[$REQUEST_TAGS_KEY]) &&
isset($_POST[$REQUEST_TIME_KEY]) &&
isset($_POST[$REQUEST_TYPE_KEY]) &&
isset($_POST[$REQUEST_UNKNOWN_KEY]) &&
isset($_POST[$REQUEST_USER_KEY]) &&
isset($_POST[$REQUEST_DENSITY_NAME_KEY]) &&
isset($_POST[$REQUEST_SCREEN_SIZE_KEY]) &&
isset($_POST[$REQUEST_DENSITY_KEY]) &&
isset($_POST[$REQUEST_XDPI_KEY]) &&
isset($_POST[$REQUEST_YDPI_KEY]) &&
is_array($_POST[$REQUEST_PORTRAIT_SCREEN_DETAILS_KEY]) &&
is_array($_POST[$REQUEST_LANDSCAPE_SCREEN_DETAILS_KEY]) &&
isScreenDetailsSet($_POST[$REQUEST_PORTRAIT_SCREEN_DETAILS_KEY]) &&
isScreenDetailsSet($_POST[$REQUEST_LANDSCAPE_SCREEN_DETAILS_KEY])
) {
	$database = new mysqli($URL, $USER_NAME, $PASSWORD, $DATABASE);

	$portraitScreenDetails = $_POST[$REQUEST_PORTRAIT_SCREEN_DETAILS_KEY];
	$landscapeScreenDetails = $_POST[$REQUEST_LANDSCAPE_SCREEN_DETAILS_KEY];
	$versionCodeName = $_POST[$REQUEST_VERSION_CODE_NAME_KEY];
	$versionIncremental = $_POST[$REQUEST_VERSION_INCREMENTAL_KEY];
	$versionRelease = $database->escape_string($_POST[$REQUEST_VERSION_RELEASE_KEY]);
	$versionSdkString = $database->escape_string($_POST[$REQUEST_VERSION_SDK_STRING_KEY]);
	$versionSdkInteger = $database->escape_string($_POST[$REQUEST_VERSION_SDK_INTEGER_KEY]);
	$board =$database->escape_string( $_POST[$REQUEST_BOARD_KEY]);
	$bootLoader = $database->escape_string($_POST[$REQUEST_BOOT_LOADER_KEY]);
	$brand = $database->escape_string($_POST[$REQUEST_BRAND_KEY]);
	$cpuAbi = $database->escape_string($_POST[$REQUEST_CPU_ABI_KEY]);
	$cpuAbi2 = $database->escape_string($_POST[$REQUEST_CPU_ABI_2_KEY]);
	$device = $database->escape_string($_POST[$REQUEST_DEVICE_KEY]);
	$display = $database->escape_string($_POST[$REQUEST_DISPLAY_KEY]);
	$fingerPrint = $database->escape_string($_POST[$REQUEST_FINGER_PRINT_KEY]);
	$hardwade = $database->escape_string($_POST[$REQUEST_HARDWARE_KEY]);
	$host = $database->escape_string($_POST[$REQUEST_HOST_KEY]);
	$deviceId = $database->escape_string($_POST[$REQUEST_DEVICE_ID_KEY]);
	$manufacturer = $database->escape_string($_POST[$REQUEST_MANUFACTURER_KEY]);
	$product = $database->escape_string($_POST[$REQUEST_PRODUCT_KEY]);
	$radio = $database->escape_string($_POST[$REQUEST_RADIO_KEY]);
	$tags = $database->escape_string($_POST[$REQUEST_TAGS_KEY]);
	$time = $database->escape_string($_POST[$REQUEST_TIME_KEY]);
	$type = $database->escape_string($_POST[$REQUEST_TYPE_KEY]);
	$unkown = $database->escape_string($_POST[$REQUEST_UNKNOWN_KEY]);
	$user = $database->escape_string($_POST[$REQUEST_USER_KEY]);
	$densityName = $database->escape_string($_POST[$REQUEST_DENSITY_NAME_KEY]);
	$screenSize = $database->escape_string($_POST[$REQUEST_SCREEN_SIZE_KEY]);
	$density = $database->escape_string($_POST[$REQUEST_DENSITY_KEY]);
	$xdpi = $database->escape_string($_POST[$REQUEST_XDPI_KEY]);
	$ydpi = $database->escape_string($_POST[$REQUEST_YDPI_KEY]);

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
	"$REQUEST_YDPI_KEY" .
	"$REQUEST_TAGS_KEY" .
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
	"$ydpi".
	");";


	$database->query($insertDeviceInformation);
	$deviceInformationId = $database->insert_id;

	$insertScreenSize = getScreenDetailsInsertQuery($database, $deviceInformationId, 1, $portraitScreenDetails);
	$database->query($insertScreenSize);

	$insertScreenSize = getScreenDetailsInsertQuery($database, $deviceInformationId, 0, $landscapeScreenDetails);
	$database->query($insertScreenSize);

	$database->close();

	http_response_code(200);
} else {
	http_response_code(412);
	die(Error::getJsonError(0));
}


?>
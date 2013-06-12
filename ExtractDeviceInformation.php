<?php
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
$deviceName = $database->escape_string($json[$REQUEST_DEVICE_NAME_KEY]);

?>
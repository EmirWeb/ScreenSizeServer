<?php
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

?>
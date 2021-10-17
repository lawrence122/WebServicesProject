<?php

//for each datetime to convert it from UTC to the local time....
//1 - make a datetime with utc timezone with that datetime
//2 - get the local timezone
//3 - set the local timezone
//4 - format and output

function ConvertDateTime($datetime){
	$date = new DateTime($datetime, new DateTimezone("UTC"));
	$tz = new DateTimeZone(date_default_timezone_get());
	$date->setTimeZone($tz);
	return $date->format('F j, Y \a\t g:i A');
}
?>
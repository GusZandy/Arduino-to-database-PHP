<?php
/**
 * Program for input data to database from Arduino
 *=========== Zandy Yudha Perwira ================
 *
 * Format Request :
 * POST /add.php HTTP/1.1
 * Host: iot.com
 * Connection: close
 * Content-Length: 28
 *
 * id=test&temp1=28&hum1=80
 */

  //use Carbon to get time & date
  require("lib/Carbon.php");
  use Carbon\Carbon;

  //database properties
  $db_address = "localhost";
  $db_name = "learn-php";
  $db_table_name = "SensorLogger";
  $db_username = "root";
  $db_password = "root";
  $device_id = "12345";
  $locale = "id";
  

  //set locale time & get datetime
  Carbon::setLocale($locale);
  $timestamp = Carbon::now();

  //establishing connection to database
  $db_connection = new mysqli($db_address, $db_username, $db_password, $db_name);
 if ($db_connection) {
     echo "Connected database succesfully.";
 } else {
     die('MYSQL ERROR: ' .mysqli_error());
 }
  $request = (object) [
     'timestamp' => $timestamp,
     'device_ID' => $_POST["deviceId"],
     'temperature' => $_POST["temp"],
     'humidity' => $_POST["hum"]
  ];


  //authentication deviceId

  if ($request->device_ID == $device_id) {
      $query = "INSERT INTO `$db_table_name` (`Device_ID`, `Timestamp`, `Temperature`, `Humidity`) VALUES ('".$request->device_ID."','".$request->timestamp."','".$request->temperature."','".$request->humidity."')";

      mysqli_query($db_connection, $query);

      echo "Respon: \r\nDOWNLOAD";
  }

  //closing database connection
  mysqli_close($db_connection);

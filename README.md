# Arduino-to-database-PHP
Save data sensor, etc from Arduino to database with PHP code.

## Prerequisites
You must have a hsoting to upload this code

## Step to use this code
**1. Configure the database properties**
```
   $db_address = "localhost";
   $db_name = "learn-php";
   $db_username = "root";
   $db_password = "root";
   $device_id = "12345";
   $locale = "id";
```
   * $db_address is address of database.
   * $db_name is name of database.
   * $db_username is username of database.
   * $db_password is password of database.
   * $device_id is number id of device.
   * $locale is seting of timezone for Carbon.

**2. For more than one device you can change $device_id to a array of id of device. for example:**
```  
   $device_id = [
      'device_1' => '12345',
      'device_2' => '27381',
      '...' => '...',
   ];
```
**3. Configure the parameters which are you want to store in database.**
```
   $request = (object) [
     'timestamp' => $timestamp,
     'device_ID' => $_POST["deviceId"],
     'temperature' => $_POST["temp"],
     'humidity' => $_POST["hum"]
  ];
```
  for this code, the parameters are timestamp, device id, temperature, and humidity which are to store in database. If you want to store more   parameters than the code above, you can add parameter for example:
```
  $request = (object) [
     'timestamp' => $timestamp,
     'device_ID' => $_POST["deviceId"],
     'temperature' => $_POST["temp"],
     'humidity' => $_POST["hum"],
     '...' => $_POST["..."]	
  ];
  ```

**4. Ready for Testing, don't forget you make the database for example in phpmyadmin.**

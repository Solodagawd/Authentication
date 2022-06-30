<?php
function AccessDeny($message){
	die(json_encode(array(
		'status' => 403,  
		'success' => false, 
		'response' => $message
	), JSON_PRETTY_PRINT));
}
function Allow($message){
	die(json_encode(array(
		'status' => 200,  
		'success' => true, 
		'response' => $message
	), JSON_PRETTY_PRINT));
}
function Error($message){
	die(json_encode(array(
		'status' => 500,  
		'success' => false, 
		'response' => $message
	), JSON_PRETTY_PRINT));
}
function InitLogin($originalkey, $originalhwid, $session){
    $conn = new mysqli("localhost", "", "", "");
	$key = mysqli_real_escape_string($conn, $originalkey);
	$hwid = mysqli_real_escape_string($conn, $originalhwid);
if ($conn->connect_error) {
Error("Failed to connect to sql");
}
$sql = "SELECT * FROM `uid` WHERE `key` LIKE '$key'";
$result = $conn->query($sql);
if ($result->num_rows > 0) {
  while($row = $result->fetch_assoc()) {
	  	$uid = $row["uid"];
	  	$key = $row["key"];
        $username = $row['username'];
		$banned = $row['banned'];
		$realhwid = $row['hwid'];
	  	if($banned > 0){
		AccessDeny("Your Key Is Banned");
		}
	    if($realhwid == ""){
		$changehwid = "UPDATE `uid` SET `hwid` = '$hwid' WHERE `uid`.`uid` = $uid;";
		$updatehwid = $conn->query($changehwid);
		}else
		if($realhwid != $hwid){
		AccessDeny("Invalid HWID");
		}
	 	$dt = gmdate("Y/m/d H:i");
        $s2 = hash('sha256', '' . $dt . $originalkey);
        if($session !== hash('sha256', '' . $dt . $originalkey)){
                AccessDeny("Invalid Session");    
        } 
		die(json_encode(array(
			'status' => 200,  
			'success' => true, 
			'uid' => $uid,
			'username' => $username
		), JSON_PRETTY_PRINT));
   }
} else {
  AccessDeny("Invalid Key");
}
}
?>
<!DOCTYPE HTML>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Log In</title>
    <!-- CSS Styles -->
	<link rel="stylesheet" href="css/animate.css">
	<link rel="stylesheet" href="css/loginstyle.css">
</head>
<body>
	<div>
		<div>
			<h1 id="mainTitle" class="animated fadeInDown">Quiz Master Login Page</h1>
		</div>
        <!-- Login Dialog Box -->
		<div class="dialogBox animated fadeIn">
			<div id="login">
            <h2>Log In</h2>
            </div>
                    <label for="user">Enter your PECFEST ID</label><br> <form method="post" action="">
                    <input type="text" id="user" name="pfID" value="<?php if(($_SERVER['REQUEST_METHOD'] == 'POST')) echo $_POST['pfID']; ?>"><br>
                    <button type="submit">Log In</button></form>
            <br>
		</div>
	</div>
</body>
</html>

<!-- Login Credentials -->
<?php


if(!session_id())
   session_start();

session_destroy();

if(!session_id())
   session_start();

$access = false;

require_once('sql.php');

$_SESSION['access'] = $access;
if(!($_SERVER['REQUEST_METHOD'] == 'POST'))
	exit;

$pfID = valid_input($_POST['pfID']);

if(stripos($pfID, "'") != null){
	error("User does not exists");
	goto end;
}

$message;

if(empty($pfID)){
	$message = "Please enter the required fields";
	goto end;
}

// Create connection
$conn = new mysqli($DBservername, $DBusername, $DBpass, $DBname);
// Check connection
if ($conn->connect_error) {
   die("Connection failed: " . $conn->connect_error);
} 

$sql = "SELECT * FROM details where pecfestId = '$pfID'";

$retval = $conn->query($sql);
if($retval->num_rows<=0 || $retval->num_rows>1 )
{
	$message = "User does not exists";
	error($message);
   die('MySQL Query Error' . mysql_error());
}else{
	// echo "<h1> Correct login location.href='MainPanel.php'"; 
	$_SESSION['pfID'] = $pfID;
	echo "<meta http-equiv=\"refresh\"
   content=\"0; url=MainPanel.php\">";
}

end:

function error($message){
    echo '<script>alert("Error: '  . $message . ' ");</script>';
}

function valid_input($data) {
 $data = trim($data);
 $data = stripslashes($data);
 $data = htmlspecialchars($data);
 return $data;
}

?>

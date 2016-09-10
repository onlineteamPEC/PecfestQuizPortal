<?php
	if(!session_id())
		session_start();

	$_SESSION['pfID'] = null;
	echo "<meta http-equiv=\"refresh\"
   content=\"0; url=login.php\">";

?>

<?php
	
	$totalTimeForQuiz = 300; // In seconds
	$timePerQuestion = 10;
	$scoreAdditionDefault = 1;
	$totalQuestions = 5;

	if(!isset($_GET['q'])){
		//Quiz number not specified.
        echo '<script>alert("Error 341");</script>';
		exit();
	}
	
	$qzNo = $_GET['q']; // Quiz no. to display

	if(stripos($qzNo, "'") != null){
		error("Invalid quiz");
		goto end;
	}

	$_SESSION['q'] = $qzNo;
	require_once('sql.php');
	$conn = new mysqli($DBservername, $DBusername, $DBpass, $DBname);
	if ($conn->connect_error) {
		die("Connection failed: " . $conn->connect_error);
	} 
	
		if(!session_id())
			session_start();
		if(!isset($_SESSION['pfID'])){
			//echo "<h1>Session NULL value failiture.";
            echo '<script>alert("Please login to take the quiz.");</script>';
            echo "<meta http-equiv=\"refresh\"
   						content=\"0; url=logout.php\">";
			exit();
		}else{
			//echo " <a href=\"logout.php\"> Logout </a>";
			//echo "Welcome " . $_SESSION['pfID'];
		}

		$pfID = $_SESSION['pfID'];
		$qzTime = "Qz" . $qzNo . "MaxTime";
		$qzScore = "Qz" . $qzNo . "MaxScore";
		// $sql = "select $qzTime from details where pecfestId = '$pfID'";
		// $checkAttemp = $conn->query($sql);
		// $checkAttempRow = $checkAttemp->fetch_assoc();
		// if($checkAttempRow[$qzTime]!=0 && isset($_SESSION['timeStarted']) && !$_SESSION['timeStarted']){
  //           echo '<script>alert("You already took the quiz");</script>';
  //           echo "<meta http-equiv=\"refresh\"
  //  						content=\"0; url=MainPanel.php\">";
  //  			exit();
		// }

		if(isset($_SESSION['timeStarted'])){
			if(!$_SESSION['timeStarted']){
				$_SESSION['startTime'] = time();
				$_SESSION['timeStarted'] = true;
				$_SESSION['currScore'] = 0;

				// Get attempts
				$sql = "select $qzScore from details where pecfestId = '$pfID'";
				$getAttempts = $conn->query($sql);
				$getAttemptsRow = $getAttempts->fetch_assoc();

				$_SESSION['attemptMultiplier'] = $getAttemptsRow[$qzScore]/10000;

				if($_SESSION['attemptMultiplier'] == 0){
					$_SESSION['attemptMultiplier'] = 1;
					$sql = "update details set $qzScore = " . $_SESSION['attemptMultiplier']*10000 . " where pecfestId = '$pfID'";
					$conn->query($sql);
				}
				else
					$_SESSION['attemptMultiplier'] = $_SESSION['attemptMultiplier'] + 1;
			}
		}else{
            echo '<script>alert("Error: Timing issue code: 1334");</script>';
			exit();
		}

		if((time() - $_SESSION['startTime']) > $totalTimeForQuiz+1){ // Time in seconds including internet delay
            echo '<script>alert("Test is over. your last submission was not recorded."' .(time() - $_SESSION['startTime']) . ');</script>';
            echo "<meta http-equiv=\"refresh\"
   						content=\"0; url=MainPanel.php\">";
			exit();
		}

		if(!isset($_SESSION['quid'])){
			$quid = array();
			

	   		$sql = "SELECT quid FROM questionbank where qzno = $qzNo limit $totalQuestions";

			$retval = $conn->query($sql);
			if ($retval->num_rows<=0) {
				//echo "No Questions";
			}

			while($row = $retval->fetch_assoc()){
				//echo "Happ";
				array_push($quid, $row['quid']);
			}
			$_SESSION['quid'] = $quid;
		}

		shuffle($_SESSION['quid']);


		//HTTP POST Request -> Checking for the correct answer
		if($_SERVER['REQUEST_METHOD'] == 'POST'){
				$ans = $_POST['ans'];
				$scoreAddition = 0;
				if ($ans == $_SESSION['lastAns']){
					$scoreAddition = $scoreAdditionDefault;
				}
				$_SESSION['currScore'] = $_SESSION['currScore'] + $scoreAddition;

				$sql = "select $qzScore, $qzTime from details where pecfestId = '$pfID'";

				$getScore = $conn->query($sql);
				$getScoreRow = $getScore->fetch_assoc();
				$qTime = time() - $_SESSION['startTime'];
				$updateScore = 0;
				if(($getScoreRow[$qzScore]-($_SESSION['attemptMultiplier']*10000)) <= $_SESSION['currScore']){
					$updateScore = $_SESSION['currScore'] + $_SESSION['attemptMultiplier']*10000;
				}else{
					$updateScore = ($getScoreRow[$qzScore]%1000) + $_SESSION['attemptMultiplier']*10000;

					$qTime = $getScoreRow[$qzTime];
				}


					$sql = "update details set $qzScore = $updateScore, $qzTime = $qTime where pecfestId = '$pfID'";
					$conn->query($sql);
				

				//Check -> UPDATE

				// $sql = "select $qzScore, $qzTime from details where pecfestId = '$pfID'";
				// $getScore = $conn->query($sql);
				// $getScoreRow = $getScore->fetch_assoc();
				// $qScore = $getScoreRow['qz1score'];
				// $qTime = $getScoreRow['qz1time'];
				// $qScore = $qScore + $scoreAddition;
				// $qTime = time() - $_SESSION['startTime'];
				// $sql = "update details set $qzScore = $qScore, $qzTime = $qTime where pecfestId = '$pfID'";
				// $conn->query($sql);
			
		}

		if(count($_SESSION['quid'])<=0){
			echo "<script>alert(\"Quiz is over. Thank you for taking the quiz\"); </script> ";
			deleteSessionVars($pfID);
			// session_destroy();
			echo "<meta http-equiv=\"refresh\" content=\"0; url=MainPanel.php\">";
			exit();
		}

		$randQuid = $_SESSION['quid'][0];
		unset($_SESSION['quid'][0]);
		$_SESSION['lastQuid'] = $randQuid;


		$sql = "select * from questionbank where quid = $randQuid";
		$retval = $conn->query($sql);
		$row = $retval->fetch_assoc();
		$_SESSION['lastAns'] = $row['opt1'];

		$options = array($row['opt1'],$row['opt2'],$row['opt3'],$row['opt4']);
		shuffle($options);

		function deleteSessionVars($pfID_Session){
			if(!session_id())
				session_start();

			session_destroy();

			if(!session_id())
				session_start();

			$_SESSION['pfID'] = $pfID_Session;

		}

end:

function error($message){
    echo '<script>alert("Error: '  . $message . ' ");</script>';
}

	?>


<?php

echo "<script type=\"text/javascript\">";
    echo "var iRobin = $timePerQuestion-1;";
echo "setInterval(pecFest_Counter, 1000);";
echo "function pecFest_Counter(){";
    echo "var a = document.getElementById('timer');";
    echo "a.innerHTML = \"Time Left: \" + iRobin;";
    echo "if(iRobin == 0){";
        // echo "alert(\"Time limit exceeded.\");";
        echo "location.reload();";
    echo "}";
    echo "iRobin = iRobin-1 ;";
echo "}";

echo "</script>";

?>


<!-- NOTE:
	
	.Page.php/?q=2 -> Show 2nd quiz.
	.Timing implementation is done.
	.Time per question is to be defined on the top.
	.See how you can give our quiz a good ending.(See the ending echo statements)

	-ROBIN GAUTAM
	-->

<!DOCTYPE HTML>
<html>
<head>
    <meta charset="UTF-8">
	<title>Template</title>
	<link rel="stylesheet" href="css/template.css">
    <link rel="stylesheet" href="css/animate.css">
</head>
<body>
<div class="cover">
    <div class="buttons">
        <button name="change" id="btn2" onclick="location.href='mainpanel.php'">QUIZ PORTAL</button>
        <button name="change" id="btn2" onclick="location.href='logout.php'">LOGOUT</button>
        </div><br>
    <div class="content">
    <div class="questionarea animated fadeInDown">
        <right><h4 id="score">Score:</h4></right>
        <right><h4 id="timer">Time Left: <?php echo $timePerQuestion; ?></h4></right>
        <div class="labelback">
            <label><h2><?php echo $row['ques']; ?></h2></label></div>
    </div>
    <div class="contentspace">
        <form method = "post" action="">
            <div class="btn animated zoomIn">
                <button type="submit" name = "ans"  value="<?php echo $options[0]; ?>" id="btn"><img src="images/choice1.png"><br><br><?php echo $options[0]; ?></button>
                <button type="submit" name = "ans"  value="<?php echo $options[1]; ?>" id="btn"><img src="images/choice2.png"><br><br><?php echo $options[1]; ?></button>
                <button type="submit" name = "ans"  value="<?php echo $options[2]; ?>" id="btn"><img src="images/choice3.png"><br><br><?php echo $options[2]; ?></button>
                <button type="submit" name = "ans"  value="<?php echo $options[3]; ?>" id="btn"><img src="images/choice4.png"><br><br><?php echo $options[3]; ?></button>
            </div>
        </form>
    </div>
    </div>
</div>
</body>
</html>
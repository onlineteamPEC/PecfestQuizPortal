<?php
	// $pfID = "ROB1995";

	require_once('sql.php');
	// Create connection
			$conn = new mysqli($DBservername, $DBusername, $DBpass, $DBname);
			// Check connection
			if ($conn->connect_error) {
		 	   die("Connection failed: " . $conn->connect_error);
			} 
	if(!session_id())
		session_start();

		// echo session_id();

		if(!isset($_SESSION['pfID'])){
			echo "<h1>Session NULL value failiture.";
			exit();
		}else{
			echo " <a href=\"logout.php\"> Logout </a>";
			echo "Welcome " . $_SESSION['pfID'];
		}

		$pfID = $_SESSION['pfID'];

		if(!isset($_SESSION['quid'])){
			$quid = array();
			

	   		$sql = "SELECT quid FROM questionbank where qzno = 1";

			$retval = $conn->query($sql);
			if ($retval->num_rows<=0) {
				echo "No Questions";
			}

			while($row = $retval->fetch_assoc()){
				echo "Happ";
				array_push($quid, $row['quid']);
			}
			$_SESSION['quid'] = $quid;
		}

		shuffle($_SESSION['quid']);

		if(count($_SESSION['quid'])<=0){
			echo "No more questions, ";
			echo "Stop the timer.";
			session_destroy();
			exit();
		}

		$randQuid = $_SESSION['quid'][0];
		unset($_SESSION['quid'][0]);
		$_SESSION['lastQuid'] = $randQuid;
		
		// echo "Quid selected : " . $randQuid;
		// echo ", Total Quids left: " . count($_SESSION['quid']);


		//POST REQUEST -> CHECK THE ANSWER FOR 'LASTquiz' - 'LASTans'

		if($_SERVER['REQUEST_METHOD'] == 'POST'){
			$ans = $_POST['ans'];
			if ($ans == $_SESSION['lastAns']){
				$sql = "select qz1score, qz1time from details where pecfestId = '$pfID'";
				$getScore = $conn->query($sql);
				$getScoreRow = $getScore->fetch_assoc();
				$qScore = $getScoreRow['qz1score'];
				$qTime = $getScoreRow['qz1time'];
				$qScore = $qScore + 1;
				$qTime = $qTime + 10;
				$sql = "update details set qz1score = $qScore, qz1time = $qTime where pecfestId = '$pfID'";
				$conn->query($sql);
				// echo "<h1>Updated";
			}
		}


		$sql = "select * from questionbank where quid = $randQuid";
		$retval = $conn->query($sql);
		$row = $retval->fetch_assoc();
		$_SESSION['lastAns'] = $row['opt1'];



		$options = array($row['opt1'],$row['opt2'],$row['opt3'],$row['opt4']);
		shuffle($options)

	// exit();
	?>

<script type="text/javascript">
    var iRobin = 9;
setInterval(pecFest_Counter, 1000);

function pecFest_Counter(){
    var a = document.getElementById('timer');
    a.innerHTML = "Time Left: " + iRobin;
    if(iRobin == 0){
        alert("Time limit exceeded.");
        location.reload();
    }
    iRobin = iRobin-1 ;
}

</script>

<!-- NOTE:

	 Save the current time in Session, and when the page refreshes or gets a POST request, compare the time.
	if the difference is approximately the same as of the alotted time, then pass.. else stop the QUIZ.

	To be done by the person who implements the Button/answer inputs. 

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
    <div class="content">
        <div class="questionarea animated fadeInDown">
        <right><h4 id="timer">Time Left: 10</h4></right>
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
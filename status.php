<!DOCTYPE HTML>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Quiz Stack</title>
	<link rel="stylesheet" href="css/animate.css">
	<link rel="stylesheet" href="css/statusstyle.css">
</head>
<body>
    <div class="main">
        <div class="buttons animated fadeIn">
        <button name="change" id="btn2" onclick="location.href='mainpanel.php'">BACK</button>
        <button name="change" id="btn2" onclick="location.href='logout.php'">LOGOUT</button>
        </div><br>
        <div class="status animated fadeInLeft">
        <center><h1>Current Scores</h1></center><br>
            <center><table>
            <tr>
            <th>Quiz No</th>
            <th>Attempts</th>
            <th>Score</th>
            <th>Time</th></tr>
            <tr>
			
			<?php
			
			require_once('sql.php');
			$conn = new mysqli($DBservername, $DBusername, $DBpass, $DBname);
			if ($conn->connect_error) {
				die("Connection failed: " . $conn->connect_error);
			} 
			
			if(!session_id())
			session_start();
			if(!isset($_SESSION['pfID'])){
            echo '<script>alert("Please login to view the scores.");</script>';
            echo "<meta http-equiv=\"refresh\"
   						content=\"0; url=logout.php\">";
			exit();
			}
			
			$pfID = $_SESSION['pfID'];

            $sql = "select * from details where pecfestId = '$pfID'";
            $results = $conn->query($sql);
            if($results->num_rows <= 0){
                echo "ID not registered";
                exit();
            }
            $row = $results->fetch_assoc();

            
			
            $q1s = $row['Qz1MaxScore'];
            $q1a = intval($q1s/10000);
            $q1s = $q1s%1000;
            $q1t = $row['Qz1MaxTime'];
            
            $q2s = $row['Qz2MaxScore'];
            $q2a = intval($q2s/10000);
            $q2s = $q2s%1000;
            $q2t = $row['Qz2MaxTime'];
            
            $q3s = $row['Qz3MaxScore'];
            $q3a = intval($q3s/10000);
            $q3s = $q3s%1000;
            $q3t = $row['Qz3MaxTime'];
            
            $q4s = $row['Qz4MaxScore'];
            $q4a = intval($q4s/10000);
            $q4s = $q4s%1000;
            $q4t = $row['Qz4MaxTime'];
             
            $q5s = $row['Qz5MaxScore'];
            $q5a = intval($q5s/10000);
            $q5s = $q5s%1000;
            $q5t = $row['Qz5MaxTime'];
            
            $q6s = $row['Qz6MaxScore'];
            $q6a = intval($q6s/10000);
            $q6s = $q6s%1000;
            $q6t = $row['Qz6MaxTime'];
            
            $q7s = $row['Qz7MaxScore'];
            $q7a = intval($q7s/10000);
            $q7s = $q7s%1000;
            $q7t = $row['Qz7MaxTime'];
            
            $q8s = $row['Qz8MaxScore'];
            $q8a = intval($q8s/10000);
            $q8s = $q8s%1000;
            $q8t = $row['Qz8MaxTime'];
            
            $q9s = $row['Qz9MaxScore'];
            $q9a = intval($q9s/10000);
            $q9s = $q9s%1000;
            $q9t = $row['Qz9MaxTime'];
            

			?>			
			
            <td>1</td>
            <td><?php	echo $q1a	?></td>
            <td><?php	echo $q1s	?></td>
            <td><?php	echo $q1t	?></td></tr>
            <tr>
            <td>2</td>
            <td><?php	echo $q2a	?></td>
            <td><?php	echo $q2s	?></td>
            <td><?php	echo $q2t	?></td></tr>
            <tr>
            <td>3</td>
            <td><?php	echo $q3a	?></td>
            <td><?php	echo $q3s	?></td>
            <td><?php	echo $q3t	?></td></tr>
            <tr>
            <td>4</td>
            <td><?php	echo $q4a	?></td>
            <td><?php	echo $q4s	?></td>
            <td><?php	echo $q4t	?></td></tr>
            <tr>
            <td>5</td>
            <td><?php	echo $q5a	?></td>
            <td><?php	echo $q5s	?></td>
            <td><?php	echo $q5t	?></td></tr>
            <tr>
            <td>6</td>
            <td><?php	echo $q6a	?></td>
            <td><?php	echo $q6s	?></td>
            <td><?php	echo $q6t	?></td></tr>
            <tr>
            <td>7</td>
            <td><?php	echo $q7a	?></td>
            <td><?php	echo $q7s	?></td>
            <td><?php	echo $q7t	?></td></tr>
            <tr>
            <td>8</td>
            <td><?php	echo $q8a	?></td>
            <td><?php	echo $q8s	?></td>
            <td><?php	echo $q8t	?></td></tr>
            <tr>
            <td>9</td>
            <td><?php	echo $q9a	?></td>
            <td><?php	echo $q9s	?></td>
            <td><?php	echo $q9t	?></td></tr>
                </table></center>
				
			<?php	
			
			$sqll = "select TOP(10) Name, TotalScore from details ORDER BY TotalScore desc";
			$responsel = $conn->query($sqll);
			
			
			
			?>
				
				
        </div>
        <div class="leader animated fadeInLeft">
            <center><h1>LeaderBoard</h1></center><br>
            <center><table>
            <tr>
            <th>Rank</th>
            <th>Name</th></tr>
            <tr>
            <td>1</td>
            <td>0</td></tr>
            <tr>
            <td>2</td>
            <td>0</td></tr>
            <tr>
            <td>3</td>
            <td>0</td></tr>
            <tr>
            <td>4</td>
            <td>0</td></tr>
            <tr>
            <td>5</td>
            <td>0</td></tr>
            <tr>
            <td>6</td>
            <td>0</td></tr>
            <tr>
            <td>7</td>
            <td>0</td></tr>
            <tr>
            <td>8</td>
            <td>0</td></tr>
            <tr>
            <td>9</td>
            <td>0</td></tr>
            </table></center>
        </div>
    </div>
    </body>
</html>
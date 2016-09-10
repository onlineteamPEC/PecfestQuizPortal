<html>
<head>
    <?php
    if(!session_id())
        session_start();
    if(isset($_SESSION['pfID']))
        $_SESSION['timeStarted'] = false;

    if(!isset($_GET['q'])){
        //Quiz number not specified.
        echo '<script>alert("Error: 341");</script>';
        exit();
    }

    $q = $_GET['q'];
     
    ?>
    <meta charset="UTF-8">
	<title>Quiz Stack</title>
	<link rel="stylesheet" href="css/animate.css">
	<link rel="stylesheet" href="css/instructionstyle.css">
</head>
<body>
    <div class="main animated fadeIn">
        <div class="buttons">
        <button name="change" id="btn2" onclick="location.href='mainpanel.php'">BACK</button>
        <button name="change" id="btn2" onclick="location.href='logout.php'">LOGOUT</button>
        </div><br>
        <div class="inside">
        <center>
            <center><h1>The Quiz Master Rules</h1></center>
            <center><p>The whole world needs you to do what is right.<br> It's your time to follow the path towards a better future.</p></center>
            <hr><hr>
            <ol>
            <li>Total time alloted for this quiz is 60 seconds.</li>
            <li>You can answer upto 10 question.</li>
            <li>Each question has its own time limit of 10 seconds.</li>
            <li>The questions are selected from a question bank of 3000+ questions.</li>
            <li>For a particular quiz, you can attempt the quiz any number of times.</li>
            </ol>
            <div class="btn">
            <?php echo '<button name="change" id="btn" onclick="location.href=\'template.php?q=' . $q . '\'">'; ?> PROCEED</button></div>
        </center>
    </div>
    </div>
</body>
</html>

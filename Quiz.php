<!DOCTYPE HTML>
<html>
<head>
    <meta charset="UTF-8">
	<title>Quiz 1</title>
	<link rel="stylesheet" href="css/cardstyle2.css">
    <link rel="stylesheet" href="css/animate.css">
    <script type="text/javascript">
        function Choice1(){
        alert("Choice1");
        }
        function Choice2(){
        alert("Choice2");
        }
        function Choice3(){
        alert("Choice3");
        }
        function Choice4(){
        alert("Choice4");
        }
    </script>
</head>
<body>
<div class="main animated fadeIn">
    
    <div class="sidebar">
        <h2>QUIZ 1</h2>
        <h4>Time Left: 00: 59</h4>
        <div class="line">
        </div>
        <div class="labelback">
            <label>Q1. Choose your favourite superhero.</label>
        </div>
        
    </div>
    <!-- Frame of Search Results -->
    <div class="contentspace">
        <div class="choice" onclick="Choice1();"><img src="images/1.jpg">
            </div>
        <div class="choice2" onclick="Choice2();"><img src="images/2.jpg">
            </div>
        <div class="choice3" onclick="Choice3();"><img src="images/3.jpg">
            </div>
        <div class="choice4" onclick="Choice4();"><img src="images/4.jpg">
            </div>
    </div>
<!--
    <div class="tabs">
        <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method="post">
        <button type="submit">1</button><button type="submit">2</button><button type="submit">3</button><button type="submit">4</button><button type="submit">5</button>
        <button type="submit">6</button><button type="submit">7</button><button type="submit">8</button><button type="submit">9</button><button type="submit">10</button>
        </form>
    </div>
-->
</div>
</body>
</html>

<script>
$(function() {
    $("body").click(function(e) {
        if (e.target.id == "choice1" || $(e.target).parents("#choice1").size()) { 
            alert("Inside div");
        } else { 
           alert("Outside div");
        }
    });
})
</script>
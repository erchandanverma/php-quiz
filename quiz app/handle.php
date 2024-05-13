<?php
require_once __DIR__."/data.php";
$currect = 0;
$wrong = 0;

for ($i = 0; $i < count($data); $i++) {
    $index = $data[$i]['currect'];
    $cmarks = $data[$i]['cmarks'];
    $wmarks = $data[$i]['wmarks'];
    $user = isset($_REQUEST['$answer'][$i]) ? $_REQUEST['$answer'][$i] : 'No answer provided';
    $tr = $data[$i]['options'][$index];

    if ($tr === $user) {
        $currect += $cmarks;
    } else {
        $wrong += $wmarks;	
    }
}

$total_marks = $currect + $wrong;

echo "Total Marks = " . $total_marks . "<br/>";
echo "<a href='javascript:demo()'>View Answer</a>";
?>

<style>
    body {
        font-family: Arial, sans-serif;
        background-color: #f2f2f2;
        margin: 0;
        padding: 0;
    }

    h1 {
        color: #333;
        text-align: center;
    }

    a {
        display: block;
        text-align: center;
        margin-top: 20px;
        color: blue;
        text-decoration: underline;
        cursor: pointer;
    }

    #answers {
        display: none;
        padding: 20px;
        margin: 20px auto;
        max-width: 600px;
        background-color: #fff;
        border-radius: 5px;
        box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
    }
    
    .correct-answer {
        color: green;
    }
    
    .wrong-answer {
        color: red;
    }
</style>


<div id="answers">
    <?php
    for ($i = 0; $i < count($data); $i++) {
        $user = isset($_REQUEST['$answer'][$i]) ? $_REQUEST['$answer'][$i] : 'No answer provided';
        $index = $data[$i]['currect'];
        $tr = $data[$i]['options'][$index];
        $class = ($user === $tr) ? 'correct-answer' : 'wrong-answer'; // Assign class based on correctness
        echo "<p class='$class'>Correct Answer: $tr</p>";
        echo "<p class='$class'>Your Answer: $user</p><br/>";
    }
    ?>
</div>

<script>
    function demo() {
        var answersDiv = document.getElementById("answers");
        answersDiv.style.display = (answersDiv.style.display === "none") ? "block" : "none";
    }
</script>

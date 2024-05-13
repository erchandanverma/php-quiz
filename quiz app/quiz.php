<?php
require_once __DIR__."/data.php";
?>
<html>
<head>
    <title>PHP Quiz</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f2f2f2;
            margin: 0;
            padding: 0;
        }
        h1,h3{
            color: #333;
            text-align: center;
        }
        form {
            max-width: 600px;
            margin: 0 auto;
            padding: 20px;
            background-color: #fff;
            border-radius: 5px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }
        label {
            display: block;
            margin-bottom: 10px;
            font-weight: bold;
        }
        input[type="radio"] {
            display: none; /* Hide the default radio button */
        }
        .custom-radio {
            display: inline-block;
            position: relative;
            padding-left: 30px;
            margin-right: 15px;
            cursor: pointer;
            font-size: 16px;
        }
        .custom-radio input {
            position: absolute;
            opacity: 0;
            cursor: pointer;
        }
        .checkmark {
            position: absolute;
            top: 0;
            left: 0;
            height: 20px;
            width: 20px;
            background-color: #eee;
            border-radius: 50%;
        }
        .custom-radio:hover .checkmark {
            background-color: #ccc;
        }
        .custom-radio input:checked ~ .checkmark {
            background-color: blue;
        }
        .checkmark:after {
            content: "";
            position: absolute;
            display: none;
        }
        .custom-radio input:checked ~ .checkmark:after {
            display: block;
        }
        .custom-radio .checkmark:after {
            top: 6px;
            left: 6px;
            width: 8px;
            height: 8px;
            border-radius: 50%;
            background: white;
        }
        input[type="submit"] {
            background-color: blue;
            color: white;
            padding: 10px 20px;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            margin-top: 20px;
            display: block;
            margin-left: auto;
            margin-right: auto;
        }
        input[type="submit"]:hover {
            background-color: #0056b3; /* Darker blue on hover */
        }
    </style>
</head>
<body>
<h1>PHP Quiz</h1>
<h3>Note. All Question are Compulsery.</h3>
<form action="handle.php" method="post">
<?php foreach($data as $key => $value): ?>
    <label><?php echo $key + 1 . ". " . $value['question']; ?></label>
    <?php foreach($value['options'] as $quiz_key => $quiz_value): ?>
        <label class="custom-radio">
            <input type="radio" value="<?php echo $quiz_value; ?>" name="$answer[<?php echo $key; ?>]" />
            <span class="checkmark"></span>
            <?php echo $quiz_value; ?>
        </label><br/>
    <?php endforeach; ?>
<?php endforeach; ?>
<input type="submit" value="Submit"/>
</form>
</body>
</html>

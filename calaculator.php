<!DOCTYPE html>
<html lang="pl">
<head>
    <meta charset="UTF-8">
    <title>Calculator</title>
    <link rel="stylesheet" href="css/style.css" type="text/css">
</head>
<body>
<a href="calaculator.php"><h1>Best Calculator Ever</h1></a>

<form method="post" action="#">
    Podaj pierwszą liczbe: <br/><input type="text" name='num1'><br/>
    Wybierz działanie: <br/>
    <select name="operation">
        <option value="+">+</option>
        <option value="-">-</option>
        <option value="*">*</option>
        <option value="/">/</option>
        <option value="(x)²">(x)²</option>
        <option value="√">√</option>
        <option value="mod">mod</option>
        <option value="%">%</option>
    </select><br/>

    Podaj drugą liczbe: <br/> <input type="text" name='num2'><br/>

    <input type="submit" value="Policz!">
</form>
<?php

require_once "AdvancedCalculator.php";

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if (isset($_POST['num1']) && isset($_POST['num2'])) {
        $operation = $_POST['operation'];
        $num1 = (intval($_POST['num1']));
        $num2 = (intval($_POST['num2']));

        $calculator = new AdvancedCalculator();

        if ($operation == '+') {
            echo "<h3>" . $num1 . " + " . $num2 . " wynosi: " . $calculator->add($num1, $num2) . "</h3>";
        } else if ($operation == '-') {
            echo "<h3>" . $num1 . " - " . $num2 . " wynosi: " . $calculator->subtract($num1, $num2) . "</h3>";
        } else if ($operation == '*') {
            echo "<h3>" . $num1 . " * " . $num2 . " wynosi: " . $calculator->multiply($num1, $num2) . "</h3>";
        } else if ($operation == '/') {
            echo "<h3>" . $num1 . " / " . $num2 . " wynosi: " . $calculator->divide($num1, $num2) . "</h3>";
        } else if ($operation == '(x)²') {
            echo "<h3>" . $num1 . " do potęgi " . $num2 . " wynosi: " . $calculator->pow($num1, $num2) . "</h3>";
        } else if ($operation == '√') {
            echo "<h3>Pierwiastek " . $num2 . " stopnia z liczby " . $num1 . " wynosi: " . $calculator->root($num1, $num2) . "</h3>";
        } else if ($operation == 'mod') {
            echo "<h3>Reszta z dzielenia wynosi: " . $calculator->modulo($num1, $num2) . "</h3>";
        } else {
            echo "<h3>" . $num1 . " procent z liczby " . $num2 . " wynosi: " . $calculator->percent($num1, $num2) . "</h3>";
        }
    }
}

?>
<hr/>
Konwertuj z liczby dziesiętnej na binarną
<form method="post" action="#">
    <input type="text" name="decbin"/><br/>
    <input type="submit" value="Konwertuj"/>
</form>
<?php
if (isset($_POST['decbin'])) {
    $decbin = (intval($_POST['decbin']));
    echo "<h3>" . decbin($decbin) . "</h3>";
}
?>
Konwertuj z liczby binarnej na dziesiętną
<form method="post" action="#">
    <input type="text" name="bindec"/><br/>
    <input type="submit" value="Konwertuj"/>
</form>
<?php
if (isset($_POST['bindec'])) {
    $bindec = (intval($_POST['bindec']));
    echo "<h3>" . bindec($bindec) . "</h3>";
}
?>

</body>
</html>
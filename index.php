<!DOCTYPE html>
<html lang="pl">
<head>
    <meta charset="UTF-8">
    <title>Calculator</title>
    <link rel="stylesheet" href="css/style.css" type="text/css">
</head>
<body>
<a href="index.php"><h2>Kalkulator</h2></a>

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
            echo "<h1>" . $num1 . " + " . $num2 . " wynosi: " . $calculator->add($num1, $num2) . "</h1>";
        } else if ($operation == '-') {
            echo "<h1>" . $num1 . " - " . $num2 . " wynosi: " . $calculator->subtract($num1, $num2) . "</h1>";
        } else if ($operation == '*') {
            echo "<h1>" . $num1 . " * " . $num2 . " wynosi: " . $calculator->multiply($num1, $num2) . "</h1>";
        } else if ($operation == '/') {
            echo "<h1>" . $num1 . " / " . $num2 . " wynosi: " . $calculator->divide($num1, $num2) . "</h1>";
        } else if ($operation == '(x)²') {
            echo "<h1>" . $num1 . " do potęgi " . $num2 . " wynosi: " . $calculator->pow($num1, $num2) . "</h1>";
        } else if ($operation == '√') {
            echo "<h1>Pierwiastek " . $num2 . " stopnia z liczby " . $num1 . " wynosi: " . $calculator->root($num1, $num2) . "</h1>";
        } else if ($operation == 'mod') {
            echo "<h1>Reszta z dzielenia wynosi: " . $calculator->modulo($num1, $num2) . "</h1>";
        } else {
            echo "<h1>" . $num1 . " procent z liczby " . $num2 . " wynosi: " . $calculator->percent($num1, $num2) . "</h1>";
        }
    }
}

?>
<hr/>
<a href="index.php"><h2>Konwersja liczb</h2></a>

<form method="post" action="#">
    <label>Wprowadź liczbę: <br/><input type="text" name="value"/></label><br/>
    <label><input type="radio" name="radio1" value="decbin"/>Konwersja liczby dziesiętnej na binarną</label><br/>
    <label><input type="radio" name="radio2" value="bindec"/>Konwersja liczby binarnej na dziesiętną</label><br/>
    <label><input type="radio" name="radio3" value="dechex"/>Konwersja liczby dziesiętnej do szesnastkowej</label><br/>
    <label><input type="radio" name="radio4" value="hexdec"/>Konwersja liczby szesnastkowej do dziesiętnej</label><br/>
    <label><input type="radio" name="radio5" value="decoct"/>Konwersja liczby dziesiętnej do ósemkowej</label><br/>
    <label><input type="radio" name="radio6" value="octdec"/>Konwersja liczby ósemkowej do dziesiętnej</label><br/>
    <input type="submit" value="Konwertuj"/>
</form>
<?php

if (isset($_POST['value'])) {
    $value = (intval($_POST['value']));
    if (isset($_POST['radio1'])) {
        $decbin = $_POST['value'];
        echo "<h1>" . decbin($decbin) . "</h1>";
    } else if (isset($_POST['radio2'])) {
        $bindec = $_POST['value'];
        echo "<h1>" . bindec($bindec) . "</h1>";
    } else if (isset($_POST['radio3'])) {
        $dechex = $_POST['value'];
        echo "<h1>" . dechex($dechex) . "</h1>";
    } else if (isset($_POST['radio4'])) {
        $hexdec = $_POST['value'];
        echo "<h1>" . hexdec("$hexdec") . "</h1>";
    } else if (isset($_POST['radio5'])) {
        $decoct = $_POST['value'];
        echo "<h1>" . decoct($decoct) . "</h1>";
    } else {
        $octdec = $_POST['value'];
        echo "<h1>" . octdec($octdec) . "</h1>";
    }
}

?>

</body>
</html>
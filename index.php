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
    <label>Podaj pierwszą liczbe: <br/><input type="text" name='num1'></label><br/>
    <label>Wybierz działanie: <br/>
        <select name="operation">
            <option value="+">+</option>
            <option value="-">-</option>
            <option value="*">*</option>
            <option value="/">/</option>
            <option value="(x)²">(x)²</option>
            <option value="√">√</option>
            <option value="mod">mod</option>
            <option value="%">%</option>
        </select></label><br/>
    <label>Podaj drugą liczbe: <br/> <input type="text" name='num2'></label><br/>
    <input type="submit" value="Policz!">
</form>
<?php

require_once "AdvancedCalculator.php";

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if (isset($_POST['num1']) && isset($_POST['num2'])) {
        $operation = $_POST['operation'];
        $num1 = (float)($_POST['num1']);
        $num2 = (float)($_POST['num2']);

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
            echo "<h1>Pierwiastek " . $num1 . " stopnia z liczby " . $num2 . " wynosi: " . $calculator->root($num2, $num1) . "</h1>";
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
    <label>Wprowadź liczbę: <br/><input type="text" name="num"/></label><br/>
    <label><input type="radio" name="radio" value="decbin" checked>dec->bin</label><br/>
    <label><input type="radio" name="radio" value="bindec">bin->dec</label><br/>
    <label><input type="radio" name="radio" value="dechex">dec->hex</label><br/>
    <label><input type="radio" name="radio" value="hexdec">hex->dec</label><br/>
    <label><input type="radio" name="radio" value="decoct">dec->oct</label><br/>
    <label><input type="radio" name="radio" value="octdec">oct->dec</label><br/>
    <input type="submit" value="Konwertuj"/>
</form>

<?php

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if (isset($_POST['num']) && isset($_POST['radio'])) {
        $num = $_POST['num'];
        $radio = $_POST['radio'];

        switch ($radio) {
            case "decbin":
                echo "<h1>" . decbin($num) . "</h1>";
                break;
            case "bindec":
                echo "<h1>" . bindec($num) . "</h1>";
                break;
            case "dechex":
                echo "<h1>" . dechex($num) . "</h1>";
                break;
            case "hexdec":
                echo "<h1>" . hexdec($num) . "</h1>";
                break;
            case "decoct":
                echo "<h1>" . decoct($num) . "</h1>";
                break;
            case "octdec":
                echo "<h1>" . octdec($num) . "</h1>";
                break;
        }
    }
}

?>

</body>
</html>
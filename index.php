<!DOCTYPE html>
<html lang="pl">
<head>
    <meta charset="UTF-8">
    <title>Calculator</title>
    <link rel="stylesheet" href="css/style.css" type="text/css">
</head>
<body>
<div id="calc">
    <a href="index.php">Kalkulator</a>
    <form method="post" action="index.php">
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
                echo "<span style='color: green'>" . $num1 . " + " . $num2 . " wynosi: " . $calculator->add($num1, $num2) . "</span>";
            } else if ($operation == '-') {
                echo "<span style='color: yellow'>" . $num1 . " - " . $num2 . " wynosi: " . $calculator->subtract($num1, $num2) . "</span>";
            } else if ($operation == '*') {
                echo "<span style='color: red'>" . $num1 . " * " . $num2 . " wynosi: " . $calculator->multiply($num1, $num2) . "</span>";
            } else if ($operation == '/') {
                echo "<span style='color: blue'>" . $num1 . " / " . $num2 . " wynosi: " . $calculator->divide($num1, $num2) . "</span>";
            } else if ($operation == '(x)²') {
                echo "<span style='color: orange'>" . $num1 . " do potęgi " . $num2 . " wynosi: " . $calculator->pow($num1, $num2) . "</span>";
            } else if ($operation == '√') {
                echo "<span style='color: brown'>Pierwiastek " . $num1 . " stopnia z liczby " . $num2 . " wynosi: " . $calculator->root($num2, $num1) . "</span>";
            } else if ($operation == 'mod') {
                echo "<span style='color: gold'>Reszta z dzielenia wynosi: " . $calculator->modulo($num1, $num2) . "</span>";
            } else {
                echo "<span style='color: deeppink'>" . $num1 . " procent z liczby " . $num2 . " wynosi: " . $calculator->percent($num1, $num2) . "</span>";
            }
        }
    }
    ?>
</div>
<div id="number">
    <a href="index.php">Konwersja liczb</a>
    <form method="post" action="index.php">
        <label>Wprowadź liczbę: <br/><input type="text" name="num"/></label><br/>
        <label><input type="radio" name="radio" value="decbin" checked>dec->bin</label>
        <label><input type="radio" name="radio" value="bindec">bin->dec</label><br/>
        <label><input type="radio" name="radio" value="dechex">dec->hex</label>
        <label><input type="radio" name="radio" value="hexdec">hex->dec</label><br/>
        <label><input type="radio" name="radio" value="decoct">dec->oct</label>
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
                    echo "<span style='color: red'>" . decbin($num) . "</span>";
                    break;
                case "bindec":
                    echo "<span style='color: red'>" . bindec($num) . "</span>";
                    break;
                case "dechex":
                    echo "<span style='color: green'>" . dechex($num) . "</span>";
                    break;
                case "hexdec":
                    echo "<span style='color: green'>" . hexdec($num) . "</span>";
                    break;
                case "decoct":
                    echo "<span style='color: blue'>" . decoct($num) . "</span>";
                    break;
                case "octdec":
                    echo "<span style='color: blue;'>" . octdec($num) . "</span>";
                    break;
            }
        }
    }
    ?>
</div>
<div id="currency">
    <a href="index.php">Walutomat</a>
    <form method="post" action="index.php">
        <label>Podaj kwotę: <br/><input type="text" name="cash"/></label><br/>
        <label><input type="radio" name="conversion" value="plneur" checked/>PLN -> EUR</label>
        <label><input type="radio" name="conversion" value="eurpln"/>EUR -> PLN</label><br/>
        <label><input type="radio" name="conversion" value="plnusd"/>PLN -> USD</label>
        <label><input type="radio" name="conversion" value="usdpln"/>USD -> PLN</label><br/>
        <label><input type="radio" name="conversion" value="plnchf"/>PLN -> CHF</label>
        <label><input type="radio" name="conversion" value="chfpln"/>CHF -> PLN</label><br/>
        <label><input type="radio" name="conversion" value="plngbp"/>PLN -> GBP</label>
        <label><input type="radio" name="conversion" value="gbppln"/>GBP -> PLN</label><br/>
        <input type="submit" value="Przewalutuj"/>
    </form>
    <?php

    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        if (isset($_POST['cash'])) {
            $cash = $_POST['cash'];
            $conversion = $_POST['conversion'];

            switch ($conversion) {
                case "plneur";
                    $plneur = $cash * 0.2374;
                    echo "<span style='color: green'>" . $cash . " złotych wymienisz na " . $plneur . " euro</span>";
                    break;
                case "eurpln";
                    $eurpln = $cash * 4.21;
                    echo "<span style='color: green'>" . $cash . " euro wymienisz na " . $eurpln . " złotych</span>";
                    break;
                case "plnusd";
                    $plnusd = $cash * 0.2732;
                    echo "<span style='color: red'>" . $cash . " złotych wymienisz na " . $plnusd . " dolarów</span>";
                    break;
                case "usdpln";
                    $usdpln = $cash * 3.66;
                    echo "<span style='color: red'>" . $cash . " dolarów wymienisz na " . $usdpln . " złotych</span>";
                    break;
                case "plnchf";
                    $plnchf = $cash * 0.2613;
                    echo "<span style='color: yellow'>" . $cash . " złotych wymienisz na " . $plnchf . " franków szwajcarskich</span>";
                    break;
                case "chfpln";
                    $chfpln = $cash * 3.82;
                    echo "<span style='color: yellow'>" . $cash . " franków szwajcarskich wymienisz na " . $chfpln . " złotych</span>";
                    break;
                case "plngbp";
                    $plngbp = $cash * 0.2101;
                    echo "<span style='color: blue'>" . $cash . " złotych wymienisz na " . $plngbp . " funtów brytyjskich</span>";
                    break;
                case "gbppln";
                    $gbppln = $cash * 4.75;
                    echo "<span style='color: blue'>" . $cash . " funtów brytyjskich wymienisz na " . $gbppln . " złotych</span>";
                    break;
            }
        }
    }
    ?>
</div>
<div id="units">
    <a href="index.php">Jednostki</a>
    <form method="post" action="index.php">
        <label>Podaj wartość do przeliczenia: <br/><input type="text" name="value"/></label><br/>
        <label><input type="radio" name="count" value="CelsFahr" checked/>Celsjusz -> Fahrenheit</label>
        <label><input type="radio" name="count" value="FahrCels"/>Fahrenheit -> Celsjusz</label><br/>
        <label><input type="radio" name="count" value="KilMil"/>Kilometr -> Mila</label>
        <label><input type="radio" name="count" value="MilKil"/>Mila -> Kilometr</label><br/>
        <label><input type="radio" name="count" value="GrUnc"/>Gram -> Uncja</label>
        <label><input type="radio" name="count" value="UncGr"/>Uncja -> Gram</label><br/>
        <label><input type="radio" name="count" value="CmCal"/>Centymetr -> Cal</label>
        <label><input type="radio" name="count" value="CalCm"/>Cal -> Centymetr</label><br/>
        <input type="submit" value="Przelicz"/>
    </form>
    <?php

    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        if (isset($_POST['value'])) {
            $value = $_POST['value'];
            $count = $_POST['count'];

            switch ($count) {
                case "CelsFahr";
                    $celsFahr = 32 + ((9 / 5) * $value);
                    echo "<span style='color: green'>" . $value . " stopni Celsjusza to " . $celsFahr . " stopni Fahrenheita</span>";
                    break;
                case "FahrCels";
                    $fahrCels = (5 / 9) * ($value - 32);
                    echo "<span style='color: green'>" . $value . " stopni Fahrenheita to " . $fahrCels . " stopni Celsjusza</span>";
                    break;
                case "KilMil";
                    $kilMil = $value * 0.6214;
                    echo "<span style='color: red'>" . $value . " kilometrów to " . $kilMil . " mile</span>";
                    break;
                case "MilKil";
                    $milKil = $value * 1.6093;
                    echo "<span style='color: red'>" . $value . " mil to " . $milKil . " kilometrów</span>";
                    break;
                case "GrUnc";
                    $grUnc = $value * 0.0354;
                    echo "<span style='color: yellow'>" . $value . " gramów to " . $grUnc . " uncji</span>";
                    break;
                case "UncGr";
                    $uncGr = $value * 28.35;
                    echo "<span style='color: yellow'>" . $value . " uncji to " . $uncGr . " gramów</span>";
                    break;
                case "CmCal";
                    $cmCal = $value * 0.3937;
                    echo "<span style='color: blue'>" . $value . " centymetrów to " . $cmCal . " cali</span>";
                    break;
                case "CalCm";
                    $calCm = $value * 2.54;
                    echo "<span style='color: blue'>" . $value . " cali to " . $calCm . " centymetrów</span>";
                    break;
            }
        }
    }
    ?>
</div>
</body>
</html>
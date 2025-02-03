<?php
session_start();

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $num1 = isset($_POST["num1"]) ? floatval($_POST["num1"]) : null;
    $num2 = isset($_POST["num2"]) ? floatval($_POST["num2"]) : null;
    $operation = $_POST["operation"];
    $result = "";

    switch ($operation) {
        case "add":
            $result = $num1 + $num2;
            break;
        case "subtract":
            $result = $num1 - $num2;
            break;
        case "multiply":
            $result = $num1 * $num2;
            break;
        case "divide":
            $result = ($num2 != 0) ? ($num1 / $num2) : "Error: Division by zero";
            break;
        case "power":
            $result = pow($num1, $num2);
            break;
        case "percentage":
            $result = ($num1 / 100) * $num2;
            break;
        case "sqrt":
            $result = ($num1 >= 0) ? sqrt($num1) : "Error: Negative square root";
            break;
        case "log":
            $result = ($num1 > 0) ? log($num1) : "Error: Logarithm undefined for non-positive values";
            break;
        default:
            $result = "Invalid Operation";
    }

    $_SESSION["last_result"] = $result;

    if (!isset($_SESSION["history"])) {
        $_SESSION["history"] = [];
    }
    $expression = is_null($num2) ? "$num1 $operation = $result" : "$num1 $operation $num2 = $result";
    $_SESSION["history"][] = $expression;

    header("Location: index.php?result=" . urlencode($result));
    exit();
}
?>

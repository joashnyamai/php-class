<?php
session_start();

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if ($_POST["action"] == "recall") {
        $result = isset($_SESSION["last_result"]) ? $_SESSION["last_result"] : "No result stored";
        echo "<h2>Last Stored Result: " . htmlspecialchars($result) . "</h2>";
    } elseif ($_POST["action"] == "clear") {
        unset($_SESSION["last_result"]);
        echo "<h2>Memory Cleared!</h2>";
    }
    echo "<a href='index.php'>Back</a>";
}
?>

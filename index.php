<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Multipurpose Calculator</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
    <style>
        body {
            font-family: 'Arial', sans-serif;
            background-color: #f4f7f8;
            display: flex;
            justify-content: center;
            align-items: center;
            min-height: 100vh;
            margin: 0;
        }
        .container {
            background: white;
            padding: 20px 40px;
            border-radius: 15px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            max-width: 400px;
            text-align: center;
        }
        h1 {
            color: #333;
        }
        label {
            display: block;
            font-weight: bold;
            margin-top: 15px;
        }
        input[type="number"], select {
            width: 100%;
            padding: 10px;
            margin-top: 5px;
            border-radius: 8px;
            border: 1px solid #ccc;
        }
        input[type="submit"], button {
            width: 100%;
            background: #28a745;
            color: white;
            padding: 12px;
            margin-top: 15px;
            border: none;
            border-radius: 8px;
            cursor: pointer;
            font-size: 16px;
        }
        input[type="submit"]:hover, button:hover {
            background: #218838;
        }
        ul {
            list-style-type: none;
            padding: 0;
            margin-top: 10px;
        }
        ul li {
            background: #e9ecef;
            padding: 8px 12px;
            border-radius: 6px;
            margin: 5px 0;
        }
        a {
            display: inline-block;
            margin-top: 10px;
            text-decoration: none;
            color: #007bff;
        }
        a:hover {
            text-decoration: underline;
        }
    </style>
</head>
<body>
    <div class="container">
        <h1>Multipurpose Calculator</h1>
        <form action="calculate.php" method="post">
            <label for="num1">Number 1:</label>
            <input type="number" name="num1" id="num1" step="any" required>
            <label for="num2">Number 2:</label>
            <input type="number" name="num2" id="num2" step="any">
            <label for="operation">Operation:</label>
            <select name="operation" id="operation" required>
                <option value="add">Addition (+)</option>
                <option value="subtract">Subtraction (-)</option>
                <option value="multiply">Multiplication (*)</option>
                <option value="divide">Division (/)</option>
                <option value="power">Exponentiation (^)</option>
                <option value="percentage">Percentage (%)</option>
                <option value="sqrt">Square Root (√)</option>
                <option value="log">Logarithm (log)</option>
            </select>
            <input type="submit" name="calculate" value="Calculate">
        </form>
        <?php if (isset($_GET['result'])): ?>
            <h2>Result: <?= htmlspecialchars($_GET['result']) ?></h2>
        <?php endif; ?>
        <h2>Memory Options:</h2>
        <form action="memory.php" method="post">
            <button type="submit" name="action" value="recall">Recall Last Result</button>
            <button type="submit" name="action" value="clear">Clear Memory</button>
        </form>
        <h2>Calculation History:</h2>
        <?php
        session_start();
        if (isset($_SESSION['history']) && !empty($_SESSION['history'])):
        ?>
        <ul>
            <?php foreach (array_reverse($_SESSION['history']) as $record): ?>
                <li><?= htmlspecialchars($record) ?></li>
            <?php endforeach; ?>
        </ul>
        <?php else: ?>
        <p>No calculation history.</p>
        <?php endif; ?>
    </div>
</body>
</html>
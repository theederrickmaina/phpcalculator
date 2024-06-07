<!DOCTYPE html>
<html>
<head>
    <title>PHP Calculator</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f7f7f7;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            margin: 0;
        }
        .calculator {
            background-color: #fff;
            padding: 20px;
            border-radius: 10px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }
        .calculator input[type="number"],
        .calculator select {
            width: calc(100% - 22px);
            padding: 10px;
            margin: 10px 0;
            border: 1px solid #ccc;
            border-radius: 5px;
        }
        .calculator input[type="submit"] {
            width: 100%;
            padding: 10px;
            background-color: #28a745;
            border: none;
            color: #fff;
            border-radius: 5px;
            cursor: pointer;
            font-size: 16px;
        }
        .calculator input[type="submit"]:hover {
            background-color: #218838;
        }
        .result {
            margin-top: 20px;
            font-size: 18px;
        }
    </style>
</head>
<body>

<div class="calculator">
    <form method="post">
        <input type="number" name="num1" step="any" placeholder="Enter first number" required>
        <select name="operation">
            <option value="add">Addition</option>
            <option value="subtract">Subtraction</option>
            <option value="multiply">Multiplication</option>
            <option value="divide">Division</option>
            <option value="exponent">Exponentiation</option>
            <option value="percentage">Percentage</option>
            <option value="sqrt">Square Root</option>
            <option value="log">Logarithm</option>
        </select>
        <input type="number" name="num2" step="any" placeholder="Enter second number (if applicable)">
        <input type="submit" name="calculate" value="Calculate">
    </form>

    <?php
    if (isset($_POST['calculate'])) {
        $num1 = $_POST['num1'];
        $num2 = $_POST['num2'];
        $operation = $_POST['operation'];
        $result = '';

        switch ($operation) {
            case 'add':
                $result = $num1 + $num2;
                break;
            case 'subtract':
                $result = $num1 - $num2;
                break;
            case 'multiply':
                $result = $num1 * $num2;
                break;
            case 'divide':
                if ($num2 != 0) {
                    $result = $num1 / $num2;
                } else {
                    $result = 'Division by zero error';
                }
                break;
            case 'exponent':
                $result = pow($num1, $num2);
                break;
            case 'percentage':
                $result = ($num1 / 100) * $num2;
                break;
            case 'sqrt':
                $result = sqrt($num1);
                break;
            case 'log':
                if ($num1 > 0) {
                    $result = log($num1);
                } else {
                    $result = 'Logarithm error';
                }
                break;
            default:
                $result = 'Invalid operation';
                break;
        }

        echo "<div class='result'>Result: $result</div>";
    }
    ?>
</div>

</body>
</html>

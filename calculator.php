<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Simple Calculator</title>
      <link rel="stylesheet" href="style.css">
</head>
<body>
    <h1>Simple Calculator</h1>
    <div class="calculator">
        <form method="post">
            <input type="text" name="display" value="<?php echo isset($_POST['result']) ? $_POST['result'] : ''; ?>" readonly>
            <br>
            <button type="submit" name="key" value="7">7</button>
            <button type="submit" name="key" value="8">8</button>
            <button type="submit" name="key" value="9">9</button>
            <button type="submit" name="key" value="/" class="operator">÷</button>
            <br>
            <button type="submit" name="key" value="4">4</button>
            <button type="submit" name="key" value="5">5</button>
            <button type="submit" name="key" value="6">6</button>
            <button type="submit" name="key" value="*" class="operator">×</button>
            <br>
            <button type="submit" name="key" value="1">1</button>
            <button type="submit" name="key" value="2">2</button>
            <button type="submit" name="key" value="3">3</button>
            <button type="submit" name="key" value="-" class="operator">−</button>
            <br>
            <button type="submit" name="key" value="0">0</button>
            <button type="submit" name="key" value=".">.</button>
            <button type="submit" name="key" value="=" class="operator">=</button>
            <button type="submit" name="key" value="+" class="operator">+</button>
            <br>
            <button type="submit" name="key" value="C" class="clear">C</button>
        </form>
    </div>

    <?php
    // Initialize or continue calculation
    $currentExpression = isset($_POST['display']) ? $_POST['display'] : '';

    // Get the pressed button
    if ($_SERVER["REQUEST_METHOD"] === "POST" && isset($_POST['key'])) {
        $key = $_POST['key'];

        if ($key === "C") {
            // Clear the calculation
            $currentExpression = '';
        } elseif ($key === "=") {
            // Evaluate the calculation
            try {
                // Safe evaluation using eval
                $currentExpression = eval("return $currentExpression;");
            } catch (Exception $e) {
                $currentExpression = "Error";
            }
        } else {
            // Add key to the current expression
            $currentExpression .= $key;
        }
    }

    // Update the hidden field for the display
    echo "<script>document.getElementsByName('display')[0].value = '$currentExpression';</script>";
    ?>
</body>
</html>

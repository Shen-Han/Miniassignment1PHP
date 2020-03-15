<?php
    //set default value of variables for initial page load
    if (!isset($investment)) { $investment = ''; }
    if (!isset($interest)) { $interest = '';}
    if (!isset($years)){$years ='';}
    // this is where you should check to see if the interest_rate and $years are set
?>
<!DOCTYPE html>
<html>
<head>
    <title>Future Value Calculator</title>
    <link rel="stylesheet" type="text/css" href="main.css">
</head>

<body>
    <main>
    <h1>Future Value Calculator</h1>
    <?php
    //This code checks to see if we got an error message from the display_result.php page
     if (!empty($error_message)) { ?>
        <p class="error"><?php echo htmlspecialchars($error_message); ?></p>
    <?php } ?>
    <form action="display_results.php" method="post">

        <div id="data">
            <label>Investment Amount:</label>
            <input type="text" name="investment"
                   value="<?php echo htmlspecialchars($investment); ?>">
            <br>

            <!-- This is where you should put the Interest Rate -->
            <label>Yearly Interest Rate:</label>
            <input type = 'text' name = "interest"
                   value = "<?php echo htmlspecialchars($interest); ?>">
            <br>

            <!-- This is where you should put the Years input -->
            <Label>Number of Years:</Label>
            <input type ='text' name = "years"
                   value = "<?php echo htmlspecialchars($years);?>">

            <br>
        </div>

        <div id="buttons">
            <label>&nbsp;</label>
            <input type="submit" value="Calculate"><br>
        </div>

    </form>
    </main>
</body>
</html>
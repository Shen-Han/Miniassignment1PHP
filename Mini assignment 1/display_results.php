<?php
    // get the data from the form
    $investment = filter_input(INPUT_POST, 'investment',
        FILTER_VALIDATE_FLOAT);
    $years = filter_input(INPUT_POST,'years', FILTER_VALIDATE_FLOAT); //This should be replaced with a proper filter_input method call
    //Here is where you should create the add the interest_rate variable and get it via the filter_input method
    $interest = filter_input(INPUT_POST, 'interest', FILTER_VALIDATE_FLOAT);

    // validate investment
    if ($investment === FALSE ) {
        $error_message = 'Investment must be a valid number.';
    } else if ( $investment <= 0 ) {
        $error_message = 'Investment must be greater than zero.';
        }

    // Here is where you should validate interest rate

        if ($interest === FALSE){
            $error_message = 'Interest Rate must be a valid number.';
        } else if ($interest <= 0){
            $error_message ='Interest rate must be greater than zero.';
        }
    // Here is where you should validate years (make it larger than 0 and less than 50 years)
    if ($years === FALSE){
        $error_message = 'Must enter a valid numerical year.';
    } else if ($years <= 0 || $years>50){
        $error_message = 'Years entry must be larger than zero and smaller than 50';
    }

    // set error message to empty string if no invalid entries
     else {
        $error_message = '';
    }


    // if an error message exists, go to the index page
    if ($error_message != '') {
        //This redirects us to the index.php page again and displays the error_message
        include('index.php');
        exit();
    }

    // calculate the future value
    $future_value = $investment;
    for ($i = 1; $i <= $years; $i++) {
        $future_value += $future_value * $interest* .01;
    }

    // Here is where you should set the correct currency and percent formatting
    $investment_f = "$" + "$investment"; //replace this empty string with the correct number_format call
    $yearly_rate_f = $interest+"%"; //replace this empty string with the correct number_format call
    $future_value_f = "$" + $future_value; //replace this empty string with the correct number_format call
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

        <label>Investment Amount:</label>
        <span><?php echo $investment_f; ?></span><br>

        <label>Yearly Interest Rate:</label>
        <span><?php echo $yearly_rate_f; ?></span><br>

        <label>Number of Years:</label>
        <span><?php echo $years; ?></span><br>

        <label>Future Value:</label>
        <span><?php echo $future_value_f; ?></span><br>

        <div id="buttons">
            <label></label>
            <input type="submit" value="Try Again" onclick="index.php" method="post"><br>
        </div>
    </main>
</body>
</html>

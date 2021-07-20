<?php
    include_once 'lib/Session.php';
    Session::session_start();
    error_reporting(0);
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Party Sign Up</title>
    <link rel="stylesheet" href="css/login.css">
    <link rel="stylesheet" href="css/font-awesome.min.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Noto+Sans+JP&display=swap" rel="stylesheet">
</head>

<body>
    <form action="verify_code.php" method="post" class="main-block">
        <h1>Sign Up</h1>
            <?php if(Session::show_value("mail_message") != ""){?>
                <span><?php echo Session::show_value("mail_message"); ?></span>
            <?php }?>

        <input type="text" name="u_number" class="text-field" id="" placeholder="Security Code">

            <?php if(Session::show_value("u_number") != ""){?>
                <span><?php echo Session::show_value("u_number"); ?></span>
            <?php }?>

        <input type="submit" value="Verify Now" class="btn">

        <div class="login-block">
            <a href="login.php">Already Sign Up?</a>
        </div>
    </form>
</body>

</html>

<?php 
    Session::remove_value("mail_message");
    Session::remove_value("u_number");
?>
<?php
    include_once 'lib/Session.php';
    Session::session_start();
    error_reporting(0);
?>

<!DOCTYPE html>
<html lang="en-ca">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>PartiPpl - Retrieve Password</title>
    <link rel="stylesheet" href="css/login.css">
    <link rel="stylesheet" href="css/font-awesome.min.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Noto+Sans+JP&display=swap" rel="stylesheet">
</head>
<body>
    <form action="forget_code.php" method="post" class="main-block">
        <h1>Email</h1>

        <?php if(Session::show_value("forget_message") != ""){?>
            <span><?php echo Session::show_value("forget_message"); ?></span>
        <?php }?>

        <input type="email" name="u_email" class="text-field" id="" placeholder="Email">

            <?php if(Session::show_value("u_email") != ""){?>
                <span><?php echo Session::show_value("u_email"); ?></span>
            <?php }?>

        <input type="submit" value="Send Email" class="btn">
    </form>
</body>
</html>

<?php
    Session::remove_value("u_email");
    Session::remove_value("forget_message");
?>

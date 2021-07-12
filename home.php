<?php
    include_once 'lib/Session.php';
    Session::session_start();

    if (Session::show_value("u_name") == NULL || Session::show_value("u_name") == "") {
        header("Location: login.php");
    }

    if (isset($_POST["employe"])) {
        Session::set_value("user_type", "employe");
        header("Location: dashboard.php");
    }

    if (isset($_POST["job_seekers"])) {
        Session::set_value("user_type", "job_seeker");
        header("Location: dashboard.php");
    }
?>

<!DOCTYPE html>
<html lang="en-ca">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Dashboard</title>
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="css/font-awesome.min.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Noto+Sans+JP&display=swap" rel="stylesheet">
</head>
<body>
    <div class="main">
        <div class="main-container">
            <form action="" method="post" class="main-left">
                <input type="submit" value="Employe" class="btn" name="employe">
            </form>

            <form action="" method="post" class="main-right">
                <input type="submit" value="Job-Seekers" class="btn" name="job_seekers">
            </form>
        </div>
    </div>
</body>
</html>

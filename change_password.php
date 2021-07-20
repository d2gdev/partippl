<?php
    include_once 'lib/Session.php';
    Session::session_start();

    error_reporting(0);
    
    if (Session::show_value("u_name") == NULL || Session::show_value("u_name") == "") {
        header("Location: login.php");
    }

    if (Session::show_value("user_type") == NULL || Session::show_value("user_type") == "" ) {
        header("Location: login.php");
    }

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Dashboard</title>
    <link rel="stylesheet" href="css/dashboard.css">
    <link rel="stylesheet" href="css/change_password.css">
    <link rel="stylesheet" href="css/font-awesome.min.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Noto+Sans+JP&display=swap" rel="stylesheet">
</head>

<body>
    <div class="header">
        <div class="header-container">
            <div class="header-left">
                <div class="logo">Logo Here</div>
            </div>

            <div class="header-right">
                <p>Welcome <?php echo Session::show_value("u_name"); ?></p>
                <a href="logout.php"><span class="fa fa-sign-out"></span></a>
                <a href="notice.php" id="notice">
                    <span class="fa fa-bell"></span> <sup>02</sup>

                    <div class="notice-content">
                        <span>New Message from MR K K</span>
                        <span>New Converstaion is Now Waiting</span>
                        <span>Applicant want to chat with You</span>
                    </div>
                </a>
            </div>
        </div>
    </div>

    
    <?php if (Session::show_value("user_type") == "employe") {?>
        <div class="menu">
            <div class="menu-container">
                <a href="browse_job_seeker.php">Browse Job Seekers</a>
                <a href="new_job.php">Post a New Job</a>
                <a href="change_password.php">Reset Password</a>
                <a href="edit_profile.php">Edit My Profile</a>
                <a href="mail.php">Mailbox <sup>(02)</sup></a>
            </div>
        </div>
    <?php } ?>

    <?php if (Session::show_value("user_type") == "job_seeker") {?>
        <div class="menu">
            <div class="menu-container">
                <a href="browse_job_seeker.php">Browse Employe</a>
                <a href="new_job.php">Browse All Job</a>
                <a href="change_password.php">Reset Password</a>
                <a href="edit_profile.php">Edit My Profile</a>
                <a href="mail.php">Mailbox <sup>(02)</sup></a>
            </div>
        </div>
    <?php } ?>

    <div class="change-password">
        <div class="change-password-container">
            <div class="change-password-header">
                <h1>Change Password</h1>
            </div>

            <form action="change_password_code.php" method="post" class="change-password-content">

                <?php if(Session::show_value("pass_message") != ""){ ?>
                    <p><?php echo Session::show_value("pass_message"); ?></p>
                <?php } ?>

                <input type="password" name="old_pass" placeholder="Old Password" id="" class="text-field">
                
                <?php if(Session::show_value("old_pass") != ""){ ?>
                    <p><?php echo Session::show_value("old_pass"); ?></p>
                <?php } ?>

                <input type="password" name="new_pass" placeholder="New Password" id="" class="text-field">
                
                <?php if(Session::show_value("new_pass") != ""){ ?>
                    <p><?php echo Session::show_value("new_pass"); ?></p>
                <?php } ?>

                <input type="submit" value="Change Password" class="btn">
            </form>
        </div>
    </div>
</body>
</html>

<?php
    Session::remove_value("pass_message");
    Session::remove_value("old_pass");
    Session::remove_value("new_pass");
?>
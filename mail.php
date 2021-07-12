<?php
    include_once 'lib/Select_Query.php';

    $s_que = new Select_Query();

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
    <link rel="stylesheet" href="css/mail.css">
    <link rel="stylesheet" href="css/font-awesome.min.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Noto+Sans+JP&display=swap" rel="stylesheet">
</head>

<body>
    <div class="header">
        <div class="header-container">
            <div class="header-left">
                <div class="logo"><a href="dashboard.php"><img src="img/ppl-Logo.png"></a></div>
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

    <?php if (Session::show_value("user_type") == "employe") { ?>
        <div class="menu">
            <div class="menu-container">
                <a href="browse_job_seeker.php">Browse All Job Seekers</a>
                <a href="new_job.php">Post a New Job</a>
                <a href="change_password.php">Reset Password</a>
                <a href="edit_profile.php">Edit My Profile</a>
                <a href="mail.php">Mailbox <sup>(02)</sup></a>
            </div>
        </div>
    <?php } ?>

    <?php if (Session::show_value("user_type") == "job_seeker") { ?>
        <div class="menu">
            <div class="menu-container">
                <a href="browse_job_seeker.php">Browse All Employers</a>
                <a href="new_job.php">Browse All Jobs</a>
                <a href="change_password.php">Reset Password</a>
                <a href="edit_profile.php">Edit My Profile</a>
                <a href="mail.php">Mailbox <sup>(02)</sup></a>
            </div>
        </div>
    <?php } ?>

    <?php if (Session::show_value("user_type") == "employe") { ?>
        <div class="mail">
            <div class="mail-container">
                <div class="mail-content">
                    <div class="mail-left">
                        <h1>Mailbox</h1>

                        <?php
                            $count = $s_que->select_chat_message_count_for_inbox();

                            $i = 0;

                            if ($count != false) {
                                foreach($count as $data){
                                    $i++;
                                }
                            }
                        ?>

                        <a href="#">INBOX (<?php echo $i; ?>)</a>

                        <?php
                            $outbox_count = $s_que->select_chat_message_count_for_outbox();

                            $j = 0;

                            if ($outbox_count != false) {
                                foreach($outbox_count as $data){
                                    $j++;
                                }
                            }
                        ?>

                        <a href="outbox.php">OUTBOX (<?php echo $j; ?>)</a>
                    </div>

                    <div class="mail-right">
                        <div class="mail-right-header">
                            <h1>INBOX</h1>
                            <h2>Welcome to Your Inbox.</h2>
                        </div>

                        <?php
                            $data = $s_que->select_chat_message();
                            if ($data !=  false) {
                        ?>
                            <?php foreach($data as $result){ ?>
                                <div class="mail-right-content">
                                    <a href="chat_details.php?chat_id=<?php echo $result['c_from'] ?>" class="mail-right-content-left">
                                        <p><?php echo $result['c_from'] ?></p>
                                    </a>

                                    <div class="mail-right-content-right">
                                        2021/07/11
                                    </div>
                                </div>
                            <?php } ?>
                        <?php } ?>
                    </div>
                </div>
            </div>
        </div>
    <?php } ?>

    <?php if (Session::show_value("user_type") == "job_seeker") { ?>
        <div class="mail">
            <div class="mail-container">
                <div class="mail-content">
                    <div class="mail-left">
                        <h1>Mailbox</h1>

                        <?php
                            $count = $s_que->select_chat_message_count_for_job_seeker();
                            $i = 0;
                            foreach($count as $data){
                                $i++;
                            }
                        ?>

                        <a href="mail.php">INBOX (<?php echo $i; ?>)</a>

                        <?php
                            $outbox_count = $s_que->select_chat_message_count_for_outbox();

                            $j = 0;

                            if ($outbox_count != false) {
                                foreach($outbox_count as $data2){
                                    $j++;
                                }
                            }
                        ?>

                        <a href="outbox.php">OUTBOX (<?php echo $j; ?>)</a>

                    </div>

                    <div class="mail-right">
                        <div class="mail-right-header">
                            <h1>INBOX</h1>
                            <h2>Welcome to your inbox.</h2>
                        </div>

                        <?php
                            $data = $s_que->select_chat_message_2();
                        ?>

                        <?php foreach($data as $result){ ?>
                            <div class="mail-right-content">
                                <a href="chat_details.php?chat_id=<?php echo $result['c_from'] ?>" class="mail-right-content-left">
                                    <p><?php echo $result['c_from'] ?></p>
                                </a>

                                <div class="mail-right-content-right">
                                    2021/07/10
                                </div>
                            </div>
                        <?php } ?>

                    </div>
                </div>
            </div>
        </div>
    <?php } ?>
</body>
</html>

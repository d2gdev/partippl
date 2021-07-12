<?php
    include_once 'lib/Select_Query.php';
    include_once 'lib/Insert_Query.php';

    error_reporting(0);

    $s_que = new Select_Query();
    $i_que = new Insert_Query();

    if (Session::show_value("u_name") == NULL || Session::show_value("u_name") == "") {
        header("Location: login.php");
    }

    if (Session::show_value("user_type") == NULL || Session::show_value("user_type") == "" ) {
        header("Location: login.php");
    }

    if (Session::show_value("user_type") == "employe") {

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
                <div class="logo"><a href="dashboard.php"><img src="img/ppl-Logo"></a></div>
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

    <?php
        $received_by = $_GET['chat_id'];
        $s_que->select_specific_chat_details($received_by);
    ?>

    <?php if (Session::show_value("user_type") == "employe") { ?>
        <div class="chat-details">
            <?php

                $data = $s_que->select_chat_data_2($received_by);
                $u_name = Session::show_value('u_name');
                $active_status = $s_que->select_active_status($received_by)->fetch_assoc();
            ?>

            <section>
                <div><b><?php echo $received_by; ?></b></div>

                <?php if($active_status['active_status'] == "Active"){ ?>
                    <div><?php echo $active_status['active_status'] ?>  Online Now</div>
                <?php }else{ ?>
                    <div>Offline Now</div>
                <?php } ?>
            </section>

            <?php foreach($data as $result){ ?>
                <?php if($result['c_from'] == $u_name){ ?>
                    <div class="chat-details-left">
                        <?php echo $result['c_message'] ?>
                    </div>
                <?php }else{ ?>
                    <div class="chat-details-right">
                        <?php echo $result['c_message'] ?>
                    </div>
                <?php } ?>
            <?php } ?>

            <form method="POST" action="chat_details_code.php" class="chat-details-footer">
                <input type="hidden" name="received_by" value="<?php echo $received_by; ?>">
                <textarea class="text-field" id="" cols="30" rows="5" placeholder="Start Type Here" name="chat_message"></textarea>

                <?php if (Session::show_value("chat_message") != "") {?>
                    <span><?php echo Session::show_value("chat_message"); ?></span>
                <?php }?>

                <input type="submit" value="Send" class="btn" name="inbox">
            </div>
        </div>
    <?php } ?>

    <?php if (Session::show_value("user_type") == "job_seeker") { ?>
        <div class="chat-details">
            <?php
                $data = $s_que->select_chat_data_2($received_by);
                $u_name = Session::show_value('u_name');
                $active_status = $s_que->select_active_status($received_by)->fetch_assoc();
            ?>

            <section>
                <div><b><?php echo $received_by; ?></b></div>

                <?php if($active_status['active_status'] == "Active"){ ?>
                    <div><?php echo $active_status['active_status'] ?> Online Now</div>
                <?php }else{ ?>
                    <div>Offline Now</div>
                <?php } ?>
            </section>

            <?php foreach($data as $result){ ?>
                <?php if($result['c_from'] == $received_by){ ?>
                    <div class="chat-details-left">
                        <?php echo $result['c_message'] ?>
                    </div>
                <?php }else{ ?>
                    <div class="chat-details-right">
                        <?php echo $result['c_message'] ?>
                    </div>
                <?php } ?>
            <?php } ?>

            <form method="POST" action="chat_details_code2.php" class="chat-details-footer">
                <input type="hidden" name="sent_by" value="<?php echo $received_by; ?>">
                <textarea class="text-field" id="" cols="30" rows="5" placeholder="Start Type Here" name="chat_message"></textarea>
                <input type="submit" value="Send" class="btn">
            </div>
        </div>
    <?php } ?>
</body>
</html>

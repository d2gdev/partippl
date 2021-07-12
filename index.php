<?php
    include_once 'lib/Select_Query.php';
    error_reporting(0);
    $s_que = new Select_Query();
    $data = $s_que->select_slick_job_seeker();
?>

<!DOCTYPE html>
<html lang="en-ca">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Party</title>
    <link rel="stylesheet" href="css/home/style.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Quicksand:wght@500&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="css/font-awesome.min.css">
    <link rel="stylesheet" href="css/home/slick.css">
    <script src="https://unpkg.com/@lottiefiles/lottie-player@latest/dist/lottie-player.js"></script>
</head>

<body>
    <div class="hero">
        <div class="hero-container">
            <div class="hero-left">
                <div class="hero-left-header">
                    <div class="hero-left-header-left">
                        <img src="img/logo.png" width="100%" height="100%" alt="">
                    </div>

                    <div class="hero-left-header-right">
                        <a href="#" id="active">Work</a>
                        <a href="sign.php">Hire</a>
                        <a href="login.php">Login</a>
                    </div>
                </div>

                <img src="img/17.png" width="100%" height="100%" alt="" class="img-2">

                <div class="hero-left-content">
                    <b>PARTY PEOPLE</b>

                    <img src="img/20.png" width="100%" height="100%" alt="" class="img-3">
                    <img src="img/19.png" width="100%" height="100%" alt="" class="img-4">

                    <section>
                        Having a party? A get together? <br>
                        A big event? We know how to party! <br>
                        We are the Party People.
                    </section>

                    <a href="#">REGISTER</a>
                </div>

                <img src="img/18.png" width="100%" height="100%" alt="" class="img-5">

                <div class="hero-left-footer">
                    <div class="hero-left-footer-left">
                        <h1>Hire</h1>

                        <section>
                            Post a new job and watch the applications
                            come rolling in! its easy as 1-2-3.
                        </section>
                    </div>

                    <div class="hero-left-footer-right">
                        <h1>Work</h1>

                        <section>
                            Register and create a jobseekers profile,
                            apply for jobs, start working. Get paid
                        </section>
                    </div>
                </div>
            </div>

            <?php if ($data != false) {?>
                <div class="hero-right">
                    <div class="hero-right-block-container" id="hero-right-block-container">
                        <?php foreach($data as $result){ ?>
                            <div class="hero-right-block">
                                <div class="hero-right-left">
                                    <img src="job_seeker_img/<?php echo $result['j_img'] ?>" width="100%" height="100%" alt="">
                                </div>

                                <div class="hero-right-right">
                                    <a href="login.php" class="hero-right-right-header">
                                        <section>LOGIN</section>
                                        <img src="img/2.png" width="100%" height="100%" alt="">
                                    </a>

                                    <div class="hero-right-right-footer">
                                        <a href="#"><?php echo $result['j_location'] ?></a>
                                        <a href="#">AGE - <?php echo $result['j_age'] ?></a>
                                        <a href="#"><?php echo $result['j_name'] ?></a>
                                    </div>
                                </div>
                            </div>
                        <?php } ?>
                    </div>

                    <div class="pagingInfo"></div>

                    <div class="hero-right-icon-block">
                        <div class="hero-right-icon-left"><span class="fa fa-angle-left"></span></div>
                        <div class="hero-right-icon-right"><span class="fa fa-angle-right"></span></div>
                    </div>
                </div>
            <?php } ?>
        </div>
    </div>

    <div class="parti">
        <div class="parti-container">
            <div class="parti-left">
                <h1>Benefits Of Partippl</h1>

                <section>
                    Here are some of the many benefits of using the Partippl
                    platform to find your Partippl.
                </section>

                <a href="#">View More <img src="img/9.png" width="15px" alt=""></a>
            </div>

            <div class="parti-right">
                <div class="parti-right-header">
                    <div class="parti-right-header-block">
                        <img src="img/5.png" width="100%" height="100%" alt="">
                    </div>

                    <div class="parti-right-header-block">
                        <img src="img/4.png" width="100%" height="100%" alt="">
                    </div>
                </div>

                <div class="parti-right-footer">
                    <div class="parti-right-footer-block">
                        <img src="img/3.png" width="100%" height="100%" alt="">
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="staff">
        <div class="staff-container">
            <div class="staff-left">
                <h1>INSTANTLY FIND STAFF</h1>

                <section>
                    Find staff that are perfect for your job, and your situation instantly.
                    Simply, sign up, post a job and begin browsing staff to find the people
                    that are perfect for your requirements.
                </section>

                <a href="#">Learn More <img src="img/10.png" width="15px" alt=""></a>

            </div>

            <div class="staff-right">
                <div class="staff-right-img" id="staff-right-img">
                    <img src="img/dj.jpg" width="100%" height="100%" alt="">

                </div>

            </div>
        </div>
    </div>

    <div class="staff">
        <div class="staff-container">
            <div class="staff-left">
                <h1>COST EFFECTIVE</h1>

                <section>
                    Since you are only hiring staff on a per job basis you don't need to have
                    people even when you aren't busy or are not having an event.
                </section>

                <a href="#">Learn More <img src="img/10.png" width="15px" alt=""></a>

            </div>

            <div class="staff-right">
                <div class="staff-right-img" id="staff-right-img-2">
                    <img src="img/5.png" width="100%" height="100%" alt="">
                </div>

            </div>
        </div>
    </div>

    <div class="staff">
        <div class="staff-container">
            <div class="staff-left">
                <h1>SOCIAL REVIEW PROCESS</h1>

                <section>
                    Benefit from the reviews left by other employers for our staff and hire
                    only the best. Staff are required to maintain a four star rating in order
                    to remain on our platform.
                </section>

                <a href="#">Learn More <img src="img/10.png" width="15px" alt=""></a>

            </div>

            <div class="staff-right">
                <div class="staff-right-img" id="staff-right-img-3">
                    <img src="img/44.png" width="100%" height="100%" alt="">

                </div>

            </div>
        </div>
    </div>

    <div class="staff-2">
        <div class="staff-2-container">
            <div class="staff-2-header">
                <h1>Types of Staff</h1>

                <section>
                    Partippl for the time being focuses on just a few specific
                    job roles. As time goes by we may add more, but for the time
                    being; and forthe sake of clarity we have taken the time give
                    a broader description of each role you can book for on our website.
                </section>
            </div>

            <div class="staff-2-content">
                <div class="staff-2-block">
                    <div class="staff-2-block-header">
                        <img src="img/6.png" width="100%" height="100%" alt="">

                        <h2>Bartenders</h2>
                    </div>

                    <div class="staff-2-block-content">
                        A person who mixes and pours drinks is a bartender. A bartender
                        adds style and pizzazz to any party and allows you to focus on
                        entertaining your guests. In hiring a bartender make sure you
                        are clear with the PartiPpl you speak to in regards to your
                        expectations. Will they just be required to pour drinks, or will
                        they need to be a mixologist. As with all of our booking types,
                        you can specify whether you prefer to hire a male or female.
                    </div>
                </div>

                <div class="staff-2-block">
                    <div class="staff-2-block-header">
                        <img src="img/14.png" width="100%" height="100%" alt="">

                        <h2>Waitstaff</h2>
                    </div>

                    <div class="staff-2-block-content">
                        Waitstaff are good if you are having an party where you will be
                        serving people food and/or drinks. They can bring things to
                        tables, help you setup and tear down, and help with the overall
                        tasks of running an event. Essentially, waitstaff will do for you
                        what you would expect them to do in a restaurant. When you
                        post a job you can specify if you prefer male or female waiters.
                    </div>
                </div>

                <div class="staff-2-block">
                    <div class="staff-2-block-header">
                        <img src="img/15.png" width="100%" height="100%" alt="">

                        <h2>Promotions Staff</h2>
                    </div>

                    <div class="staff-2-block-content">
                        Are you launching a new product? Opening a new business?
                        Promoting an existing product? Promotional staff generally help
                        you attract people to your product in public places by handing
                        out free samples or otherwise sparking interest. Great
                        promotional staff have a perfect mix of looks, salesmanship,
                        and charisma.
                    </div>
                </div>

                <div class="staff-2-block">
                    <div class="staff-2-block-header">
                        <img src="img/16.png" width="100%" height="100%" alt="">

                        <h2>Entertainers</h2>
                    </div>

                    <div class="staff-2-block-content">
                        At PartiPpl when we talk about entertainers we are not talking
                        about people who can juggle, or clowns. We are talking about
                        someone who can act as a person at your event or party whose
                        only job it is to create a positive vibe and make sure everyone is
                        having fun. An entertainer should be outgoing, and a great
                        conversation starter. Someone everyone likes being around.
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="hire">
        <div class="hire-container">
            <div class="hire-header">
                <h1>Hiring Party People is Easy!</h1>
            </div>

            <div class="hire-content">
                <div class="hire-block">
                    <div class="hire-left">
                        <h1>POST A NEW JOB</h1>

                        <section>
                            The best way to find the best PartiPpl is by posting
                            and job advert. When you do so everyone you are targeting
                            will get an email informing them of the job.
                        </section>

                        <div class="hire-number">01</div>
                    </div>

                    <div class="hire-right">
                        <div class="hire-right-img">
                            <lottie-player id="firstLottie"
                            src="https://assets5.lottiefiles.com/packages/lf20_s5dhjbui.json"
                            background="transparent"
                            speed="1"
                            style="width:350px; height: 350px;"
                            loop
                            autoplay>
                          </lottie-player>
                          <script>
                          LottieInteractivity.create({
                            player: '#firstLottie',
                            mode: 'cursor',
                            actions: [
                              {
                                position: { x: [0, 1], y: [-1, 2] },
                                type: 'seek',
                                frames: [0, 181],
                              },
                              {
                                position: { x: -1, y: -1 },
                                type: 'stop',
                                frames: [0],
                              },
                            ],
                          });
                        </script>
                        </div>
                    </div>
                </div>

                <div class="hire-block">
                    <div class="hire-left">
                        <h1>START GETTING APPLICATIONS</h1>

                        <section>
                            Examine she brother prudent add day ham. Far stairs
                            now coming bed oppose hunted become his. You
                            zealously departure had procuring suspicion.
                        </section>

                        <div class="hire-number">02</div>
                    </div>

                    <div class="hire-right">
                        <div class="hire-right-img">
                            <lottie-player id="applications"
                            src="https://assets10.lottiefiles.com/private_files/lf30_yPKMfX.json"
                            background="secondLottie"
                            speed="1"
                            style="width:350px; height: 350px;"
                            loop
                            autoplay>
                          </lottie-player>
                          <script>
                          LottieInteractivity.create({
                            mode:"scroll",
                            player:'#secondLottie',
                            actions: [
                              {
                                visibility:[0,1],
                                type: "seek",
                                frames: [0, 181],
                              },
                            ]
                          });
                        </script>
                        </div>
                    </div>
                </div>

                <div class="hire-block">
                    <div class="hire-left">
                        <h1>HIRE STAFF</h1>

                        <section>
                            Shot what able cold new the see hold. Friendly as an
                            betrayed formerly he. Morning because as to society
                            behaved moments. Put ladies design Mrs. sister was.
                        </section>

                        <div class="hire-number">03</div>
                    </div>

                    <div class="hire-right">
                        <div class="hire-right-img">
                            <lottie-player id="thirdLottie"
                            src="https://assets1.lottiefiles.com/packages/lf20_6aYlBl.json"
                            background="thirdLottie"
                            speed="1"
                            style="width:350px; height: 350px;"
                            loop
                            autoplay>
                          </lottie-player>
                          <script>
                          LottieInteractivity.create({
                            mode:"scroll",
                            player:'#hired',
                            actions: [
                              {
                                visibility:[0,1],
                                type: "seek",
                                frames: [0, 181],
                              },
                            ]
                          });
                        </script>
                        </div>
                    </div>
                </div>

                <div class="hire-border"></div>
            </div>
        </div>
    </div>

    <div class="faq">
        <div class="faq-container">
            <div class="faq-header">
                <div class="faq-header-left">
                    <h1>Frequently Asked <br> Questions</h1>
                </div>

                <div class="faq-header-right">
                    <div class="faq-header-right-block">
                        <section onclick="show_faq('employee', this)" class="faq-active-2" id="default">Employer F.A.Q.
                        </section>
                    </div>

                    <div class="faq-header-right-block">
                        <section onclick="show_faq('staff', this)" class="faq-active-2">Staff F.A.Q</section>
                    </div>
                </div>
            </div>

            <div class="faq-content" id="employee">
                <div class="faq-left">
                    <div class="faq-block">
                        <div class="faq-block-header"><b>How much is PartiPpl</b> <span class="fa fa-plus"></span></div>

                        <div class="faq-block-content">
                            During our closed beta we are not charging members for
                            access. Ultimately, PartiPpl will always be free for those
                            looking for work and the plan is to eventually charge those
                            looking to hire a monthly membership fee. We have yet to
                            determine a revenue model for PartiPpl but will do so based
                            on the feedback from the community.
                        </div>
                    </div>

                    <div class="faq-block">
                        <div class="faq-block-header"><b>How do I post a job?</b> <span class="fa fa-plus"></span></div>

                        <div class="faq-block-content">
                            During our closed beta we are not charging members for
                            access. Ultimately, PartiPpl will always be free for those
                            looking for work and the plan is to eventually charge those
                            looking to hire a monthly membership fee. We have yet to
                            determine a revenue model for PartiPpl but will do so based
                            on the feedback from the community.
                        </div>
                    </div>
                </div>

                <div class="faq-right">
                    <div class="faq-block">
                        <div class="faq-block-header"><b>How do I pay staff? </b> <span class="fa fa-plus"></span></div>

                        <div class="faq-block-content">
                            During our closed beta we are not charging members for
                            access. Ultimately, PartiPpl will always be free for those
                            looking for work and the plan is to eventually charge those
                            looking to hire a monthly membership fee. We have yet to
                            determine a revenue model for PartiPpl but will do so based
                            on the feedback from the community.
                        </div>
                    </div>

                    <div class="faq-block">
                        <div class="faq-block-header"><b>How do I hire the right staff?</b> <span
                                class="fa fa-plus"></span></div>

                        <div class="faq-block-content">
                            During our closed beta we are not charging members for
                            access. Ultimately, PartiPpl will always be free for those
                            looking for work and the plan is to eventually charge those
                            looking to hire a monthly membership fee. We have yet to
                            determine a revenue model for PartiPpl but will do so based
                            on the feedback from the community.
                        </div>
                    </div>

                    <div class="faq-block">
                        <div class="faq-block-header"><b>I need to extend the booking.</b> <span
                                class="fa fa-plus"></span></div>

                        <div class="faq-block-content">
                            During our closed beta we are not charging members for
                            access. Ultimately, PartiPpl will always be free for those
                            looking for work and the plan is to eventually charge those
                            looking to hire a monthly membership fee. We have yet to
                            determine a revenue model for PartiPpl but will do so based
                            on the feedback from the community.
                        </div>
                    </div>
                </div>
            </div>

            <div class="faq-content" id="staff">
                <div class="faq-left">
                    <div class="faq-block">
                        <div class="faq-block-header"><b>How do I get paid?</b> <span class="fa fa-plus"></span></div>

                        <div class="faq-block-content">
                          First of all, PartiPpl has no involvement in the payment
                          process, nor do we set any kind of rates. This is strictly
                          between you and whichever job you choose to accept. When
                          deciding upon payment please decide with your employer on
                          how much you will be paid.  Also be clear as to when and
                          how you will be paid. We will take any complaints from staff
                          seriously and if you find yourself in a situation where
                          you were not paid please contact us immediately.
                        </div>
                    </div>

                    <div class="faq-block">
                        <div class="faq-block-header"><b>How do I find work?</b> <span class="fa fa-plus"></span></div>

                        <div class="faq-block-content">
                          First make sure to register for PartiPpl by clicking
                          here. Once you have registered you need to completely
                          fill out your profile. In your profile make sure to
                          include recent, clear photos. Once you have completed
                          these tasks you are able to send and receive messages
                          as well as view and apply to job advertisements.
                        </div>
                    </div>
                </div>

                <div class="faq-right">
                    <div class="faq-block">
                        <div class="faq-block-header"><b>What should I wear?</b> <span class="fa fa-plus"></span></div>

                        <div class="faq-block-content">
                          In the event you are unsure as to what the dress code
                          is for your booking just ask the person hiring you in
                          order to gain clarity on the issue.
                        </div>
                    </div>

                    <div class="faq-block">
                        <div class="faq-block-header"><b>A client wants to extend the booking.</b> <span
                                class="fa fa-plus"></span></div>

                        <div class="faq-block-content">
                          If the client would like to extend the booking you are
                          of course under no obligation to do so, however; if
                          you are able and willing to do so then just make sure
                          you negotiate whatever it is you feel you need to
                          extend.
                        </div>
                    </div>

                    <div class="faq-block">
                        <div class="faq-block-header"><b>I feel unsafe at a booking.</b> <span
                                class="fa fa-plus"></span></div>

                        <div class="faq-block-content">
                          Your safety should always be your foremost priority.
                          Please do not stay in a booking where you feel safe. In
                          the event you feel you cannot continue a job and feel
                          you cannot safely discuss what might be bothering you
                          about a booking please leave. Once you have left please
                          contact us and let us know the circumstances in order
                          for us to make PartiPpl a better platform.
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="find">
        <div class="find-container">
            <div class="find-left">
                <div class="find-left-block">
                    <h1>Find Your Party People Now!</h1>

                    <section>
                        In order to plan the best event, you need to find the best people. Our
                        professional partiers from Party People will help make sure your event
                        is a hit. They will make sure things run smoothly, and the energy stays
                        high, that way you can focus on the party.
                    </section>

                    <b>Book instantly for your next event.</b>

                    <a href="#">START NOW</a>
                </div>
            </div>

            <div class="find-right">
                <div class="find-right-img">
                    <img src="img/8.png" width="100%" height="100%" alt="">
                </div>
            </div>
        </div>
    </div>

    <div class="border-image">
        <img src="img/24.png" width="100%" height="100%" alt="">
        <img src="img/25.png" width="100%" height="100%" alt="">

        <img src="img/24.png" width="100%" height="100%" alt="">
        <img src="img/25.png" width="100%" height="100%" alt="">

        <img src="img/24.png" width="100%" height="100%" alt="">
        <img src="img/25.png" width="100%" height="100%" alt="">

        <img src="img/24.png" width="100%" height="100%" alt="">
        <img src="img/25.png" width="100%" height="100%" alt="">

        <img src="img/24.png" width="100%" height="100%" alt="">
        <img src="img/25.png" width="100%" height="100%" alt="">

        <img src="img/24.png" width="100%" height="100%" alt="">
        <img src="img/25.png" width="100%" height="100%" alt="">

        <img src="img/24.png" width="100%" height="100%" alt="">
        <img src="img/25.png" width="100%" height="100%" alt="">

        <img src="img/24.png" width="100%" height="100%" alt="">
        <img src="img/25.png" width="100%" height="100%" alt="">

        <img src="img/24.png" width="100%" height="100%" alt="">
        <img src="img/25.png" width="100%" height="100%" alt="">

        <img src="img/24.png" width="100%" height="100%" alt="">
        <img src="img/25.png" width="100%" height="100%" alt="">

        <img src="img/24.png" width="100%" height="100%" alt="">
        <img src="img/25.png" width="100%" height="100%" alt="">

        <img src="img/24.png" width="100%" height="100%" alt="">
        <img src="img/25.png" width="100%" height="100%" alt="">

        <img src="img/24.png" width="100%" height="100%" alt="">
        <img src="img/25.png" width="100%" height="100%" alt="">

        <img src="img/24.png" width="100%" height="100%" alt="">
        <img src="img/25.png" width="100%" height="100%" alt="">

        <img src="img/24.png" width="100%" height="100%" alt="">
        <img src="img/25.png" width="100%" height="100%" alt="">

        <img src="img/24.png" width="100%" height="100%" alt="">
        <img src="img/25.png" width="100%" height="100%" alt="">

        <img src="img/24.png" width="100%" height="100%" alt="">
        <img src="img/25.png" width="100%" height="100%" alt="">

        <img src="img/24.png" width="100%" height="100%" alt="">
        <img src="img/25.png" width="100%" height="100%" alt="">

        <img src="img/24.png" width="100%" height="100%" alt="">
        <img src="img/25.png" width="100%" height="100%" alt="">

        <img src="img/24.png" width="100%" height="100%" alt="">
        <img src="img/25.png" width="100%" height="100%" alt="">

        <img src="img/24.png" width="100%" height="100%" alt="">
        <img src="img/25.png" width="100%" height="100%" alt="">

        <img src="img/24.png" width="100%" height="100%" alt="">
        <img src="img/25.png" width="100%" height="100%" alt="">

        <img src="img/24.png" width="100%" height="100%" alt="">
        <img src="img/25.png" width="100%" height="100%" alt="">
    </div>

    <div class="footer">
        <div class="footer-container">
            <div class="footer-left">
                <div class="logo"><img src="img/logo.png" width="100%" height="100%" alt=""></div>

                <p>
                    Having a party? A get together? A big event? <br>
                    We know how to party! We are the Party People.
                </p>

                <span>Get the freshest news from our site.</span>
                <br><br>

                <?php if(Session::show_value("c_mail_message") != ""){ ?>
                    <?php echo Session::show_value("c_mail_message"); ?>
                <?php } ?>

                <form action="collect_mail_code.php" method="POST" class="news-form">
                    <input type="email" name="c_email" class="news-text" required>
                    <input type="submit" value="SUBSCRIBE" class="news-btn">
                </form>

                <?php Session::remove_value("c_mail_message"); ?>
            </div>

            <div class="footer-right">
                <div class="footer-right-left">
                    <b>Quick Links</b>

                    <a href="#">Hire</a>
                    <a href="#">Work</a>
                </div>

                <div class="footer-right-right">
                    <b>Contact Us</b>

                    <a href="mailto:info@partippl.com">Email Us!</a>
                </div>
            </div>
        </div>
    </div>

    <div class="footer-last">
        <div class="footer-last-container">
            <div class="footer-last-left">
                <a href="#">Terms & Conditions</a>
                <a href="#">Privacy Policy</a>
                <a href="#">Contact Us</a>
            </div>

            <?php
                $copy_data = $s_que->select_copy_data()->fetch_assoc();
            ?>

            <div class="footer-last-right">
                <?php echo $copy_data['copy_text_name'] ?>
            </div>
        </div>
    </div>

    <script src="js/home/jquery.min.js"></script>
    <script src="js/home/slick.js"></script>
    <script src="js/home/main.js"></script>

    <script>
    var $status = $('.pagingInfo');
    var $slickElement = $('#hero-right-block-container');

    $slickElement.on('init reInit afterChange', function(event, slick, currentSlide, nextSlide) {
        //currentSlide is undefined on init -- set it to 0 in this case (currentSlide is 0 based)
        var i = (currentSlide ? currentSlide : 0) + 1;
        $status.text(i + '/' + slick.slideCount);
    });

    $('#hero-right-block-container').slick({
        dots: false,
        autoplay: true,
        autoplaySpeed: 2500,
        slidesToShow: 1,
        slidesToScroll: 1,
        centerMode: true,
        variableWidth: true,
        prevArrow: $('.hero-right-icon-left'),
        nextArrow: $('.hero-right-icon-right')
    });

    $('#staff-right-img').slick({
        dots: false,
        autoplay: true,
        autoplaySpeed: 2500,
        slidesToShow: 1,
        slidesToScroll: 1,
    });


    $('#staff-right-img-2').slick({
        dots: false,
        autoplay: true,
        autoplaySpeed: 2500,
        slidesToShow: 1,
        slidesToScroll: 1,
    });


    $('#staff-right-img-3').slick({
        dots: true,
        autoplay: true,
        autoplaySpeed: 2500,
        slidesToShow: 1,
        slidesToScroll: 1,
    });
    </script>
</body>

</html>

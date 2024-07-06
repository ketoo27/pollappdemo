<!doctype html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>POLLHUB</title>

        <!-- CSS FILES -->        
        <link rel="preconnect" href="https://fonts.googleapis.com">
        
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>

        <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@500;600;700&family=Open+Sans&display=swap" rel="stylesheet">
                        
        <link href="css/bootstrap.min.css" rel="stylesheet">

        <link href="css/bootstrap-icons.css" rel="stylesheet">

        <link href="css/templatemo-topic-listing.css" rel="stylesheet">      



    </head>
    
    <body id="top">

        <main>

            <nav class="navbar navbar-expand-lg">
                <div class="container">
                    <a class="navbar-brand" href="index.php">
                        <i class="bi-back"></i>
                        <span>POLLHUB</span>
                    </a>

                    <div class="d-lg-none ms-auto me-4">
                        <a href="#top" class="navbar-icon bi-person smoothscroll"></a>
                    </div>
    
                    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                        <span class="navbar-toggler-icon"></span>
                    </button>
    
                    <div class="collapse navbar-collapse" id="navbarNav">
                        <ul class="navbar-nav ms-lg-5 me-lg-auto">
                            <li class="nav-item">
                                <a class="nav-link click-scroll" href="#section_1">HOME</a>
                            </li>

                            <li class="nav-item">
                                <a class="nav-link" href="admin_login.php">ADMIN</a>
                            </li>
    
                            <li class="nav-item">
                                <a class="nav-link click-scroll" href="#section_3">How does it work?</a>
                            </li>

                            <li class="nav-item">
                                <a class="nav-link click-scroll" href="#section_4">FAQs</a>
                            </li>
                            

                        </ul>

                        <div class="d-none d-lg-block">
                            <a href="#top" class="navbar-icon bi-person smoothscroll"></a>
                        </div>
                    </div>
                </div>
            </nav>
            

            <section class="hero-section d-flex justify-content-center align-items-center" id="section_1">
                <div class="container">
                    <div class="row">

                        <div class="col-lg-8 col-12 mx-auto">
                            <h1 class="text-white text-center">Your Opinions Matter, Amplify Them with PollHub</h1>

                            <h6 class="text-center">Platform For Where Polls Transform into Powerful Insights</h6>

                           
                        </div>

                    </div>
                </div>
            </section>
            <section class="featured-section">
    <div class="container">
        <div class="row justify-content-center">
        <div class="col-lg-6 col-md-6 col-12 mb-4 mb-lg-0">
    <div class="custom-block bg-white shadow-lg">
        <div class="d-flex">
            <div>
                <h5 class="mb-2">Welcome Back User</h5>
                <p class="mb-0">Unlock Your World of Voices with PollHub - Where Every Opinion Counts!</p>
            </div>
            <span class="badge bg-finance rounded-pill ms-auto">1</span>
        </div>
        <img src="images/topics/undraw_Finance_re_gnv2.png" class="custom-block-image img-fluid" alt="">
        <div style="margin-top: 60px;"> <!-- Adjust margin-top as needed -->
            <p class="mb-0">Don't have an account? <a href="create_account.php">Create one</a></p>
        </div>
    </div>
</div>





            <div class="col-lg-4 col-12 mb-4 mb-lg-0">
                <div class="custom-block bg-white shadow-lg">
                    
                        <div class="d-flex">
                            <div>
                                <h3 class="mb-2">USER LOGIN</h3>
                                <form action="login_process.php" method="post" class="custom-form contact-form" role="form">
                                    <div class="form-floating mb-3">
                                         <input type="text" name="username" id="username" class="form-control" placeholder="username" required="">
                                         <label for="username">Username:</label>
                                    </div>

                                    <div class="form-floating mb-3">
                                          <input type="password" name="password" id="password" class="form-control" placeholder="password" >
                                            <label for="password">Password:</label>
                                    </div>

                                    <button type="submit" class="btn custom-btn">Login</button>
                                </form>
                            </div>
                        </div>

                        <img src="images/topics/undraw_Remote_design_team_re_urdx.png" class="custom-block-image img-fluid" alt="">
                    
                </div>
            </div>
            <div class="col-lg-6 col-12">

</div>


        </div>
    </div>
</section>



            
           


            <section class="timeline-section section-padding" id="section_3">
                <div class="section-overlay"></div>

                <div class="container">
                    <div class="row">

                        <div class="col-12 text-center">
                            <h2 class="text-white mb-4">How does it work?</h1>
                        </div>

                        <div class="col-lg-10 col-12 mx-auto">
                            <div class="timeline-container">
                                <ul class="vertical-scrollable-timeline" id="vertical-scrollable-timeline">
                                    <div class="list-progress">
                                        <div class="inner"></div>
                                    </div>

                                    <li>
                                        <h4 class="text-white mb-3">User Registration and Login:</h4>

                                        <p class="text-white">Users register for an account and log in using their credentials.Upon login, users are authenticated and directed to the main landing page.</p>

                                        <div class="icon-holder">
                                          <i class="bi-search"></i>
                                        </div>
                                    </li>
                                    
                                    <li>
                                        <h4 class="text-white mb-3">Creating and Participating in Polls:</h4>

                                        <p class="text-white">Registered users can create new polls by providing a question and options.Created polls are stored in the database and displayed on the main landing page.Users can participate in polls by selecting options and submitting votes.</p>

                                        <div class="icon-holder">
                                          <i class="bi-bookmark"></i>
                                        </div>
                                    </li>

                                    <li>
                                        <h4 class="text-white mb-3">Admin Dashboard and Poll Management:</h4>

                                        <p class="text-white">Admin users log in through the admin login page using their credentials.Admins access the admin dashboard to view statistics, manage polls, and perform administrative tasks.Admins can view user, poll, and vote statistics, as well as delete or modify polls as needed.</p>

                                        <div class="icon-holder">
                                          <i class="bi-book"></i>
                                        </div>
                                    </li>
                                </ul>
                            </div>
                        </div>

                        <div class="col-12 text-center mt-5">
                            <p class="text-white">
                                Want to learn more?
                                <a href="#" class="btn custom-btn custom-border-btn ms-3">Check out Youtube</a>
                            </p>
                        </div>
                    </div>
                </div>
            </section>


            <section class="faq-section section-padding" id="section_4">
                <div class="container">
                    <div class="row">

                        <div class="col-lg-6 col-12">
                            <h2 class="mb-4">Frequently Asked Questions</h2>
                        </div>

                        <div class="clearfix"></div>

                        <div class="col-lg-5 col-12">
                            <img src="images/faq_graphic.jpg" class="img-fluid" alt="FAQs">
                        </div>

                        <div class="col-lg-6 col-12 m-auto">
                            <div class="accordion" id="accordionExample">
                                <div class="accordion-item">
                                    <h2 class="accordion-header" id="headingOne">
                                        <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                                        How do I register for an account on PollHub?
                                        </button>
                                    </h2>

                                    <div id="collapseOne" class="accordion-collapse collapse show" aria-labelledby="headingOne" data-bs-parent="#accordionExample">
                                        <div class="accordion-body">
                                        To register for an account on PollHub, simply navigate to the registration page and provide your full name, email address, username, and password. Once you've filled out the registration form and submitted it, your account will be created, and you'll be able to log in and start using PollHub.
                                        </div>
                                    </div>
                                </div>

                                <div class="accordion-item">
                                    <h2 class="accordion-header" id="headingTwo">
                                        <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
                                        Can I create multiple polls on PollHub?
                                    </button>
                                    </h2>

                                    <div id="collapseTwo" class="accordion-collapse collapse" aria-labelledby="headingTwo" data-bs-parent="#accordionExample">
                                        <div class="accordion-body">
                                        Yes, absolutely! Once you've logged in to your PollHub account, you can create as many polls as you'd like. Simply navigate to the "Create Poll" section, enter your poll question and options, and submit the form. Your newly created poll will then be available for other users to participate in.
                                    </div>
                                </div>

                                <div class="accordion-item">
                                    <h2 class="accordion-header" id="headingThree">
                                        <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseThree" aria-expanded="false" aria-controls="collapseThree">
                                        How can I access the admin dashboard on PollHub?
                                    </button>
                                    </h2>

                                    <div id="collapseThree" class="accordion-collapse collapse" aria-labelledby="headingThree" data-bs-parent="#accordionExample">
                                        <div class="accordion-body">
                                        Accessing the admin dashboard on PollHub is simple. If you're an admin user, all you need to do is log in to your account using the admin login page. Once logged in, you'll be directed to the admin dashboard, where you can view various statistics, manage polls, and perform administrative tasks to ensure the smooth functioning of the platform.
                                    </div>
                                </div>
                            </div>
                        </div>

                    </div>
                </div>
            </section>


           
        </main>

<footer id="footer" class="site-footer section-padding">
            <div class="container">
                <div class="row">

                    <div class="col-lg-3 col-12 mb-4 pb-2">
                        <a class="navbar-brand mb-2" href="index.html">
                            <i class="bi-back"></i>
                            <span>POLLHUB</span>
                        </a>
                    </div>

                    <div class="col-lg-3 col-md-4 col-6">
                        <h6 class="site-footer-title mb-3">Resources</h6>

                        <ul class="site-footer-links">
                            <li class="site-footer-link-item">
                                <a href="#" class="site-footer-link">Home</a>
                            </li>

                            <li class="site-footer-link-item">
                                <a href="#" class="site-footer-link">How it works</a>
                            </li>

                            <li class="site-footer-link-item">
                                <a href="#" class="site-footer-link">FAQs</a>
                            </li>

                            <li class="site-footer-link-item">
                                <a href="#" class="site-footer-link">Contact</a>
                            </li>
                        </ul>
                    </div>

                    <div class="col-lg-3 col-md-4 col-6 mb-4 mb-lg-0">
                        <h6 class="site-footer-title mb-3">Information</h6>

                        <p class="text-white d-flex mb-1">
                            <a href="tel: 305-240-9671" class="site-footer-link">
                                9420813763
                            </a>
                        </p>

                        <p class="text-white d-flex">
                            <a href="mailto:info@company.com" class="site-footer-link">
                                krishnatikule1@gmail.com
                            </a>
                        </p>
                    </div>

                    <div class="col-lg-3 col-md-4 col-12 mt-4 mt-lg-0 ms-auto">
                        <div class="dropdown">
                            <button class="btn btn-secondary dropdown-toggle" type="button" data-bs-toggle="dropdown" aria-expanded="false">
                            English</button>

                            <ul class="dropdown-menu">
                                
                            </ul>
                        </div>

                        <p class="copyright-text mt-lg-5 mt-4">Copyright © 2024 POLLHUB . All rights reserved.
                        <br><br>Design: <a rel="nofollow" href="https://templatemo.com" target="_blank">TemplateMo</a></p>
                        
                    </div>

                </div>
            </div>
        </footer>


        <!-- JAVASCRIPT FILES -->
        <script src="js/jquery.min.js"></script>
        <script src="js/bootstrap.bundle.min.js"></script>
        <script src="js/jquery.sticky.js"></script>
        <script src="js/click-scroll.js"></script>
        <script src="js/custom.js"></script>

    </body>
</html>

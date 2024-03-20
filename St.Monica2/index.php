<?php
include_once('hms/patient/include/config.php');
if (isset($_POST['submit'])) {
    $name = $_POST['fullname'];
    $email = $_POST['emailid'];
    $mobileno = $_POST['mobileno'];
    $dscrption = $_POST['description'];
    $query = mysqli_query($con, "insert into tblcontactus(fullname,email,contactno,message) value('$name','$email','$mobileno','$dscrption')");
    echo "<script>alert('Your information succesfully submitted');</script>";
    echo "<script>window.location.href ='index.php'</script>";
} ?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title>St.Monica Hospital</title>
    <meta content="width=device-width, initial-scale=1.0" name="viewport">

    <!-- Favicon -->
    <link href="img/favicon.ico" rel="icon">

    <!-- Google Web Fonts -->
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Roboto+Condensed:wght@400;700&family=Roboto:wght@400;700&display=swap" rel="stylesheet">

    <!-- Icon Font Stylesheet -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.0/css/all.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.4.1/font/bootstrap-icons.css" rel="stylesheet">

    <!-- Libraries Stylesheet -->
    <link href="lib/owlcarousel/assets/owl.carousel.min.css" rel="stylesheet">
    <link href="lib/tempusdominus/css/tempusdominus-bootstrap-4.min.css" rel="stylesheet" />

    <!-- Customized Bootstrap Stylesheet -->
    <link href="css/bootstrap.min.css" rel="stylesheet">

    <!-- Template Stylesheet -->
    <link href="css/style.css" rel="stylesheet">
</head>

<body>
    <!-- Topbar Start -->
    <div class="container-fluid py-2 border-bottom d-none d-lg-block">
        <div class="container">
            <div class="row">
                <div class="col-md-6 text-center text-lg-start mb-2 mb-lg-0">
                    <div class="d-inline-flex align-items-center">
                        <a class="text-decoration-none text-body pe-3" href=""><i class="bi bi-telephone me-2"></i>+012 345 6789</a>
                        <span class="text-body">|</span>
                        <a class="text-decoration-none text-body px-3" href=""><i class="bi bi-envelope me-2"></i>st.monica@gmail.com</a>
                    </div>
                </div>
                <div class="col-md-6 text-center text-lg-end">
                    <div class="d-inline-flex align-items-center">
                        <a class="text-body px-2" href="hms/include/sidebar2.php">
                            <i class="fab fa-facebook-f"></i>
                        </a>
                        <a class="text-body px-2" href="">
                            <i class="fab fa-twitter"></i>
                        </a>
                        <a class="text-body px-2" href="">
                            <i class="fab fa-linkedin-in"></i>
                        </a>
                        <a class="text-body px-2" href="">
                            <i class="fab fa-instagram"></i>
                        </a>
                        <a class="text-body ps-2" href="">
                            <i class="fab fa-youtube"></i>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Topbar End -->


    <!-- Navbar Start -->
    <div class="container-fluid sticky-top bg-white shadow-sm">
        <div class="container">
            <nav class="navbar navbar-expand-lg bg-white navbar-light py-3 py-lg-0">
                <a href="index.html" class="navbar-brand">
                    <h1 class="m-0 text-uppercase text-primary"><i class="fa fa-clinic-medical me-2"></i>St.Monica</h1>
                </a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarCollapse">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarCollapse">
                    <div class="navbar-nav ms-auto py-0">
                        <a aria-current="page" href="#" class="nav-item nav-link active">Home</a>
                        <a href="#about" class="nav-item nav-link">About</a>
                        <a href="#service" class="nav-item nav-link">Service</a>
                        <a href="#blog" class="nav-item nav-link">Blog</a>
                        <div class="nav-item dropdown">
                            <a href="#" class="nav-link dropdown-toggle" data-bs-toggle="dropdown">Pages</a>
                            <div class="dropdown-menu m-0">

                                <a href="#team" class="dropdown-item">Our Team</a>
                                <a href="#testimonial" class="dropdown-item">Testimonial</a>
                            </div>
                        </div>

                    </div>
                    <ul class="d-flex">
                        <div class="col-sm-2 d-none d-lg-block appoint">
                            <a class="btn btn-primary" href="#login">Login</a>
                        </div>
                    </ul>
                </div>
            </nav>
        </div>
    </div>
    <!-- Navbar End -->


    <!-- Hero Start -->
    <div class="container-fluid bg-primary py-5 mb-5 hero-header">
        <div class="container py-5">
            <div class="row justify-content-start">
                <div class="col-lg-8 text-center text-lg-start">
                    <h5 class="d-inline-block text-primary text-uppercase border-bottom border-5" style="border-color: rgba(256, 256, 256, .3) !important;">Welcome To St.Monica</h5>
                    <h1 class="display-1 text-white mb-md-4">Best Healthcare Solution in Kenya</h1>
                    <div class="pt-2">
                        <a href="hms/user-login.php" class="btn btn-outline-light rounded-pill py-md-3 px-md-5 mx-2">Book Appointment</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Hero End -->


    <!-- About Start -->
    <div id="about" class="container-fluid py-5">
        <div class="container">
            <div class="row gx-5">
                <div class="col-lg-5 mb-5 mb-lg-0" style="min-height: 500px;">
                    <div class="position-relative h-100">
                        <img class="position-absolute w-100 h-100 rounded" src="img/about.jpg" style="object-fit: cover;">
                    </div>
                </div>
                <div class="col-lg-7">
                    <div class="mb-4">
                        <h5 class="d-inline-block text-primary text-uppercase border-bottom border-5">About Us</h5>
                        <h1 class="display-4">Best Medical Care For Yourself and Your Family</h1>
                    </div>
                    <p>Eight years ago, St. Monica's Hospital embarked on a journey towards
                        excellence in healthcare provision, driven by a commitment to serve the
                        community with compassion and innovation. Since its inception, the hospital
                        has been a beacon of hope, offering cutting-edge medical treatments and personalized
                        care to patients from diverse backgrounds. Over the years, St. Monica's has grown into
                        a trusted healthcare institution, renowned for its state-of-the-art facilities,
                        skilled medical professionals, and unwavering dedication to patient well-being.
                        Through continuous improvement and a patient-centered approach, St. Monica's Hospital
                        remains steadfast in its mission to enhance lives and foster a healthier tomorrow for all.
                    </p>
                    <div class="row g-3 pt-3">
                        <div class="col-sm-3 col-6">
                            <div class="bg-light text-center rounded-circle py-4">
                                <i class="fa fa-3x fa-user-md text-primary mb-3"></i>
                                <h6 class="mb-0">Qualified<small class="d-block text-primary">Doctors</small></h6>
                            </div>
                        </div>
                        <div class="col-sm-3 col-6">
                            <div class="bg-light text-center rounded-circle py-4">
                                <i class="fa fa-3x fa-procedures text-primary mb-3"></i>
                                <h6 class="mb-0">Emergency<small class="d-block text-primary">Services</small></h6>
                            </div>
                        </div>
                        <div class="col-sm-3 col-6">
                            <div class="bg-light text-center rounded-circle py-4">
                                <i class="fa fa-3x fa-microscope text-primary mb-3"></i>
                                <h6 class="mb-0">Accurate<small class="d-block text-primary">Testing</small></h6>
                            </div>
                        </div>
                        <div class="col-sm-3 col-6">
                            <div class="bg-light text-center rounded-circle py-4">
                                <i class="fa fa-3x fa-ambulance text-primary mb-3"></i>
                                <h6 class="mb-0">Free<small class="d-block text-primary">Ambulance</small></h6>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- About End -->


    <!-- Services Start -->
    <div id="service" class="container-fluid py-5">
        <div class="container">
            <div class="text-center mx-auto mb-5" style="max-width: 500px;">
                <h5 class="d-inline-block text-primary text-uppercase border-bottom border-5">Services</h5>
                <h1 class="display-4">Excellent Medical Services</h1>
            </div>
            <div class="row g-5">
                <div class="col-lg-4 col-md-6">
                    <div class="service-item bg-light rounded d-flex flex-column align-items-center justify-content-center text-center">
                        <div class="service-icon mb-4">
                            <i class="fa fa-2x fa-user-md text-white"></i>
                        </div>
                        <h4 class="mb-3">Emergency Care</h4>
                        <p class="m-0">Our Emergency Care service offers rapid, efficient medical attention,
                            ensuring swift assessment, treatment, and stabilization for critical conditions,
                            prioritizing patient well-being.</p>
                        <a class="btn btn-lg btn-primary rounded-pill" href="hms/user-login.php">
                            <i class="bi bi-arrow-right"></i>
                        </a>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6">
                    <div class="service-item bg-light rounded d-flex flex-column align-items-center justify-content-center text-center">
                        <div class="service-icon mb-4">
                            <i class="fa fa-2x fa-procedures text-white"></i>
                        </div>
                        <h4 class="mb-3">Operation & Surgery</h4>
                        <p class="m-0">Our operation service delivers swift and efficient surgical interventions,
                            employing cutting-edge techniques and skilled professionals to ensure optimal patient
                            outcomes.</p>
                        <a class="btn btn-lg btn-primary rounded-pill" href="hms/user-login.php">
                            <i class="bi bi-arrow-right"></i>
                        </a>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6">
                    <div class="service-item bg-light rounded d-flex flex-column align-items-center justify-content-center text-center">
                        <div class="service-icon mb-4">
                            <i class="fa fa-2x fa-stethoscope text-white"></i>
                        </div>
                        <h4 class="mb-3">Outdoor Checkup</h4>
                        <p class="m-0">Our outdoor checkup service offers swift and efficient medical
                            assessments in the convenience of outdoor settings, prioritizing speed
                            without compromising quality care.</p>
                        <a class="btn btn-lg btn-primary rounded-pill" href="hms/user-login.php">
                            <i class="bi bi-arrow-right"></i>
                        </a>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6">
                    <div class="service-item bg-light rounded d-flex flex-column align-items-center justify-content-center text-center">
                        <div class="service-icon mb-4">
                            <i class="fa fa-2x fa-ambulance text-white"></i>
                        </div>
                        <h4 class="mb-3">Ambulance Service</h4>
                        <p class="m-0">Our ambulance service ensures swift and
                            efficient transportation of patients, equipped with trained
                            personnel and advanced medical equipment for prompt emergency care
                            en route to medical facilities.</p>
                        <a class="btn btn-lg btn-primary rounded-pill" href="hms/user-login.php">
                            <i class="bi bi-arrow-right"></i>
                        </a>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6">
                    <div class="service-item bg-light rounded d-flex flex-column align-items-center justify-content-center text-center">
                        <div class="service-icon mb-4">
                            <i class="fa fa-2x fa-pills text-white"></i>
                        </div>
                        <h4 class="mb-3">Medicine & Pharmacy</h4>
                        <p class="m-0">Our Medicine & Pharmacy service provides rapid access to
                            essential medications and pharmaceutical expertise, ensuring prompt
                            dispensing and personalized consultations for optimal healthcare
                            outcomes.</p>
                        <a class="btn btn-lg btn-primary rounded-pill" href="hms/user-login.php">
                            <i class="bi bi-arrow-right"></i>
                        </a>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6">
                    <div class="service-item bg-light rounded d-flex flex-column align-items-center justify-content-center text-center">
                        <div class="service-icon mb-4">
                            <i class="fa fa-2x fa-microscope text-white"></i>
                        </div>
                        <h4 class="mb-5">Blood Testing</h4>
                        <p class="m-0">Our Blood Testing service delivers rapid and precise
                            diagnostic results, employing cutting-edge technology and streamlined
                            processes for swift analysis, ensuring timely medical insights and efficient
                            patient care.</p>
                        <a class="btn btn-lg btn-primary rounded-pill" href="hms/user-login.php">
                            <i class="bi bi-arrow-right"></i>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Services End -->


    <!-- logins start -->
    <div id="login" class="container-fluid bg-primary my-5 py-5">
        <div class="text-center">
            <div class="row row-cols-1 row-cols-md-2 row-cols-lg-3 justify-content-center">
                <div class="col p-3 ">
                    <div class="card" style="width: 25rem;">
                        <img src="img/patientpic.jpeg" class="card-img-top" alt="...">
                        <div class="card-body">
                            <h5 class="card-title">login as patient</h5><br>
                            <a href="hms/patient/user-login.php">
                                <button class="btn btn-primary"> Login </button>
                            </a>
                        </div>
                    </div>
                </div>
                <div class="col p-2">
                    <div class="card" style="width: 25rem;">
                        <img src="img/docpic.jpeg" class="card-img-top" alt="...">
                        <div class="card-body">
                            <h5 class="card-title">login as Doctor</h5><br>
                            <a href="hms/doctor">
                                <button class="btn btn-primary"> Login </button>
                            </a>
                        </div>

                    </div>
                </div>
                <div class="col p-2 ">
                    <div class="card" style="width: 25rem;">
                        <img src="img/adminpic.jpeg" class="card-img-top" alt="...">
                        <div class="card-body">
                            <h5 class="card-title">login as Admin</h5><br>
                            <a href="hms/admin">
                                <button class="btn btn-primary"> Login </button>
                            </a>
                        </div>

                    </div>
                </div>
            </div>
        </div>

    </div>
    <!-- logins End -->

    <!-- Team Start -->
    <div id="team" class="container-fluid py-5">
        <div class="container">
            <div class="text-center mx-auto mb-5" style="max-width: 500px;">
                <h5 class="d-inline-block text-primary text-uppercase border-bottom border-5">Our witch Doctors</h5>
                <h1 class="display-4">Qualified Healthcare Professionals</h1>
            </div>
            <div class="owl-carousel team-carousel position-relative">
                <div class="team-item">
                    <div class="row g-0 bg-light rounded overflow-hidden">
                        <div class="col-12 col-sm-5 h-100">
                            <img class="img-fluid h-100" src="img/beckton.jpeg" style="object-fit: cover;">
                        </div>
                        <div class="col-12 col-sm-7 h-100 d-flex flex-column">
                            <div class="mt-auto p-4">
                                <h3>Dr.Ochieng Levi</h3>
                                <h6 class="fw-normal fst-italic text-primary mb-4">Cardiology Specialist</h6>
                                <p class="m-0">Dr.Ochieng is an orthopaedic surgeon renowned for her expertise in joint
                                    replacement surgeries. He is dedicated to helping patients regain mobility and
                                    improve their quality of life.</p>
                            </div><br>
                            <div class="d-flex mt-auto border-top p-4">
                                <a class="btn btn-lg btn-primary btn-lg-square rounded-circle me-3" href="#"><i class="fab fa-twitter"></i></a>
                                <a class="btn btn-lg btn-primary btn-lg-square rounded-circle me-3" href="#"><i class="fab fa-facebook-f"></i></a>
                                <a class="btn btn-lg btn-primary btn-lg-square rounded-circle" href="#"><i class="fab fa-linkedin-in"></i></a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="team-item">
                    <div class="row g-0 bg-light rounded overflow-hidden">
                        <div class="col-12 col-sm-5 h-100">
                            <img class="img-fluid h-100" src="img/doc10.jpeg" style="object-fit: cover;">
                        </div>
                        <div class="col-12 col-sm-7 h-100 d-flex flex-column">
                            <div class="mt-auto p-4">
                                <h3>Dr.Lenox Otis</h3>
                                <h6 class="fw-normal fst-italic text-primary mb-4">Pharmacy Department</h6>
                                <p class="m-0">As the head pharmacist, Dr. Lenox oversees medication
                                    management and ensures safe and effective pharmaceutical care for
                                    all patients, providing expert guidance on medication usage and
                                    interactions.
                                </p>
                            </div>
                            <div class="d-flex mt-auto border-top p-4">
                                <a class="btn btn-lg btn-primary btn-lg-square rounded-circle me-3" href="#"><i class="fab fa-twitter"></i></a>
                                <a class="btn btn-lg btn-primary btn-lg-square rounded-circle me-3" href="#"><i class="fab fa-facebook-f"></i></a>
                                <a class="btn btn-lg btn-primary btn-lg-square rounded-circle" href="#team"><i class="fab fa-linkedin-in"></i></a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="team-item">
                    <div class="row g-0 bg-light rounded overflow-hidden">
                        <div class="col-12 col-sm-5 h-100">
                            <img class="img-fluid h-100" src="img/team-3.jpg" style="object-fit: cover;">
                        </div>
                        <div class="col-12 col-sm-7 h-100 d-flex flex-column">
                            <div class="mt-auto p-4">
                                <h3>Dr.Samira Hassan</h3>
                                <h6 class="fw-normal fst-italic text-primary mb-4">Laboratory Department</h6>
                                <p class="m-0">With extensive experience in clinical pathology,
                                    Dr. Samira leads our laboratory services, ensuring accurate and timely
                                    diagnostic testing, and interpreting results to guide patient care effectively.</p>
                            </div>
                            <div class="d-flex mt-auto border-top p-4">
                                <a class="btn btn-lg btn-primary btn-lg-square rounded-circle me-3" href="#"><i class="fab fa-twitter"></i></a>
                                <a class="btn btn-lg btn-primary btn-lg-square rounded-circle me-3" href="#"><i class="fab fa-facebook-f"></i></a>
                                <a class="btn btn-lg btn-primary btn-lg-square rounded-circle" href="#"><i class="fab fa-linkedin-in"></i></a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Team End -->

    <!-- Testimonial Start -->
    <div id="testimonial" class="container-fluid bg-primary py-5 testimonial ">
        <div class="container">
            <div class="text-center mx-auto mb-5" style="max-width: 500px;">
                <h5 class="d-inline-block text-light text-uppercase border-bottom border-5">Testimonial</h5>
                <h1 class="display-4">What Patients Say About Our Services</h1>
            </div>
            <div class="row justify-content-center">
                <div class="col-lg-8">
                    <div class=" testimonial-carousel">
                        <div class="testimonial-item text-center py-5">
                            <div class="position-relative mb-5">
                                <img class="img-fluid rounded-circle mx-auto" src="img/doc10.jpeg" alt="">
                                <div class="position-absolute top-100 start-50 translate-middle d-flex align-items-center justify-content-center bg-white rounded-circle" style="width: 60px; height: 60px;">
                                    <i class="fa fa-quote-left fa-2x text-primary"></i>
                                </div>
                            </div>
                            <p class="fs-4 fw-normal">"I cannot express enough gratitude for the
                                exceptional care I received at St. Monica's Hospital. From the moment
                                I walked in, the staff made me feel welcomed and supported.
                                The doctors were incredibly knowledgeable and took the time to
                                explain my treatment plan thoroughly. Thanks to their expertise,
                                I am now on the road to recovery."</p>
                            <hr class="w-25 mx-auto">
                            <h3>Ann Nafula</h3>
                            <h6 class="fw-normal text-light mb-3">Lecturer</h6>
                        </div>
                        <div class="testimonial-item text-center">
                            <div class="position-relative mb-5">
                                <img class="img-fluid rounded-circle mx-auto" src="img/lenox.jpeg" alt="">
                                <div class="position-absolute top-100 start-50 translate-middle d-flex align-items-center justify-content-center bg-white rounded-circle" style="width: 60px; height: 60px;">
                                    <i class="fa fa-quote-left fa-2x text-primary"></i>
                                </div>
                            </div>
                            <p class="fs-4 fw-normal">"Matibabu yangu ya ugonjwa wa ubongo katika
                                Hospitali ya St. Monica yalikuwa ya ajabu. Madaktari wao wenye uzoefu
                                walitoa huduma bora na kunipa matumaini. Sasa, ninajisikia vyema kabisa
                                na naweza kurudi kufanya kazi zangu kama kawaida. Asanteni sana
                                St. Monica kwa kutibu siyo tu mwili wangu bali pia roho yangu."</p>
                            <hr class="w-25 mx-auto">
                            <h3>Lenox </h3>
                            <h6 class="fw-normal text-light mb-3">Donda</h6>
                        </div>
                        <div class="testimonial-item text-center">
                            <div class="position-relative mb-5">
                                <img class="img-fluid rounded-circle mx-auto" src="img/beckton.jpeg" alt="">
                                <div class="position-absolute top-100 start-50 translate-middle d-flex align-items-center justify-content-center bg-white rounded-circle" style="width: 60px; height: 60px;">
                                    <i class="fa fa-quote-left fa-2x text-primary"></i>
                                </div>
                            </div>
                            <p class="fs-4 fw-normal">St. Monica's Hospital exceeded all my expectations.
                                The facilities were state-of-the-art, and the staff was highly
                                professional and caring. I was particularly impressed by the efficiency
                                of the emergency care service. When I needed urgent medical attention,
                                the response was immediate, and the treatment was swift. I highly
                                recommend this hospital to anyone in need of quality healthcare."</p>
                            <hr class="w-25 mx-auto">
                            <h3>Beckton James</h3>
                            <h6 class="fw-normal text-light mb-3">Engeneer</h6>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Testimonial End -->


    <!-- Blog Start -->
    <div id="blog" class="container-fluid py-5">
        <div class="container">
            <div class="text-center mx-auto mb-5" style="max-width: 500px;">
                <h5 class="d-inline-block text-primary text-uppercase border-bottom border-5">Blog Post</h5>
                <h1 class="display-4">Our Latest Medical Blog Posts</h1>
            </div>
            <div class="row g-5">
                <div class="col-xl-4 col-lg-6">
                    <div class="bg-light rounded overflow-hidden">
                        <img class="img-fluid w-100" src="img/health.jpeg" alt="">
                        <div class="p-4">
                            <a class="h3 d-block mb-3" href=""> Healthy Habits for a Balanced Lifestyle</a>
                            <p class="m-0">Maintaining a balanced lifestyle is essential for overall
                                well-being. By incorporating healthy habits into your daily routine,
                                you can improve both your physical and mental health. In this blog
                                post, we'll explore ten simple yet effective habits that can help you
                                lead a more balanced and fulfilling life.</p>
                        </div>
                        <div class="d-flex justify-content-between border-top p-4">
                            <div class="d-flex align-items-center">
                                <img class="rounded-circle me-2" src="img/doc10.jpeg" width="25" height="25" alt="">
                                <small>Sam Kinuthia</small>
                            </div>
                            <div class="d-flex align-items-center">
                                <small class="ms-3"><i class="far fa-eye text-primary me-1"></i>12345</small>
                                <small class="ms-3"><i class="far fa-comment text-primary me-1"></i>123</small>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-xl-4 col-lg-6">
                    <div class="bg-light rounded overflow-hidden">
                        <img class="img-fluid w-100" src="img/meditation.jpeg" alt="">
                        <div class="p-4">
                            <a class="h3 d-block mb-3" href="">Mindfulness Meditation</a>
                            <p class="m-0">
                                Discover the benefits of mindfulness meditation in reducing stress,
                                enhancing focus, and promoting mental clarity, with practical tips on how to
                                incorporate mindfulness practices into your daily routine.
                            </p>
                        </div>
                        <div class="d-flex justify-content-between border-top p-4">
                            <div class="d-flex align-items-center">
                                <img class="rounded-circle me-2" src="img/doc10.jpeg" width="25" height="25" alt="">
                                <small>Samwel Omondi</small>
                            </div>
                            <div class="d-flex align-items-center">
                                <small class="ms-3"><i class="far fa-eye text-primary me-1"></i>12345</small>
                                <small class="ms-3"><i class="far fa-comment text-primary me-1"></i>123</small>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-xl-4 col-lg-6">
                    <div class="bg-light rounded overflow-hidden">
                        <img class="img-fluid w-100" src="img/bike.jpeg" alt="">
                        <div class="p-4">
                            <a class="h3 d-block mb-3" href="">Outdoor Fitness Activities</a>
                            <p class="m-0">
                                Explore the benefits of outdoor exercise and various activities such as
                                hiking, cycling, and yoga, for improving physical fitness, mental health,
                                and overall happiness.
                            </p>
                        </div>
                        <div class="d-flex justify-content-between border-top p-4">
                            <div class="d-flex align-items-center">
                                <img class="rounded-circle me-2" src="img/doc10.jpeg" width="25" height="25" alt="">
                                <small>Cloudy Auma</small>
                            </div>
                            <div class="d-flex align-items-center">
                                <small class="ms-3"><i class="far fa-eye text-primary me-1"></i>12345</small>
                                <small class="ms-3"><i class="far fa-comment text-primary me-1"></i>123</small>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Blog End -->


    <!-- Footer Start -->
    <div id="footer" class="container-fluid bg-dark text-light mt-5 py-5">
        <div class="container py-5">
            <div class="row g-5">
                <div class="col-lg-3 col-md-6">
                    <h4 class="d-inline-block text-primary text-uppercase border-bottom border-5 border-secondary mb-4">Get In Touch</h4>
                    <p class="mb-4">Our team ensures swift responses to inquiries and requests, guaranteeing efficient communication for your convenience.</p>
                    <p class="mb-2"><i class="fa fa-map-marker-alt text-primary me-3"></i>00100 Umoja, Nairobi, KENYA</p>
                    <p class="mb-2"><i class="fa fa-envelope text-primary me-3"></i>st.monica@gmail.com</p>
                    <p class="mb-0"><i class="fa fa-phone-alt text-primary me-3"></i>+012 345 67890</p>
                </div>
                <div class="col-lg-3 col-md-6">
                    <h4 class="d-inline-block text-primary text-uppercase border-bottom border-5 border-secondary mb-4">Quick Links</h4>
                    <div class="d-flex flex-column justify-content-start">
                        <a class="text-light mb-2" href="#footer"><i class="fa fa-angle-right me-2"></i>Home</a>
                        <a class="text-light mb-2" href="#footer"><i class="fa fa-angle-right me-2"></i>About Us</a>
                        <a class="text-light mb-2" href="#footer"><i class="fa fa-angle-right me-2"></i>Our Services</a>
                        <a class="text-light mb-2" href="#footer"><i class="fa fa-angle-right me-2"></i>Meet The Team</a>
                        <a class="text-light mb-2" href="#footer"><i class="fa fa-angle-right me-2"></i>Latest Blog</a>
                        <a class="text-light" href="#footer"><i class="fa fa-angle-right me-2"></i>Contact Us</a>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6">
                    <h4 class="d-inline-block text-primary text-uppercase border-bottom border-5 border-secondary mb-4">Popular Links</h4>
                    <div class="d-flex flex-column justify-content-start">
                        <a class="text-light mb-2" href="#footer"><i class="fa fa-angle-right me-2"></i>Home</a>
                        <a class="text-light mb-2" href="#footer"><i class="fa fa-angle-right me-2"></i>About Us</a>
                        <a class="text-light mb-2" href="#footer"><i class="fa fa-angle-right me-2"></i>Our Services</a>
                        <a class="text-light mb-2" href="#footer"><i class="fa fa-angle-right me-2"></i>Meet The Team</a>
                        <a class="text-light mb-2" href="#footer"><i class="fa fa-angle-right me-2"></i>Latest Blog</a>
                        <a class="text-light" href="#footer"><i class="fa fa-angle-right me-2"></i>Contact Us</a>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6">
                    <h4 class="d-inline-block text-primary text-uppercase border-bottom border-5 border-secondary mb-4">Newsletter</h4>
                    <form action="">
                        <div class="input-group">
                            <input type="text" class="form-control p-3 border-0" placeholder="Your Email Address">
                            <button class="btn btn-primary">Sign Up</button>
                        </div>
                    </form>
                    <h6 class="text-primary text-uppercase mt-4 mb-3">Follow Us</h6>
                    <div class="d-flex">
                        <a class="btn btn-lg btn-primary btn-lg-square rounded-circle me-2" href="#footer"><i class="fab fa-twitter"></i></a>
                        <a class="btn btn-lg btn-primary btn-lg-square rounded-circle me-2" href="#footer"><i class="fab fa-facebook-f"></i></a>
                        <a class="btn btn-lg btn-primary btn-lg-square rounded-circle me-2" href="#footer"><i class="fab fa-linkedin-in"></i></a>
                        <a class="btn btn-lg btn-primary btn-lg-square rounded-circle" href="#footer"><i class="fab fa-instagram"></i></a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="container-fluid bg-dark text-light border-top border-secondary py-4">
        <div class="container">
            <div class="row g-5">
                <div class="col-md-6 text-center text-md-start">
                    <p class="mb-md-0">&copy; <a class="text-primary" href="#">St.Monica HMS</a>. ||All Rights Reserved.</p>
                </div>
                <div class="col-md-6 text-center text-md-end">
                    <p class="mb-0">Designed by <a class="text-primary" href="">@Lenox Otis</a></p>
                </div>
            </div>
        </div>
    </div>
    <!-- Footer End -->


    <!-- Back to Top -->
    <a href="#" class="btn btn-lg btn-primary btn-lg-square back-to-top"><i class="bi bi-arrow-up"></i></a>


    <!-- JavaScript Libraries -->
    <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/js/bootstrap.bundle.min.js"></script>
    <script src="lib/easing/easing.min.js"></script>
    <script src="lib/waypoints/waypoints.min.js"></script>
    <script src="lib/owlcarousel/owl.carousel.min.js"></script>
    <script src="lib/tempusdominus/js/moment.min.js"></script>
    <script src="lib/tempusdominus/js/moment-timezone.min.js"></script>
    <script src="lib/tempusdominus/js/tempusdominus-bootstrap-4.min.js"></script>

    <!-- Template Javascript -->
    <script src="js/main.js"></script>
</body>

</html>
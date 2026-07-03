<!DOCTYPE html>
<html lang="en">
  <head>
    <title>Yogi Vemana University | YVU</title>
    <meta charset="utf-8">
    <meta name="robots" content="noindex">
    <meta name="google" content="notranslate">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700" rel="stylesheet">
    <link rel="shortcut icon" type="image/png" href="yvu150-150.png">

    <link rel="stylesheet" href="assets/css/open-iconic-bootstrap.min.css">
    <link rel="stylesheet" href="assets/css/animate.css">
    
    <link rel="stylesheet" href="assets/css/owl.carousel.min.css">
    <link rel="stylesheet" href="assets/css/owl.theme.default.min.css">
    <link rel="stylesheet" href="assets/css/magnific-popup.css">

    <link rel="stylesheet" href="assets/css/aos.css">

    <link rel="stylesheet" href="assets/css/ionicons.min.css">

    <link rel="stylesheet" href="assets/css/bootstrap-datepicker.css">
    <link rel="stylesheet" href="assets/css/jquery.timepicker.css">

    
    <link rel="stylesheet" href="assets/css/flaticon.css">
    <link rel="stylesheet" href="assets/css/icomoon.css">
    <link rel="stylesheet" href="assets/css/style.css">
  </head>
  <body>
    
    <?php
        function activeMenu($pageTitle, $currentTitle)
        {
            return ($pageTitle === $currentTitle) ? 'active' : '';
        }
    ?>

  <nav class="navbar navbar-expand-lg navbar-dark ftco_navbar bg-dark ftco-navbar-light" id="ftco-navbar">
    <div class="container">
      <a class="navbar-brand d-flex align-items-center" href="index.php">
        <img src="assets/images/logo/header-main-logo-1.png"
            alt="YVU Logo" class="navbar-logo">

        <!-- <img src="assets/images/logo/yvu150-150.png"
            alt="YVU Emblem"
            style="height:50px; margin-right:10px;">

        <div class="brand-text">
            Yogi Vemana <br>
            <small>University</small>
        </div> -->
    </a>

    <button class="navbar-toggler" type="button"
            data-toggle="collapse"
            data-target="#ftco-nav"
            aria-controls="ftco-nav"
            aria-expanded="false"
            aria-label="Toggle navigation">
        <span class="oi oi-menu"></span> Menu
    </button>


      <div class="collapse navbar-collapse" id="ftco-nav">
            <ul class="navbar-nav ms-auto">

                <!-- Home -->
                <li class="nav-item <?= activeMenu('Home Page', $title) ?>">
                    <a href="<?= base_url('/') ?>" class="nav-link">Home</a>
                </li>
                <li class="nav-item dropdown has-submenu <?= in_array($title, [
                    'About Us',
                    'Director',
                    'Deputy Director'
                ]) ? 'active' : '' ?>">

                    <a href="#" class="nav-link dropdown-toggle has-submenu">About</a>

                    <ul class="sub-menu">

                        <li>
                            <a href="<?= base_url('about') ?>">About YVU</a>
                        </li>

                        <!-- Nested submenu -->
                        <li class="has-submenu">
                            <a href="#" class="has-submenu">Administration</a>

                            <ul class="sub-menu">
                                <li>
                                    <a href="<?= base_url('director') ?>">Director</a>
                                </li>
                                <li>
                                    <a href="<?= base_url('deputy-director') ?>">Deputy Director</a>
                                </li>
                            </ul>
                        </li>

                        <li>
                            <a target="_blank"
                            href="assets/documents/about/YVU-DDE-APPLICATION-min.pdf">
                                CDOE Application
                            </a>
                        </li>

                        <li>
                            <a href="<?= base_url('contact') ?>">Contact</a>
                        </li>

                    </ul>
                </li>
                
                <li class="nav-item dropdown has-submenu">

                    <a href="#" class="nav-link has-submenu">
                        DEB 2025-26 <span class="sub-arrow"></span>
                    </a>

                    <ul class="sub-menu">

                        <li>
                        <a class="dropdown-item" target="_blank"
                            href="assets/documents/deb-2025-26/2025-Application-UGC-Portal.pdf">
                            PG UG Application
                        </a>
                        </li>

                        <!-- Nested submenu -->
                        <li class="has-submenu">
                        <a href="#" class="dropdown-item has-submenu">
                            PPRs <span class="sub-arrow"></span>
                        </a>

                        <ul class="sub-menu">
                            <li>
                            <a class="dropdown-item" href="<?= base_url('ug-pprs') ?>">UG PPRs</a>
                            </li>
                            <li>
                            <a class="dropdown-item" href="<?= base_url('pg-pprs') ?>">PG PPRs</a>
                            </li>
                        </ul>
                        </li>

                        <li>
                        <a class="dropdown-item" href="compliance-report-2025">
                            Compliance Report 2025
                        </a>
                        </li>

                        <!-- Nested submenu -->
                        <li class="has-submenu">
                        <a href="#" class="dropdown-item has-submenu">
                            Presentation <span class="sub-arrow"></span>
                        </a>

                        <ul class="sub-menu">
                            <li><a class="dropdown-item" href="<?= base_url('mba-general-presentation') ?>">MBA (General)</a></li>
                            <li><a class="dropdown-item" href="<?= base_url('mba-hrm-presentation') ?>">MBA (HRM)</a></li>
                            <li><a class="dropdown-item" href="<?= base_url('b-com-computer-applications') ?>">B.Com (Computer Applications)</a></li>
                            <li><a class="dropdown-item" href="<?= base_url('b-com-general-1') ?>">B.Com (General)</a></li>
                            <li><a class="dropdown-item" href="<?= base_url('ba-economics-1') ?>">BA (Economics)</a></li>
                        </ul>
                        </li>

                        <li>
                        <a class="dropdown-item" target="_blank"
                            href="assets/documents/deb-2025-26/MoE_NIRF_2024_State-Public-Universities_Band_51_100.pdf">
                            NIRF 2024
                        </a>
                        </li>

                        <li>
                        <a class="dropdown-item" href="<?= base_url('affidavit') ?>">Affidavit</a>
                        </li>

                    </ul>
                </li>

                <li class="nav-item dropdown has-submenu">
                    <a href="#" class="nav-link has-submenu">
                        CIQA &amp; Advisory <span class="sub-arrow"></span>
                    </a>

                    <ul class="sub-menu">

                        <!-- CIQA -->
                        <li class="has-submenu">
                            <a href="#" class="dropdown-item has-submenu">
                                CIQA <span class="sub-arrow"></span>
                            </a>

                            <ul class="sub-menu">
                                <li>
                                    <a class="dropdown-item" target="_blank"
                                    href="assets/documents/ciqa/Center-for-Internal-Quality-Assureance-Committee.pdf">
                                        CIQA Committee
                                    </a>
                                </li>

                                <li>
                                    <a class="dropdown-item" target="_blank"
                                    href="assets/documents/ciqa/YVU-CIQA-Annual-Report-2023-24.pdf">
                                        CIQA Annual Report
                                    </a>
                                </li>

                                <li>
                                    <a class="dropdown-item" target="_blank"
                                    href="assets/documents/ciqa/CIQA-First-Annual-Report-Resolution2023-24.pdf">
                                        CIQA First Annual Report Resolution
                                    </a>
                                </li>
                            </ul>
                        </li>

                        <!-- Advisory Committee -->
                        <li class="has-submenu">
                            <a href="#" class="dropdown-item has-submenu">
                                Advisory Committee <span class="sub-arrow"></span>
                            </a>

                            <ul class="sub-menu">
                                <li>
                                    <a class="dropdown-item" target="_blank"
                                    href="assets/documents/advisory-committee/Advisory-Committee.pdf">
                                        Committee Members
                                    </a>
                                </li>

                                <li>
                                    <a class="dropdown-item" target="_blank"
                                    href="assets/documents/advisory-committee/First-Advisory-Committee-Resolutions.pdf">
                                        First Advisory Committee Resolutions
                                    </a>
                                </li>

                                <li>
                                    <a class="dropdown-item" target="_blank"
                                    href="assets/documents/advisory-committee/Second-Advisory-Committee-Resolution.pdf">
                                        Second Advisory Committee Resolution
                                    </a>
                                </li>
                            </ul>
                        </li>

                    </ul>
                </li>

                <li class="nav-item dropdown has-submenu">

                    <a href="#" class="nav-link has-submenu">
                        SLM <span class="sub-arrow"></span>
                    </a>

                    <ul class="sub-menu">
                        <li>
                            <a class="dropdown-item" href="<?= base_url('pg-courses') ?>">
                                PG Courses
                            </a>
                        </li>

                        <li>
                            <a class="dropdown-item" href="<?= base_url('ug-courses') ?>">
                                UG Courses
                            </a>
                        </li>
                    </ul>

                </li>

                <li class="nav-item dropdown has-submenu">

                    <a href="#" class="nav-link has-submenu">
                        Academics <span class="sub-arrow"></span>
                    </a>

                    <ul class="sub-menu">
                        <li>
                            <a class="dropdown-item" href="<?= base_url('faculty') ?>">
                                Faculty
                            </a>
                        </li>

                        <li>
                            <a class="dropdown-item" href="<?= base_url('academic-regulations') ?>">
                                Academic Regulations
                            </a>
                        </li>
                    </ul>

                </li>
                
                <li class="nav-item dropdown has-submenu">

                    <a href="#" class="nav-link has-submenu">
                        Admissions <span class="sub-arrow"></span>
                    </a>

                    <ul class="sub-menu">

                        <li>
                            <a class="dropdown-item" target="_blank"
                            href="https://cdoe.yvu.edu.in/admin">
                                Online Application
                            </a>
                        </li>

                        <li>
                            <a class="dropdown-item" href="guidelines">
                                Guidelines
                            </a>
                        </li>

                        <!-- Nested submenu -->
                        <li class="has-submenu">
                            <a href="#" class="dropdown-item has-submenu">
                                Documentation <span class="sub-arrow"></span>
                            </a>

                            <ul class="sub-menu">
                                <li>
                                    <a class="dropdown-item" href="lsc-ec-details/index.html">
                                        LSC Details
                                    </a>
                                </li>

                                <li>
                                    <a class="dropdown-item" href="lsc-ec-guidelines/index.html">
                                        LSC Guidelines
                                    </a>
                                </li>

                                <li>
                                    <a class="dropdown-item" target="_blank"
                                    href="https://oams.yvu.edu.in/pg/lsc">
                                        LSC Login
                                    </a>
                                </li>

                                <li>
                                    <a class="dropdown-item" href="guidelines/index.html">
                                        Guidelines for Applicants
                                    </a>
                                </li>
                            </ul>
                        </li>

                    </ul>

                </li>


                <!-- <li class="nav-item dropdown has-submenu">

                    <a href="#" class="nav-link has-submenu">
                        Updates <span class="sub-arrow"></span>
                    </a>

                    <ul class="sub-menu">
                        <li>
                            <a class="dropdown-item" href="downloads/index.html">
                                Downloads
                            </a>
                        </li>

                        <li>
                            <a class="dropdown-item" href="category/notifications/index.html">
                                Notifications
                            </a>
                        </li>

                        <li>
                            <a class="dropdown-item" href="category/circulars/index.html">
                                Circulars
                            </a>
                        </li>

                        <li>
                            <a class="dropdown-item" href="category/latest-info/index.html">
                                Latest Info
                            </a>
                        </li>

                        <li>
                            <a class="dropdown-item" href="category/tenders/index.html">
                                Tenders
                            </a>
                        </li>
                    </ul>

                </li> -->


                <li class="nav-item dropdown has-submenu">

                    <a href="#" class="nav-link has-submenu">
                        Student <span class="sub-arrow"></span>
                    </a>

                    <ul class="sub-menu">

                        <li>
                            <a class="dropdown-item"
                            href="assets/documents/student/01-Academic-Year-Planner-2023-25.docx">
                                Academic Year Planner (2023–25)
                            </a>
                        </li>

                        <li>
                            <a class="dropdown-item"
                            href="assets/documents/student/02-PCP-Classess.docx">
                                PCP Classes
                            </a>
                        </li>

                        <li>
                            <a class="dropdown-item"
                            href="assets/documents/student/03-Assisgnment-Submission.docx">
                                Assignment Submission
                            </a>
                        </li>

                        <li>
                            <a class="dropdown-item"
                            href="assets/documents/student/04-SLM-Distribution.docx">
                                SLM Distribution
                            </a>
                        </li>

                    </ul>

                </li>
                <!-- search -->
                <li class="nav-item">
                    <a href="<?= base_url('search') ?>" class="nav-link" title="Search">
                        <i class="icon-search"></i>
                    </a>
                </li>
                <li class="nav-item">
                    <div id="google_translate_element" class="translate-box ml-5" style="display:none;"></div>
                    <div class="lang-switcher notranslate">
                    <select id="langSelect" onchange="setLang(this.value)" class="notranslate">
                        <option value="en" class="notranslate">English</option>
                        <option value="hi" class="notranslate">Hindi</option>
                        <option value="te" class="notranslate">Telugu</option>
                    </select>
                    </div>
                </li>
            </ul>
      </div>
    </div>
  </nav>



    <!-- END nav -->
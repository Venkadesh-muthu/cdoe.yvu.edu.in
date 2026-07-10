<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */
$routes->get('/', 'MainController::index');
$routes->get('/about', 'MainController::about');
$routes->get('/director', 'MainController::director');
$routes->get('/deputy-director', 'MainController::deputyDirector');
$routes->get('/contact', 'MainController::contact');
$routes->get('/ug-pprs', 'MainController::ugPprs');
$routes->get('/pg-pprs', 'MainController::pgPprs');
$routes->get('/compliance-report-2025', 'MainController::complianceReport2025');
$routes->get('/mba-general-presentation', 'MainController::mbaGeneralPresentation');
$routes->get('/mba-hrm-presentation', 'MainController::mbaHrmPresentation');
$routes->get('/b-com-computer-applications', 'MainController::bComComputerApplications');
$routes->get('/b-com-general-1', 'MainController::bComGeneral_1');
$routes->get('/ba-economics-1', 'MainController::baEconomics_1');
$routes->get('/affidavit', 'MainController::affidavit');
$routes->get('/pg-courses', 'MainController::pgCourses');
$routes->get('/ug-courses', 'MainController::ugCourses');
$routes->get('/faculty', 'MainController::faculty');
$routes->get('/academic-regulations', 'MainController::academicRegulations');
$routes->get('/guidelines', 'MainController::guidelines');
$routes->get('/pg-faculty', 'MainController::pgFaculty');
$routes->get('/ug-faculty', 'MainController::ugFaculty');
$routes->get('/mba-ms', 'MainController::mbaMs');
$routes->get('/mba-hrm', 'MainController::mbaHrm');
$routes->get('/b-com-computers', 'MainController::bComComputers');
$routes->get('/b-com-general', 'MainController::bComGeneral');
$routes->get('/ba-economics', 'MainController::baEconomics');
$routes->get('/bachelor-of-fine-arts-music', 'MainController::bfaMusic');
$routes->get('/core-courses-b-com-computer-applications', 'MainController::coreCoursesBComComputerApplications');
$routes->get('languages', 'MainController::languages');
$routes->get('life-skill-courses-lsc', 'MainController::lifeSkillCoursesLsc');
$routes->get('skill-development-course-sdc', 'MainController::skillDevelopmentCourseSdc');
$routes->get('core-courses-b-com-general', 'MainController::coreCoursesBComGeneral');
$routes->get('core-courses-ba-economics', 'MainController::coreCoursesBaEconomics');
$routes->get('m-a-history', 'MainController::mAHistory');
$routes->get('m-a-economics', 'MainController::mAEconomics');
$routes->get('m-a-political-science', 'MainController::mAPoliticalScience');
$routes->get('m-a-telugu', 'MainController::mATelugu');
$routes->get('m-a-english', 'MainController::mAEnglish');
$routes->get('m-a-mass-communication-journalism', 'MainController::mAMassCommunicationJournalism');
$routes->get('m-a-psychology', 'MainController::mAPsychology');
$routes->get('m-com', 'MainController::mCom');
$routes->get('captcha/image', 'CaptchaController::image');

// Admin Routes

$routes->group('admin', function ($routes) {

    $routes->get('/', 'AdminController::index');
    $routes->get('login', 'AdminController::login');
    $routes->post('loginProcess', 'AdminController::loginProcess');
    $routes->get('reset-password', 'AdminController::resetPassword');
    $routes->post('reset-password', 'AdminController::resetPasswordProcess');
    $routes->post('validateDeb', 'AdminController::validateDeb');
    $routes->post('registerStudent', 'AdminController::registerStudent');
    $routes->get('logout', 'AdminController::logout');
    // $routes->get('register', 'AdminController::register');
    $routes->post('save-register', 'AdminController::saveRegister');
    $routes->get('dashboard', 'AdminController::dashboard');

    $routes->get('part-a/(:num)', 'AdminController::partA/$1');
    $routes->post('part-a/store', 'AdminController::storePartA');
    // $routes->post('part-a/update/(:num)', 'AdminController::updatePartA/$1');

    $routes->get('part-b/(:num)', 'AdminController::partB/$1');
    $routes->post('part-b/store', 'AdminController::storePartB');
    // $routes->post('part-b/update/(:num)', 'AdminController::updatePartB/$1');

    $routes->get('part-c/(:num)', 'AdminController::partC/$1');
    $routes->post('part-c/store', 'AdminController::storePartC');
    // $routes->post('part-c/update/(:num)', 'AdminController::updatePartC/$1');

    $routes->get('part-d/(:num)', 'AdminController::partD/$1');
    $routes->post('part-d/store', 'AdminController::storePartD');
    $routes->post('part-d/upload', 'AdminController::uploadDocument');

    $routes->get('preview/(:num)', 'AdminController::preview/$1');
    $routes->post('final-submit/(:num)', 'AdminController::finalSubmit/$1');
    $routes->get('download-pdf/(:num)', 'AdminController::downloadPDF/$1');

    $routes->get('payment-details/(:num)', 'AdminController::paymentDetails/$1');
    $routes->post('payment/store', 'AdminController::paymentStore');



});

$routes->group('superadmin', function ($routes) {

    $routes->get('/', 'SuperAdminController::index');

    $routes->get('login', 'SuperAdminController::login');
    $routes->post('loginProcess', 'SuperAdminController::loginProcess');
    $routes->get('logout', 'SuperAdminController::logout');

    $routes->get('dashboard', 'SuperAdminController::dashboard');
    $routes->get('students', 'SuperAdminController::Students');
    $routes->get('student-view/(:num)', 'SuperAdminController::studentView/$1');
    $routes->get('activate-student/(:num)', 'SuperAdminController::activateStudent/$1');
    $routes->get('reject-student/(:num)', 'SuperAdminController::rejectStudent/$1');

    // Edit student page
    $routes->get('edit-student/(:num)', 'SuperAdminController::edit_student/$1');
    $routes->post('update-student/(:num)', 'SuperAdminController::update_student/$1');

    $routes->get('export-students-excel', 'SuperAdminController::exportStudentsExcel');


});

$routes->group('coordinator', function ($routes) {

    $routes->get('/', 'CoordinatorController::index');
    $routes->post('loginProcess', 'CoordinatorController::loginProcess');
    $routes->get('dashboard', 'CoordinatorController::dashboard');
    $routes->get('students', 'CoordinatorController::students');
    $routes->get('student-view/(:num)', 'CoordinatorController::studentView/$1');
    $routes->get('download-pdf/(:num)', 'CoordinatorController::downloadPDF/$1');
    $routes->get('logout', 'CoordinatorController::logout');

    $routes->get('update-password', 'CoordinatorController::updatePassword');
    $routes->post('update-password', 'CoordinatorController::updatePasswordPost');

});

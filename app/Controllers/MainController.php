<?php

namespace App\Controllers;

use App\Controllers\BaseController;

class MainController extends BaseController
{
    public function __construct()
    {

    }
    public function index()
    {
        return view('layout/templates', [
            'title'   => 'Home Page',
            'content' => 'index',
        ]);
    }
    public function about()
    {
        return view('layout/templates', [
            'title'   => 'About Us',
            'content' => 'about',
        ]);
    }
    public function director()
    {
        return view('layout/templates', [
            'title'   => 'Director',
            'content' => 'director',
        ]);
    }
    public function deputyDirector()
    {
        return view('layout/templates', [
            'title'   => 'Deputy Director',
            'content' => 'deputy_director',
        ]);
    }
    public function contact()
    {
        return view('layout/templates', [
            'title'   => 'Contact Us',
            'content' => 'contact',
        ]);
    }
    public function ugPprs()
    {
        return view('layout/templates', [
            'title'   => 'UG PPRs',
            'content' => 'ug_pprs',
        ]);
    }
    public function pgPprs()
    {
        return view('layout/templates', [
            'title'   => 'PG PPRs',
            'content' => 'pg_pprs',
        ]);
    }
    public function complianceReport2025()
    {
        return view('layout/templates', [
            'title'   => 'Compliance Report 2025',
            'content' => 'compliance_report_2025',
        ]);
    }
    public function mbaGeneralPresentation()
    {
        return view('layout/templates', [
            'title'   => 'MBA (General) Presentation',
            'content' => 'mba_general_presentation',
        ]);
    }
    public function mbaHrmPresentation()
    {
        return view('layout/templates', [
            'title'   => 'MBA (HRM) Presentation',
            'content' => 'mba_hrm_presentation',
        ]);
    }
    public function bComComputerApplications()
    {
        return view('layout/templates', [
            'title'   => 'B.Com (Computer Applications)',
            'content' => 'b_com_computer_applications',
        ]);
    }
    public function bComGeneral_1()
    {
        return view('layout/templates', [
            'title'   => 'B.Com (General)',
            'content' => 'b_com_general_1',
        ]);
    }
    public function baEconomics_1()
    {
        return view('layout/templates', [
            'title'   => 'BA (Economics)',
            'content' => 'ba_economics_1',
        ]);
    }
    public function affidavit()
    {
        return view('layout/templates', [
            'title'   => 'Affidavit',
            'content' => 'affidavit',
        ]);
    }
    public function pgCourses()
    {
        return view('layout/templates', [
            'title'   => 'PG Courses',
            'content' => 'pg_courses',
        ]);
    }
    public function ugCourses()
    {
        return view('layout/templates', [
            'title'   => 'UG Courses',
            'content' => 'ug_courses',
        ]);
    }
    public function faculty()
    {
        return view('layout/templates', [
            'title'   => 'Faculty',
            'content' => 'faculty',
        ]);
    }
    public function academicRegulations()
    {
        return view('layout/templates', [
            'title'   => 'Academic Regulations',
            'content' => 'academic_regulations',
        ]);
    }
    public function guidelines()
    {
        return view('layout/templates', [
            'title'   => 'Guidelines',
            'content' => 'guidelines',
        ]);
    }
    public function pgFaculty()
    {
        return view('layout/templates', [
            'title'   => 'PG Faculty',
            'content' => 'pg_faculty',
        ]);
    }
    public function ugFaculty()
    {
        return view('layout/templates', [
            'title'   => 'UG Faculty',
            'content' => 'ug_faculty',
        ]);
    }
    public function mbaMs()
    {
        return view('layout/templates', [
            'title'   => 'MBA (MS)',
            'content' => 'mba_ms',
        ]);
    }
    public function mbaHrm()
    {
        return view('layout/templates', [
            'title'   => 'MBA (HRM)',
            'content' => 'mba_hrm',
        ]);
    }
    public function bComComputers()
    {
        return view('layout/templates', [
            'title'   => 'B.Com (Computers)',
            'content' => 'b_com_computers',
        ]);
    }
    public function bComGeneral()
    {
        return view('layout/templates', [
            'title'   => 'B.Com (General)',
            'content' => 'b_com_general',
        ]);
    }
    public function baEconomics()
    {
        return view('layout/templates', [
            'title'   => 'BA (Economics)',
            'content' => 'ba_economics',
        ]);
    }
    public function bfaMusic()
    {
        return view('layout/templates', [
            'title'   => 'BFA (Music)',
            'content' => 'bfa_music',
        ]);
    }
    public function coreCoursesBComComputerApplications()
    {
        return view('layout/templates', [
            'title'   => 'Core Courses - B.Com (Computer Applications)',
            'content' => 'core_courses_b_com_computer_applications',
        ]);
    }
    public function languages()
    {
        return view('layout/templates', [
            'title'   => 'Languages',
            'content' => 'languages',
        ]);
    }
    public function lifeSkillCoursesLsc()
    {
        return view('layout/templates', [
            'title'   => 'Life Skill Courses (LSC)',
            'content' => 'life_skill_courses_lsc',
        ]);
    }
    public function skillDevelopmentCourseSdc()
    {
        return view('layout/templates', [
            'title'   => 'Skill Development Course (SDC)',
            'content' => 'skill_development_course_sdc',
        ]);
    }
    public function coreCoursesBComGeneral()
    {
        return view('layout/templates', [
            'title'   => 'Core Courses - B.Com (General)',
            'content' => 'core_courses_b_com_general',
        ]);
    }
    public function coreCoursesBaEconomics()
    {
        return view('layout/templates', [
            'title'   => 'Core Courses - BA (Economics)',
            'content' => 'core_courses_ba_economics',
        ]);
    }
    public function mAHistory()
    {
        return view('layout/templates', [
            'title'   => 'M.A (History)',
            'content' => 'm_a_history',
        ]);
    }
    public function mAEconomics()
    {
        return view('layout/templates', [
            'title'   => 'M.A (Economics)',
            'content' => 'm_a_economics',
        ]);
    }
    public function mAPoliticalScience()
    {
        return view('layout/templates', [
            'title'   => 'M.A (Political Science)',
            'content' => 'm_a_political_science',
        ]);
    }
    public function mATelugu()
    {
        return view('layout/templates', [
            'title'   => 'M.A (Telugu)',
            'content' => 'm_a_telugu',
        ]);
    }
    public function mAEnglish()
    {
        return view('layout/templates', [
            'title'   => 'M.A (English)',
            'content' => 'm_a_english',
        ]);
    }
    public function mAMassCommunicationJournalism()
    {
        return view('layout/templates', [
            'title'   => 'M.A (Mass Communication & Journalism)',
            'content' => 'm_a_mass_communication_journalism',
        ]);
    }
    public function mAPsychology()
    {
        return view('layout/templates', [
            'title'   => 'M.A (Psychology)',
            'content' => 'm_a_psychology',
        ]);
    }
    public function mCom()
    {
        return view('layout/templates', [
            'title'   => 'M.Com',
            'content' => 'm_com',
        ]);
    }
}

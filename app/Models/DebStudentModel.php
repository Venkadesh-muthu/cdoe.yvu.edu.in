<?php

namespace App\Models;

use CodeIgniter\Model;

class DebStudentModel extends Model
{
    protected $table = 'deb_students';
    protected $primaryKey = 'id';

    protected $allowedFields = [
        'student_id',
        'program',
        'email',
        'student_name',
        'father_name',
        'mobile',
        'created_date',

        'institute_name',
        'institute_id',
        'ip_address',

        'program_code',
        'mode',

        'admission_date',
        'admission_details',

        'university_name',
        'course_name',

        'abc_id',
        'deb_unique_id',

        'gender',
        'dob',

        'enrollment_number',
        'unique_number',

        'document',
        'category',

        'government_identifier',
        'government_identifier_number',

        'nationality',
        'country_residence',
        'locality',

        'bulk_deb_id_data',
        'mode_education',

        'year',
        'session',

        'lsc_reference_id',

        'password',

        'session_api',
        'list',
        'status'
    ];
}

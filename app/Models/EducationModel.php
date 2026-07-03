<?php

namespace App\Models;

use CodeIgniter\Model;

class EducationModel extends Model
{
    protected $table = 'education_qualifications';
    protected $primaryKey = 'id';

    protected $allowedFields = [
        'application_id',
        'exam_passed',
        'institute',
        'board_university',
        'subjects_stream',
        'division',
        'percentage',
        'year_of_passing'
    ];
}

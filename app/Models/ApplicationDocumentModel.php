<?php

namespace App\Models;

use CodeIgniter\Model;

class ApplicationDocumentModel extends Model
{
    protected $table = 'application_documents';
    protected $primaryKey = 'id';

    protected $allowedFields = [
        'application_id',

        'ssc_admit',
        'ssc_mark',
        'ssc_pass',

        'inter_pass',
        'inter_mark',

        'emp_id',

        'valid_id',

        'ug_mark',
        'ug_pass',

        'age_proof',

        'caste_certificate',

        'student_declaration',

        'created_at',
        'updated_at'
    ];

    protected $useTimestamps = true;
}

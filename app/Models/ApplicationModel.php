<?php

namespace App\Models;

use CodeIgniter\Model;

class ApplicationModel extends Model
{
    protected $table = 'applications';
    protected $primaryKey = 'id';

    protected $allowedFields = [
        'application_no',
        'user_id',
        'programme_id',
        'centre_type',
        'centre_id',

        // Personal Details
        'full_name',
        'religion',
        'specify_religion',
        'dob',
        'gender',
        'caste',
        'marital_status',
        'nationality',
        'domicile_state',

        // Contact
        'alternative_email',
        'annual_income',
        'locality',

        // ID Proof
        'id_proof_type',
        'id_proof_number',
        'employment_status',

        // Government Details
        'abc_id',
        'aadhar_number',
        'aadhar_mobile',

        // Common
        'minority',
        'differently_abled',

        'is_submitted',

        'created_at',
        'updated_at'

    ];
}

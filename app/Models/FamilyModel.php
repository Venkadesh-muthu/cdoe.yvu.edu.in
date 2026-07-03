<?php

namespace App\Models;

use CodeIgniter\Model;

class FamilyModel extends Model
{
    protected $table = 'family_details';
    protected $primaryKey = 'id';

    protected $allowedFields = [
        'application_id',
        'father_name',
        'father_occupation',
        'mother_name',
        'mother_occupation',
        'guardian_name',
        'guardian_mobile',
        'created_at',
        'updated_at'
    ];
}

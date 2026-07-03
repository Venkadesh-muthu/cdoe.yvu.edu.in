<?php

namespace App\Models;

use CodeIgniter\Model;

class CentresModel extends Model
{
    protected $table = 'centres';
    protected $primaryKey = 'id';

    protected $allowedFields = [
        'centre_code',
        'centre_name',
        'centre_type',
        'email',
        'password',
        'created_at',
        'updated_at'
    ];

    protected $useTimestamps = true;
}

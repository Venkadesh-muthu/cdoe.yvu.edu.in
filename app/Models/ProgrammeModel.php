<?php

namespace App\Models;

use CodeIgniter\Model;

class ProgrammeModel extends Model
{
    protected $table = 'programmes';
    protected $primaryKey = 'id';

    protected $allowedFields = [
        'programme_name',
        'programme_type',
        'status'
    ];
}

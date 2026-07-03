<?php

namespace App\Models;

use CodeIgniter\Model;

class ApplicationUploadModel extends Model
{
    protected $table = 'application_uploads';
    protected $primaryKey = 'id';

    protected $allowedFields = [
        'application_id',
        'photo',
        'signature',
        'created_at',
        'updated_at'
    ];

    protected $useTimestamps = true;
}

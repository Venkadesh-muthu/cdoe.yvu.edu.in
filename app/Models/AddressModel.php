<?php

namespace App\Models;

use CodeIgniter\Model;

class AddressModel extends Model
{
    protected $table = 'addresses';
    protected $primaryKey = 'id';

    protected $allowedFields = [
        'application_id',
        'address_type',
        'village',
        'post_office',
        'police_station',
        'district',
        'pin',
        'created_at',
        'updated_at'
    ];
}

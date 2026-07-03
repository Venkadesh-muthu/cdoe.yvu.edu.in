<?php

namespace App\Models;

use CodeIgniter\Model;

class PaymentModel extends Model
{
    protected $table = 'payments';
    protected $primaryKey = 'id';

    protected $allowedFields = [

        'course',
        'application_id',
        'payment_mode',
        'transaction_id',
        'payment_date',
        'amount',
        'receipt',

        'created_at',
        'updated_at'

    ];

    protected $useTimestamps = true;
}

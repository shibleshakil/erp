<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class EmailSetup extends Model
{
    use HasFactory;

    protected $fillable = [
        'smtp_check',
        'mail_transport',
        'mail_host',
        'mail_port',
        'mail_encryption',
        'mail_username',
        'mail_password',
        'mail_from_name',
        'mail_from_address',
    ];
}

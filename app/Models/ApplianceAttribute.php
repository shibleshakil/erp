<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ApplianceAttribute extends Model
{
    use HasFactory;

    protected $table = 'appliance_attributes';

    protected $fillable = ['appliance_id','name'];

    public function appliance(){
        return $this->belongsTo(Appliance::class, 'appliance_id', 'id');
    }
}

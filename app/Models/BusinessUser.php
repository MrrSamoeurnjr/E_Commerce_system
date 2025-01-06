<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class BusinessUser extends Model
{
    protected $fillable = [
        'user_id',
        'business_name',
        'business_type',
        'business_registration_number',
        'tax_identification_number',
        'contact_person_name',
        'contact_person_phone_number',
        'contact_person_email',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}

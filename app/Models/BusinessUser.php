<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BusinessUser extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'user_id', // Add this line
        'business_name',
        'business_type',
        'business_registration_number',
        'tax_identification_number',
        'website_url',
        'contact_person_name',
        'contact_person_phone_number',
        'contact_person_email',
    ];

    // Other model methods and relationships can go here
}

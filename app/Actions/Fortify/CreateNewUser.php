<?php

namespace App\Actions\Fortify;

use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Laravel\Fortify\Contracts\CreatesNewUsers;
use Laravel\Jetstream\Jetstream;
use App\Models\BusinessUser;

class CreateNewUser implements CreatesNewUsers
{
    use PasswordValidationRules;

    /**
     * Validate and create a newly registered user.
     *
     * @param  array<string, string>  $input
     */
    public function create(array $input): User
    {
        // Validator::make($input, [
        //     'name' => ['required', 'string', 'max:255'],
        //     'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
        //     'password' => $this->passwordRules(),
        //     'terms' => Jetstream::hasTermsAndPrivacyPolicyFeature() ? ['accepted', 'required'] : '',
        // ])->validate();

        // return User::create([
        //     'name' => $input['name'],
        //     'email' => $input['email'],
        //     'phone' => $input['phone'],
        //     'address' => $input['address'],
        //     'password' => Hash::make($input['password']),
        // ]);
        Validator::make($input, [
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'phone' => ['required', 'string', 'max:15'],
            'address' => ['required', 'string', 'max:255'],
            'password' => $this->passwordRules(),
            'user_type' => ['required', 'string', 'in:customer,business'],
            'business_name' => ['required_if:user_type,business', 'string', 'max:255'],
            'business_type' => ['required_if:user_type,business', 'string', 'max:255'],
            'business_registration_number' => ['required_if:user_type,business', 'string', 'max:255'],
            'tax_identification_number' => ['required_if:user_type,business', 'string', 'max:255'],
            'website_url' => ['nullable', 'url'],
            'contact_person_name' => ['required_if:user_type,business', 'string', 'max:255'],
            'contact_person_phone_number' => ['required_if:user_type,business', 'string', 'max:15'],
            'contact_person_email' => ['required_if:user_type,business', 'string', 'email', 'max:255'],
            'terms' => Jetstream::hasTermsAndPrivacyPolicyFeature() ? ['accepted', 'required'] : '',
        ])->validate();

        // Create the user
        $user = User::create([
            'name' => $input['name'],
            'email' => $input['email'],
            'phone' => $input['phone'],
            'address' => $input['address'],
            'password' => Hash::make($input['password']),
            'user_type' => $input['user_type'],
        ]);

        // If the user is a business user, create a record in the business_users table
        if ($input['user_type'] == 'business') {
            BusinessUser::create([
                'user_id' => $user->id,
                'business_name' => $input['business_name'],
                'business_type' => $input['business_type'],
                'business_registration_number' => $input['business_registration_number'],
                'tax_identification_number' => $input['tax_identification_number'],
                'website_url' => $input['website_url'],
                'contact_person_name' => $input['contact_person_name'],
                'contact_person_phone_number' => $input['contact_person_phone_number'],
                'contact_person_email' => $input['contact_person_email'],
            ]);
        }
        return $user;
    }
}

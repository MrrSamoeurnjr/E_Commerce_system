<x-guest-layout>
    <x-authentication-card>
        <x-slot name="logo">
            <x-authentication-card-logo />
        </x-slot>

        <x-validation-errors class="mb-4" />

        <form method="POST" action="{{ route('register') }}">
            @csrf

            <div>
                <x-label for="name" value="{{ __('Name') }}" />
                <x-input id="name" class="block mt-1 w-full" type="text" name="name" :value="old('name')" required autofocus autocomplete="name" />
            </div>

            <div class="mt-4">
                <x-label for="email" value="{{ __('Email') }}" />
                <x-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')" required autocomplete="username" />
            </div>

            <div class="mt-4">
                <x-label for="phone" value="{{ __('Phone') }}" />
                <x-input id="phone" class="block mt-1 w-full" type="number" name="phone" :value="old('phone')" required autofocus autocomplete="phone" />
            </div>

            <div class="mt-4">
                <x-label for="address" value="{{ __('Address') }}" />
                <x-input id="address" class="block mt-1 w-full" type="text" name="address" :value="old('address')" required autofocus autocomplete="address" />
            </div>

            <div class="mt-4">
                <x-label for="password" value="{{ __('Password') }}" />
                <x-input id="password" class="block mt-1 w-full" type="password" name="password" required autocomplete="new-password" />
            </div>

            <div class="mt-4">
                <x-label for="password_confirmation" value="{{ __('Confirm Password') }}" />
                <x-input id="password_confirmation" class="block mt-1 w-full" type="password" name="password_confirmation" required autocomplete="new-password" />
            </div>

            <div class="mt-4">
                <x-label for="user_type" value="{{ __('Register as') }}" />
                <select id="user_type" name="user_type" class="block mt-1 w-full" required>
                    <option value="customer">Customer</option>
                    <option value="business">Business</option>
                </select>
            </div>

            <!-- Business-specific fields -->
            <div id="business-fields" style="display: none;">
                <div class="mt-4">
                    <x-label for="business_name" value="{{ __('Business Name') }}" />
                    <x-input id="business_name" class="block mt-1 w-full" type="text" name="business_name" :value="old('business_name')" />
                </div>
                <div class="mt-4">
                    <x-label for="business_type" value="{{ __('Business Type') }}" />
                    <x-input id="business_type" class="block mt-1 w-full" type="text" name="business_type" :value="old('business_type')" />
                </div>
                <div class="mt-4">
                    <x-label for="business_registration_number" value="{{ __('Business Registration Number') }}" />
                    <x-input id="business_registration_number" class="block mt-1 w-full" type="text" name="business_registration_number" :value="old('business_registration_number')" />
                </div>
                <div class="mt-4">
                    <x-label for="tax_identification_number" value="{{ __('Tax Identification Number (TIN)') }}" />
                    <x-input id="tax_identification_number" class="block mt-1 w-full" type="text" name="tax_identification_number" :value="old('tax_identification_number')" />
                </div>
                <div class="mt-4">
                    <x-label for="website_url" value="{{ __('Website URL') }}" />
                    <x-input id="website_url" class="block mt-1 w-full" type="url" name="website_url" :value="old('website_url')" />
                </div>
                <div class="mt-4">
                    <x-label for="contact_person_name" value="{{ __('Contact Person Name') }}" />
                    <x-input id="contact_person_name" class="block mt-1 w-full" type="text" name="contact_person_name" :value="old('contact_person_name')" />
                </div>
                <div class="mt-4">
                    <x-label for="contact_person_phone_number" value="{{ __('Contact Person Phone Number') }}" />
                    <x-input id="contact_person_phone_number" class="block mt-1 w-full" type="text" name="contact_person_phone_number" :value="old('contact_person_phone_number')" />
                </div>
                <div class="mt-4">
                    <x-label for="contact_person_email" value="{{ __('Contact Person Email') }}" />
                    <x-input id="contact_person_email" class="block mt-1 w-full" type="email" name="contact_person_email" :value="old('contact_person_email')" />
                </div>
            </div>

            @if (Laravel\Jetstream\Jetstream::hasTermsAndPrivacyPolicyFeature())
                <div class="mt-4">
                    <x-label for="terms">
                        <div class="flex items-center">
                            <x-checkbox name="terms" id="terms" required />

                            <div class="ms-2">
                                {!! __('I agree to the :terms_of_service and :privacy_policy', [
                                        'terms_of_service' => '<a target="_blank" href="'.route('terms.show').'" class="underline text-sm text-gray-600 hover:text-gray-900 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">'.__('Terms of Service').'</a>',
                                        'privacy_policy' => '<a target="_blank" href="'.route('policy.show').'" class="underline text-sm text-gray-600 hover:text-gray-900 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">'.__('Privacy Policy').'</a>',
                                ]) !!}
                            </div>
                        </div>
                    </x-label>
                </div>
            @endif

            <div class="flex items-center justify-end mt-4">
                <a class="underline text-sm text-gray-600 hover:text-gray-900 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500" href="{{ route('login') }}">
                    {{ __('Already registered?') }}
                </a>

                <x-button class="ms-4">
                    {{ __('Register') }}
                </x-button>
            </div>
        </form>
    </x-authentication-card>
</x-guest-layout>

<script>
    document.getElementById('user_type').addEventListener('change', function () {
        var businessFields = document.getElementById('business-fields');
        if (this.value === 'business') {
            businessFields.style.display = 'block';
        } else {
            businessFields.style.display = 'none';
        }
    });
</script>

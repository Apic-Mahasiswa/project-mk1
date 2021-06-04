<x-guest-layout>
    <x-jet-authentication-card>
        <x-slot name="logo">
            <x-jet-authentication-card-logo />
        </x-slot>

        <x-jet-validation-errors class="mb-4" />

        <form method="POST" action="{{ route('register') }}">
            @csrf

            <div>
                <x-jet-label for="Team_name" value="{{ __('Team Name') }}" />
                <x-jet-input id="Team_name" class="block mt-1 w-full" type="text" name="Team_name" :value="old('Team_name')" required autofocus autocomplete="Team_name" />
            </div>
            <h3 class="block mt-1 ">Member 1 :</h3>
            <div>
                <x-jet-label for="Member1_name" value="{{ __('Name') }}" />
                <x-jet-input id="Member1_name" class="block mt-1 w-full" type="text" name="Member1_name" :value="old('Member1_name')" required autofocus autocomplete="Member1_name" />
            </div>

            <div class="mt-4">
                <x-jet-label for="Member1_email" value="{{ __('Email') }}" />
                <x-jet-input id="Member1_email" class="block mt-1 w-full" type="email" name="Member1_email" :value="old('Member1_email')" required />
            </div>

            <div class="mt-4">
                <x-jet-label for="Member1_contact" value="{{ __('Contact') }}" />
                <x-jet-input id="Member1_contact" class="block mt-1 w-full" type="text" name="Member1_contact" :value="old('Member1_contact')" required />
            </div>

            <h3 class="block mt-1 ">Member 2 :</h3>
            <div>
                <x-jet-label for="Member2_name" value="{{ __('Name') }}" />
                <x-jet-input id="Member2_name" class="block mt-1 w-full" type="text" name="Member2_name" :value="old('Member2_name')" required autofocus autocomplete="Member2_name" />
            </div>

            <div class="mt-4">
                <x-jet-label for="Member2_email" value="{{ __('Email') }}" />
                <x-jet-input id="Member2_email" class="block mt-1 w-full" type="email" name="Member2_email" :value="old('Member2_email')" required />
            </div>

            <div class="mt-4">
                <x-jet-label for="Member2_contact" value="{{ __('Contact') }}" />
                <x-jet-input id="Member2_contact" class="block mt-1 w-full" type="text" name="Member2_contact" :value="old('Member2_contact')" required />
            </div>
            <h3 class="block mt-1 ">Member 3 :</h3>
            <div>
                <x-jet-label for="Member3_name" value="{{ __('Name') }}" />
                <x-jet-input id="Member3_name" class="block mt-1 w-full" type="text" name="Member3_name" :value="old('Member3_name')" required autofocus autocomplete="Member3_name" />
            </div>

            <div class="mt-4">
                <x-jet-label for="Member3_email" value="{{ __('Email') }}" />
                <x-jet-input id="Member3_email" class="block mt-1 w-full" type="email" name="Member3_email" :value="old('Member3_email')" required />
            </div>

            <div class="mt-4">
                <x-jet-label for="Member3_contact" value="{{ __('Contact') }}" />
                <x-jet-input id="Member3_contact" class="block mt-1 w-full" type="text" name="Member3_contact" :value="old('Member3_contact')" required />
            </div>

            <div class="mt-4">
                <x-jet-label for="password" value="{{ __('Password') }}" />
                <x-jet-input id="password" class="block mt-1 w-full" type="password" name="password" required autocomplete="new-password" />
            </div>

            <div class="mt-4">
                <x-jet-label for="password_confirmation" value="{{ __('Confirm Password') }}" />
                <x-jet-input id="password_confirmation" class="block mt-1 w-full" type="password" name="password_confirmation" required autocomplete="new-password" />
            </div>

            @if (Laravel\Jetstream\Jetstream::hasTermsAndPrivacyPolicyFeature())
                <div class="mt-4">
                    <x-jet-label for="terms">
                        <div class="flex items-center">
                            <x-jet-checkbox name="terms" id="terms"/>

                            <div class="ml-2">
                                {!! __('I agree to the :terms_of_service and :privacy_policy', [
                                        'terms_of_service' => '<a target="_blank" href="'.route('terms.show').'" class="underline text-sm text-gray-600 hover:text-gray-900">'.__('Terms of Service').'</a>',
                                        'privacy_policy' => '<a target="_blank" href="'.route('policy.show').'" class="underline text-sm text-gray-600 hover:text-gray-900">'.__('Privacy Policy').'</a>',
                                ]) !!}
                            </div>
                        </div>
                    </x-jet-label>
                </div>
            @endif

            <div class="flex items-center justify-end mt-4">
                <a class="underline text-sm text-gray-600 hover:text-gray-900" href="{{ route('login') }}">
                    {{ __('Already registered?') }}
                </a>

                <x-jet-button class="ml-4">
                    {{ __('Register') }}
                </x-jet-button>
            </div>
        </form>
    </x-jet-authentication-card>
</x-guest-layout>

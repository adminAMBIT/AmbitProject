<x-guest-layout>
    <x-authentication-card>
        <x-slot name="logo">
            <!-- <x-authentication-card-logo /> -->
            <img src="{{ asset('images/logo.png') }}" alt="logo" class="h-20">
        </x-slot>

        <div class="mb-4 text-xl text-center text-gray-600">
            {{ __('If you do not remember your password, please send an email to') }} <strong>info@ambit.com</strong> or <strong>admin@ambit.com</strong> {{ __('to inform us, and we will assist you in the process of resetting it.') }}
        </div>

        @if (session('status'))
            <div class="mb-4 font-medium text-sm text-green-600">
                {{ session('status') }}
            </div>
        @endif

        <x-validation-errors class="mb-4" />

    
    </x-authentication-card>
</x-guest-layout>

<x-guest-layout>
    <div class="mb-4 text-md text-gray-600">
        {{ __('Forgot your password? No problem. Just let us know your email address and we will email you a password reset link that will allow you to choose a new one.') }}
    </div>

    <!-- Notifikasi Status -->
    @if (session('status'))
        <div class="mb-4 p-4 rounded-md bg-green-100 text-green-800 border border-green-300">
            {{ session('status') }}
        </div>
    @endif

    <!-- Notifikasi Error Umum -->
    @if ($errors->any())
        <div class="mb-4 p-4 rounded-md bg-red-100 text-red-800 border border-red-300">
            <ul class="list-disc list-inside text-sm">
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form method="POST" action="{{ route('password.email') }}">
        @csrf

        <!-- Email Address -->
        <div>
            <x-input-label for="email" :value="__('Email')" />
            <x-text-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')" required autofocus />
            <x-input-error :messages="$errors->get('email')" class="mt-2" />
        </div>

        <div class="flex items-center justify-end mt-4">
            <a href="/login" class="btn rounded-pill py-2 px-4 ms-3 d-none d-lg-block bg-danger text-light">
                Back
            </a>
            <x-primary-button>
                {{ __('Email Password Reset Link') }}
            </x-primary-button>
        </div>
    </form>
</x-guest-layout>

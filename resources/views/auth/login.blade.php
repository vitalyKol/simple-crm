<x-guest-layout>
    <x-auth-card>
        <x-slot name="logo">
            <a href="/">
                {{--                <x-application-logo class="w-20 h-20 fill-current text-gray-500" />--}}
            </a>
        </x-slot>
        <h1 class="text-center">CRM</h1>
        <!-- Session Status -->
        <x-auth-session-status class="mb-4" :status="session('status')" />

        <form method="POST" action="{{ route('login') }}">
            @csrf
            <ul class="list-group">
                <li class="list-group-item">
                    <!-- Email Address -->
                    <div class="form-floating">
                        <input type="email" name="email" class="form-control border-0" id="floatingInput" placeholder="name@example.com">
                        <label for="floatingInput">Email</label>
                        <x-input-error :messages="$errors->get('email')" class="mt-2" />
                    </div>
                </li>
                <li class="list-group-item" >
                    <!-- Password -->
                    <div class="form-floating">
                        <input type="password" name="password" class="form-control border-0" id="floatingPassword" placeholder="pass">
                        <label for="floatingPassword">Password</label>
                        <x-input-error :messages="$errors->get('password')" class="mt-2" />
                    </div>
                </li>
            </ul>
            <!-- Remember Me -->
            <div class="text-center mt-2">
                <label for="remember_me" class="form-check-label">
                    <input id="remember_me" type="checkbox" class="form-check-input" name="remember">
                    <span class="ml-2 text-sm text-gray-600">{{ __('Remember me') }}</span>
                </label>
                <input type="submit" class="d-block btn btn-primary w-100 mt-2" value="Login">
            </div>

        </form>
        <div class="text-center mt-2">
            <a href="{{ route('register') }}">
                {{ __('Registration') }}
            </a>
        </div>
    </x-auth-card>
</x-guest-layout>

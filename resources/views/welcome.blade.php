<!-- <x-guest-layout>
    <link rel="stylesheet" type="text/css" href="{{ asset('css/style.css') }}">
    <link href='https://fonts.googleapis.com/css?family=Vollkorn' rel='stylesheet' type='text/css'>
    <link href='https://fonts.googleapis.com/css?family=Open+Sans' rel='stylesheet' type='text/css'>


    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="aa-signin-area">
                    <div class="aa-signin-form">
                        <div class="aa-signin-form-title">
                            <h4> Sign in </h4>
                        </div>
                        <x-validation-errors class="mb-4" />
                        @if (session('status'))
                        <div class="mb-4 font-medium text-sm text-green-600">
                            {{ session('status') }}
                        </div>
                        @endif
                        <form method="POST" action="{{ route('login') }}" class="contactform">
                            @csrf
                            <div class="aa-single-field">
                                <label for="email">Email <span class="required">*</span></label>
                                <input type="email" required="required" aria-required="true" name="email" :value="old('email')">
                            </div>
                            <div class="aa-single-field">
                                <label for="password">Password <span class="required">*</span></label>
                                <input type="password" name="password">
                            </div>
                            <div class="aa-single-field">
                                <label>
                                    <input type="checkbox" name="remember"> Remember me
                                </label>
                            </div>
                            <div class="aa-single-submit">
                                <x-button class="aa-browse-btn" name="submit">Login</x-button>
                            </div>

                        </form>

                        <br>
                        <div class="flex items-center justify-center h-screen">
                            <a href="{{ route('register') }}">
                                <x-button class="aa-browse-btn">
                                    {{ __('Sign up') }}
                                </x-button>
                            </a>
                        </div>

                        <br>
                        <hr>
                        <br>
                        <div class="flex items-center justify-center h-screen">
                            <a href="{{ route('login.google') }}">
                                <x-button class="google-button">
                                    {{ __('Login with Google') }}
                                </x-button>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <-- Include your scripts here
</x-guest-layout> -->
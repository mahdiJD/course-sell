<x-guest-layout>

    <div class="col-12 col-lg-6 m-auto">
        <div class="row my-5">
            <div class="col-sm-10 col-xl-8 m-auto">
                <!-- Title -->
                <span class="mb-0 fs-1">👋</span>
                <h1 class="fs-4">ورود به حساب کاربری</h1>
                <p class="mb-4">از دیدن شما خوشحالم! لطفا با حساب کاربری خود وارد شوید.</p>

                <!-- Form START -->
                <form method="POST" action="{{ route('login') }}">
                    @csrf
                    <!-- Email -->
                    <div class="mb-4">
                        <x-input-label for="email" :value="__('ایمیل')" />
                        <div class="input-group input-group-lg">
                            <span class="input-group-text bg-light rounded-start border-0 text-secondary px-3"><i class="bi bi-envelope-fill"></i></span>
                            <x-text-input class="form-control border-0 bg-light rounded-end ps-1" placeholder="***@gmail.com" id="exampleInputEmail1" type="email" name="email" :value="old('email')" required autocomplete="username" />
                            <x-input-error :messages="$errors->get('email')" class="mt-2" />
                        </div>

                    </div>
                    <!-- Password -->
                    <div class="mb-4">

                        <x-input-label for="password" :value="__('رمز عبور ')" />

                        <div class="input-group input-group-lg">
                            <span class="input-group-text bg-light rounded-start border-0 text-secondary px-3"><i class="fas fa-lock"></i></span>
                            <x-text-input id="inputPassword5" class="form-control border-0 bg-light rounded-end ps-1"
                            type="password"
                            name="password"
                            required autocomplete="new-password" placeholder="********"/>
                        </div>

                        <x-input-error :messages="$errors->get('password')" class="mt-2" />
                        <div id="passwordHelpBlock" class="form-text">
                            رمز عبور شما باید حداقل 8 کاراکتر باشد
                        </div>
                    </div>
                    <!-- Check box -->
                    <div class="mb-4 d-flex justify-content-between">
                        <div class="form-check">

                            <input id="remember_me" type="checkbox" class="form-check-input" name="remember">
                            <label class="form-check-label" for="exampleCheck1">مرا به خاطر بسپار</label>

                        </div>
                        <div class="text-primary-hover">
                            <a href="{{ route('password.request') }}" class="text-secondary">
                                <u>رمز خود را فراموش کرده اید؟</u>
                            </a>
                        </div>
                    </div>
                    <!-- Button -->
                    <div class="align-items-center mt-0">
                        <div class="d-grid">
                            <x-primary-button class="btn btn-primary mb-0">
                                {{ __('ورود') }}
                            </x-primary-button>
                        </div>
                    </div>
                </form>
                <!-- Form END -->

                <!-- Sign up link -->
                <div class="mt-4 text-center">
                    <span>حساب کاربری ندارید؟ <a href="{{route('register')}}">ثبت نام</a></span>
                </div>
            </div>
        </div> <!-- Row END -->
    </div>
</x-guest-layout>

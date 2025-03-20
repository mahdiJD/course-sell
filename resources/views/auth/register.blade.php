<x-guest-layout>
    <div class="col-12 col-lg-6 m-auto">
        <div class="row my-5">
            <div class="col-sm-10 col-xl-8 m-auto">
                <!-- Title -->
                <img src="assets/images/element/03.svg" class="h-40px mb-2" alt="">
                <h2 class="">ثبت نام</h2>
                <p class="mb-4">از دیدن شما خوشحالم! لطفا با حساب کاربری خود ثبت نام کنید.</p>

                <!-- Form START -->
                <form method="POST" action="{{ route('register') }}">
                    @csrf
                    <div>
                        <x-input-label for="name" :value="__('نام')" />
                        <x-text-input id="name" class="form-control border-0 bg-light rounded-end ps-1" placeholder="نام" type="text" name="name" :value="old('name')" required autofocus autocomplete="name" />
                        <x-input-error :messages="$errors->get('name')" class="mt-2" />
                    </div>
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
                    <!-- Confirm Password -->
                    <div class="mb-4">
                        <x-input-label for="password_confirmation" :value="__('تایید رمز عبور')" />
                        <x-text-input class="form-control border-0 bg-light rounded-end ps-1" placeholder="*********" id="inputPassword6"
                                        type="password"
                                        name="password_confirmation" required autocomplete="new-password" />
                        <x-input-error :messages="$errors->get('password_confirmation')" class="mt-2" />
                    </div>
                    <!-- Check box -->
                    <div class="mb-4">
                        <div class="form-check">
                            <input type="checkbox" class="form-check-input" id="checkbox-1">
                            <label class="form-check-label" for="checkbox-1">با ثبت نام <a href="#">شرایط و قوانین سایت</a> را خواهید پذیرفت.</label>
                        </div>
                    </div>
                    <!-- Button -->
                    <div class="align-items-center mt-0">
                        <div class="d-grid">
                            <x-primary-button class="btn btn-primary mb-0">
                                {{ __('ثبت نام') }}
                            </x-primary-button>
                        </div>
                    </div>
                </form>
                <!-- Form END -->


                <!-- Sign up link -->
                <div class="mt-4 text-center">
                    <span>آیا قبلا ثبت نام کرده اید؟<a href="{{route('login')}}"> ورود</a></span>
                </div>
            </div>
        </div>
    </div>
</x-guest-layout>

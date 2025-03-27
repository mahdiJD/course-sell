<x-guest-layout>

    <div class="col-12 col-lg-6 m-auto">
        <div class="row my-5">
            <div class="col-sm-10 col-xl-8 m-auto">
                <!-- Title -->
                <span class="mb-0 fs-1">👋</span>
                <h1 class="fs-4">تایید موبایل</h1>
                <p class="mb-4">لطفا کد ارسال شده به شماره موبایل تان را وارد کنید</p>

                <!-- Form START -->
                <form method="POST" action="{{ route('verify.mobile.check') }}">
                    @csrf
                    <!-- Email -->
                    <div class="mb-4">
                        <x-input-label for="email" :value="__('کد')" />
                        <div class="input-group input-group-lg">
                            <span class="input-group-text bg-light rounded-start border-0 text-secondary px-3"><i class="bi bi-envelope-fill"></i></span>
                            <x-text-input class="form-control border-0 bg-light rounded-end ps-1" type="text" name="code" required />
                            <x-input-error :messages="$errors->get('code')" class="mt-2" />
                        </div>

                    </div>
                    <!-- Button -->
                    <div class="align-items-center mt-0">
                        <div class="d-grid">
                            <x-primary-button class="btn btn-primary mb-0">
                                {{ __('تایید') }}
                            </x-primary-button>
                        </div>
                    </div>
                </form>
                <!-- Form END -->

            </div>
        </div> <!-- Row END -->
    </div>
</x-guest-layout>

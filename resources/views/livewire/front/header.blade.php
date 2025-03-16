
<header class="navbar-light navbar-sticky header-static">
	<!-- Nav START -->
	<nav class="navbar navbar-expand-xl">
		<div class="container-fluid px-3 px-xl-5">
			<!-- Logo START -->
			<a class="navbar-brand" href="index.html">
				<img class="light-mode-item navbar-brand-item" src="assets/images/logo.svg" alt="logo">
				<img class="dark-mode-item navbar-brand-item" src="assets/images/logo-light.svg" alt="logo">
			</a>
			<!-- Logo END -->

			<!-- Responsive navbar toggler -->
			<button class="navbar-toggler ms-auto" type="button" data-bs-toggle="collapse" data-bs-target="#navbarCollapse" aria-controls="navbarCollapse" aria-expanded="false" aria-label="Toggle navigation">
				<span class="navbar-toggler-animation">
					<span></span>
					<span></span>
					<span></span>
				</span>
			</button>

			<!-- Main navbar START -->
			<div class="navbar-collapse w-100 collapse" id="navbarCollapse">



				<!-- Nav Main menu START -->
				<ul class="navbar-nav navbar-nav-scroll me-auto">
					<!-- Nav item 1 Demos -->
					<li class="nav-item dropdown">
						<a class="nav-link active" href="#">صفحه اصلی</a>
					</li>
					<li class="nav-item dropdown">
						<a class="nav-link" href="{{route('courses')}}">لیست دوره ها</a>
					</li>
					<li class="nav-item dropdown">
						<a class="nav-link" href="#">درباره ما</a>
					</li>
					<li class="nav-item dropdown">
						<a class="nav-link" href="#">تماس با ما</a>
					</li>
                    <li class="nav-item dropdown">
                        {{-- <livewire:cart-dropdown /> --}}

					</li>

				</ul>
                <div class="relative">
                    <button wire:click="toggleDropdown" class="btn btn-secondary relative  rounded">
                        🛒 سبد خرید
                        <span class="absolute top-0 right-0 bg-red-500 text-xs px-2 py-1 rounded-full">
                            {{ count($cartItems) }}
                        </span>
                    </button>

                    @if($isOpen)
                        <div class="z-index-1 absolute right-0 mt-2 w-64 bg-white shadow-lg rounded-lg p-4">
                            <h3 class="text-lg font-semibold mb-2">محصولات در سبد</h3>
                            @forelse($cartItems as $item)
                                <div class="flex justify-between border-b py-2">
                                    <span>{{ $item->getProduct()->name }}</span>
                                    {{-- <span>{{ $item->price }} تومان</span> --}}
                                </div>
                            @empty
                                <p class="text-gray-500">سبد خرید شما خالی است.</p>
                            @endforelse
                            @if (!empty($cartItems))
                            <a href="{{route('order')}}" class="btn btn-secondary">رفتن به تصفیه حساب</a>
                            @endif
                        </div>
                    @endif
                </div>

				<!-- Nav Main menu END -->

			</div>
			<!-- Main navbar END -->
		</div>
	</nav>
	<!-- Nav END -->
</header>


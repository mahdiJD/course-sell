<div class="relative">
    <button wire:click="toggleDropdown" class="relative px-4 py-2 bg-gray-800 text-white rounded">
        🛒 سبد خرید
        <span class="absolute top-0 right-0 bg-red-500 text-xs px-2 py-1 rounded-full">
            {{ count($cartItems) }}
        </span>
    </button>

    @if($isOpen)
        <div class="absolute right-0 mt-2 w-64 bg-white shadow-lg rounded-lg p-4">
            <h3 class="text-lg font-semibold mb-2">محصولات در سبد</h3>
            @forelse($cartItems as $item)
                <div class="flex justify-between border-b py-2">
                    <span>{{ $item->name }}</span>
                    {{-- <span>{{ $item->price }} تومان</span> --}}
                </div>
            @empty
                <p class="text-gray-500">سبد خرید شما خالی است.</p>
            @endforelse
        </div>
    @endif
</div>

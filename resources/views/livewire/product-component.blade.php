<div>
    <h1>لیست محصولات</h1>
    <ul>
        @foreach ($products as $product)
            <li>
                <button wire:click="selectProduct({{ $product->id }})">
                    {{ $product->name }} - قیمت: {{ $product->price }}
                </button>
            </li>
        @endforeach
    </ul>

    @if($selectedProduct)
        <hr>
        <h2>جزئیات محصول</h2>
        <p><strong>نام:</strong> {{ $selectedProduct->name }}</p>
        <p><strong>قیمت:</strong> {{ $selectedProduct->price }}</p>
        <p><strong>توضیحات:</strong> {{ $selectedProduct->description }}</p>
        <button wire:click="$set('selectedProduct', null)">بستن</button>
    @endif
</div>

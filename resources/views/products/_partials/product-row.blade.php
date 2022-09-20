<a href="{{ route('products.show', $product) }}" class="flex py-4 px-4 hover:bg-gray-50 cursor-pointer" id="products_index_{{ $product->id }}">
    <div class="flex-1">{{ $product->name }}</div>
    @if ((int)$product->amount !== (int)$product->amount_ordered)
        <div class="text-sm text-gray-600">{{ $product->amount }} / {{ $product->amount_ordered }}</div>
    @else
        <div class="text-sm font-medium text-green-700">@lang('Completed')</div>
    @endif
</a>

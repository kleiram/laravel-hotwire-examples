@extends('master')

@section('content')
    <div class="min-w-full min-h-screen bg-gray-100 flex items-center justify-center">
        <div class="bg-white md:rounded shadow w-full md:w-1/2">
            <div class="w-full border-b px-4 py-2 font-medium">Products</div>
            <div class="w-full divide-y">
                @foreach ($products as $product)
                    <a href="{{ route('products.show', $product) }}" class="flex py-4 px-2 hover:bg-gray-50 cursor-pointer">
                        <div class="flex-1">{{ $product->name }}</div>
                        @if ($product->amount !== $product->amount_ordered)
                            <div class="text-sm text-gray-600">{{ $product->amount }} / {{ $product->amount_ordered }}</div>
                        @else
                            <div class="text-sm font-medium text-green-700">@lang('Completed')</div>
                        @endif
                    </a>
                @endforeach
            </div>
        </div>
    </div>
@endsection

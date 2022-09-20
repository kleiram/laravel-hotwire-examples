@extends('master')

@section('content')
    <div class="min-w-full min-h-screen bg-gray-100 flex items-center justify-center">
        <div class="bg-white md:rounded shadow w-full md:w-1/2">
            <div class="w-full border-b px-4 py-2 font-medium">Products</div>
            <div class="w-full divide-y">
                @foreach ($products as $product)
                    @include('products._partials.product-row', ['product' => $product])
                @endforeach
            </div>
        </div>
    </div>
@endsection

@extends('master')

@section('content')
    <turbo-frame id="products_{{ $product->id }}">
        <div class="min-w-full min-h-screen bg-gray-100 flex flex-col items-center justify-center">
            <div class="flex-1 md:hidden"></div>
            @if ($errors->any())
                <div class="w-full md:w-1/2 mb-4 bg-red-50 border-l-4 border-red-500 p-4 text-red-700">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>@lang($error)</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            <div class="bg-white md:rounded shadow w-full md:w-1/2">
                <div class="w-full">
                    <div class="px-4 pt-2">
                        <a href="{{ route('products.index') }}" class="text-sm text-purple-700 hover:accent-purple-600" data-turbo-frame="_top">Back</a>
                    </div>
                    <div class="w-full border-b px-4 py-2 font-medium">{{ $product->name }}</div>
                </div>
                <div
                    class="flex"
                    data-controller="stepper"
                    data-stepper-value-value="{{ $product->amount }}"
                    data-stepper-minimum-value="0"
                    data-stepper-maximum-value="{{ $product->amount_ordered }}"
                >
                    <form method="post" action="{{ route('products.update', $product) }}" class="contents" data-stepper-target="form">
                        @method('put')
                        @csrf

                        <input type="hidden" name="amount_ordered" value="{{ $product->amount_ordered }}">

                        <div class="flex-1 flex p-4 gap-x-4">
                            <button
                                type="button"
                                class="h-full px-4 aspect-square bg-white border rounded hover:bg-gray-50 active:bg-gray-100 disabled:bg-gray-50 disabled:cursor-not-allowed"
                                data-stepper-target="decrement"
                                data-action="stepper#decrement"
                            >
                                -
                            </button>
                            <div class="flex-1 flex items-center">
                                @include('products._partials.product-input', ['product' => $product])
                                <span>/</span>
                                <span class="flex-1 text-center">{{ $product->amount_ordered }}</span>
                            </div>
                            <button
                                type="button"
                                class="h-full px-4 aspect-square bg-white border rounded hover:bg-gray-50 active:bg-gray-100 disabled:bg-gray-50 disabled:cursor-not-allowed"
                                data-stepper-target="increment"
                                data-action="stepper#increment"
                            >
                                +
                            </button>
                            <button
                                type="button"
                                class="h-full px-8 bg-white border rounded hover:bg-gray-50 active:bg-gray-100 disabled:bg-gray-50 disabled:cursor-not-allowed"
                                data-stepper-target="increment"
                                data-stepper-value-param="{{ $product->amount_ordered }}"
                                data-action="stepper#update"
                            >
                                All
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </turbo-frame>
@endsection

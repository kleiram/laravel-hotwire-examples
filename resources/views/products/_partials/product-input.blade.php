<input
    id="products_show_{{ $product->id }}_input"
    type="text"
    name="amount"
    value="{{ $product->amount }}"
    class="flex-1 focus:outline-0 text-center"
    data-stepper-target="input"
    data-action="keyup->stepper#update change->stepper#submit"
>

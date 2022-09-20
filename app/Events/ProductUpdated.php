<?php

namespace App\Events;

use App\Models\Product;
use Illuminate\Broadcasting\Channel;
use Illuminate\Broadcasting\InteractsWithSockets;
use Illuminate\Contracts\Broadcasting\ShouldBroadcastNow;
use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Queue\SerializesModels;

class ProductUpdated implements ShouldBroadcastNow
{
    use Dispatchable, InteractsWithSockets, SerializesModels;

    private Product $product;

    public function __construct(Product $product)
    {
        $this->product = $product;
    }

    public function broadcastAs()
    {
        return 'updated';
    }

    public function broadcastOn()
    {
        return new Channel('products');
    }

    public function broadcastWith()
    {
        return [
            'actions' => [
                $this->createAction(
                    'replace',
                    template: view('products._partials.product-row', ['product' => $this->product])->render(),
                    target: sprintf('products_index_%d', $this->product->id),
                ),
                $this->createAction(
                    'replace',
                    template: view('products._partials.product-input', ['product' => $this->product])->render(),
                    targets: sprintf('#products_show_%d_input:not(:focus)', $this->product->id),
                ),
            ],
        ];
    }

    private function createAction(string $action, string $template, ?string $target = null, ?string $targets = null): string
    {
        return sprintf(
            '<turbo-stream action="%s" %s="%s"><template>%s</template></turbo-stream>',
            $action,
            $target ? 'target' : 'targets',
            $target ?? $targets,
            $template,
        );
    }
}

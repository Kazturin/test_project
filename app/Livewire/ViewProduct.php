<?php

namespace App\Livewire;

use Livewire\Component;
use LivewireUI\Modal\ModalComponent;
use App\Models\Product;

class ViewProduct extends ModalComponent
{
    public Product $product;

    public function render()
    {
        return view('livewire.view-product');
    }

    public static function modalMaxWidth(): string
{
    return '3xl';
}
}

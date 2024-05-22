<?php

namespace App\Livewire\Forms;

use App\Jobs\SendNewProductNotificationJob;
use App\Models\Product;
use Livewire\Attributes\Validate;
use Livewire\Form;
use Illuminate\Validation\Rule;
use Illuminate\Support\Facades\Notification;
use App\Notifications\NewProductNotification;
class ProductForm extends Form
{
    public ?Product $product;

    public $id;
    public $article ;
    public $name;
    public $status;
    public $data = [];

    // #[Validate('required|string|min:10')]
    // public $name;

    // #[Validate('required|unique')]
    // public $article;

    // #[Validate('required|string')]
    // public $status = 'Доступен';

    // #[Validate('nullable|array')]
    // public $data;

    public function rules()
    {
        return [
            'article' => [
                'required',
                'regex:/^[a-zA-Z0-9]+$/u',
                Rule::unique('products')->ignore($this->id), 
            ],
            'name' => 'required|string|min:10',
            'status' => 'required|string',
            'data' => 'nullable|array'
        ];
    }

    public function setProduct(Product $product)
    {
        $this->product = $product;
        $this->id = $product->id;
        $this->article = $product->article;
        $this->name = $product->name;
        $this->status =  $product->status;
        $this->data =  $product->data;
    }

    public function store()
    {
        $this->validate();

       // dd($)

        $product = Product::create($this->all());

        SendNewProductNotificationJob::dispatch($product);

        $this->reset('name','article','status','data');
    }

    public function update()
    {
        $this->validate();

        $this->product->update(
            $this->all()
        );
      // $this->reset();
    }
}

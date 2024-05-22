<?php

namespace App\Livewire;

use App\Livewire\Forms\ProductForm;
use App\Models\Product;
use Livewire\Component;
use LivewireUI\Modal\ModalComponent;

class UpdateProduct extends ModalComponent
{
    public Product $product;
    public ProductForm $form;
    //public ;
    public $inputs = [];

    public $inputs_count = 1;

    public function mount()
    {
        $this->form->setProduct($this->product);
        if(count($this->product->data)){
            $this->inputs_count = count($this->product->data);
            $this->inputs = $this->product->data;
        }
        
    }
 
    public function addInputs()
    {
        array_push($this->inputs ,$this->inputs_count);
        $this->inputs_count++;
    }

    public function removeInputs($i)
    {
    //    dd($i);
        unset($this->inputs[$i]);
        unset($this->form->data[$i]);
    }

    public function save()
    {
        $this->form->update();
 
        return $this->redirect('/');
    }

    public function render()
    {
      //  dd('test');
        return view('livewire.update-product');
    }
}

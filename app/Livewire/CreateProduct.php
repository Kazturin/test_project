<?php

namespace App\Livewire;

use App\Livewire\Forms\ProductForm;
use Livewire\Component;
use LivewireUI\Modal\ModalComponent;


class CreateProduct extends ModalComponent
{
    public ProductForm $form;
    public $inputs = [];
    public $inputs_count = 1;

    public function mount(){
        $this->form->status = "Доступен";
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
    }

    public function save()
    {
      //  dd($this->form);
        $this->form->store();
        session()->flash('success', 'Енгізілді');
       
        return $this->redirect('/');

    }

    public function render()
    {
        return view('livewire.create-product');
    }
}

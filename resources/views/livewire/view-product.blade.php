<div class="px-4 py-2 bg-[#374050]">
    <div class="flex justify-between">
      <h1 class="py-2 text-xl text-white"> {{ $product->name }} </h1>
      <div class="flex items-center space-x-2">
      <button 
                                onclick="Livewire.dispatch('openModal', { component: 'update-product',  arguments: { product: {{ $product->id }} } })"
                                   class="flex w-7 h-7 bg-gray-800 items-center justify-between text-sm font-medium leading-5 text-gray-500 rounded-lg focus:outline-none focus:shadow-outline-gray"
                                   aria-label="Edit"
                                >
                                    <svg
                                        class="w-4 h-4 mx-auto"
                                        aria-hidden="true"
                                        fill="currentColor"
                                        viewBox="0 0 20 20"
                                    >
                                        <path
                                            d="M13.586 3.586a2 2 0 112.828 2.828l-.793.793-2.828-2.828.793-.793zM11.379 5.793L3 14.172V17h2.828l8.38-8.379-2.83-2.828z"
                                        ></path>
                                    </svg>
                                </button>
                                <form action="{{ route('product.destroy',$product->id) }}" method="post">
                                    @csrf
                                    @method('delete')
                                    <button
                                        class="flex items-center justify-between w-7 h-7 bg-gray-800 text-sm font-medium leading-5 text-gray-500 rounded-lg focus:outline-none focus:shadow-outline-gray"
                                        aria-label="Delete"
                                    >
                                        <svg
                                            class="w-4 h-4 mx-auto"
                                            aria-hidden="true"
                                            fill="currentColor"
                                            viewBox="0 0 20 20"
                                        >
                                            <path
                                                fill-rule="evenodd"
                                                d="M9 2a1 1 0 00-.894.553L7.382 4H4a1 1 0 000 2v10a2 2 0 002 2h8a2 2 0 002-2V6a1 1 0 100-2h-3.382l-.724-1.447A1 1 0 0011 2H9zM7 8a1 1 0 012 0v6a1 1 0 11-2 0V8zm5-1a1 1 0 00-1 1v6a1 1 0 102 0V8a1 1 0 00-1-1z"
                                                clip-rule="evenodd"
                                            ></path>
                                        </svg>
                                    </button>
                                </form>
        <button wire:click="$dispatch('closeModal', { component: 'view-product' })" 
        class="text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm p-1.5 ml-auto inline-flex items-center" 
           data-modal-toggle="product-modal">
            <svg class="w-7 h-7" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z" clip-rule="evenodd"></path></svg>
        </button>
      </div>
    </div>
    

    <div>
        <table class="text-white mb-10">
            <tr>
                <th class="pr-8 py-3 text-gray-400">Артикул</th><th>{{ $product->article }}</th>
            </tr>
            <tr>
                <th class="pr-8 py-3 text-gray-400">Название</th><th>{{ $product->name }}</th>
            </tr>
            <tr>
                <th class="pr-8 py-3 text-gray-400">Статус</th><th>{{ $product->status }}</th>
            </tr>
            <tr>
                <th class="pr-8 py-3 text-gray-400">Data</th>
                <th class="pr-8 py-3 text-gray-400"><div>
            @if ($product->data)
                @foreach ($product->data as $item)
              {{ $item['key'] .': '. $item['value'] }} <br>             
              @endforeach
              @endif
            </div>
        </th>
            </tr>
        </tab>
    </div>
</div>

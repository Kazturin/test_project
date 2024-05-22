@extends('layouts.app')
@section('content')
<div class="mx-4">
  <div class="flex space-x-4">
     <button onclick="Livewire.dispatch('openModal', { component: 'create-product' })" class="px-8 py-2 bg-sky-500 rounded-md text-white mb-4">Добавить</button>
     <a class="px-8 py-2 bg-green-500 rounded-md text-white mb-4" href="/products/excel-export">Excel</a>
     <a class="px-8 py-2 bg-red-500 rounded-md text-white mb-4" href="/products/pdf-export">Pdf</a>
  </div>
<div class="w-full overflow-hidden rounded-lg shadow-lg border-t">
        <div class="w-full overflow-x-auto">
            <table class="w-full whitespace-no-wrap">
                <thead>
                <tr
                    class="text-xs font-semibold tracking-wide text-left text-gray-500 uppercase border-b bg-gray-50"
                >
                    <th class="px-4 py-3">Артикул</th>
                    <th class="px-4 py-3">Название</th>
                    <th class="px-4 py-3">Статус</th>
                    <th class="px-4 py-3">Атрибуты</th>
                    <th class="px-4 py-3"></th>
                </tr>
                </thead>
                <tbody
                    class="bg-white divide-y"
                >
                @foreach ($products as $product)
                    <tr class="text-gray-700">
                        <td class="px-4 py-3 text-sm">
                        {{ $product->article }}
                        </td>
                        <td class="px-4 py-3 text-sm">
                        {{ $product->name }}
                        </td>
                        <td class="px-4 py-3 text-sm">
                        {{ $product->status}}
                        </td>
                        <td class="px-4 py-3 text-sm">
                        @if ($product->data)
                @foreach ($product->data as $item)
              {{ $item['key'] .': '. $item['value'] }} <br>             
              @endforeach
              @endif
                        </td>
                        <td class="px-4 py-3">
                            <div class="flex items-center space-x-4 text-sm">
                                <button 
                                onclick="Livewire.dispatch('openModal', { component: 'update-product',  arguments: { product: {{ $product->id }} } })"
                                   class="flex items-center justify-between px-2 py-2 text-sm font-medium leading-5 text-gray-500 rounded-lg focus:outline-none focus:shadow-outline-gray"
                                   aria-label="Edit"
                                >
                                    <svg
                                        class="w-5 h-5"
                                        aria-hidden="true"
                                        fill="currentColor"
                                        viewBox="0 0 20 20"
                                    >
                                        <path
                                            d="M13.586 3.586a2 2 0 112.828 2.828l-.793.793-2.828-2.828.793-.793zM11.379 5.793L3 14.172V17h2.828l8.38-8.379-2.83-2.828z"
                                        ></path>
                                    </svg>
                                </button>
                                <button 
                                onclick="Livewire.dispatch('openModal', { component: 'view-product',  arguments: { product: {{ $product->id }} } })"
                                   class="flex items-center justify-between px-2 py-2 text-sm font-medium leading-5 text-gray-500 rounded-lg focus:outline-none focus:shadow-outline-gray"
                                   aria-label="Edit"
                                >
                                <svg 
                                        class="w-5 h-5"
                                        aria-hidden="true"
                                        fill="currentColor"
                                        viewBox="0 0 24 24"><path d="m11.998 5c-4.078 0-7.742 3.093-9.853 6.483-.096.159-.145.338-.145.517s.048.358.144.517c2.112 3.39 5.776 6.483 9.854 6.483 4.143 0 7.796-3.09 9.864-6.493.092-.156.138-.332.138-.507s-.046-.351-.138-.507c-2.068-3.403-5.721-6.493-9.864-6.493zm.002 3c2.208 0 4 1.792 4 4s-1.792 4-4 4-4-1.792-4-4 1.792-4 4-4zm0 1.5c1.38 0 2.5 1.12 2.5 2.5s-1.12 2.5-2.5 2.5-2.5-1.12-2.5-2.5 1.12-2.5 2.5-2.5z"/>
                              </svg>
                                </button>
                                <form action="{{ route('product.destroy',$product->id) }}" method="post">
                                    @csrf
                                    @method('delete')
                                    <button
                                        class="flex items-center justify-between px-2 py-2 text-sm font-medium leading-5 text-gray-500 rounded-lg focus:outline-none focus:shadow-outline-gray"
                                        aria-label="Delete"
                                    >
                                        <svg
                                            class="w-5 h-5"
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
                            </div>
                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>
        </div>
    </div>

</div>
@endsection
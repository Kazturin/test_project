<div class="px-4 py-6 bg-[#374050]">
    <div class="flex justify-between">
    <h1 class="py-2 text-2xl text-white font-semibold">Добавить продукт</h1>
    <button wire:click="$dispatch('closeModal', { component: 'create-product' })" 
        class="text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm p-1.5 ml-auto inline-flex items-center" 
           data-modal-toggle="product-modal">
            <svg class="w-7 h-7" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z" clip-rule="evenodd"></path></svg>
        </button>
    </div>
    
    <div class="mt-6 text-white">
        <form wire:submit="save">
            <div class="mb-4">
                <div>
                    {{ $form->article }}
                </div>
                <label for="articul" class="text-white block text-sm font-medium mb-2">Артикул</label>
                <input wire:model="form.article" type="text" id="articul"
                    class="text-gray-700 shadow-sm rounded-md w-3/4 px-3 py-2 border border-gray-300" required>
                <div>
                    @error('form.article') <span class="error text-red-500">{{ $message }}</span> @enderror
                </div>
            </div>
            <div class="mb-4">
                <label for="name" class="text-white block text-sm font-medium mb-2">Названия</label>
                <input wire:model="form.name" type="text" id="name"
                    class="text-gray-700 shadow-sm rounded-md w-3/4 px-3 py-2 border border-gray-300" required>
                <div>
                    @error('form.name') <span class="error text-red-500">{{ $message }}</span> @enderror
                </div>
            </div>
            <div class="mb-4">
                <label for="status" class="text-white block text-sm font-medium mb-2">Статус</label>
                <select wire:model="form.status" id="status" name="subject"
                    class="w-3/4 border border-gray-300 text-gray-800 rounded-md py-2 px-3">
                    <option value="Доступен" disabled selected>Доступен</option>
                    <option value="Не доступен">Не доступен</option>
                </select>
                <div>
                    @error('form.status') <span class="error text-red-500">{{ $message }}</span> @enderror
                </div>
            </div>
            <p class="text-white">Атрибуты</p>
            <p wire:click="addInputs" class="cursor-pointer decoration-dashed text-cyan-500 my-2">+ Добавить атрибут</p>
            @if (count($inputs) > 0)
                @foreach ($inputs as $key => $val)
                    <div class="flex items-center">
                        <div class="grow grid grid-cols-2 mb-2 gap-2">
                            <div>
                                <label for="name" class="text-white block text-sm font-medium mb-2">Название</label>
                                <input wire:model="form.data.{{ $loop->index }}.key" type="text" id="name"
                                    class="text-gray-700 shadow-sm rounded-md w-full px-3 py-2 border border-gray-300" required>
                            </div>
                            <div>
                                <label for="val" class="text-white block text-sm font-medium mb-2">Значение</label>
                                <input wire:model="form.data.{{ $loop->index }}.value" type="text" id="val"
                                    class="text-gray-700 shadow-sm rounded-md w-full px-3 py-2 border border-gray-300" required>
                            </div>
                        </div>
                        <div class="px-2" wire:click="removeInputs({{$key}})">
                            <svg class="w-6 h-6 text-gray-400 cursor-pointer" clip-rule="evenodd" fill-rule="evenodd" stroke-linejoin="round"
                                stroke-miterlimit="2" viewBox="0 0 24 24">
                                <path
                                    d="m4.015 5.494h-.253c-.413 0-.747-.335-.747-.747s.334-.747.747-.747h5.253v-1c0-.535.474-1 1-1h4c.526 0 1 .465 1 1v1h5.254c.412 0 .746.335.746.747s-.334.747-.746.747h-.254v15.435c0 .591-.448 1.071-1 1.071-2.873 0-11.127 0-14 0-.552 0-1-.48-1-1.071zm14.5 0h-13v15.006h13zm-4.25 2.506c-.414 0-.75.336-.75.75v8.5c0 .414.336.75.75.75s.75-.336.75-.75v-8.5c0-.414-.336-.75-.75-.75zm-4.5 0c-.414 0-.75.336-.75.75v8.5c0 .414.336.75.75.75s.75-.336.75-.75v-8.5c0-.414-.336-.75-.75-.75zm3.75-4v-.5h-3v.5z"
                                    stroke="currentColor" />
                            </svg>
                        </div>
                    </div>
                @endforeach
            @endif
            <div class="m-4">
                <button type="submit"
                    class="flex items-center px-8 py-2 bg-sky-500 text-white rounded-md">Добавить</button>
            </div>
        </form>
    </div>


</div>
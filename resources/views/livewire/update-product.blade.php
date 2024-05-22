<div class="px-4 py-6 bg-[#374050]">
    <h1 class="py-4 text-2xl text-white font-semibold">Редатировать {{ $product->name }}</h1>
    <div class="mt-6 text-white">
        <form wire:submit="save">
        @if(Auth::user()->hasRole('Admin'))
            <div class="mb-4">
                <label for="articul" class="text-white block text-sm font-medium mb-2">Артикул</label>
                <input wire:model="form.article" type="text" id="articul"
                    class="text-gray-700 shadow-sm rounded-md w-3/4 px-3 py-2 border border-gray-300" required>
                <div>
                    @error('form.article') <span class="error text-red-500">{{ $message }}</span> @enderror
                </div>
            </div>
            @endif
            
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
                                <input wire:model="form.data.{{ $key }}.key" type="text" id="name"
                                    class="text-gray-700 shadow-sm rounded-md w-full px-3 py-2 border border-gray-300" required>
                            </div>
                            <div>
                                <label for="val" class="text-white block text-sm font-medium mb-2">Значение</label>
                                <input wire:model="form.data.{{ $key }}.value" type="text" id="val"
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
            <div class="my-4">
                <button type="submit"
                    class="flex items-center px-8 py-2 bg-sky-500 text-white rounded-md">Сохранить</button>
            </div>
        </form>
    </div>

</div>
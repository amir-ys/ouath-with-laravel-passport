<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Todo Lists
        </h2>
    </x-slot>


    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">

                    <form method="POST" action="{{ route('todo.update' , $todo->id) }}">
                        @csrf
                        @method('PATCH')
                        <div>
                            <x-input-label for="title" :value="__('title')" />
                            <x-text-input id="title" class="block mt-1 w-full"
                                          type="text" name="title" :value="old('title' , $todo->title)" required autofocus />
                            <x-input-error :messages="$errors->get('title')" class="mt-2" />
                        </div>

                        <div class="mt-4">
                            <x-input-label for="description" :value="__('description')" />
                            <x-text-input id="description" class="block mt-1 w-full"
                                          type="text" name="description" :value="old('description' , $todo->description)" required />
                            <x-input-error :messages="$errors->get('description')" class="mt-2" />
                        </div>


                        <div class="flex items-center justify-end mt-4">
                            <x-primary-button class="ml-4">
                                Update
                            </x-primary-button>
                        </div>
                    </form>


                </div>
            </div>
        </div>
    </div>


</x-app-layout>





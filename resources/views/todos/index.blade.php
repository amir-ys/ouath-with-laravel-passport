<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Todo Lists
        </h2>
    </x-slot>




    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">

            <a href="{{ route('todo.create') }}"
               class="bg-blue-500 hover:bg-blue-400 mb-5 ml-2 text-white font-bold py-2 px-4 border-b-4 border-blue-700 hover:border-blue-500 rounded">
                Create
            </a>

            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg mt-5">
                <div class="p-6 text-gray-900">


                    <div class="overflow-x-auto relative shadow-md sm:rounded-lg">
                        <table class="w-full text-sm text-left text-gray-500 dark:text-gray-400">
                            <thead
                                class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                            <tr>
                                <th scope="col" class="py-3 px-4">
                                    Title
                                </th>
                                <th scope="col" class="py-3 px-9">
                                    Description
                                </th>
                                <th scope="col" class="py-3 px-6">
                                    User
                                </th>
                                <th scope="col" class="py-3 px-6 text-center">
                                    Options
                                </th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($todos as $todo)
                                <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700 hover:bg-gray-50 dark:hover:bg-gray-600">
                                    <td scope="col" class="py-3 px-4">
                                        {{ $todo->title }}
                                    </td>
                                    <td scope="col" class="py-3 px-9">
                                        {{ $todo->description }}
                                    </td>
                                    <td scope="col" class="py-3 px-6">
                                        {{ $todo->user->name }}
                                    </td>
                                    <td class="py-4 px-6 text-center">
                                        <a href="{{ route('todo.edit' , $todo->id) }}"
                                           class="bg-indigo-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded-full">Edit</a>

                                        <a href="{{ route('todo.destroy' , $todo->id) }}"
                                           onclick="event.preventDefault();document.getElementById('delete-item-{{$todo->id}}').submit()"
                                           class="bg-red-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded-full">Delete</a>

                                        <a href="{{ route('todo.changeStatus' , $todo->id) }}"
                                           onclick="event.preventDefault();document.getElementById('change-status-item-{{$todo->id}}').submit()"
                                           class="bg-{{ $todo->is_complete ? 'green' : 'gray' }}-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded-full">
                                            {{ $todo->is_complete ? 'Done' : 'Undone' }}
                                        </a>

                                    </td>

                                    <form method="POST" action="{{ route('todo.destroy' , $todo->id) }}"
                                          id="delete-item-{{$todo->id}}">
                                        @csrf
                                        @method('DELETE')

                                    </form>
                                    <form method="POST" action="{{ route('todo.changeStatus' , $todo->id) }}"
                                          id="change-status-item-{{$todo->id}}">
                                        @csrf
                                        @method('PATCH')

                                    </form>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                    </div>

                </div>
            </div>
        </div>
    </div>


</x-app-layout>


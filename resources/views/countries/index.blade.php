<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white grid grid-cols-2">
                <div class="form">
                    <form action="{{ route('countries.store') }}" method="POST">
                        @csrf
                        <h2 class="text-lg font-semibold border-b">Add New Country</h2>
                        <div class="p-2">
                            <label for="name" class="block">Name</label>
                            <input type="text" name="name" id="name" value="{{ old('name') }}">
                            @error('name')
                                <p class="text-xs">{{ $message }}</p>
                            @enderror
                        </div>
                        <div class="p-2">
                            <label for="iso" class="block">ISO</label>
                            <input type="text" name="iso" id="iso" value="{{ old('iso') }}">
                            @error('iso')
                                <p class="text-xs">{{ $message }}</p>
                            @enderror
                        </div>
                        <input type="submit" class="p-2 shadow" value="submit">
                    </form>
                </div>
                <div class="border-b gap-1">
                    <table class="countries">
                        <caption>List Of Countries</caption>
                        <thead>
                            <tr>
                                <td>Id</td>
                                <td>Name</td>
                                <td>ISO</td>
                                <td>--</td>
                            </tr>
                        </thead>
                        @foreach ($countries as $c)
                            <tr>
                                <td>{{ $c->id }}</td>
                                <td>{{ $c->name }}</td>
                                <td>{{ $c->ISO }}</td>
                                <td><a class="button" href="{{ route('countries.edit', $c->id) }}">Edit</a></td>
                            </tr>
                        @endforeach
                    </table>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>

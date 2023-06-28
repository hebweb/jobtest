<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <form action="{{ route('countries.update', $country->id) }}" method="POST">
            @csrf
            @method('patch')
            <div>
                <label for="name">Name</label>
                <input type="text" name="name" id="name" value="{{ old('name', $country->name) }}" required >
                @error('name')
                    <p class="text-xs">{{ $message }}</p>
                @enderror
            </div>
            <div>
                <label for="iso">ISO</label>
                <input type="text" name="iso" id="iso" value="{{ old('iso', $country->ISO) }}" required >
                @error('iso')
                    <p class="text-xs">{{ $message }}</p>
                @enderror
            </div>
            <input type="submit" class="p-2 shadow" value="submit">
        </form>
    </div>
</x-app-layout>

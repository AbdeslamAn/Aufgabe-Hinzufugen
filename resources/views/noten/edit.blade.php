<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Notiz bearbeiten
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 space-y-6">
            <div class="bg-white p-6 overflow-hidden shadow-sm sm:rounded-lg" class="max-w-2xl">
                <form action="{{ route('aufgabes.update', $aufgabe)}}" method="POST" >
                    @method('put')
                    @csrf
                    <x-text-input name="title" class="w-full" placeholder="Notiz-Title" value="{{ @old('title', $aufgabe->title) }}"></x-text-input>
                    @error('title')
                        <div class="text-sm mt-1 text-red-500">{{ $message}}</div>
                    @enderror
                    <x-textarea name="text" placeholder="Sie schreiben Ihre Notiz" rows="8" value="{{ @old('text',  $aufgabe->text) }}" class=" w-full mt-6"></x-textarea>
                     @error('text')
                        <div class="text-sm mt-1 text-red-500">{{ $message}}</div>
                    @enderror
                    <x-primary-button class="mt-6">Notiz bearbeiten</x-primary-button>
                </form>
            </div>


        </div>
    </div>
</x-app-layout>

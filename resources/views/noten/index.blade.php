<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Noten
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 space-y-6">
            <x-link-button href="{{ route('aufgabes.create')}}">
                + Neu Note
            </x-link-button>
            @forelse ($aufgabes as $aufgabe)
            <div class="bg-white p-6 overflow-hidden shadow-sm sm:rounded-lg">

                <h2 class="font-bold  text-2xl text-indigo-600">{{ $aufgabe->title }}</h2>
                <p class="mt-2 ">{{Str::limit($aufgabe->text, 200, '...') }}</p>
                <span class="block mt-4 text-sm opacity-70">{{ $aufgabe->updated_at->diffForHumans()}}</span>
            </div>
            @empty
            <p>Sie haben keine Noten.</p>
            @endforelse
            {{$aufgabes->links()}}

        </div>
    </div>
</x-app-layout>

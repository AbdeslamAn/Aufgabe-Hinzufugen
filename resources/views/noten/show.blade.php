<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
              {{ !$aufgabe->trashed() ? 'Notizen' : 'Papierkorb' }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 space-y-6">

            <x-alert-success>{{ session('success') }}</x-alert-success>

            @if (!$aufgabe->trashed())
            <div class="flex gap-6">
                <x-link-button href="{{ route('aufgabes.edit', $aufgabe) }}" class="ml-auto">Notiz bearbeiten</x-link-button>
                <form action="{{ route('aufgabes.destroy', $aufgabe) }}" method="POST">
                    @method('delete')
                    @csrf
                    <x-primary-button class="bg-red-500 hover:bg-red-600 focus:bg-red-600"
                    onclick="return confirm('Sind Sie sicher, dass Sie diese Notiz „{{ $aufgabe->title }}“ In Papierkorb möchten?')"
                    >In Papierkorb</x-primary-button>
                </form>
            </div>
            <div class="bg-white p-6 overflow-hidden shadow-sm sm:rounded-lg">

                <h2 class="font-bold  text-4xl text-indigo-600">
                  {{ $aufgabe->title }}
                </h2>
                <p class="mt-4 whitespace-pre-wrap">{{ $aufgabe->text }}</p>
            </div>
            <div class="max-w-20xl">
                <table>
                    <tr>
                        <td><p class="opacity-70 "><strong>Erstelen : </strong> {{$aufgabe->created_at->diffForHumans()}}</p></td>
                        <td><p class="opacity-70 p-3"><strong>Letzte ändern : </strong> {{$aufgabe->updated_at->diffForHumans()}}</p></td>
                    </tr>
                </table>
            </div>

            @else
            <div class="flex gap-6">
                <form class="ml-auto" action="{{ route('trashed.update', $aufgabe) }}" method="POST">
                    @method('put')
                    @csrf
                    <x-primary-button>Notiz wiederherstellen</x-primary-button>
                </form>

                {{-- <form action="{{ route('aufgabes.destroy', $aufgabe) }}" method="POST">
                    @method('delete')
                    @csrf
                    <x-primary-button class="bg-red-500 hover:bg-red-600 focus:bg-red-600"
                    onclick="return confirm('Sind Sie sicher, dass Sie diese Notiz „{{ $aufgabe->title }}“ In Papierkorb möchten?')"
                    >In Papierkorb</x-primary-button>
                </form> --}}
            </div>
            <div class="bg-white p-6 overflow-hidden shadow-sm sm:rounded-lg">

                <h2 class="font-bold  text-4xl text-indigo-600">
                  {{ $aufgabe->title }}
                </h2>
                <p class="mt-4 whitespace-pre-wrap">{{ $aufgabe->text }}</p>
            </div>
            <div class="max-w-20xl">
                <table>
                    <tr>
                        <td><p class="opacity-70 "><strong>Löschen : </strong> {{$aufgabe->deleted_at->diffForHumans()}}</p></td>
                    </tr>
                </table>
            </div>
            @endif
        </div>
    </div>
</x-app-layout>

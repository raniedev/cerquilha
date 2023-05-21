<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    @if(session('sucesso'))
                        {{ session('sucesso') }}
                    @endif

                    @can('user')
                        <h1>Usuário</h1>
                    @elsecan('prof')
                        <h1>Professor</h1>
                    @elsecan('admin')
                        <h1>Administrador</h1>
                    @endcan
                </div>
            </div>
        </div>
    </div>
</x-app-layout>

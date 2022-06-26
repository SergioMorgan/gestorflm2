<x-app-layout>
    <div class="max-w-7xl mx-auto sm:px-2 lg:px-4 py-4">
        <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">
            @can('sites.index')
                @livewire('show-sites')
            @endcan
        </div>
    </div>
</x-app-layout>
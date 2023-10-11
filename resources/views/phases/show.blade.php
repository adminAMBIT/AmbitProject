<x-app-layout>
    <x-slot name="header">
        <div class="flex justify-between items-center">
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                {{ $phase->project->title }} - {{ $phase->name }}
            </h2>
        </div>
    </x-slot>

    <div
        class="mx-auto mt-5 grid max-w-3xl grid-cols-1 gap-6 sm:px-6 lg:max-w-7xl lg:grid-flow-col-dense lg:grid-cols-3">
        123
    </div>
</x-app-layout>
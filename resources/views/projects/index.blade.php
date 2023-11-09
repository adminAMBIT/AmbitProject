<x-app-layout>
    <x-slot name="header">
        <div class="flex justify-between items-center">
            <nav class="flex" aria-label="Breadcrumb">
                <ol role="list" class="flex items-center space-x-4">
                    <li>
                        <div class="flex items-center">
                            <p class="ml-4 text-xl font-medium text-gray-500">PROJECTS</p>
                        </div>
                    </li>
                </ol>
            </nav>
            @if(Auth::user()->is_admin)
            <a type="button" href="{{ route('projects.create') }}"
                class="inline-flex items-center rounded-md bg-indigo-600 px-3 py-2 text-sm font-semibold text-white shadow-sm hover:bg-indigo-500 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-600">Create
                new project</a>
            @endif
        </div>
    </x-slot>

    <!-- NOTIFICATIONS -->
    @if(session('created'))
    <x-green-alert message="{{ session('created') }}" />
    @endif

    @if(session('deleted'))
    <x-green-alert message="{{ session('deleted') }}" />
    @endif

    <!-- SHOW PROJECTS -->
    <div class="mx-auto max-w-7xl mt-4 px-4 sm:px-6 lg:px-8">
        <ul role="list" class="grid grid-cols-1 gap-x-6 gap-y-8 lg:grid-cols-3 xl:gap-x-8">
            @foreach ($projects as $project)
            <li
                class="overflow-hidden rounded-xl border border-gray-200 transition-transform duration-300 transform hover:scale-105">
                <a href="{{ route('projects.show', ['id'=>$project->id]) }}">
                    <div class="flex items-center gap-x-4 border-b border-gray-900/5 bg-gray-50 p-6 hover:bg-gray-200">
                        <!-- <img src="https://tailwindui.com/img/logos/48x48/tuple.svg" alt="Tuple" class="h-12 w-12 flex-none rounded-lg bg-white object-cover ring-1 ring-gray-900/10"> -->
                        <div class="text-sm font-medium leading-6 text-gray-900">{{ $project->title }}</div>
                    </div>
                    <dl class="-my-3 divide-y divide-gray-100 px-6 py-4 text-sm leading-6">
                        <div class="flex justify-between gap-x-4 py-3">
                            <dt class="text-gray-700">{{ $project->description}}</dt>
                        </div>
                    </dl>
                </a>
            </li>
            @endforeach
        </ul>
    </div>
</x-app-layout>
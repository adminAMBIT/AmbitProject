<x-app-layout>
    <x-slot name="header">
        <nav class="flex" aria-label="Breadcrumb">
            <ol role="list" class="flex items-center space-x-4">
                <li>
                    <div class="flex items-center">
                        <p class="ml-4 text-xl font-medium text-gray-500 hover:text-gray-700">DASHBOARD</p>
                    </div>
                </li>
            </ol>
        </nav>

    </x-slot>

    <div class="py-4">
        <div class="max-w-fit mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden py-4 shadow-xl sm:rounded-lg">
                <div class="px-4 sm:px-6 lg:px-8">
                    <div class="sm:flex sm:items-center">
                        <div class="sm:flex-auto">
                            <h1 class="text-base font-semibold leading-6 text-gray-900">Last 30 Updated Documents</h1>
                            <p class="mt-2 text-sm text-gray-700">List of 30 documents have been updated recently.</p>
                        </div>
                    </div>

                    
                    <div class="mt-8 flow-root">
                        <div class="-mx-4 -my-2 overflow-x-auto sm:-mx-6 lg:-mx-8">
                            <div class="inline-block min-w-full py-2 align-middle sm:px-6 lg:px-8">
                                <livewire:last-documents-table />
                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>
</x-app-layout>
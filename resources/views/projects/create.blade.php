<x-app-layout>

    <x-slot name="header">
        <div class="flex justify-between items-center">
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                {{ __('Create new project') }}
            </h2>
        </div>
    </x-slot>
    <div class="mx-auto max-w-7xl mt-4 px-4 sm:px-6 lg:px-8">
        <div class="space-y-10 divide-y divide-gray-900/10">
            <div class="grid grid-cols-1 gap-x-8 gap-y-8 md:grid-cols-3">
                <div class="px-4 sm:px-0">
                    <h2 class="text-base font-semibold leading-7 text-gray-900">Project Information</h2>
                    <p class="mt-1 text-sm leading-6 text-gray-600">Please provide project information in the form
                        below.</p>
                </div>

                <form class="bg-white shadow-sm ring-1 ring-gray-900/5 sm:rounded-xl md:col-span-2" method="POST">
                    @csrf
                    <div class="px-4 py-6 sm:p-8">
                        <div class="grid max-w-2xl grid-cols-1 gap-x-6 gap-y-8 sm:grid-cols-6">
                            <div class="sm:col-span-4">
                                <label for="title" class="block text-sm font-medium leading-6 text-gray-900">Project
                                    name *</label>
                                <div class="mt-2">
                                    <div
                                        class="flex rounded-md shadow-sm ring-1 ring-inset ring-gray-300 focus-within:ring-2 focus-within:ring-inset focus-within:ring-indigo-600 sm:max-w-md">
                                        <input type="text" name="title" id="title" placeholder="Enter project name here"
                                            class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6"
                                            required>
                                    </div>
                                </div>
                            </div>

                            <div class="col-span-full">
                                <label for="description"
                                    class="block text-sm font-medium leading-6 text-gray-900">Description</label>
                                <div class="mt-2">
                                    <textarea id="description" name="description" rows="3"
                                        placeholder="Enter project description here"
                                        class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6"></textarea>
                                </div>
                                <p class="mt-3 text-sm leading-6 text-gray-600">(*) Required fields
                                </p>
                            </div>
                        </div>
                    </div>
                    <div class="flex items-center justify-end gap-x-6 border-t border-gray-900/10 px-4 py-4 sm:px-8">
                        <button type="button" onclick="window.history.back();"
                            class="text-sm font-semibold leading-6 text-gray-900">Cancel</button>
                        <button href="{{ route('projects.store') }}"
                            class="rounded-md bg-indigo-600 px-3 py-2 text-sm font-semibold text-white shadow-sm hover:bg-indigo-500 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-600">Create</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</x-app-layout>
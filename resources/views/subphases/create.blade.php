<x-app-layout>
    <x-slot name="header">
        <div class="flex justify-between items-center">
            <nav class="flex" aria-label="Breadcrumb">
                <ol role="list" class="flex items-center space-x-4">
                    <li>
                        <div class="flex items-center">
                            <a href="{{ route('projects.show', ['id'=>$phase->project->id]) }}"
                                class="ml-4 text-xl font-medium text-gray-500 hover:text-gray-700">{{
                                $phase->project->title
                                }}</a>
                        </div>
                    </li>

                    <li>
                        <div class="flex items-center">
                            <svg class="h-5 w-5 flex-shrink-0 text-gray-400" viewBox="0 0 20 20" fill="currentColor"
                                aria-hidden="true">
                                <path fill-rule="evenodd"
                                    d="M7.21 14.77a.75.75 0 01.02-1.06L11.168 10 7.23 6.29a.75.75 0 111.04-1.08l4.5 4.25a.75.75 0 010 1.08l-4.5 4.25a.75.75 0 01-1.06-.02z"
                                    clip-rule="evenodd" />
                            </svg>
                            <a href="{{ route('projects.phases.show', ['project_id'=>$phase->project->id, 'phase_id'=>$phase->id]) }}"
                                class="ml-4 text-xl font-medium text-gray-500 hover:text-gray-700">{{
                                $phase->name
                                }}</a>
                        </div>
                    </li>

                    <li>
                        <div class="flex items-center">
                            <svg class="h-5 w-5 flex-shrink-0 text-gray-400" viewBox="0 0 20 20" fill="currentColor"
                                aria-hidden="true">
                                <path fill-rule="evenodd"
                                    d="M7.21 14.77a.75.75 0 01.02-1.06L11.168 10 7.23 6.29a.75.75 0 111.04-1.08l4.5 4.25a.75.75 0 010 1.08l-4.5 4.25a.75.75 0 01-1.06-.02z"
                                    clip-rule="evenodd" />
                            </svg>
                            <p class="ml-4 text-xl font-medium text-gray-800">Create Subphase</p>
                        </div>
                    </li>
                </ol>
            </nav>
        </div>
    </x-slot>




    <div class="mx-auto max-w-7xl mt-4 px-4 sm:px-6 lg:px-8">

        <div class="space-y-10 divide-y divide-gray-900/10">


            <div class="grid grid-cols-1 gap-x-8 gap-y-8 pt-4 md:grid-cols-3">
                <div class="px-4 sm:px-0">
                    <h2 class="text-base font-semibold leading-7 text-gray-900">Subphase Information</h2>
                    <p class="mt-1 text-sm leading-6 text-gray-600">Use a permanent address where you can receive mail.
                    </p>
                </div>

                <form method="post" class="bg-white shadow-sm ring-1 ring-gray-900/5 sm:rounded-xl md:col-span-2">
                    @csrf
                    <div class="px-4 py-6 sm:p-8">
                        <div class="grid max-w-2xl grid-cols-1 gap-x-6 gap-y-3 sm:grid-cols-6">
                            <div class="sm:col-span-3">
                                <label for="name" class="block text-sm font-medium leading-6 text-gray-900">Name</label>
                                <div class="mt-1">
                                    <input type="text" name="name" id="name" autocomplete="given-name" required
                                        class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6">
                                </div>
                            </div>

                            <div class="sm:col-span-4">
                                <label for="description"
                                    class="block text-sm font-medium leading-6 text-gray-900">Description</label>
                                <div class="mt-1">
                                    <textarea id="description" name="description" type="text"
                                        class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6"></textarea>
                                </div>
                            </div>

                            <div class="sm:col-span-4">
                                <div>
                                    <label class="block text-sm font-medium leading-6 text-gray-900">Documents</label>
                                    <p class="text-sm text-gray-500">The users could upload documents?</p>
                                    <fieldset class="mt-4">
                                        <div class="space-y-4 sm:flex sm:items-center sm:space-x-10 sm:space-y-0">
                                            <div class="flex items-center">
                                                <input id="sms" name="has_documents" type="radio" value="1" required
                                                    class="h-4 w-4 border-gray-300 text-indigo-600 focus:ring-indigo-600">
                                                <label for="sms"
                                                    class="ml-3 block text-sm font-medium leading-6 text-gray-900">Yes</label>
                                            </div>
                                            <div class="flex items-center">
                                                <input id="push" name="has_documents" type="radio" value="0" required
                                                    class="h-4 w-4 border-gray-300 text-indigo-600 focus:ring-indigo-600">
                                                <label for="push"
                                                    class="ml-3 block text-sm font-medium leading-6 text-gray-900">No</label>
                                            </div>
                                        </div>
                                    </fieldset>
                                </div>

                            </div>

                            <div class="sm:col-span-4">
                                <div>
                                    <label class="block text-sm font-medium leading-6 text-gray-900">Instructions</label>
                                    <p class="text-sm text-gray-500">This subphase has instructions?</p>
                                    <fieldset class="mt-4">
                                        <div class="space-y-4 sm:flex sm:items-center sm:space-x-10 sm:space-y-0">
                                            <div class="flex items-center">
                                                <input id="sms" name="has_instructions" type="radio" value="1" required
                                                    class="h-4 w-4 border-gray-300 text-indigo-600 focus:ring-indigo-600">
                                                <label for="sms"
                                                    class="ml-3 block text-sm font-medium leading-6 text-gray-900">Yes</label>
                                            </div>
                                            <div class="flex items-center">
                                                <input id="push" name="has_instructions" type="radio" value="0" required
                                                    class="h-4 w-4 border-gray-300 text-indigo-600 focus:ring-indigo-600">
                                                <label for="push"
                                                    class="ml-3 block text-sm font-medium leading-6 text-gray-900">No</label>
                                            </div>
                                        </div>
                                    </fieldset>
                                </div>

                            </div>


                        </div>
                    </div>
                    <div class="flex items-center justify-end gap-x-6 border-t border-gray-900/10 px-4 py-4 sm:px-8">
                        <a type="button" href="#" onclick="window.history.back()"
                            class="text-sm font-semibold leading-6 text-gray-900">Cancel</a>
                        <button type="submit" href="#"
                            class="rounded-md bg-indigo-600 px-3 py-2 text-sm font-semibold text-white shadow-sm hover:bg-indigo-500 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-600">Create</button>
                    </div>
                </form>
            </div>
        </div>
    </div>



</x-app-layout>
<x-app-layout>
    <x-slot name="header">
        <div class="flex justify-between items-center">
            <nav class="flex" aria-label="Breadcrumb">
                <ol role="list" class="flex items-center space-x-4">
                    <li>
                        <div class="flex items-center">
                            <a href="{{ route('projects.show', ['id'=>$project->id]) }}"
                                class="ml-4 text-xl font-medium text-gray-500 hover:text-gray-700">{{ $project->title
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
                            <a href="{{ route('projects.phases.subphases.show', ['project_id'=>$project->id, 'phase_id'=>$document->subphase->phase->id, 'subphase_id'=>$document->subphase->id]) }}"
                                class="ml-4 text-xl font-medium text-gray-500 hover:text-gray-700">{{
                                $document->subphase->name }}</a>
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
                            <p class="ml-4 text-xl font-medium text-gray-800"><a href="{{ route('document.show', ['document_id'=>$document->id]) }}" class="text-xl font-medium text-gray-500 hover:text-gray-700">{{ $document->name }}</a> - Editing</p>
                        </div>
                    </li>
                </ol>
            </nav>
        </div>
    </x-slot>

    <div class="mx-auto max-w-7xl mt-4 px-4 sm:px-6 lg:px-8">
        <div class="overflow-hidden bg-white shadow sm:rounded-lg">
            <form action="" method="post">
                @csrf
                <div class="border-b border-gray-200 bg-white px-4 py-5 sm:px-6">
                    <div class="-ml-4 -mt-4 flex flex-wrap items-center justify-between sm:flex-nowrap">
                        <div class="ml-4 mt-4">
                            <h3 class="text-base font-semibold leading-6 text-gray-900">Editing Document Information</h3>
                            <!-- <p class="mt-1 text-sm text-gray-500">Lorem ipsum dolor sit amet consectetur adipisicing elit
                            quam corrupti consectetur.</p> -->
                        </div>
                    </div>
                </div>
                <div class="border-t border-gray-100">
                    <dl class="divide-y divide-gray-100">
                        <!-- Nombre -->
                        <div class="px-4 py-3 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
                            <dt class="text-sm font-medium text-gray-900">Name</dt>
                            <dd class="mt-1 text-sm leading-6 text-gray-700 sm:col-span-2 sm:mt-0">
                                <input type="text" name="name" value="{{ $document->name }}"
                                    class="border border-gray-300 rounded-md w-full px-3 py-2" />
                            </dd>
                        </div>

                        <!-- Estado -->
                        <div class="px-4 py-6 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
                            <dt class="text-sm font-medium text-gray-900">Status</dt>
                            <dd class="mt-1 text-sm font-bold leading-6 text-gray-700 sm:col-span-2 sm:mt-0">
                                <select name="status" class="border border-gray-300 rounded-md w-1/3 px-3 py-2">
                                    <option value="correct" @if($document->status == 'correct') selected @endif>Correct
                                    </option>
                                    <option value="pending" @if($document->status == 'pending') selected @endif>Pending
                                    </option>
                                    <option value="incorrect" @if($document->status == 'incorrect') selected @endif>Incorrect
                                    </option>
                                    <!-- Agrega más opciones según sea necesario -->
                                </select>
                            </dd>
                        </div>
                    </dl>
                </div>
                <div class="flex items-center justify-end gap-x-6 border-t border-gray-900/10 px-4 py-4 sm:px-8">
                    <a type="button" href="#" onclick="window.history.back()"
                        class="text-sm font-semibold leading-6 text-gray-900">Cancel</a>
                    <button type="submit" href="#"
                        class="rounded-md bg-indigo-600 px-3 py-2 text-sm font-semibold text-white shadow-sm hover:bg-indigo-500 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-600">Save</button>
                </div>
            </form>
        </div>
    </div>

</x-app-layout>
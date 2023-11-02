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
                            <a href="{{ route('projects.manageCompanies.index', ['project_id' => $project->id]) }}"
                                class="ml-4 text-xl font-medium text-gray-500 hover:text-gray-700">Manage Companies</a>
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
                            <a href="{{ route('companies.show', ['id'=>$company->id]) }}"
                                class="ml-4 text-xl font-medium text-gray-500 hover:text-gray-700">{{ $company->name
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
                            <p class="ml-4 text-xl font-medium text-gray-900">Download Documents</p>
                        </div>
                    </li>
                </ol>
            </nav>
        </div>
    </x-slot>

    <div class="mx-auto max-w-7xl mt-4 px-4 sm:px-6 lg:px-8">
        <div class="overflow-hidden sm:rounded-lg">
            <div class="p-4 sm:px-6 lg:px-8">
                <div class="space-y-10 divide-y divide-gray-900/10">
                    <div class="grid grid-cols-1 gap-x-8 gap-y-8 md:grid-cols-3">
                        <div class="px-4 sm:px-0">
                            <h2 class="text-base font-semibold leading-7 text-gray-900">Documents</h2>
                            <p class="mt-1 text-sm leading-6 text-gray-600">Download documents by the status of de document</p>
                        </div>

                        <form method="post" class="bg-white shadow-sm ring-1 ring-gray-900/5 sm:rounded-xl md:col-span-2" onchange="checkDownloadButton()">
                            @csrf
                            <div class="px-4 py-6 sm:p-8">
                                <div class="max-w-2xl space-y-10">
                                    <fieldset>
                                        <legend class="text-sm font-semibold leading-6 text-gray-900">Document Status
                                        </legend>
                                        <div class="mt-6 space-y-6">
                                            <div class="relative flex gap-x-3">
                                                <div class="flex h-6 items-center">
                                                    <input id="correct" name="correct" type="checkbox"
                                                        class="h-4 w-4 rounded border-gray-300 text-indigo-600 focus:ring-indigo-600">
                                                </div>
                                                <div class="text-sm leading-6">
                                                    <label for="correct"
                                                        class="font-medium text-gray-900">Correct</label>
                                                </div>
                                            </div>
                                            <div class="relative flex gap-x-3">
                                                <div class="flex h-6 items-center">
                                                    <input id="pending" name="pending" type="checkbox"
                                                        class="h-4 w-4 rounded border-gray-300 text-indigo-600 focus:ring-indigo-600">
                                                </div>
                                                <div class="text-sm leading-6">
                                                    <label for="pending"
                                                        class="font-medium text-gray-900">Pending</label>
                                                </div>
                                            </div>
                                            <div class="relative flex gap-x-3">
                                                <div class="flex h-6 items-center">
                                                    <input id="incorrect" name="incorrect" type="checkbox"
                                                        class="h-4 w-4 rounded border-gray-300 text-indigo-600 focus:ring-indigo-600">
                                                </div>
                                                <div class="text-sm leading-6">
                                                    <label for="incorrect"
                                                        class="font-medium text-gray-900">Incorrect</label>
                                                </div>
                                            </div>
                                        </div>
                                    </fieldset>
                                </div>
                            </div>
                            <div
                                class="flex items-center justify-end gap-x-6 border-t border-gray-900/10 px-4 py-4 sm:px-8">
                                <a href="{{ route('projects.companies.documents.index', ['project_id'=>$project->id, 'company_id'=>$company->id]) }}"
                                    class="text-sm font-semibold leading-6 text-gray-900">Cancel</a>
                                <button type="submit" id="downloadButton" disabled
                                    class="rounded-md bg-indigo-600 px-3 py-2 text-sm font-semibold text-white shadow-sm hover:bg-indigo-500 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-600 disabled:bg-indigo-200">Download</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script>
        function checkDownloadButton(){
            var correct = document.getElementById('correct').checked;
            var pending = document.getElementById('pending').checked;
            var incorrect = document.getElementById('incorrect').checked;

            if(correct || pending || incorrect){
                document.getElementById('downloadButton').disabled = false;
            }else{
                document.getElementById('downloadButton').disabled = true;
            }
        }
    </script>
</x-app-layout>
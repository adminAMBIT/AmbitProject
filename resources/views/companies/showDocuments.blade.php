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
                    @if(auth()->user()->is_admin)
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
                    @endif
                    <li>
                        <div class="flex items-center">
                            <svg class="h-5 w-5 flex-shrink-0 text-gray-400" viewBox="0 0 20 20" fill="currentColor"
                                aria-hidden="true">
                                <path fill-rule="evenodd"
                                    d="M7.21 14.77a.75.75 0 01.02-1.06L11.168 10 7.23 6.29a.75.75 0 111.04-1.08l4.5 4.25a.75.75 0 010 1.08l-4.5 4.25a.75.75 0 01-1.06-.02z"
                                    clip-rule="evenodd" />
                            </svg>
                            <p class="ml-4 text-xl font-medium text-gray-900">Documents</p>
                        </div>
                    </li>
                </ol>
            </nav>
        </div>
    </x-slot>

    @if (session('success'))
    <x-green-alert message="{{ session('success') }}" />
    @endif

    <div class="mx-auto mt-4 px-4 sm:px-6 lg:px-8">
        <div class="overflow-hidden mt-4 px-4 bg-white shadow sm:rounded-lg">
            <div class="p-4 sm:px-6 lg:px-8">
                <div class="sm:flex sm:items-center">
                    <div class="sm:flex-auto">
                        <h1 class="text-base font-semibold leading-6 text-gray-900">Documents</h1>
                        <!-- <p class="mt-2 text-sm text-gray-700">The comapny's legal representant</p> -->
                    </div>
                    <div class="mt-4 sm:ml-16 sm:mt-0 sm:flex-none">
                        @if($documents->isNotEmpty())
                        <a type="button"
                            href="{{ route('projects.companies.documents.status', ['project_id'=>$project->id, 'company_id'=>$company->id])}}"
                            class="inline-block rounded-md bg-gray-600 px-3 mr-2 py-2 text-center text-sm font-semibold text-white shadow-sm hover:bg-gray-500 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-gray-600">Change Status</a>

                        <a type="button"
                            href="{{ route('projects.companies.documents.downloadForm', ['project_id'=>$project->id, 'company_id'=>$company->id]) }}"
                            class="inline-block rounded-md bg-indigo-600 px-3 py-2 text-center text-sm font-semibold text-white shadow-sm hover:bg-indigo-500 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-600">Download
                            Documents</a>
                        @endif

                    </div>
                </div>
                <div class="mt-8 flow-root">
                    <div class="-mx-4 -my-2 overflow-x-auto sm:-mx-6 lg:-mx-8">
                        <div class="inline-block min-w-full py-2 align-middle sm:px-6 lg:px-8">
                            <div class="overflow-hidden shadow ring-1 ring-black ring-opacity-5 sm:rounded-lg">
                                <table class="min-w-full mx-auto divide-y divide-gray-300" style="max-width: 80%;">
                                    <thead class="bg-gray-50">
                                        <tr>
                                            <th scope="col"
                                                class="py-3.5 pl-4 pr-3 text-left text-sm font-semibold text-gray-900 sm:pl-6">
                                                Name</th>
                                            <th scope="col"
                                                class="py-3.5 pl-4 pr-3 text-left text-sm font-semibold text-gray-900 sm:pl-6">
                                                Subphase</th>
                                            <th scope="col"
                                                class="py-3.5 pl-4 pr-3 text-left text-sm font-semibold text-gray-900 sm:pl-6">
                                                Status</th>
                                            <th scope="col"
                                                class="py-3.5 pl-4 pr-3 text-left text-sm font-semibold text-gray-900 sm:pl-6">
                                                Uploaded at</th>
                                            <th scope="col"
                                                class="py-3.5 pl-4 pr-3 text-left text-sm text-center font-semibold text-gray-900 sm:pl-6">
                                                Actions</th>
                                            </th>
                                        </tr>
                                    </thead>
                                    <tbody class="divide-y divide-gray-200 bg-white">
                                        @if($documents->isEmpty())
                                        <tr>
                                            <td colspan="5"
                                                class="py-4 pl-4 pr-3 text-center text-sm font-medium text-gray-900 sm:pl-6">
                                                No documents found
                                            </td>
                                        </tr>
                                        @else
                                        @foreach ($documents as $document)
                                        <tr>
                                            <td
                                                class="whitespace-nowrap py-4 pl-4 pr-3 text-sm font-medium text-gray-900 sm:pl-6 ">
                                                <a class="hover:underline" href="{{ route('document.show', ['document_id'=>$document->id]) }}">{{
                                                    $document->name }}.{{ $document->extension }}</a>
                                            </td>
                                            <td
                                                class="whitespace-nowrap py-4 pl-4 pr-3 text-sm font-medium text-gray-900 sm:pl-6">
                                                {{ $document->subphase->name }} ({{ $document->subphase->phase->name }})
                                            </td>
                                            @if($document->status == 'pending')
                                            <td
                                                class="whitespace-nowrap py-4 pl-4 pr-3 text-sm font-medium text-yellow-500 sm:pl-6">
                                                @elseif($document->status == 'correct')
                                            <td
                                                class="whitespace-nowrap py-4 pl-4 pr-3 text-sm font-medium text-green-500 sm:pl-6">
                                                @elseif($document->status == 'incorrect')
                                            <td
                                                class="whitespace-nowrap py-4 pl-4 pr-3 text-sm font-medium text-red-700 sm:pl-6">
                                                @endif
                                                {{ strtoupper($document->status) }}
                                            </td>
                                            <td
                                                class="whitespace-nowrap py-4 pl-4 pr-3 text-sm font-medium text-gray-700 sm:pl-6">
                                                {{ $document->getFormatedCreatedAtAttribute() }}
                                            </td>
                                            <td
                                                class="relative whitespace-nowrap py-4 pl-3 pr-4 text-center text-sm font-medium sm:pr-6">
                                                <a href="{{ route('document.show', ['document_id' => $document->id]) }}"
                                                    class="mr-4 text-indigo-600 hover:text-indigo-900">Show</a>
                                                <a href="{{ route('document.view', ['document_id' => $document->id]) }}"
                                                    class="mr-4 text-green-600 hover:text-green-900">View</a>
                                            </td>
                                        </tr>
                                        @endforeach
                                        @endif
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>





</x-app-layout>
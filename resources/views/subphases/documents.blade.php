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
                            <a href="{{ route('projects.phases.show', ['project_id'=>$project->id, 'phase_id'=>$phase->id]) }}"
                                class="ml-4 text-xl font-medium text-gray-500 hover:text-gray-700">{{ $phase->name
                                }}</a>
                        </div>
                    </li>

                    @foreach($parentSubphases as $parentSubphase)
                    <li>
                        <div class="flex items-center">
                            <svg class="h-5 w-5 flex-shrink-0 text-gray-400" viewBox="0 0 20 20" fill="currentColor"
                                aria-hidden="true">
                                <path fill-rule="evenodd"
                                    d="M7.21 14.77a.75.75 0 01.02-1.06L11.168 10 7.23 6.29a.75.75 0 111.04-1.08l4.5 4.25a.75.75 0 010 1.08l-4.5 4.25a.75.75 0 01-1.06-.02z"
                                    clip-rule="evenodd" />
                            </svg>
                            <a href="{{ route('projects.phases.subphases.show', ['project_id'=>$project->id, 'phase_id'=>$phase->id, 'subphase_id'=>$parentSubphase['id']]) }}"
                                class="ml-4 text-xl font-medium text-gray-500 hover:text-gray-700">{{
                                $parentSubphase['name'] }}</a>
                        </div>
                    </li>
                    @endforeach
                    <li>
                        <div class="flex items-center">
                            <svg class="h-5 w-5 flex-shrink-0 text-gray-400" viewBox="0 0 20 20" fill="currentColor"
                                aria-hidden="true">
                                <path fill-rule="evenodd"
                                    d="M7.21 14.77a.75.75 0 01.02-1.06L11.168 10 7.23 6.29a.75.75 0 111.04-1.08l4.5 4.25a.75.75 0 010 1.08l-4.5 4.25a.75.75 0 01-1.06-.02z"
                                    clip-rule="evenodd" />
                            </svg>
                            <a href="{{ route('projects.phases.subphases.show', ['project_id'=>$project->id, 'phase_id'=>$phase->id, 'subphase_id'=>$subphase->id
                                ]) }}" class="ml-4 text-xl font-medium text-gray-500 hover:text-gray-700">{{
                                $subphase->name }}
                            </a>
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
                            <p class="ml-4 text-xl font-medium text-gray-800">Filter</p>
                        </div>
                    </li>
                </ol>
            </nav>
        </div>
    </x-slot>

    <div class="mx-auto max-w-7xl m-4 px-4 sm:px-6 lg:px-8">
        <div class="space-y-10 divide-y divide-gray-900/10">
            <form method="POST">
                @csrf
                <div class="space-y-12">
                    <div class="grid grid-cols-1 gap-x-8 gap-y-10 border-b border-gray-900/10 pb-12 md:grid-cols-3">
                        <div>
                            <h2 class="text-base font-semibold leading-7 text-gray-900">Filter documents by Company</h2>
                            <p class="mt-1 text-sm leading-6 text-gray-600">Please provide your company to show all the
                                documents from this company on this subphase</p>
                        </div>

                        <div class="grid max-w-2xl grid-cols-1 gap-x-6 gap-y-8 sm:grid-cols-6 md:col-span-2">
                            <div class="sm:col-span-3">
                                <label for="company_id"
                                    class="block text-sm font-medium leading-6 text-gray-900">Company Name</label>
                                <div class="flex items-center">
                                    <select id="company_id" name="company_id" required
                                        class="mt-2 flex-1 block rounded-md border-0 py-1.5 pl-3 pr-10 text-gray-900 ring-1 ring-inset ring-gray-300 focus:ring-2 focus:ring-indigo-600 sm:text-sm sm:leading-6">
                                        <option value="">Select a company</option>
                                        @foreach ($companies as $company)
                                        @if($company->id == $company_selected_id)
                                        <option value="{{ $company->id }}" selected>{{ $company->name }}</option>
                                        @else
                                        <option value="{{ $company->id }}">{{ $company->name }}</option>
                                        @endif
                                        @endforeach
                                    </select>
                                    <button type="submit"
                                        class="ml-2 rounded-md bg-indigo-600 px-3 py-2 text-sm font-semibold text-white shadow-sm hover:bg-indigo-500 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-600 mt-2">Filter</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </form>
        </div>

        <div class="mt-4 flow-root">
            <div class="-mx-4 -my-2 overflow-x-auto sm:-mx-6 lg:-mx-8">
                <div class="inline-block min-w-full py-2 align-middle sm:px-6 lg:px-8">
                    @if(isset($company_selected_id))
                    <div class="flex justify-end mb-3 ">
                        <a type="submit" href="{{ route('projects.phases.subphases.company.downloadAll', ['project_id'=>$project->id, 'phase_id'=>$phase->id, 'subphase_id'=>$subphase->id, 'company_id'=>$company_selected_id]) }}"
                            class="rounded-md bg-gray-600 px-3 py-2 text-sm font-semibold text-white shadow-sm hover:bg-gray-500 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-600 mt-2">Download
                            All Documents</a>
                    </div>
                    @endif
                    <div class="overflow-hidden bg-white shadow ring-1 ring-black ring-opacity-5 sm:rounded-lg">
                        <table class="min-w-full divide-y divide-gray-300">
                            <thead class="bg-gray-50">
                                <tr>
                                    <th scope="col"
                                        class="py-3.5 pl-4 pr-3 text-left text-sm font-semibold text-gray-900 sm:pl-6">
                                        Name</th>
                                    <th scope="col"
                                        class="py-3.5 pl-4 pr-3 text-left text-sm font-semibold text-gray-900 sm:pl-6">
                                        Size</th>
                                    <th scope="col"
                                        class="py-3.5 pl-4 pr-3 text-left text-sm font-semibold text-gray-900 sm:pl-6">
                                        Status</th>
                                    <th scope="col"
                                        class="py-3.5 pl-4 pr-3 text-left text-sm font-semibold text-gray-900 sm:pl-6">
                                        Company</th>
                                    <th scope="col"
                                        class="py-3.5 pl-4 pr-3 text-center text-sm font-semibold text-gray-900 sm:pl-6">
                                        ACTIONS</th>

                                </tr>
                            </thead>
                            @if($documents->count() == 0)
                            <tbody class="divide-y divide-gray-200 bg-white">
                                <tr>
                                    <td colspan="5"
                                        class="py-4 pl-4 pr-3 text-sm font-medium text-center text-gray-900 sm:pl-6">
                                        No documents found</td>
                                </tr>
                                @else
                                @foreach($documents as $document)
                                <tr>
                                    <td class="py-4 pl-4 pr-3 text-sm font-medium text-gray-500 sm:pl-6">
                                        {{ $document->name }}.{{ $document->extension }}
                                    </td>
                                    <td class="py-4 pl-4 pr-3 text-sm font-medium text-gray-500 sm:pl-6">
                                        {{ round($document->size / 1048576, 2) }} MB
                                    </td>
                                    @if($document->status == 'pending')
                                    <td
                                        class="py-4 pl-4 text-uppercase pr-3 text-sm font-medium text-yellow-500 sm:pl-6">
                                        @elseif($document->status == 'correct')
                                    <td
                                        class="py-4 pl-4 text-uppercase pr-3 text-sm font-medium text-green-500 sm:pl-6">
                                        @elseif($document->status == 'incorrect')
                                    <td class="py-4 pl-4 text-uppercase pr-3 text-sm font-medium text-red-500 sm:pl-6">
                                        @endif
                                        {{ strtoupper($document->status) }}
                                    </td>

                                    <td class="py-4 pl-4 pr-3 text-sm font-medium text-gray-500 sm:pl-6">
                                        @if($document->company_id == null)
                                        Admin
                                        @else
                                        {{ $document->user->name }} ({{ $document->company->name }})
                                        @endif
                                    </td>
                                    <td class="py-4 pl-3 pr-4 text-center text-sm font-medium">
                                        <div class="flex justify-center items-center">
                                            <a href="{{ route('document.show', ['document_id'=>$document->id]) }}"
                                                class="text-indigo-600 font-bold hover:text-indigo-800">Show</a>

                                            <a href="{{ route('document.download', ['document_id'=>$document->id]) }}"
                                                class="ml-3 text-green-600 font-bold hover:text-green-800">Download</a>
                                        </div>
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
</x-app-layout>
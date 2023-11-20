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
                            <p class="ml-4 text-xl font-medium text-gray-900 hover:text-gray-700">Documents</p>
                        </div>
                    </li>
                </ol>
            </nav>
        </div>
    </x-slot>

    <div class="mx-auto max-w-7xl mt-4 px-4 sm:px-6 lg:px-8">
        <div class="overflow-hidden mt-4 px-4 py-4 bg-white shadow sm:rounded-lg">
            <div class="px-4 sm:px-6 lg:px-8">
                <div class="sm:flex sm:items-center">
                    <div class="sm:flex-auto">
                        <h1 class="text-base font-semibold leading-6 text-gray-900">Documents</h1>
                        <p class="mt-2 text-sm text-gray-700">A list with all the documents have been uploaded in this
                            project.</p>
                    </div>
                </div>
                <div class="mt-8 flow-root">
                    <div class="-mx-4 -my-2 overflow-x-auto sm:-mx-6 lg:-mx-8">
                        <div class="inline-block min-w-full py-2 align-middle sm:px-6 lg:px-8">
                            <div class="overflow-hidden shadow ring-1 ring-black ring-opacity-5 sm:rounded-lg">
                                <table class="min-w-full divide-y divide-gray-300">
                                    <thead class="bg-gray-50">
                                        <tr>
                                            <th scope="col"
                                                class="py-3.5 pl-4 pr-3 text-left text-sm font-semibold text-gray-900 sm:pl-6">
                                                Name</th>
                                            <th scope="col"
                                                class="px-3 py-3.5 text-left text-sm font-semibold text-gray-900">
                                                User</th>
                                            <th scope="col"
                                                class="px-3 py-3.5 text-left text-sm font-semibold text-gray-900">
                                                Updated At
                                            </th>
                                            <th scope="col"
                                                class="px-3 py-3.5 text-left text-sm font-semibold text-gray-900">Status
                                            </th>
                                            <th scope="col"
                                                class="px-3 py-3.5 text-center text-sm font-semibold text-gray-900">
                                                Actions
                                            </th>
                                        </tr>
                                    </thead>
                                    <tbody class="divide-y divide-gray-200 bg-white">
                                        @if (count($documents) == 0)
                                        <tr>
                                            <td colspan="5"
                                                class="whitespace-nowrap py-4 pl-4 pr-3 text-sm text-center font-medium text-gray-900 sm:pl-6">
                                                No documents in this project</td>
                                        </tr>
                                        @else
                                        @foreach ($documents as $document)
                                        @if ($document->company_id != null)
                                        <tr>
                                            <td
                                                class="whitespace-nowrap py-4 pl-4 pr-3 text-sm font-medium text-gray-900 sm:pl-6">
                                                {{ $document->name }}.{{ $document->extension }}</td>
                                            <td class="whitespace-nowrap px-3 py-4 text-sm text-gray-500">{{
                                                $document->user->name }} ({{ $document->company->name }})</td>
                                            <td class="whitespace-nowrap px-3 py-4 text-sm text-gray-500">
                                                {{ $document->updated_at }}</td>
                                            @if ($document->status == 'pending')
                                            <td
                                                class="whitespace-nowrap px-3 text-sm font-medium text-yellow-500">
                                                @elseif ($document->status == 'correct')
                                                <td
                                                class="whitespace-nowrap px-3 text-sm font-medium text-green-500">
                                                @elseif ($document->status == 'incorrect')
                                                <td
                                                class="whitespace-nowrap px-3 text-sm font-medium text-red-500">
                                                @endif
                                                {{ strtoupper($document->status) }}</td>
                                            <td class="relative whitespace-nowrap px-3 text-center text-sm font-medium">
                                                <a href="{{ route('document.show', ['document_id'=>$document->id]) }}" class="text-indigo-600 hover:text-indigo-900">Show</a>
                                            </td>
                                        </tr>
                                        @endif
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
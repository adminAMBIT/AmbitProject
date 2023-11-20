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
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
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
                                <div class="overflow-hidden shadow ring-1 ring-black ring-opacity-5 sm:rounded-lg">
                                    <table class="min-w-full divide-y divide-gray-300">
                                        <thead class="bg-gray-50">
                                            <tr>
                                                <th scope="col"
                                                    class="py-3.5 pl-4 pr-3 text-left text-sm font-semibold text-gray-900 sm:pl-6">
                                                    Name</th>
                                                <th scope="col"
                                                    class="px-3 py-3.5 text-left text-sm font-semibold text-gray-900">
                                                    Project</th>
                                                <th scope="col"
                                                    class="px-3 py-3.5 text-left text-sm font-semibold text-gray-900">
                                                    User</th>
                                                <th scope="col"
                                                    class="px-3 py-3.5 text-left text-sm font-semibold text-gray-900">
                                                    Updated at</th>
                                                <th scope="col"
                                                    class="px-3 py-3.5 text-center text-sm font-semibold text-gray-900">
                                                    Actions</th>

                                            </tr>
                                        </thead>
                                        <tbody class="divide-y divide-gray-200 bg-white">
                                            @foreach ($documents as $document)
                                            <tr>
                                                <td
                                                    class="whitespace-nowrap py-4 pl-4 pr-3 text-sm font-medium text-gray-900 sm:pl-6">
                                                    {{ $document->name }}.{{ $document->extension }}</td>
                                                <td class="whitespace-nowrap px-3 py-4 text-sm text-gray-500">{{
                                                    $document->project->title }}</td>
                                                <td class="whitespace-nowrap px-3 py-4 text-sm text-gray-500">
                                                    {{ $document->user->name }} ({{ $document->company->name }})</td>
                                                <td class="whitespace-nowrap px-3 py-4 text-sm text-gray-500">{{
                                                    $document->updated_at->diffForHumans() }}
                                                </td>
                                                <td
                                                    class="relative whitespace-nowrap py-4 text-center text-sm font-medium">
                                                    <a href="{{ route('document.show', ['document_id'=>$document->id]) }}"
                                                        class="text-indigo-600 font-bold hover:text-indigo-900">Show</a>
                                                </td>
                                            </tr>
                                            @endforeach
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>
</x-app-layout>
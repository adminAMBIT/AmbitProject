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

                    <li>
                        <div class="flex items-center">
                            <svg class="h-5 w-5 flex-shrink-0 text-gray-400" viewBox="0 0 20 20" fill="currentColor"
                                aria-hidden="true">
                                <path fill-rule="evenodd"
                                    d="M7.21 14.77a.75.75 0 01.02-1.06L11.168 10 7.23 6.29a.75.75 0 111.04-1.08l4.5 4.25a.75.75 0 010 1.08l-4.5 4.25a.75.75 0 01-1.06-.02z"
                                    clip-rule="evenodd" />
                            </svg>
                            <a href="{{ route('projects.companies.documents.index', ['project_id'=>$project->id, 'company_id'=>$company->id]) }}"
                                class="ml-4 text-xl font-medium text-gray-500 hover:text-gray-700">Documents</a>
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
                            <p class="ml-4 text-xl font-medium text-gray-900">Change Status</p>
                        </div>
                    </li>
                    @else
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
                    @endif
                </ol>
            </nav>
        </div>
    </x-slot>


    <div class="mx-auto mt-4 px-4 sm:px-6 lg:px-8">
        @if(session('error'))
        <x-red-alert message="{{ session('error') }}" />
        @endif

        <div class="overflow-hidden mt-4 px-4 bg-white shadow sm:rounded-lg">
            <form method="POST">
                @csrf
                <div class="p-4 sm:px-6 lg:px-8">
                    <div class="flex justify-between items-center">
                        <div class="flex items-center">
                            <label for="status" class="text-sm font-medium text-gray-900 mr-4">Status</label>
                            <select id="status" name="status" required
                                class="rounded-md border-gray-300 shadow-sm py-1.5 pl-3 pr-10 text-gray-900 focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">
                                <option value="" selected>Select new status</option>
                                <option value="correct">Correct</option>
                                <option value="pending">Pending</option>
                                <option value="incorrect">Incorrect</option>
                            </select>
                            <button type="submit"
                                class="ml-16 rounded-md bg-indigo-600 px-3 py-2 text-sm font-semibold text-white shadow-sm hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">Change</button>
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
                                                    class="py-3.5 pl-2 text-center text-sm font-semibold text-gray-900">
                                                    <input id="selectAll" aria-describedby="comments-description"
                                                        name="documents_ids[]" type="checkbox"
                                                        class="h-4 w-4 rounded border-gray-300 text-indigo-600 focus:ring-indigo-600" />
                                                </th>
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
                                            </tr>
                                        </thead>
                                        <tbody class="divide-y divide-gray-200 bg-white">
                                            @if($documents->isEmpty())
                                            <tr>
                                                <td colspan="5"
                                                    class="py-4 text-center pl-4 pr-3 text-sm font-medium text-gray-900 sm:pl-6">
                                                    No documents found
                                                </td>
                                            </tr>
                                            @else
                                            @foreach ($documents as $document)
                                            <tr>
                                                <td class="text-center">
                                                    <input id="document_{{ $document->id }}"
                                                        aria-describedby="comments-description" name="documents_ids[]"
                                                        type="checkbox" value="{{ $document->id }}"
                                                        class="document-checkbox h-4 w-4 rounded border-gray-300 text-indigo-600 focus:ring-indigo-600" />
                                                </td>
                                                <td
                                                    class="whitespace-nowrap py-4 pl-4 pr-3 text-sm font-medium text-gray-900 sm:pl-6">
                                                    <a class="hover:underline"
                                                        href="{{ route('document.show', ['document_id'=>$document->id]) }}">{{
                                                        $document->name }}.{{ $document->extension }}</a>
                                                </td>
                                                <td
                                                    class="whitespace-nowrap py-4 pl-4 pr-3 text-sm font-medium text-gray-900 sm:pl-6">
                                                    {{ $document->subphase->name }} ({{ $document->subphase->phase->name
                                                    }})
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
            </form>
        </div>
    </div>

    <script>
        document.getElementById('selectAll').addEventListener('change', function() {
            var checkboxes = document.querySelectorAll('.document-checkbox');
            for (var checkbox of checkboxes) {
                checkbox.checked = this.checked;
            }
        });
    
        // Agregar listener a cada checkbox de clase 'document-checkbox'
        var documentCheckboxes = document.querySelectorAll('.document-checkbox');
        for (var checkbox of documentCheckboxes) {
            checkbox.addEventListener('change', function() {
                // Si algún checkbox 'document-checkbox' se desmarca, también desmarca 'selectAll'
                if (!this.checked) {
                    document.getElementById('selectAll').checked = false;
                } else {
                    // Verificar si todos los checkboxes están marcados, si es así, marcar 'selectAll'
                    var allChecked = true;
                    for (var checkbox of documentCheckboxes) {
                        if (!checkbox.checked) {
                            allChecked = false;
                            break;
                        }
                    }
                    document.getElementById('selectAll').checked = allChecked;
                }
            });
        }
    </script>
    






</x-app-layout>
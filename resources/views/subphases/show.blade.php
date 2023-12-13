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
                            <p class="ml-4 text-xl font-medium text-gray-800">{{ $subphase->name }}</p>
                        </div>
                    </li>
                </ol>
            </nav>
        </div>
    </x-slot>

    @if(session('success'))
    <x-green-alert message="{{ session('success') }}" />
    @endif

    @if(session('updated'))
    <x-green-alert message="{{ session('updated') }}" />
    @endif

    @if(session('deleted'))
    <x-green-alert message="{{ session('deleted') }}" />
    @endif

    @if(session('uploaded'))
    <x-green-alert message="{{ session('uploaded') }}" />
    @endif

    @if(session('documentDeleted'))
    <x-green-alert message="{{ session('documentDeleted') }}" />
    @endif






    @if($subphase->has_instructions == 1)
    <div class="mx-auto max-w-7xl mt-4 px-4 sm:px-6 lg:px-8">
        <div class="overflow-hidden mt-4 px-4 bg-white shadow sm:rounded-lg">
            <div class="p-4 sm:px-6 lg:px-8">
                <div class="sm:flex sm:items-center">
                    <div class="sm:flex-auto">
                        <h1 class="text-xl font-medium text-gray-500">Instructions</h1>
                        <p class="text-red-600">{!! nl2br($subphase->description) !!}</p>
                    </div>
                    @if(auth()->user()->is_admin == 1)
                    <div class="mt-4 sm:ml-16 sm:mt-0 sm:flex-none">

                        <a type="button"
                            href="{{ route('projects.phases.subphases.instruction.create', ['project_id'=>$subphase->phase->project->id, 'phase_id'=>$subphase->phase->id, 'subphase_id'=>$subphase->id])  }}"
                            class="block rounded-md bg-indigo-600 px-3 py-2 text-center text-sm font-semibold text-white shadow-sm hover:bg-indigo-500 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-600">Create
                            Instruction</a>
                    </div>
                    @endif
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
                                                class="py-3.5 pl-4 pr-3 text-left text-sm font-semibold text-gray-900 sm:pl-6">
                                                Link</th>
                                            <th scope="col"
                                                class="py-3.5 pl-4 pr-3 text-center text-sm font-semibold text-gray-900 sm:pl-6">
                                                ACTIONS</th>

                                        </tr>
                                    </thead>
                                    @if($instructions->count() == 0)
                                    <tbody class="divide-y divide-gray-200 bg-white">
                                        <tr>
                                            <td colspan="4"
                                                class="py-4 pl-4 pr-3 text-sm font-medium text-center text-gray-900 sm:pl-6">
                                                No instructions yet</td>
                                        </tr>
                                        @else
                                        @foreach($instructions as $instruction)
                                        <tr>
                                            <td class="py-4 pl-4 pr-3 text-sm font-medium text-gray-500 sm:pl-6">
                                                {{ $instruction->name }}
                                            </td>
                                            <td class="py-4 pl-4 pr-3 text-sm font-medium text-gray-500 sm:pl-6">
                                                <a href="{{ $instruction->link }}" target="_blank"
                                                    class="text-sm font-medium text-indigo-600 hover:text-indigo-500">
                                                    {{ $instruction->link }}
                                                </a>
                                            </td>

                                            <td class="py-4 pl-3 pr-4 text-center text-sm font-medium">
                                                <div class="flex justify-center items-center">
                                                    <a href="{{ $instruction->link }}" target="_blank"
                                                        class="text-green-600 font-bold hover:text-green-800">Visit</a>
                                                    @if(auth()->user()->is_admin == 1)
                                                    <a href="{{ route('projects.phases.subphases.instruction.edit', ['project_id'=>$subphase->phase->project->id, 'phase_id'=>$subphase->phase->id, 'subphase_id'=>$subphase->id, 'instruction_id'=>$instruction->id]) }}"
                                                        class="ml-2 text-indigo-600 font-bold hover:text-indigo-800">Edit</a>
                                                    @endif
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
        </div>
    </div>
    @endif

    <!-- SUBPHASES TABLE -->
    @if($subphaseChildren->count() > 0 || auth()->user()->is_admin == 1)
    <div class="mx-auto max-w-7xl mt-3 px-4 sm:px-6 lg:px-8">
        <div class="overflow-hidden mt-4 px-4 bg-white shadow sm:rounded-lg">
            <div class="p-4 sm:px-6 lg:px-8">
                <div class="sm:flex sm:items-center">
                    <div class="sm:flex-auto">
                        <h1 class="text-xl font-medium text-gray-500">Subphases</h1>
                    </div>
                    @if(auth()->user()->is_admin == 1)
                    <div class="mt-4 sm:ml-16 sm:mt-0 sm:flex-none">
                        <a type="button"
                            href="{{ route('projects.phases.subphases.create', ['project_id'=> $project->id, 'phase_id'=>$phase->id]) }}"
                            class="block rounded-md bg-indigo-600 px-3 py-2 text-center text-sm font-semibold text-white shadow-sm hover:bg-indigo-500 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-600">Create
                            Subphase</a>
                    </div>
                    @endif
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
                                            <th scope="col" class="relative py-3.5 pl-3 pr-4 sm:pr-6">
                                                <span class="sr-only">Edit</span>
                                            </th>
                                        </tr>
                                    </thead>
                                    <tbody class="divide-y divide-gray-200 bg-white">
                                        @if($subphaseChildren->count() == 0)
                                        <tr>
                                            <td colspan="3"
                                                class="py-4 pl-4 pr-3 text-sm font-medium text-center text-gray-900 sm:pl-6">
                                                No subphases found</td>
                                        </tr>
                                        @else
                                        @foreach($subphaseChildren as $childSubphase)
                                        <tr>
                                            <td class="py-4 pl-4 pr-3 text-sm font-medium text-gray-900 sm:pl-6">
                                                <a class="hover:underline"
                                                    href="{{ route('projects.phases.subphases.show', ['project_id'=>$phase->project->id, 'phase_id'=>$phase->id, 'subphase_id'=>$childSubphase->id]) }}">{{
                                                    $childSubphase->name }}</a>
                                            </td>
                                            @if(auth()->user()->is_admin == 1)
                                            <td class="py-4 pl-3 pr-4 text-right text-sm font-medium">
                                                <a href="{{ route('projects.phases.subphases.edit', ['project_id'=> $phase->project->id, 'phase_id'=>$phase->id, 'subphase_id'=>$childSubphase->id]) }}"
                                                    class="text-indigo-600 hover:text-indigo-900">Edit</a>
                                            </td>
                                            @endif
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
    @endif

    <!-- DOCUMENTS TABLE -->
    @if($subphase->has_documents == 1)
    <div class="mx-auto max-w-7xl mt-4 px-4 sm:px-6 lg:px-8">
        <div class="overflow-hidden mt-4 px-4 bg-white shadow sm:rounded-lg">
            <div class="p-4 sm:px-6 lg:px-8">
                <div class="sm:flex sm:items-center">
                    <div class="sm:flex-auto">
                        <h1 class="text-xl font-medium text-gray-500">Documents</h1>
                    </div>
                    <div class="mt-4 sm:ml-16 sm:mt-0 sm:flex-none flex gap-4">
                        @if(auth()->user()->is_admin == 1 && $documents->count() > 0)
                        <a href="{{ route('projects.phases.subphases.companies.index',['project_id'=>$subphase->phase->project->id, 'phase_id'=>$subphase->phase, 'subphase_id'=>$subphase->id]) }}"
                           class="block rounded-md bg-gray-600 px-3 py-2 text-center text-sm font-semibold text-white shadow-sm hover:bg-gray-500 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-gray-600">
                            Filter by Company
                        </a>
                        @endif
                        <a href="{{ route('projects.phases.subphases.document.create', ['project_id'=>$subphase->phase->project->id, 'phase_id'=>$subphase->phase, 'subphase_id'=>$subphase->id]) }}"
                           class="block rounded-md bg-indigo-600 px-3 py-2 text-center text-sm font-semibold text-white shadow-sm hover:bg-indigo-500 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-600">
                            Upload Documents
                        </a>
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
                                            <td
                                                class="py-4 pl-4 text-uppercase pr-3 text-sm font-medium text-red-500 sm:pl-6">
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
        </div>
    </div>
    @endif
</x-app-layout>
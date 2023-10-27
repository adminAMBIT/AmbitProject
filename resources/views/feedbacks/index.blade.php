<x-app-layout>
    <x-slot name="header">
        <div class="flex justify-between items-center">
            <nav class="flex" aria-label="Breadcrumb">
                <ol role="list" class="flex items-center space-x-4">
                    <li>
                        <div class="flex items-center">
                            <a href="{{ route('document.show', ['document_id'=>$document->id]) }}"
                                class="ml-4 text-xl font-medium text-gray-500 hover:text-gray-700">{{
                                $document->name }}.{{ $document->extension }}</a>
                        </div>
                    </li>
                </ol>
            </nav>
        </div>
    </x-slot>

    @if(session('created'))
    <x-green-alert message="{{ session('created') }}" />
    @endif

    <div class="mx-auto max-w-7xl mt-3 px-4 sm:px-6 lg:px-8">
        <div class="overflow-hidden mt-4 px-4 bg-white shadow sm:rounded-lg">
            <div class="p-4 sm:px-6 lg:px-8">
                <div class="sm:flex sm:items-center">
                    <div class="sm:flex-auto">
                        <h1 class="text-xl font-medium text-gray-500">Feedbacks</h1>
                    </div>
                    @if(auth()->user()->is_admin == 1)
                    <div class="mt-4 sm:ml-16 sm:mt-0 sm:flex-none">
                        <a href="{{ route('feedbacks.create', ['document_id'=>$document->id]) }}"
                            class="block rounded-md bg-indigo-600 px-3 py-2 text-center text-sm font-semibold text-white shadow-sm hover:bg-indigo-500 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-600">Create
                            Feedback</a>
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
                                                class="py-3.5 pl-4 pr-3 text-left text-sm font-semibold text-center text-gray-900 sm:pl-6">
                                                Actions</th>
                                            </th>
                                        </tr>
                                    </thead>
                                    <tbody class="divide-y divide-gray-200 bg-white">
                                        @if(count($feedbacks) == 0)
                                        <tr>
                                            <td colspan="3"
                                                class="py-4 pl-4 pr-3 text-sm font-medium text-center text-gray-900 sm:pl-6">
                                                No feedbacks found</td>
                                        </tr>
                                        @else
                                        @foreach($feedbacks as $feedback)
                                        <tr>
                                            <td
                                                class="py-4 pl-4 pr-3 text-sm font-medium text-gray-900 sm:pl-6 truncate-text">
                                                <a class="hover:underline" href="#">{{ $feedback->description }}</a>
                                            </td>
                                            <td class="py-4 pl-3 pr-4 text-center text-sm font-medium">
                                                <a href="{{ route('document.show', ['document_id'=>$document->id]) }}"
                                                    class="text-indigo-600 font-bold hover:text-indigo-800">Edit</a>
                                                <a href="{{ route('document.download', ['document_id'=>$document->id]) }}"
                                                    class="text-red-600 font-bold hover:text-red-800">Delete</a>
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
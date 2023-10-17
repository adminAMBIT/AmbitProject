<x-app-layout>
    <x-slot name="header">
        <div class="flex justify-between items-center">
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                <a class="hover:underline" href="{{ route('projects.show', ['id'=>$project->id]) }}">{{ $project->title }}</a> - ASDASD
            </h2>
        </div>
    </x-slot>

    <div class="mx-auto max-w-7xl mt-4 px-4 sm:px-6 lg:px-8">
        <div class="overflow-hidden mt-4 px-4 bg-white shadow sm:rounded-lg">
            <div class="p-4 sm:px-6 lg:px-8">
                <div class="sm:flex sm:items-center">
                    <div class="sm:flex-auto">
                        <!-- <h1 class="text-base font-semibold leading-6 text-gray-900">Representant</h1>
                        <p class="mt-2 text-sm text-gray-700">The comapny's legal representant </p> -->
                    </div>
                    <div class="mt-4 sm:ml-16 sm:mt-0 sm:flex-none">
                        <a type="button" href="{{ route('projects.phases.subphases.create', ['project_id'=> $project->id, 'phase_id'=>$phase->id]) }}"
                            class="block rounded-md bg-indigo-600 px-3 py-2 text-center text-sm font-semibold text-white shadow-sm hover:bg-indigo-500 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-600">Create
                            Subphase</a>
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
                                        @foreach($subphaseChildren as $subphase)
                                        <tr>
                                            <td class="py-4 pl-4 pr-3 text-sm font-medium text-gray-900 sm:pl-6">
                                                <a class="hover:underline" href="{{ route('projects.phases.subphases.show', ['project_id'=>$phase->project->id, 'phase_id'=>$phase->id, 'subphase_id'=>$subphase->id]) }}">{{ $subphase->name }}</a></td>
                                            <td class="py-4 pl-3 pr-4 text-right text-sm font-medium">
                                                <a href="{{ route('projects.phases.subphases.edit', ['project_id'=> $phase->project->id, 'phase_id'=>$phase->id, 'subphase_id'=>$subphase->id]) }}"
                                                    class="text-indigo-600 hover:text-indigo-900">Edit</a>
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
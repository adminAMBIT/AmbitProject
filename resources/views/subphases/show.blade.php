<x-app-layout>
    <x-slot name="header">
        <div class="flex justify-between items-center">
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                <a class="hover:underline" href="{{ route('projects.show', ['id'=>$subphase->phase->project->id]) }}">{{
                    $subphase->phase->project->title }}</a>
                - <a class="hover:underline" href="{{ route('projects.phases.show', ['project_id'=>$subphase->phase->project->id, 'phase_id'=>$subphase->phase->id]) }}">{{ $subphase->phase->name }}</a>
                - {{ $subphase->name }}
            </h2>
        </div>
    </x-slot>

    <div class="mx-auto max-w-7xl mt-4 px-4 sm:px-6 lg:px-8">
        <section aria-labelledby="phase-title">
            <div class="bg-white shadow sm:overflow-hidden sm:rounded-lg">
                <div class="divide-y divide-gray-200">
                    <div class="px-4 py-5 sm:px-6 flex justify-between items-center">
                        <h2 id="notes-title" class="text-lg font-medium text-gray-900">Subphases</h2>
                        @if(auth()->user()->is_admin)
                        <a type="submit"
                            href="{{ route('projects.phases.subphases.create', ['project_id'=>$subphase->phase->project->id, 'phase_id'=>$subphase->phase->id]) }}"
                            class="inline-flex items-center justify-center rounded-md bg-blue-600 px-3 py-2 text-sm font-semibold text-white shadow-sm hover:bg-blue-500 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-blue-600">Create
                            Subphase</a>
                        @endif
                    </div>
                    <div class="px-4 py-6 sm:px-6">
                        <div class="flow-root">
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
                                                    </th>
                                                </tr>
                                            </thead>
                                            <tbody class="divide-y divide-gray-200 bg-white">
                                                <tr>
                                                    <td
                                                        class="text-center whitespace-nowrap py-4 pl-4 pr-3 text-sm font-medium text-gray-900 sm:pl-6">
                                                        No subphases in this phase</td>
                                                </tr>
                                                

                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </section>
    </div>
</x-app-layout>
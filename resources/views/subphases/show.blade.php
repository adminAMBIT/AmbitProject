<x-app-layout>
    <x-slot name="header">
        <div class="flex justify-between items-center">
            <nav class="flex" aria-label="Breadcrumb">
                <ol role="list" class="flex items-center space-x-4">
                    <li>
                        <div class="flex items-center">
                          <a href="{{ route('projects.show', ['id'=>$project->id]) }}" class="ml-4 text-xl font-medium text-gray-500 hover:text-gray-700">{{ $project->title }}</a>
                        </div>
                      </li>

                      <li>
                        <div class="flex items-center">
                          <svg class="h-5 w-5 flex-shrink-0 text-gray-400" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
                            <path fill-rule="evenodd" d="M7.21 14.77a.75.75 0 01.02-1.06L11.168 10 7.23 6.29a.75.75 0 111.04-1.08l4.5 4.25a.75.75 0 010 1.08l-4.5 4.25a.75.75 0 01-1.06-.02z" clip-rule="evenodd" />
                          </svg>
                          <a href="{{ route('projects.phases.show', ['project_id'=>$project->id, 'phase_id'=>$phase->id]) }}" class="ml-4 text-xl font-medium text-gray-500 hover:text-gray-700">{{ $phase->name }}</a>
                        </div>
                      </li>
                    
                  @foreach($parentSubphases as $parentSubphase)
                  <li>
                    <div class="flex items-center">
                      <svg class="h-5 w-5 flex-shrink-0 text-gray-400" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
                        <path fill-rule="evenodd" d="M7.21 14.77a.75.75 0 01.02-1.06L11.168 10 7.23 6.29a.75.75 0 111.04-1.08l4.5 4.25a.75.75 0 010 1.08l-4.5 4.25a.75.75 0 01-1.06-.02z" clip-rule="evenodd" />
                      </svg>
                      <a href="{{ route('projects.phases.subphases.show', ['project_id'=>$project->id, 'phase_id'=>$phase->id, 'subphase_id'=>$parentSubphase['id']]) }}" class="ml-4 text-xl font-medium text-gray-500 hover:text-gray-700">{{ $parentSubphase['name'] }}</a>
                    </div>
                  </li>
                  @endforeach
                </ol>
              </nav>
        </div>
    </x-slot>

    <div class="mx-auto max-w-7xl mt-4 px-4 sm:px-6 lg:px-8">
        <div class="overflow-hidden mt-4 px-4 bg-white shadow sm:rounded-lg">
            <div class="p-4 sm:px-6 lg:px-8">
                <div class="sm:flex sm:items-center">
                    <div class="sm:flex-auto">
                        <h1 class="text-xl font-medium text-gray-500">{{ $subphase->name }}</h1>
                        <!-- <p class="mt-2 text-sm text-gray-700">The comapny's legal representant </p> -->
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
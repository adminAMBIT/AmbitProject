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
                </ol>
            </nav>
        </div>
    </x-slot>

    @if(session('updated'))
    <x-green-alert message="{{ session('updated') }}" />
    @endif

    @if(session('created'))
    <x-green-alert message="{{ session('created') }}" />
    @endif

    @if(session('phaseUpdated'))
    <x-green-alert message="{{ session('phaseUpdated') }}" />
    @endif

    @if(session('deleted'))
    <x-green-alert message="{{ session('deleted') }}" />
    @endif

    <div class="min-h-full">


        <!-- Page header -->

        <div
            class="mx-auto mt-5 grid max-w-3xl grid-cols-1 gap-6 sm:px-6 lg:max-w-7xl lg:grid-flow-col-dense lg:grid-cols-3">
            <div class="space-y-6 lg:col-span-2 lg:col-start-1">
                <!-- Description list-->
                <section aria-labelledby="applicant-information-title">
                    <div class="bg-white shadow sm:rounded-lg">
                        <div class="px-4 py-5 sm:px-6 flex justify-between items-center">
                            <h2 id="applicant-information-title" class="text-lg font-medium leading-6 text-gray-900">
                                Project Information</h2>
                            @if(auth()->user()->is_admin)
                            <a type="submit" href="{{ route('projects.edit', ['id' => $project->id]) }}"
                                class="inline-flex items-center justify-center rounded-md bg-blue-600 px-3 py-2 text-sm font-semibold text-white shadow-sm hover:bg-blue-500 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-blue-600">Edit
                                Project</a>
                            @endif

                        </div>
                        <div class="border-t border-gray-200 px-4 py-5 sm:px-6">
                            <dl class="grid grid-cols-1 gap-x-4 gap-y-8 sm:grid-cols-2">
                                <!-- <div class="sm:col-span-1">
                    <dt class="text-sm font-medium text-gray-500">Application for</dt>
                    <dd class="mt-1 text-sm text-gray-900">Backend Developer</dd>
                  </div>
                  <div class="sm:col-span-1">
                    <dt class="text-sm font-medium text-gray-500">Email address</dt>
                    <dd class="mt-1 text-sm text-gray-900">ricardocooper@example.com</dd>
                  </div>
                  <div class="sm:col-span-1">
                    <dt class="text-sm font-medium text-gray-500">Salary expectation</dt>
                    <dd class="mt-1 text-sm text-gray-900">$120,000</dd>
                  </div>
                  <div class="sm:col-span-1">
                    <dt class="text-sm font-medium text-gray-500">Phone</dt>
                    <dd class="mt-1 text-sm text-gray-900">+1 555-555-5555</dd>
                  </div> -->
                                <div class="sm:col-span-2">
                                    <dt class="text-sm font-medium text-gray-500">About</dt>
                                    <dd class="mt-1 text-sm text-gray-900">{{ $project->description }}</dd>
                                </div>
                            </dl>
                        </div>
                        <!-- <div>
                                <a href="#"
                                    class="block bg-gray-50 px-4 py-4 text-center text-sm font-medium text-gray-500 hover:text-gray-700 sm:rounded-b-lg">Read
                                    full application</a>
                            </div> -->
                    </div>
                </section>

                <!-- PHASES -->
                <section aria-labelledby="phase-title">
                    <div class="bg-white shadow sm:overflow-hidden sm:rounded-lg">
                        <div class="divide-y divide-gray-200">
                            <div class="px-4 py-5 sm:px-6 flex justify-between items-center">
                                <h2 id="notes-title" class="text-lg font-medium text-gray-900">Phases</h2>
                                @if(auth()->user()->is_admin)
                                <a type="submit"
                                    href="{{ route('projects.phases.create', ['project_id' => $project->id]) }}"
                                    class="inline-flex items-center justify-center rounded-md bg-blue-600 px-3 py-2 text-sm font-semibold text-white shadow-sm hover:bg-blue-500 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-blue-600">Create
                                    Phase</a>
                                @endif
                            </div>
                            <div class="px-4 py-6 sm:px-6">
                                <div class="flow-root">
                                    <div class="-mx-4 -my-2 overflow-x-auto sm:-mx-6 lg:-mx-8">
                                        <div class="inline-block min-w-full py-2 align-middle sm:px-6 lg:px-8">
                                            <div
                                                class="overflow-hidden shadow ring-1 ring-black ring-opacity-5 sm:rounded-lg">
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
                                                        @if (count($project->phases) == 0)
                                                        <tr>
                                                            <td
                                                                class="text-center whitespace-nowrap py-4 pl-4 pr-3 text-sm font-medium text-gray-900 sm:pl-6">
                                                                No phases in this project</td>
                                                        </tr>
                                                        @else

                                                        @foreach ($project->phases as $phase)
                                                        <tr class="group hover:bg-gray-100">
                                                            <td
                                                                class="whitespace-nowrap py-4 pl-4 pr-3 text-sm font-medium text-gray-900 sm:pl-6">
                                                                <a class="hover:underline"
                                                                    href="{{ route('projects.phases.show', ['project_id'=>$project->id,'phase_id'=>$phase->id]) }}">
                                                                    {{ $phase->name }} <span class="text-gray-500">({{
                                                                        $phase->is_private ? 'Private' : 'Public'
                                                                        }})</span>
                                                                </a>
                                                            </td>
                                                            <td
                                                            @if(auth()->user()->is_admin)
                                                            
                                                                class="relative whitespace-nowrap py-4 pl-3 pr-4 text-right text-sm font-medium sm:pr-6">
                                                                <a href="{{ route('projects.phases.edit', ['project_id' => $project->id, 'phase_id' => $phase->id]) }}"
                                                                    class="text-indigo-600 hover:text-indigo-900">Edit</a>
                                                            
                                                            @endif
                                                        </td>
                                                        </tr>
                                                        @endforeach
                                                        @endif
                                                        <!-- More people... -->
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

            <!-- ASIDE -->
            <section aria-labelledby="timeline-title" class="lg:col-span-1 lg:col-start-3">
                <!-- COMPANIES -->
                <div class="bg-white px-4 py-7 shadow sm:rounded-lg sm:px-6">
                    <h2 id="timeline-title" class="text-lg font-medium text-gray-900">Companies - {{
                        $project->companies->count() }}</h2>
                    <div class="m-4 flow-root">
                        <ul role="list" class="-mb-8">
                            @if (count($project->companies) == 0)
                            <div class="relative pb-4">
                                <div class="relative flex space-x-3">
                                    <div class="flex min-w-0 flex-1 justify-between space-x-4 pt-1.5 items-center">
                                        <div class="text-center w-full">
                                            <p class="text-sm text-gray-500">No companies in this project</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            @else
                            @foreach ($project->companies as $company)
                            <li>
                                <div class="relative pb-4">
                                    <div class="relative flex space-x-3">
                                        <div>
                                            <span
                                                class="h-8 w-8 rounded-full bg-gray-400 flex items-center justify-center ring-8 ring-white">
                                                <svg class="h-5 w-5 text-white" viewBox="0 0 20 20" fill="currentColor"
                                                    aria-hidden="true">
                                                    <path
                                                        d="M10 8a3 3 0 100-6 3 3 0 000 6zM3.465 14.493a1.23 1.23 0 00.41 1.412A9.957 9.957 0 0010 18c2.31 0 4.438-.784 6.131-2.1.43-.333.604-.903.408-1.41a7.002 7.002 0 00-13.074.003z" />
                                                </svg>
                                            </span>
                                        </div>
                                        <div class="flex min-w-0 flex-1 justify-between space-x-4 pt-1.5">
                                            <div>
                                                <p class="text-sm text-gray-500">{{ $company->name }}</p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </li>
                            @endforeach
                            @endif
                        </ul>
                    </div>
                    @if(auth()->user()->is_admin)
                    <div class="mt-7 mb-3 flex flex-col justify-stretch">
                        <a href="{{ route('projects.manageCompanies.index', ['project_id' => $project->id]) }}"
                            type="button"
                            class="inline-flex items-center justify-center rounded-md bg-blue-600 px-3 py-2 text-sm font-semibold text-white shadow-sm hover:bg-blue-500 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-blue-600">Manage
                            Companies</a>
                    </div>
                    @endif
                </div>
            </section>
            
        </div>
    </div>

</x-app-layout>
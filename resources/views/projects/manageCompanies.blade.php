<x-app-layout>
    <x-slot name="header">
        <div class="flex justify-between items-center">
            <nav class="flex" aria-label="Breadcrumb">
                <ol role="list" class="flex items-center space-x-4">
                    <li>
                        <div class="flex items-center">
                            <a href="{{ route('projects.show', ['id'=>$project->id]) }}"
                                class="ml-4 text-xl font-medium text-gray-500 hover:text-gray-700">{{ $project->title }}</a>
                        </div>
                    </li>

                    <li>
                        <div class="flex items-center">
                          <svg class="h-5 w-5 flex-shrink-0 text-gray-400" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
                            <path fill-rule="evenodd" d="M7.21 14.77a.75.75 0 01.02-1.06L11.168 10 7.23 6.29a.75.75 0 111.04-1.08l4.5 4.25a.75.75 0 010 1.08l-4.5 4.25a.75.75 0 01-1.06-.02z" clip-rule="evenodd" />
                          </svg>
                          <p class="ml-4 text-xl font-medium text-gray-500">Manage companies</p>
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
                            <h2 class="text-base font-semibold leading-7 text-gray-900">Add Company</h2>
                            <p class="mt-1 text-sm leading-6 text-gray-600">Please provide your company information
                                below.</p>
                        </div>

                        <div class="grid max-w-2xl grid-cols-1 gap-x-6 gap-y-8 sm:grid-cols-6 md:col-span-2">
                            <div class="sm:col-span-3">
                                <label for="company_id"
                                    class="block text-sm font-medium leading-6 text-gray-900">Company Name</label>
                                <div class="flex items-center"> <!-- Usamos flex para alinear elementos en línea -->
                                    <select id="company_id" name="company_id"
                                        class="mt-2 flex-1 block rounded-md border-0 py-1.5 pl-3 pr-10 text-gray-900 ring-1 ring-inset ring-gray-300 focus:ring-2 focus:ring-indigo-600 sm:text-sm sm:leading-6">
                                        @foreach ($companies as $company)
                                        <option value="{{ $company->id }}">{{ $company->name }}</option>
                                        @endforeach
                                    </select>
                                    <button type="submit"
                                        href="{{ route('projects.manageCompanies.store',['project_id'=>$project->id]) }}"
                                        class="ml-2 rounded-md bg-indigo-600 px-3 py-2 text-sm font-semibold text-white shadow-sm hover:bg-indigo-500 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-600 mt-2">Add</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </form>

        </div>

        <div class="px-4 sm:px-6 lg:px-8">

            <div class="-mx-4 mt-10 ring-1 ring-gray-300 sm:mx-0 sm:rounded-lg">
                <table class="min-w-full divide-y divide-gray-300">
                    <thead class="bg-white">
                        <tr>
                            <th scope="col"
                                class="py-3.5 pl-4 pr-3 text-left text-sm font-semibold text-gray-900 sm:pl-6">Company
                                Name</th>
                            <th scope="col"
                                class="py-3.5 pl-4 pr-3 text-left text-sm font-semibold text-gray-900 sm:pl-6"></th>
                        </tr>
                    </thead>
                    <tbody>
                        @if (count($project->companies) == 0)
                        <tr>
                            <td class="relative py-4 pl-4 pr-3 text-sm sm:pl-6">
                                <div class="font-medium text-center text-gray-900">No companies in this project</div>
                            </td>
                            <td></td>
                        </tr>
                        @else
                        @foreach ($project->companies as $company)
                        <tr>
                            <td class="relative py-4 pl-4 pr-3 text-sm sm:pl-6">
                                <a class="font-medium text-gray-900 hover:underline" href="{{ route('companies.show', ['id'=>$company->id]) }}">{{ $company->name }}</a>
                            </td>
                            <td class="relative py-3.5 pl-3 pr-4 text-right text-sm font-medium sm:pr-6">
                                <form method="POST"
                                    action="{{ route('projects.manageCompanies.destroy', ['project_id'=>$project->id, 'company_id'=>$company->id]) }}">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit"
                                        class="inline-flex items-center rounded-md bg-white px-2.5 py-1.5 text-sm font-semibold text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 hover:bg-gray-50 disabled:cursor-not-allowed disabled:opacity-30 disabled:hover:bg-white">Delete</button>
                                </form>
                            </td>
                        </tr>
                        @endforeach
                        @endif
                    </tbody>
                </table>
            </div>
        </div>

    </div>
</x-app-layout>
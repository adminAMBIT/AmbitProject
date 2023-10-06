<x-app-layout>

    <x-slot name="header">
        <div class="flex justify-between items-center">
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                <a class="hover:underline" href="{{ route('companies.show',['id'=>$contact->company->id]) }}">{{ $contact->company->name }}</a> - {{ $contact->name }} - Contact
            </h2>
        </div>
    </x-slot>

    <div class="mx-auto max-w-7xl mt-4 px-4 sm:px-6 lg:px-8">
        <!-- GENERAL INFORMATION -->
        <div class="overflow-hidden bg-white shadow sm:rounded-lg">
            <div class="px-4 py-6 sm:px-6 flex justify-between items-center">
                <div>
                    <h3 class="text-base font-semibold leading-7 text-gray-900">Contact Information</h3>
                    <p class="mt-1 max-w-2xl text-sm leading-6 text-gray-500">Personal details and application.</p>
                </div>
                <div>
                    <a type="button" href="{{ route('contacts.edit',['id'=>$contact->id]) }}"
                        class="rounded-md bg-indigo-600 px-3 py-2 text-sm font-semibold text-white shadow-sm hover:bg-indigo-500 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-600">Edit
                        Contact</a>
                </div>
            </div>
            <div class="border-t border-gray-100">
                <dl class="divide-y divide-gray-100">
                    <div class="px-4 py-6 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
                        <dt class="text-sm font-medium text-gray-900">Name</dt>
                        <dd class="mt-1 text-sm leading-6 text-gray-700 sm:col-span-2 sm:mt-0">{{ $contact->name }}</dd>
                    </div>
                    <div class="px-4 py-6 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
                        <dt class="text-sm font-medium text-gray-900">NIF</dt>
                        <dd class="mt-1 text-sm leading-6 text-gray-700 sm:col-span-2 sm:mt-0">{{ $contact->nif }}</dd>
                    </div>
                    <div class="px-4 py-6 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
                        <dt class="text-sm font-medium text-gray-900">Email address</dt>
                        <dd class="mt-1 text-sm leading-6 text-gray-700 sm:col-span-2 sm:mt-0">{{ $contact->email }}
                        </dd>
                    </div>
                    <div class="px-4 py-6 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
                        <dt class="text-sm font-medium text-gray-900">Phone</dt>
                        <dd class="mt-1 text-sm leading-6 text-gray-700 sm:col-span-2 sm:mt-0">{{ $contact->phone }}
                        </dd>
                    </div>
                    <div class="px-4 py-6 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
                        <dt class="text-sm font-medium text-gray-900">User Type</dt>
                        <dd class="mt-1 text-sm leading-6 text-gray-700 sm:col-span-2 sm:mt-0">{{ $contact->userType->name }}
                        </dd>
                    </div>
                </dl>
            </div>
        </div>
    </div>
</x-app-layout>
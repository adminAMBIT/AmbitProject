<x-app-layout>

    <x-slot name="header">
        <div class="flex justify-between items-center">
            <nav class="flex" aria-label="Breadcrumb">
                <ol role="list" class="flex items-center space-x-4">
                    <li>
                        <div class="flex items-center">
                            <a href="{{ route('companies.show',['id'=>$contact->company->id]) }}"
                                class="ml-4 text-xl font-medium text-gray-500 hover:text-gray-700">{{
                                $contact->company->name }}</a>
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
                            <p class="ml-4 text-xl font-medium text-gray-500">{{ $contact->name }} - Edit Contact</p>
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
                            <h2 class="text-base font-semibold leading-7 text-gray-900">Contact Information</h2>
                            <p class="mt-1 text-sm leading-6 text-gray-600">Please provide the contact information.
                            </p>
                        </div>

                        <div class="grid max-w-2xl grid-cols-1 gap-x-6 gap-y-8 sm:grid-cols-6 md:col-span-2">
                            <div class="sm:col-span-3">
                                <label for="name" class="block text-sm font-medium leading-6 text-gray-900">Name *</label>
                                <div class="mt-2">
                                    <input type="text" name="name" id="name" autocomplete="given-name" required
                                        value="{{ old('name', $contact->name) }}"
                                        class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6">
                                    @error('name')
                                    <div class="text-red-600">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>

                            <div class="sm:col-span-3">
                                <label for="nif" class="block text-sm font-medium leading-6 text-gray-900">NIF</label>
                                <div class="mt-2">
                                    <input type="text" name="nif" id="nif" autocomplete="family-name"
                                        value="{{ old('nif', $contact->nif) }}"
                                        class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6">
                                    @error('nif')
                                    <div class="text-red-600">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>

                            <div class="sm:col-span-4">
                                <label for="email" class="block text-sm font-medium leading-6 text-gray-900">Email *
                                </label>
                                <div class="mt-2">
                                    <input id="email" name="email" type="email" autocomplete="email" required
                                        value="{{ old('email', $contact->email) }}" value="{{ old('email') }}"
                                        class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6">
                                    @error('email')
                                    <div class="text-red-600">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>

                            <div class="sm:col-span-2">
                                <label for="phone" class="block text-sm font-medium leading-6 text-gray-900">Phone *
                                </label>
                                <div class="mt-2">
                                    <input id="phone" name="phone" type="text" required
                                        value="{{ old('phone', $contact->phone) }}"
                                        class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6">
                                </div>
                            </div>

                            <div class="sm:col-span-2">
                                <label for="user_type_id" class="block text-sm font-medium leading-6 text-gray-900">User
                                    Type
                                </label>
                                <select id="user_type_id" name="user_type_id"
                                    class="mt-2 block w-full rounded-md border-0 py-1.5 pl-3 pr-10 text-gray-900 ring-1 ring-inset ring-gray-300 focus:ring-2 focus:ring-indigo-600 sm:text-sm sm:leading-6">
                                    @foreach($userTypes as $user_type)
                                    @if($user_type->id != 1)
                                    <option value="{{ $user_type->id }}" {{ $user_type->id == $contact->user_type_id ?
                                        'selected' : '' }}>
                                        {{ $user_type->name }}</option>

                                    @endif
                                    @endforeach
                                </select>
                                @error('user_type')
                                <div class="text-red-600">{{ $message }}</div>
                                @enderror
                                <p class="mt-5 text-sm leading-6 text-gray-600">(*) Required fields</p>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="mt-6 flex items-center justify-end gap-x-6">
                    <a type="button" href="{{ route('companies.show',['id'=> $contact->company->id]) }}"
                        class="text-sm font-semibold leading-6 text-gray-900">Cancel</a>
                    <button type="submit"
                        class="rounded-md bg-indigo-600 px-3 py-2 text-sm font-semibold text-white shadow-sm hover:bg-indigo-500 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-600">Save
                        Contact</button>
                </div>

            </form>

            <form method="POST" action="{{ route('contacts.change-passwd', ['contact_id'=>$contact->id]) }}">
                @csrf
                <div class="space-y-12 mt-5">
                    <div class="grid grid-cols-1 gap-x-8 gap-y-10 border-b border-gray-900/10 pb-12 md:grid-cols-3">
                        <div>
                            <h2 class="text-base font-semibold leading-7 text-gray-900">Password Reset</h2>
                            <p class="mt-1 text-sm leading-6 text-gray-600">Change the contact's password.</p>
                        </div>

                        <div class="max-w-2xl md:col-span-2">
                            <div class="grid grid-cols-1 gap-x-6 gap-y-8 sm:grid-cols-6">
                                <div class="sm:col-span-3">
                                    <label for="new-password"
                                        class="block text-sm font-medium leading-6 text-gray-900">New Password</label>
                                    <div class="mt-2">
                                        <input type="password" name="new-password" id="new-password" required value=""
                                            class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6">
                                        @error('new-password')
                                        <div class="text-red-600">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>

                                <div class="sm:col-span-3">
                                    <label for="confirm-new-password"
                                        class="block text-sm font-medium leading-6 text-gray-900">Confirm New
                                        Password</label>
                                    <div class="mt-2">
                                        <input type="password" name="confirm-new-password" id="confirm-new-password"
                                            required
                                            class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6">
                                        @error('confirm-new-password')
                                        <div class="text-red-600">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>
                            </div>

                            <div class="mt-6 flex justify-end">
                                <button type="submit"
                                    class="rounded-md bg-indigo-600 px-4 py-2 text-sm font-semibold text-white shadow-sm hover:bg-indigo-500 focus:outline-none focus:ring-2 focus:ring-indigo-600 focus:ring-offset-2">Change
                                    Password</button>
                            </div>
                        </div>
                    </div>
                </div>
            </form>


        </div>
        <form method="POST" action="{{ route('contacts.destroy', $contact->id) }}">
            @csrf
            @method('DELETE')
            <div class="mt-6 flex items-center">
                <button type="submit" onclick="return confirm('Are you sure you want to delete this contact?')"
                    class="rounded-md bg-red-600 px-3 py-2 text-sm font-semibold text-white shadow-sm hover:bg-red-500 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-red-600">Delete
                    Contact</button>
            </div>
        </form>
</x-app-layout>
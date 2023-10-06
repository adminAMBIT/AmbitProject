<x-app-layout>

    <x-slot name="header">
        <div class="flex justify-between items-center">
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                {{ $contact->company->name }} - Edit Contact
            </h2>
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
                            <p class="mt-1 text-sm leading-6 text-gray-600">Please provide the representant information.
                            </p>
                        </div>

                        <div class="grid max-w-2xl grid-cols-1 gap-x-6 gap-y-8 sm:grid-cols-6 md:col-span-2">
                            <div class="sm:col-span-3">
                                <label for="name" class="block text-sm font-medium leading-6 text-gray-900">Name</label>
                                <div class="mt-2">
                                    <input type="text" name="name" id="name" autocomplete="given-name" required
                                        value="{{ old('name', $contact->name) }}" value="{{ old('name') }}"
                                        class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6">
                                    @error('name')
                                    <div class="text-red-600">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>

                            <div class="sm:col-span-3">
                                <label for="nif" class="block text-sm font-medium leading-6 text-gray-900">NIF</label>
                                <div class="mt-2">
                                    <input type="text" name="nif" id="nif" autocomplete="family-name" required
                                        value="{{ old('nif', $contact->nif) }}" value="{{ old('nif') }}"
                                        class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6">
                                    @error('nif')
                                    <div class="text-red-600">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>

                            <div class="sm:col-span-4">
                                <label for="email" class="block text-sm font-medium leading-6 text-gray-900">Email
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
                                <label for="phone" class="block text-sm font-medium leading-6 text-gray-900">Phone
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
        </div>
        <form method="POST" action="{{ route('contacts.destroy', $contact->id) }}">
            @csrf
            @method('DELETE')
            <div class="mt-6 flex items-center">
                <button type="submit"
                    class="rounded-md bg-red-600 px-3 py-2 text-sm font-semibold text-white shadow-sm hover:bg-red-500 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-red-600">Delete
                    Contact</button>
            </div>
        </form>
</x-app-layout>
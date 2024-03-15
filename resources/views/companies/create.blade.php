<x-app-layout>

    <x-slot name="header">
        <div class="flex justify-between items-center">
            <nav class="flex" aria-label="Breadcrumb">
                <ol role="list" class="flex items-center space-x-4">
                    <li>
                        <div class="flex items-center">
                            <a href="{{ route('companies.index')}}"
                                class="ml-4 text-xl font-medium text-gray-500 hover:text-gray-700">COMPANIES</a>
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
                            <p class="ml-4 text-xl font-medium text-gray-500">Create Contact</p>
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
                            <h2 class="text-base font-semibold leading-7 text-gray-900">Company Information</h2>
                            <p class="mt-1 text-sm leading-6 text-gray-600">Please provide your company information
                                below.</p>
                        </div>

                        <div class="grid max-w-2xl grid-cols-1 gap-x-6 gap-y-8 sm:grid-cols-6 md:col-span-2">
                            <div class="sm:col-span-3">
                                <label for="name" class="block text-sm font-medium leading-6 text-gray-900">Company
                                    name *</label>
                                <div class="mt-2">
                                    <input type="text" name="name" id="name" autocomplete="given-name" required
                                        value="{{ old('name') }}"
                                        class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6">
                                    @error('name')
                                    <div class="text-red-600">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>

                            <div class="sm:col-span-3">
                                <label for="cif" class="block text-sm font-medium leading-6 text-gray-900">CIF *</label>
                                <div class="mt-2">
                                    <input type="text" name="cif" id="cif" autocomplete="family-name" required
                                        value="{{ old('cif') }}"
                                        class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6">
                                    @error('cif')
                                    <div class="text-red-600">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>

                            <div class="sm:col-span-4">
                                <label for="email" class="block text-sm font-medium leading-6 text-gray-900">Email
                                    address *</label>
                                <div class="mt-2">
                                    <input id="email" name="email" type="email" autocomplete="email" required
                                        value="{{ old('email') }}"
                                        class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6">
                                    @error('email')
                                    <div class="text-red-600">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>

                            <div class="col-span-full">
                                <label for="street_address"
                                    class="block text-sm font-medium leading-6 text-gray-900">Street address *</label>
                                <div class="mt-2">
                                    <input type="text" name="street_address" id="street_address" required
                                        value="{{ old('street_address') }}" autocomplete="street-address"
                                        class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6">
                                </div>
                            </div>

                            <div class="sm:col-span-2 sm:col-start-1">
                                <label for="city" class="block text-sm font-medium leading-6 text-gray-900">City
                                    *</label>
                                <div class="mt-2">
                                    <input type="text" name="city" id="city" autocomplete="address-level2" required
                                        value="{{ old('city') }}"
                                        class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6">
                                </div>
                            </div>

                            <div class="sm:col-span-2">
                                <label for="province" class="block text-sm font-medium leading-6 text-gray-900">State /
                                    Province *</label>
                                <div class="mt-2">
                                    <input type="text" name="province" id="province" autocomplete="address-level1"
                                        required value="{{ old('province') }}"
                                        class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6">
                                </div>
                            </div>

                            <div class="sm:col-span-2">
                                <label for="postal_code" class="block text-sm font-medium leading-6 text-gray-900">ZIP /
                                    Postal code *</label>
                                <div class="mt-2">
                                    <input type="text" name="postal_code" id="postal_code" autocomplete="postal_code"
                                        required value="{{ old('postal_code') }}"
                                        class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6">
                                </div>
                            </div>

                            <div class="sm:col-span-3">
                                <label for="country"
                                    class="block text-sm font-medium leading-6 text-gray-900">Country *</label>
                                <div class="mt-2">
                                    <input id="country" name="country" type="text" required value="{{ old('country') }}"
                                        class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6">
                                </div>
                                <p class="mt-5 text-sm leading-6 text-gray-600">(*) Required fields</p>

                            </div>

                        </div>

                    </div>
                </div>

                <div class="mt-6 flex items-center justify-end gap-x-6">
                    <button type="button" onclick="window.history.back();"
                        class="text-sm font-semibold leading-6 text-gray-900">Cancel</button>
                    <button type="submit" href="{{ route('companies.store') }}"
                        class="rounded-md bg-indigo-600 px-3 py-2 text-sm font-semibold text-white shadow-sm hover:bg-indigo-500 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-600">Create</button>
                </div>
            </form>
        </div>
</x-app-layout>
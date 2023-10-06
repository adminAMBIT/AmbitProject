<x-app-layout>

    <x-slot name="header">
        <div class="flex justify-between items-center">
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                {{ __('Create Contact Type') }}
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
                            <h2 class="text-base font-semibold leading-7 text-gray-900">Type Information</h2>
                            <p class="mt-1 text-sm leading-6 text-gray-600">Please provide your company information below.</p>
                        </div>

                        <div class="grid max-w-2xl grid-cols-1 gap-x-6 gap-y-8 sm:grid-cols-6 md:col-span-2">
                            <div class="sm:col-span-3">
                                <label for="name"
                                    class="block text-sm font-medium leading-6 text-gray-900">Name</label>
                                <div class="mt-2">
                                    <input type="text" name="name" id="name" autocomplete="given-name" required value="{{ old('name') }}"
                                        class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6">
                                    @error('name')
                                    <div class="text-red-600">{{ $message }}</div>
                                    @enderror
                                    </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="mt-6 flex items-center justify-end gap-x-6">
                    <a type="button" href="{{ route('companies.index') }}" class="text-sm font-semibold leading-6 text-gray-900">Cancel</a>
                    <button type="submit" href="{{ route('userTypes.store') }}"
                        class="rounded-md bg-indigo-600 px-3 py-2 text-sm font-semibold text-white shadow-sm hover:bg-indigo-500 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-600">Create</button>
                </div>
            </form>
        </div>
</x-app-layout>
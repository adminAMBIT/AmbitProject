<x-app-layout>
    <x-slot name="header">
        <div class="flex justify-between items-center">
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                {{ $phase->project->title }} - {{ __('Edit Phase') }}
            </h2>
        </div>
    </x-slot>
    <div class="mx-auto max-w-7xl mt-4 px-4 sm:px-6 lg:px-8">

        <div class="space-y-10 divide-y divide-gray-900/10">


            <div class="grid grid-cols-1 gap-x-8 gap-y-8 pt-4 md:grid-cols-3">
                <div class="px-4 sm:px-0">
                    <h2 class="text-base font-semibold leading-7 text-gray-900">Phase Information</h2>
                    <p class="mt-1 text-sm leading-6 text-gray-600">Use a permanent address where you can receive mail.
                    </p>
                </div>

                <form method="post" class="bg-white shadow-sm ring-1 ring-gray-900/5 sm:rounded-xl md:col-span-2">
                    @csrf
                    <div class="px-4 py-6 sm:p-8">
                        <div class="grid max-w-2xl grid-cols-1 gap-x-6 gap-y-3 sm:grid-cols-6">
                            <div class="sm:col-span-3">
                                <label for="name" class="block text-sm font-medium leading-6 text-gray-900">Name</label>
                                <div class="mt-1">
                                    <input type="text" name="name" id="name" autocomplete="given-name" value="{{ $phase->name }}" required
                                        class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6">
                                </div>
                            </div>

                            <div class="sm:col-span-4">
                                <label for="description"
                                    class="block text-sm font-medium leading-6 text-gray-900">Description</label>
                                <div class="mt-1">
                                    <textarea id="description" name="description" type="text"
                                        class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6">{{ $phase->description }}</textarea>
                                </div>
                            </div>


                        </div>

                        <fieldset class="mt-6">
                            <legend class="text-sm font-semibold leading-6 text-gray-900">Phase Visibility
                            </legend>
                            <p class="mt-1 text-sm leading-6 text-gray-600">Choose the phase visibility</p>
                            <div class="mt-1 space-y-3">
                                <div class="flex items-center gap-x-3">
                                    <input id="public" name="is_private" type="radio" value="0" required {{ $phase->is_private==0 ? 'checked' : ''}}
                                        class="h-4 w-4 border-gray-300 text-indigo-600 focus:ring-indigo-600">
                                    <label for="public"
                                        class="block text-sm font-medium leading-6 text-gray-900">Public Phase</label>
                                </div>
                                
                                <div class="flex items-center gap-x-3">
                                    <input id="private" name="is_private" type="radio" value="1" required {{ $phase->is_private ? 'checked' : '' }}
                                        class="h-4 w-4 border-gray-300 text-indigo-600 focus:ring-indigo-600">
                                    <label for="private"
                                        class="block text-sm font-medium leading-6 text-gray-900">Private Phase</label>
                                </div>
                            </div>
                        </fieldset>
                    </div>
                    <div class="flex items-center justify-end gap-x-6 border-t border-gray-900/10 px-4 py-4 sm:px-8">
                        <a type="button" href="{{ route('projects.show', ['id'=>$phase->project->id]) }}" class="text-sm font-semibold leading-6 text-gray-900">Cancel</a>
                        <button type="submit" href="{{ route('projects.phases.store', ['project_id'=>$phase->project->id]) }}"
                            class="rounded-md bg-indigo-600 px-3 py-2 text-sm font-semibold text-white shadow-sm hover:bg-indigo-500 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-600">Save</button>
                    </div>
                </form>
            </div>
        </div>
        <form method="POST" action="{{ route('projects.phases.destroy', ['project_id'=>$phase->project, 'phase_id'=>$phase->id]) }}">
            @csrf
            @method('DELETE')
            <div class="mt-6 flex items-center">
                <button type="submit" class="rounded-md bg-red-600 px-3 py-2 text-sm font-semibold text-white shadow-sm hover:bg-red-500 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-red-600">Delete Phase</button>
            </div>
        </form>
    </div>




</x-app-layout>
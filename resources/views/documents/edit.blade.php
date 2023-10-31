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

                    <li>
                        <div class="flex items-center">
                            <svg class="h-5 w-5 flex-shrink-0 text-gray-400" viewBox="0 0 20 20" fill="currentColor"
                                aria-hidden="true">
                                <path fill-rule="evenodd"
                                    d="M7.21 14.77a.75.75 0 01.02-1.06L11.168 10 7.23 6.29a.75.75 0 111.04-1.08l4.5 4.25a.75.75 0 010 1.08l-4.5 4.25a.75.75 0 01-1.06-.02z"
                                    clip-rule="evenodd" />
                            </svg>
                            <a href="{{ route('projects.phases.subphases.show', ['project_id'=>$project->id, 'phase_id'=>$document->subphase->phase->id, 'subphase_id'=>$document->subphase->id]) }}"
                                class="ml-4 text-xl font-medium text-gray-500 hover:text-gray-700">{{
                                $document->subphase->name }}</a>
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
                            <p class="ml-4 text-xl font-medium text-gray-800"><a
                                    href="{{ route('document.show', ['document_id'=>$document->id]) }}"
                                    class="text-xl font-medium text-gray-500 hover:text-gray-700">{{ $document->name
                                    }}.{{ $document->extension }}</a> - Editing</p>
                        </div>
                    </li>
                </ol>
            </nav>
        </div>
    </x-slot>

    <div class="mx-auto max-w-7xl mt-4 px-4 sm:px-6 lg:px-8">
        <div class="overflow-hidden bg-white shadow sm:rounded-lg">
            <form action="" method="post" enctype="multipart/form-data">
                @csrf
                <div class="border-b border-gray-200 bg-white px-4 py-5 sm:px-6">
                    <div class="-ml-4 -mt-4 flex flex-wrap items-center justify-between sm:flex-nowrap">
                        <div class="ml-4 mt-4">
                            <h3 class="text-base font-semibold leading-6 text-gray-900">Editing Document Information
                            </h3>
                            <!-- <p class="mt-1 text-sm text-gray-500">Lorem ipsum dolor sit amet consectetur adipisicing elit
                            quam corrupti consectetur.</p> -->
                        </div>
                    </div>
                </div>
                <div class="border-t border-gray-100">
                    <dl class="divide-y divide-gray-100">
                        <!-- Nombre -->
                        <div class="px-4 py-3 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
                            <dt class="text-sm font-medium text-gray-900">Name</dt>
                            <dd class="mt-1 text-sm leading-6 text-gray-700 sm:col-span-2 sm:mt-0">
                                <input type="text" required name="name" value="{{ $document->name }}"
                                    class="border border-gray-300 rounded-md w-full px-3 py-2" />
                            </dd>
                        </div>

                        <div class="px-4 py-3 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
                            <dt class="text-sm font-medium text-gray-900">File</dt>
                            <dd class="mt-1 text-sm leading-6 text-gray-700 sm:col-span-2 sm:mt-0">
                                <div class="mt-2 flex justify-center rounded-lg border border-dashed border-gray-900/25 px-32 py-10"
                                    id="drop-zone" draggable="true" ondragover="handleDragOver(event)"
                                    ondragenter="handleDragEnter(event)" ondragleave="handleDragLeave(event)"
                                    ondrop="handleFileDrop(event)">
                                    <div class="text-center">
                                        <svg class="mx-auto h-12 w-12 text-gray-300" viewBox="0 0 24 24"
                                            fill="currentColor" aria-hidden="true">
                                            <path fill-rule="evenodd"
                                                d="M1.5 6a2.25 2.25 0 012.25-2.25h16.5A2.25 2.25 0 0122.5 6v12a2.25 2.25 0 01-2.25 2.25H3.75A2.25 2.25 0 011.5 18V6zM3 16.06V18c0 .414.336.75.75.75h16.5A.75.75 0 0021 18v-1.94l-2.69-2.689a1.5 1.5 0 00-2.12 0l-.88.879.97.97a.75.75 0 11-1.06 1.06l-5.16-5.159a1.5 1.5 0 00-2.12 0L3 16.061zm10.125-7.81a1.125 1.125 0 112.25 0 1.125 1.125 0 01-2.25 0z"
                                                clip-rule="evenodd" />
                                        </svg>
                                        <div class="mt-4 flex text-sm leading-6 text-gray-600">
                                            <label for="file-upload"
                                                class="relative cursor-pointer rounded-md bg-white font-semibold text-indigo-600 focus-within:outline-none focus-within:ring-2 focus-within:ring-indigo-600 focus-within:ring-offset-2 hover:text-indigo-500">
                                                <span>Upload the new file</span>
                                                <input id="file-upload" name="file" type="file" class="sr-only" />
                                            </label>
                                            <p class="pl-1">or drag and drop</p>
                                        </div>
                                        <!-- <p class="text-xs leading-5 text-gray-600">PNG, JPG, GIF up to 10MB</p> -->
                                    </div>
                                </div>
                                <div id="list-container" class="text-left overflow-hidden bg-white sm:rounded-lg">
                                    <dl class="divide-y divide-gray-100">
                                        <div class="pb-3 sm:grid sm:gap-4">
                                            <div class="sm:col-span-2">
                                                <!-- Contenido de la primera columna -->
                                            </div>
                                            <ul id="file-list" role="list" style="display: none;"
                                                class="divide-y divide-gray-100 rounded-md border border-gray-200">
                                            </ul>
                                        </div>
                                    </dl>
                                </div>
                            </dd>
                        </div>


                        @if(auth()->user()->is_admin)
                        <!-- Estado -->
                        <div class="px-4 py-6 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
                            <dt class="text-sm font-medium text-gray-900">Status</dt>
                            <dd class="mt-1 text-sm font-bold leading-6 text-gray-700 sm:col-span-2 sm:mt-0">
                                <select name="status" class="border border-gray-300 rounded-md w-1/3 px-3 py-2">
                                    <option value="correct" @if($document->status == 'correct') selected @endif>Correct
                                    </option>
                                    <option value="pending" @if($document->status == 'pending') selected @endif>Pending
                                    </option>
                                    <option value="incorrect" @if($document->status == 'incorrect') selected
                                        @endif>Incorrect
                                    </option>
                                    <!-- Agrega más opciones según sea necesario -->
                                </select>
                            </dd>
                        </div>
                        @endif
                    </dl>
                </div>
                <div class="flex items-center justify-end gap-x-6 border-t border-gray-900/10 px-4 py-4 sm:px-8">
                    <a type="button" href="#" onclick="window.history.back()"
                        class="text-sm font-semibold leading-6 text-gray-900">Cancel</a>
                    <button type="submit" href="#"
                        class="rounded-md bg-indigo-600 px-3 py-2 text-sm font-semibold text-white shadow-sm hover:bg-indigo-500 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-600">Save</button>
                </div>
            </form>
        </div>
    </div>
    <script>
        function handleDragOver(event) {
            event.preventDefault();
        }

        function handleDragEnter(event) {
            // Agregar estilos de resaltado cuando el cursor está sobre la zona de arrastre
            document.getElementById('drop-zone').classList.add('border-indigo-500');
            document.getElementById('drop-zone').classList.add('border-3');
        }

        function handleDragLeave(event) {
            // Quitar los estilos de resaltado cuando el cursor sale de la zona de arrastre
            document.getElementById('drop-zone').classList.remove('border-indigo-500');
            document.getElementById('drop-zone').classList.remove('border-3');

        }

        function handleFileDrop(event) {
            event.preventDefault();
            const files = event.dataTransfer.files;

            const fileInput = document.getElementById("file-upload");
            fileInput.files = files;

            // Quitar los estilos de resaltado cuando se suelta un archivo
            document.getElementById('drop-zone').classList.remove('border-indigo-500');
            document.getElementById('drop-zone').classList.remove('border-3');


            handleFiles(files);
        }

        const fileInput = document.getElementById("file-upload");

        fileInput.addEventListener("change", () => {
            const files = fileInput.files;
            handleFiles(files);
        });

        // Función para manejar los archivos
        function handleFiles(files) {
            const fileList = document.getElementById("file-list");

            for (const file of files) {
                // Crear un elemento de lista para cada archivo
                const listItem = document.createElement("li");
                listItem.className = 'flex items-center justify-between py-2 pl-4 pr-5 text-sm leading-6';
                const fileDetails = document.createElement("div");
                fileDetails.className = 'flex w-0 flex-1 items-center';
                const fileName = document.createElement("span");
                fileName.className = 'truncate font-medium';
                fileName.textContent = file.name;
                const fileSize = document.createElement("span");
                fileSize.className = 'flex-shrink-0 ml-2 text-gray-400';
                fileSize.textContent = (file.size / 1024 / 1024).toFixed(2) + 'MB';

                // Agregar el archivo a la lista
                fileDetails.appendChild(fileName);
                fileDetails.appendChild(fileSize);
                listItem.appendChild(fileDetails);
                fileList.style.display = 'block';
                fileList.appendChild(listItem);
            }
            document.getElementById("drop-zone").style.display = 'none';
        }

    </script>

</x-app-layout>
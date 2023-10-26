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
                            <a href="{{ route('projects.phases.show', ['project_id'=>$project->id, 'phase_id'=>$phase->id]) }}"
                                class="ml-4 text-xl font-medium text-gray-500 hover:text-gray-700">{{ $phase->name
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
                            <a href="{{ route('projects.phases.subphases.show', ['project_id'=>$project->id, 'phase_id'=>$phase->id, 'subphase_id'=>$subphase->id]) }}"
                                class="ml-4 text-xl font-medium text-gray-500 hover:text-gray-700">{{ $subphase->name
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
                            <p class="ml-4 text-xl font-medium text-gray-800">Upload Documents</p>
                        </div>
                    </li>
                </ol>
            </nav>
        </div>
    </x-slot>

    <div class="mx-auto max-w-7xl mt-4 px-4 sm:px-6 lg:px-8">
        <div class="space-y-10 divide-y divide-gray-900/10">
            <form class="bg-white shadow-sm ring-1 ring-gray-900/5 sm:rounded-xl md:col-span-2" method="post" enctype="multipart/form-data">
                @csrf
                <div class="px-4 py-6 flex justify-center sm:p-8">
                    <div class="grid max-w-2xl grid-cols-1 gap-x-6 gap-y-8 sm:grid-cols-6">

                        <div class="col-span-full">
                            <!-- <label for="cover-photo" class="block text-sm font-medium leading-6 text-gray-900">Cover
                                photo</label> -->
                            <div class="mt-2 flex justify-center rounded-lg border border-dashed border-gray-900/25 px-32 py-10"
                                id="drop-zone" draggable="true" ondragover="handleDragOver(event)"
                                ondragenter="handleDragEnter(event)" ondragleave="handleDragLeave(event)"
                                ondrop="handleFileDrop(event)">
                                <div class="text-center">
                                    <svg class="mx-auto h-12 w-12 text-gray-300" viewBox="0 0 24 24" fill="currentColor"
                                        aria-hidden="true">
                                        <path fill-rule="evenodd"
                                            d="M1.5 6a2.25 2.25 0 012.25-2.25h16.5A2.25 2.25 0 0122.5 6v12a2.25 2.25 0 01-2.25 2.25H3.75A2.25 2.25 0 011.5 18V6zM3 16.06V18c0 .414.336.75.75.75h16.5A.75.75 0 0021 18v-1.94l-2.69-2.689a1.5 1.5 0 00-2.12 0l-.88.879.97.97a.75.75 0 11-1.06 1.06l-5.16-5.159a1.5 1.5 0 00-2.12 0L3 16.061zm10.125-7.81a1.125 1.125 0 112.25 0 1.125 1.125 0 01-2.25 0z"
                                            clip-rule="evenodd" />
                                    </svg>
                                    <div class="mt-4 flex text-sm leading-6 text-gray-600">
                                        <label for="file-upload"
                                            class="relative cursor-pointer rounded-md bg-white font-semibold text-indigo-600 focus-within:outline-none focus-within:ring-2 focus-within:ring-indigo-600 focus-within:ring-offset-2 hover:text-indigo-500">
                                            <span>Upload a file</span>
                                            <input id="file-upload" name="files[]" type="file" class="sr-only"
                                                multiple required>
                                        </label>
                                        <p class="pl-1">or drag and drop</p>
                                    </div>
                                    <!-- <p class="text-xs leading-5 text-gray-600">PNG, JPG, GIF up to 10MB</p> -->
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="overflow-hidden bg-white shadow sm:rounded-lg">
                    <dl class="divide-y divide-gray-100">
                        <div class="px-4 pb-3 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
                            <div class="sm:col-span-1">
                                <!-- Contenido de la primera columna -->
                            </div>
                            <ul id="file-list" role="list" style="display: none;"
                                class="divide-y divide-gray-100 rounded-md border border-gray-200">
                            </ul>
                        </div>
                    </dl>
                </div>

                <div class="flex items-center justify-end gap-x-6 border-t border-gray-900/10 px-4 py-4 sm:px-8">
                    <a href="{{ route('projects.phases.subphases.show', ['project_id'=>$project->id, 'phase_id'=>$phase->id, 'subphase_id'=>$subphase->id]) }}" type="button" class="text-sm font-semibold leading-6 text-gray-900">Cancel</a>
                    <button type="submit" 
                        class="rounded-md bg-indigo-600 px-3 py-2 text-sm font-semibold text-white shadow-sm hover:bg-indigo-500 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-600">Upload</button>
                </div>
            </form>

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
            }

        </script>
    </div>
</x-app-layout>
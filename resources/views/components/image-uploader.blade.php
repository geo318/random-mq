@props(['thumbnail'])
<div class="relative h-[12.5rem] min-w-full">
    <div id = "wrapper" class="absolute inset-0 min-w-full overflow-hidden mt-1 flex justify-center rounded-md border-2 border-dashed border-gray-300">
        <div id = "drop-area" class="relative inset-0 min-w-full overflow-hidden justify-center rounded-md {{ $thumbnail ? 'flex' : 'hidden' }}">
            @if($thumbnail ?? false)
                <img id='image-exists' class="object-cover w-full h-full" src="{{ asset('storage/' . $thumbnail) }}"/>
                <label for="file-upload" class="absolute inset-0 cursor-pointer rounded-md bg-transparent text-indigo-600 focus-within:outline-none focus-within:ring-2 focus-within:ring-indigo-500 focus-within:ring-offset-2 hover:text-indigo-500">
                    <input id="file-upload" name="thumbnail" type="file" class="sr-only">
                    <span class="bg-indigo-600 text-white text-sm rounded-xl px-4 py-1 m-1 top-10 table">upload again</span>
                </label>
            @endif
        </div>
        <div id = 'file-upload-container' class="space-y-1 text-center flex flex-col justify-center">
            @unless($thumbnail ?? false)
                <x-upload-svg/>
                <div class="flex text-sm text-gray-600">
                    <label for="file-upload" class="absolute inset-0 cursor-pointer rounded-md bg-transparent text-indigo-600 focus-within:outline-none focus-within:ring-2 focus-within:ring-indigo-500 focus-within:ring-offset-2 hover:text-indigo-500">
                        <input id="file-upload" name="thumbnail" type="file" class="sr-only">
                    </label>
                    <p class="pl-1"><b>Upload a file</b> or drag and drop</p>
                </div>
                <p class="text-xs text-gray-500">PNG, JPG, GIF up to 10MB</p>
                @error('thumbnail')
                    <p class="mt-2 text-sm text-red-500">{{ $message }}</p>
                @enderror
            @endunless
        </div>
        <script>
            const wrapper = document.getElementById("wrapper")
            const dropArea = document.getElementById("drop-area")
            const previewImg = document.getElementById("image-exists") || document.createElement("img")
            const uploaderContainer = document.getElementById('file-upload-container')

            previewImg.classList.add('object-cover','w-full', 'h-full')

            const showImage = (e) => {
                let fileName = URL.createObjectURL(e.target.files[0]);
                uploaderContainer.style.display = "none";
                previewImg.setAttribute("src", fileName);
                dropArea.style.display = "flex";
                dropArea.appendChild(previewImg);
            }
            let input = document.getElementById('file-upload');
            input.addEventListener('change', showImage);
            ['dragover','drop'].forEach(e => 
                dropArea.addEventListener(e, function(event){
                event.stopPropagation()
                event.preventDefault()
            }));
            dropArea.addEventListener("drop",function(e){
                if(e.dataTransfer.files.length) {
                    previewImg.setAttribute("src", URL.createObjectURL(e.dataTransfer.files[0]));
                    dropArea.style.display = "flex";
                    uploderContainer.style.display = "none";
                    dropArea.appendChild(previewImg);
                }
            });
        </script>
    </div>
</div>
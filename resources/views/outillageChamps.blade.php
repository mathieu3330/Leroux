<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Outillage - {{ $outillage }}
        </h2>
    </x-slot>
    <div id="generic-container" class="w-full max-w-md mx-auto">
        <form id="multistep-form" class="bg-white shadow-md rounded px-8 pt-6 pb-8 mb-4" method="post"
            action="{{ route('processOutillageForm') }}" enctype="multipart/form-data">

            @csrf

            <input type="hidden" name="outillage" id="outillage" value="{{ $outillage }}">
            <div class="step" id="step-1">
                <div class="grid max-w-3xl gap-2 py-10 px-8 bg-white rounded-md border-t-4 border-blue-400">
                    <div
                        class="select-btn bg-white flex min-h-[60px] flex-col-reverse justify-center rounded-md border border-gray-300 px-3 py-2 shadow-sm focus-within:shadow-inner">
                        <input type="date" name="date" id="date" value="<?php echo date('Y-m-d'); ?>" 
                            class="peer block w-full border-0 p-0 text-base text-gray-900 placeholder-gray-400 focus:ring-0"
                            placeholder="date" required />
                    </div>

                    <div
                        class="select-btn bg-white flex min-h-[60px] flex-col-reverse justify-center rounded-md border border-gray-300 px-3 py-2 shadow-sm focus-within:shadow-inner">
                        <input type="text" name="nom" id="nom"
                            class="peer block w-full border-0 p-0 text-base text-gray-900 placeholder-gray-400 focus:ring-0"
                            placeholder="Nom" />
                    </div>

                    <div
                        class="select-btn bg-white flex min-h-[60px] flex-col-reverse justify-center rounded-md border border-gray-300 px-3 py-2 shadow-sm focus-within:shadow-inner">
                        <input type="text" name="prenom" id="prenom"
                            class="peer block w-full border-0 p-0 text-base text-gray-900 placeholder-gray-400 focus:ring-0"
                            placeholder="Prénom " />
                    </div>
                    <x-primary-button class="float-right btn-spacing centered-text" type="button" id="next">
                        {{ __('Suivant') }}
                    </x-primary-button>
                </div>
            </div>
            <div class="step hidden" id="step-2">
                <div class="grid max-w-3xl gap-2 py-10 px-8 bg-white rounded-md border-t-4 border-blue-400">
                    <x-searchable-outill-select class="ml-3" name="outil" id="outil">
                        {{ __('Outils') }}
                    </x-searchable-outill-select>
                    <br></br>

                    <div>
                        <input
                            class="relative m-0 block w-full min-w-0 flex-auto cursor-pointer rounded border border-solid border-neutral-300 bg-white bg-clip-padding px-3 py-1.5 mx-3 my-2 text-base font-normal text-neutral-700 outline-none transition duration-300 ease-in-out file:-mx-3 file:-my-1.5 file:cursor-pointer file:overflow-hidden file:rounded-none file:border-0 file:border-solid file:border-inherit file:bg-neutral-100 file:px-3 file:py-1.5 file:text-neutral-700 file:transition file:duration-150 file:ease-in-out file:[margin-inline-end:0.75rem] file:[border-inline-end-width:1px] hover:file:bg-neutral-200 focus:border-primary focus:bg-white focus:text-neutral-700 focus:shadow-[0_0_0_1px] focus:shadow-primary focus:outline-none dark:bg-transparent dark:text-neutral-200 dark:focus:bg-transparent"
                            type="file" id="img-out">
                            <input type="hidden" name="image-url-out" id="image-url-out">
                        </div>
                    <br></br>
                    <div>
                        <input
                            class="relative m-0 block w-full min-w-0 flex-auto cursor-pointer rounded border border-solid border-neutral-300 bg-white bg-clip-padding px-3 py-1.5 mx-3 my-2 text-base font-normal text-neutral-700 outline-none transition duration-300 ease-in-out file:-mx-3 file:-my-1.5 file:cursor-pointer file:overflow-hidden file:rounded-none file:border-0 file:border-solid file:border-inherit file:bg-neutral-100 file:px-3 file:py-1.5 file:text-neutral-700 file:transition file:duration-150 file:ease-in-out file:[margin-inline-end:0.75rem] file:[border-inline-end-width:1px] hover:file:bg-neutral-200 focus:border-primary focus:bg-white focus:text-neutral-700 focus:shadow-[0_0_0_1px] focus:shadow-primary focus:outline-none dark:bg-transparent dark:text-neutral-200 dark:focus:bg-transparent"
                            type="file" id="img1-out">
                            <input type="hidden" name="image1-url-out" id="image1-url-out">
                        </div>
                    <br></br>
                    <div
                        class="select-btn bg-white flex min-h-[60px] flex-col-reverse justify-center rounded-md border border-gray-300 px-3 py-2 shadow-sm focus-within:shadow-inner">

                        <textarea type="textarea" name="comment" id="comment"
                            class="peer block w-full border-0 p-0 text-base text-gray-900 placeholder-gray-400 focus:ring-0">
                    </textarea>
                    </div>
                    <x-primary-button class="float-right btn-spacing centered-text" type="submit" id="submit">
                        {{ __('Envoyer PDF') }}
                    </x-primary-button>
                </div>
        </form>
    </div>

    <script>
        const form = document.getElementById('multistep-form');
        const date = document.getElementById('date');
        const steps = Array.from(form.getElementsByClassName('step'));
        const csrfToken = "{{ csrf_token() }}";
        let currentStep = 0;

        // show the current step
        const showStep = () => {
            steps.forEach((step, index) => {
                if (index === currentStep) {
                    step.classList.remove('hidden');
                } else {
                    step.classList.add('hidden');
                }
            });
        };

        // go to the next step
        const nextStep = () => {
            if ((currentStep == 0 && !date.checkValidity()) || (currentStep == 1 && !form.reportValidity())) {
                return;
            }
            currentStep++;
            showStep();
            uploadHandling();
        };

        const uploadHandling = () => {
            const imageInput = document.getElementById('img-out');
            const imageInput1 = document.getElementById('img1-out');
            const imageUrlInput = document.getElementById('image-url-out');
            const imageUrlInput1 = document.getElementById('image1-url-out');
            if (imageInput) {
                imageInput.addEventListener('change', () => {
                    const imageFile = imageInput.files[0];
                    const formData = new FormData();
                    formData.append('image', imageFile);

                    fetch("{{ route('upload.image') }}", {
                        method: 'POST',
                        headers: {
                            'X-CSRF-TOKEN': csrfToken
                        },
                        body: formData
                    })
                    .then(response => response.json())
                    .then(data => {
                        imageUrlInput.value = data.image_url;
                        console.log('Image uploaded successfully!');
                    })
                    .catch(error => {
                        console.log('Error uploading image: ' + error);
                    });
                });
            }

            if (imageInput1) {
                imageInput1.addEventListener('change', () => {
                    const imageFile = imageInput1.files[0];
                    const formData = new FormData();
                    formData.append('image', imageFile);

                    fetch("{{ route('upload.image') }}", {
                        method: 'POST',
                        headers: {
                            'X-CSRF-TOKEN': csrfToken
                        },
                        body: formData
                    })
                    .then(response => response.json())
                    .then(data => {
                        imageUrlInput1.value = data.image_url;
                        console.log('Image uploaded successfully!');
                    })
                    .catch(error => {
                        console.log('Error uploading image: ' + error);
                    });
                });
            }

        }


        // add event listeners to buttons
        document.getElementById('next').addEventListener('click', nextStep);


        showStep();

    </script>
</x-app-layout>
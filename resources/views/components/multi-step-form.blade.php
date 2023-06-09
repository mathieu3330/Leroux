<div class="w-full max-w-md mx-auto">
  <form id="multistep-form" class="bg-white shadow-md rounded px-8 pt-6 pb-8 mb-4" method="post" action="{{route($route)}}" enctype="multipart/form-data">
    @csrf
    {{ $slot }}
    <div class="flex justify-between space-y-2.5">
      <x-secondary-button class="float-left  btn-spacing" id="cancel">
        {{ __('Annuler') }}
      </x-secondary-button>

      <x-primary-button class="btn-spacing" type="button" id="start">
        {{ __('Lancer la check-list') }}
      </x-primary-button>

      <x-primary-button class="float-right hidden btn-spacing" type="button" id="next">
        {{ __('Suivant') }}
      </x-primary-button>

      <x-primary-button class="float-right hidden btn-spacing" type="submit" id="submit">
        {{ __('Envoyer PDF') }}
      </x-primary-button>
    </div>
  </form>
</div>

<script>
  const form = document.getElementById('multistep-form');
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
    if (currentStep == 0 && !form.reportValidity()) {
      return;
    }
    currentStep++;
    showStep();
    uploadHandling(currentStep);
    // start step
    if(currentStep == 1) {
      document.getElementById('next').classList.remove('hidden');
      document.getElementById('start').classList.add('hidden');
    }
    // last step 
    if((steps.length - 1) == currentStep) {
      document.getElementById('submit').classList.remove('hidden');
      document.getElementById('next').classList.add('hidden');
    }
  };

  // go to the previous step
  const prevStep = () => {
    currentStep--;
    showStep();
  };

  // cancel the form
  const cancelForm = () => {
    currentStep = 0;
    form.reset();
    showStep();
    document.getElementById('submit').classList.add('hidden');
    document.getElementById('next').classList.add('hidden');
    document.getElementById('start').classList.remove('hidden');
  };
  const uploadHandling = (number) => {
    const imageInput = document.getElementById('img-Q'+number);
    const imageUrlInput = document.getElementById('image-url-Q'+number);
    if(imageInput) {
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
    
  }


  // add event listeners to buttons
  document.getElementById('next').addEventListener('click', nextStep);
  document.getElementById('start').addEventListener('click', nextStep);
  document.getElementById('cancel').addEventListener('click', cancelForm);
  

  showStep();

</script>
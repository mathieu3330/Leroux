<div id="generic-container" class="w-full max-w-md mx-auto">
  <form id="multistep-form" class="bg-white shadow-md rounded px-8 pt-6 pb-8 mb-4" method="post" action="{{route($route)}}" enctype="multipart/form-data">
    @csrf
    {{ $slot }}
    <div class="flex justify-between">
      <x-primary-button class="ml-3 btn-spacing" type="button" id="start">
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
  const container = document.getElementById('generic-container');
  const form = document.getElementById('multistep-form');
  let currentStep = 1;

  const initializeCounter = () => {
    var elem = document.getElementById('checklist-field');
    var counter = elem.cloneNode(true);
    counter.setAttribute('id', 'counter');
    counter.setAttribute('name', 'counter');
    counter.setAttribute('value', currentStep);
    form.appendChild(counter);
  }

  const createTemplate = () => {
    var elem = document.getElementById('step-2');
    // hide questions title
    elem.querySelector('p').classList.add('hidden');
    var template = elem.cloneNode(true); 
  
    template.setAttribute('id', 'template');
    container.appendChild(template);
  }

  // show the current step
  const showStep = () => {
    if(currentStep == 2){
      // show first step & hide project form
      document.getElementById('step-1').classList.add('hidden');
      document.getElementById('step-2').classList.remove('hidden');
      document.getElementById('submit').classList.remove('hidden');
      document.getElementById('next').classList.remove('hidden');
      document.getElementById('start').classList.add('hidden');
    }else if (currentStep > 1) {
      // hide previous & show next
      document.getElementById('step-'+(currentStep-1)).classList.add('hidden');

      // clone template step
      var template = document.getElementById('template');
      var elem = document.getElementById('step-2');
      var newElem = template.cloneNode(true); 
    
      newElem.setAttribute('id', 'step-'+currentStep);
      newElem.querySelector('textarea').setAttribute('name', 'Q'+(currentStep - 1));
      newElem.querySelector('input[type=file]').setAttribute('id', 'img-Q'+(currentStep - 1));
      newElem.querySelector('input[type=file]').setAttribute('name', 'img-Q'+(currentStep - 1));
      var before = elem.nextSibling;
      elem.parentNode.insertBefore(newElem, before);
      newElem.classList.remove('hidden');
    }
  };

  // go to the next step
  const nextStep = () => {
    if (currentStep == 1 && !form.reportValidity()) {
      return;
    }
    const counter = document.getElementById('counter');
    counter.value = currentStep;
    currentStep++;
    showStep();
    // start step
    if(currentStep == 1) {
      document.getElementById('next').classList.remove('hidden');
      document.getElementById('start').classList.add('hidden');
    }
  };

  // add event listeners to buttons
  document.getElementById('next').addEventListener('click', nextStep);
  document.getElementById('start').addEventListener('click', nextStep);
  
  showStep();
  createTemplate();
  initializeCounter();

</script>
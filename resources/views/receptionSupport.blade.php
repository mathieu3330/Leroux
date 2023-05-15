<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Réception Support') }}
        </h2>
    </x-slot>
    <x-multi-step-form-generec route="send-pdf">
        <input id="checklist-field" type="hidden" name="checklist" value="reception support">
        <div class="step" id="step-1">
            <x-project>
            </x-project>
        </div>
        @foreach ($questions as $question)
            <div class="step hidden" id="step-{{ $loop->iteration+1 }}">
                <x-question :question='$question' number="Question-{{ $loop->iteration }}">
                </x-question>
            </div>
        @endforeach
    </x-multi-step-form-generec>
</x-app-layout>

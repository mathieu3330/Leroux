<div>
    <h1 class="mb-1 font-bold text-3xl flex gap-1 items-baseline font-mono">Détails du projet<span
            class="text-sm text-blue-700">informations générales</sm>
    </h1>
    <div
        class="grid max-w-3xl gap-2 py-10 px-8 bg-white rounded-md border-t-4 border-blue-400">
        <x-searchable-ville-select class="ml-3" name="ville" id="ville">
            {{ __('Ville') }}
        </x-searchable-ville-select>
        <x-searchable-promoteur-select class="ml-3" id="promoteur" name="promoteur">
        {{ __('Promoteur') }}
        </x-searchable-promoteur-select>
        <x-labeled-text-input class="ml-3" name="numetude">
            {{ __('N Etudes') }}
        </x-labeled-text-input>
    </div>
</div>
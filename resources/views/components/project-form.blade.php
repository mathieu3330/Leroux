<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ $slot }}
        </h2>
    </x-slot>

    <div class="min-h-screen w-full flex items-center justify-center bg-gray-50 px-3">
        <div>
            <h1 class="mb-1 font-bold text-3xl flex gap-1 items-baseline font-mono">Détails du projet<span
                    class="text-sm text-blue-700">informations générales</sm>
            </h1>
            <form name="add-blog-post-form" id="add-blog-post-form" method="get" action="{{url('add-blog-post-form')}}">

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
                <x-labeled-text-input class="ml-3" name="Localisation">
                    {{ __('Localisation') }}
                </x-labeled-text-input>
                <x-primary-button class="ml-3" type="submit">
                    {{ __('Lancer la check-list') }}
                </x-primary-button>
                </form>
            </div>
        </div>
</x-app-layout>
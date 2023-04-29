<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ $slot }}
        </h2>
    </x-slot>

    <div class="min-h-screen w-full flex items-center justify-center bg-gray-50 px-3">
        <div>
            <h1 class="mb-1 font-bold text-1xl flex gap-1 items-baseline font-mono">Question 1 : le chantier est fini ?<span
                    class="text-sm text-blue-700"></sm>
            </h1>
            <form name="add-checklist-form" id="add-checklist-form" method="get" action="{{url('add-checklist-form')}}">
           
            <div
                class="grid max-w-3xl gap-2 py-10 px-8 bg-white rounded-md border-t-4 border-blue-400">
                
                <label for="remember_me" class="inline-flex items-center">
                    <input id="remember_me" type="checkbox" class="rounded border-gray-300 text-indigo-600 shadow-sm focus:ring-indigo-500" name="remember">
                    <span class="ml-2 text-sm text-gray-600">Oui</span>
                </label>
                <label for="remember_me" class="inline-flex items-center">
                    <input id="remember_me" type="checkbox" class="rounded border-gray-300 text-indigo-600 shadow-sm focus:ring-indigo-500" name="remember">
                    <span class="ml-2 text-sm text-gray-600">Non</span>
                </label>
             </div>
                <div
                    class="select-btn bg-white flex min-h-[60px] flex-col-reverse justify-center rounded-md border border-gray-300 px-3 py-2 shadow-sm focus-within:shadow-inner">
                    <textarea  type="textarea" name="comment" id="comment"
                        class="peer block w-full border-0 p-0 text-base text-gray-900 placeholder-gray-400 focus:ring-0">
                    </textarea>
                </div>
                <br></br>
                <input class="relative m-0 block w-full min-w-0 flex-auto cursor-pointer rounded border border-solid border-neutral-300 bg-white bg-clip-padding px-3 py-1.5 text-base font-normal text-neutral-700 outline-none transition duration-300 ease-in-out file:-mx-3 file:-my-1.5 file:cursor-pointer file:overflow-hidden file:rounded-none file:border-0 file:border-solid file:border-inherit file:bg-neutral-100 file:px-3 file:py-1.5 file:text-neutral-700 file:transition file:duration-150 file:ease-in-out file:[margin-inline-end:0.75rem] file:[border-inline-end-width:1px] hover:file:bg-neutral-200 focus:border-primary focus:bg-white focus:text-neutral-700 focus:shadow-[0_0_0_1px] focus:shadow-primary focus:outline-none dark:bg-transparent dark:text-neutral-200 dark:focus:bg-transparent"
                        type="file"
                        id="formFileMultiple"
                        multiple >
                <br></br>
                <x-primary-button class="ml-1" type="submit">
                    {{ __('Annuler') }}
                </x-primary-button>
                <x-primary-button class="ml-80" type="submit">
                    {{ __('Suivant') }}
                </x-primary-button>
                </form>
            </div>
        </div>
</x-app-layout>
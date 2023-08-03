<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Accueil') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <div class="min-h-screen flex items-center justify-center">

                        <div class="grid md:grid-cols-2 gap-8 grid-cols-1">

                            <div class="b mx-auto h-16 w-64 flex justify-center items-center">
                                <a href="{{ route('security') }}" class="i h-16 w-64 bg-gradient-to-br from-sky-600 to-sky-600 items-center rounded-full shadow-2xl cursor-pointer absolute overflow-hidden transform hover:scale-x-110 hover:scale-y-105 transition duration-300 ease-out">
                                </a>
                                <a class="text-center text-white font-semibold z-10 pointer-events-none">Echafaudage</a>
                            </div>
                            
                            <div class="b mx-auto h-16 w-64 flex justify-center items-center">
                                <<a href="{{ route('support') }}" class="i h-16 w-64 bg-gradient-to-br from-sky-600 to-sky-600 items-center rounded-full shadow-2xl cursor-pointer absolute overflow-hidden transform hover:scale-x-110 hover:scale-y-105 transition duration-300 ease-out">
                                </a>
                                <a class="text-center text-white font-semibold z-10 pointer-events-none">Réception Support charpente</a>
                            </div>

                            <div class="b mx-auto h-16 w-64 flex justify-center items-center">
                                <<a href="{{ route('receptionSupport') }}" class="i h-16 w-64 bg-gradient-to-br from-sky-600 to-sky-600 items-center rounded-full shadow-2xl cursor-pointer absolute overflow-hidden transform hover:scale-x-110 hover:scale-y-105 transition duration-300 ease-out">
                                </a>
                                <a class="text-center text-white font-semibold z-10 pointer-events-none">Réception Support</a>
                            </div>

                            <div class="b mx-auto h-16 w-64 flex justify-center items-center">
                                <<a href="{{ route('reception') }}" class="i h-16 w-64 bg-gradient-to-br from-sky-600 to-sky-600 items-center rounded-full shadow-2xl cursor-pointer absolute overflow-hidden transform hover:scale-x-110 hover:scale-y-105 transition duration-300 ease-out">
                                </a>
                                <a class="text-center text-white font-semibold z-10 pointer-events-none">Réception travaux Zinguerie</a>
                            </div>
                            <div class="b mx-auto h-16 w-64 flex justify-center items-center">
                                <a href="{{ route('outillage') }}" class="i h-16 w-64 bg-gradient-to-br from-sky-600 to-sky-600 items-center rounded-full shadow-2xl cursor-pointer absolute overflow-hidden transform hover:scale-x-110 hover:scale-y-105 transition duration-300 ease-out">
                                </a>
                                <a class="text-center text-white font-semibold z-10 pointer-events-none">Outillage</a>
                            </div>

                            

                        </div>
                    </div>
            </div>
        </div>
    </div>
</x-app-layout>

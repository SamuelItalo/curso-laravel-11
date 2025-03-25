<x-app-layout>
    <x-slot name="header">
        <!-- <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Dashboard') }}
        </h2> -->
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    
    <div class="py-6">
    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="group flex items-center justify-center bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg 
            transition duration-300 w-full p-6 hover:bg-blue-600 dark:hover:bg-blue-500">
            <p class="text-gray-900 dark:text-gray-100 text-lg font-semibold group-hover:text-white ">
                {{ __("Bem-vindo ao Solicite") }}
            </p>
            </div>
        </div>
    </div>
    <!-- <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    {{ __("Bem-vindo ao Solicite") }}
                </div>
                
            </div>
        </div>
    </div> -->

    <!-- <div class="py-0">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    {{ __("Solicite seu chamado aqui") }} 
                    
                </div>
            </div>
        </div>
    </div> -->
</x-app-layout>

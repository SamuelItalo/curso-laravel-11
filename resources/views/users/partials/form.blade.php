<x-alert />

<div class="">
    @csrf()

    <div class="inline-flex items-center p-4 text-gray-900 border border-gray-300 rounded-lg 
    bg-gray-50 text-base dark:bg-gray-700 dark:border-gray-600 dark:text-white 
    hover:bg-red-500 hover:text-white cursor-pointer transition duration-300">
    {{ $user->name ?? old('name') }}
    </div>
    
    <div class="py-2 mb-5">
        
    </div>

    <!-- <div class="mb-5">
        <input type="text" name="name" placeholder="Nome" value="{{ $user->name ?? old('name') }}"
            class="block w-full p-4 text-gray-900 border border-gray-300 rounded-lg bg-gray-50 text-base focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
    </div> -->
    <!-- <div class="mb-5">
        <input type="email" name="email" placeholder="E-mail"value="{{ $user->email ?? old('email') }}"
            class="block w-full p-4 text-gray-900 border border-gray-300 rounded-lg bg-gray-50 text-base focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
    </div> -->

    <div class=" mb-4">
        <label for="titulo" class="block text-sm font-medium text-white bg-blue-500 px-2 py-1 rounded ">Título</label>
        <input id="titulo" type="text" name="titulo" placeholder="Titulo do chamado"
        class="block w-full p-4 text-gray-900 border border-gray-300 rounded-lg bg-gray-50 text-base focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" >
    </div>

    <div class="mb-4">
        <label for="setor" class="block text-sm font-medium text-white bg-blue-500 px-2 py-1 rounded ">Setor</label>
        <input id="setor" type="text" name="setor" placeholder="Setor"
        class="block w-full p-4 text-gray-900 border border-gray-300 rounded-lg bg-gray-50 text-base focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" >
    </div>
    

    <div class="mb-4">
    <label for="descricao" class="block text-sm font-medium text-white bg-blue-500 px-2 py-1 rounded ">Descrição do Problema</label>
        <textarea id="descricao" name="descricao" rows="6" 
            class="mt-1 p-2 w-full border rounded-md focus:ring focus:ring-blue-300">
        </textarea>
    </div>

    <button type="submit" class="py-2.5 px-5 me-2 mb-2 text-sm font-medium text-gray-900 
    focus:outline-none bg-white rounded-full 
    border border-gray-200 
    hover:bg-gray-100 hover:text-blue-700 
    focus:z-10 focus:ring-4 focus:ring-blue-100 
    dark:focus:ring-gray-700 dark:bg-gray-800 
    dark:text-gray-400 dark:border-gray-600 
    dark:hover:text-white dark:hover:bg-gray-700">
        Enviar
    </button>
</div>

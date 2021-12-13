<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
        <a href="entreprise/index/1">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    INDEX DES ENTREPRISES
               </div>
            </div></a>
        </div> 
        @can('create', App\Models\User::class)
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8"><a href="entreprise/create">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    CREER UNE ENTREPRISE
               </div>
            </div></a>
        </div>  
        @endcan
        @can('create', App\Models\User::class)
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8"><a href="entreprise/updatebranch">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    MISE A JOUR D'UNE ENTREPRISE
               </div>
            </div></a>
        </div>
        @endcan
        @can('delete', App\Models\User::class)  
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8"><a href="entreprise/deletebranch">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    SUPPRESSION D'UNE ENTREPRISE
               </div>
            </div>
        </div></a>
        @endcan  
    </div>
    <div class="py-12"><a href="collaborateur/index/1">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    INDEX DES COLLABORATEURS
               </div>
            </div></a>
        </div>
        @can('create', App\Models\User::class)  
        <a href="collaborateur/create"><div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    CREER UN COLLABORATEUR
               </div>
            </div></a>
        </div>
        @endcan
        @can('create', App\Models\User::class)  
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8"><a href="collaborateur/updatebranch">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    MISE A JOUR D'UN COLLABORATEUR
               </div>
            </div></a>
        </div>
        @endcan
        @can('delete', App\Models\User::class)  
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8"><a href="collaborateur/deletebranch">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    SUPPRESSION D'UN COLLABORATEUR
               </div>
            </div>
        </div></a>
    </div>
    @endcan 
</x-app-layout>

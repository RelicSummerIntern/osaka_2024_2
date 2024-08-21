<x-app-layout>
    <x-slot name="header">
        <h1 class="font-bold text-xl text-gray-800 leading-tight">
            なごみネット
        </h1>
    </x-slot>
    <link rel="stylesheet" href="{{ asset('css/home.css') }}">

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <a href="{{ route('login') }}" class="bg-white border-b border-gray-200 p-6 block w-full text-center
                font-semibold text-gray-800 hover:bg-gray-100 text-decoration-none">

                    ログイン

                </a>
            </div>
        </div>
    </div>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <a href="{{ route('register') }}" class="bg-white border-b border-gray-200 p-6 block w-full text-center
                font-semibold text-gray-800 hover:bg-gray-100 text-decoration-none">
                    新規登録
                </a>
            </div>
        </div>
    </div>
</x-app-layout> 

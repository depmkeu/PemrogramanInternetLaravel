<x-app-layout>
    <x-slot name="header">
        <h2 class="font-bold text-3xl text-gray-800 leading-tight text-center">
            {{ __('Menu Utama - Sistem Mahasiswa') }}
        </h2>
    </x-slot>

    <div class="py-16 bg-gradient-to-b from-blue-900 via-blue-800 to-blue-900 min-h-screen">
        <div class="max-w-3xl mx-auto px-6 lg:px-8">
            <div class="bg-blue-950 shadow-2xl rounded-2xl p-10 text-center text-blue-100">
                
                <div class="flex flex-col gap-6 items-center">
                    <a href="{{ url('/mahasiswa') }}" 
                       class="w-3/4 text-2xl font-semibold bg-blue-700 hover:bg-blue-600 text-white py-4 rounded-xl shadow-lg transition-all duration-200">
                        📘 Data Mahasiswa (Database)
                    </a>

                    <a href="{{ url('/fakultas') }}" 
                       class="w-3/4 text-2xl font-semibold bg-blue-700 hover:bg-blue-600 text-white py-4 rounded-xl shadow-lg transition-all duration-200">
                        🏛️ Data Fakultas
                    </a>

                    <a href="{{ url('/programstudi') }}" 
                       class="w-3/4 text-2xl font-semibold bg-blue-700 hover:bg-blue-600 text-white py-4 rounded-xl shadow-lg transition-all duration-200">
                        🎓 Data Program Studi
                    </a>
                </div>

                <hr class="my-10 border-blue-700">
                </a>
            </div>
        </div>
    </div>
</x-app-layout>

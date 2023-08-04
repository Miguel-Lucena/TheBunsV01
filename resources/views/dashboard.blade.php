<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            Panel de control
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    <a class="nav-link" href="/empleados">
                        <div class="sb-nav-link-icon"><i class="fas fa-table"></i></div>
                        Empleados
                    </a>
                </div>
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    <a class="nav-link" href="/turnos">
                        <div class="sb-nav-link-icon"><i class="fas fa-table"></i></div>
                        Turnos
                    </a>
                </div>
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    <a class="nav-link" href="/trabajoRegistrado">
                        <div class="sb-nav-link-icon"><i class="fas fa-table"></i></div>
                        Trabajo Registrado
                    </a>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>

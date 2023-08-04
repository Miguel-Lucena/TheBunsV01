<x-app-layout>
    <div class="max-w-7xl mx-auto p-6 lg:p-8">      
        <h1>Crear empelado</h1>
        <form method="POST" action="/empleados" enctype="multipart/form-data">
            @csrf
            <div class="form-group">
                <label for="name">Nombre de Empleado</label>
                <input type="text" name="name" class="form-control" id="name" placeholder="Name..." value="{{ old('name') }}" required>
            </div>
            <div class="form-group pt-2">
                <input class="btn btn-primary" type="submit" value="Registrar Empleado">
            </div>
        </form>
    </div>
</x-app-layout>

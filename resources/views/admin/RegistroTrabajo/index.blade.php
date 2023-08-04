<x-app-layout>
         <!-- DataTables Example -->
         <div class="card mb-3">
            <div class="card-header">
              <i class="fas fa-table"></i>
              <h2>Horas registradas</h2>
            </div>
            <div class="card-body">
              <div class="table-responsive">
                <table class="table table-bordered" ID="dataTable" width="100%" cellspacing="0">
                  <thead>
                    <tr>
                      <th>ID</th>
                      <th>Fecha</th>
                      <th>Nombre</th>
                      <th>Turno</th>
                      <th>Precio turno</th>
                      <th>Hora Inicio</th>
                      <th>Hora Fin</th>
                      <th>Monto a pagar</th>
                    </tr>
                  </thead>
                  <tfoot>
                    <tr>
                        <th>ID</th>
                        <th>Fecha</th>
                        <th>Nombre</th>
                        <th>Turno</th>
                        <th>Precio turno</th>
                        <th>Hora Inicio</th>
                        <th>Hora Fin</th>
                        <th>Monto a pagar</th>
                      </tr>
                  </tfoot>
                  <tbody>
                    @foreach ($turnoRegistrados as $registro)
                    <tr>
                        <td>{{$registro->id}}</td>
                        <td>{{$registro->created_at->format('Y-m-d')}}</td>
                        <td>{{$registro->empleado->name}}</td>
                        <td>{{$registro->turno->name}}</td>
                        <td>${{number_format($registro->turno->price,2)}}</td>
                        <td>{{$registro->HoraInicio}}</td>
                        <td>{{$registro->HoraFin}}</td>
                        <td>${{ number_format($registro->total, 2) }}</td>
                    </tr>
                    @endforeach
                  </tbody>
                </table>
              </div>
            </div>
          </div>
</x-app-layout>

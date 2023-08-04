<x-app-layout>


         <!-- DataTables Example -->
         <div class="card mb-3">
            <div class="card-header">
              <i class="fas fa-table"></i>
              <div class="row py-lg-2">
                <div class="col-md-6">
                    <h2>Lista de Turnos</h2>
                </div>
                <div class="col-md-6 col-md-6 d-grid gap-2 d-md-flex justify-content-md-end">
                    <a href="/turnos/create" class="btn btn-primary btn-lg" role="button" aria-pressed="true">Crear nuevo turno</a>
                </div>
              </div>
            </div>
            <div class="card-body">
              <div class="table-responsive">
                <table class="table table-bordered" ID="dataTable" width="100%" cellspacing="0">
                  <thead>
                    <tr>
                      <th>ID</th>
                      <th>Nombre</th>
                      <th>Precio</th>
                      <th>Herramientas</th>
                    </tr>
                  </thead>
                  <tfoot>
                    <tr>
                        <th>ID</th>
                        <th>Nombre</th>
                        <th>Precio</th>
                        <th>Herramientas</th>
                      </tr>
                  </tfoot>
                  <tbody>
                    @foreach ($turnos as $turno)
                    <tr>
                        <td>{{$turno->id}}</td>
                        <td>{{$turno->name}}</td>
                        <td>${{number_format($turno->price,2)}}</td>
                        <td>
                          <a href="#" data-bs-toggle="modal" data-bs-target="#deleteModal" data-bs-whatever="{{$turno->id}}"><i class="fas fa-trash-alt"></i></a>
                        </td>
                    </tr>
                    @endforeach
                  </tbody>
                </table>
              </div>
            </div>
          </div>

                      <!-- delete Modal-->
    <div class="modal fade" id="deleteModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
      <div class="modal-dialog" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">¿Preparado para eliminar?</h5>
            <button class="close" type="button" data-bs-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">×</span>
            </button>
          </div>
          <div class="modal-body">Seleccione "eliminar" si realmente desea eliminar este Turno.</div>
          <div class="modal-footer">
            <button class="btn btn-secondary" type="button" data-bs-dismiss="modal">Cancelar</button>
          <form  id="myFormRubro" method="POST" action="">
              @method('DELETE')
              @csrf()
            <!--  <input type="hidden" id="user_id" name="user_id" value="">-->
              <input type="submit" onclick="$(this).closest('form').submit()" class="btn btn-primary"  value="Eliminar">
          </form>
          </div>
        </div>
      </div>
    </div>
    <script>
      const exampleModal = document.getElementById('deleteModal')
      exampleModal.addEventListener('show.bs.modal', event => {
      const button = event.relatedTarget
      const turnoID = button.getAttribute('data-bs-whatever')
      document.getElementById("myFormRubro").action = '/turnos/' + turnoID
      })
  </script>

          
</x-app-layout>

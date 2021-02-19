<div class="modal fade" id="AddReports" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
  aria-hidden="true">
  <div class="modal-dialog modal-lg" role="document">
    <div class="modal-content">
      <div class="modal-header bg-primary">
        <h5 class="modal-title" id="exampleModalLabel" style="font-weight: 600">Registrar nuevo reporte
        </h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body text-center">
        @csrf
        <div class="row text-center">
          <input type="text" id="id" name="id" />
          <input type="text" id="serial" name="serial" />
          <div class="col-md-6">
            <div class="card card-outline card-primary">
              <div class="card-header">
                <h3 class="card-title">
                  <img src="{{ asset('svg/petition.svg') }}" width="40px" alt="" />
                  INFORME TECNICO PARA BAJA ACTIVOS FIJOS</h3>
              </div>
              <!-- /.card-header -->
              <div class="card-body" style="display: block;">
                <p style="text-align: left;">
                  Baja de activos fijos
                  inventariables,
                  según corresponda al pronuncionamiento del técnico.
                </p>
              </div>
              <!-- /.card-body -->
              <div class="card-footer">
                <a href="#" class="btn btn-block btn-outline-primary">Generar</a>
              </div>
            </div>
            <!-- /.card -->
          </div>
          <!-- /.col -->
          <div class=" col-md-6">
            <div class="card card-outline card-primary">
              <div class="card-header">
                <h3 class="card-title" style="font-size: 15px">
                  <img src="{{ asset('svg/petition.svg') }}" width="40px" alt="" />
                  ACTA DE ENTREGA DE EQUIPOS COMPUTACIONALES
                </h3>
              </div>
              <!-- /.card-header -->
              <div class="card-body" style="display: block;">
                <p style="text-align: left;">
                  Baja de activos fijos
                  inventariables,
                  según corresponda al pronuncionamiento del técnico.
                </p>
              </div>
              <!-- /.card-body -->
              <div class="card-footer">
                <button type="button" class="btn btn-block btn-outline-primary"
                  onclick="window.location=">Generar</button>
              </div>
            </div>
            <!-- /.card -->
          </div>
          <!-- /.col -->
          <div class="col-md-6">
            <div class="card card-outline card-primary">
              <div class="card-header">
                <h3 class="card-title">
                  <img src="{{ asset('svg/petition.svg') }}" width="40px" alt="" />
                  HOJA DE VIDA DE EQUIPOS DE CÓMPUTO</h3>
              </div>
              <!-- /.card-header -->
              <div class="card-body" style="display: block;">
                <p style="text-align: left;">
                  Baja de activos fijos
                  inventariables,
                  según corresponda al pronuncionamiento del técnico.
                </p>
              </div>
              <!-- /.card-body -->
              <div class="card-footer">
                <button type="button" class="btn btn-block btn-outline-primary">Generar</button>
              </div>
            </div>
            <!-- /.card -->
          </div>
        </div>

        <div class="modal-footer">
        </div>

      </div>

    </div>
  </div>
</div>
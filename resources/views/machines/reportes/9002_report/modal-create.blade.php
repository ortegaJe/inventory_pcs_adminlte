<div class="modal fade" id="AddHvPcReport" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
  aria-hidden="true">
  <div class="modal-dialog modal-lg" role="document">
    <div class="modal-content">
      <div class="modal-header bg-gradient-primary">
        <h5 class="modal-title" id="exampleModalLabel" style="font-weight: 600">
          {{$name_reports[2]->code_report}} -
          {{$name_reports[2]->name}}
        </h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body mx-auto">
        @if (Session::has('message_hv_pc_report'))
        <div class="alert alert-{{ Session::get('typealert') }} alert-dismissible fade show" style="d-none">
          <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
          <h5><i class="icon fas fa-ban"></i> Upsss!</h5>
          {{ Session::get('message_hv_pc_report') }}
          @if ($errors->any())
          <ul>
            @foreach ($errors->all() as $error)
            <li>{{ $error }}</li>
            @endforeach
          </ul>
          @endif
        </div>
        @endif
        <form action="{{ route('save.report.hv.pc')}}" method="POST">
          @csrf
          @method('POST')
          <input type="hidden" id="id-machine" name="id-machine" value="{{ $cancel_repo_pc->id}}">
          <input type="hidden" id="id-format" name="id-format" value="{{$name_reports[2]->id}}">

          <div class="card border-light mb-3" style="width: 36rem;">
            <div class="card-header card-primary card-outline">
              <h5><strong class="text-muted">Mantenimiento</strong></h5>
            </div>
            <div class="card-body">
              <h5 class="card-title"></h5>
              <div class="col-md-6 mb-3 mx-auto">
                <label for="fecha-mto" class="text-muted">Fecha realización:</label>
                <div class="input-group date">
                  <div class="input-group-prepend">
                    <span class="input-group-text"><i class="fas fa-tools"></i></span>
                  </div>
                  <input type="date" class="form-control pull-right" name="fecha-mto" id="datepicker">
                </div>
              </div>
              <div class="form-row">
                <div class="col-md-12 mb-3">
                  <div class="input-group">
                    <div class="input-group-prepend">
                      <span class="input-group-text">Observacion:</span>
                    </div>
                    <textarea style="height: 100px;" class="form-control" maxlength="200" id="observation"
                      name="observation" style="text-transform:uppercase;"
                      onkeyup="javascript:this.value=this.value.toUpperCase();" aria-label="With textarea"
                      value=""></textarea>
                  </div>
                </div>
              </div>
            </div>
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
            <button type="submit" class="btn btn-primary">Save changes</button> </div>
      </div>
      </form>
    </div>
  </div>
</div>
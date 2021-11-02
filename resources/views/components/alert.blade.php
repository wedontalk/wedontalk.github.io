<!-- 
@if(Session::has('error'))
<div class="alert alert-danger alert-dismissible fade show" role="alert">
  <strong>thông báo</strong> {{session::get('error')}}
  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
    <span aria-hidden="true">&times;</span>
  </button>
</div>
@endif
@if(Session::has('success'))
<div class="alert alert-success alert-dismissible fade show" role="alert">
  <strong>thông báo</strong> {{session::get('success')}}
  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
    <span aria-hidden="true">&times;</span>
  </button>
</div>
@endif -->
@if(Session::has('success'))
<div class="col-md-3" style="top:100px;right:0; z-index:1; position: absolute;">
    <div class="card card-success">
        <div class="card-header">
        <h3 class="card-title">Thông báo</h3>

        <div class="card-tools">
            <button type="button" class="btn btn-tool" data-card-widget="remove"><i class="fas fa-times"></i>
            </button>
        </div>
        <!-- /.card-tools -->
        </div>
        <!-- /.card-header -->
        <div class="card-body">
        {{session::get('success')}}
        </div>
        <!-- /.card-body -->
    </div>
<!-- /.card -->
</div>
@endif
@if(Session::has('error'))
<div class="col-md-3" style="top:100px;right:0; z-index:1; position: absolute;" >
    <div class="card card-danger">
        <div class="card-header">
        <h3 class="card-title">Thông báo</h3>

        <div class="card-tools">
            <button type="button" class="btn btn-tool" data-card-widget="remove"><i class="fas fa-times"></i>
            </button>
        </div>
        <!-- /.card-tools -->
        </div>
        <!-- /.card-header -->
        <div class="card-body">
        {{session::get('error')}}
        </div>
        <!-- /.card-body -->
    </div>
<!-- /.card -->
</div>
@endif


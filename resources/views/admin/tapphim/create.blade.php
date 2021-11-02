@extends('layouts.admin')
@section('main')
<div class="content-wrapper">
    <div class="card card-warning">
        <div class="card-header">
                    <h3 class="card-title">form nhập phim</h3>
                </div>
                <!-- /.card-header -->
                <div class="card-body">
                    <form action="{{route('tapphim.store')}}" method="POST" enctype="multipart/form-data" >
                    @csrf
                    <!-- input states -->
                    <div class="row">
                        <div class="col-sm-12">
                            <div class="form-group">
                                <label>chọn phim</label>
                                <select class="form-control select2" style="" name="film_id">
                                    <option>__CHỌN PHIM__</option>
                                    @foreach($data as $dt)
                                    <option value="{{$dt->id}}">{{$dt->id}} - {{$dt->name}}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-sm-4">
                            <div class="form-group">
                                <label class="col-form-label" for="inputSuccess">id tập phim</label>
                                <input type="text" name="episode" class="form-control is-valid" id="inputSuccess" placeholder="Enter ...">
                                </div>
                        </div>
                        <div class="col-sm-4">
                            <div class="form-group">
                                <label class="col-form-label" for="inputWarning"><i class="far fa-bell"></i>Tên tập phim</label>
                                <input type="text" name="episode_name" class="form-control is-warning" id="inputWarning" placeholder="Enter ...">
                            </div>
                        </div>
                        <div class="col-sm-4">
                            <div class="form-group">
                                <label class="col-form-label" for="inputWarning"><i class="far fa-bell"></i>slug phim</label>
                                <input type="text" name="slug_phim" class="form-control is-warning" id="inputWarning" placeholder="Enter ...">
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="form-group">
                                <label class="col-form-label" for="inputError"><i class="far fa-times-circle"></i>đường dẫn phim</label>
                                <input type="text" name="content" class="form-control is-invalid" id="inputError" placeholder="Enter ...">
                            </div>
                        </div>
                        <div class="col-sm-6">
                        <br>
                            <div class="form-group">
                                <button type="submit" class="btn btn-warning btn-lg btn-block">submit phim</button>
                            </div>
                        </div>
                    </div>
                    </form>
                </div>
                <!-- /.card-body -->
        </div>

    </div>
</div>

@stop()
@section('css')
  <!--summernote-->
  <link rel="stylesheet" href="{{url('../public/adm')}}/plugins/summernote/summernote-bs4.min.css">
@stop()
@section('js')
  <!--summernote-->
<script src="{{url('../public/adm')}}/plugins/summernote/summernote-bs4.min.js"></script>
<script>
  $(function () {
    // Summernote
    $('#content').summernote({
        height:200,
    });
  });
</script>
<script>
    $(function () {
    //Initialize Select2 Elements
    $('.select2').select2()

    //Initialize Select2 Elements
    $('.select2bs4').select2({
      theme: 'bootstrap4'
    });
});
</script>
@stop()
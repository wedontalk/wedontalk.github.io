@extends('layouts.admin')
<link rel="stylesheet" href="../../plugins/summernote/summernote-bs4.min.css">
@section('main')

<div class="content-wrapper">
    <div class="card card-warning">
        <div class="card-header">
                    <h3 class="card-title">form nhập phim</h3>
                </div>
                <!-- /.card-header -->
                <div class="card-body">
                    <form action="{{route('phim.update',$phim->id)}}" method="POST" enctype="multipart/form-data" >
                    @csrf @method('PUT')
                    <div class="row">
                        <div class="col-sm-4">
                        <!-- text input -->
                        <div class="form-group">
                            <label>Tên Phim (*)</label>
                            <input type="text" value="{{$phim->name}}" name="name" class="form-control" placeholder="Nhập tên phim">
                            @error('name')
                            <small>{{$message}}</small>
                            @enderror
                        </div>
                        </div>
                        <div class="col-sm-4">
                        <div class="form-group">
                            <label>Thể loại (*)</label>
                            <small>Thể loại hiện tại : {{$phim->cat->name}}</small>
                            <select name="category_id" class="form-control is-warning">
                            <option value="{{$phim->cat->id}}">Thể loại hiện tại : {{$phim->cat->name}}</option>
                            @foreach($cats as $cat)
                            <option value="{{$cat->id}}">{{$cat->name}}</option>
                            @endforeach
                            </select>
                        </div>
                        </div>
                        <div class="col-sm-4">
                        <div class="form-group">
                            <label>Hình ảnh phim (*)</label><span>hình hiện tại : {{$phim->image}}</span>
                            <div class="custom-file">
                                <input type="file" name="file_upload" class="custom-file-input is-invalid" id="customFile">
                                <label class="custom-file-label" for="customFile">Choose file</label>
                                @error('name')
                                <small>{{$message}}</small>
                                @enderror
                            </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-sm-4">
                            <div class="form-group">
                                <label>Tên Phim 2 (*)</label>
                                <input type="text" name="name2" value="{{$phim->name2}}" class="form-control" placeholder="Nhập tên phim 2...">
                                @error('name')
                                <small>{{$message}}</small>
                                @enderror
                            </div>
                        </div>
                        <div class="col-sm-4">
                            <div class="form-group">
                                <label>sản xuất năm (*)</label>
                                <input type="text" name="year" value="{{$phim->year}}" class="form-control" placeholder="nhập năm sản xuất phim...">
                                @error('name')
                                <small>{{$message}}</small>
                                @enderror
                            </div>
                        </div>
                        <div class="col-sm-4">
                        <div class="form-group">
                            <label>Kiểu phim</label>
                            <small>Kiểu phim hiện tại : {{$phim->kieuphim->name}}</small>
                            <select class="form-control is-warning" value="{{$phim->type_movie}}"  name="type_movie">
                            <option value="{{$phim->kieuphim->id}}"> kiểu phim hiện tại : {{$phim->kieuphim->name}}</option>
                            @foreach($kieuphim as $kp)
                            <option value="{{$kp->id}}">{{$kp->name}}</option>
                            @endforeach
                            </select>
                        </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-sm-9">
                        <!-- textarea -->
                        <div class="form-group">
                            <label>Mô tả phim</label>
                            <textarea class="form-control" name="description" id="content" rows="10" placeholder="vui lòng nhập mô tả phim">{{$phim->description}}</textarea> 
                        </div>
                        </div>
                        <div class="col-sm-3">
                        <!-- select -->
                        <div class="form-group">
                            <label>Quốc gia phim (*)</label>
                            <select multiple name="nation_id" value="{{$phim->nation_id}}" class="form-control is-warning" style="height:250px">
                            <small>Thể loại hiện tại : {{$phim->cat->name}}</small>
                            <option value="{{$phim->quocgia->id}}" selected>{{$phim->quocgia->name}}</option>
                            <option>--------------------------------------------</option>
                                @foreach($quocgia as $qg)
                                <option value="{{$qg->id}}">{{$qg->name}}</option>
                                @endforeach
                            </select>
                        </div>
                        </div>
                    </div>
                    
                    <div class="row">
                    <div class="col-sm-6">
                        <div class="form-group">
                            <label class="col-form-label" for="inputWarning"><i class="far fa-bell"></i>Thời lượng phim</label>
                            <input type="text" value="{{$phim->duration}}" name="duration" class="form-control" id="inputWarning" placeholder="Enter ...">
                            @error('name')
                            <small>{{$message}}</small>
                            @enderror
                        </div>
                    </div>
                    <div class="col-sm-6">
                        <div class="form-group">
                            <label class="col-form-label" for="inputWarning"><i class="far fa-bell"></i>Tác giả</label>
                            <input type="text" value="{{$phim->author}}" name="author" class="form-control" id="inputWarning" placeholder="Enter ...">
                            @error('name')
                            <small>{{$message}}</small>
                            @enderror
                        </div>
                    </div>

                    </div>
                    <!-- input states -->
                    <div class="row">
                        <div class="col-sm-6">
                            <div class="form-group">
                                <label class="col-form-label" for="inputSuccess"><i class="fas fa-check"></i>Trạng thái phim</label>
                                <input type="text" value="{{$phim->status}}" name="status" class="form-control is-valid" id="inputSuccess" placeholder="Enter ...">
                                @error('name')
                                <small>{{$message}}</small>
                                @enderror
                                </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="form-group">
                                <label class="col-form-label" for="inputWarning"><i class="far fa-bell"></i>Đạo diễn</label>
                                <input type="text" value="{{$phim->director}}" name="director" class="form-control is-warning" id="inputWarning" placeholder="Enter ...">
                                @error('name')
                                <small>{{$message}}</small>
                                @enderror
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="form-group">
                                <label class="col-form-label" for="inputError"><i class="far fa-times-circle"></i>Diễn viên</label>
                                <input type="text" value="{{$phim->actor}}" name="actor" class="form-control is-invalid" id="inputError" placeholder="Enter ...">
                                @error('name')
                                <small>{{$message}}</small>
                                @enderror
                            </div>
                        </div>
                        <div class="col-sm-2">
                            <div class="form-group">
                            <label class="col-form-label">Check ẩn hiện phim</label>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="anHien" value="1">
                                <label class="form-check-label" for="inlineRadio1">Hiện</label>
                            </div>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="anHien" value="0">
                                <label class="form-check-label" for="inlineRadio2">Ẩn</label>
                            </div>
                            </div>
                        </div>
                        <div class="col-sm-4">
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
  <link rel="stylesheet" href="{{asset('adm/plugins/summernote/summernote-bs4.min.css')}}">
@stop()
@section('js')
  <!--summernote-->
  <script src="{{asset('adm/plugins/summernote/summernote-bs4.min.js')}}"></script>
<script>
  $(function () {
    // Summernote
    $('#content').summernote({
        height:200,
    });
  });
</script>
@stop()
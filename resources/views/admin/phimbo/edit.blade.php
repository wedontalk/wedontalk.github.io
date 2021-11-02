@extends('layouts.admin')
@section('main')

<div class="content-wrapper">
    <div class="container">
    <center><h3>form nhập thể loại</h3></center>
    <hr>
    <form action="{{route('phimbo.update',$phimbo->id)}}" method="POST" role="form">
    @csrf @method('PUT')
    <div class="form-group">
          <label for="">id phim</label>
          <input type="text" value="{{$phimbo->id}}" class="form-control" name="id" placeholder="id">
          @error('name')
          <small class="form-text text-muted">{{$message}}</small>
          @enderror
        </div>
        <div class="form-group">
          <label for="">Tên loại phim</label>
          <input type="text" value="{{$phimbo->name}}" class="form-control" name="name" placeholder="nhập tên loại phim">
          @error('name')
          <small class="form-text text-muted">{{$message}}</small>
          @enderror
        </div>
        <div class="form-group">
          <label for="">năm thể loại</label>
          <input type="text" value="{{$phimbo->year}}" class="form-control" name="year" placeholder="nhập năm....">
          @error('name')
          <small class="form-text text-muted">{{$message}}</small>
          @enderror
        </div>
        <div class="form-group">
          <label for="">slug thể loại</label>
          <input type="text" value="{{$phimbo->slug_series}}" class="form-control" name="slug_series" placeholder="nhập slug phim bộ...">
          @error('name')
          <small class="form-text text-muted">{{$message}}</small>
          @enderror
        </div>
        <hr>
        <h5>Check ẩn hiện loại phim</h5>
        <div class="row">
        <div class="form-check" style="margin-left:10px">
            <input class="form-check-input" type="radio" name="anHien" value="1" checked>
            <label class="form-check-label">
                Hiện danh mục
            </label>
        </div>
        <div class="form-check" style="margin-left:100px">
            <input class="form-check-input" type="radio" name="anHien" value="0">
            <label class="form-check-label">
                Ẩn danh mục
            </label>
        </div>
        </div>
        <hr>
        <button type="submit" class="btn btn-warning btn-lg btn-block">submit</button>
    </form>
    </div>
</div>

@stop()
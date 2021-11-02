@extends('layouts.admin')
@section('main')

<div class="content-wrapper">
    <div class="container">
    <center><h3>form nhập thể loại</h3></center>
    <hr>
    <form action="{{route('phimchieurap.store')}}" method="POST" role="form">
    @csrf
    <div class="form-group">
          <label for="">id phim</label>
          <input type="text" class="form-control" name="id" placeholder="id" require>
        </div>
        <div class="form-group">
          <label for="">Tên thể loại</label>
          <input type="text" class="form-control" name="name" placeholder="nhập tên loại phim">
        </div>
        <div class="form-group">
          <label for="">năm thể loại</label>
          <input type="text" class="form-control" name="year" placeholder="nhập năm phim">
        </div>
        <div class="form-group">
          <label for="">slug thể loại</label>
          <input type="text" class="form-control" name="slug_theater" placeholder="nhập slug_phim bộ">
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
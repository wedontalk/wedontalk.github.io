@extends('layouts.admin')
@section('main')

<div class="content-wrapper">
    <div class="container">
    <center><h3>sửa phần quyền</h3></center>
    <hr>
    <form action="{{route('account.update',$account->id)}}" method="POST" role="form">
    @csrf @method('PUT')
        <div class="form-group">
          <label for="">Tên loại phim</label>
          <input type="text" value="{{$account->name}}" class="form-control" placeholder="nhập tên loại phim" disable>
        </div>
        <hr>
        <h5>Check phân quyền</h5>
        <div class="row">
        <div class="form-check" style="margin-left:10px">
            <input class="form-check-input" type="radio" name="role" value="1" checked>
            <label class="form-check-label">
                user
            </label>
        </div>
        <div class="form-check" style="margin-left:100px">
            <input class="form-check-input" type="radio" name="role" value="0">
            <label class="form-check-label">
                admin
            </label>
        </div>
        </div>
        <hr>
        <button type="submit" class="btn btn-warning btn-lg btn-block">submit</button>
    </form>
    </div>
</div>

@stop()
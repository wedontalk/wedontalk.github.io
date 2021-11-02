@extends('layouts.admin')
@section('main')

<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <table class="table table-hover">
            <thead>
                <tr class="btn-primary">
                    <th>id</th>
                    <th>Tên loại phim</th>
                    <th class="text-center">số lượng phim</th>
                    <th class="text-center">Trạng thái</th>
                    <th style="width:250px">
                        <form class="form-inline my-2 my-lg-0 justify-content-end" action="" method="GET" role="form">
                            <div class="input-group input-group-sm">
                                <input class="form-control" type="search" placeholder="tìm kiếm..." aria-label="Search" name="key">
                                <div class="input-group-append">
                                <button class="btn btn-warning" type="submit">
                                    <i class="fas fa-search"></i>
                                </button>
                                </div>
                            </div>
                        </form>
                    </th>
                </tr>
            </thead>
            <tbody>
            @foreach($data as $t)
                <tr>
                    <td>{{$t->id}}</td>
                    <td>{{$t->name}}</td>
                    <td class="text-center">{{$t->products->count()}}</td>
                    <td class="text-center">
                        @if($t->anHien == 0)
                            <span class="badge badge-danger">Danh mục Ẩn</span>
                        @else
                            <span class="badge badge-success">Danh mục Hiện</span>
                        @endif
                    </td>
                    <td class="text-right">
                        <a href="" class="btn btn-sm btn-success"><i class="fas fa-edit"></i></a>
                        <a href="" class="btn btn-sm btn-danger"><i class="fas fa-trash"></i></a>
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>
        <hr>
        <div class="">{{$data->appends(request()->all())->links()}}</div>
    <!-- /.content -->
  </div>

@stop()
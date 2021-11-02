@extends('layouts.admin')
@section('main')

<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <table class="table table-hover" style="">
    <x-alert></x-alert>
            <thead>
                <tr class="btn-primary">
                    <th>id</th>
                    <th>Tên thể loại phim</th>
                    <th class="text-center">số lượng phim</th>
                    <th class="text-center">Trạng thái</th>
                    <th style="width:250px">
                        <form class="form-inline my-2 my-lg-0 justify-content-end" action="" method="GET" role="form">
                            <div class="input-group input-group-sm">
                                <input class="form-control" type="search" placeholder="tìm kiếm..." aria-label="Search" name="key">
                                <div class="input-group-append">
                                <button class="btn btn-warning" type="submit" style="z-index:0">
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
                        <a href="{{route('phimbo.edit',$t->id)}}" class="btn btn-sm btn-success"><i class="fas fa-edit"></i></a>
                        <a href="{{route('phimbo.destroy',$t->id)}}" class="btn btn-sm btn-danger btndelete"><i class="fas fa-trash"></i></a>
                    </td>
                </tr>
            @endforeach
            </tbody>
            <a href="phimbo/create">thêm phim bộ</a>
        </table>
        <form method="POST" action="" id="form-delete">
        @method('DELETE')
        @csrf
        </form>
        <hr>
        <div class="">{{$data->appends(request()->all())->links()}}</div>
    <!-- /.content -->
  </div>

@stop()

@section('js')
    <script>
        $('.btndelete').click(function(ev) {
            ev.preventDefault();
            var _href = $(this).attr('href');
            $('form#form-delete').attr('action',_href);
            if(confirm('bạn muốn xóa chứ ?')){
                $('form#form-delete').submit();
            }
        })
    </script>
@stop()
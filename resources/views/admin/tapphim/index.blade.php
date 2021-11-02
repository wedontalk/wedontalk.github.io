@extends('layouts.admin')
@section('main')

<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <table class="table table-hover">
    <form class="form-inline my-2 my-lg-0 justify-content-end" action="" method="GET" role="form" style="z-index:2;">
        <div class="input-group">
            <input class="form-control" type="search" placeholder="tìm kiếm..." aria-label="Search" name="key">
            <div class="input-group-append">
            <button class="btn btn-warning" type="submit">
                <i class="fas fa-search"></i>
            </button>
            </div>
        </div>
    </form>
    <hr>
    <x-alert></x-alert>
            <thead>
                <tr class="btn-" style="background-color:#43D170">
                    <th>id</th>
                    <th>Tên loại phim</th>
                    <th>tập phim</th>
                    <th>tên tập phim</th>
                    <th>content phim</th>
                    <th>slug phim</th>
                    <th>ẩn hiện</th>
                    <th style="width:100px;" class="text-center">action</th>
                </tr>
            </thead>
            <tbody>
            @foreach($data as $t)
                <tr>
                    <td>{{$t->id}}</td>
                    <td>{{$t->products->name}}</td>
                    <td>{{$t->episode}}</td>
                    <td>{{$t->episode_name}}</td>
                    <td>{{$t->content}}</td>
                    <td>{{$t->slug_phim}}</td>
                    <td class="text-center">
                        @if($t->anHien == 0)
                            <span class="badge badge-danger">Ẩn</span>
                        @else
                            <span class="badge badge-success">Hiện</span>
                        @endif
                    </td>
                    <td class="text-right">
                        <a href="{{route('tapphim.edit',$t->id)}}" class="btn btn-sm btn-success"><i class="fas fa-edit"></i></a>
                        <a href="{{route('tapphim.destroy',$t->id)}}" class="btn btn-sm btn-danger btndelete"><i class="fas fa-trash"></i></a>
                    </td>
                </tr>
            @endforeach
            </tbody>
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
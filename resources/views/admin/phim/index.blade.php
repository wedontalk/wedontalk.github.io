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
                    <th>Thể loại</th>
                    <th>Đạo diễn</th>
                    <th>Tập phim</th>
                    <th>Tác giả</th>
                    <th>Kiểu phim</th>
                    <th>Quốc gia</th>
                    <!-- <th class="text-center">Mô tả</th> -->
                    <th>Hình đại diện</th>
                    <th>Trạng thái</th>
                    <th>Số tập phim</th>
                    <th style="width:100px;" class="text-center">action</th>
                </tr>
            </thead>
            <tbody>
            @foreach($data as $t)
                <tr>
                    <td>{{$t->id}}</td>
                    <td>{{$t->name}}</td>
                    <td>{{$t->cat->name}}</td>
                    <td>{{$t->director}}</td>
                    <td>{{$t->status}}</td>
                    <td>{{$t->author}}</td>
                    <td>{{$t->kieuphim->name}}</td>
                    <td>{{$t->quocgia->name}}</td>
                    <!-- <td>{{$t->description}}</td> -->
                    <td><img src="/uploads/{{$t->image}}" alt="" width="100px" height="100px"></td>
                    <td class="text-center">
                        @if($t->anHien == 0)
                            <span class="badge badge-danger">Ẩn</span>
                        @else
                            <span class="badge badge-success">Hiện</span>
                        @endif
                    </td>
                    <td>{{$t->tapphim()->count()}}</td>
                    <td class="text-right">
                        <a href="{{route('phim.edit',$t->id)}}" class="btn btn-sm btn-success"><i class="fas fa-edit"></i></a>
                        <a href="{{route('phim.destroy',$t->id)}}" class="btn btn-sm btn-danger btndelete"><i class="fas fa-trash"></i></a>
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
<ul class="container menu">
    <li class="home"><a href="{{route('home.index')}}" title=""></a></li>
    <li class=""><a>thể loại</a>
        <ul class="sub-menu" style="width: 260px; display: none;">
        @if($menu)
        @foreach($menu as $mn)
                    <li class=""><a href="{{url('the-loai/'.$mn->id)}}">{{$mn->name}}</a></li>
        @endforeach
        @endif

        </ul>
      </li>
          <li class=""><a>quốc gia</a>
        <ul class="sub-menu" style="width: 260px; display: none;">
        @foreach($menuqg as $qg)
                    <li class=""><a href="{{url('quoc-gia/'.$qg->id)}}">{{$qg->name}}</a></li>
        @endforeach
        </ul>
      </li>
          <li class=""><a>phim lẻ</a>
        <ul class="sub-menu" style="width: 260px; display: none;">
        @foreach($menupls as $pl)
                    <li class=""><a href="{{url('phim-le/'.$pl->slug_single)}}">{{$pl->name}}</a></li>
        @endforeach
        </ul>
      </li>
          <li class=""><a>phim bộ</a>
        <ul class="sub-menu" style="width: 260px; display: none;">
        @foreach($menupbs as $pb)
                    <li class=""><a href="{{url('phim-bo/'.$pb->slug_series)}}">{{$pb->name}}</a></li>
        @endforeach
        </ul>
      </li>
          <li class=""><a>phim chiếu rạp</a>
        <ul class="sub-menu" style="width: 260px; display: none;">
        @foreach($menupcrs as $cr)
                    <li class=""><a href="{{url('phim-chieu-rap/'.$cr->slug_theater)}}">{{$cr->name}}</a></li>
        @endforeach
        </ul>
      </li>
</ul>
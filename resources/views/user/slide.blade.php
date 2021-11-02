<ul class="listfilm overview owl-carousel owl-theme">
    @foreach($slidephim as $ptoanbo)
        <li class="item"><a href="{{url('chi-tiet/'.$ptoanbo->name2)}}" title="MẬT NGỮ DIỆT VONG" class="movie-hot-link" style="background-image: url({{asset('uploads')}}/{{$ptoanbo->image}});"></a>
          <div class="overlay">
            <div class="name"><a href="{{url('chi-tiet/'.$ptoanbo->name2)}}" title="MẬT NGỮ DIỆT VONG">{{ $ptoanbo->name }}</a></div>
            <div class="name2">{{ $ptoanbo->name2 }}</div>
          </div>
          <div class="status">{{ $ptoanbo->status }}</div>
        </li>
    @endforeach
  </ul>
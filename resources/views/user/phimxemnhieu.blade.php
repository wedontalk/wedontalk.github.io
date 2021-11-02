<div class="block" id="chart">
    <div class="blocktitle"><i class="icon top"></i>
      <div class="title">Phim xem nhiều</div>
    </div>
    <div class="tabs" data-target="#topview">
      <div id="topviewday" class="tab active">Phim lẻ</div>
      <div id="topviewweek" class="tab">Phim bộ</div>
      <div id="topviewmonth" class="tab">Phim chiếu rạp</div>
    </div>
    <div class="blockbody" id="topview">
      <ul class="tab topviewday">
        @foreach($topphimle as $tphimle)
          <li><span class="st top">1</span>
            <div class="detail">
              <div class="name"><a href="{{url('chi-tiet/'.$tphimle->name2)}}" title="{{ $tphimle->name }}">{{ $tphimle->name }}</a></div>
              <div class="views">Lượt xem {{ $tphimle->num_view }}</div>
            </div>
          </li>
        @endforeach
      </ul>
      <ul class="tab topviewweek hide">
        @foreach($topphimbo as $tphimbo)
          <li><span class="st top">1</span>
            <div class="detail">
              <div class="name"><a href="{{url('chi-tiet/'.$tphimbo->name2)}}" title="{{ $tphimbo->name }}">{{ $tphimbo->name }}</a></div>
              <div class="views">Lượt xem {{ $tphimbo->num_view }}</div>
            </div>
          </li>
        @endforeach
      </ul>
      <ul class="tab topviewmonth hide">
        @foreach($topchieurap as $tchieurap)
            <li><span class="st top">1</span>
              <div class="detail">
                <div class="name"><a href="{{url('chi-tiet/'.$tchieurap->name2)}}" title="{{ $tchieurap->name }}">{{ $tchieurap->name }}</a></div>
                <div class="views">Lượt xem {{ $tchieurap->num_view }}</div>
              </div>
            </li>
        @endforeach
      </ul>
    </div>
    <script type="text/javascript">
      $('#topviewday').click(function(){
        $(this).addClass('active');
        $('#topviewweek').removeClass('active');
        $('#topviewmonth').removeClass('active');
        $('ul.topviewday').removeClass('hide');
        $('ul.topviewweek').addClass('hide');
        $('ul.topviewmonth').addClass('hide');
      })
      $('#topviewweek').click(function(){
        $(this).addClass('active');
        $('#topviewday').removeClass('active');
        $('#topviewmonth').removeClass('active');
        $('ul.topviewweek').removeClass('hide');
        $('ul.topviewday').addClass('hide');
        $('ul.topviewmonth').addClass('hide');
      })
      $('#topviewmonth').click(function(){
        $(this).addClass('active');
        $('#topviewweek').removeClass('active');
        $('#topviewday').removeClass('active');
        $('ul.topviewmonth').removeClass('hide');
        $('ul.topviewweek').addClass('hide');
        $('ul.topviewday').addClass('hide');
      })
    </script>
  </div>
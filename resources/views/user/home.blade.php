@extends('layouts.site')

@section('main')
<style>
  .pagination{
    width: 100%;
    list-style: none;
    margin-left: 80%;
  }
  .page-link{
    font-weight: bold;
    margin-right:15px;
  }
  .page-item{
    display: inline;
  }
</style>
<div id="body-wrap" class="container">
      <div id="movie-hot" class="viewport">
  <div class="prev"></div>
    @include('user.slide');
  <div class="next"></div>
</div>
<script type="text/javascript">
  $('.overview').owlCarousel({
      items:4,
      loop:true,
      autoPlay: true,
      nav: true,
      dots: false,
      slideSpeed : 3000,
      navContainer:  $(this).prev('.owl-nav-wrap').find('.owl-nav-container'),
    });
    $( ".owl-prev").html('<div class="prev"></div>');
    $( ".owl-next").html('<div class="next"></div>');
</script>
      <div id="content">
  <div class="block" id="movie-recommend">
    <div class="col">
      <div class="blocktitle">
        <div class="tabs" data-target="#phim-bo-hay">
          <div class="tab active" data-name="phim-bo-moi">Top Phim Lẻ</div>
          <div class="tab" data-name="phim-bo-full">Top Phim Bộ</div>
        </div>
      </div>
      <div class="blockbody" id="phim-bo-hay">
        <ul class="list tab phim-bo-moi">
          @foreach($topphimle as $tpl)
            <li><a href="{{url('chi-tiet/'.$tpl->name2)}}" title="{{ $tpl->name }}">{{ $tpl->name }}</a><span>{{ $tpl->status }}</span></li>
          @endforeach
        </ul>
        <ul class="list tab phim-bo-full hide">
        @foreach($topphimbo as $tpb)
            <li><a href="{{url('chi-tiet/'.$tpb->name2)}}" title="{{ $tpb->name }}">{{ $tpb->name }}</a><span>{{ $tpb->status }}</span></li>
        @endforeach
        </ul>
      </div>
    </div>
    <script type="text/javascript">
      $('div[data-name="phim-bo-moi"]').click(function() {
        $('div[data-name="phim-bo-moi"]').addClass('active');
        $('div[data-name="phim-bo-full"]').removeClass('active');
        $('ul.phim-bo-moi').removeClass('hide');
        $('ul.phim-bo-full').addClass('hide');
      })
      $('div[data-name="phim-bo-full"]').click(function() {
        $('div[data-name="phim-bo-full"]').addClass('active');
        $('div[data-name="phim-bo-moi"]').removeClass('active');
        $('ul.phim-bo-full').removeClass('hide');
        $('ul.phim-bo-moi').addClass('hide');
      })
    </script>
  </div>
  <div class="block" id="movie-update">
    <div class="blocktitle">
      <div class="icon movie1"></div>
      <h3 class="title">Phim mới cập nhật</h3>
      <div class="types" data-target="#list-movie-update">
        <div class="type"><a data-name="toan-bo" class="btn active">Toàn bộ</a></div>
        <div class="type"><a data-name="phim-le" class="btn" href="javascript:void();" title="Phim lẻ">Phim lẻ</a></div>
        <div class="type"><a data-name="phim-bo" class="btn" href="javascript:void();" title="Phim bộ">Phim bộ</a></div>
      </div>
    </div>
    <div class="blockbody" id="list-movie-update">
      <div class="tab toan-bo ">
        <ul class="list-film">
          @foreach($tcphim as $ptoanbo)
            <li data-liked="852" data-views="49,875">
              <div class="inner"><a href="{{url('chi-tiet/'.$ptoanbo->name2)}}" title="TRƯỚC NGÀY HỦY DIỆT NHÂN LOẠI"><img src="{{asset('uploads')}}/{{$ptoanbo->image}}"></a>
                <div class="info">
                  <div class="name"><a href="{{url('chi-tiet/'.$ptoanbo->name2)}}" title="TRƯỚC NGÀY HỦY DIỆT NHÂN LOẠI">{{ $ptoanbo->name }}</a></div>
                  <div class="name2">{{ $ptoanbo->name2 }}</div>
                </div>
                <div class="status">{{ $ptoanbo->status }}</div>
              </div>
            </li>
          @endforeach
        </ul>
        <div class="">{{$tcphim->links()}}</div>
      </div>
      <div class="tab phim-le hide">
        <ul class="list-film tab phim-le">
          @foreach($lephim as $phiml)
            <li data-liked="3,987" data-views="94,650">
              <div class="inner"><a href="{{url('chi-tiet/'.$phiml->name2)}}" title="EUREKA SEVEN THE MOVIE"><img src="{{asset('uploads')}}/{{$phiml->image}}" alt=""></a>
                <div class="info">
                  <div class="name"><a href="{{url('chi-tiet/'.$phiml->name2)}}" title="{{ $phiml->name }}">{{ $phiml->name }}</a></div>
                  <div class="name2">{{ $phiml->name2 }}</div>
                </div>
                <div class="status">{{ $phiml->status }}</div>
              </div>
            </li>
          @endforeach  
        </ul>
      </div>
      <div class="tab phim-bo hide">
        <ul class="list-film">
        @foreach($bophim as $pbo)
            <li data-liked="3,987" data-views="94,650">
                <div class="inner"><a href="{{url('chi-tiet/'.$pbo->name2)}}" title="EUREKA SEVEN THE MOVIE"><img src="{{asset('uploads')}}/{{$pbo->image}}"></a>
                  <div class="info">
                    <div class="name"><a href="{{url('chi-tiet/'.$pbo->name2)}}" title="EUREKA SEVEN THE MOVIE">{{ $pbo->name }}</a></div>
                    <div class="name2">{{ $pbo->name2 }}</div>
                  </div>
                  <div class="status">{{ $pbo->status }}</div>
                </div>
            </li>
        @endforeach
        </ul>
      </div>
    </div>
    <script type="text/javascript">
      $('a[data-name="toan-bo"]').click(function(){
        $('a[data-name="toan-bo"]').addClass('active');
        $('a[data-name="phim-le"]').removeClass('active');
        $('a[data-name="phim-bo"]').removeClass('active');
        $('div.toan-bo').removeClass('hide');
        $('div.phim-le').addClass('hide');
        $('div.phim-bo').addClass('hide');
        $('div.toan-bo > ul.list-film').addClass('tab', 'toan-bo');
        $('div.phim-le > ul.list-film').removeClass('tab','phim-le');
        $('div.phim-bo > ul.list-film').removeClass('tab','phim-bo');
      });
      $('a[data-name="phim-le"]').click(function(){
        $('a[data-name="phim-le"]').addClass('active');
        $('a[data-name="toan-bo"]').removeClass('active');
        $('a[data-name="phim-bo"]').removeClass('active');
        $('div.phim-le').removeClass('hide');
        $('div.toan-bo').addClass('hide');
        $('div.phim-bo').addClass('hide');
        $('div.phim-le > ul.list-film').addClass('tab', 'phim-le');
        $('div.toan-bo > ul.list-film').removeClass('tab','toan-bo');
        $('div.phim-bo > ul.list-film').removeClass('tab','phim-bo');
      });
      $('a[data-name="phim-bo"]').click(function(){
        $('a[data-name="phim-bo"]').addClass('active');
        $('a[data-name="phim-le"]').removeClass('active');
        $('a[data-name="toan-bo"]').removeClass('active');
        $('div.phim-bo').removeClass('hide');
        $('div.toan-bo').addClass('hide');
        $('div.phim-le').addClass('hide');
        $('div.phim-bo > ul.list-film').addClass('tab', 'phim-bo');
        $('div.toan-bo > ul.list-film').removeClass('tab','toan-bo');
        $('div.phim-le > ul.list-film').removeClass('tab','phim-le');
      });
    </script>
  </div>
  <div class="block">
    <div class="blocktitle">
      <div class="icon movie1"></div>
      <h3 class="title"><a title="PHIM HÀNH ĐỘNG" href="javascript:void();">PHIM HÀNH ĐỘNG</a></h3>
      <div class="more"><a href="/the-loai/7">Xem thêm</a> »</div>
    </div>
    <div class="blockbody" id="list-movie-update">
      <div class="tab">
        <ul class="list-film tab ">
        @foreach($phimhanhdong as $phdne)
          <li data-liked="238" data-views="33,450">
            <div class="inner"><a href="{{url('chi-tiet/'.$phdne->name2)}}" title="VỊ VUA TRÁI PHÁP"><img src="{{asset('uploads')}}/{{$phdne->image}}" alt=""></a>
              <div class="info">
                <div class="name"><a href="{{url('chi-tiet/'.$phdne->name2)}}" title="VỊ VUA TRÁI PHÁP">{{ $phdne->name }}</a></div>
                <div class="name2">{{ $phdne->name2 }}</div>
              </div>
              <div class="status">{{ $phdne->status }}</div>
            </div>
          </li>
        @endforeach
        </ul>
      </div>
    </div>
  </div>
  <div class="block">
    <div class="blocktitle">
      <div class="icon movie1"></div>
      <h3 class="title"><a title="PHIM BỘ MỚI" href="javascript:void();">PHIM THUYẾT MINH</a></h3>
      <div class="more"><a href="/the-loai/1">Xem thêm</a> »</div>
    </div>
    <div class="blockbody" id="list-movie-update">
      <div class="tab">
        <ul class="list-film tab">
        @foreach($phimthuyetminh as $tmne)
          <li data-liked="238" data-views="33,450">
            <div class="inner"><a href="{{url('chi-tiet/'.$tmne->name2)}}" title="VỊ VUA TRÁI PHÁP"><img src="{{asset('uploads')}}/{{$tmne->image}}" alt=""></a>
              <div class="info">
                <div class="name"><a href="{{url('chi-tiet/'.$tmne->name2)}}" title="VỊ VUA TRÁI PHÁP">{{ $tmne->name }}</a></div>
                <div class="name2">{{ $tmne->name2 }}</div>
              </div>
              <div class="status">{{ $tmne->status }}</div>
            </div>
          </li>
        @endforeach
        </ul>
      </div>
    </div>
  </div>
</div>
      <div id="sidebar">
        @include('user.phimxemnhieu')
  <div class="block ad_location">
    <div class="ad-img" style="width:300; height:250; display:block; margin-top:13px;">
      <!-- <img src="{{asset('site/images/ad-img.p')}}ng" alt=""> -->
    </div>
    <div class="ad-img" style="width:300; height:250; display:block; margin-top:13px;">
      <!-- <img src="{{asset('site/images/ad-img.p')}}ng" alt=""> -->
    </div>
  </div>
</div>
    </div>
    <script>
      $('.pagination a').unbind('click').on('click', function(e) {
             e.preventDefault();
             var page = $(this).attr('href').split('page=')[1];
             getPosts(page);
       });
      
       function getPosts(page)
       {
            $.ajax({
                 type: "GET",
                 url: '?page='+ page
            })
            .success(function(data) {
                 $('body').html(data);
            });
       }
    </script>
@endsection

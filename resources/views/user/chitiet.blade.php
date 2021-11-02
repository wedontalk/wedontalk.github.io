@extends('layouts.site')
<link href="{{asset('site/css/style-detail.css')}}" type="text/css" rel="stylesheet">
@section('main')
<style>
  .fb-comments{
    background-color:#fff;
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
  <div class="block" id="page-info">
    <div class="blocktitle breadcrumbs">
        <div class="item">
            <a href="#" title="Xem Phim Nhanh, Xem Phim Online chất lượng cao miễn phí">
                <span>Xem phim</span>
            </a>
        </div>
        <div class="item">
            <a href="#"><span>Phim chiếu rạp</span></a>
        </div>
        <div class="item last-child">
            <span itemprop="title">KIẾM TAM – HIỆP CAN NGHĨA ĐẢM THẨM KIẾM TÂM</span>
        </div>
    </div>
    <div class="info">
      @foreach($phimtc as $phimid)
        <h2 class="title fr">{{$phimid->name}}</h2>
        <input type="hidden" class="title fr" id="phim_name{{$phimid->id}}" value="{{$phimid->name}}" />
        <div class="poster"><a href="#" title="Xem phim KIẾM TAM – HIỆP CAN NGHĨA ĐẢM THẨM KIẾM TÂM"><img id="phim_image{{$phimid->id}}" src="{{asset('uploads')}}/{{$phimid->image}}" alt="KIẾM TAM – HIỆP CAN NGHĨA ĐẢM THẨM KIẾM TÂM"></a></div>
        <div class="name2 fr">
            <h3>{{$phimid->name2}}</h3><span class="year" style="font-size:12px">{{$phimid->year}}</span>
        </div>
        <div class="dinfo">
            <div class="col1 fr">
                <ul>
                    <li>Status: <span class="status1">{{$phimid->status}} </span></li>
                    <li>Đạo diễn: {{$phimid->actor}}</li>
                    <li>Diễn viên: {{$phimid->director}}</li>
                    <li>Thể loại: <a href="the-loai/phim-hanh-dong/" title="Phim Hành Động">{{$phimid->cat->name}}</a></li>
                    <li>phim yêu thích :
                      <button class="button_wishlist" id="{{$phimid->id}}" onclick="add_wishlist(this.id);">
                        <span>yêu thích</span>
                      </button>
                    </li>
                </ul>
            </div>
            <div class="col2">
                <ul>
                    <li>Quốc gia: <a href="{{$phimid->quocgia->id}}" title="Phim Mỹ">{{$phimid->quocgia->name}}</a></li>
                    <li>Thời lượng: {{$phimid->duration}} Phút</li>
                    <li>Lượt xem: {{$phimid->num_view}}</li>
                    <li>Đăng bởi: {{$phimid->author}}</li>
                </ul>
            </div>
        </div>
        <div class="groups-btn">
          @if($tap_phim)
            <a id="phim_url{{$phimid->id}}" href="{{url('xem-phim/'.$tap_phim->slug_phim)}}"><div class="btn-watch fr"></div></a>
          @else
          <div id="phim_url{{$phimid->id}}" onclick="alertify.error('phim có đâu mà đòi xem...');" class="btn-watch fr"></div>
          @endif
        </div>
      @endforeach  
    </div>
    @foreach($phimtc as $phimid)
    <div class="detail">
        <div class="blocktitle tab">Thông tin phim</div>
        <div class="content">
            <h4>Nội dung phim {{$phimid->name}}:</h4>
            <p>{{$phimid->description}}</p>
        </div>
    </div>
    @endforeach
  </div>
  <div class="fb-comments" data-href="https://developers.facebook.com/docs/plugins/comments#configurator" data-width="100%" data-numposts="1"></div>
</div>
      <div id="sidebar">
      @include('user.phimxemnhieu')

  <div class="block ad_location">
    <div class="ad-img" style="width:300; height:250; display:block; margin-top:13px;">
      <!-- <img src="{{'public/site'}}/images/ad-img.png" alt=""> -->
    </div>
    <div class="ad-img" style="width:300; height:250; display:block; margin-top:13px;">
      <!-- <img src="{{'public/site'}}/images/ad-img.png" alt=""> -->
    </div>
  </div>
</div>
    </div>

@stop()

<!-- JavaScript -->
<script src="//cdn.jsdelivr.net/npm/alertifyjs@1.13.1/build/alertify.min.js"></script>

<!-- CSS -->
<link rel="stylesheet" href="//cdn.jsdelivr.net/npm/alertifyjs@1.13.1/build/css/alertify.min.css"/>
<!-- Default theme -->
<link rel="stylesheet" href="//cdn.jsdelivr.net/npm/alertifyjs@1.13.1/build/css/themes/default.min.css"/>
<!-- Semantic UI theme -->
<link rel="stylesheet" href="//cdn.jsdelivr.net/npm/alertifyjs@1.13.1/build/css/themes/semantic.min.css"/>
<!-- Bootstrap theme -->
<link rel="stylesheet" href="//cdn.jsdelivr.net/npm/alertifyjs@1.13.1/build/css/themes/bootstrap.min.css"/>

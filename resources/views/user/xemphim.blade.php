@extends('layouts.site')
<link rel="stylesheet" type="text/css" media="screen" href="{{asset('site/css/style_watch.css')}}" />
@section('main')

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
    <div  id="movie-display">
        <div class="row cur-location">
            <nav id="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item">
                        <a href="/">Xem phim</a>
                    </li>
                    /
                    <li class="breadcrumb-item">
                    <a href="?mod=list&type=single-movie&year=2018">Phim lẻ</a>
                    </li>
                    /
                    
                    <!-- <li class="breadcrumb-item active" aria-current="page">ádasd</li> -->
                    
                </ol>
            </nav>
        </div>
        <div class="row body_video">
            <div class="col-sm-12">
                <!-- <video width="100%" height="100%" controls>
                    <source src="" type="video/mp4">
                 <src="https://www.w3schools.com/tags/movie.mp4" type="video/mp4">
                </video> -->
                <div class="col-sm-12">
                <iframe src="{{$phimtc->content}}" width="670" height="390" frameborder="0" allow="autoplay; fullscreen; picture-in-picture" allowfullscreen title="film121-1.mp4"></iframe>
                </div>
            </div>
            <div class="share">
                <div class="row">
                    <a href="/kho-phim" class="btn btn-secondary">
                        <img src="{{asset('site/images/icons/plus.png')}}" alt="Share" width="20px"> danh sách phim yêu thích
                    </a>
                    <button type="button" class="btn btn-primary share_fb">
                    <div class="fb-share-button" data-href="https://developers.facebook.com/docs/plugins/" data-layout="button" data-size="small"><a target="_blank" href="https://www.facebook.com/sharer/sharer.php?u=https%3A%2F%2Fdevelopers.facebook.com%2Fdocs%2Fplugins%2F&amp;src=sdkpreparse" class="fb-xfbml-parse-ignore">Chia sẻ</a></div>
                    </button>
                    <button type="button" class="btn btn-secondary">AutoNext: On</button>
                    <button type="button" class="btn btn-secondary">Phóng to</button>
                    <button type="button" class="btn btn-secondary">
                        <img src="{{asset('site/images/icons/lamp.png')}}" alt="Share" width="20px"> Tắt đèn
                    </button>
                </div>

            </div>
        </div>
    </div>
    <div  id="detail">
        <div class="row">
            <p>Bạn đang xem phim
                <a href="#">TIA CHỚP ĐEN (PHẦN 1)</a> online chất lượng cao miễn phí tại server phim GD 1.</p>
            <fieldset>
                <legend>Hướng khắc phục lỗi xem phim</legend>
                <ul>
                    <li>Sử dụng DNS 8.8.8.8, 8.8.4.4 hoặc 208.67.222.222, 208.67.220.220 để xem phim nhanh
                        hơn.
                    </li>
                    <li>Chất lượng phim mặc định chiếu là 360. Để xem phim chất lượng cao hơn xin vui lòng
                        chọn trên player.</li>
                    <li>Xem phim nhanh hơn với trình duyệt Google Chrome, Cốc Cốc</li>
                    <li>Nếu bạn không xem được phim vui lòng nhấn CTRL + F5 hoặc CMD + R trên MAC vài lần.</li>
                </ul>
            </fieldset>
        </div>
    </div>
    <div  id="server-list">
        <div class="row">
            <div class="col-sm-3">
                tập phim
            </div>
            <div class="col-sm-9">
                <div class="row">
                  @foreach($all_phim as $phimn)
                    <a href="{{url('xem-phim/'.$phimn->slug_phim)}}" class="button btn-secondary seat" title="{{$phimn->episode_name}}">{{$phimn->episode_name}}</a>
                  @endforeach
                </div>
            </div>
        </div>
    </div>
</div>
      <div id="sidebar">
      @include('user.phimxemnhieu')
  <div class="block ad_location">
    <div class="ad-img" style="width:300; height:250; display:block; margin-top:13px;">
      <!-- <img src="{{asset('site/images/ad-img.png')}}" alt=""> -->
    </div>
    <div class="ad-img" style="width:300; height:250; display:block; margin-top:13px;">
      <!-- <img src="{{asset('site/images/ad-img.png')}}" alt=""> -->
    </div>
  </div>
</div>
    </div>
@stop()
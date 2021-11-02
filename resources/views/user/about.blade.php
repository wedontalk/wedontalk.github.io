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
  <div class="block" id="page-list">
    <div class="blocktitle breadcrumbs">
      <div class="item">
        <a href="/" title="Xem Phim Nhanh, Xem Phim Online chất lượng cao miễn phí">
          <span>Xem phim</span>
        </a>
      </div>
      <div class="item last-child">
        <span itemprop="title">Danh mục phim</span>
      </div>
    </div>
    <div class="filter">
            <!-- <form method="post" action="#">
              <div class="item"><span>Sắp xếp</span>
                <select class="input" name="filter_type">
                  <option value="">-Mặc định-</option>
                  <option value="">Mới nhất</option>
                  <option value="filter_name_asc">Tiêu đề phim A-Z</option>
                  <option value="filter_name_desc">Tiêu đề phim Z-A</option>
                  <option value="filter_view">Lượt xem</option>
                  <option value="filter_lenght">Thời lượng dài nhất</option>
                </select>
              </div>
              <div class="item hide"><span>Quốc gia</span>
                  <select class="input" name="filter_nation">
                    <option value="">-Mặc định-</option>
                    <option value="1">Mỹ</option>
                    <option value="2">Việt Nam</option>
                    <option value="3">Pháp</option>
                    <option value="4">Nhật Bản</option>
                    <option value="5">Hàn Quốc</option>
                    <option value="6">Anh</option>
                    <option value="7">Trung Quốc</option>
                    <option value="8">Ấn Độ</option>
                    <option value="9">Hồng Kông </option>
                    <option value="10">Thái Lan</option>
                </select>
              </div>
              <div class="item "><span>Năm</span>
                <select class="input" name="filter_year">
                  <option value="">-Mặc định-</option>
                  <option value="2018">2018</option>
                  <option value="2017">2017</option>
                  <option value="2016">2016</option>
                  <option value="2015">2015</option>
              </select>
              </div>
              <div class="btn1">
                <button type="submit" class="btn" id="locphim">Lọc phim</button>
              </div>
      </form> -->
    </div>
    <!-- <a href="detail.html"> -->
      <div class="blockbody" id="list-movie-update">
        <div class="tab toan-bo">
          <ul class="list-film tab toan-bo">
          @php
          $count = count($phimtc)
          @endphp
          @if($count == 0)
            <p>phim đang cập nhật...</p>
          @else
            @foreach($phimtc as $ptoanbo)
              <li data-liked="852" data-views="49,875">
                <div class="inner"><a href="{{url('chi-tiet/'.$ptoanbo->name2)}}" title="TRƯỚC NGÀY HỦY DIỆT NHÂN LOẠI"><img src="{{asset('uploads')}}/{{$ptoanbo->image}}" alt="Nhật Ký Trả Thù 2"></a>
                  <div class="info">
                    <div class="name"><a href="{{url('chi-tiet/'.$ptoanbo->name2)}}" title="TRƯỚC NGÀY HỦY DIỆT NHÂN LOẠI">{{ $ptoanbo->name }}</a></div>
                    <div class="name2">{{ $ptoanbo->name2 }}</div>
                  </div>
                  <div class="status">{{ $ptoanbo->status }}</div>
                </div>
              </li>
            @endforeach
          </ul>
          @endif
        </div>
      </div>
    </a>
  </div>
  <div class="row">
      <div class="">{{$phimtc->appends(request()->all())->links()}}</div>
  </div>
</div>
      <div id="sidebar">
      @include('user.phimxemnhieu')
  <div class="block ad_location">
    <div class="ad-img" style="width:300; height:250; display:block; margin-top:13px;">
      <!-- <img src="{{url('public/site')}}/images/ad-img.png" alt=""> -->
    </div>
    <div class="ad-img" style="width:300; height:250; display:block; margin-top:13px;">
      <!-- <img src="{{url('public/site')}}/images/ad-img.png" alt=""> -->
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
@stop()

<!DOCTYPE html>
<!-- saved from url=(0018)javascript:void(); -->
<html lang="vi" itemscope="itemscope" itemtype="http://schema.org/WebPage">

<head>
  <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
  <title>Index</title>
  <link href="{{ asset('site/css/owl.carousel.css')}}" type="text/css" rel="stylesheet">
  <link href="{{ asset('site/css/owl.theme.default.min.css')}}" type="text/css" rel="stylesheet">
  <link href="{{ asset('site/css/style.min.css')}}" type="text/css" rel="stylesheet">
  <link href="{{ asset('site/css/style_listfilm.css')}}" type="text/css" rel="stylesheet">
  <script src="{{ asset('site/js/jquery.min.js')}}" type="text/javascript"></script>
  <script src="{{ asset('site/js/owl.carousel.js')}}" type="text/javascript"></script>
  <script src="{{ asset('site/js/jwplayer.js')}}"></script>
</head>
<style type="text/css" media="screen">
    .owl-theme .owl-controls .owl-page {
      display: inline-block;
    }
    .owl-theme .owl-controls .owl-page span {
      background: none repeat scroll 0 0 #869791;
      border-radius: 20px;
      display: block;
      height: 12px;
      margin: 5px 7px;
      opacity: 0.5;
      width: 12px;
    }
</style>
<style media="screen" type="text/css">
  .owl-theme .owl-controls .owl-page {
    display: inline-block;
  }
  
  .owl-theme .owl-controls .owl-page span {
    background: none repeat scroll 0 0 #869791;
    border-radius: 20px;
    display: block;
    height: 12px;
    margin: 5px 7px;
    opacity: 0.5;
    width: 12px;
  }

  .owl-theme .owl-controls .active span {
    background-color: white !important;
  }

  .owl-theme .owl-pagination {
    display: flex;
    flex-wrap: wrap;
    justify-content: center;
  }
</style>
<body>
  <div id="wrapper">
    <div id="header">
  <div class="container">
    <h1 id="logo"><a href="{{route('home.index')}}" title="Xem Phim"></a></h1>
    <!-- <h1 id="logo"><img src="{{ asset('site/images/avatar/netphim.png')}}"width="150" height="50" alt=""></h1> -->
  <div id="search">
    <form action="" method="GET" role="form">
        <input type="search" autocomplete="off" placeholder="Tìm phim..." class="keyword" name="key">
        <button type="submit" class="submit"></button>
      </form>
    </div>
    <div id="sign">
  @if(Route::has('login'))
  @auth
  @if(Auth::user()->role == 1)
  <div class="login"><a rel="nofollow" id="log">{{ Auth::user()->name}}</a>
          <div class="login-form" id="login-form" style="display: none;">
            <div >
              <a href="{{route('admin.dashboard')}}" class="input" title="Hồ sơ" class="form-control">chuyển trang admin</a>
              <a href="{{url('/kho-phim')}}" class="input" title="kho phim yêu thích" class="form-control">kho phim yêu thích</a></div>
            </div>
      </div>
    <div class="links"><a href="{{ route('logout')}}" class="form-control" title="Đăng xuất" 
      onclick="event.preventDefault(); document.getElementById('logout-form').submit();"
      >Đăng xuất</a></div>
      <form action="{{ route('logout')}}" method="post" id="logout-form">
            @csrf
      </form>
    </div>
  @else
  <div class="login"><a rel="nofollow" id="log">{{ Auth::user()->name}}</a>
          <div class="login-form" id="login-form" style="display: none;">
            <div >
              <a href="#" class="input" title="Hồ sơ" class="form-control">Thông tin thành viên</a>
              <a href="" class="input" title="kho phim yêu thích" class="form-control">kho phim yêu thích</a></div>
            </div>
      </div>
    <div class="login"><a href="{{ route('logout')}}" class="form-control" title="Đăng xuất" 
      onclick="event.preventDefault(); document.getElementById('logout-form').submit();"
      >Đăng xuất</a></div>
      <form action="{{ route('logout')}}" method="post" id="logout-form">
            @csrf
      </form>
  </div>
  @endif
  @else
    <div class="login"><a rel="nofollow" href="{{route('login')}}" >Đăng nhập</a></div>
    <div class="links"><a rel="nofollow" href="{{route('register')}}">Đăng ký thành viên</a></div>
    @endif
  @endif
<style>
  #logout{
    background-position: 0 -41px;
    background-repeat: no-repeat;
    cursor: pointer;
    display: inline-block;
    font-weight: 700;
    height: 39px;
    line-height: 30px;
    text-align: center;
    width: 97px;
    /* background-image: url(../images/sprite.png?6); */
    background: black;
    color: #fff;
    margin-right: 10px;
}
</style>

</div>
</div>
</div>
    <script type="text/javascript">
      var x = document.getElementById("login-form");
      $('#log').on('click', function(){
        if (x.style.display === "none") {
            x.style.display = "block";
        } else {
            x.style.display = "none";
        }
      });
    </script>

    <!-- Van modified ↑↑ -->
<div id="nav">
  @include('user.menu')
</div>
<div id="nav2">
  <div class="container">
    <h2 class="title"></h2></div> <!--<h2 class="title">Xem phim online chất lượng cao</h2></div>-->
</div>
<!-- hết header-->

      @yield('main')

    <!--hết main-->
    <div id="footer">
  <div class="container">
    <div class="desc">
      <p><a href="javascript:void();" title="webphim">webphim</a> - <a href="javascript:void();" title="Xem phim online"><strong>Xem phim online</strong></a> miễn phí, chất lượng hình ảnh rõ nét, tốc độ tải phim nhanh, <a href="javascript:void();"
          title="Xem phim"><strong>xem phim</strong></a> không phải chờ đợi lâu. webphim luôn cập nhật <a title="Phim mới" href="javascript:void();"><strong>phim mới</strong></a> để mang đến cho các bạn những bộ <a title="Phim hành động"
          href="javascript:void();"><strong>phim hành động</strong></a>, võ thuật, <a title="Phim chiếu rạp" href="javascript:void();"><strong>phim chiếu rạp</strong></a>, các thể loại phim tâm lý, tình
        cảm cực lôi cuốn và hấp dẫn nhất. Đặc biệt website rất thân thiện với người dùng và hạn chế tối đa các quảng cáo gây khó chịu khi <strong>xem phim</strong>. Chúc các bạn <strong>xem phim</strong> vui vẻ.</p>
    </div>
    <div id="info">
      <div class="column">
        <div class="heading">Liên hệ</div>
        <ul>
          <li><a href="javascript:void();">Liên hệ quảng cáo</a></li>
          <li><a href="javascript:void();">Hợp tác nội dung</a></li>
          <li><a href="javascript:void();">Đăng tải phim</a></li>
        </ul>
      </div>
      <div class="column">
        <div class="heading">Điều khoản sử dụng</div>
        <ul>
          <li><a href="javascript:void();">Điều khoản chung</a></li>
          <li><a href="javascript:void();">Bản quyền và trách nhiệm nội dung</a></li>
        </ul>
  </div>
</div>
  </div>
<script type="text/javascript">
      function view(){
        if(localStorage.getItem('data')!=null){
          var data = JSON.parse(localStorage.getItem('data'));

          data.reverse();
          document.getElementById('row_wishlist').style.overflow = 'scroll';
          document.getElementById('row_wishlist').style.height = '100%';
          for(i=0;i<data.length;i++){
            var name = data[i].name;
            var image = data[i].image;
            var url = data[i].url;
            let deleteItem = true;
          
            $("#row_wishlist").append('<table class="table" border="1" cellspacing="0" cellpadding="10" width="100%"><tbody><tr><th width="100px"><img src="'+image+'" alt="" width="100"></th><th width="70%">'+name+'</th><td width="10%"><a href="'+url+'">xem ngay</a></td></tr></tbody></table>');
          }
        }
      }
      view();

    function add_wishlist(clicked_id){
      var id = clicked_id;
      var name = document.getElementById('phim_name'+id).value;
      var image = document.getElementById('phim_image'+id).src;
      var url = document.getElementById('phim_url'+id).href;

      var newItem = {
        'url': url,
        'id': id,
        'name': name,
        'image': image
      }

      if(localStorage.getItem('data') ==null){
        localStorage.setItem('data', '[]');
      }
      var old_data = JSON.parse(localStorage.getItem('data'));

      var matches = $.grep(old_data, function(obj){
        return obj.id == id;
      })

      if(matches.length){
        alertify.error('đã có trong kho phim rồi má...');
      }else{
        old_data.push(newItem);
      }
      localStorage.setItem('data', JSON.stringify(old_data));
      
    }
    $(document).on('click','#delete_withlist',function(event) {
              event.preventDefault();
              var id = $(this).data('id'); 
              if (result){
                for(var i = 0; i < result.length; i++) {
                    if(result[i].id == id) {
                     result.splice(i,i);
                     break;
                 }
              }
             localStorage.setItem('data',JSON.stringify(result));
         }
         if(result.length==1){
          for(var i = 0; i < result.length; i++) {
            if(result[i].id == id) {
             result.splice(i,1);
             break;
         }
     }
     localStorage.setItem('data',JSON.stringify(result));
 }

});
  </script>
  <div id="fb-root"></div>
  <div id="fb-root"></div>
<script async defer crossorigin="anonymous" src="https://connect.facebook.net/vi_VN/sdk.js#xfbml=1&version=v11.0&appId=2584724351850287&autoLogAppEvents=1" nonce="JvSgh4gS"></script>
</html>






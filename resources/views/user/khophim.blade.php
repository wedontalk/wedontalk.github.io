@extends('layouts.site')
<link href="{{asset('site/css/style-detail.css')}}" type="text/css" rel="stylesheet">
@section('main')
<div id="body-wrap" class="container">

<div class="scrollbar" id="style-11">
  <div class="force-overflow"></div>
</div>
    <center><h2 style="color:gray">kho phim của bạn</h2></center>
    <br>
    <div id="row_wishlist" class="row">

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

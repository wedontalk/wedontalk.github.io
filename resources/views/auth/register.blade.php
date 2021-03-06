@extends('layouts.site')
<link href="{{asset('site/css/style_info_account.min.css')}}" type="text/css" rel="stylesheet"> 
@section('main')
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
            <style type="text/css">
    .checkbox-inline{
      padding: 7px 0px 0px !important;
    }

    .form-register{
      padding: 10px;
      margin-bottom: 50px;
    }
    .form-control {
      background-color: #333 !important;
      border: 1px solid #111 !important;
      color: #b8b8b8 !important;
    }

    
    .col-lg-3,
    .col-lg-7,
    .col-lg-10 {
      position: relative;
      min-height: 1px;
      padding-left: 10px;
      padding-right: 10px;
    }

    .form-control {
      -webkit-box-sizing: border-box;
         -moz-box-sizing: border-box;
              box-sizing: border-box;
    }

    @media (min-width: 992px) {
    
      .col-lg-3,
     
      .col-lg-7,
     
      .col-lg-10 {
        float: left;
      }
   
      .col-lg-3 {
        width: 25%;
      }
   
      .col-lg-7 {
        width: 58.333333333333336%;
      }
    
      .col-lg-10 {
        width: 30%;
      }
      .col-offset-3 {
        margin-left: 25%;
      }
    }

    .form-control:-moz-placeholder {
      color: #999999;
    }

    .form-control::-moz-placeholder {
      color: #999999;
    }

    .form-control:-ms-input-placeholder {
      color: #999999;
    }

    .form-control::-webkit-input-placeholder {
      color: #999999;
    }

    .form-control {
      display: block;
      width: 100%;
      height: 38px;
      padding: 8px 12px;
      font-size: 14px;
      line-height: 1.428571429;
      color: #555555;
      vertical-align: middle;
      background-color: #ffffff;
      border: 1px solid #cccccc;
      border-radius: 4px;
      -webkit-box-shadow: inset 0 1px 1px rgba(0, 0, 0, 0.075);
              box-shadow: inset 0 1px 1px rgba(0, 0, 0, 0.075);
      -webkit-transition: border-color ease-in-out 0.15s, box-shadow ease-in-out 0.15s;
              transition: border-color ease-in-out 0.15s, box-shadow ease-in-out 0.15s;
    }

    .form-control:focus {
      border-color: rgba(82, 168, 236, 0.8);
      outline: none;
      -webkit-box-shadow: inset 0 1px 1px rgba(0, 0, 0, 0.075), 0 0 8px rgba(82, 168, 236, 0.6);
              box-shadow: inset 0 1px 1px rgba(0, 0, 0, 0.075), 0 0 8px rgba(82, 168, 236, 0.6);
    }

    .form-group {
      margin-bottom: 15px;
    }

    .radio,
    .checkbox {
      display: block;
      min-height: 20px;
      padding-left: 20px;
      margin-top: 10px;
      margin-bottom: 10px;
      vertical-align: middle;
    }

    .radio label,
    .checkbox label {
      display: inline;
      margin-bottom: 0;
      font-weight: normal;
      cursor: pointer;
    }

    .radio input[type="radio"],
    .radio-inline input[type="radio"],
    .checkbox input[type="checkbox"],
    .checkbox-inline input[type="checkbox"] {
      float: left;
      margin-left: -20px;
    }

    .radio + .radio,
    .checkbox + .checkbox {
      margin-top: -5px;
    }

    .radio-inline,
    .checkbox-inline {
      display: inline-block;
      padding-left: 20px;
      margin-bottom: 0;
      font-weight: normal;
      vertical-align: middle;
      cursor: pointer;
    }

    .radio-inline + .radio-inline,
    .checkbox-inline + .checkbox-inline {
      margin-top: 0;
      margin-left: 10px;
    }  


    .btn {
      display: inline-block;
      padding: 8px 12px;
      margin-bottom: 0;
      font-size: 14px;
      font-weight: 500;
      line-height: 1.428571429;
      text-align: center;
      white-space: nowrap;
      vertical-align: middle;
      cursor: pointer;
      border: 1px solid transparent;
      border-radius: 4px;
      margin-left: 10px;
    }



    .btn-primary {
      color: #ffffff;
      background-color: #428bca;
      border-color: #428bca;
    }

    .btn-primary:hover,
    .btn-primary:focus,
    .btn-primary:active,
    .btn-primary.active {
      background-color: #357ebd;
      border-color: #3071a9;
    }

    .btn-primary.disabled,
    .btn-primary[disabled],
    fieldset[disabled] .btn-primary,
    .btn-primary.disabled:hover,
    .btn-primary[disabled]:hover,
    fieldset[disabled] .btn-primary:hover,
    .btn-primary.disabled:focus,
    .btn-primary[disabled]:focus,
    fieldset[disabled] .btn-primary:focus,
    .btn-primary.disabled:active,
    .btn-primary[disabled]:active,
    fieldset[disabled] .btn-primary:active,
    .btn-primary.disabled.active,
    .btn-primary[disabled].active,
    fieldset[disabled] .btn-primary.active {
      background-color: #428bca;
      border-color: #428bca;
    }


    .form-inline .form-control,
    .form-inline .radio,
    .form-inline .checkbox {
      display: inline-block;
    }

    .form-inline .radio,
    .form-inline .checkbox {
      margin-top: 0;
      margin-bottom: 0;
    }

    .form-horizontal .control-label {
      padding-top: 9px;
    }

    .form-horizontal .form-group:before,
    .form-horizontal .form-group:after {
      display: table;
      content: " ";
    }


    .form-horizontal .form-group:after {
      clear: both;
    }

    .form-horizontal .form-group:before,
    .form-horizontal .form-group:after {
      display: table;
      content: " ";
    }

    .form-horizontal .form-group:after {
      clear: both;
    }

    @media (min-width: 768px) {
      .form-horizontal .form-group {
     
        margin-left: -15px;
      }
    }

    .form-horizontal .form-group .row {
  
      margin-left: -10px;
    }

    @media (min-width: 768px) {
      .form-horizontal .control-label {
        text-align: right;
      }
    }

    .notifyerror{
      color:red;
      font-size: 90%;
      font-style: italic;
      font-weight: normal;
      margin-bottom: 0px;
    }

  </style>
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">

                <div class="card-body">
                    <form method="POST" action="{{ route('register') }}">
                        @csrf
                    <div class="form-group">
                        <label class="col-lg-3 control-label">h??? t??n</label>
                        <div class="col-lg-7">
                            <input type="text" class="form-control @error('name') is-invalid @enderror" id="username" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus>
                            <label class="notifyerror" style="visibility: hidden; height: 0px" id="usernameerror">T??n t??i kho???n ch??? bao g???m k?? t??? a-z, A-Z v?? s???</label>
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="col-lg-3 control-label">Email</label>
                        <div class="col-lg-7">
                            <input type="email" name="email" id="email" class="form-control @error('email') is-invalid @enderror" value="{{ old('email') }}" required autocomplete="email">
                            <label class="notifyerror" style="visibility: hidden; height: 0px" id="emailerror">Email kh??ng ????ng ?????nh d???ng name@domain</label>  
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="col-lg-3 control-label">M???t kh???u</label>
                        <div class="col-lg-7">
                        <input type="password" id="password1" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password">
                        <label class="notifyerror" style="visibility: hidden; height: 0px" id="password1error">M???t kh???u ph???i bao g???m ch??? th?????ng, ch??? hoa v?? s???, ????? d??i t???i thi???u 8 k?? t???</label>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-lg-3 control-label">X??c nh???n m???t kh???u</label>
                        <div class="col-lg-7">
                        <input type="password" id="password-confirm" class="form-control" name="password_confirmation" required autocomplete="new-password">
                        <label class="notifyerror" style="visibility: hidden; height: 0px" id="password2error1">M???t kh???u ph???i bao g???m ch??? th?????ng, ch??? hoa v?? s???, ????? d??i t???i thi???u 8 k?? t???</label>
                        </div>
                    </div>
                    <div class="col-offset-3 col-lg-10">
                        <button type="submit" class="btn btn-primary" id="button_update" name="button_update">????ng k?? </button>
                    </div>

                    <div class="clear"></div>
                    </form>
                    <!--google-->
                    <hr>
                    <div class="form-group row mb-0">
                        <div class="col-md-8 offset-md-4">
                        <a href="{{ url('/auth/redirect') }}" class="btn btn-primary"><i class="fa fa-google"></i> Google</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
@extends('layouts.frontend')
@section('styles')
 <style>
     body { -webkit-font-smoothing: antialiased; text-rendering: optimizeLegibility; font-family: 'Noto Sans', sans-serif; letter-spacing: 0px; font-size: 14px; color: #2e3139; font-weight: 400; line-height: 26px; }
        h1, h2, h3, h4, h5, h6 { letter-spacing: 0px; font-weight: 400; color: #1c1e22; margin: 0px 0px 15px 0px; font-family: 'Noto Sans', sans-serif; }
        h1 { font-size: 42px; line-height: 50px; }
        h2 { font-size: 36px; line-height: 42px; }
        h3 { font-size: 20px; line-height: 32px; }
        h4 { font-size: 18px; line-height: 32px; }
        h5 { font-size: 14px; line-height: 20px; }
        h6 { font-size: 12px; line-height: 18px; }
        p { margin: 0 0 20px; line-height: 1.8; }
        p:last-child { margin: 0px; }
        ul, ol { }
        a { text-decoration: none; color: #2e3139; -webkit-transition: all 0.3s; -moz-transition: all 0.3s; transition: all 0.3s; }
        a:focus, a:hover { text-decoration: none; color: #0943c6; }
        .content{padding-top:80px; padding-bottom:80px};


        /*------------------------
        Radio & Checkbox CSS
        -------------------------*/
        .form-control { border-radius: 4px; font-size: 14px; font-weight: 500; width: 100%; height: 70px; padding: 14px 18px; line-height: 1.42857143; border: 1px solid #dfe2e7; background-color: #dfe2e7; text-transform: capitalize; letter-spacing: 0px; margin-bottom: 16px; -webkit-box-shadow: inset 0 0px 0px rgba(0, 0, 0, .075); box-shadow: inset 0 0px 0px rgba(0, 0, 0, .075); -webkit-appearance: none; }

        input[type=radio].with-font, input[type=checkbox].with-font { border: 0; clip: rect(0 0 0 0); height: 1px; margin: -1px; overflow: hidden; padding: 0; position: absolute; width: 1px; }
        input[type=radio].with-font~label:before, input[type=checkbox].with-font~label:before { font-family: FontAwesome; display: inline-block; content: "\f1db"; letter-spacing: 10px; font-size: 1.2em; color: #dfe2e7; width: 1.4em; }
        input[type=radio].with-font:checked~label:before, input[type=checkbox].with-font:checked~label:before { content: "\f00c"; font-size: 1.2em; color: #0943c6; letter-spacing: 5px; }
        input[type=checkbox].with-font~label:before { content: "\f096"; }
        input[type=checkbox].with-font:checked~label:before { content: "\f046"; color: #0943c6; }
        input[type=radio].with-font:focus~label:before, input[type=checkbox].with-font:focus~label:before, input[type=radio].with-font:focus~label, input[type=checkbox].with-font:focus~label { }

        .box { background-color: #fff; border-radius: 8px; border: 2px solid #e9ebef; padding: 50px; margin-bottom: 40px; }
        .box-title { margin-bottom: 30px; text-transform: uppercase; font-size: 16px; font-weight: 700; color: #094bde; letter-spacing: 2px; }
        .plan-selection { border-bottom: 2px solid #e9ebef; padding-bottom: 25px; margin-bottom: 35px; }
        .plan-selection:last-child { border-bottom: 0px; margin-bottom: 0px; padding-bottom: 0px; }
        .plan-data { position: relative; }
        .plan-data label { font-size: 20px; margin-bottom: 15px; font-weight: 400; }
        .plan-text { padding-left: 35px; }
        .plan-price { position: absolute; right: 0px; color: #094bde; font-size: 20px; font-weight: 700; letter-spacing: -1px; line-height: 1.5; bottom: 43px; }
        .term-price { bottom: 18px; }
        .secure-price { bottom: 68px; }
        .summary-block { border-bottom: 2px solid #d7d9de; }
        .summary-block:last-child { border-bottom: 0px; }
        .summary-content { padding: 28px 0px; }
        .summary-price { color: #094bde; font-size: 20px; font-weight: 400; letter-spacing: -1px; margin-bottom: 0px; display: inline-block; float: right; }
        .summary-small-text { font-weight: 700; font-size: 12px; color: #8f929a; }
        .summary-text { margin-bottom: -10px; }
        .summary-title { font-weight: 700; font-size: 14px; color: #1c1e22; }
        .summary-head { display: inline-block; width: 120px; }

        .widget { margin-bottom: 30px; background-color: #e9ebef; padding: 50px; border-radius: 6px; }
        .widget:last-child { border-bottom: 0px; }
        .widget-title { color: #094bde; font-size: 16px; font-weight: 700; text-transform: uppercase; margin-bottom: 25px; letter-spacing: 1px; display: table; line-height: 1; }

        .btn { font-family: 'Noto Sans', sans-serif; font-size: 16px; text-transform: capitalize; font-weight: 700; padding: 12px 36px; border-radius: 4px; line-height: 2; letter-spacing: 0px; -webkit-transition: all 0.3s; -moz-transition: all 0.3s; transition: all 0.3s; word-wrap: break-word; white-space: normal !important; }
        .btn-default { background-color: #0943c6; color: #fff; border: 1px solid #0943c6; }
        .btn-default:hover { background-color: #063bb3; color: #fff; border: 1px solid #063bb3; }
        .btn-default.focus, .btn-default:focus { background-color: #063bb3; color: #fff; border: 1px solid #063bb3; }

        .checkoutBox{
            margin-top:200px;
        }

        /** css for address and payment form */
        html,body,.wrapper{
    background: #f7f7f7;
}
.steps {
    margin-top: -41px;
    display: inline-block;
    float: right;
    font-size: 16px
}
.step {
    float: left;
    background: white;
    padding: 7px 13px;
    border-radius: 1px;
    text-align: center;
    width: 100px;
    position: relative
}
.step_line {
    margin: 0;
    width: 0;
    height: 0;
    border-left: 16px solid #fff;
    border-top: 16px solid transparent;
    border-bottom: 16px solid transparent;
    z-index: 1008;
    position: absolute;
    left: 99px;
    top: 1px
}
.step_line.backline {
    border-left: 20px solid #f7f7f7;
    border-top: 20px solid transparent;
    border-bottom: 20px solid transparent;
    z-index: 1006;
    position: absolute;
    left: 99px;
    top: -3px
}
.step_complete {
    background: #357ebd
}
.step_complete a.check-bc, .step_complete a.check-bc:hover,.afix-1,.afix-1:hover{
    color: #eee;
}
.step_line.step_complete {
    background: 0;
    border-left: 16px solid #357ebd
}
.step_thankyou {
    float: left;
    background: white;
    padding: 7px 13px;
    border-radius: 1px;
    text-align: center;
    width: 100px;
}
.step.check_step {
    margin-left: 5px;
}
.ch_pp {
    text-decoration: underline;
}
.ch_pp.sip {
    margin-left: 10px;
}
.check-bc,
.check-bc:hover {
    color: #222;
}
.SuccessField {
    border-color: #458845 !important;
    -webkit-box-shadow: 0 0 7px #9acc9a !important;
    -moz-box-shadow: 0 0 7px #9acc9a !important;
    box-shadow: 0 0 7px #9acc9a !important;
    background: #f9f9f9 url(../images/valid.png) no-repeat 98% center !important
}

.btn-xs{
    line-height: 28px;
}

/*login form*/
.login-container{
    margin-top:30px ;
}
.login-container input[type=submit] {
  width: 100%;
  display: block;
  margin-bottom: 10px;
  position: relative;
}

.login-container input[type=text], input[type=password] {
  height: 44px;
  font-size: 16px;
  width: 100%;
  margin-bottom: 10px;
  -webkit-appearance: none;
  background: #fff;
  border: 1px solid #d9d9d9;
  border-top: 1px solid #c0c0c0;
  /* border-radius: 2px; */
  padding: 0 8px;
  box-sizing: border-box;
  -moz-box-sizing: border-box;
}

.login-container input[type=text]:hover, input[type=password]:hover {
  border: 1px solid #b9b9b9;
  border-top: 1px solid #a0a0a0;
  -moz-box-shadow: inset 0 1px 2px rgba(0,0,0,0.1);
  -webkit-box-shadow: inset 0 1px 2px rgba(0,0,0,0.1);
  box-shadow: inset 0 1px 2px rgba(0,0,0,0.1);
}

.login-container-submit {
  /* border: 1px solid #3079ed; */
  border: 0px;
  color: #fff;
  text-shadow: 0 1px rgba(0,0,0,0.1); 
  background-color: #357ebd;/*#4d90fe;*/
  padding: 17px 0px;
  font-family: roboto;
  font-size: 14px;
  /* background-image: -webkit-gradient(linear, 0 0, 0 100%,   from(#4d90fe), to(#4787ed)); */
}

.login-container-submit:hover {
  /* border: 1px solid #2f5bb7; */
  border: 0px;
  text-shadow: 0 1px rgba(0,0,0,0.3);
  background-color: #357ae8;
  /* background-image: -webkit-gradient(linear, 0 0, 0 100%,   from(#4d90fe), to(#357ae8)); */
}

.login-help{
  font-size: 12px;
}

.asterix{
    background:#f9f9f9 url(../images/red_asterisk.png) no-repeat 98% center !important;
}

/* images*/
ol, ul {
  list-style: none;
}
.hand {
  cursor: pointer;
  cursor: pointer;
}
.cards{
    padding-left:0;
}
.cards li {
  -webkit-transition: all .2s;
  -moz-transition: all .2s;
  -ms-transition: all .2s;
  -o-transition: all .2s;
  transition: all .2s;
  background-image: url('//c2.staticflickr.com/4/3713/20116660060_f1e51a5248_m.jpg');
  background-position: 0 0;
  float: left;
  height: 32px;
  margin-right: 8px;
  text-indent: -9999px;
  width: 51px;
}
.cards .mastercard {
  background-position: -51px 0;
}
.cards li {
  -webkit-transition: all .2s;
  -moz-transition: all .2s;
  -ms-transition: all .2s;
  -o-transition: all .2s;
  transition: all .2s;
  background-image: url('//c2.staticflickr.com/4/3713/20116660060_f1e51a5248_m.jpg');
  background-position: 0 0;
  float: left;
  height: 32px;
  margin-right: 8px;
  text-indent: -9999px;
  width: 51px;
}
.cards .amex {
  background-position: -102px 0;
}
.cards li {
  -webkit-transition: all .2s;
  -moz-transition: all .2s;
  -ms-transition: all .2s;
  -o-transition: all .2s;
  transition: all .2s;
  background-image: url('//c2.staticflickr.com/4/3713/20116660060_f1e51a5248_m.jpg');
  background-position: 0 0;
  float: left;
  height: 32px;
  margin-right: 8px;
  text-indent: -9999px;
  width: 51px;
}
.cards li:last-child {
  margin-right: 0;
}
/* images end */



/*
 * BOOTSTRAP
 */
.container{
    border: none;
}
.panel-footer{
    background:#fff;
}
.btn{
    border-radius: 1px;
}
.btn-sm, .btn-group-sm > .btn{
    border-radius: 1px;
}
.input-sm, .form-horizontal .form-group-sm .form-control{
    border-radius: 1px;
}

.panel-info {
    border-color: #999;
}

.panel-heading {
    border-top-left-radius: 1px;
    border-top-right-radius: 1px;
}
.panel {
    border-radius: 1px;
}
.panel-info > .panel-heading {
    color: #eee;
    border-color: #999;
}
.panel-info > .panel-heading {
    background-image: linear-gradient(to bottom, #555 0px, #888 100%);
}

hr {
    border-color: #999 -moz-use-text-color -moz-use-text-color;
}

.panel-footer {
    border-bottom-left-radius: 1px;
    border-bottom-right-radius: 1px;
    border-top: 1px solid #999;
}

.btn-link {
    color: #888;
}

hr{
    margin-bottom: 10px;
    margin-top: 10px;
}

/** MEDIA QUERIES **/
@media only screen and (max-width: 989px){
    .span1{
        margin-bottom: 15px;
        clear:both;
    }
}

@media only screen and (max-width: 764px){
    .inverse-1{
        float:right;
    }
}

@media only screen and (max-width: 586px){
    .cart-titles{
        display:none;
    }
    .panel {
        margin-bottom: 1px;
    }
}

.form-control {
    border-radius: 1px;
}

@media only screen and (max-width: 486px){
    .col-xss-12{
        width:100%;
    }
    .cart-img-show{
        display: none;
    }
    .btn-submit-fix{
        width:100%;
    }
    
}
/*
@media only screen and (max-width: 777px){
    .container{
        overflow-x: hidden;
    }
}*/
 </style>
 @endsection
 @section('content')
    <checkout />
 @endsection

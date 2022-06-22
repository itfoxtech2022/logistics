<html>
   <title>Silica Logistics | Login</title>
   <link href="//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
   <script src="//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
   <script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
   <style>
      body{
      background: url(https://cdn.pixabay.com/photo/2015/08/06/09/27/logistics-877567_1280.jpg) no-repeat center center fixed; 
      -webkit-background-size: cover;
      -moz-background-size: cover;
      -o-background-size: cover;
      background-size: cover;
      font-family:'HelveticaNeue','Arial', sans-serif;
      }
      a{color:#579ccb;text-decoration: none;}
      a:hover{color:#aaa; }
      .pull-right{float: right;}
      .pull-left{float: left;}
      .clear-fix{clear:both;}
      div.logo{text-align: center; margin: 20px 20px 30px 20px; fill: #566375;}
      .head{padding:40px 0px; 10px 0}
      .logo-active{fill: #579ccb !important;}
      #formWrapper{
      background: rgba(0,0,0,.2); 
      width:100%; 
      height:100%; 
      position: absolute; 
      top:0; 
      left:0;
      transition:all .3s ease;}
      .darken-bg{background: rgba(0,0,0,.5) !important; transition:all .3s ease;}
      div#form{
      position: absolute;
      width:360px;
      height:320px;
      height:auto;
      background-color: #fff;
      margin:auto;
      border-radius: 5px;
      padding:20px;
      left:50%;
      top:50%;
      margin-left:-180px;
      margin-top:-200px;
      }
      div.form-item{position: relative; display: block; margin-bottom: 40px;}
      input{transition: all .2s ease;}
      input.form-style{
      color:#579ccb;
      display: block;
      width: 90%;
      height: 44px;
      padding: 5px 5%;
      border:1px solid #ccc;
      -moz-border-radius: 27px;
      -webkit-border-radius: 27px;
      border-radius: 27px;
      -moz-background-clip: padding;
      -webkit-background-clip: padding-box;
      background-clip: padding-box;
      background-color: #fff;
      font-family:'HelveticaNeue','Arial', sans-serif;
      font-size: 105%;
      letter-spacing: .8px;
      }
      div.form-item .form-style:focus{outline: none; border:1px solid #579ccb; color:#579ccb; }
      div.form-item p.formLabel {
      position: absolute;
      left:26px;
      top:10px;
      transition:all .4s ease;
      color:#bbb;}
      .formTop{top:-22px !important; left:26px; background-color: #fff; padding:0 5px; font-size: 14px; color:#579ccb !important;}
      .formStatus{color:#8a8a8a !important;}
      input[type="submit"].login{
      float:right;
      width: 112px;
      height: 37px;
      -moz-border-radius: 19px;
      -webkit-border-radius: 19px;
      border-radius: 19px;
      -moz-background-clip: padding;
      -webkit-background-clip: padding-box;
      background-clip: padding-box;
      background-color: #579ccb;
      border:1px solid #579ccb;
      border:none;
      color: #fff;
      font-weight: bold;
      }
      input[type="submit"].login:hover{background-color: #fff; border:1px solid #579ccb; color:#579ccb; cursor:pointer;}
      input[type="submit"].login:focus{outline: none;}
   </style>
   <body>
      <div id="formWrapper">
         @php if(isset($_COOKIE['login_email']) && isset($_COOKIE['login_pass']))
         {
         $login_email = $_COOKIE['login_email'];
         $login_pass  = $_COOKIE['login_pass'];
         $is_remember = "checked='checked'";
         }
         else{
         $login_email ='';
         $login_pass = '';
         $is_remember = "";
         }
         @endphp
         <form action="{{route('check.login')}}" method="POST">
            @csrf
            <div id="form">
               <div class="logo">
                  <h2>Silica Logistics</h2>
               </div>
               <div class="row justify-content-end mb-1">
                  <div class="col-sm-12 float-right">
                     @if(Session::has('flash_message_error'))
                     <div class="alert alert-danger alert-dismissible p-2">
                        <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                        <strong>Error!</strong> {!! session('flash_message_error')!!}.
                     </div>
                     @endif
                     @if(Session::has('flash_message_success'))
                     <div class="alert alert-success alert-dismissible p-2">
                        <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                        <strong>Success!</strong> {!! session('flash_message_success')!!}.
                     </div>
                     @endif
                  </div>
               </div>
               <div class="form-item">
                  <p class="formLabel">Email</p>
                  <input type="email" name="email" id="email" value="{{$login_email}}" class="form-style" autocomplete="off"/>
                  @if ($errors->has('email'))
                  <span class="text-danger">{{ $errors->first('email') }}</span>
                  @endif
               </div>
               <div class="form-item">
                  <p class="formLabel">Password</p>
                  <input type="password" name="password" value="{{$login_pass}}" id="password" class="form-style" />
                  @if ($errors->has('password'))
                  <span class="text-danger">{{ $errors->first('password') }}</span>
                  @endif
                  <br>
                  <div class="checkbox pull-right">
                     <label>
                     <input type="checkbox" name="rememberme" {{$is_remember}}> Remember me</label>
                  </div>
                  <p><a href="" ><small>Forgot Password ?</small></a></p>
               </div>
               <div class="form-item">
                  <input type="submit" class="login pull-right" value="Log In">
                  <div class="clear-fix"></div>
               </div>
            </div>
         </form>
      </div>
   </body>
</html>
<script>
   $(document).ready(function(){
   var formInputs = $('input[type="email"],input[type="password"]');
   formInputs.focus(function() {
      $(this).parent().children('p.formLabel').addClass('formTop');
      $('div#formWrapper').addClass('darken-bg');
      $('div.logo').addClass('logo-active');
   });
   formInputs.focusout(function() {
   if ($.trim($(this).val()).length == 0){
   $(this).parent().children('p.formLabel').removeClass('formTop');
   }
   $('div#formWrapper').removeClass('darken-bg');
   $('div.logo').removeClass('logo-active');
   });
   $('p.formLabel').click(function(){
   $(this).parent().children('.form-style').focus();
   });
   });
</script>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">

        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta name="description" content="">
        <meta name="keywords" content="">
        <meta name="author" content="Altermyth">
        <link rel="icon" type="image/png" href="/img/favicon.ico">
        <title>Trafiz Backend</title>

        <script src="jquery/dist/jquery.min.js"></script>
        <script src="bootstrap-3.1.1-dist/js/bootstrap.min.js"></script>
        <link rel="stylesheet" href="bootstrap-3.1.1-dist/css/bootstrap.min.css">
        <link rel="stylesheet" href="css/login.css">

        <script type="text/javascript">
            function hidethis(obj)
            {
                obj.style.display = 'none';
            }

            var myVar = null;
            var timer = 60;

            function waitTimerStart()
            {
                timer = 60;
                $("#waitTimer").html("Waiting time : " + timer + "s");
                myVar = setInterval(myTimer, 1000);
            }
           
            function myTimer()
            {
                timer--;
                $("#waitTimer").html("Waiting time : " + timer + "s");
                if(timer % 5 == 0)
                {
                    //console.log($("#code").val());
                    
                    $.get("{{URL::to('/_api/tryqrcodeLogin?c=')}}"+ $("#code").val(), function(data, status){
                        if(data == "ok")
                        {
                            window.location.href = "{{URL::to('index')}}";
                        }
                        //alert("Data: " + data + "\nStatus: " + status);
                    });
                }

                if(timer <= 0)
                {
                    window.clearInterval(myVar);
                    $('#myModal').modal('hide');
                }

                //console.log("timer : " + timer);
            }

            $(document).ready(function(){
                $('#myModal').on('hidden.bs.modal', function (e) {
                    window.clearInterval(myVar)
                });

                $("#btnOpen").click(function(){
                    $.get("{{URL::to('/_api/logincode/123')}}", function(data, status){
                        //console.log("Data: " + data + "\nStatus: " + status);
                        var srcstring = "https://chart.googleapis.com/chart?chs=250x250\&cht=qr\&"+
                            "chl={{URL::to('/_api/qrcodeLogin')}}?c=" + data +
                            "&choe=UTF-8";
                            /*
                                 https://chart.googleapis.com/chart?chs=250x250&cht=qr&chl=http://localhost/trafizbackend/public/_api/manualLogin/a38537f68a6511e88ae888d7f61b4659&choe=UTF-8
                            src="https://chart.googleapis.com/chart?chs=150x150&cht=qr&chl=http://13.76.176.125/_api/game/qrcode/1802000001&choe=UTF-8"*/

                        console.log(srcstring);
                        $("#imgqrcode").attr("src",srcstring);
                        $("#code").val(data);
                        
                        waitTimerStart();
                        $('#myModal').modal('show');
                    });
                });
            });

            
        </script>
    </head>

    <body>
        <div class="container">
            <div class="row row-centered">
                <div class="col-md-4 col-xs-10 col-centered" style="background-color:rgba(255, 255, 255, 0.8);">
                    <img src="img/logo.png" style="width:100%;">
                    <h2 style="text-align:center;">Login</h2>
                    <div class="item">
                        <div class="content">
                            <form class="form-horizontal" method="POST" action="{{ route('login') }}">
                                <input type="hidden" name="_token" value="{{ csrf_token() }}">

                                <input id="identity" type="identity" class="form-control" name="identity"
                                value="{{ old('identity') }}" autofocus required>

                                @if ($errors->has('username'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('username') }}</strong>
                                    </span>
                                @endif
                                @if ($errors->has('phonenumber'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('phonenumber') }}</strong>
                                    </span>
                                @endif
                                @if ($errors->has('email'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                                @endif

                                <input id="password" type="password" class="form-control{{ $errors->has('password') ? ' is-invalid' : '' }}" name="password" required placeholder="password">
                                @if ($errors->has('password'))
                                    <span class="invalid-feedback">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                                @endif

                                <button type="submit" class="btn btn-primary">
                                    {{ __('Login') }}
                                </button>
                                
                                <!--
                                <div class="checkbox" style="float:left;width:150px;text-align:left;">
                                    <label>
                                        <input style="width:25px;" type="checkbox" name="remember" {{ old('remember') ? 'checked' : '' }}> Remember Me
                                    </label>
                                </div>-->
                            </form>
                            <button type="button" id="btnOpen" class="btn btn-primary">
                                    Login with QR Code
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div id="myModal" class="modal fade" role="dialog">
            <div class="modal-dialog">

                <!-- Modal content-->
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close"
                            style="text-align:right;" data-dismiss="modal">
                            &times;
                        </button>
                        <h4 class="modal-title">Please Scan the QRCode</h4>
                    </div>

                    <div style="text-align: center;">
                        <input type="hidden" id="code" value="">
                        <img id="imgqrcode"><br/>
                        <span id="waitTimer"></span>
                    </div>

                    <div class="modal-footer">
                        <button type="button"
                            class="btn btn-default" data-dismiss="modal">
                            Close
                        </button>
                    </div>
                </div>

            </div>
        </div>

    </body>
</html>

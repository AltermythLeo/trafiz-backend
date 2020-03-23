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
        <script src="{{URL::to('/bootstrap-datepicker/dist/js/bootstrap-datepicker.min.js')}}"></script>

        <link rel="stylesheet" href="bootstrap-3.1.1-dist/css/bootstrap.min.css">
        <link rel="stylesheet" href="css/login.css">
        <link rel="stylesheet" href="{{URL::to('/bootstrap-datepicker/dist/css/bootstrap-datepicker.min.css')}}">

        <script type="text/javascript">
            function redirect(url)
            {
                window.location.href = url;
            }

            $(function () {
                $('#supidexpireddate').datepicker({
                    autoclose: true
                });
            })
        </script>
    </head>

    <body>
        <div class="container">
            <div class="row row-centered">
                <div class="col-md-4 col-xs-10 col-centered" style="background-color:rgba(255, 255, 255, 0.8);">
                    <h2 style="text-align:center;">Register</h2>
                    <div class="item">
                        <div class="content">
                            <form class="form-horizontal" method="POST" action="{{URL::to('/regis/do')}}">
                                <input type="hidden" name="_token" value="{{ csrf_token() }}">

                                <input id="name" type="text" class="form-control" name="name" placeholder="Full name" autofocus required>

                                <input id="username" type="text" class="form-control" name="username" placeholder="username" autofocus required>

                                <input id="email" type="text" class="form-control" name="email" placeholder="email">

                                <input id="phonenumber" type="text" class="form-control" name="phonenumber" placeholder="phone number" required>

                                <input id="supplierid" type="text" class="form-control" name="supplierid" placeholder="Supplier ID" maxlength="10" required>

                                <input id="password" type="password" class="form-control{{ $errors->has('password') ? ' is-invalid' : '' }}" name="password" required placeholder="password">
                                @if ($errors->has('password'))
                                    <span class="invalid-feedback">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                                @endif

                                <label for="exampleInputType1">Nationality</label><br/>
                                <select name="natidtype" id="natidtype" class="form-control">
                                    <option value="ID">Indonesia</option>
                                    <option value="SG">Singapore</option>
                                </select>


                                <label for="exampleInputType1">Default Language</label><br/>
                                <select name="lang" id="lang" class="form-control">
                                    <option value="EN">English</option>
                                    <option value="ID">Bahasa Indonesia</option>
                                </select>

                                <label for="exampleInputType1">Genre</label><br/>
                                <select name="genre" style="width:100%;">
                                    <option value="0">Wanita</option>
                                    <option value="1">Pria</option>
                                </select><br/><br/>

                                <textarea id="address" name="address" rows="4" class="form-control" placeholder="address"></textarea><br/>
                                <input id="city" type="text" class="form-control" name="city" placeholder="city">
                                <input id="district" type="text" class="form-control" name="district" placeholder="district">
                                <input id="province" type="text" class="form-control" name="province" placeholder="province">
                                <input id="businesslicense" type="text" class="form-control" name="businesslicense" placeholder="Business License">
                                <input id="natcode" type="text" class="form-control" name="natcode" placeholder="National ID Code">
                                
                                <label>Expired Licensed Date :</label>
                                <div class="input-group date">
                                    <div class="input-group-addon">
                                        <i class="fa fa-calendar"></i>
                                    </div>
                                    <input type="text" class="form-control pull-right" id="supidexpireddate" name="supidexpireddate">
                                </div><br/>

                                <label>Please Check All your data Before Submit</label>
                                
                                <button type="submit" class="btn btn-primary">
                                    Register
                                </button>
                                <button type="button" id="btnOpen" class="btn btn-primary"
                                    onclick="redirect('{{URL::to('/')}}')">
                                    Back
                                </button>
                            </form>
                            <div style="color:red;">
                                {{$err}}
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </body>
</html>

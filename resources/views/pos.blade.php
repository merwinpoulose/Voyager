<!DOCTYPE html>
<html lang="{{ config('app.locale') }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="theme-color" content="#69457c" />
    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta name="description" content="Voyager Technical Exercise">
    <title>Voyager Technical Exercise</title>
    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
    <style type="text/css">
      .container{margin-top: 50px; }
      body{
      background: linear-gradient(to top right, #9999ff 0%, #00cc66 100%);
       background-size: cover;}
    </style>
    <!-- Scripts -->
    <script>
        window.Laravel = {!! json_encode([
            'csrfToken' => csrf_token(),
        ]) !!};
    </script>
</head>
<body>
<div class="container">
    <div class="row" >
        <div class="col-md-6 col-md-offset-3">
            <div class="panel panel-default">
                <div class="panel-heading">Scan Products</div>
                    <div class="panel-body">
                        <form id="productForm" class="form-horizontal" method="post" action="{{url('/calculate-price')}}" role="form">
                        <input type="hidden" name="_token" value="{{ csrf_token() }}">
                        <div id="product">
                            <div class="form-group">
                                <label for="product_name" class="col-md-4 control-label">Product Name</label>
                                <div class="col-md-6">
                                    <input id="name" type="text" class="form-control" name="product_name[]" required autofocus>
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="col-md-6">
                                <button type="button" class="btn btn-primary btn-block" id="calcualteBtn">
                                    Calcualte Total Price
                                </button>
                            </div>
                            <div class="col-md-6">
                                <button type="button" class="btn btn-primary btn-block" id="scanProductBtn">
                                    Scan Another Product
                                </button>
                            </div>
                        </div>

                        </form>
                        <p id="success_message" class="col-md-12 col-xs-12 col-sm-12"></p>
                        <p id="error_message" class="col-md-12 col-xs-12 col-sm-12"></p>
                    </div>
                </div>
            </div>
        </div>
    </div>
    </div>
  </body>
    <script src="{{ asset('js/app.js') }}"></script>
    <script type="text/javascript">
        $('#scanProductBtn').click(function () {
        $('#product').append('<div>' +
        '<div class="form-group">' +
        '<label for="name" class="col-md-4 control-label">Product Name</label>' +
        '<div class="col-md-6">' +
        '<input id="name" type="text" class="form-control" name="product_name[]" required autofocus>' +
        '</div>' + '</div>' + '</div>')
        });

        $('#calcualteBtn').click(function () {
            $('#error_message').hide();
            $('#success_message').show();
            $('#success_message').text('Please wait .......');
            $.ajax({
              type:'post',
              url : $('#productForm').attr('action'),
              data:$('#productForm').serialize(),
              success:function(data){
                if(data.status == "success"){
                  $('#success_message').text(data.message);
                  setTimeout(function(){
                    $('#success_message').text('');
                    $('#success_message').hide();
                  },15000);
                }
                else if(data.status == 'error'){
                  $('#success_message').hide();
                  $('#error_message').show();
                  $('#error_message').text(data.message);
                  setTimeout(function(){
                    $('#error_message').text('');
                    $('#error_message').hide();
                  },15000);
                }
                  
              }
            })
        });
    </script>

</html>

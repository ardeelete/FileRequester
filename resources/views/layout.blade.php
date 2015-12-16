<!DOCTYPE html>
<html>
    <head>
        
      <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  
  <link href='http://fonts.googleapis.com/css?family=Lato:100' rel='stylesheet'  type='text/css'>
  <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
  <script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>

        
        </head>
    <style>
            html, body {
                height: 100%;
            }
            
            body {
                margin: 0;
                padding: 0;
                width: 100%;
                display: table;
                font-weight: 100;
                font-family: 'Lato';
            }

            .container1 {
                
                width: 100%;
                position: center center;
                text-align: center;
                display: table-cell;
                vertical-align: middle;
            } 

            .content {
                position: center center;
                text-align: center;
                display: inline-block;
                vertical-align: middle;
            }
            
            
            .content-create{
                width: 100%;
                position: center center;
                text-align: center;
                display: table-cell;
                vertical-align: middle;
                
            }

            .title {
                font-size: 96px;
            }
            .right{
                float: right;
                
            }
        </style>
    <body>
            @yield('body')
            @yield('content')
    </body>
</html>>
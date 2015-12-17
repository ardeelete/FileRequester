<!DOCTYPE html>
<html>
    <head>
        
      <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  
  
  <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css">
  <link href='https://fonts.googleapis.com/css?family=Arvo' rel='stylesheet' type='text/css'>
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
                font-family: 'Arvo', serif;
            }

            .container1 {
                
                width: 100%;
                right: auto;
                left: auto;
                text-align: center;
                display: table-cell;
                vertical-align: middle;
            } 
            .container-table {
                float: left;
                margin: 15px;
                width: 100%;
                display: table-cell;
                vertical-align: middle;
            }
            
            aside{
                margin: 10px;
                height: 800px;
                width: 300px;
                display: inline-block;
                
                float: left;
            }
            .panel{
                height: 90%;
                margin-bottom: 20px;
                
            }
            section {
                width: auto;
                padding:10px; 
                float:left;
            }

            .content {
                
                height: 50%;
                width: 50%;
                
                text-align: center;
                display: inline-block;
                vertical-align: middle;
                
            }
            
            .content-class {
                
                height: 100%;
                width: 100%;
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
            h1{
                margin-top: 40px;
                margin-bottom: 40px;
            }

            .title {
                font-size: 60px;
                
            }
            .right{
                float: right;
                
            }
            .checkbox-inline 
            {
                width: 50px;
                height: 30px;
                margin-right: 30px;
                margin-left: 10px;
                margin-top: 0;
            }
        </style>
    <body>
            @yield('navhome')
            
            @yield('aside')
            @yield('content')
    </body>
</html>>
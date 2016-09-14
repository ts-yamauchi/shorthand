<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Shorthand</title>

    <!-- Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Raleway:100,600" rel="stylesheet" type="text/css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css">
    <link rel="stylesheet" href="{{asset('css/common.css')}}">

</head>
<body>
<div class="container">
    <div class="content">
        <div class="row">
            <div class="col-lg-6 col-lg-offset-3">
                <div class="title">
                    Shorthand
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-lg-4 col-lg-offset-4">
                <div class="method">
                    WRITE
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-lg-4 col-lg-offset-4">
                {{ csrf_field() }}
                <div class="method">
                    <form action="{{ url('upload') }}" method="post">
                        <input type="file">
                        <input type="submit" value="UPLOAD">
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>
</body>
</html>

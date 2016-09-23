<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Write｜Shortsword</title>

    <!-- Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Raleway:100,600" rel="stylesheet" type="text/css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css">
    <link rel="stylesheet" href="{{asset('css/common.css')}}">

</head>
<body>
<div class="container-fluid">
    <div class="content">
        <div class="row">
            <div class="col-md-12">
                <a href="/">
                    <div class="title">
                        Shortsword
                    </div>
                </a>
            </div>
        </div>
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="form-group">
                    <form action="{{ url('/write') }}" method="POST">
                        {{ csrf_field() }}
                        <textarea name="md-text" class="form-control" rows="20"></textarea>
                        <input type="submit" class="center-block btn btn-default" value="生成">
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>
</body>
</html>

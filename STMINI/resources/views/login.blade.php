<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="Mark Otto, Jacob Thornton, and Bootstrap contributors">
    <meta name="generator" content="Jekyll v4.0.1">
    <link href="{{asset('/css/sidebar.css')}}" rel="stylesheet">
    <title>STMINI</title>
    <link rel="canonical" href="https://getbootstrap.com/docs/4.5/examples/sign-in/">

    <!-- Bootstrap core CSS -->
    <!-- CSS only -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">

    <!-- Favicons -->


    <style>
        .btn-green {
            z-index: 1;
            background-color: #8ec641;
            color: #000;

        }

        .bg-green {
            background-color: #3F4752
        }

        .bt-bg {
            background-color: rgba(26, 30, 36, 0.27);
            border: none;
            color: #9ebb77;
        }

        .bt-bg:focus {
            background-color: rgba(26, 30, 36, 0.27);
            border: none;
            color: #9ebb77;
        }

        .bt-bg:active {
            background-color: rgba(26, 30, 36, 0.27);
            border: none;
            color: #9ebb77;
        }

        body {
            height: 100vh !important;
            background-color: #000;
            background-size: cover;
            background-position-y: 20%;

        }

        .bd-placeholder-img {
            font-size: 1.125rem;
            text-anchor: middle;
            -webkit-user-select: none;
            -moz-user-select: none;
            -ms-user-select: none;
            user-select: none;

        }

        @media (min-width: 768px) {
            .bd-placeholder-img-lg {
                font-size: 3.5rem;
            }
        }
    </style>
    <!-- Custom styles for this template -->

</head>

<body class="text-center container-fluid">
    {{csrf_field()}}
    <div class="row form-group h-100 justify-content-center align-items-center ">
        <form action="login" method="post" class="form-signin col-md-4 card p-5 bg-green">
            {{csrf_field()}}
            <h1 class="h3 mb-5 font-weight-normal" style="color:#8ec641">STMINI</h1>
            @if(Session()->has('success'))
            <div class="alert alert-success" role="alert">
                {{Session()->get('success')}}
            </div>
            @endif
            @if(Session()->has('warning'))
            <div class="alert alert-danger" role="alert">
                {{Session()->get('warning')}}
            </div>
            @endif
            <label for="Username" style="text-align: left; color:#8ec641;">Username</label>
            <input name="Username" type="text" class="form-control mb-3 bt-bg" placeholder="Username" required>
            <label for="Password" style="text-align: left;color:#8ec641; ">Password</label>
            <input type="password" name="Password" class="form-control mb-3 bt-bg" placeholder="Password" required>
            <input name="Submit" type="submit" value="Login" class="btn btn-lg btn-green btn-block">
        </form>
    </div>

    <script>

    </script>

    <!-- JS, Popper.js, and jQuery -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous">
    </script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js" integrity="sha384-OgVRvuATP1z7JjHLkuOU7Xw704+h835Lr+6QL9UvYjZE3Ipu6Tp75j7Bh/kR0JKI" crossorigin="anonymous">
    </script>
</body>

</html>
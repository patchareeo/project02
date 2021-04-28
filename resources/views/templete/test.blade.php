@extends('templete.templete')

@section('title', 'test')

@section('content')

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="">
    <title>Register | Heawnea</title>
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link href="css/font-awesome.min.css" rel="stylesheet">
    <link href="css/prettyPhoto.css" rel="stylesheet">
    <link href="css/price-range.css" rel="stylesheet">
    <link href="css/animate.css" rel="stylesheet">
	<link href="css/main.css" rel="stylesheet">
	<link href="css/responsive.css" rel="stylesheet">
    <!--[if lt IE 9]>
    <script src="js/html5shiv.js"></script>
    <script src="js/respond.min.js"></script>
    <![endif]-->       
    <link rel="shortcut icon" href="images/ico/favicon.ico">
    <link rel="apple-touch-icon-precomposed" sizes="144x144" href="images/ico/apple-touch-icon-144-precomposed.png">
    <link rel="apple-touch-icon-precomposed" sizes="114x114" href="images/ico/apple-touch-icon-114-precomposed.png">
    <link rel="apple-touch-icon-precomposed" sizes="72x72" href="images/ico/apple-touch-icon-72-precomposed.png">
    <link rel="apple-touch-icon-precomposed" href="images/ico/apple-touch-icon-57-precomposed.png">

    <style>
        .card {
          box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2);
          max-width: 300px;
          margin: auto;
          text-align: center;
          font-family: arial;
        }
        
        .price {
          color: grey;
          font-size: 22px;
        }
        
        .card button {
          border: none;
          outline: 0;
          padding: 12px;
          color: white;
          background-color: #000;
          text-align: center;
          cursor: pointer;
          width: 100%;
          font-size: 18px;
        }
        
        .card button:hover {
          opacity: 0.7;
        }
        </style>
    <!-- <style>
        .container {
            margin-top: 10rem;
        }
    </style> -->
</head><!--/head-->

<body>

    <h2 style="text-align:center">Product Card</h2>

    <div class="card">
      <img src="/w3images/jeans3.jpg" alt="Denim Jeans" style="width:100%">
      <h1>Tailored Jeans</h1>
      <p class="price">$19.99</p>
      <p>Some text about the jeans. Super slim and comfy lorem ipsum lorem jeansum. Lorem jeamsun denim lorem jeansum.</p>
      <p><button>Add to Cart</button></p>
    </div>



{{-- <div class="row">
    <div class="col-md-12">
        <div class="col-md-4"></div>
        <div class="col-md-4">
        <div class="login-form"><!--login form-->
                <h2>Login to your account</h2>
                <form action="#">
                    <input type="text" placeholder="Name" />
                    <input type="email" placeholder="Email Address" />
                    <span>
                        <input type="checkbox" class="checkbox"> 
                        Keep me signed in
                    </span>
                    <button type="submit" class="btn btn-default">Login</button>
                </form>
            </div><!--/login form-->
        </div>
        <div class="col-md-4"></div>
    </div>
</div> --}}
<script src="js/jquery.js"></script>
	<script src="js/price-range.js"></script>
    <script src="js/jquery.scrollUp.min.js"></script>
	<script src="js/bootstrap.min.js"></script>
    <script src="js/jquery.prettyPhoto.js"></script>
    <script src="js/main.js"></script>
</body>
</html> 

@endsection
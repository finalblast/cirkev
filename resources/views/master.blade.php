<!DOCTYPE html>
<html lang="sk">
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="@yield('description')">
    <meta name="author" content="@yield('autor')">

	<title>@yield('title')</title>

	<link rel="stylesheet" href="{{ asset('css/5bootstrap.min.css') }}">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.5.0/css/font-awesome.min.css">
	<link rel="stylesheet" href="{{ asset('css/main.css') }}">
    @yield('headerScript')
    <script src='https://www.google.com/recaptcha/api.js'></script>
</head>

<body>
@include('partials.analyticstracking')
@include('partials.carousel')
@include('partials.navigation')

	<main>
		<div class="container">

            @include('partials.errors')
            @yield('video-fool')


			<div class="col-md-9">
                @include('flash::message')
            @yield('content')

            </div>

            <div class="col-md-3">
                @yield('side')
            </div>
		</div>


    </main>


<footer id="subfooter" class="clearfix" style="background: #142127; color: white; padding-top: 60px; padding-bottom: 40px;">
    <div class="container">
        <div class="row">
            <div class="col-md-4">
                <h4>O projekte</h4>
                <p><a href="">Documentation</a>
                <p><a href="">Podpora</a>
                <p><a href="">Blogs</a>
            </div>
            <div class="col-md-4">
                <h4>Kontakt</h4>
                <p><span class="fa fa-globe"></span>&nbsp;&nbsp;&nbsp; Trenčín, Slovensko</p>
                <p><span class="fa fa-phone"></span>&nbsp;&nbsp;&nbsp;0905 320 616</p>
                <p><span class="fa fa-envelope"></span>&nbsp;&nbsp;&nbsp;<a href="mailto:mail@example.com"><a href="#nid" data-toggle="modal" data-target="#contact" data-whatever="@mdo" >Napíšte nám</a>
                    </a></p>
            </div>
            <div class="col-md-4">
                <h4>Odber noviniek</h4>
                <p>
                <div class="input-group">
                    <input type="text" class="form-control" placeholder="Enter your email..." />
                        <span class="input-group-btn">

                              <button type="button" class="btn btn-danger">Prihlásených <span class="badge">273</span></button>
                        </span>
                </div>
                </p>
                <p><br /></p>
                <p>
                    <a class="fa fa-twitter footer-socialicon" target="_blank" href="https://twitter.com/"></a>
                    <a class="fa fa-facebook footer-socialicon" target="_blank" href="https://www.facebook.com/"></a>
                    <a class="fa fa-google-plus footer-socialicon" target="_blank" href="https://plus.google.com/"></a>
                    <a class="fa fa-linkedin footer-socialicon" target="_blank" href="https://plus.google.com/"></a>
                </p>
            </div>
        </div>
    </div>
</footer>

<footer id="footer" class="clearfix" style="background: #000000">
    <div class="container">
        <div class="row">
                <p class="text-center">Autor šablóny <a href="" title="Gajdoš Gabriel"> Gajdoš Gabriel</a> 2016<a href="" title="Cirkev online.sk"> Cirkev Online.sk</a></p>
        </div>
    </div>
</footer>



{{--Modal for contact form --}}
<div class="modal fade" id="contact" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title" id="exampleModalLabel">Napíšte nám!</h4>
            </div>
@include('partials.contact-form')
        </div>
    </div>



<!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
<!-- Include all compiled plugins (below), or include individual files as needed -->
<script src="{{ asset('js/bootstrap.min.js') }}"></script>

<script src="{{ asset('js/jquery.js')}}"></script>

<script src="{{ asset('js/app.js') }}"></script>

</body>
</html>
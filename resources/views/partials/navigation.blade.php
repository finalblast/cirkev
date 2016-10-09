<nav class="navbar navbar-default">
    <div class="container">
        <!-- Brand and toggle get grouped for better mobile display -->
        <div class="navbar-header">
            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand" href="{{url('/')}}">Úvod</a>
        </div>

        <!-- Collect the nav links, forms, and other content for toggling -->
        <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
            <ul class="nav navbar-nav">
                {{--<li class="{{ (current_page("create")) ? 'active' : '' }}"><a href="{{url('post/create')}}">Pridať článok <span class="sr-only">(current)</span></a></li>--}}
                <li><a href="{{ url('online') }}">Priame prenosy</a></li>
                <li class="dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Rádia <span class="caret"></span></a>
                    <ul class="dropdown-menu">
                        <li><a href="#"  onClick="window.open('http://www.radio7.sk/onair/popup.php?mp3ID=apmp3id162&style=stylelive&show_current_time_live=1&baseDir=http://www.radio7.sk/&width=300px&height=0&list=0&autoplay=1&muted=0&loop=1&volume=0.75&css=&defaultitem=1&mp3name=ŽIVÉ VYSIELANIE&mp3link=http://aroha.sk:8000/128&artist=','pagename','resizable,height=500,width=470')">Rádio 7</a></li>
                        <li><a href="#" onClick="window.open('http://www.lumen.sk/radio-streaming.html?ff=1','pagename','resizable,height=500,width=470')"  >Rádio Lumen (pre mladých)</a></li>
                        {{--<li role="separator" class="divider"></li>--}}
                        {{--<li><a href="#">Separated link</a></li>--}}
                        {{--<li role="separator" class="divider"></li>--}}
                        {{--<li><a href="#">One more separated link</a></li>--}}
                    </ul>
                </li>
            </ul>

            {{--<form class="navbar-form navbar-left" role="search" method="get" >--}}
            {{--<div class="form-group">--}}
                {{--<input type="search" class="form-control" placeholder="Vyhľadať">--}}
            {{--</div>--}}
            {{--<button type="submit" class="btn btn-default btn-sm">Hľadať</button>--}}
            {{--</form>--}}

            {!! Form::open( [ 'route' => 'search.index', 'method' => 'get', 'class' => 'navbar-form navbar-left' ]) !!}
            {{ Form::text('search') }}
            {{ Form::submit('Hľadať', ['class' => 'btn btn-default']) }}
            {!! Form::close() !!}

            <ul class="nav navbar-nav navbar-right">
                @if(Auth::check())
                    <li class="dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">{{ $user->name }}<span class="caret"></span></a>
                        <ul class="dropdown-menu">
                            <li class="{{ (current_page("create")) ? 'active' : '' }}"><a href="{{ url('post/create') }}">Vytvoriť článok</a></li>
                            <li><a href="{{ route('user.edit',$user->id)  }}">Profil</a></li>
                            <li><a href="{{ url('user',$user->slug)  }}">Moje články</a></li>
                            @can('admin')
                            <li><a href="{{url('user')}}">Uživatelia</a></li>
                            <li><a href="{{url('kategorie')}}">Kategórie</a></li>
                            @endcan
                            <li role="separator" class="divider"></li>
                            <li><a href="{{ url('/logout') }}">Odhlásenie</a></li>
                        </ul>
                    </li>
                    @else
                    <li><a href="{{url('/login')}}">Pridať článok</a></li>
                    @endif


            </ul>
            <ul class="nav navbar-nav">
            <li><a href="{{url('user')}}">Uživatelia</a></li>
            <li><a href="{{url('zamyslenia')}}">Zamyslenia</a></li>
            </ul>

        </div><!-- /.navbar-collapse -->
    </div><!-- /.container-fluid -->
</nav>





{{--@if ( Auth::check() )--}}
	{{--<nav class="navigation">--}}
		{{--<div class="btn-group btn-group-sm pull-left">--}}
			{{--<a href="{{ url('/') }}" class="btn btn-default"> all posts </a>--}}
			{{--<a href="{{ url('user/' . Auth::user()->id) }}" class="btn btn-default"> my posts </a>--}}
			{{--<a href="{{ url('posts/create') }}" class="btn btn-default"> add new </a>--}}
		{{--</div>--}}
		{{--<div class="btn-group btn-group-sm pull-right">--}}
			{{--<span class="username small">{{ Auth::user()->email }}</span>--}}
			{{--<a href="{{ url('auth/logout') }}" class="btn btn-default logout">logout</a>--}}
		{{--</div>--}}
	{{--</nav>--}}
{{--@endif--}}
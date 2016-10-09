@if(Request::is('/'))
        <div class="container">
            <div class="row">
                @foreach($users as $user)
                    <a href="{{ url('user/' . $user->slug ) }}">
                <div style="float: left; width: 95px;" >
                    <img  data-toggle="tooltip" data-placement="bottom" title="{{$user->name}}" style="max-height: 100px" src="{{ asset('users/' . $user->id . '/' . $user->avatar ) }}" alt="autor {{ $user->name }}">
                </div>
                    </a>
                @endforeach
                    <a href="{{ url('register') }}">
                        <img style="max-height: 100px" src="{{ asset('images/pridajtesa.jpg' ) }}" alt="...">
            </div>
        </div>

@endif

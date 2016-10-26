@extends('master')


@section('title', $user->name)


@section('content')
    <div class="row">
        <div class="col-md-6">
        <h3><a href="{{ URL::current() }}"> Profil užívateľa:{{ $user->name }}</a></h3>

        <p>Email: {{ $user->email }}</p>

        <p>Registrovaný dňa: {{ $user->created_at }}</p>
        </div>

        <div class="col-md-6">
            @if ($user->avatar)
                <div class="col-md-4">
                    <img class="img-rounded " src="{{ asset('users/' . $user->id . '/' . $user->avatar ) }} ">
                    <button class="btn-info btn-xs"> <a href="{{ route('user.edit', $user->id) }}" >Zmeniť foto</a></button>
                </div>
            @else
                <div>
                    <button class="btn-info btn-xs"> <a href="{{ route('user.edit', $user->id) }}" >Zmeniť foto</a></button>
                    <i class="fa fa-user fa-5x"></i> Profilová fotka
                </div>
            @endif

        </div>
    </div>


    <div class="row">
        <div class="col-md-6">
                {!! Form::model($user, ['route' => [ 'user.update', $user->id ], 'method' => 'put', 'files'=> 'true', 'class' => 'post', 'id' => 'edit-form']) !!}
                {{-- Send email --}}
            @can('admin')
                {{ Form::select('send_email', array('1' => 'Zasielať', '0' => 'Nezasielať'))  }}
            @endcan
                {{-- Title Field --}}
                <div class="form-group">

                    {!! Form::text('email', null, ['class' => 'form-control', 'placeholder' => 'Zmeniť email']) !!}
                </div>
                <div class="form-group">
                    {!! Form::textarea('info_popis', null, ['class' => 'form-control',  'id'=>'article-ckeditor', 'placeholder' => 'Popis o autorovi']) !!}
                </div>
                <div class="form-group">
                    {!! Form::file('avatar', ['class' => 'form-control']) !!}
                </div>

                {{-- Add post Field --}}
                <div class="form-group">
                    {!! Form::button('Uložiť', ['type' => 'submit', 'class' => 'btn btn-primary']) !!}
                <span class="or">
                    or {!! link_back('zrušiť') !!}
                </span>
            </div>
                    {!! Form:: close() !!}
    </div>





    <div>
        {{--Show all user's articles  --}}
        <div class="col-md-6">
            <h3>Všetky články od <strong> {{ $user->name }}</strong></h3>

            @forelse( $user->posts as $post )
                <ul>
                    <li><a href="{{ url('post', $post->slug) }}">{{ $post->title }}</a> </li>
                </ul>
            @empty
                <p>Nie sú žiadne príspevky</p>
            @endforelse
        </div>
    </div>

    {{--CK editor--}}
    <script src="{{ asset('\vendor\unisharp\laravel-ckeditor\ckeditor.js') }}"></script>
    <script>
        CKEDITOR.replace( 'article-ckeditor' );
    </script>
@endsection
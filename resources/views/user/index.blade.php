@extends('master')


@section('title', isset($title) ? strip_tags($title) : 'Všetci použivatelia')


@section('content')
    @include('flash::message')
	<section class="post-list">
		<h1 class="box-heading text-muted">
			{{ $title }}
		</h1>


		@forelse( $users as $user )
            <div class="col-md-6">
                    <div class="media" style="border: 2px solid; margin: 8px 0px;">
                        <a href="{{ url('user', $user->slug) }}"><img class=" col-md-4 media-object img-circle  media-left media-middle "
                                                                      src="{{ asset('users/' . $user->id . '/' . $user->avatar ) }}" style=""></a>

                        <div class="media-body">
                            <h3><a href="{{ url('user', $user->slug) }}">
                                {{ $user->name }}</a>
                            </h3>

                            <p>
                                <i class="fa fa-user-plus"> od {{ $user->created_at }}</i> | <i class="fa fa-comment"> Komentárov</i> | <i class="fa fa-folder">
                                    {{ $user->posts->count() }}
                                </i>
                                | <a href="{{ url('user', $user->slug) }}" class="text-warning ">
                                    Detaily...</a>
                            </p>

                        </div>
                    </div>
            </div>
		@empty

			<p>Nie sú žiadne príspevky!</p>

		@endforelse
	</section>

@endsection


@section('side')
    @include('modul.statistika')


    @endsection


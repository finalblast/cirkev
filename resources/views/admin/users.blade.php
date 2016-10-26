@extends('master')


@section('title', isset($title) ? strip_tags($title) : 'All posts')


@section('content')
    @include('flash::message')
	<section class="post-list">

		<h1 class="box-heading text-muted">
			{!! $title or "Používatelia" !!}
		</h1>


{{--Email list--}}
        <table class="table table-hover table-bordered">
            <thead class="thead-primary">
            <tr>
                <th>id</th>
                <th>Meno</th>
                <th>Email</th>
                <th>Odber</th>
            </tr>
            </thead>
            <tbody>
                @forelse( $users as $user )
                    <tr>
                    <td>{{ $user->id }}</td>
                    <td><a href="{{ url('user', $user->slug) }}">{{ $user->name }}</a></td>
                    <td>{{ $user->email }}</td>
                    <td>{{ $user->send_email }}</td>
                    </tr>
                @empty
                    Žiadna kategória.
                @endforelse
            </tbody>
        </table>

    </section>


@endsection


@section('side')

    {{--@include('modul.statistika')--}}
    {{--@include('modul.latestcom')--}}
    {{--@include('modul.category')--}}



@endsection


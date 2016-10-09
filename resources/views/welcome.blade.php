@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-10 col-md-offset-1">
            <div class="panel panel-default">
                <div class="panel-heading">Welcome</div>


                               @foreach($category as $categoria)

                    <h3>{{ $categoria->title }}</h3>
                                   <p>{{ $categoria->text }}</p>
                @endforeach










                <div class="panel-body">
                   Footer
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

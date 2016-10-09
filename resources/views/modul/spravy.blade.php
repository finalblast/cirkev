@if(Request::is('/'))
    <section class="post-list">

        {{--Hlavná správa--}}
        <h3 class="box-heading">Správy</h3>
                @forelse ($posts as $post)
                    <div class="col-md-6" style="padding: 17px;background-color: #d3d3d3;" >
                        <div style="box-shadow: 7px 7px 5px #888888;overflow: hidden;">@include('partials.image_title_spravy')</div>
                        <div>
                            <h5 style="font-size: 130%"> <a href="{{ url($post->slug) }}">
                                    @if($post->video_link) <img src="{{ url('images/play_icon.png') }}"> @endif <strong>{{ $post->title }}</strong></a></h5>

                            {{--<time datetime="{{ $post->datetime }}" style="">--}}
                            <span class="author">{{ $post->user->name }}</span>
                            <span > {{ $post->created_at }}
                            {{--<i class="fa fa-comment"> ({{ $post->comments->count() }}) </i> |--}}
                            {{--<i class="fa fa-eye"> ({{ $post->count_view }}x) </i>--}}
                            {{--| Kat.({{ $post->group->name }})--}}
                            {{--</span>--}}
                            {{--</time>--}}
                            {!! htmlspecialchars_decode (str_limit ($post->text, 85)) !!}
                        </div>
                    </div>

        @empty
            <p>Nie sú žiadne príspevky!</p>
        @endforelse
        {{--Koniec hlavnej správy--}}


{{--Secont Box 5 News--}}
        <div class="col-md-6">
            <ol>
            @forelse ($postsNext as $post)
            <div data-toggle="tooltip" data-placement="top" title="{{ str_limit ($post->text, 300) }}">
                {{--@include('partials.image_title_spravy')</div>--}}

                <li style="font-size: 130%"> <a href="{{ url($post->slug) }}">
                        @if($post->video_link) <img src="{{ url('images/play_icon.png') }}"> @endif <strong>{{ $post->title }}</strong></a></li>

                <time datetime="{{ $post->datetime }}" style="">

                    <span class="author">{{ $post->user->name }}</span>
                    <span> {{ $post->created_at }}
                {{--<i class="fa fa-comment"> ({{ $post->comments->count() }}) </i> |--}}
                {{--<i class="fa fa-eye"> ({{ $post->count_view }}x) </i>--}}
                {{--| Kat.({{ $post->group->name }})--}}
                </span>
                </time>
        </div>
        @empty <p>Nie sú žiadne príspevky!</p>
        @endforelse
                </ol>

            <a href="{{ url('kategorie/spravy') }}"><div class="label label-info pull-right">Všetky správy <i class="fa fa-arrow-right" aria-hidden="true"></i></div></a>
            <div data-toggle="tooltip" data-placement="right" title="Chcete pridať vlastnú správu? Napíšte nám aleba sa registrujte. Váš príspevok radi uverejníme." class="label label-danger pull-right">Pridať správu <i class="fa fa-plus" aria-hidden="true"></i></div>

    </section>


@endif




{{--Old version news (správ)--}}


{{--@if(Request::is('/'))--}}
    {{--<section class="post-list">--}}

        {{--<h1 class="box-heading text-muted">Správy</h1>--}}

        {{--@forelse(array_chunk($posts->all(), 4) as $row )--}}
            {{--<div class="row">--}}
                {{--@foreach($row as $post)--}}
                    {{--<div class="col-sm-6 col-md-3" style="margin-bottom: 20px;" >--}}

                        {{--<div style="box-shadow: 7px 7px 5px #888888;overflow: hidden; max-height: 100px;">--}}
                            {{--@include('partials.image_title_spravy')</div>--}}
                        {{--<div>--}}
                            {{--<h5 style="font-size: 130%"> <a href="{{ url($post->slug) }}">--}}
                                    {{--@if($post->video_link) <img src="{{ url('images/play_icon.png') }}"> @endif <strong>{{ $post->title }}</strong></a></h5>--}}

                            {{--<time datetime="{{ $post->datetime }}" style="">--}}
                            {{--<span style="color: rgb(166, 164, 7)">{{ $post->user->name }}</span> <span class=""> {{ $post->created_at }} |--}}
                            {{--<i class="fa fa-comment"> ({{ $post->comments->count() }}) </i> |--}}
                            {{--<i class="fa fa-eye"> ({{ $post->count_view }}x) </i>--}}
                            {{--| Kat.({{ $post->group->name }})--}}
                            {{--</span>--}}
                            {{--</time>--}}
                        {{--</div>--}}
                    {{--</div>--}}
                {{--@endforeach--}}
            {{--</div>--}}

        {{--@empty--}}
            {{--<p>Nie sú žiadne príspevky!</p>--}}
        {{--@endforelse--}}
        {{--<a href="{{ url('kategorie/spravy') }}"><div class="label label-info pull-right"> Všetky správy</div></a>--}}
    {{--</section>--}}


{{--@endif--}}

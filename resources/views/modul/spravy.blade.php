
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
                            <i class="fa fa-comment"> ({{ $post->comments->count() }}) </i> |
                            <i class="fa fa-eye"> ({{ $post->count_view }}x) </i>
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
             @forelse ($postsNext as $post)
            <div class="row" style="margin-bottom: 12px">
                    <div class="col-xs-3" style="overflow: hidden"> @include('partials.image_title_spravy')</div>
                <a href="{{ url($post->slug) }}"><strong>{{ $post->title }}</strong><br/></a>

                <span class="author">{{ $post->user->name }}</span>
                <span> <time datetime="{{ $post->datetime }}">{{ $post->created_at }}</time>
                {{--<i class="fa fa-comment"> ({{ $post->comments->count() }}) </i> |--}}
                <i class="fa fa-eye"> ({{ $post->count_view }}x) </i>
                </span>

            </div>
             @empty <p>Nie sú žiadne príspevky!</p>
             @endforelse
        </div>
    </section>
@endif

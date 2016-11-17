@if($post->picture)
    <a href="{{ url($post->slug) }}"><img class="media-object" src="{{ asset('posts/' . $post->id . '/' . $post->picture ) }}"  style="width: 100%" alt="{{ $post->user->name }}" ></a>

@elseif($post->video_link)
    <a href="{{ url($post->slug) }}"><img class="media-object" src=" http://img.youtube.com/vi/{{ $post->video_link }}/mqdefault.jpg"  style="width: 100%;" alt="{{ $post->user->name }}" ></a>

@elseif($post->user->avatar)
    <a href="{{ url($post->slug) }}"><img class="media-object" src="{{ asset('users/' . $post->user->id . '/' . $post->user->avatar ) }}
                "style="width: 100%; margin: -5% 0px -30% 0px;"
                                          alt="{{ $post->user->name }}" ></a>

@else
    <a href="{{ url($post->slug) }}"><img class="media-object" src="{{ asset('images/foto.jpg') }}" alt="{{ $post->user->name }}"  style="width: 100%"></a>

@endif
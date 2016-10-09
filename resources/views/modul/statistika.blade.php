

    <div class="panel panel-success">
        <div class="panel-heading">Najčítanejšie články<span class="glyphicon glyphicon-picture pull-right"></span></div>
        <div class="panel-body">
            @forelse( $posledne_prispevky as $post)
                <p><a class="text-success" href="{{ url($post->slug) }}"><strong>{{ str_limit($post->title, 22) }}</strong></a> <small class="pull-right"> {{$post->count_view}}x</small></p>
            @empty
                Žiadne príspevky
            @endforelse
        </div>
    </div>




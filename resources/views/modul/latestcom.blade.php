
    <div class="panel panel-info">
        <div class="panel-heading">Posledné komentáre<span class="glyphicon glyphicon-comment pull-right"></span></div>
        <div class="panel-body">
            @forelse( $posledne_com as $comentar)
                <p><a class="text-success" href="{{ url( $comentar->post->slug) }}"><strong>{{ str_limit($comentar->text, 28) }}</strong></a> <small class="pull-right"> {{$comentar->count_view}}</small></p>
            @empty
                Žiadne príspevky
            @endforelse
        </div>
    </div>

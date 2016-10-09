
    <div class="panel panel-info">
        <div class="panel-heading">Nové komentáre<span class="glyphicon glyphicon-comment pull-right"></span></div>
        <div class="panel-body">
            @forelse( $posledne_com as $comentar)
                <p><a class="text-success" href="{{ url('post', $comentar->id) }}"><strong>{{ str_limit($comentar->text, 28) }}</strong></a> <small class="pull-right"> {{$comentar->count_view}}x</small></p>
            @empty
                Žiadne príspevky
            @endforelse
        </div>
    </div>

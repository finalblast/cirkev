{{--Tahá z ServiceProviders--}}

@if ( $categories )
    <div class="panel panel-danger">
        <div class="panel-heading">Kategórie <span class="glyphicon glyphicon-folder-open pull-right"></span></div>
            <div class="list-group">

                    @forelse ( $categories as $category )
                        <a class="{{ (current_page($category->slug)) ? 'active' : '' }} list-group-item" href="{{ url('kategorie', $category->slug) }}"><strong>{{ $category->name  }}</strong>
                            <small class="pull-right">({{ $category->posts->count() }})</small></a>
                        @empty
                        Žiadne príspevky
                    @endforelse
            </div>
    </div>

@endif





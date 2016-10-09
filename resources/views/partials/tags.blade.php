
@if ( $post->tags )

	<p class="tags" style="clear: both;">
		@foreach ( $post->tags as $tag )
			<a href="{{ url('tag', $tag->id) }}" class="btn btn-warning btn-xs">
				<small>{{ $tag->tag  }}</small>
			</a>
		@endforeach
	</p>

@endif
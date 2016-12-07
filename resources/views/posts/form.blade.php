<header class="post-header">
	<h1 class="box-heading">{{ $title }}</h1>
</header>
<style> select {
        width: 100%;
        padding: 13px 17px;
        border: none;
        border-radius: 4px;
        background-color: #6d0c2d;
        font-size: 15px;
        color: white;
    }</style>

<div class="col-md-12 row">
    <div class="form-group col-md-3 row">
        <label>Kategória</label>
        <?php $cat= $categories->toArray();
        array_unshift($cat,'-- Vybrať --');
            $selected = (isset($post)? $post->group->id : 0 );
        ?>
        {!!Form::select('group_id', $cat , $selected , ['class' => 'form-control'] ) !!}
    </div>

    {{-- Video Link --}}
    <div class="form-group col-md-3">
        <label>Video YouTube</label>
        {!! Form::text('video_link', null, ['class' => 'form-control',  'placeholder' => 'Odkaz na video Youtube']) !!}
    </div>

    <div class="form-group col-md-3">
        <label>Obrázok</label>
        {!! Form::file('picture', ['class' => 'form-control']) !!}
    </div>


    @can('admin')
    <div class="form-group col-md-3">
        <label>Autor</label>
    <select class="form-control" name="user_id">
        @foreach($users as $user)
            <option value="{{ $user->id }}">{{ $user->name }}</option>
        @endforeach
    </select>
    </div>

    {{--Može sa zmazať ale neviem prečo to bez toho neide--}}
        <div class="form-group col-md-3">
            <?php $cat= $users->toArray();
            array_unshift($cat,'-- Vybrať --');
            $selected = (isset($post)? $post->user->id : 0 ); ?>
{{--            {!! Form::select('user_id', $cat , $selected , ['class' => 'form-control'] ) !!}--}}
        </div>
    @endcan


</div>

{{-- Title Field --}}
<div id="app" class="form-group">
    <div class="input-group">
    {!! Form::text ('title', null, ['class' => 'form-control', 'placeholder' => 'Názov článku', 'v-model' => 'nadpis' ]) !!}
        <div  class="input-group-addon">200</div>
        </div>
</div>


{{-- Text Field --}}
<div class="form-group">
	{!! Form::textarea('text', null, ['class' => 'form-control', 'id'=>'article-ckeditor', 'placeholder' => 'napíšte svoj článok']) !!}
</div>



 {{--Tags Field--}}
<div class="form-group">
	@foreach($tags as $tag)
		<label class="checkbox-inline">
			{!! Form::checkbox('tags[]', $tag->id, null) !!}
			{{ $tag->tag }}
		</label>
	@endforeach
</div>

{{-- Add post Field --}}
<div class="form-group">
	{!! Form::button($title, ['type' => 'submit', 'class' => 'btn btn-primary' ]) !!}
	<span class="or">
		or {!! link_back('zrušiť') !!}
	</span>
</div>




{{--CK editor--}}
<script src="{{ asset('\vendor\unisharp\laravel-ckeditor\ckeditor.js') }}"></script>

<script>
    CKEDITOR.replace( 'article-ckeditor' );
</script>

<script src="{{ asset('\js\vue.js') }}"></script>

<script>



{{--new Vue({--}}
    {{--el: '#app',--}}

    {{--data: {--}}
        {{--nadpis: '{{ $post->title }}'--}}
    {{--},--}}

    {{--computed: {--}}
        {{--dlzka: function () {--}}
            {{--return 200 - this.nadpis.length--}}
        {{--}--}}
    {{--}--}}



{{--});--}}

</script>
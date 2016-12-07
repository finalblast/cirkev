
            <div class="modal-body">
                {!! Form::open(['route' =>  ['contactStoreUser', $post->user->id], 'method'=>'post', 'class' => 'form']) !!}

                {{--<input type="hidden" name="user-email" value="{{ $post->user->email }}">--}}

                <div class="form-group">
                    {!! Form::label('Meno') !!}
                    {!! Form::text('name', null,
                    array('required',
                    'class'=>'form-control',
                    'placeholder'=>'Vaše meno')) !!}
                </div>

                <div class="form-group">
                    {!! Form::label('Vaša E-mail Adresa') !!}
                    {!! Form::text('email', null,
                    array('required',
                    'class'=>'form-control',
                    'placeholder'=>'Vaša e-mail adresa')) !!}
                </div>

                <div class="form-group">
                    {!! Form::label('Správa') !!}
                    {!! Form::textarea('message', null,
                    array('required',
                    'class'=>'form-control',
                    'placeholder'=>'Napíšte svoju správu')) !!}
                </div>


                <div class="form-group">
                    {!! Form::label('Som človek  3 + 2 =' ) !!}
                    <input type="text" name="iamHuman" placeholder="Vpíšte číslo">
                    {{--{!! Form::number('iamHuman', null,--}}
                    {{--array('required',--}}
                    {{--'class'=>'form-control',--}}
                    {{--'placeholder'=>'Vpíšte číslo')) !!}--}}
                </div>


                {{--<div class="form-group">--}}
                    {{--{!! app('captcha')->display() !!}--}}
                {{--</div>--}}

                {{--@if ($errors->has('g-recaptcha-response') )--}}

                    {{--<span class="help-block">--}}
                        {{--<strong>{{ $errors->first('g-recaptcha-response') }}</strong>--}}
                    {{--</span>--}}
                {{--@endif--}}

                {{--<div class="g-recaptcha" data-sitekey="6LfEPh8TAAAAAOoTzCkcPibBsC6BH7_dFd6h7Q6q"></div>--}}

                <div class="form-group">
                    {!! Form::submit('Odoslať!',
                    array('class'=>'btn btn-primary')) !!}
                </div>

                {!! Form::close() !!}
        </div>

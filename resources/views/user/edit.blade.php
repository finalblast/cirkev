@extends('master')


@section('title', $user->name)
@section('headerScript')
    {{--Javasscript for google maps --}}
    <script type="text/javascript" src="http://maps.google.com/maps/api/js?sensor=false"></script>
    <script type="text/javascript">
        var geocoder = new google.maps.Geocoder();

        function geocodePosition(pos) {
            geocoder.geocode({
                latLng: pos
            }, function(responses) {
                if (responses && responses.length > 0) {
                    updateMarkerAddress(responses[0].formatted_address);
                } else {
                    updateMarkerAddress('Cannot determine address at this location.');
                }
            });
        }

        function updateMarkerStatus(str) {
            document.getElementById('markerStatus').innerHTML = str;
        }

        function updateMarkerPosition(latLng) {
            document.getElementById('info').innerHTML = [
                latLng.lat(),
                latLng.lng()
            ].join(', ');
        }

        function updateMarkerAddress(str) {
            document.getElementById('address').innerHTML = str;
        }

        function initialize() {
            var latLng = new google.maps.LatLng(48.780035, 19.49248460937497);
            var map = new google.maps.Map(document.getElementById('mapCanvas'), {
                zoom: 7,
                center: latLng,
                mapTypeId: google.maps.MapTypeId.ROADMAP
            });
            var marker = new google.maps.Marker({
                position: latLng,
                title: 'Poťiahnite na vašu polohu',
                map: map,
                draggable: true
            });

            // Update current position info.
            updateMarkerPosition(latLng);
            geocodePosition(latLng);

            // Add dragging event listeners.
            google.maps.event.addListener(marker, 'dragstart', function() {
                updateMarkerAddress('Posúvam ...');
            });

            google.maps.event.addListener(marker, 'drag', function() {
                updateMarkerStatus('Posúvam ...');
                updateMarkerPosition(marker.getPosition());
            });

            google.maps.event.addListener(marker, 'dragend', function() {
                updateMarkerStatus('Stop');
                geocodePosition(marker.getPosition());
            });
        }

        // Onload handler to fire off the app.
        google.maps.event.addDomListener(window, 'load', initialize);
    </script>
@endsection


@section('video-fool')
    Style for checkbox
    <style>
        .checkbox {
            padding-left: 20px; }
        .checkbox label {
            display: inline-block;
            position: relative;
            padding-left: 5px; }
        .checkbox label::before {
            content: "";
            display: inline-block;
            position: absolute;
            width: 17px;
            height: 17px;
            left: 0;
            margin-left: -20px;
            border: 1px solid #cccccc;
            border-radius: 3px;
            background-color: #fff;
            -webkit-transition: border 0.15s ease-in-out, color 0.15s ease-in-out;
            -o-transition: border 0.15s ease-in-out, color 0.15s ease-in-out;
            transition: border 0.15s ease-in-out, color 0.15s ease-in-out; }
        .checkbox label::after {
            display: inline-block;
            position: absolute;
            width: 16px;
            height: 16px;
            left: 0;
            top: 0;
            margin-left: -20px;
            padding-left: 3px;
            padding-top: 1px;
            font-size: 11px;
            color: #555555; }
        .checkbox input[type="checkbox"] {
            opacity: 0; }
        .checkbox input[type="checkbox"]:focus + label::before {
            outline: thin dotted;
            outline: 5px auto -webkit-focus-ring-color;
            outline-offset: -2px; }
        .checkbox input[type="checkbox"]:checked + label::after {
            font-family: 'FontAwesome';
            content: "\f00c"; }
        .checkbox input[type="checkbox"]:disabled + label {
            opacity: 0.65; }
        .checkbox input[type="checkbox"]:disabled + label::before {
            background-color: #eeeeee;
            cursor: not-allowed; }
        .checkbox.checkbox-circle label::before {
            border-radius: 50%; }
        .checkbox.checkbox-inline {
            margin-top: 0; }

        .checkbox-primary input[type="checkbox"]:checked + label::before {
            background-color: #428bca;
            border-color: #428bca; }
        .checkbox-primary input[type="checkbox"]:checked + label::after {
            color: #fff; }

        .checkbox-danger input[type="checkbox"]:checked + label::before {
            background-color: #d9534f;
            border-color: #d9534f; }
        .checkbox-danger input[type="checkbox"]:checked + label::after {
            color: #fff; }

        .checkbox-info input[type="checkbox"]:checked + label::before {
            background-color: #5bc0de;
            border-color: #5bc0de; }
        .checkbox-info input[type="checkbox"]:checked + label::after {
            color: #fff; }

        .checkbox-warning input[type="checkbox"]:checked + label::before {
            background-color: #f0ad4e;
            border-color: #f0ad4e; }
        .checkbox-warning input[type="checkbox"]:checked + label::after {
            color: #fff; }

        .checkbox-success input[type="checkbox"]:checked + label::before {
            background-color: #5cb85c;
            border-color: #5cb85c; }
        .checkbox-success input[type="checkbox"]:checked + label::after {
            color: #fff; }

        .radio {
            padding-left: 20px; }
        .radio label {
            display: inline-block;
            position: relative;
            padding-left: 5px; }
        .radio label::before {
            content: "";
            display: inline-block;
            position: absolute;
            width: 17px;
            height: 17px;
            left: 0;
            margin-left: -20px;
            border: 1px solid #cccccc;
            border-radius: 50%;
            background-color: #fff;
            -webkit-transition: border 0.15s ease-in-out;
            -o-transition: border 0.15s ease-in-out;
            transition: border 0.15s ease-in-out; }
        .radio label::after {
            display: inline-block;
            position: absolute;
            content: " ";
            width: 11px;
            height: 11px;
            left: 3px;
            top: 3px;
            margin-left: -20px;
            border-radius: 50%;
            background-color: #555555;
            -webkit-transform: scale(0, 0);
            -ms-transform: scale(0, 0);
            -o-transform: scale(0, 0);
            transform: scale(0, 0);
            -webkit-transition: -webkit-transform 0.1s cubic-bezier(0.8, -0.33, 0.2, 1.33);
            -moz-transition: -moz-transform 0.1s cubic-bezier(0.8, -0.33, 0.2, 1.33);
            -o-transition: -o-transform 0.1s cubic-bezier(0.8, -0.33, 0.2, 1.33);
            transition: transform 0.1s cubic-bezier(0.8, -0.33, 0.2, 1.33); }
        .radio input[type="radio"] {
            opacity: 0; }
        .radio input[type="radio"]:focus + label::before {
            outline: thin dotted;
            outline: 5px auto -webkit-focus-ring-color;
            outline-offset: -2px; }
        .radio input[type="radio"]:checked + label::after {
            -webkit-transform: scale(1, 1);
            -ms-transform: scale(1, 1);
            -o-transform: scale(1, 1);
            transform: scale(1, 1); }
        .radio input[type="radio"]:disabled + label {
            opacity: 0.65; }
        .radio input[type="radio"]:disabled + label::before {
            cursor: not-allowed; }
        .radio.radio-inline {
            margin-top: 0; }

        .radio-primary input[type="radio"] + label::after {
            background-color: #428bca; }
        .radio-primary input[type="radio"]:checked + label::before {
            border-color: #428bca; }
        .radio-primary input[type="radio"]:checked + label::after {
            background-color: #428bca; }

        .radio-danger input[type="radio"] + label::after {
            background-color: #d9534f; }
        .radio-danger input[type="radio"]:checked + label::before {
            border-color: #d9534f; }
        .radio-danger input[type="radio"]:checked + label::after {
            background-color: #d9534f; }

        .radio-info input[type="radio"] + label::after {
            background-color: #5bc0de; }
        .radio-info input[type="radio"]:checked + label::before {
            border-color: #5bc0de; }
        .radio-info input[type="radio"]:checked + label::after {
            background-color: #5bc0de; }

        .radio-warning input[type="radio"] + label::after {
            background-color: #f0ad4e; }
        .radio-warning input[type="radio"]:checked + label::before {
            border-color: #f0ad4e; }
        .radio-warning input[type="radio"]:checked + label::after {
            background-color: #f0ad4e; }

        .radio-success input[type="radio"] + label::after {
            background-color: #5cb85c; }
        .radio-success input[type="radio"]:checked + label::before {
            border-color: #5cb85c; }
    </style>



{{--@section('content')--}}
    {!! Form::model($user, ['route' => [ 'user.update', $user->id ], 'method' => 'put', 'files'=> 'true', 'class' => 'post', 'id' => 'edit-form']) !!}

<div class="col-md-6">
            <div class="col-md-6">
                {{--Foto section--}}
                @if ($user->avatar)
                        <img class="img-rounded " src="{{ asset('users/' . $user->id . '/' . $user->avatar ) }} ">
                        <div class="form-group">
                            <label>Zmeniť foto</label>
                            {!! Form::file('avatar', ['class' => 'form-control']) !!}
                        </div>
                @else
                    <div>
                        <button class="btn-info btn-xs"> <a href="{{ route('user.edit', $user->id) }}" >Zmeniť foto</a></button>
                        <i class="fa fa-user fa-5x"></i> Profilová fotka
                <label>Zmeniť foto</label>
                            {!! Form::file('avatar', ['class' => 'form-control']) !!}
                    </div>
                @endif
            </div>


    <div class="col-md-6">
        <h4>Profil:<a href="{{ URL::current() }}"><strong> {{ $user->name }}</strong></a></h4>
        <p>Email: {{ $user->email }}</p>
        <p>Ste členom od: {{ $user->created_at }}</p>

        {{-- Send email --}}
        @can('admin')
        <label>Posielať poštu z webu</label>
        {{ Form::select('send_email', array('1' => 'Zasielať', '0' => 'Nezasielať'))  }}
        @endcan

        <div class="form-group">
            <label class="col-form-label">Váš email</label>
            {!! Form::text('email', null, [ ]) !!}
        </div>

    </div>

</div>

        <div class="col-md-6">
                <div class="form-group">
                    <label>Upraviť profil</label>
                    {!! Form::textarea('info_popis', null, ['class' => 'form-control',  'id'=>'article-ckeditor', 'placeholder' => 'Popis o autorovi']) !!}
                </div>


                 {{--Add post Field--}}
                {{--<div class="form-group">--}}
                    {{--{!! Form::button('Uložiť', ['type' => 'submit', 'class' => 'btn btn-primary']) !!}--}}
                      {{--<span class="or"> or {!! link_back('zrušiť') !!}--}}
                {{--</span>--}}
                {{--</div>--}}
{{--                    {!! Form:: close() !!}--}}
        </div>



{{--Users Geo and profil form--}}
<div style="border: 2px solid rebeccapurple; margin-bottom: 20px; padding-bottom: 10px; border-radius: 8px" class="col-md-12">
    {{--User profile--}}
    <h2 class="text-center">Údaje do mapy kresťanov Slovenska</h2>



    {{--Google maps--}}
    <style>
        /* Always set the map height explicitly to define the size of the div
         * element that contains the map. */
        #map {
            height: 100%;
        }
        /* Optional: Makes the sample page fill the window. */
        html, body {
            height: 100%;
            margin: 0;
            padding: 0;
        }
    </style>

    <div class="col-md-6">
        <p style="color: red">Kliknite na  červený marker a poťahujte na miesto svojho pôsobenia.</p>
        <style>
            #mapCanvas {
                width: 500px;
                height: 400px;
                float: left;
            }
            #infoPanel {
                float: left;
                margin-left: 10px;
            }
            #infoPanel div {
                margin-bottom: 5px;
            }
        </style>

        <div id="mapCanvas"></div>
        <div class="pull-left" id="infoPanel">
            <b>Marker status:</b>
            <div id="markerStatus"><i>Kliknite na marker, držiac ťahajte.</i></div>
            <b>Táto pozícia bude uložená:</b>
            <div id="info"></div>
            <b>Closest matching address:</b>
            <div id="address"></div>
        </div>
    </div>

    <div style="background: hsla(197, 18%, 46%, 0.48" class="col-md-6">

        <div class="checkbox checkbox-primary">
            <input name="sluzba" value="1" id="checkbox2" type="checkbox" checked>
            <label for="checkbox2">
                Chcem slúžiť darmi ktoré som dostal od Pána Boha
            </label>
        </div>

        {{--{!! Form::checkbox('verim', '0') !!}--}}
{{--<label>Verím v JK</label>--}}





        {{--<div class="checkbox checkbox-primary">--}}
            {{--<input name="verim" value="1" id="checkbox3" type="checkbox">--}}
            {{--<label for="checkbox3">--}}
                {{--Verím v Ježiša Krista--}}
            {{--</label>--}}
        {{--</div>--}}


        <div class="checkbox checkbox-default disabled">
            <input name="denomination_id" id="denomination_id" type="checkbox">
            <label for="denomination_id">
                Patrím do cirkvi  <?php $den= $denomination->toArray();
                array_unshift($den,'-- Vybrať --');
                ?>
                {!!Form::select('denomination_id',
              $den,['class' => 'form-control'] ) !!}
            </label>
        </div>

        <div class="checkbox checkbox-primary">
            <input name="membership" value="1" id="membership" type="checkbox">
            <label for="membership">
                Pomôžem vám zapojiť do spoločenstva
            </label>
        </div>

        <div class="checkbox checkbox-primary">
            <input name="homegroupe" value="1" id="checkbox6" type="checkbox">
            <label for="checkbox6">
                Som členom domáceho stretávania a pozývam vás
            </label>
        </div>

        <div class="checkbox checkbox-primary">
            <input name="healing" value="1" id="checkbox7" type="checkbox">
            <label for="checkbox7">
                Modlím sa za telesné uzdravenie
            </label>
        </div>

        <div class="checkbox checkbox-primary">
            <input name="glososalia" value="1" id="checkbox8" type="checkbox">
            <label for="checkbox8">
                Hovorím jazykmy (glososália)
            </label>
        </div>

        <div class="checkbox checkbox-primary">
            <input name="exorsizmus" value="1" id="checkbox9" type="checkbox">
            <label for="checkbox9">
                Môžem sa modliť za duchovné oslobodenie od nečistých síl
            </label>
        </div>



        <h4>Služobné dary</h4>


        <div class="checkbox checkbox-danger">
            <input name="babtise" value="1" id="checkbox10" type="checkbox">
            <label for="checkbox10">
                Môžem pokrstiť
            </label>
        </div>

        <div class="checkbox checkbox-danger">
            <input name="marriage" value="1" id="checkbox11" type="checkbox">
            <label for="checkbox11">
                Môžem sobášiť
            </label>
        </div>

        <div class="checkbox checkbox-danger">
            <input name="funebral" value="1" id="checkbox12" type="checkbox">
            <label for="checkbox12">
                Môžem vykonávať pohreb
            </label>
        </div>

        <div class="checkbox checkbox-danger">
            <input name="diakon" value="1" id="checkbox13" type="checkbox">
            <label for="checkbox13">
                Vykonávam diakonskú službu milosrdenstva a pomoci
            </label>
        </div>

        <div class="checkbox checkbox-success">
            <input name="discusion" value="1" id="checkbox14" type="checkbox">
            <label for="checkbox14">
                Odpovedám na otázky ohľadom viery a biblie
            </label>
        </div>

        <div class="checkbox checkbox-success">
            <input name="meeting" id="checkbox15" type="checkbox" value="1">
            <label for="checkbox15">
                Som otvorený pre osobné stretnutie
            </label>
        </div>

        <div class="checkbox checkbox-success">
            <input name="phonenumber" id="checkbox16" type="checkbox" value="1">
            <label for="checkbox16">
                Zverejniť telefon?? Ctím si Pannu Máriu ako bohorodičku
            </label>
        </div>
    </div>

    {{--<div class="form-group">--}}
    {!! Form::button('Uložiť zmeny v profile', ['type' => 'submit', 'class' => 'btn btn-primary pull-right']) !!}
    {{--<span class="or"> or {!! link_back('zrušiť') !!}--}}
    {{--</span>--}}

    {!! Form:: close() !!}

</div>





<script async defer src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBL4GrUZj-5mnPkYnDr6Or-7tMFF7AQrrI&callback=initMap"
        type="text/javascript">
</script>


    {{--CK editor--}}
    <script src="{{ asset('\vendor\unisharp\laravel-ckeditor\ckeditor.js') }}"></script>
    <script>
        CKEDITOR.replace( 'article-ckeditor' );
    </script>
@endsection
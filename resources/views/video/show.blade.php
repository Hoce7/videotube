@extends('layouts.app')
@section('content')
        <div class="col-lg-offset-4">
            <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header">
                    </h1>
                   <iframe width="560" height="315" src="{{ $url_frame }}" frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
                   
                    <h4>{{ $videos[0]->titre }}</h4>
                    <a href="#" ><h6><a href="{{ $videos[0]->url_auteur }}" target="_blank">{{ $videos[0]->auteur }}</a> par {{ $videos[0]->name }}({{ $videos[0]->duree }} min)</h6></a>
                    <p>{{ $videos[0]->contenu }}</p>

                </div>
            </div>
        </div>
    </body>
@endsection
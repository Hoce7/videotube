@extends('layouts.app')
@section('content')
<div class="col-lg-offset-4">
    <div class="row">
        <div class="col-lg-7">
            <h1 class="page-header">Modifier une vidéo</h1>
            <small>
                <h5 class="pull-right">
                </h5>
            </small>
            <iframe width="560" height="315" src="{{ $url_frame }}" frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
            
            <form action="/videos/upd/{{$videos[0]->video_id}}" method="get">
                <input type="hidden" name="_token" value="{{ csrf_token() }}">
                <a href="#" ><h6><a href="{{ $videos[0]->url_auteur }}" target="_blank">{{ $videos[0]->auteur }}</a> par {{ $videos[0]->name }}({{ $videos[0]->duree }} min)</h6></a>
                <h4>
                    <div class="form-group">
                        <label class="col-md-4 control-label" for="content">Titre</label>  <input type="text" name="title" value="{{ $videos[0]->titre }}"class="form-control input-md">
                    </div></h4>

                    <div class="form-group">
                        <label class="col-md-4 control-label" for="content">Description</label>  
                        <input id="description" name="description" type="text" placeholder="Brève description..." class="form-control input-md" required="" value="{{$videos[0]->description}}">

                    </div>
                    <div class="form-group">
                        <label class="col-md-4 control-label" for="content">Texte de contenu</label>  
                        <textarea name="content" class="form-control input-md">{{ $videos[0]->contenu }}</textarea>
                    </div>
                    <br>
                    <input type="submit" class="btn btn-primary" name="" value="Confirmer">
                </form>
            </div>
        </div>
    </div>
    <br>
    @endsection
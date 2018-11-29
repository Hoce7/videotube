@extends('layouts.app')
@section('content')
<div class="col-lg-offset-3  col-md-offset-3 col-xs-offset-2">
    <div class="row">
        <div class="col-lg-12">
            <h1 class="page-header">
                <img src="https://png.pngtree.com/svg/20170224/category_1203474.png" class="avatar-xs">
                @if(empty($cur_cat))
                Accueil
                @else
                {{ $cur_cat[0]->name }}
                @endif
            </h1>
        </div>
    </div>
    <div class="row">

            @foreach ($videos as $video)
            <div class="col-md-3 portfolio-item">
                <a href="/videos/show/{{ $video->video_id }}" >
                    <img class="img-responsive" src="{{ $video->url_image }}" alt="{{ $video->url_auteur }}">
                    <h4 class="limited-text">{{ substr($video->titre, 0, 26) }}...</h4>
                </a>
                <a href="#" ><h6><a href="{{ $video->url_auteur }}" target="_blank">{{ $video->auteur }}</a> par {{ $video->name }} ({{ $video->duree }} min)</h6></a>
                <p>
                    {{ $video->description }} 
                </p>
            </div>
            @endforeach
    </div>

    {{ $videos->links() }}
</div>
</body>
@endsection
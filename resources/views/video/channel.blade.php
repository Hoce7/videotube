@extends('layouts.app')
@section('content')
<div class="col-lg-offset-3">
    <div class="row">
        <div class="col-lg-12">
            <h1 class="page-header">
                <img src="https://image.flaticon.com/icons/png/512/61/61342.png" class="avatar-xs">
                Ma chaine
            </h1>
        </div>
    </div>
    <div class="row">

        <div class="container">
            <div class="table-responsive">
              <table class="table">
               <caption>Mes vidéos</caption>
               <thead>
                <tr>
                  <th scope="col">Titre</th>
                  <th scope="col">Modifier</th>
                  <th scope="col">Supprimer</th>
              </tr>
          </thead>
          <tbody>
            
          </div>
          @foreach ($videos as $video)
          <tr>
              <td style=" width: 30%;">
                <a href="/videos/show/{{ $video->video_id }}" target="_blank">{{ substr($video->titre, 0, 30) }}...</a></td>
              <td style="width: 1%;"><a href="/videos/edit/{{$video->video_id}}" class="btn btn-warning">Modifier</td>
                  <td><a href="/videos/del/{{$video->video_id}}" class="btn btn-danger">Supprimer</td>
                  </form>
              </tr>
              <tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>

{{ $videos->links() }}
</div>
</body>
@endsection
@extends('layouts.app')
@section('content')

<div class="container">
	<div class="row">

		<div class="col-md-offset-1 col-xs-offset-4">
			<div class="row">

				<form action="/upload" method="get" class="form-horizontal">
					<fieldset>


						<div class="form-group">  
							<h3 class="col-md-6 col-xs-6 control-label" for="video">Uploader une vidéo</h3>  

						</div>
						<hr>

						<div class="form-group">
							<label class="col-md-4 control-label" for="url_video">URL Youtube</label>  
							<div class="col-md-4">
								<input id="url_video" name="url_video" type="text" class="form-control input-md" placeholder="https://www.youtube.com/watch?v=xhwQqzxXP54" >

							</div>
						</div>

						<div class="form-group">
							<label class="col-md-4 control-label" for="content">Description</label>  
							<div class="col-md-4">
								<input id="content" name="description" type="text" placeholder="Brève description..." class="form-control input-md" required="">

							</div>
						</div>

						<div class="form-group">
							<label class="col-md-4 control-label" for="description">Texte de contenu</label>  
							<div class="col-md-4">
								<textarea id="description" name="content" type="text" placeholder="Expliquez votre vidéo en détails" class="form-control input-md" required=""> </textarea> 

							</div>
						</div>
						<div class="form-group">
							<label class="col-md-4 control-label" for="description">Durée</label>  
							<div class="col-md-4">
								<input type="number" class="form-control input-md" name="duration" placeholder="En minutes..." required>

							</div>
						</div>

						<div class="form-group">
							<label class="col-md-4 control-label" for="description">Categorie</label>  
							<div class="col-md-4">
								<select id="category" name="category_id" type="text" placeholder="Expliquez votre vidéo en détails" class="form-control input-md" required="">
									@foreach ($categories as $cat)
									<option value="{{ $cat->id }}">{{ $cat->name }}</option>
									@endforeach
								</select> 

							</div>
						</div>
						
						<div class="form-group">  
							<label class="col-md-4 control-label" for="video"></label>  
							<div class="col-md-4">
								<input type="submit" class="btn btn-primary" name="upload" value="Mettre en ligne">

							</div>
						</div>

						@if (session('message'))
						<div class="form-group">  
							<label class="col-md-4 control-label" for="video"></label>  
							<div class="col-md-4">
								<div class="alert alert-{{session('class')}}">
									{{ session('message') }}
								</div>

							</div>
						</div>
						@endif
						<input type="hidden" name="_token" value="{{ csrf_token() }}">
					</form>
				</div>
				@endsection

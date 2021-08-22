@if(count($errors)>0)
<div class="alert alert-danger" role="alert">

<ul>
@foreach($errors->all() as $error)
  <li>{{ $error }}</li>
@endforeach
</ul>
</div>

@endif

<div class="mb-3 row">
    <label  class="col-sm-2 col-form-label">Titulo</label>
    <div class="col-sm-10">
      <input type="text" name="Titulo" value="{{ isset($marcador->Titulo)?$marcador->Titulo:old('Titulo') }}"  class="form-control" id="Titulo">
    </div>
  </div>
  <div class="mb-3 row">
    <label   class="col-sm-2 col-form-label">Tema</label>
    <div class="col-sm-10">
      <input type="text" name="Tema" value="{{ isset($marcador->Tema)? $marcador->Tema:old('Tema') }}" class="form-control" id="Tema">
    </div>
  </div>
  <div class="mb-3 row">
    <label class="col-sm-2 col-form-label">Enlace</label>
    <div class="col-sm-10">
      <input type="url" name="URL" value="{{ isset($marcador->URL)? $marcador->URL:old('URL') }}" class="form-control" id="URL">
    </div>
  </div>
  
<br>
  <button type="submit" class="btn btn-primary float-right mt-4" >Guardar</button>
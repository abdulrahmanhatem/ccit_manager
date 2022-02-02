

@extends('partials.contracts.create')
@section('projects')
<div class="form-group row">
    <label class="col-lg-3 col-form-label text-lg-right">Project Name:</label>
    <div class="col-lg-4">
        {!! Form::select('project_id', Helper::projects()->pluck('name', 'id'), '', ['class' => 'form-control selectpicker required','data-live-search' => 'true'])!!}	
        <span class="form-text text-muted">Please Choose Project</span>
    </div>
</div>
@endsection
            
  


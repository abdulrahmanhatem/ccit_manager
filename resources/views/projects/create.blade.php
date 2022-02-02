@extends('partials.projects.create')
@section('customer')
	<div class="form-group row">
		<label class="col-xl-3 col-lg-3 col-form-label">Customer Name</label>
		<div class="col-lg-9 col-xl-9">
			
			{!! Form::select('user_id', Helper::customers()->pluck('name', 'id'),'', ['class' => 'form-control selectpicker required','data-live-search' => 'true'])!!}

			
			<span class="form-text text-muted">Please Choose Customer</span>
		</div>
	</div>
@endsection
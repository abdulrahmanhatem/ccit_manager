
@extends('partials.invoices.create')
@section('customer')
<div class="form-group row">
    <label class="col-lg-2 col-form-label text-lg-right">Customer Name:</label>
    <div class="col-lg-6">
        {!! Form::select('user_id', Helper::customers()->pluck('name', 'id'), '', ['class' => 'form-control selectpicker required','data-live-search' => 'true'])!!}	
        <span class="form-text text-muted">Please Choose Customer</span>
    </div>
</div>
@endsection
                   
                  
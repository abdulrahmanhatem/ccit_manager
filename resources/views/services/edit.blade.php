
<!--begin::Card-->
<div class="card mb-8">
    <!--begin::Body-->
    <div class="card-body p-10">
        <!--begin::Row-->
        <div class="row">
            <div class="col-lg-8">
                <!--begin::Card-->
                <div class="card card-custom">
                    <div class="card-header">
                        <div class="card-title">
                            <h3 class="card-label">Service Details</h3>
                        </div>
                    </div>
                    <!--begin::Form-->
                    {!! Form::open([ 'action'=> ['ServiceController@update', $service->id], 'method'=>'POST', 'files' => true, 'enctype' => 'multipart/form-data', 'class' => '' ]) !!}
                    @csrf    
                        <div class="card-body">
                            <div class="form-group row">
                                <label class="col-lg-3 col-form-label text-lg-right">Service Name:</label>
                                <div class="col-lg-7">
                                <input name="name" type="text" class="form-control required" placeholder="Service Name" value="{{$service->name}}"> 
                                    <span class="form-text text-muted">Please Enter Service Customer</span>
                                </div>
                            </div>

                            <div class="form-group row">
                                <label class="col-lg-3 col-form-label text-lg-right">Service Arabic Name:</label>
                                <div class="col-lg-7">
                                <input name="name_ar" type="text" class="form-control required" placeholder="Service Arabic Name" value="{{$service->name_ar}}"> 
                                    <span class="form-text text-muted">Please Enter Service Arabic Name</span>
                                </div>
                            </div>
                        </div>
                        <div class="card-footer">
                            <div class="row">
                                <div class="col-lg-3"></div>
                                <div class="col-lg-9">
                                    {!! Form::hidden('_method', 'PUT')!!}
                                    <button type="submit" class="btn btn-light-primary mr-2">Update</button>
                                    <a href="{{url('services')}}" class="btn btn-primary">Cancel</a>
                                </div>
                            </div>
                        </div>
                    </form>
                    <!--end::Form-->
                </div>
                <!--end::Card-->
            </div>
        </div>
        <!--end::Row-->
    </div>
    <!--end::Body-->
</div>
<!--end::Item-->
       
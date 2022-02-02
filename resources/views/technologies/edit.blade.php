
<!--begin::Card-->
<div class="card card-custom">
    <div class="card-header">
        <div class="card-title">
            <h3 class="card-label">Technology Details</h3>
        </div>
    </div>
    <!--begin::Form-->
    {!! Form::open([ 'action'=> ['TechnologyController@update', $technology->id], 'method'=>'POST', 'files' => true, 'enctype' => 'multipart/form-data', 'class' => '' ]) !!}
    @csrf    
        <div class="card-body">
            <!--begin::Group-->
                    <div class="form-group row">
                        <label class="col-lg-3 col-form-label text-lg-right">Logo</label>
                        <div class="col-lg-9 col-xl-9 avatar_box" id="{{$technology->id}}">
                            <div class="image-input image-input-outline">
                                @if (Helper::fileExists($technology->avatar, 'uploads/images/logos/technologies'))
                                    <img class="image-input-wrapper edit_avatar_preview-{{$technology->id}}" src="{{asset('uploads/images/logos/technologies/'.$technology->avatar)}}">
                                @else 
                                    <img class="image-input-wrapper edit_avatar_preview-{{$technology->id}}" src="{{asset('assets/assets/media/stock-600x600/img-6.jpg')}}">
                                @endif
                                <label class="btn btn-xs btn-icon btn-circle btn-white btn-hover-text-primary btn-shadow" data-action="change" data-toggle="tooltip" title="" data-original-title="Change avatar" for="edit_avatar_{{$technology->id}}">
                                    <i class="fa fa-pen icon-sm text-muted"></i>
                                    {{-- <input type="hidden" name="profile_avatar_remove" /> --}}
                                    <input type="file" name="avatar" accept=".png, .jpg, .jpeg" id="edit_avatar_{{$technology->id}}"/>
                                </label>
                                <span class="btn btn-xs btn-icon btn-circle btn-white btn-hover-text-primary btn-shadow" data-action="cancel" data-toggle="tooltip" title="Cancel avatar">
                                    <i class="ki ki-bold-close icon-xs text-muted"></i>
                                </span>
                                
                            </div>
                        </div>
                    </div>
                    <!--end::Group-->
            <div class="form-group row">
                <label class="col-lg-3 col-form-label text-lg-right">Technology Name:</label>
                <div class="col-lg-7">
                <input name="name" type="text" class="form-control required" placeholder="Technology Name" value="{{$technology->name}}"> 
                    <span class="form-text text-muted">Please Enter Technology Name</span>
                </div>
            </div>
        </div>
        <div class="card-footer">
            <div class="row">
                <div class="col-lg-3"></div>
                <div class="col-lg-9">
                    {!! Form::hidden('_method', 'PUT')!!}
                    <button type="submit" class="btn btn-light-primary mr-2">Update</button>
                    <a href="{{url('technologies')}}" class="btn btn-primary">Cancel</a>
                </div>
            </div>
        </div>
    </form>
    <!--end::Form-->
</div>
<!--end::Card-->
					
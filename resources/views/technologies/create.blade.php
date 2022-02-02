
<!--begin::Card-->
<div class="card mb-8">
    <!--begin::Body-->
    <div class="card-body p-10">
        <!--begin::Row-->
        <div class="row">
            <div class="col-lg-12">
                <!--begin::Card-->
                <div class="card card-custom">
                    <div class="card-header">
                        <div class="card-title">
                            <h3 class="card-label">Technology Details</h3>
                        </div>
                    </div>
                    <!--begin::Form-->
                    {!! Form::open([ 'action'=> ['TechnologyController@store'], 'method'=>'POST', 'files' => true, 'enctype' => 'multipart/form-data', 'class' => '', 'id' => '' ]) !!}
                    @csrf    
                        <div class="card-body">
                            <!--begin::Group-->
                                    <div class="form-group row">
                                        <label class="col-lg-3 col-form-label text-lg-right">Logo</label>
                                        <div class="col-lg-9 col-xl-9">
                                            <div class="image-input image-input-outline">
                                                <img class="image-input-wrapper" src="{{asset('assets/media/stock-600x600/img-6.jpg')}}" id="avatar_preview">
                                                <label class="btn btn-xs btn-icon btn-circle btn-white btn-hover-text-primary btn-shadow" data-action="change" data-toggle="tooltip" title="" data-original-title="Change Logo" for="avatar">
                                                    <i class="fa fa-pen icon-sm text-muted"></i>
                                                    {{-- <input type="hidden" name="profile_avatar_remove" /> --}}
                                                    <input type="file" name="avatar" accept=".png, .jpg, .jpeg" id="avatar"/>
                                                </label>
                                                <span class="btn btn-xs btn-icon btn-circle btn-white btn-hover-text-primary btn-shadow" data-action="cancel" data-toggle="tooltip" title="Cancel avatar">
                                                    <i class="ki ki-bold-close icon-xs text-muted"></i>
                                                </span>
                                                <script>
                                                    const inputFile = document.getElementById('avatar');
                                                    const avatar_preview = document.getElementById('avatar_preview');
    
                                                    inputFile.addEventListener('change', function(){
                                                        const file = this.files[0];
                                                        
                                                        if(file){
                                                            console.log(file);
                                                            const reader = new FileReader();
    
                                                            reader.addEventListener("load", function(){
                                                                avatar_preview.setAttribute("src", this.result);
                                                                console.log(this);
                                                            })
    
                                                            reader.readAsDataURL(file);
                                                        } 
                                                    })
                                                </script>
                                            </div>
                                        </div>
                                    </div>
                                    <!--end::Group-->
                            <div class="form-group row">
                                <label class="col-lg-3 col-form-label text-lg-right">Technology Name:</label>
                                <div class="col-lg-7">
                                    <input name="name" type="text" class="form-control required" placeholder="Technology Name" value=""> 
                                    <span class="form-text text-muted">Please Enter Technology Name</span>
                                </div>
                            </div>
                        </div>
                        <div class="card-footer">
                            <div class="row">
                                <div class="col-lg-3"></div>
                                <div class="col-lg-9">
                                    <button type="submit" class="btn btn-light-primary mr-2">Add</button>
                                    <a href="{{url('technologies')}}" class="btn btn-primary">Cancel</a>
                                </div>
                            </div>
                        </div>
                    </form>
                    <!--end::Form-->
                </div>
                <!--end::Card-->
            </div>
            <div class="col-lg-3 text-right">
                {{-- @if (!empty($quote->status))
                    @if ($quote->status == 1)
                        <span class="label label-inline label-light-danger font-weight-bold">
                            Pending
                        </span>
                    @else 
                        <span class="label label-inline label-light-success font-weight-bold">
                            Closed
                        </span>
                    @endif
                @endif --}}
            </div>
        </div>
        <!--end::Row-->
    </div>
    <!--end::Body-->
</div>
<!--end::Item-->
       
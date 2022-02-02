

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
                            <h3 class="card-label">Proposal Details</h3>
                        </div>
                    </div>
                    <!--begin::Form-->
                    {!! Form::open([ 'action'=> ['ProposalController@update', $proposal->id ], 'method'=>'POST', 'files' => true, 'enctype' => 'multipart/form-data', 'class' => '' ]) !!}
                        @csrf    
                        <div class="card-body">
                            <div class="form-group row">
                                <label class="col-lg-3 col-form-label text-lg-right">Customer Name:</label>
                                <div class="col-lg-7">
                                    {!! Form::select('user_id', Helper::customers()->pluck('name', 'id'), $proposal->user_id,  ['class' => 'form-control selectpicker required','data-live-search' => 'true'])!!}	
                                    <span class="form-text text-muted">Please Choose Customer</span>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-lg-3 col-form-label text-lg-right">Prposal Name:</label>
                                <div class="col-lg-7">
                                    <input name="name" type="text" class="form-control required" placeholder="Proposal Name" value="{{$proposal->name}}"> 
                                    <span class="form-text text-muted">Please Enter Proposal Name</span>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-lg-3 col-form-label text-lg-right">Prposal Price:</label>
                                <div class="col-lg-7">
                                    <input name="price" type="text" class="form-control required" placeholder="Proposal Name" value="{{$proposal->price}}"> 
                                    <span class="form-text text-muted">Please Enter Proposal Price</span>
                                </div>
                            </div>
                            <div class="form-group row" id="proposal_id_{{$proposal->id}}">
                                <label class="col-form-label text-right col-lg-3 col-sm-12">Expired Date</label>
                                <div class="col-lg-7 col-md-9 col-sm-12">
                                <input type="text" class="form-control" placeholder="Expired Date" id="proposal_datepicker_{{$proposal->id}}" name="expired_date" autocomplete="off" value="{{$proposal->expired_date}}"/>
                                    <span class="form-text text-muted">Please Choose Expired Date</span>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-form-label text-right col-lg-3 col-sm-12">Status</label>
                                <div class="col-3">
                                    <span class="switch">
                                        @if ($proposal->status == 0)
                                            <label class="checkbox-checked"> 
                                            <input type="text" name="status" id="status_{{$proposal->id}}" value="0">
                                        @else
                                            <label> 
                                            <input type="text" name="status" id="status_{{$proposal->id}}" value="1">
                                        @endif
                                            <span></span>
                                        </label>
                                    </span>
                                </div>
                            </div>
                            {{-- <div class="form-group row">
                                <label class="col-form-label text-right col-lg-3 col-sm-12">Proposal Status</label>
                                {{-- <div class="col-lg-9 col-md-9 col-sm-12">
                                    <input name="status" data-switch="true" type="checkbox"  data-on-text="Avaliable" data-handle-width="70" data-off-text="Expired" data-on-color="success" data-off-color="danger"/>
                                </div>
                                <div class="col-3">
                                    <span class="switch switch-icon">
                                        <label>
                                            @if ($proposal->status === 0)
                                                <input type="checkbox" id="salary_hide" name="salary_hide" class="custom-control-input" value ="0" Checked>
                                            @else 
                                                <input type="checkbox" id="salary_hide" name="salary_hide" class="custom-control-input" value ="1" >
                                            @endif 
                                            
                                            @if ($proposal->status === 0)
                                                <input type="checkbox" checked="checked" name="status" value="0"/>
                                            @else
                                                <input type="checkbox" name="status" value="1"/>
                                            @endif
                                            <span></span>
                                        </label>
                                    </span>
                                </div>
                            </div> --}} 
                            <div class="form-group row">
                                <label class="col-lg-3 col-form-label text-lg-right">Upload Files:</label>
                                <div class="col-lg-9">
                                    <div class="dropzone dropzone-multi" id="kt_dropzone_4">
                                        <div class="dropzone-panel mb-lg-0 mb-2">
                                        <label class="dropzone-select btn btn-light-primary font-weight-bold btn-sm required" for="docs_{{$proposal->id}}">Attach files</label>
                                            <input name="docs" type="file" id="docs_{{$proposal->id}}" hidden>
                                        </div>
                                        <div class="dropzone-items">
                                            <div class="dropzone-item" style="display:none">
                                                <div class="dropzone-file">
                                                    <div class="dropzone-filename" title="some_image_file_name.jpg">
                                                        <span data-dz-name="">some_image_file_name.jpg</span>
                                                        <strong>(
                                                        <span data-dz-size="">340kb</span>)</strong>
                                                    </div>
                                                    <div class="dropzone-error" data-dz-errormessage=""></div>
                                                </div>
                                                <div class="dropzone-progress">
                                                    <div class="progress">
                                                        <div class="progress-bar bg-primary" role="progressbar" aria-valuemin="0" aria-valuemax="100" aria-valuenow="0" data-dz-uploadprogress=""></div>
                                                    </div>
                                                </div>
                                                <div class="dropzone-toolbar">
                                                    <span class="dropzone-start">
                                                        <i class="flaticon2-arrow"></i>
                                                    </span>
                                                    <span class="dropzone-cancel" data-dz-remove="" style="display: none;">
                                                        <i class="flaticon2-cross"></i>
                                                    </span>
                                                    <span class="dropzone-delete" data-dz-remove="">
                                                        <i class="flaticon2-cross"></i>
                                                    </span>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <span class="form-text text-muted">File Must Be PDF And Max Size Is 5 MB</span>
                                    <p id="file_preview_{{$proposal->id}}"></p>
                                </div>
                            </div>
                        </div>
                        <div class="card-footer">
                            <div class="row">
                                <div class="col-lg-3"></div>
                                <div class="col-lg-9">
                                    {!! Form::hidden('_method', 'PUT') !!}
                                    <button type="submit" class="btn btn-light-primary mr-2">Update</button>
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

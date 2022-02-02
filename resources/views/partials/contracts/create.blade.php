


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
                            <h3 class="card-label">Contract Details</h3>
                        </div>
                    </div>
                    <!--begin::Form-->
                    {!! Form::open([ 'action'=> ['ContractController@store'], 'method'=>'POST', 'files' => true, 'enctype' => 'multipart/form-data', 'class' => '', 'id' => '' ]) !!}
                    @csrf    
                        <div class="card-body">
                            @yield('projects')
                            
                            <div class="form-group row">
                            <label class="col-lg-3 col-form-label text-lg-right">Grand Total:</label>
                                <div class="col-lg-4">
                                    
                                    {!! Form::text('grand_total', '', ['class' => 'form-control required'])!!}	
                                    <span class="form-text text-muted">Please Inter Grand Total</span>
                                </div>
                            </div>
                            
                            
                            <div class="form-group row">
                                <label class="col-lg-3 col-form-label text-lg-right">Upload Files:</label>
                                <div class="col-lg-9">
                                    <div class="dropzone dropzone-multi" id="kt_dropzone_4">
                                        <div class="dropzone-panel mb-lg-0 mb-2">
                                            <label class="dropzone-select btn btn-light-primary font-weight-bold btn-sm required" for="docs">Attach files</label>
                                            <input name="docs" type="file" id="docs" hidden> 
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
                                    <p id="file_preview"></p>
                                </div>
                                <script>
                                    const inputFile = document.getElementById('docs');
                                    const preview_image = document.getElementById('file_preview');
                
                                    inputFile.addEventListener('change', function(){
                                        const file = this.files[0];
                                        
                                        if(file){
                                            const reader = new FileReader();
                                            console.log(file);
                                            reader.addEventListener("load", function(){
                                                preview_image.innerHTML = file.name;
                                            })
                
                                            reader.readAsDataURL(file);
                                        }else{
                                            
                                        }
                                    })
                                </script>
                            </div>
                        </div>
                        <div class="card-footer">
                            <div class="row">
                                <div class="col-lg-3"></div>
                                <div class="col-lg-9">
                                    <button type="submit" class="btn btn-light-primary mr-2">Add</button>
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

  


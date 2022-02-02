
<!--begin::Card-->
<div class="card card-custom">
    <div class="card-header">
        <div class="card-title">
            <h3 class="card-label">Invoice Details</h3>
        </div>
    </div>
    <!--begin::Form-->
    {!! Form::open([ 'action'=> ['InvoiceController@store'], 'method'=>'POST', 'files' => true, 'enctype' => 'multipart/form-data', 'class' => '', 'id' => '' ]) !!}
    @csrf    
        <div class="card-body" class="invoice">
            <div class="row">
                <div class="col-lg-12">
                    @yield('customer')
                    <div class="form-group row">
                        <label class="col-form-label text-right col-lg-2 col-sm-12">Date</label>
                        <div class="col-lg-3 col-md-6 col-sm-12">
                            <div class="input-group date mb-2">
                                <input name="date" type="text" class="form-control required basic-datapicker" placeholder="Invoice Date" autocomplete="off" />
                                <div class="input-group-append">
                                    <span class="input-group-text">
                                        <i class="la la-check"></i>
                                    </span>
                                </div>
                            </div>
                        </div>
                        <label class="col-form-label text-right col-lg-2 col-sm-12">Due Date</label>
                        <div class="col-lg-3 col-md-6 col-sm-12">
                            <div class="input-group date mb-2">
                                <input name="due_date" type="text" class="form-control basic-datapicker" placeholder="Invoice Date" autocomplete="off" />
                                <div class="input-group-append">
                                    <span class="input-group-text">
                                        <i class="la la-check"></i>
                                    </span>
                                </div>
                            </div>
                        </div>
                    </div>
                   
                    <div class="form-group row">
                        <label class="col-lg-2 col-form-label text-lg-right">Invoice Description:</label>
                        <div class="col-lg-6">
                            {!! Form::textarea('des', '', ['class' => 'form-control', 'placeholder' => 'Invoice Description', 'rows' => '4'])!!}	
                            <span class="form-text text-muted">Please Enter Invoice Description</span>
                        </div>
                    </div>
                </div>
                <div class="col-lg-12">
                    <div id="kt_repeater_1">
                        <div class="form-group row mb-0">
                            <label class="col-lg-2 col-form-label text-right">Services:</label>
                            <div data-repeater-list="order" class="col-lg-7" >
                                <div data-repeater-item="" class="form-group row align-items-center">
                                    <div class="col-md-5">
                                        <label>Service Name:</label>
                                        <input type="text" name="service" class="form-control" placeholder="Service name" required/>
                                        <div class="d-md-none mb-2"></div>
                                    </div>
                                    <div class="col-md-2">
                                        <label>Qty:</label>
                                        <input type="number" name="qty" class="form-control" placeholder="Enter contact number" value="1" required/>
                                        <div class="d-md-none mb-2"></div>
                                    </div>
                                    <div class="col-md-2">
                                        <label>Unit Price:</label>
                                        <input type="number" name="price" class="form-control" placeholder="Unit Price" required/>
                                        <div class="d-md-none mb-2"></div>
                                    </div>
                                    <div class="col-md-3">
                                        <a href="javascript:;" data-repeater-delete="" class="btn btn-sm font-weight-bolder btn-light-danger mt-8">
                                        <i class="la la-trash-o"></i>Delete</a>
                                    </div>
                                    <div class="col-lg-4 only-mobile my-3">
                                        <a href="javascript:;" data-repeater-create="" class="btn btn-sm font-weight-bolder btn-light-primary">
                                        <i class="la la-plus"></i>Add</a>
                                    </div>
                                    
                                </div>
                            </div>
                           
                            <div class="col-lg-3">
                                <div class="form-group row live-calc">
                                    <label class="col-lg-6 col-form-label text-lg-right" >Sub Total:</label>
                                    <div class="col-lg-6">
                                        <input name="sub_total" id="sub_input" value="" hidden="hidden"/>
                                        <span class="form-text  mt-4" id="sub" style="font-weight: 800;">Sub Total</span>
                                    </div>
                                    @if (!empty(Helper::getVat()))
                                        <label class="col-lg-6  col-form-label text-lg-right" >VAT(<b id="vat">{{Helper::getVat()}}</b>):</label>
                                    @else
                                        <label class="col-lg-6  col-form-label text-lg-right" >VAT:<b id="vat"></b>(0)%</label>
                                    @endif
                                    
                                    <div class="col-lg-6">
                                        @if (!empty(Helper::getVat()))
                                            <input name="vat"  value="{{Helper::getVat()}}" hidden="hidden"/>
                                            <span class="form-text  mt-4" id="vat_ammount"  style="font-weight: 800;"></span>
                                            <input name="vat_amount" value="" hidden="hidden" id="vat_amount_input"/>
                                        @else
                                            <input name="vat" value="0" hidden="hidden"/>
                                            <input name="vat_amount" value="" hidden="hidden" id="vat_amount_input"/>
                                            <span class="form-text  mt-4" id="vat_ammount" style="font-weight: 800;">You can Change VAT From Settings</span>
                                            
                                        @endif
                                    </div>
                                    <label class="col-lg-6  col-form-label text-lg-right" >Discount:</label>
                                    <div class="col-lg-6">
                                        <span class="form-text  mt-4"  style="font-weight: 800;"></span>
                                        <span class="form-text  mt-4" id="discount" style="font-weight: 800;">0%</span>
                                        <input name="discount_amount" value="" hidden="hidden" id="discount_amount_input"/>
                                        
                                        
                                      
                                    </div>
                                    <label class="col-lg-6 col-form-label text-lg-right">Grand Total:</label>
                                    <div class="col-lg-6">
                                        <input name="grand_total" id="grand_input" value="" hidden="hidden"/>
                                        <span class="form-text mt-4" id="grand" style="font-weight: 800;">Grand Total</span>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-4 offset-sm-2 only-screen mb-5">
                                <a href="javascript:;" data-repeater-create="" class="btn btn-sm font-weight-bolder btn-light-primary">
                                    <i class="la la-plus"></i>Add</a>
                            </div>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-lg-2 col-form-label text-lg-right">Upload Files:</label>
                        <div class="col-lg-9">
                            <div class="dropzone dropzone-multi" id="kt_dropzone_4">
                                <div class="dropzone-panel mb-lg-0 mb-2">
                                    <label class="dropzone-select btn btn-light-success font-weight-bold btn-sm" for="docs">Attach files</label>
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
                            const invoice_inputFile = document.getElementById('docs');
                            const invoice_preview_image = document.getElementById('file_preview');
        
                            invoice_inputFile.addEventListener('change', function(){
                                const file = this.files[0];
                                
                                if(file){
                                    const reader = new FileReader();
                                    console.log(file);
                                    reader.addEventListener("load", function(){
                                        invoice_preview_image.innerHTML = file.name;
                                    })
        
                                    reader.readAsDataURL(file);
                                }else{
                                    
                                }
                            })
                        </script>
                    </div>
                    <div class="form-group row">
                        <label class="col-xl-2 col-lg-3 col-form-label text-right">Discount</label>
                        <div class="col-lg-4 col-xl-4 col-sm-12">
                            <div class="input-group input-group-lg" >
                                {!! Form::number('discount', '' ,  ['id' => 'discount_emmiter', 'class' => 'form-control', 'step' => '0.000001', 'maxlength' => '2', 'oninput' => 'javascript: if (this.value.length > this.maxLength) this.value = this.value.slice(0, this.maxLength);'])!!}	
                                <div class="input-group-append">
                                    <span class="input-group-text">%</span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            
        </div>
        <div class="card-footer">
            <div class="row">
                <div class="col-lg-3"></div>
                <div class="col-lg-9 text-right">
                    <button type="submit" class="btn btn-light-primary mr-2">Add</button>
                </div>
            </div>
        </div>
    </form>
    <!--end::Form-->
</div>
<!--end::Card-->
                   
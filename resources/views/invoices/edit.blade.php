


@extends('layouts.app')
@section('title', $invoice->name)
@section('content')
<!--begin::Subheader-->
<div class="subheader min-h-lg-175px pt-5 pb-7 subheader-transparent" id="kt_subheader">
    <div class="container d-flex align-items-center justify-content-between flex-wrap flex-sm-nowrap">
        <!--begin::Details-->
        <div class="d-flex align-items-center flex-wrap mr-2">
            <!--begin::Heading-->
            <div class="d-flex flex-column">
                <!--begin::Title-->
                <h2 class="text-white font-weight-bold my-2 mr-5">{{$invoice->name}}</h2>
                <!--end::Title-->
                <!--begin::Breadcrumb-->
                <div class="d-flex align-items-center font-weight-bold my-2">
                    <!--begin::Item-->
                    <a href="{{url('/')}}" class="opacity-75 hover-opacity-100">
                        <i class="flaticon2-shelter text-white icon-1x"></i>
                    </a>
                    <!--end::Item-->
                    <!--begin::Item-->
                    <span class="label label-dot label-sm bg-white opacity-75 mx-3"></span>
                    <a href="{{url('/')}}" class="text-white text-hover-white opacity-75 hover-opacity-100">Dashboard</a>
                    <!--end::Item-->
                    <!--begin::Item-->
                    <span class="label label-dot label-sm bg-white opacity-75 mx-3"></span>
                    <a href="{{url('/invoices')}}" class="text-white text-hover-white opacity-75 hover-opacity-100">Invoices</a>
                    <!--end::Item-->
                    
                </div>
                <!--end::Breadcrumb-->
            </div>
            <!--end::Heading-->
        </div>
        <!--end::Details-->
    </div>
</div>
<!--end::Subheader-->
<!--begin::Entry-->
<div class="d-flex flex-column-fluid">
    <!--begin::Container-->
    <div class="container">
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
                                    <h3 class="card-label">Invoice Details</h3>
                                </div>
                            </div>
                            <!--begin::Form-->
                            {!! Form::open([ 'action'=> ['InvoiceController@update', $invoice->id], 'method'=>'POST', 'files' => true, 'enctype' => 'multipart/form-data', 'class' => '', 'id' => '' ]) !!}
                            @csrf    
                                <div class="card-body" class="invoice">
                                    <div class="row">
                                        <div class="col-lg-12">
                                            <div class="form-group row">
                                                <label class="col-lg-2 col-form-label text-lg-right">Invoice Name:</label>
                                                <div class="col-lg-3">
                                                    {!! Form::text('name', $invoice->name, ['class' => 'form-control', 'placeholder' => 'Invoice Name'])!!}	
                                                    <span class="form-text text-muted">Please Enter Invoice name</span>
                                                </div>
                                                <label class="col-lg-2 col-form-label text-lg-right">Customer Name:</label>
                                                <div class="col-lg-3">
                                                    {!! Form::select('user_id', Helper::customers()->pluck('name', 'id'), $invoice->user_id, ['class' => 'form-control selectpicker','data-live-search' => 'true'])!!}	
                                                    <span class="form-text text-muted">Please Choose Customer</span>
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <label class="col-form-label text-right col-lg-2 col-sm-12">Date</label>
                                                <div class="col-lg-3 col-md-6 col-sm-12">
                                                    <div class="input-group date mb-2">
                                                    <input name="date" type="text" class="form-control basic-datapicker" placeholder="Invoice Date" autocomplete="off" value="{{$invoice->date}}"/>
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
                                                        <input name="date" type="text" class="form-control basic-datapicker" placeholder="Invoice Date" autocomplete="off" value="{{$invoice->due_date}}"/>
                                                        <div class="input-group-append">
                                                            <span class="input-group-text">
                                                                <i class="la la-check"></i>
                                                            </span>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            
                                            
                                        </div>
                                        <div class="col-lg-12">
                                            <div id="kt_repeater_1">
												<div class="form-group row mb-0 mt-10">
                                                    <label class="col-lg-2 col-form-label text-right">Services:</label>
                                                        <div class="col-lg-7" data-repeater-list="plus" >
                                                            @if (!empty($invoice->service_1))
                                                                <div class="form-group row align-items-center">
                                                                    <div class="col-md-5">
                                                                        <label>Service Name:</label>
                                                                    <input type="text" name="order[0][service]" class="form-control" placeholder="Service name" value="{{$invoice->service_1}}"/>
                                                                        <div class="d-md-none mb-2"></div>
                                                                    </div>
                                                                    <div class="col-md-2">
                                                                        <label>Qty:</label>
                                                                        <input type="number" name="order[0][qty]" class="form-control" placeholder="Enter contact number" value="{{$invoice->qty_1}}"/>
                                                                        <div class="d-md-none mb-2"></div>
                                                                    </div>
                                                                    <div class="col-md-2">
                                                                        <label>Unit Price:</label>
                                                                        <input type="number" name="order[0][price]" class="form-control" placeholder="Unit Price" value="{{$invoice->service_1_price}}"/>
                                                                        <div class="d-md-none mb-2"></div>
                                                                    </div>
                                                                    <div class="col-md-3">
                                                                        <a href="javascript:;" data-repeater-delete="" class="btn btn-sm font-weight-bolder btn-light-danger mt-8">
                                                                        <i class="la la-trash-o"></i>Delete</a>
                                                                    </div>
                                                                </div>
                                                            @endif
                                                            @if (!empty($invoice->service_2))
                                                                <div class="form-group row align-items-center">
                                                                    <div class="col-md-5">
                                                                        <label>Service Name:</label>
                                                                    <input type="text" name="order[1][service]" class="form-control" placeholder="Service name" value="{{$invoice->service_2}}"/>
                                                                        <div class="d-md-none mb-2"></div>
                                                                    </div>
                                                                    <div class="col-md-2">
                                                                        <label>Qty:</label>
                                                                        <input type="number" name="order[1][qty]" class="form-control" placeholder="Enter contact number" value="{{$invoice->qty_2}}"/>
                                                                        <div class="d-md-none mb-2"></div>
                                                                    </div>
                                                                    <div class="col-md-2">
                                                                        <label>Unit Price:</label>
                                                                        <input type="number" name="order[1][price]" class="form-control" placeholder="Unit Price" value="{{$invoice->service_2_price}}"/>
                                                                        <div class="d-md-none mb-2"></div>
                                                                    </div>
                                                                    <div class="col-md-3">
                                                                        <a href="javascript:;" data-repeater-delete="" class="btn btn-sm font-weight-bolder btn-light-danger mt-8">
                                                                        <i class="la la-trash-o"></i>Delete</a>
                                                                    </div>
                                                                </div>
                                                            @endif
                                                            @if (!empty($invoice->service_3))
                                                                <div class="form-group row align-items-center">
                                                                    <div class="col-md-5">
                                                                        <label>Service Name:</label>
                                                                    <input type="text" name="order[2][service]" class="form-control" placeholder="Service name" value="{{$invoice->service_3}}"/>
                                                                        <div class="d-md-none mb-2"></div>
                                                                    </div>
                                                                    <div class="col-md-2">
                                                                        <label>Qty:</label>
                                                                        <input type="number" name="order[2][qty]" class="form-control" placeholder="Enter contact number" value="{{$invoice->qty_3}}"/>
                                                                        <div class="d-md-none mb-2"></div>
                                                                    </div>
                                                                    <div class="col-md-2">
                                                                        <label>Unit Price:</label>
                                                                        <input type="number" name="order[2][price]" class="form-control" placeholder="Unit Price" value="{{$invoice->service_3_price}}"/>
                                                                        <div class="d-md-none mb-2"></div>
                                                                    </div>
                                                                    <div class="col-md-3">
                                                                        <a href="javascript:;" data-repeater-delete="" class="btn btn-sm font-weight-bolder btn-light-danger mt-8">
                                                                        <i class="la la-trash-o"></i>Delete</a>
                                                                    </div>
                                                                </div>
                                                            @endif
                                                            @if (!empty($invoice->service_4))
                                                                <div class="form-group row align-items-center">
                                                                    <div class="col-md-5">
                                                                        <label>Service Name:</label>
                                                                    <input type="text" name="order[0][service]" class="form-control" placeholder="Service name" value="{{$invoice->service_4}}"/>
                                                                        <div class="d-md-none mb-2"></div>
                                                                    </div>
                                                                    <div class="col-md-2">
                                                                        <label>Qty:</label>
                                                                        <input type="number" name="order[0][qty]" class="form-control" placeholder="Enter contact number" value="{{$invoice->qty_4}}"/>
                                                                        <div class="d-md-none mb-2"></div>
                                                                    </div>
                                                                    <div class="col-md-2">
                                                                        <label>Unit Price:</label>
                                                                        <input type="number" name="order[0][price]" class="form-control" placeholder="Unit Price" value="{{$invoice->service_4_price}}"/>
                                                                        <div class="d-md-none mb-2"></div>
                                                                    </div>
                                                                    <div class="col-md-3">
                                                                        <a href="javascript:;" data-repeater-delete="" class="btn btn-sm font-weight-bolder btn-light-danger mt-8">
                                                                        <i class="la la-trash-o"></i>Delete</a>
                                                                    </div>
                                                                </div>
                                                            @endif
                                                            @if (!empty($invoice->service_5))
                                                                <div class="form-group row align-items-center">
                                                                    <div class="col-md-5">
                                                                        <label>Service Name:</label>
                                                                    <input type="text" name="order[4][service]" class="form-control" placeholder="Service name" value="{{$invoice->service_5}}"/>
                                                                        <div class="d-md-none mb-2"></div>
                                                                    </div>
                                                                    <div class="col-md-2">
                                                                        <label>Qty:</label>
                                                                        <input type="number" name="order[4][qty]" class="form-control" placeholder="Enter contact number" value="{{$invoice->qty_5}}"/>
                                                                        <div class="d-md-none mb-2"></div>
                                                                    </div>
                                                                    <div class="col-md-2">
                                                                        <label>Unit Price:</label>
                                                                        <input type="number" name="order[4][price]" class="form-control" placeholder="Unit Price" value="{{$invoice->service_5_price}}"/>
                                                                        <div class="d-md-none mb-2"></div>
                                                                    </div>
                                                                    <div class="col-md-3">
                                                                        <a href="javascript:;" data-repeater-delete="" class="btn btn-sm font-weight-bolder btn-light-danger mt-8">
                                                                        <i class="la la-trash-o"></i>Delete</a>
                                                                    </div>
                                                                </div>
                                                            @endif
                                                            <div data-repeater-item="" class="form-group row align-items-center">
                                                                <div class="col-md-5">
                                                                    <label>Service Name:</label>
                                                                    <input type="text" name="service" class="form-control" placeholder="Service name" />
                                                                    <div class="d-md-none mb-2"></div>
                                                                </div>
                                                                <div class="col-md-2">
                                                                    <label>Qty:</label>
                                                                    <input type="number" name="qty" class="form-control" placeholder="Enter contact number" value="1"/>
                                                                    <div class="d-md-none mb-2"></div>
                                                                </div>
                                                                <div class="col-md-2">
                                                                    <label>Unit Price:</label>
                                                                    <input type="number" name="price" class="form-control" placeholder="Unit Price" />
                                                                    <div class="d-md-none mb-2"></div>
                                                                </div>
                                                                <div class="col-md-3">
                                                                    <a href="javascript:;" data-repeater-delete="" class="btn btn-sm font-weight-bolder btn-light-danger mt-8">
                                                                    <i class="la la-trash-o"></i>Delete</a>
                                                                </div>
                                                            </div>
                                                    </div>
                                                    <div class="col-lg-3">
                                                        <div class="form-group row" style="position: absolute;bottom: 0;">
                                                            <label class="col-lg-6 col-form-label text-lg-right" >Sub Total:</label>
                                                            <div class="col-lg-6">
                                                                <input name="sub_total" id="sub_input" value="" hidden="hidden"/>
                                                                <span class="form-text  mt-4" id="sub" style="font-weight: 800;">{{$invoice->sub_total}}</span>
                                                            </div>
                                                            <label class="col-lg-6  col-form-label text-lg-right" >VAT:</label>
                                                            <div class="col-lg-6">
                                                                @if (!empty($vat))
                                                                    <input name="vat"  id="vat" value="{{$vat}}" hidden="hidden"/>
                                                                    <span class="form-text  mt-4"  style="font-weight: 800;">{{$vat}}</span>
                                                                @else
                                                                    <input name="vat"  id="vat" value="0" hidden="hidden"/>
                                                                    <span class="form-text  mt-4"  style="font-weight: 800;">You can Change VAT From Settings</span>
                                                                @endif
                                                            </div>
                                                            <label class="col-lg-6 col-form-label text-lg-right">Grand Total:</label>
                                                            <div class="col-lg-6">
                                                                <input name="grand_total" id="grand_input" value="" hidden="hidden"/>
                                                                <span class="form-text mt-4" id="grand" style="font-weight: 800;">{{$invoice->grand_total}}</span>
                                                            </div>
                                                        </div>
                                                    </div>
												</div>
												<div class="form-group row">
													<label class="col-lg-2 col-form-label text-right"></label>
													<div class="col-lg-4">
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
                                    </div>
                                   
                                </div>
                                <div class="card-footer">
                                    <div class="row">
                                        <div class="col-lg-3"></div>
                                        <div class="col-lg-9">
                                            <button type="submit" class="btn btn-light-primary mr-2">Update</button>
                                            <a href="{{url('invoices')}}" class="btn btn-primary">Cancel</a>
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
    </div>
</div>
@endsection
@section('scripts')
    <script src="{{asset('assets/js/pages/crud/forms/widgets/bootstrap-datepicker.js')}}"></script>
    <script src="{{asset('assets/js/add/add-invoice.js')}}"></script>
    <script>
        $(document).ready(function(){

            window.setInterval(function(){
                var qty1 = $('input[name="order[0][qty]"]');
                var price1 = $('input[name="order[0][price]"]');
                var total_all= qty1.val() * price1.val();

                var qty2 = $('input[name="order[1][qty]"]');
                var price2 = $('input[name="order[1][price]"]');

                var qty3 = $('input[name="order[2][qty]"]');
                var price3 = $('input[name="order[2][price]"]');

                var qty4 = $('input[name="order[3][qty]"]');
                var price4 = $('input[name="order[3][price]"]');

                var qty5 = $('input[name="order[4][qty]"]');
                var price5 = $('input[name="order[4][price]"]');
                
                if (qty2.length && price2.length) {
                    var total_2 = qty2.val() * price2.val();
                    var total_all = total_all + total_2 ;
                }

                if (qty3.length && price3.length) {
                    var total_3 = qty3.val() * price3.val();
                    var total_all = total_all + total_3 ;
                }

                if (qty4.length && price4.length) {
                    var total_4= qty4.val() * price4.val();
                    var total_all = total_all + total_4 ;
                }

                if (qty5.length && price5.length) {
                    var total_5 = qty5.val() * price5.val();
                    var total_all = total_all + total_5 ;
                }
                var sub_total = total_all;
                var grand_total= total_all + ($('#vat').val()/100 * total_all );
                $('#sub').text(sub_total);
                $('#sub_input').attr('value', sub_total);
                
                $('#grand').text(grand_total);
                $('#grand_input').attr('value', grand_total);
            }, 1000);
            
        });
       
    </script>
@endsection
  



<!-- begin::Card-->
<div class="card card-custom overflow-hidden" id= "invoice_show_{{$invoice->id}}">
    <div class="card-body p-0" id= "invoice_html">
        <!-- begin: Invoice-->
        <!-- begin: Invoice header-->
    <div class="row justify-content-center bgi-size-cover bgi-no-repeat py-8 px-8 py-md-27 px-md-0" style="background-image: url({{asset('assets/media/bg/bg-6.jpg')}});">
            <div class="col-md-9">
                <div class="d-flex justify-content-between pb-10 pb-md-20 flex-column flex-md-row">
                    <h1 class="display-4 text-white font-weight-boldest mb-10">INVOICE
                        <div class="d-flex flex-column mb-10 mb-md-0">
                            <div class="d-flex justify-content-between mb-2 mt-10">
                                <span class="text-left font-size-sm font-weight-lighter">{{$invoice->user->name}}</span>
                            </div>
                            <div class="d-flex justify-content-between mb-2">
                                <span class="text-left font-size-sm font-weight-lighter">{{$invoice->user->email}}</span>
                            </div>
                            <div class="d-flex justify-content-between">
                                <span class="text-left font-size-sm font-weight-lighter">{{$invoice->user->phone}}</span>
                            </div>
                        </div>
                    </h1>

                    <div class="d-flex flex-column align-items-md-end px-0">
                        <!--begin::Logo-->
                        <a href="#" class="mb-5">
                            <img src="{{asset('assets/media/logos/logo.png')}}" alt="" />
                        </a>
                        <!--end::Logo-->

                        <span class="text-white opacity-70 d-block w-75 text-right">
                            King AbdulAziz Road, Alyasmin, Riyadh
                        </span>
                    </div>
                </div>
                <div class="border-bottom w-100 opacity-20"></div>
                <div class="d-flex justify-content-between text-white pt-6">
                    <div class="d-flex flex-column flex-root">
                        <span class="font-weight-bolde mb-2r">DATA</span>
                        <span class="opacity-70">{{$invoice->date}}</span>
                        <span class="font-weight-bolde mb-2r">Due DATA</span>
                        <span class="opacity-70">{{$invoice->due_date}}</span>
                    </div>
                    <div class="d-flex flex-column flex-root">
                        <span class="font-weight-bolder mb-2">INVOICE NO.</span>
                        <span class="opacity-70">{{$invoice->invoice_no}}</span>
                    </div>
                    <div class="d-flex flex-column flex-root">
                        <span class="font-weight-bolder mb-2">INVOICE Desc.</span>
                        <span class="opacity-70">{{$invoice->des}}</span>
                    </div>
                </div>
            </div>
        </div>
        <!-- end: Invoice header-->
        <!-- begin: Invoice body-->
        <div class="row justify-content-center py-8 px-8 py-md-10 px-md-0 w-100">
            <div class="col-md-9">
                <div class="table-responsive">
                    <table class="table">
                        <thead>
                            <tr>
                                <th class="pl-0 font-weight-bold text-muted text-uppercase">Service</th>
                                <th class="text-right font-weight-bold text-muted text-uppercase">Price</th>
                                <th class="text-right font-weight-bold text-muted text-uppercase">Qty</th>
                                <th class="text-right pr-0 font-weight-bold text-muted text-uppercase">Amount</th>
                            </tr>
                        </thead>
                        <tbody>
                            @if (!empty($invoice->service_1))
                                <tr class="font-weight-boldest font-size-lg">
                                    <td class="pl-0 pt-7">{{$invoice->service_1}}</td>
                                    <td class="text-right pt-7">{{$invoice->service_1_price}} SAR</td>
                                    <td class="text-right pt-7">{{$invoice->qty_1}}</td>
                                    <td class="text-danger pr-0 pt-7 text-right">{{$invoice->qty_1 * $invoice->service_1_price}} SAR</td>
                                </tr>
                            @endif

                            @if (!empty($invoice->service_2))
                                <tr class="font-weight-boldest font-size-lg">
                                    <td class="border-top-0 pl-0 py-4">{{$invoice->service_2}}</td>
                                    <td class="border-top-0 text-right py-4">{{$invoice->service_2_price}} SAR</td>
                                    <td class="border-top-0 text-right py-4">{{$invoice->qty_2}}</td>
                                    <td class="text-danger border-top-0 pr-0 pt-7 text-right">{{$invoice->qty_2 * $invoice->service_2_price}} SAR</td>
                                </tr>
                            @endif

                            @if (!empty($invoice->service_3))
                                <tr class="font-weight-boldest font-size-lg">
                                    <td class="border-top-0 pl-0 py-4">{{$invoice->service_3}}</td>
                                    <td class="border-top-0 text-right py-4">{{$invoice->service_3_price}} SAR</td>
                                    <td class="border-top-0 text-right py-4">{{$invoice->qty_3}}</td>
                                    <td class="text-danger border-top-0 pr-0 pt-7 text-right">{{$invoice->qty_3 * $invoice->service_3_price}} SAR</td>
                                </tr>
                            @endif

                            @if (!empty($invoice->service_4))
                                <tr class="font-weight-boldest font-size-lg">
                                    <td class="border-top-0 pl-0 py-4">{{$invoice->service_4}}</td>
                                    <td class="border-top-0 text-right py-4">{{$invoice->qty_4}}</td>
                                    <td class="border-top-0 text-right py-4">{{$invoice->service_4_price}} SAR</td>
                                    <td class="text-danger border-top-0 pr-0 pt-7 text-right">{{$invoice->qty_4 * $invoice->service_4_price}} SAR</td>
                                </tr>
                            @endif

                            @if (!empty($invoice->service_5))
                                <tr class="font-weight-boldest font-size-lg">
                                    <td class="border-top-0 pl-0 py-3">{{$invoice->service_5}}</td>
                                    <td class="border-top-0 text-right py-3">{{$invoice->service_5_price}} SAR</td>
                                    <td class="border-top-0 text-right py-3">{{$invoice->qty_5}}</td>
                                    <td class="text-danger border-top-0 pr-0 pt-7 text-right">{{$invoice->qty_5 * $invoice->service_5_price}} SAR</td>
                                </tr>
                            @endif
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
        <!-- end: Invoice body-->
        <!-- begin: Invoice footer-->
        <div class="row justify-content-center bg-gray-100 py-8 px-8 py-md-10 px-md-0">
            <div class="col-md-9">
                <div class="d-flex justify-content-between flex-column flex-md-row font-size-lg">
                    <div class="d-flex flex-column mb-10 mb-md-0">
                        <div class="font-weight-bolder font-size-lg mb-3">Bank details</div>
                        <div class="d-flex justify-content-between mb-3">
                            <span class="mr-15 font-weight-bold">Bank Name:</span>
                            <span class="text-right">{{$invoice->user->bank_name}}</span>
                        </div>
                        <div class="d-flex justify-content-between mb-3">
                            <span class="mr-15 font-weight-bold">Account Name:</span>
                            <span class="text-right">{{$invoice->user->bank_account_name}}</span>
                        </div>
                        <div class="d-flex justify-content-between mb-3">
                            <span class="mr-15 font-weight-bold">Account Number:</span>
                            <span class="text-right">{{$invoice->user->bank_account_no}}</span>
                        </div>
                        <div class="d-flex justify-content-between">
                            <span class="mr-15 font-weight-bold">Iban:</span>
                            <span class="text-right">{{$invoice->user->iban}}</span>
                        </div>
                    </div>
                    <div class="d-flex flex-column text-md-right">
                        <span class="font-size-lg font-weight-bolder mb-1">Sub Total</span>
                        <span class="font-size-h2 font-weight-boldest text-danger mb-1">{{$invoice->sub_total}} SAR</span>
                        <span class="font-size-sm font-weight-boldest mb-1"><b class="text-info font-weight-boldest font-size-md">%{{$invoice->vat}}</b> VAT</span>
                        <span class="font-size-md font-weight-bolder mb-1">Vat Amount</span>
                        <span class="font-size-h4 font-weight-boldest text-danger mb-1">{{$invoice->vat_amount}} SAR</span>
                        @if ($invoice->discount)
                            <span class="font-size-md font-weight-bolder mb-1">Discount</span>
                            <span class="font-size-h4 font-weight-boldest text-success mb-1">{{$invoice->discount_amount}} SAR</span>
                        @endif
                        <span class="font-size-lg font-weight-bolder mb-1">Grand Total</span>
                        <span class="font-size-h2 font-weight-boldest text-danger mb-1">{{$invoice->grand_total}} SAR</span>
                        
                    </div>
                </div>
            </div>
        </div>
        <!-- end: Invoice footer-->
        
        <!-- end: Invoice-->
    </div>
    <!-- begin: Invoice action-->
    <div class="row justify-content-center py-8 px-8 py-md-10 px-md-0">
        <div class="col-md-9">
            <div class="d-flex justify-content-between">
                @if (auth()->user()->isAdmin())
                    <button type="button" class="btn btn-light-primary font-weight-bold" id="download">Download Invoice</button>
                    <span class="switch">
                        {!! Form::open([ 'action'=> ['InvoiceController@update', $invoice->id ], 'method'=>'POST', 'files' => true, 'enctype' => 'multipart/form-data', 'class' => '', 'id' => 'update_status_form_{{$invoice->id}}' ]) !!}
                            <b class="mx-1 text-success pt-2" style="padding-top: 6px!important;display: inline-block;">Paid</b>
                            @if ($invoice->status == 0)
                                <label class="checkbox-checked"> 
                                <input type="text" name="status" id="status_{{$invoice->id}}" value="0" class="change-invoice-status" data-target="{{$invoice->id}}">
                            @else
                                <label> 
                                <input type="text" name="status" id="status_{{$invoice->id}}" value="1" class="change-invoice-status" data-target="{{$invoice->id}}">
                            @endif
                            <b class="mx-1 text-danger pt-2" style="padding-top: 6px!important;display: inline-block;">Not Paid</b>
                            <span></span>
                            </label>
                            {!! Form::hidden('_method', 'PUT') !!}
                            <input hidden="hidden" name="update_status">
                            <button type="submit" class="btn btn-light-primary mr-2 d-none">Update</button>
                        </form>
                    </span>
                   
                        
                @else
                    {{--  <a href ="{{url('payment/checkout/'. $invoice->grand_total)}}" type="button" class="btn btn-light-success font-weight-bold" id="pay_invoice">Pay</a>  --}}
                @endif
                
                {{--<button type="button" class="btn btn-primary font-weight-bold" onclick="window.print();">Download Docs</button>--}}
            </div>
        </div>
    </div>
    <!-- end: Invoice action-->
</div>
<!-- end::Card-->


   
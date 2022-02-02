
<!--begin::Row-->
<div class="row">
    <div class="col-lg-12 col-xxl-12">
        <!--begin::Advance Table Widget 1-->
        <div class="card card-custom card-stretch gutter-b">
            <!--begin::Header-->
            <div class="card-header border-0 py-5">
                <h3 class="card-title align-items-start flex-column">
                    <span class="card-label font-weight-bolder text-dark">Invoices</span>
                    <span class="text-muted mt-3 font-weight-bold font-size-sm">ALl Your Invoices Details</span>
                </h3>
                @if (auth()->user()->role->name == "admin")
                    <div class="card-toolbar">
                        <a  data-toggle="modal" data-target="#new-invoice" class="btn btn-success font-weight-bolder font-size-sm">
                            <span class="svg-icon svg-icon-white svg-icon-2x"><!--begin::Svg Icon | path:C:\wamp64\www\keenthemes\themes\metronic\theme\html\demo2\dist/../src/media/svg/icons\Text\Align-left.svg--><svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
                                <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                    <rect x="0" y="0" width="24" height="24"/>
                                    <rect fill="#000000" opacity="0.3" x="4" y="5" width="16" height="2" rx="1"/>
                                    <rect fill="#000000" opacity="0.3" x="4" y="13" width="16" height="2" rx="1"/>
                                    <path d="M5,9 L13,9 C13.5522847,9 14,9.44771525 14,10 C14,10.5522847 13.5522847,11 13,11 L5,11 C4.44771525,11 4,10.5522847 4,10 C4,9.44771525 4.44771525,9 5,9 Z M5,17 L13,17 C13.5522847,17 14,17.4477153 14,18 C14,18.5522847 13.5522847,19 13,19 L5,19 C4.44771525,19 4,18.5522847 4,18 C4,17.4477153 4.44771525,17 5,17 Z" fill="#000000"/>
                                </g>
                            </svg><!--end::Svg Icon--></span>
                                <!--end::Svg Icon-->
                        Add New Invoice</a>
                    </div>
                @endif
            </div>
            <!--end::Header-->
            <!--begin::Body-->
            <div class="card-body py-0">
                <!--begin::Table-->
                <div class="table-responsive">
                    <table class="table">
                        <thead>
                            <tr>
                                <th scope="col">ID</th>
                                <th scope="col">Invoice No</th>
                                <th scope="col">Date</th>
                                <th scope="col">Total</th>
                                @if (auth()->user()->role->name == "customer")
                                    <th scope="col">Status</th>
                                @endif
                                <th scope="col">File</th>
                                <th scope="col">Status</th>
                                @if (auth()->user()->role->name == "admin" || auth()->user()->role->name == "customer")
                                    <th scope="col">Settings</th>
                                @endif
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($customer->invoices as $invoice)
                                <tr>
                                    <th scope="row">
                                        <a class="text-dark-75 mt-3 d-block" href="{{url('invoices/'. $invoice->id)}}">
                                            {{$invoice->id}}
                                        </a>
                                    </th>
                                    <td scope="row">
                                        <a class="text-dark-75 mt-3 d-block" href="{{url('invoices/'. $invoice->id)}}">
                                            {{$invoice->invoice_no}}
                                        </a>
                                    </td>
                                    <td class="pt-5">{{$invoice->date}}</td>
                                    <td class="pt-5 font-weight-boldest">{{$invoice->grand_total}} SAR</td>
                                    @if (auth()->user()->role->name == "customer")
                                        <td class="pt-5">
                                            @if ($invoice->status == 0)
                                                <span class="label label-inline label-light-danger font-weight-bold">
                                                    Waitinig
                                                </span>
                                            @elseif ($invoice->status == 1)
                                                <span class="label label-inline label-light-success font-weight-bold">
                                                    Paid
                                                </span>
                                            @endif
                                        </td>
                                    @endif
                                    <td class="pt-5">
                                        @if (Helper::fileExists($invoice->docs, 'uploads/docs/invoices'))
                                            <span class="svg-icon svg-icon-primary svg-icon-2x pointer"  data-toggle="modal" data-target="#docs-{{$invoice->id}}" title="Show invoice File"><!--begin::Svg Icon | path:C:\wamp64\www\keenthemes\themes\metronic\theme\html\demo2\dist/../src/media/svg/icons\Files\File.svg--><svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
                                                <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                                    <polygon points="0 0 24 0 24 24 0 24"/>
                                                    <path d="M5.85714286,2 L13.7364114,2 C14.0910962,2 14.4343066,2.12568431 14.7051108,2.35473959 L19.4686994,6.3839416 C19.8056532,6.66894833 20,7.08787823 20,7.52920201 L20,20.0833333 C20,21.8738751 19.9795521,22 18.1428571,22 L5.85714286,22 C4.02044787,22 4,21.8738751 4,20.0833333 L4,3.91666667 C4,2.12612489 4.02044787,2 5.85714286,2 Z" fill="#000000" fill-rule="nonzero" opacity="0.3"/>
                                                    <rect fill="#000000" x="6" y="11" width="9" height="2" rx="1"/>
                                                    <rect fill="#000000" x="6" y="15" width="5" height="2" rx="1"/>
                                                </g>
                                            </svg><!--end::Svg Icon--></span>
                                        @endif
                                    </td>
                                    <td class="pt-5">
                                        @if ($invoice->status == 0)
                                            <span class="label label-inline label-light-danger font-weight-bold">
                                                Not Paid
                                            </span>
                                        @elseif ($invoice->status == 1)
                                            <span class="label label-inline label-light-success font-weight-bold">
                                                Paid
                                            </span>
                                        @endif
                                    </td>
                                    @if (auth()->user()->role->name == "admin" || auth()->user()->role->name == "customer")
                                    <td>
                                        <a class="btn btn-sm btn-clean btn-icon" title="Show"  data-toggle="modal" data-target="#show-invoice-{{$invoice->id}}">
                                            <span class="svg-icon svg-icon-primary svg-icon-2x"><!--begin::Svg Icon | path:C:\wamp64\www\keenthemes\themes\metronic\theme\html\demo2\dist/../src/media/svg/icons\Devices\Display1.svg--><svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
                                                <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                                    <rect x="0" y="0" width="24" height="24"/>
                                                    <path d="M11,20 L11,17 C11,16.4477153 11.4477153,16 12,16 C12.5522847,16 13,16.4477153 13,17 L13,20 L15.5,20 C15.7761424,20 16,20.2238576 16,20.5 C16,20.7761424 15.7761424,21 15.5,21 L8.5,21 C8.22385763,21 8,20.7761424 8,20.5 C8,20.2238576 8.22385763,20 8.5,20 L11,20 Z" fill="#000000" opacity="0.3"/>
                                                    <path d="M3,5 L21,5 C21.5522847,5 22,5.44771525 22,6 L22,16 C22,16.5522847 21.5522847,17 21,17 L3,17 C2.44771525,17 2,16.5522847 2,16 L2,6 C2,5.44771525 2.44771525,5 3,5 Z M4.5,8 C4.22385763,8 4,8.22385763 4,8.5 C4,8.77614237 4.22385763,9 4.5,9 L13.5,9 C13.7761424,9 14,8.77614237 14,8.5 C14,8.22385763 13.7761424,8 13.5,8 L4.5,8 Z M4.5,10 C4.22385763,10 4,10.2238576 4,10.5 C4,10.7761424 4.22385763,11 4.5,11 L7.5,11 C7.77614237,11 8,10.7761424 8,10.5 C8,10.2238576 7.77614237,10 7.5,10 L4.5,10 Z" fill="#000000"/>
                                                </g>
                                            </svg><!--end::Svg Icon--></span>
                                            </span>
                                        </a>
                                    </td>
                                    @endif
                                </tr>
                            @endforeach 
                        </tbody>
                    </table>
                </div>
                <!--end::Table-->
            </div>
            <!--end::Body-->
        </div>
        <!--end::Advance Table Widget 1-->
    </div>
</div>
<!--end::Row-->
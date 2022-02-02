


@extends('layouts.app')
@section('title', 'Invoices')
@section('content')
    <!--begin::Subheader-->
    <div class="subheader min-h-lg-175px pt-5 pb-7 subheader-transparent" id="kt_subheader">
        <div class="container d-flex align-items-center justify-content-between flex-wrap flex-sm-nowrap">
            <!--begin::Details-->
            <div class="d-flex align-items-center flex-wrap mr-2">
                <!--begin::Heading-->
                <div class="d-flex flex-column">
                    <!--begin::Title-->
                    <h2 class="text-white font-weight-bold my-2 mr-5">Invoices</h2>
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
            <div class="card card-custom">
                <!--begin::Header-->
                <div class="card-header flex-wrap border-0 pt-6 pb-0">
                    <div class="card-title">
                        <h3 class="card-label">Invoice Management
                        <span class="d-block text-muted pt-2 font-size-sm">Invoice management made easy</span></h3>
                    </div>
                    <div class="card-toolbar">
                        <!--begin::Button-->
                        <a data-toggle="modal" data-target="#new-invoice" class="btn btn-primary font-weight-bolder">
                        <span class="svg-icon svg-icon-md">
                            <!--begin::Svg Icon | path:assets/media/svg/icons/Design/Flatten.svg-->
                            <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
                                <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                    <rect x="0" y="0" width="24" height="24" />
                                    <circle fill="#000000" cx="9" cy="15" r="6" />
                                    <path d="M8.8012943,7.00241953 C9.83837775,5.20768121 11.7781543,4 14,4 C17.3137085,4 20,6.6862915 20,10 C20,12.2218457 18.7923188,14.1616223 16.9975805,15.1987057 C16.9991904,15.1326658 17,15.0664274 17,15 C17,10.581722 13.418278,7 9,7 C8.93357256,7 8.86733422,7.00080962 8.8012943,7.00241953 Z" fill="#000000" opacity="0.3" />
                                </g>
                            </svg>
                            <!--end::Svg Icon-->
                        </span>New Invoice</a>
                        <!--end::Button-->
                    </div>
                </div>
                <!--end::Header-->
                <!--begin::Body-->
                <div class="card-body">
                    {{-- <!--begin::Search Form-->
                    <div class="mb-7">
                        {!! Form::open(['action'=>'invoiceController@search', 'method'=>'GET', 'enctype' =>'multipart/form-data', ' novalidate', 'class' => 'needs-validation d-block'])!!}
                        <div class="row align-items-center">
                            <div class="col-lg-9 col-xl-8">
                                <div class="row align-items-center">
                                    <div class="col-md-4 my-2 my-md-0">
                                        <div class="input-icon">
                                            {!! Form::text('search', '',  ['class' => "form-control r-0 light s-12 d-inline-block w-100", 'placeholder' => 'Serach ...'])!!}
                                            <span>
                                                <i class="flaticon2-search-1 text-muted"></i>
                                            </span>
                                        </div>
                                    </div>
                                    {!! Form::submit('Search', ['class' => "btn btn-light-primary px-6 font-weight-bold"]) !!}
                                </div>
                            </div>
                        </div>
                        {!! Form::close() !!}
                    </div>
                    <!--end::Search Form--> --}}
                    <!--end: Search Form-->
                    <!--begin: Datatable-->
                    {{-- <div class="datatable datatable-bordered datatable-head-custom" id="kt_datatable"></div> --}}
                    <table class="table" id="invoices_table">
                        <thead>
                            <tr>
                                <th scope="col">ID</th>
                                <th scope="col">Customer</th>
                                <th scope="col">Invoice No.</th>
                                <th scope="col">Due Date</th>
                                <th scope="col">Total</th>
                                <th scope="col">Status</th>
                                <th scope="col">File</th>
                                <th scope="col">Settings</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($invoices as $invoice)
                                <tr>
                                    <th scope="row">
                                        <a class="text-dark-75 mt-3 d-block" href="{{url('invoices/'. $invoice->id)}}">
                                            {{$invoice->id}}
                                        </a>
                                    </th>
                                    <td  class="datatable-cell">
                                        <a style="width: 200px;" href="{{url('customers/'. $invoice->user->id)}}">
                                            <div class="d-flex align-items-center">
                                                @if (Helper::avatarCheck($invoice->user->avatar))
                                                    <div class="symbol symbol-40 symbol-sm flex-shrink-0 ">
                                                        <img class="" src="{{asset('uploads/images/avatars/'.$invoice->user->avatar)}}" alt="photo" />
                                                    </div>
                                                @else
                                                    <div class="symbol symbol-40 symbol-sm flex-shrink-0 symbol-light-primary">
                                                        <span class="symbol-label font-size-h4">
                                                            {{$invoice->user->name[0]}}
                                                        </span>
                                                    </div>
                                                @endif
                                               
                                                <div class="ml-3">
                                                    <div class="text-dark-75 font-weight-bolder font-size-lg mb-0">{{$invoice->user->name}}</div>
                                                    <span  class="text-muted font-weight-bold text-hover-primary">{{$invoice->user->email}}</span>
                                                </div>
                                            </div>
                                        </a>
                                    </td>
                                    <td scope="row">
                                        <a class="text-dark-75 mt-3 d-block cursor-pointer" data-toggle="modal" data-target="#show-{{$invoice->id}}">
                                            {{$invoice->invoice_no}}
                                        </a>
                                    </td>
                                    <td class="pt-5">{{$invoice->due_date}}</td>
                                    <td class="pt-5">{{$invoice->grand_total}} SAR</td>
                                    
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
                                    <td>
                                        <a class="btn btn-sm btn-clean btn-icon show-invoice-btn" title="Show"  data-toggle="modal" data-target="#show-invoice-{{$invoice->id}}">
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
                                </tr>
                            @endforeach 
                        </tbody>
                    </table>
                    <!--end: Datatable-->
                    <!--begin: Pagination-->
                    <div class="d-flex justify-content-between align-items-center flex-wrap">
                        <div class="d-flex flex-wrap py-2 mr-3">
                            {{-- {{ $invoices->links() }} --}}
                        </div>
                        <div class="d-flex align-items-center py-3">
                            <span class="text-muted">Displaying {{count($invoices)}} of 
                                @if (!empty($all))
                                    {{count($all)}}
                                @endif
                                records</span>
                        </div>
                    </div>
                    <!--end: Pagination-->
                </div>
                <!--end::Body-->
            </div>
            <!--end::Card-->
        </div>
        <!--end::Container-->
    </div>
	
	<!--end::Entry-->
@endsection
@section('modals')
    
   @if (count($invoices) > 0)
        @foreach ($invoices as $invoice)
            <!--begin::invoice Doc Modal-->
            <div class="modal fade wide-modal" id="docs-{{$invoice->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Invoice Document</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                    </div>
                    <div class="modal-body">
                        @if (Helper::fileExists($invoice->docs, 'uploads/docs/invoices'))
                            <iframe src="{{ url('/uploads/docs/invoices/'. $invoice->docs)}}" frameborder="3"></iframe>
                        @endif
                    </div>
                </div>
                </div>
            </div>
            <!--end::invoice Doc Modal-->
            <!--begin::invoice Show Modal-->
            <div class="modal fade wide-modal" id="show-invoice-{{$invoice->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">{{$invoice->name}}</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                    </div>
                    <div class="modal-body">
                        @include('invoices.show', ['invoice' => $invoice])
                    </div>
                </div>
                </div>
            </div>
            <!--end::invoice Show Modal-->
        @endforeach
    @endif
    <!--begin::New invoice Modal-->
    <div class="modal fade widest-modal" id="new-invoice" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">New invoice</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
            </div>
            <div class="modal-body">
                @include('invoices.create')
            </div>
        </div>
        </div>
    </div>
    <!--end::New invoice Modal-->
@endsection
@section('scripts')
    <script src="{{asset('assets/js/pages/crud/forms/widgets/bootstrap-datepicker.js')}}"></script>
    <script src="{{asset('assets/js/add/add-invoice.js')}}"></script>
    <script src="{{asset('assets/js/html2canvas.min.js')}}"></script>
    
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jspdf/2.1.1/jspdf.umd.min.js"></script>

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
                $('.basic-datapicker').datepicker({
                    rtl: KTUtil.isRTL(),
                    orientation: "bottom left",
                    todayHighlight: true
                });
                
                var sub_total = total_all;
                var discount = $('#discount_emmiter').val();
                var discount_ammount = (discount * sub_total) /100;
                var vat_ammount = ($('#vat').text() * (sub_total - discount_ammount))/100;

                

                var grand_total= sub_total + vat_ammount - discount_ammount;

                $('#sub').text(sub_total + ' SAR');
                $('#sub_input').attr('value', sub_total);

                $('#vat_amount_input').attr('value', vat_ammount);
                $('#discount_amount_input').attr('value', discount_ammount);

                
                // console.log($('#discount_amount_input').val());
                
                $('#vat_ammount').text( vat_ammount + ' SAR' );
                $('#discount').text( discount_ammount + ' SAR' );
                
                
                $('#grand').text(grand_total + ' SAR');
                $('#grand_input').attr('value', grand_total);

            }, 500);

           

           
            $('.show-invoice-btn').click(function(){
                $(this).attr('data-target');
                var id = $(this).attr('data-target').replace( /^\D+/g, '');
                
                var invoice = document.getElementById('invoice_show_' + id);
                

                $('.change-invoice-status').click(function(){

                    var $this = $(this);
                    var id = $(this).attr('data-target').replace( /^\D+/g, '');
                    var form = $this.parents('form');
                    var status = $('#status_' + id);
                    var checked = status.parent('label').hasClass('checkbox-checked');

                    if(checked){
                        status.parent('label').removeClass('checkbox-checked');
                        status.attr('value', 1);
                    }else{
                        status.parent('label').addClass('checkbox-checked');
                        status.attr('value', 0);
                    }
                    

                    form.submit(function(e) {

                    e.preventDefault();
                    $.ajax({
                        headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
                        url: base_url + '/invoices/' + id ,
                        method:"POST",  
                        data: $(this).serialize(),                              
                        success: function(data){
                            console.log(data);
                            $("#invoices_table").load(location.href + " #invoices_table");
                        },
                        error: function(jqXhr, json, errorThrown){ // this are default for ajax errors 
                            var errors = jqXhr.responseJSON;
                            var errorsHtml = '';
                            $.each(errors['errors'], function (index, value) {
                                errorsHtml += '<ul class="list-group"><li class="list-group-item alert alert-danger">' + value + '</li></ul>';
                            });
                            //I use SweetAlert2 for this
                            // swal({
                            //     title: "Error " + jqXhr.status + ': ' + errorThrown,// this will output "Error 422: Unprocessable Entity"
                            //     html: errorsHtml,
                            //     width: 'auto',
                            //     confirmButtonText: 'Try again',
                            //     cancelButtonText: 'Cancel',
                            //     confirmButtonClass: 'btn',
                            //     cancelButtonClass: 'cancel-class',
                            //     showCancelButton: true,
                            //     closeOnConfirm: true,
                            //     closeOnCancel: true,
                            //     type: 'error'
                            // }, function(isConfirm) {
                            //     if (isConfirm) {
                            //         $('#openModal').click();//this is when the form is in a modal
                            //     }
                            // })
                        }
                    });
                    });

                    form.submit();
                });


                


                $("#invoice_show_" + id + ' #download').click(function(){



                // const { html2canvas } = window.html2canvas;

                // html2canvas(document.body).then(function(canvas) {
                //     document.body.appendChild(canvas);
                // });
                // const { jsPDF } = window.jspdf;
                // const doc = new jsPDF();
                // doc.text("Hello world!", 10, 10);
                // doc.save("a4.pdf");
                // console.log(html2canvas);


                var divContents = $("#invoice_show_" + id + " #invoice_html").html();
                var printWindow = window.open('', '', 'height=600,width=400');
                printWindow.document.write('<html><head><title>DIV Contents</title>');
                printWindow.document.write('<link href="' + asset_dir + 'assets/plugins/global/plugins.bundle.css" rel="stylesheet" type="text/css" />');
                printWindow.document.write('<link href="' + asset_dir + 'assets/plugins/custom/prismjs/prismjs.bundle.css" rel="stylesheet" type="text/css" />');
                printWindow.document.write('<link href="' + asset_dir + 'assets/css/style.bundle.css" rel="stylesheet" type="text/css" />');
                printWindow.document.write('<link href="' + asset_dir + 'assets/css/custom.css" rel="stylesheet" type="text/css" />');
                printWindow.document.write('</head><body >');
                printWindow.document.write(divContents);
                printWindow.document.write('</body></html>');
                printWindow.document.close();
                printWindow.print();

                });
                // console.log(invoice)
            });
        });
    </script>
@endsection
  
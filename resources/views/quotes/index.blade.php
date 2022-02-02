


@extends('layouts.app')
@section('title', 'Quotes')
@section('content')
    <!--begin::Subheader-->
    <div class="subheader min-h-lg-175px pt-5 pb-7 subheader-transparent" id="kt_subheader">
        <div class="container d-flex align-items-center justify-content-between flex-wrap flex-sm-nowrap">
            <!--begin::Details-->
            <div class="d-flex align-items-center flex-wrap mr-2">
                <!--begin::Heading-->
                <div class="d-flex flex-column">
                    <!--begin::Title-->
                    <h2 class="text-white font-weight-bold my-2 mr-5">Quotations</h2>
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
                        <a href="{{url('/')}}" class="text-white text-hover-white opacity-75 hover-opacity-100">Dahsboard</a>
                        <!--end::Item-->
                        <!--begin::Item-->
                        <span class="label label-dot label-sm bg-white opacity-75 mx-3"></span>
                        <a href="{{url('/quotations')}}" class="text-white text-hover-white opacity-75 hover-opacity-100">Quotations</a>
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
                <div class="card-header flex-wrap border-0 pt-6 pb-0">
                    <div class="card-title">
                        <h3 class="card-label">Quotations
                        <span class="text-muted pt-2 font-size-sm d-block">Quotations Datatable</span></h3>
                    </div>
                    <div class="card-toolbar">
                        <!--begin::Button-->
                    <a href="{{url('quotation')}}" class="btn btn-primary font-weight-bolder">
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
                        </span>New Quotation</a>
                        <!--end::Button-->
                    </div>
                </div>
                <div class="card-body">
                    <!--begin::Search Form-->
                    <div class="mb-7">
                        {!! Form::open(['action'=>'QuoteController@search', 'method'=>'GET', 'enctype' =>'multipart/form-data', ' novalidate', 'class' => 'needs-validation d-block'])!!}
                            @csrf
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
                                    <div class="col-md-4 my-2 my-md-0">
                                        <div class="d-flex align-items-center">
                                            <label class="mr-3 mb-0 d-none d-md-block">Status:</label>
                                            <select class="form-control" name="status">
                                                <option value="">All</option>
                                                <option value="1">Pending</option>
                                                <option value="2">Done</option>
                                            </select>
                                        </div>
                                    </div>
                                    {!! Form::submit('Search', ['class' => "btn btn-light-primary px-6 font-weight-bold"]) !!}
                                </div>
                            </div>
                        </div>
                        {!! Form::close() !!}
                    </div>
                    <!--end::Search Form-->
                    <!--begin: Datatable-->
                    {{-- <div class="datatable datatable-bordered datatable-head-custom" id="kt_datatable"></div> --}}
                    <table class="table">
                        <thead>
                            <tr>
                                <th scope="col">ID</th>
                                <th scope="col">Customer</th>
                                <th scope="col">Mobile</th>
                                <th scope="col">Budget</th>
                                <th scope="col">Created Dete</th>
                                <th scope="col">Updated Dete</th>
                                <th scope="col">Status</th>
                                <th scope="col">File</th>
                                <th scope="col">Settings</th>
                            </tr>
                        </thead>
                        <tbody>
                            @if(count($quotes) > 0)
                                @foreach ($quotes as $quote)
                                    <tr>
                                        <th scope="row">
                                            <a class="text-dark-75 mt-3 d-block" href="{{url('quotations/'. $quote->id)}}">
                                                {{$quote->id}}
                                            </a>
                                        </th>
                                        <td  class="datatable-cell">
                                            <a style="width: 250px;" href="{{url('quotations/'. $quote->id)}}">
                                                <div class="d-flex align-items-center">
                                                    @if ($quote->status == 1)
                                                        <div class="symbol symbol-40 symbol-circle symbol-light-danger"><span class="symbol-label font-size-h4">{{$quote->name[0]}}</span></div>
                                                    @else 
                                                        <div class="symbol symbol-40 symbol-circle symbol-light-success"><span class="symbol-label font-size-h4">{{$quote->name[0]}}</span></div>
                                                    @endif
                                                    <div class="ml-3">
                                                        <div class="text-dark-75 font-weight-bolder font-size-lg mb-0">{{$quote->name}}</div>
                                                        <span  class="text-muted font-weight-bold text-hover-primary">{{$quote->email}}</span>
                                                    </div>
                                                </div>
                                            </a>
                                        </td>
                                        <td class="pt-5">{{$quote->phone}}</td>
                                        <td class="pt-5">{{$quote->budget}}</td>
                                        <td class="pt-5">{{$quote->created_at->format('d M h:m:s')}}</td>
                                        <td class="pt-5">{{$quote->updated_at->format('d M h:m:s')}}</td>
                                        <td class="pt-5">
                                            @if (!empty($quote->status))
                                                @if ($quote->status == 1)
                                                    <span class="label label-inline label-light-danger font-weight-bold">
                                                        Pending
                                                    </span>
                                                @else 
                                                    <span class="label label-inline label-light-success font-weight-bold">
                                                        Done
                                                    </span>
                                                @endif
                                            @endif
                                        </td>
                                        <td>
                                            @if (Helper::fileExists($quote->docs, 'uploads/files/quotes'))
                                                <span class="svg-icon svg-icon-primary svg-icon-2x pointer"  data-toggle="modal" data-target="#docs-{{$quote->id}}" title="Show proposal File"><!--begin::Svg Icon | path:C:\wamp64\www\keenthemes\themes\metronic\theme\html\demo2\dist/../src/media/svg/icons\Files\File.svg--><svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
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
                                            <a class="btn btn-sm btn-clean btn-icon" title="Show" href="{{url('quotations/'.$quote->id)}}">
                                                <span class="svg-icon svg-icon-primary svg-icon-2x"><!--begin::Svg Icon | path:C:\wamp64\www\keenthemes\themes\metronic\theme\html\demo2\dist/../src/media/svg/icons\Devices\Display1.svg--><svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
                                                    <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                                        <rect x="0" y="0" width="24" height="24"/>
                                                        <path d="M11,20 L11,17 C11,16.4477153 11.4477153,16 12,16 C12.5522847,16 13,16.4477153 13,17 L13,20 L15.5,20 C15.7761424,20 16,20.2238576 16,20.5 C16,20.7761424 15.7761424,21 15.5,21 L8.5,21 C8.22385763,21 8,20.7761424 8,20.5 C8,20.2238576 8.22385763,20 8.5,20 L11,20 Z" fill="#000000" opacity="0.3"/>
                                                        <path d="M3,5 L21,5 C21.5522847,5 22,5.44771525 22,6 L22,16 C22,16.5522847 21.5522847,17 21,17 L3,17 C2.44771525,17 2,16.5522847 2,16 L2,6 C2,5.44771525 2.44771525,5 3,5 Z M4.5,8 C4.22385763,8 4,8.22385763 4,8.5 C4,8.77614237 4.22385763,9 4.5,9 L13.5,9 C13.7761424,9 14,8.77614237 14,8.5 C14,8.22385763 13.7761424,8 13.5,8 L4.5,8 Z M4.5,10 C4.22385763,10 4,10.2238576 4,10.5 C4,10.7761424 4.22385763,11 4.5,11 L7.5,11 C7.77614237,11 8,10.7761424 8,10.5 C8,10.2238576 7.77614237,10 7.5,10 L4.5,10 Z" fill="#000000"/>
                                                    </g>
                                                </svg><!--end::Svg Icon--></span>
                                            </a>
                                        </td>
                                    </tr>
                                @endforeach
                            @else
                                    No Data To Show
                            @endif
                            
                        </tbody>
                    </table>
                    <!--end: Datatable-->
                    <!--begin: Pagination-->
                    <div class="d-flex justify-content-between align-items-center flex-wrap">
                        <div class="d-flex flex-wrap py-2 mr-3">
                            {{ $quotes->links() }}
                        </div>
                        <div class="d-flex align-items-center py-3">
                          
                            <span class="text-muted">Displaying {{count($quotes)}} of 
                                @if (!empty($all))
                                    {{count($all)}}
                                @endif
                                records</span>
                        </div>
                    </div>
                    <!--end: Pagination-->
                </div>
            </div>
            <!--end::Card-->
        </div>
        <!--end::Container-->
    </div>
    <!--end::Entry-->
@endsection
@section('modals')
    @foreach ($quotes as $quote)
        <div class="modal fade wide-modal" id="docs-{{$quote->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Quotation Document</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
                </div>
                    <div class="modal-body">
                        @if (Helper::fileExists($quote->docs, 'uploads/files/quotes'))
                            <iframe src="{{ url('/uploads/files/quotes/'.$quote->docs)}}" frameborder="3"></iframe>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    @endforeach
@endsection
@section('scripts')
	<!--begin::Page Scripts(used by this page)-->
    {{-- <script src="{{asset('assets/js/datatables/quotes.js')}}"></script> --}}
    <!-- Open Ajax -->
    <script>
        // $(document).ready(function() {
        //     var ids = [];
        //     for (const key in data) {
        //         if (data.hasOwnProperty(key)) {
        //             var id = data[key].id;
        //             ids.push(id);
        //             // $('#kt_datatable').on('click', '#show-'+ id , function() {
        //             //     $.ajax({
        //             //         headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
        //             //         url: base_url + '/quotations/'+ id ,
        //             //         method: 'GET', 
        //             //         success: function(data){
        //             //             $("#kt_content").html($(data).find("#kt_content"));
        //             //             console.log(id);
        //             //         }
        //             //     });
        //             // });

        //             // $('#kt_datatable').on('click', '#delete-'+ id , function() {
        //             //     $.ajax({
        //             //         headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
        //             //         url: base_url + '/quotations/'+ id,
        //             //         method: 'Delete', 
        //             //         success: function(data){
        //             //             console.log(id);
        //             //             // setTimeout(function(){// wait for 5 secs(2)
        //             //             //     location.reload(); // then reload the page.(3)
        //             //             // }, 1000); 
        //             //         }
        //             //     })
        //             // });

        //             // // $('#kt_datatable').on('click', '#done-'+ id , function() {
        //             // //     $.ajax({
        //             // //         headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
        //             // //         url: base_url + '/quotations/'+ id + '/edit' ,
        //             // //         method: 'GET', 
        //             // //         success: function(data){
        //             // //             // setInterval(refreshPage(), 3000);
        //             // //            // if true (1)
        //             // //                 setTimeout(function(){// wait for 5 secs(2)
        //             // //                     location.reload(); // then reload the page.(3)
        //             // //                 }, 1000); 
                                
        //             // //             console.log('Done');
        //             // //         }
        //             // //     })
        //             // // });
        //         }
        //     } 

        //     for (const key in ids) {
        //         if (data.hasOwnProperty(key)) {
        //             var id = ids[key];
        //             console.log(id)
        //             $('#kt_datatable').on('click', '#show-'+ id , function() {
        //                 $.ajax({
        //                     headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
        //                     url: base_url + '/quotations/'+ id ,
        //                     method: 'GET', 
        //                     success: function(data){
        //                         $("#kt_content").html($(data).find("#kt_content"));
        //                         console.log(id);
        //                     }
        //                 })
        //             });
                    
        //         }
        //     }
        //     console.log(ids);
        // });
    </script>
    <!-- Close Ajax -->
@endsection
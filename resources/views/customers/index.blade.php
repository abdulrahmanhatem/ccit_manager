


@extends('layouts.app')
@section('title', 'Customers')
@section('content')
    <!--begin::Subheader-->
    <div class="subheader min-h-lg-175px pt-5 pb-7 subheader-transparent" id="kt_subheader">
        <div class="container d-flex align-items-center justify-content-between flex-wrap flex-sm-nowrap">
            <!--begin::Details-->
            <div class="d-flex align-items-center flex-wrap mr-2">
                <!--begin::Heading-->
                <div class="d-flex flex-column">
                    
                    <!--begin::Title-->
                    <h2 class="text-white font-weight-bold my-2 mr-5">Customers</h2>
                    <!--end::Title-->
                    <!--begin::Breadcrumb-->
                    <div class="d-flex align-items-center font-weight-bold my-2">
                        @if (auth()->user()->isAdmin())
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
                            <a href="{{url('/customers')}}" class="text-white text-hover-white opacity-75 hover-opacity-100">Customers</a>
                            <!--end::Item-->
                        @elseif(auth()->user()->isTeamMember())
                            <!--begin::Item-->
                            <span class="label label-dot label-sm bg-white opacity-75 mx-3"></span>
                            <a href="{{url('/')}}" class="text-white text-hover-white opacity-75 hover-opacity-100">Projects</a>
                            <!--end::Item-->
                            <!--begin::Item-->
                            <span class="label label-dot label-sm bg-white opacity-75 mx-3"></span>
                            <a href="{{url('/team/'.auth()->user()->id)}}" class="text-white text-hover-white opacity-75 hover-opacity-100">{{ucwords(auth()->user()->name)}}</a>
                            <!--end::Item-->
                        @endif
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
                        <h3 class="card-label">Customer Management
                        <span class="d-block text-muted pt-2 font-size-sm">User management made easy</span></h3>
                    </div>
                    @if (auth()->user()->isAdmin())
                        <div class="card-toolbar">
                            <!--begin::Button-->
                            <a data-toggle="modal" data-target="#new-customer" class="btn btn-primary font-weight-bolder">
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
                            </span>New Customer</a>
                            <!--end::Button-->
                        </div>
                    @endif
                </div>
                <!--end::Header-->
                <!--begin::Body-->
                <div class="card-body">
                    <!--begin::Search Form-->
                    <div class="mb-7">
                        {!! Form::open(['action'=>'CustomerController@search', 'method'=>'GET', 'enctype' =>'multipart/form-data', ' novalidate', 'class' => 'needs-validation d-block'])!!}
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
                                    {!! Form::submit('Search', ['class' => "btn btn-light-primary px-6 font-weight-bold"]) !!}
                                </div>
                            </div>
                        </div>
                        {!! Form::close() !!}
                    </div>
                    <!--end::Search Form-->
                    <!--end: Search Form-->
                    <!--begin: Datatable-->
                    {{-- <div class="datatable datatable-bordered datatable-head-custom" id="kt_datatable"></div> --}}
                    <table class="table">
                        <thead>
                            <tr>
                                <th scope="col">ID</th>
                                <th scope="col">Customer</th>
                                <th scope="col">Phone</th>
                                <th scope="col">Country</th>
                                <th scope="col">Settings</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($customers as $customer)
                                <tr>
                                    <th scope="row">
                                        <a class="text-dark-75 mt-3 d-block" href="{{url('customers/'. $customer->id)}}">
                                            {{$customer->id}}
                                        </a>
                                    </th>
                                    <td  class="datatable-cell">
                                        <a style="width: 250px;" href="{{url('customers/'. $customer->id)}}">
                                            <div class="d-flex align-items-center">
                                                @if (Helper::avatarCheck($customer->avatar))
                                                    <div class="symbol symbol-40 symbol-sm flex-shrink-0 ">
                                                        <img class="" src="{{asset('uploads/images/avatars/'.$customer->avatar)}}" alt="photo" />
                                                    </div>
                                                @else
                                                    <div class="symbol symbol-40 symbol-sm flex-shrink-0 symbol-light-primary">
                                                        <span class="symbol-label font-size-h4">
                                                            {{$customer->name[0]}}
                                                        </span>
                                                    </div>
                                                @endif
                                                <div class="ml-3">
                                                    <div class="text-dark-75 font-weight-bolder font-size-lg mb-0">{{ucwords($customer->name)}}</div>
                                                    <span  class="text-muted font-weight-bold text-hover-primary">{{$customer->email}}</span>
                                                </div>
                                            </div>
                                        </a>
                                    </td>
                                    <td class="pt-5">{{$customer->phone}}</td>
                                    <td class="pt-5">{{Helper::getCountryByKey($customer->country)}}</td>
                                    <td class="pt-5">
                                        <a class="btn btn-sm btn-clean btn-icon" title="Show" href="{{url('customers/'.$customer->id)}}">
                                            <span class="svg-icon svg-icon-primary svg-icon-2x"><!--begin::Svg Icon | path:C:\wamp64\www\keenthemes\themes\metronic\theme\html\demo2\dist/../src/media/svg/icons\Devices\Display1.svg--><svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
                                                <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                                    <rect x="0" y="0" width="24" height="24"/>
                                                    <path d="M11,20 L11,17 C11,16.4477153 11.4477153,16 12,16 C12.5522847,16 13,16.4477153 13,17 L13,20 L15.5,20 C15.7761424,20 16,20.2238576 16,20.5 C16,20.7761424 15.7761424,21 15.5,21 L8.5,21 C8.22385763,21 8,20.7761424 8,20.5 C8,20.2238576 8.22385763,20 8.5,20 L11,20 Z" fill="#000000" opacity="0.3"/>
                                                    <path d="M3,5 L21,5 C21.5522847,5 22,5.44771525 22,6 L22,16 C22,16.5522847 21.5522847,17 21,17 L3,17 C2.44771525,17 2,16.5522847 2,16 L2,6 C2,5.44771525 2.44771525,5 3,5 Z M4.5,8 C4.22385763,8 4,8.22385763 4,8.5 C4,8.77614237 4.22385763,9 4.5,9 L13.5,9 C13.7761424,9 14,8.77614237 14,8.5 C14,8.22385763 13.7761424,8 13.5,8 L4.5,8 Z M4.5,10 C4.22385763,10 4,10.2238576 4,10.5 C4,10.7761424 4.22385763,11 4.5,11 L7.5,11 C7.77614237,11 8,10.7761424 8,10.5 C8,10.2238576 7.77614237,10 7.5,10 L4.5,10 Z" fill="#000000"/>
                                                </g>
                                            </svg><!--end::Svg Icon--></span>
                                        </a>
                                        @if (auth()->user()->role->name == 'admin')
                                            <a class="btn btn-sm btn-clean btn-icon edit-customer-btn" title="Edit" data-toggle="modal" data-target="#edit-customer-{{$customer->id}}">
                                                <button type="submit" class="btn btn-sm btn-clean btn-icon" name="close-quote">
                                                    <span class="svg-icon svg-icon-primary svg-icon-2x"><!--begin::Svg Icon | path:C:\wamp64\www\keenthemes\themes\metronic\theme\html\demo2\dist/../src/media/svg/icons\Design\Edit.svg--><svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
                                                        <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                                            <rect x="0" y="0" width="24" height="24"/>
                                                            <path d="M8,17.9148182 L8,5.96685884 C8,5.56391781 8.16211443,5.17792052 8.44982609,4.89581508 L10.965708,2.42895648 C11.5426798,1.86322723 12.4640974,1.85620921 13.0496196,2.41308426 L15.5337377,4.77566479 C15.8314604,5.0588212 16,5.45170806 16,5.86258077 L16,17.9148182 C16,18.7432453 15.3284271,19.4148182 14.5,19.4148182 L9.5,19.4148182 C8.67157288,19.4148182 8,18.7432453 8,17.9148182 Z" fill="#000000" fill-rule="nonzero" transform="translate(12.000000, 10.707409) rotate(-135.000000) translate(-12.000000, -10.707409) "/>
                                                            <rect fill="#000000" opacity="0.3" x="5" y="20" width="15" height="2" rx="1"/>
                                                        </g>
                                                    </svg><!--end::Svg Icon--></span>
                                                </button> 
                                            </a> 
                                        @endif
                                        
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                    <!--end: Datatable-->
                    <!--begin: Pagination-->
                    <div class="d-flex justify-content-between align-items-center flex-wrap">
                        <div class="d-flex flex-wrap py-2 mr-3">
                            {{ $customers->links() }}
                        </div>
                        <div class="d-flex align-items-center py-3">
                            <span class="text-muted">Displaying {{count($customers)}} of 
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
    <!--begin::New customer Modal-->
    <div class="modal fade wide-modal" id="new-customer" tabindex="-1" role="dialog" aria-labelledby="create" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                <h5 class="modal-title" id="create">New Ccustomer</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
                </div>
                <div class="modal-body">
                    @include('customers.create')
                </div>
            </div>
        </div>
    </div>
    <!--begin::Edit customer Modal-->
    @foreach ($customers as $customer)
        <div class="modal fade wide-modal" id="edit-customer-{{$customer->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Edit {{ucwords($customer->name)}}</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
                </div>
                <div class="modal-body">
                    @include('customers.edit', ['customer' => $customer])
                </div>
            </div>
            </div>
        </div>
    @endforeach
    <!--end::Edit customer Modal-->
@endsection
@section('scripts')

    <script>
        $(document).ready(function(){
            $('.edit-customer-btn').click(function(){
                $(this).attr('data-target');
                var id = $(this).attr('data-target').replace( /^\D+/g, '');
                var avatar_box = $('.avatar_box#' + id);
                var avatar_file = $('#edit_avatar_'+ id);
                var	edit_avatar_preview = $('.edit_avatar_preview-'+ id);
                avatar_file.change(function(){
                    console.log(id );
                    var file = this.files[0];
                    if(file){
                        var reader = new FileReader();
                        reader.addEventListener("load", function(){
                            edit_avatar_preview.attr("src", this.result);
                        })
                        reader.readAsDataURL(file);
                    } 
                })
            }) 
        })
    </script>  

    
    <!-- Open Ajax -->
    <script>
        // $(document).ready(function() {
        //     for (const key in data) {
        //         if (data.hasOwnProperty(key)) {
        //             var id = data[key].id;
        //             console.log(id);
        //             $('#kt_datatable').on('click', '#show-'+ id , function() {
        //                 $.ajax({
        //                     headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
        //                     url: base_url + '/quotations/'+ id ,
        //                     method: 'GET', 
        //                     success: function(data){
        //                         $("#kt_content").html($(data).find("#kt_content"));
        //                     }
        //                 })
        //             });

        //             $('#kt_datatable').on('click', '#delete-'+ id , function() {
        //                 $.ajax({
        //                     headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
        //                     url: base_url + '/quotations/'+ id,
        //                     method: 'Delete', 
        //                     success: function(data){
        //                         // setTimeout(function(){// wait for 5 secs(2)
        //                         //     location.reload(); // then reload the page.(3)
        //                         // }, 1000); 
        //                         console.log('Success');
        //                     }
        //                 })
        //             });

        //             // $('#kt_datatable').on('click', '#done-'+ id , function() {
        //             //     $.ajax({
        //             //         headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
        //             //         url: base_url + '/quotations/'+ id + '/edit' ,
        //             //         method: 'GET', 
        //             //         success: function(data){
        //             //             // setInterval(refreshPage(), 3000);
        //             //            // if true (1)
        //             //                 setTimeout(function(){// wait for 5 secs(2)
        //             //                     location.reload(); // then reload the page.(3)
        //             //                 }, 1000); 
                                
        //             //             console.log('Done');
        //             //         }
        //             //     })
        //             // });
        //         }
        //     } 
        // });
    </script>
    <!-- Close Ajax -->
@endsection
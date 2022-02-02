


@extends('layouts.app')
@section('title', 'Tickets')
@section('content')
    <!--begin::Subheader-->
    <div class="subheader min-h-lg-175px pt-5 pb-7 subheader-transparent" id="kt_subheader">
        <div class="container d-flex align-items-center justify-content-between flex-wrap flex-sm-nowrap">
            <!--begin::Details-->
            <div class="d-flex align-items-center flex-wrap mr-2">
                <!--begin::Heading-->
                <div class="d-flex flex-column">
                    <!--begin::Title-->
                    <h2 class="text-white font-weight-bold my-2 mr-5">Tickets</h2>
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
                        <a href="{{url('/ticket')}}" class="text-white text-hover-white opacity-75 hover-opacity-100">Tickets</a>
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
                        <h3 class="card-label">Ticket Management
                        <span class="d-block text-muted pt-2 font-size-sm">Ticket management made easy</span></h3>
                    </div>
                    <div class="card-toolbar">
                        <!--begin::Button-->
                        <a data-toggle="modal" data-target="#new-ticket" class="btn btn-primary font-weight-bolder">
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
                        </span>New Ticket</a>
                        <!--end::Button-->
                    </div>
                </div>
                <!--end::Header-->
                <!--begin::Body-->
                <div class="card-body">
                    <!--begin::Search Form-->
                    <div class="mb-7">
                        {!! Form::open(['action'=>'TicketController@search', 'method'=>'GET', 'enctype' =>'multipart/form-data', ' novalidate', 'class' => 'needs-validation d-block'])!!}
                        <div class="row align-items-center">
                            <div class="col-lg-10 col-xl-10">
                                <div class="row align-items-center">
                                    <div class="col-md-3 my-2 my-md-0">
                                        <div class="input-icon">
                                            {!! Form::text('search', $search,  ['class' => "form-control r-0 light s-12 d-inline-block w-100", 'placeholder' => 'Serach ...'])!!}
                                            <span>
                                                <i class="flaticon2-search-1 text-muted"></i>
                                            </span>
                                        </div>
                                    </div>
                                    <div class="col-md-3 my-2 my-md-0">
                                        <div class="d-flex align-items-center">
                                            <label class="mr-3 mb-0 d-none d-md-block">Status:</label>
                                            {!! Form::select('category', ['all' => 'All', Helper::ticketCategories()], $category , ['class' => 'form-control selectpicker'])!!}
                                        </div>
                                    </div>
                                    <div class="col-md-3 my-2 my-md-0">
                                        <div class="d-flex align-items-center">
                                            <label class="mr-3 mb-0 d-none d-md-block">Status:</label>
                                            {!! Form::select('status', ['all' => 'All', Helper::ticketStatus()], $status , ['class' => 'form-control selectpicker'])!!}
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
                                <th scope="col">Category</th>
                                <th scope="col">Status</th>
                                <th scope="col">Start Date</th>
                                <th scope="col">Settings</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($tickets as $ticket)
                           
                                <tr>
                                    <th scope="row">
                                        <a class="text-dark-75 mt-3 d-block" href="{{url('tickets/'. $ticket->id)}}">
                                            {{$ticket->id}}
                                        </a>
                                    </th>
                                    <td  class="datatable-cell">
                                        @if ($ticket->customer())
                                            <a style="width: 250px;" href="{{url('customers/'. $ticket->customer()->id)}}">
                                                <div class="d-flex align-items-center">
                                                    @if (Helper::avatarCheck($ticket->customer()->avatar))
                                                        <div class="symbol symbol-40 symbol-sm flex-shrink-0 ">
                                                            <img class="" src="{{asset('uploads/images/avatars/'.$ticket->customer()->avatar)}}" alt="photo" />
                                                        </div>
                                                    @else
                                                        <div class="symbol symbol-40 symbol-sm flex-shrink-0 symbol-light-primary">
                                                            <span class="symbol-label font-size-h4">
                                                                {{$ticket->customer()->name[0]}}
                                                            </span>
                                                        </div>
                                                    @endif
                                                
                                                    <div class="ml-3">
                                                        <div class="text-dark-75 font-weight-bolder font-size-lg mb-0">{{$ticket->customer()->name}}</div>
                                                        <span  class="text-muted font-weight-bold text-hover-primary">{{$ticket->customer()->email}}</span>
                                                    </div>
                                                </div>
                                            </a>
                                        @endif
                                    </td>
                                    <td class="pt-5">
                                        @if ($ticket->category == 1)
                                            <span class="label label-inline label-light-danger font-weight-bold py-5">
                                                <span class="svg-icon svg-icon-danger svg-icon-2x pr-1"><!--begin::Svg Icon | path:C:\wamp64\www\keenthemes\themes\metronic\theme\html\demo2\dist/../src/media/svg/icons\Devices\Hard-drive.svg--><svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
                                                    <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                                        <rect x="0" y="0" width="24" height="24"/>
                                                        <path d="M2,13 L22,13 L22,18 C22,19.1045695 21.1045695,20 20,20 L4,20 C2.8954305,20 2,19.1045695 2,18 L2,13 Z M18.5,18 C19.3284271,18 20,17.3284271 20,16.5 C20,15.6715729 19.3284271,15 18.5,15 C17.6715729,15 17,15.6715729 17,16.5 C17,17.3284271 17.6715729,18 18.5,18 Z M13.5,18 C14.3284271,18 15,17.3284271 15,16.5 C15,15.6715729 14.3284271,15 13.5,15 C12.6715729,15 12,15.6715729 12,16.5 C12,17.3284271 12.6715729,18 13.5,18 Z" fill="#000000"/>
                                                        <path d="M5.79268604,8 L18.207314,8 C18.5457897,8 18.8612922,8.17121884 19.0457576,8.45501165 L22,13 L2,13 L4.95424243,8.45501165 C5.13870775,8.17121884 5.45421032,8 5.79268604,8 Z" fill="#000000" opacity="0.3"/>
                                                    </g>
                                                </svg><!--end::Svg Icon--></span>
                                                Technical Support
                                            </span>
                                        @elseif ($ticket->category == 2)
                                            <span class="label label-inline label-light-primary font-weight-bold py-5">
                                                <span class="svg-icon svg-icon-primary svg-icon-2x pr-1"><!--begin::Svg Icon | path:C:\wamp64\www\keenthemes\themes\metronic\theme\html\demo2\dist/../src/media/svg/icons\Shopping\Wallet.svg--><svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
                                                    <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                                        <rect x="0" y="0" width="24" height="24"/>
                                                        <circle fill="#000000" opacity="0.3" cx="20.5" cy="12.5" r="1.5"/>
                                                        <rect fill="#000000" opacity="0.3" transform="translate(12.000000, 6.500000) rotate(-15.000000) translate(-12.000000, -6.500000) " x="3" y="3" width="18" height="7" rx="1"/>
                                                        <path d="M22,9.33681558 C21.5453723,9.12084552 21.0367986,9 20.5,9 C18.5670034,9 17,10.5670034 17,12.5 C17,14.4329966 18.5670034,16 20.5,16 C21.0367986,16 21.5453723,15.8791545 22,15.6631844 L22,18 C22,19.1045695 21.1045695,20 20,20 L4,20 C2.8954305,20 2,19.1045695 2,18 L2,6 C2,4.8954305 2.8954305,4 4,4 L20,4 C21.1045695,4 22,4.8954305 22,6 L22,9.33681558 Z" fill="#000000"/>
                                                    </g>
                                                </svg><!--end::Svg Icon--></span>
                                                Financial Accounts
                                            </span>
                                        @elseif ($ticket->category == 3)
                                            <span class="label label-inline label-light-warning font-weight-bold py-5">
                                                <span class="svg-icon svg-icon-warning svg-icon-2x pr-1"><!--begin::Svg Icon | path:C:\wamp64\www\keenthemes\themes\metronic\theme\html\demo2\dist/../src/media/svg/icons\Shopping\Chart-line1.svg--><svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
                                                    <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                                        <rect x="0" y="0" width="24" height="24"/>
                                                        <path d="M5,19 L20,19 C20.5522847,19 21,19.4477153 21,20 C21,20.5522847 20.5522847,21 20,21 L4,21 C3.44771525,21 3,20.5522847 3,20 L3,4 C3,3.44771525 3.44771525,3 4,3 C4.55228475,3 5,3.44771525 5,4 L5,19 Z" fill="#000000" fill-rule="nonzero"/>
                                                        <path d="M8.7295372,14.6839411 C8.35180695,15.0868534 7.71897114,15.1072675 7.31605887,14.7295372 C6.9131466,14.3518069 6.89273254,13.7189711 7.2704628,13.3160589 L11.0204628,9.31605887 C11.3857725,8.92639521 11.9928179,8.89260288 12.3991193,9.23931335 L15.358855,11.7649545 L19.2151172,6.88035571 C19.5573373,6.44687693 20.1861655,6.37289714 20.6196443,6.71511723 C21.0531231,7.05733733 21.1271029,7.68616551 20.7848828,8.11964429 L16.2848828,13.8196443 C15.9333973,14.2648593 15.2823707,14.3288915 14.8508807,13.9606866 L11.8268294,11.3801628 L8.7295372,14.6839411 Z" fill="#000000" fill-rule="nonzero" opacity="0.3"/>
                                                    </g>
                                                </svg><!--end::Svg Icon--></span>
                                                Sales
                                            </span>
                                        @elseif ($ticket->category == 4)
                                            <span class="label label-inline label-light-success font-weight-bold py-5">
                                                <span class="svg-icon svg-icon-success svg-icon-2x pr-1"><!--begin::Svg Icon | path:C:\wamp64\www\keenthemes\themes\metronic\theme\html\demo2\dist/../src/media/svg/icons\Communication\Group-chat.svg--><svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
                                                    <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                                        <rect x="0" y="0" width="24" height="24"/>
                                                        <path d="M16,15.6315789 L16,12 C16,10.3431458 14.6568542,9 13,9 L6.16183229,9 L6.16183229,5.52631579 C6.16183229,4.13107011 7.29290239,3 8.68814808,3 L20.4776218,3 C21.8728674,3 23.0039375,4.13107011 23.0039375,5.52631579 L23.0039375,13.1052632 L23.0206157,17.786793 C23.0215995,18.0629336 22.7985408,18.2875874 22.5224001,18.2885711 C22.3891754,18.2890457 22.2612702,18.2363324 22.1670655,18.1421277 L19.6565168,15.6315789 L16,15.6315789 Z" fill="#000000"/>
                                                        <path d="M1.98505595,18 L1.98505595,13 C1.98505595,11.8954305 2.88048645,11 3.98505595,11 L11.9850559,11 C13.0896254,11 13.9850559,11.8954305 13.9850559,13 L13.9850559,18 C13.9850559,19.1045695 13.0896254,20 11.9850559,20 L4.10078614,20 L2.85693427,21.1905292 C2.65744295,21.3814685 2.34093638,21.3745358 2.14999706,21.1750444 C2.06092565,21.0819836 2.01120804,20.958136 2.01120804,20.8293182 L2.01120804,18.32426 C1.99400175,18.2187196 1.98505595,18.1104045 1.98505595,18 Z M6.5,14 C6.22385763,14 6,14.2238576 6,14.5 C6,14.7761424 6.22385763,15 6.5,15 L11.5,15 C11.7761424,15 12,14.7761424 12,14.5 C12,14.2238576 11.7761424,14 11.5,14 L6.5,14 Z M9.5,16 C9.22385763,16 9,16.2238576 9,16.5 C9,16.7761424 9.22385763,17 9.5,17 L11.5,17 C11.7761424,17 12,16.7761424 12,16.5 C12,16.2238576 11.7761424,16 11.5,16 L9.5,16 Z" fill="#000000" opacity="0.3"/>
                                                    </g>
                                                </svg><!--end::Svg Icon--></span>
                                                Complaints and suggestions
                                            </span>
                                        @endif
                                    </td>
                                    <td class="pt-5">
                                        @if ($ticket->status == 0)
                                            <span class="label label-inline label-light-danger font-weight-bold">
                                                New
                                            </span>
                                        @elseif ($ticket->status == 1)
                                            <span class="label label-inline label-light-primary font-weight-bold">
                                                Processed
                                            </span>
                                        @elseif ($ticket->status == 2)
                                            <span class="label label-inline label-light-warning font-weight-bold">
                                                Replied
                                            </span>
                                        @elseif ($ticket->status == 3)
                                            <span class="label label-inline label-light-success font-weight-bold">
                                                Closed
                                            </span>
                                        @endif
                                    </td>
                                    <td class="pt-5">{{$ticket->created_at->format('j M h:i:s')}}</td>
                                    <td>
                                        <a class="btn btn-sm btn-clean btn-icon" title="Show" href="{{url('tickets/'.$ticket->id)}}">
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
                        </tbody>
                    </table>
                    <!--end: Datatable-->
                    <!--begin: Pagination-->
                    <div class="d-flex justify-content-between align-items-center flex-wrap">
                        <div class="d-flex flex-wrap py-2 mr-3">
                            {{ $tickets->links() }}
                        </div>
                        <div class="d-flex align-items-center py-3">
                           
                            <span class="text-muted">Displaying {{count($tickets)}} of 
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
    <!--begin::Ticket Show Modal-->
    @if (count($tickets) > 0)
    @foreach ($tickets as $ticket)
        <!--begin::Show Tickets Modals-->
        <div class="modal fade wide-modal" id="docs-{{$ticket->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Ticket Document</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
                </div>
                    <div class="modal-body">
                        <iframe src="{{ url('/uploads/files/tickets/'.$ticket->docs)}}" frameborder="3"></iframe>
                    </div>
            </div>
            </div>
        </div>
        <!--end::Show ticket Modal-->
        <!--begin::Edit ticket Modal-->
        <div class="modal fade wide-modal" id="edit-ticket-{{$ticket->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Edit {{$ticket->name}}</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                    </div>
                    <div class="modal-body">
                        @include('tickets.edit', ['ticket' => $ticket, 'customer' => ''])
                    </div>
                </div>
            </div>
        </div>
        <!--end::Edit ticket Modal-->
    @endforeach
@endif
    <!--end::Tickets Modals-->
 
    <!--end::Edit Ticket Modal-->
@endsection
@section('scripts')
          
@endsection
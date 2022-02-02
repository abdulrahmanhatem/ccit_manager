<!--begin::Row-->
<div class="row">
    <div class="col-lg-12 col-xxl-12">
        <!--begin::Advance Table Widget 1-->
        <div class="card card-custom card-stretch gutter-b">
            <!--begin::Header-->
            <div class="card-header border-0 py-5">
                <h3 class="card-title align-items-start flex-column">
                    <span class="card-label font-weight-bolder text-dark">Tickets</span>
                    <span class="text-muted mt-3 font-weight-bold font-size-sm">ALl Your Tickets Details</span>
                </h3>
                @if (auth()->user()->isAdmin() || auth()->user()->isCustomer())
                    <div class="card-toolbar">
                        <a  data-toggle="modal" data-target="#new-ticket" class="btn btn-success font-weight-bolder font-size-sm">
                            <span class="svg-icon svg-icon-white svg-icon-2x"><!--begin::Svg Icon | path:C:\wamp64\www\keenthemes\themes\metronic\theme\html\demo2\dist/../src/media/svg/icons\Shopping\Ticket.svg--><svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
                                <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                    <rect x="0" y="0" width="24" height="24"/>
                                    <path d="M3,10.0500091 L3,8 C3,7.44771525 3.44771525,7 4,7 L9,7 L9,9 C9,9.55228475 9.44771525,10 10,10 C10.5522847,10 11,9.55228475 11,9 L11,7 L21,7 C21.5522847,7 22,7.44771525 22,8 L22,10.0500091 C20.8588798,10.2816442 20,11.290521 20,12.5 C20,13.709479 20.8588798,14.7183558 22,14.9499909 L22,17 C22,17.5522847 21.5522847,18 21,18 L11,18 L11,16 C11,15.4477153 10.5522847,15 10,15 C9.44771525,15 9,15.4477153 9,16 L9,18 L4,18 C3.44771525,18 3,17.5522847 3,17 L3,14.9499909 C4.14112016,14.7183558 5,13.709479 5,12.5 C5,11.290521 4.14112016,10.2816442 3,10.0500091 Z M10,11 C9.44771525,11 9,11.4477153 9,12 L9,13 C9,13.5522847 9.44771525,14 10,14 C10.5522847,14 11,13.5522847 11,13 L11,12 C11,11.4477153 10.5522847,11 10,11 Z" fill="#000000" opacity="0.3" transform="translate(12.500000, 12.500000) rotate(-45.000000) translate(-12.500000, -12.500000) "/>
                                </g>
                            </svg><!--end::Svg Icon--></span>Add New Ticket</a>
                    </div>
                @endif
            </div>
            <!--end::Header-->
            <!--begin::Body-->
            <div class="card-body py-0">
                <div class="row">
                    @if (count($customer->tickets()) > 0)
                        <div class="col-lg-12 col-xl-12 mb-5">
                            @foreach ($customer->tickets() as $ticket)
                                <a href="{{url('tickets/'.$ticket->id)}}">
                                    @if ($ticket->status == 0)
                                        <span class="label label-danger label-inline mr-2">Ticket {{$ticket->id}}</span>
                                    @elseif($ticket->status == 1)
                                        <span class="label label-primary label-inline mr-2">Ticket {{$ticket->id}}</span>
                                    @elseif($ticket->status == 2)
                                        <span class="label label-warning label-inline mr-2">Ticket {{$ticket->id}}</span>
                                    @elseif($ticket->status == 3)
                                        <span class="label label-success label-inline mr-2">Ticket {{$ticket->id}}</span>
                                    @endif
                                </a>
                            @endforeach
                        </div> 
                    @else
                        <div class="text-center p-4 w-100">
                            <span class="symbol-label w-100">
                                <a data-toggle="modal" data-target="#new-ticket" class="text-primary text-center w-100 cursor-pointer">Start Your Tickets</a>
                            </span>
                        </div>
                    @endif
                </div>
            </div>
            <!--end::Body-->
        </div>
        <!--end::Advance Table Widget 1-->
    </div>
</div>
<!--end::Row-->
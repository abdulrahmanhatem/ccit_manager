


@extends('layouts.app')
@section('title', $ticket->name . 'Ticket')
@section('content')
    <!--begin::Subheader-->
    <div class="subheader min-h-lg-175px pt-5 pb-7 subheader-transparent" id="kt_subheader">
        <div class="container d-flex align-items-center justify-content-between flex-wrap flex-sm-nowrap">
            <!--begin::Details-->
            <div class="d-flex align-items-center flex-wrap mr-2">
                <!--begin::Heading-->
                <div class="d-flex flex-column">
                    <!--begin::Title-->
                <h2 class="text-white font-weight-bold my-2 mr-5">Ticket {{$ticket->id}} </h2>
                    <!--end::Title-->
                    <!--begin::Breadcrumb-->
                    <div class="d-flex align-items-center font-weight-bold my-2">
                        <!--begin::Item-->
                        <a href="#" class="opacity-75 hover-opacity-100">
                            <i class="flaticon2-shelter text-white icon-1x"></i>
                        </a>
                        <!--end::Item-->
                        <!--begin::Item-->
                        <span class="label label-dot label-sm bg-white opacity-75 mx-3"></span>
                        <a href="{{url('/')}}" class="text-white text-hover-white opacity-75 hover-opacity-100">Dashboard</a>
                        <!--end::Item-->
                        <!--begin::Item-->
                        <span class="label label-dot label-sm bg-white opacity-75 mx-3"></span>
                        <a href="{{url('tickets')}}" class="text-white text-hover-white opacity-75 hover-opacity-100">Tickets</a>

                        <span class="label label-dot label-sm bg-white opacity-75 mx-3"></span>
                        <a href="{{url('tickets/'.$ticket->id)}}" class="text-white text-hover-white opacity-75 hover-opacity-100">Ticket {{$ticket->id}} </a>
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
    <div class="content pt-0 d-flex flex-column flex-column-fluid">
        <div class="container mt-n15">
            <div class="card card-custom gutter-b w-75 m-auto">
                <div class="card-header">
                    <div class="card-title">
                        <h3 class="card-label">Ticket {{$ticket->id}} 
                            @if (auth()->user()->isAdmin())
                                @if ($ticket->status == 0)
                                    <span class="label label-inline label-light-danger font-weight-bold font-lg">
                                        New
                                    </span>
                                @elseif ($ticket->status == 1)
                                    <span class="label label-inline label-light-primary font-weight-bold font-lg">
                                        Processed
                                    </span>
                                @elseif ($ticket->status == 2)
                                    <span class="label label-inline label-light-warning font-weight-bold">
                                        Replied
                                    </span>
                                @endif
                            @endif
                            @if ($ticket->status == 3)
                                <span class="label label-inline label-light-success font-weight-bold">
                                    Closed
                                </span>
                            @endif
                        </h3>
                    </div>
                </div>
                <div class="card-body">
                    <!--begin::Example-->
                    <div class="card-toolbar text-right mb-5">
                        @if (auth()->user()->isAdmin())
                            {!! Form::open([ 'action'=> ['TicketController@update', $ticket->id], 'method'=>'POST', 'files' => true, 'enctype' => 'multipart/form-data', 'class' => 'd-inline-block', 'id' => 'change_status_ticket' ]) !!}
                                @csrf    
                                    {!! Form::select('status', Helper::ticketStatus(), $ticket->status, ['class' => 'selectpicker','data-live-search' => 'true', 'required'])!!}	
                                    {!! Form::hidden('_method', 'PUT')!!}
                                    <button type="submit" class="btn btn-light-primary mr-2 d-none" name="change-status" >Update</button>
                            </form>
                        @endif
                        @if ($ticket->status != 3)
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
                            </span>Reply</a>
                            <!--end::Button-->
                        @endif
                    </div>
                    <div class="example example-basic">
                        <div class="example-preview">
                            <div class="timeline timeline-4">
                                <div class="timeline-bar"></div>
                                <div class="timeline-items">
                                    @if (count($ticket->messeges()) > 0)
                                        @foreach($ticket->messeges() as  $msg)
                                            @if ($msg->sender->role->name == "customer")
                                                <div class="timeline-item timeline-item-left">
                                            @else
                                                <div class="timeline-item timeline-item-right">
                                            @endif
                                                    <div class="timeline-badge">
                                                        <div class="bg-danger"></div>
                                                    </div>
                                                    <div class="timeline-label">
                                                    <span class="text-primary font-weight-bold">{{$msg->created_at->format('j M  h:i:s')}}</span>
                                                    </div>
                                                    <div class="timeline-content">
                                                        @if (auth()->user()->role->name != "customer" && auth()->user()->id == $msg->sender_id)
                                                        <div class="btn-toolbar mb-3" role="toolbar" aria-label="Toolbar with button groups" style="text-align: left;position: absolute;top: 8px;right: 0;">
                                                            <div class="btn-group mr-2" role="group" aria-label="First group">
                                                                <button data-toggle="modal" data-target="#edit-ticket-{{$msg->id}}" type="button" class="btn text-primary btn-icon edit-technology-btn" style="font-size: .5px;"><i class="la la-edit text-primary"></i></button>
                                                                <button data-toggle="modal" data-target="#delete-ticket-{{$msg->id}}" class="btn text-danger btn-icon" style="font-size: .5px;"><i class="la la-trash text-danger"></i></button>
                                                            </div>
                                                        </div>
                                                        @endif
                                                        <h2>{{$msg->subject}}</h2>
                                                        <p class="mb-1">{{$msg->text}}</p>
                                                        @if (Helper::FileExists($msg->docs, 'uploads/files/tickets'))
                                                            <div class="d-flex flex-column font-size-sm font-weight-bold">
                                                                <a href="{{url('uploads/files/tickets/'. $msg->docs)}}" target="_blank" class="d-flex align-items-center text-muted text-hover-primary py-1 flex-wrap">
                                                                <span class="flaticon2-clip-symbol text-info icon-1x mr-2"></span>{{$msg->docs}}</a>
                                                                {{-- <a href="#" class="d-flex align-items-center text-muted text-hover-primary py-1">
                                                                <span class="flaticon2-clip-symbol text-warning icon-1x mr-2"></span>Requirements.docx</a> --}}
                                                            </div>
                                                        @endif
                                                    </div>
                                                </div>  
                                        @endforeach
                                    @endif
                                    @if ($ticket->ticket_id == 0)
                                        @if ($ticket->sender->role->name == "customer")
                                            <div class="timeline-item timeline-item-left">
                                        @else
                                            <div class="timeline-item timeline-item-right">
                                        @endif
                                            <div class="timeline-badge">
                                                <div class="bg-success"></div>
                                            </div>
                                            <div class="timeline-label text-primary">
                                                <span class="text-primary font-weight-bold">{{$ticket->created_at->format('j M  h:i:s')}}</span>
                                            </div>
                                            <div class="timeline-content">
                                                @if (auth()->user()->role->name != "customer" && auth()->user()->id == $ticket->sender_id)
                                                    <div class="btn-toolbar mb-3" role="toolbar" aria-label="Toolbar with button groups" style="text-align: left;position: absolute;top: 8px;right: 0;">
                                                        <div class="btn-group mr-2" role="group" aria-label="First group">
                                                            <button data-toggle="modal" data-target="#edit-ticket-{{$ticket->id}}" type="button" class="btn text-primary btn-icon edit-technology-btn" style="font-size: .5px;"><i class="la la-edit text-primary"></i></button>
                                                        </div>
                                                    </div>
                                                @endif
                                                <h2>{{$ticket->subject}}</h2>
                                                <p class="mb-1">{{$ticket->text}}</p>
                                                @if (Helper::FileExists($ticket->docs, 'uploads/files/tickets'))
                                                    <div class="d-flex flex-column font-size-sm font-weight-bold">
                                                        <a href="{{url('uploads/files/tickets/'. $ticket->docs)}}" target="_blank" class="d-flex align-items-center text-muted text-hover-primary py-1 flex-wrap">
                                                        <span class="flaticon2-clip-symbol text-info icon-1x mr-2"></span>{{$ticket->docs}}</a>
                                                        {{-- <a href="#" class="d-flex align-items-center text-muted text-hover-primary py-1">
                                                        <span class="flaticon2-clip-symbol text-warning icon-1x mr-2"></span>Requirements.docx</a> --}}
                                                    </div>
                                                @endif
                                            </div>
                                        </div> 
                                    @endif
                                </div>
                            </div>
                        </div>
                    </div>
                    <!--end::Example-->
                </div>
            </div>
        </div>
    </div>
    <!--end::Entry-->
@endsection
@section('modals')

    @if (count($ticket->messeges()) > 0)
        @foreach($ticket->messeges() as  $msg)
            <!--begin::Edit project Modal-->
            <div class="modal fade wide-modal" id="edit-ticket-{{$msg->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Edit {{$msg->name}}</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                    </div>
                    <div class="modal-body">
                        {!! Form::open([ 'action'=> ['TicketController@update', $msg->id], 'method'=>'POST', 'files' => true, 'enctype' => 'multipart/form-data', 'class' => '', 'id' => '' ]) !!}
                        @csrf    
                            <div class="card-body">
                                <div class="form-group row">
                                    <div class="col-lg-6 d-none">
                                        {!! Form::select('category', Helper::ticketCategories(), $msg->category, ['class' => 'form-control selectpicker required','data-live-search' => 'true', 'placeholder' => 'Project Name', 'required'])!!}	
                                        <span class="form-text text-muted">Please Choose Category</span>
                                    </div>
                                    <div class="col-lg-12">
                                        {!! Form::text('subject', $msg->subject, ['class' => 'form-control required', 'placeholder' => 'Subject', 'required'])!!}	
                                        <span class="form-text text-muted">Please Inter Subject</span>
                                    </div>
                                    <div class="col-lg-12">
                                        {!! Form::textarea('text', $msg->text, ['class' => 'form-control required', 'placeholder' => 'Message', 'rows' => '7', 'required'])!!}	
                                        <span class="form-text text-muted">Please Inter Your Messege</span>
                                    </div>
                                </div>
                                
                                <div class="form-group row">
                                    <div class="col-lg-12">
                                        <div class="dropzone dropzone-multi" id="kt_dropzone_4">
                                            <div class="dropzone-panel mb-lg-0 mb-2">
                                                <label class="dropzone-select btn btn-light-primary font-weight-bold btn-sm" for="msg_docs">Attach files</label>
                                                <input name="docs" type="file" id="msg_docs" hidden> 
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
                                        <span class="form-text text-muted">Max Size Is 5 MB</span>
                                        <p id="msg_file_preview"></p>
                                    </div>
                                    <script>
                                        const msg_docs = document.getElementById('msg_docs');
                                        const msg_file_preview = document.getElementById('msg_file_preview');
                    
                                        msg_docs.addEventListener('change', function(){
                                            const file = this.files[0];
                                            
                                            if(file){
                                                const reader = new FileReader();
                                                console.log(file);
                                                reader.addEventListener("load", function(){
                                                    msg_file_preview.innerHTML = file.name;
                                                })
                    
                                                reader.readAsDataURL(file);
                                            }else{
                                                
                                            }
                                        })
                                    </script>
                                </div>
                                @if (auth()->user()->isCustomer())
                                    <input name="sender_id" value="{{auth()->user()->id}}" hidden="hidden">
                                    <input name="receiver_id" value="0" hidden="hidden">
                                @else 
                                    <input name="sender_id" value="{{auth()->user()->id}}" hidden="hidden">
                                    <input name="receiver_id" value="{{$msg->customer()->id}}" hidden="hidden">
                                @endif
                                <input name="ticket_id" value="{{$msg->id}}" hidden="hidden">
                                {!! Form::hidden('_method', 'PUT')!!}
                                <button type="submit" class="btn btn-light-primary mr-2">Update</button>
                            </div>
                        </form>
                    </div>
                </div>
                </div>
            </div>
            <!--begin::Delete project Modal-->
            <div class="modal fade project-modal" id="delete-ticket-{{$msg->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Delete Messege</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                    {!! Form::open(['action'=>['TicketController@destroy', $msg->id], 'method'=>'POST'])!!}
                    
                    </div>
                    <div class="modal-body">
                        Are You Sure About Messege Deletion?
                    </div>
                    <div class="modal-footer">
                        {!! Form::button('Delete', ['type' => 'submit','class' => "btn btn-danger", 'name' => 'delete'], false)!!}
                    </div>
                    {{Form::hidden('_method', 'DELETE')}}
                    {!! Form::close() !!}
                </div>
                </div>
            </div>
        @endforeach 
    @endif

    <div class="modal fade wide-modal" id="edit-ticket-{{$ticket->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">Edit Ticket</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
            </div>
            <div class="modal-body">
                {!! Form::open([ 'action'=> ['TicketController@update', $ticket->id], 'method'=>'POST', 'files' => true, 'enctype' => 'multipart/form-data', 'class' => '', 'id' => '' ]) !!}
                @csrf    
                    <div class="card-body">
                        <div class="form-group row">
                            <div class="col-lg-6 d-none">
                                {!! Form::select('category', Helper::ticketCategories(), $ticket->category, ['class' => 'form-control selectpicker required','data-live-search' => 'true', 'placeholder' => 'Project Name', 'required'])!!}	
                                <span class="form-text text-muted">Please Choose Category</span>
                            </div>
                            <div class="col-lg-12">
                                {!! Form::text('subject', $ticket->subject, ['class' => 'form-control required', 'placeholder' => 'Subject', 'required'])!!}	
                                <span class="form-text text-muted">Please Inter Subject</span>
                            </div>
                            <div class="col-lg-12">
                                {!! Form::textarea('text', $ticket->text, ['class' => 'form-control required', 'placeholder' => 'Message', 'rows' => '7', 'required'])!!}	
                                <span class="form-text text-muted">Please Inter Your Messege</span>
                            </div>
                        </div>
                        
                        <div class="form-group row">
                            <div class="col-lg-12">
                                <div class="dropzone dropzone-multi" id="kt_dropzone_4">
                                    <div class="dropzone-panel mb-lg-0 mb-2">
                                        <label class="dropzone-select btn btn-light-primary font-weight-bold btn-sm" for="ticket_docs">Attach files</label>
                                        <input name="docs" type="file" id="ticket_docs" hidden> 
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
                                <span class="form-text text-muted">Max Size Is 5 MB</span>
                                <p id="ticket_file_preview"></p>
                            </div>
                            <script>
                                const ticket_docs = document.getElementById('ticket_docs');
                                const ticket_file_preview = document.getElementById('ticket_file_preview');
            
                                ticket_docs.addEventListener('change', function(){
                                    const file = this.files[0];
                                    
                                    if(file){
                                        const reader = new FileReader();
                                        console.log(file);
                                        reader.addEventListener("load", function(){
                                            ticket_file_preview.innerHTML = file.name;
                                        })
            
                                        reader.readAsDataURL(file);
                                    }else{
                                        
                                    }
                                })
                            </script>
                        </div>
                        @if (auth()->user()->isCustomer())
                            <input name="sender_id" value="{{auth()->user()->id}}" hidden="hidden">
                            <input name="receiver_id" value="0" hidden="hidden">
                        @else 
                            <input name="sender_id" value="{{auth()->user()->id}}" hidden="hidden">
                            <input name="receiver_id" value="{{$ticket->customer()->id}}" hidden="hidden">
                        @endif
                        <input name="ticket_id" value="{{$ticket->id}}" hidden="hidden">
                        {!! Form::hidden('_method', 'PUT')!!}
                        <button type="submit" class="btn btn-light-primary mr-2">Update</button>
                    </div>
                </form>
            </div>
        </div>
        </div>
    </div>
    
    <!--end::Edit project Modal-->
    @if ($ticket->status != 3)
        <!--begin::New ticket Modal-->
    <div class="modal fade wide-modal" id="new-ticket" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">New Messege</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
            </div>
            <div class="modal-body">
                <!--begin::Form-->
                {!! Form::open([ 'action'=> ['TicketController@store'], 'method'=>'POST', 'files' => true, 'enctype' => 'multipart/form-data', 'class' => '', 'id' => '' ]) !!}
                @csrf    
                    <div class="card-body">
                        <div class="form-group row">
                            <div class="col-lg-6 d-none">
                                {!! Form::select('category', Helper::ticketCategories(), $ticket->category, ['class' => 'form-control selectpicker required','data-live-search' => 'true', 'placeholder' => 'Project Name', 'required'])!!}	
                                <span class="form-text text-muted">Please Choose Category</span>
                            </div>
                            <div class="col-lg-12">
                                {!! Form::text('subject', '', ['class' => 'form-control required', 'placeholder' => 'Subject', 'required'])!!}	
                                <span class="form-text text-muted">Please Inter Subject</span>
                            </div>
                            <div class="col-lg-12">
                                {!! Form::textarea('text', '', ['class' => 'form-control required', 'placeholder' => 'Message', 'rows' => '7', 'required'])!!}	
                                <span class="form-text text-muted">Please Inter Your Messege</span>
                            </div>
                        </div>
                        
                        <div class="form-group row">
                            <div class="col-lg-12">
                                <div class="dropzone dropzone-multi" id="kt_dropzone_4">
                                    <div class="dropzone-panel mb-lg-0 mb-2">
                                        <label class="dropzone-select btn btn-light-primary font-weight-bold btn-sm" for="ticket_docs">Attach files</label>
                                        <input name="docs" type="file" id="ticket_docs" hidden> 
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
                                <span class="form-text text-muted">Max Size Is 5 MB</span>
                                <p id="ticket_file_preview"></p>
                            </div>
                            <script>
                                const ticket_docs = document.getElementById('ticket_docs');
                                const ticket_file_preview = document.getElementById('ticket_file_preview');
            
                                ticket_docs.addEventListener('change', function(){
                                    const file = this.files[0];
                                    
                                    if(file){
                                        const reader = new FileReader();
                                        console.log(file);
                                        reader.addEventListener("load", function(){
                                            ticket_file_preview.innerHTML = file.name;
                                        })
            
                                        reader.readAsDataURL(file);
                                    }else{
                                        
                                    }
                                })
                            </script>
                        </div>
                        @if (auth()->user()->isCustomer())
                            <input name="sender_id" value="{{auth()->user()->id}}" hidden="hidden">
                            <input name="receiver_id" value="0" hidden="hidden">
                            <input name="customer" value="0" hidden="hidden">
                        @else 
                            <input name="sender_id" value="{{auth()->user()->id}}" hidden="hidden">
                            <input name="non_customer" value="{{$ticket->customer()->id}}" hidden="hidden">
                        @endif
                        <input name="ticket_id" value="{{$ticket->id}}" hidden="hidden">
                        <button type="submit" class="btn btn-light-primary mr-2" name="send-messege">Send</button>
                    </div>
                </form>
            </div>
        </div>
        </div>
    </div>
    <!--end::New ticket Modal-->
    @endif
    
@endsection
@section('scripts')
    <!--begin::Page Scripts(used by this page)-->
    <script>
        $(document).ready(function(){
            $("#change_status_ticket select").on('change', function() {
                $('#change_status_ticket button[type="submit"]').click();
            });
        });
    </script>

@endsection



@extends('layouts.app')
@section('title', 'Team Members')
@section('content')
    <!--begin::Subheader-->
    <div class="subheader min-h-lg-175px pt-5 pb-7 subheader-transparent team-member" id="kt_subheader">
        <div class="container d-flex align-items-center justify-content-between flex-wrap flex-sm-nowrap">
            <!--begin::Details-->
            <div class="d-flex align-items-center flex-wrap mr-2">
                <!--begin::Heading-->
                <div class="d-flex flex-column">
                    <!--begin::Title-->
                    <h2 class="text-white font-weight-bold my-2 mr-5">Members</h2>
                    <!--end::Title-->
                    <!--begin::Breadcrumb-->
                    <div class="d-flex align-items-center font-weight-bold my-2">
                        <!--begin::Item-->
                        <a href="{{url('/')}}" class="opacity-75 hover-opacity-100">
                            <i class="flaticon2-shelter text-white icon-1x"></i>
                        </a>
                        <!--end::Item-->
                        @if (auth()->user()->isAdmin() )
                             <!--begin::Item-->
                            <span class="label label-dot label-sm bg-white opacity-75 mx-3"></span>
                            <a href="{{url('/')}}" class="text-white text-hover-white opacity-75 hover-opacity-100">Dashboard</a>
                            <!--end::Item-->
                        @endif
                        <!--begin::Item-->
                        <span class="label label-dot label-sm bg-white opacity-75 mx-3"></span>
                        <a href="{{url('team')}}" class="text-white text-hover-white opacity-75 hover-opacity-100">Members</a>
                        <!--end::Item-->
                        
                    </div>
                    <!--end::Breadcrumb-->
                </div>
                <!--end::Heading-->
            </div>
            @if (auth()->user()->isAdmin() || auth()->user()->isPM())
                <!--end::Details-->
                <div class="d-flex align-items-center w-50">
                    <!--begin::Button-->
                    {!! Form::open(['action'=>'TeamMemberController@search', 'method'=>'GET', 'enctype' =>'multipart/form-data', ' novalidate', 'class' => 'search-form needs-validation d-block w-75'])!!}
                    @csrf
                    <div class="row align-items-center">
                        <div class="col-lg-12 col-xl-12">
                            <div class="row align-items-center">
                                <div class="col-md-9 my-2 my-md-0">
                                    <div class="input-icon">
                                        {!! Form::text('search', $search,  ['class' => "form-control r-0 bg-transparent s-12 d-inline-block w-100 search-input", 'placeholder' => 'Serach ...'])!!}
                                        {{-- <span>
                                            <i class="flaticon2-search-1 text-white"></i>
                                        </span> --}}
                                    </div>
                                </div>
                                {!! Form::submit('Search', ['class' => "btn btn-transparent-white font-weight-bold py-3 px-6 mr-2"]) !!}
                            </div>
                        </div>
                    </div>
                    {!! Form::close() !!}
                    <a href="#" class="btn btn-success font-weight-bold py-3 px-6" data-toggle="modal" data-target= "#new-member">New Member</a>
                </div>
            @endif
            
        </div>
    </div>
    
    <!--end::Subheader-->
    <!--begin::Entry-->
    <div class="d-flex flex-column-fluid">
        <!--begin::Container-->
        <div class="container">
            <!--begin::Row-->
            <div class="row">
                @if (count($members) > 0)
                    @foreach ($members as $member)
                        <!--begin::Col-->
                        <div class="col-xl-3 col-lg-6 col-md-6 col-sm-6 team-member">
                            <!--begin::Card-->
                            <div class="card card-custom gutter-b card-stretch ribbon ribbon-top">
                            <div class="ribbon-target bg-success font-weight-bolder" style="top: -2px; right: 20px;">{{Helper::getTeamCategoryByID($member->category_id)}}</div>
                                <!--begin::Body-->
                                <div class="card-body pt-4">
                                    <!--begin::Toolbar-->
                                    <div class="d-flex justify-content-end">
                                        <div class="dropdown dropdown-inline mt-5">
                                            <a href="#" class="btn btn-clean btn-hover-light-primary btn-sm btn-icon" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                <i class="ki ki-bold-more-hor"></i>
                                            </a>
                                            <div class="dropdown-menu dropdown-menu-md dropdown-menu-right">
                                                <!--begin::Navigation-->
                                                <a class="" title="Edit" data-toggle="modal" data-target="#edit-member-{{$member->id}}">
                                                    Edit
                                                    <button type="submit" class="btn btn-sm btn-clean btn-icon text-righ" name="close-quote">
                                                        <span class="svg-icon svg-icon-primary svg-icon-2x"><!--begin::Svg Icon | path:C:\wamp64\www\keenthemes\themes\metronic\theme\html\demo2\dist/../src/media/svg/icons\Design\Edit.svg--><svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
                                                            <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                                                <rect x="0" y="0" width="24" height="24"/>
                                                                <path d="M8,17.9148182 L8,5.96685884 C8,5.56391781 8.16211443,5.17792052 8.44982609,4.89581508 L10.965708,2.42895648 C11.5426798,1.86322723 12.4640974,1.85620921 13.0496196,2.41308426 L15.5337377,4.77566479 C15.8314604,5.0588212 16,5.45170806 16,5.86258077 L16,17.9148182 C16,18.7432453 15.3284271,19.4148182 14.5,19.4148182 L9.5,19.4148182 C8.67157288,19.4148182 8,18.7432453 8,17.9148182 Z" fill="#000000" fill-rule="nonzero" transform="translate(12.000000, 10.707409) rotate(-135.000000) translate(-12.000000, -10.707409) "/>
                                                                <rect fill="#000000" opacity="0.3" x="5" y="20" width="15" height="2" rx="1"/>
                                                            </g>
                                                        </svg><!--end::Svg Icon--></span>
                                                       
                                                    </button> 
                                                    
                                                </a>
                                                <a class="" title="Delete" data-toggle="modal" data-target="#delete-member-{{$member->id}}">
                                                    Delete
                                                    <button type="submit" class="btn btn-sm btn-clean btn-icon" name="close-quote">
                                                        <span class="svg-icon svg-icon-primary svg-icon-2x"><!--begin::Svg Icon | path:C:\wamp64\www\keenthemes\themes\metronic\theme\html\demo2\dist/../src/media/svg/icons\General\Trash.svg--><svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
                                                            <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                                                <rect x="0" y="0" width="24" height="24"/>
                                                                <path d="M6,8 L6,20.5 C6,21.3284271 6.67157288,22 7.5,22 L16.5,22 C17.3284271,22 18,21.3284271 18,20.5 L18,8 L6,8 Z" fill="#000000" fill-rule="nonzero"/>
                                                                <path d="M14,4.5 L14,4 C14,3.44771525 13.5522847,3 13,3 L11,3 C10.4477153,3 10,3.44771525 10,4 L10,4.5 L5.5,4.5 C5.22385763,4.5 5,4.72385763 5,5 L5,5.5 C5,5.77614237 5.22385763,6 5.5,6 L18.5,6 C18.7761424,6 19,5.77614237 19,5.5 L19,5 C19,4.72385763 18.7761424,4.5 18.5,4.5 L14,4.5 Z" fill="#000000" opacity="0.3"/>
                                                            </g>
                                                        </svg><!--end::Svg Icon--></span>
                                                       
                                                    </button>
                                                     
                                                </a>
                                            </div>
                                        </div>
                                    </div>
                                    <!--end::Toolbar-->
                                    <!--begin::User-->
                                    <div class="d-flex align-items-end mb-7">
                                        <!--begin::Pic-->
                                        <div class="d-flex align-items-center">
                                            <!--begin::Pic-->
                                            <div class="flex-shrink-0 mr-4 mt-lg-0 mt-3">
                                                @if (Helper::avatarCheck($member->avatar))
                                                    <div class="symbol symbol-circle symbol-lg-75">
                                                        <img class="" src="{{asset('uploads/images/avatars/'.$member->avatar)}}" alt="photo" />
                                                    </div>
                                                @else
                                                    <div class="symbol symbol-circle symbol-lg-75 symbol-light-success">
                                                        <span class="symbol-label font-size-h4">
                                                            {{$member->name[0]}}
                                                        </span>
                                                    </div>
                                                @endif
                                                <div class="symbol symbol-lg-75 symbol-circle symbol-success d-none">
                                                    <span class="font-size-h3 font-weight-boldest">JM</span>
                                                </div>
                                            </div>
                                            <!--end::Pic-->
                                            <!--begin::Title-->
                                            <div class="d-flex flex-column">
                                            <a href="{{url('team/'.$member->id)}}" class="text-dark font-weight-bold text-hover-success font-size-h4 mb-0">{{$member->name}}</a>
                                                <span class="text-muted font-weight-bold">{{Helper::getTeamCategoryByID($member->category_id)}}</span>
                                            </div>
                                            <!--end::Title-->
                                        </div>
                                        <!--end::Title-->
                                    </div>
                                    <!--end::User-->
                                    <!--begin::Desc-->
                                    {{-- <p class="mb-7">I distinguish three
                                    <a href="#" class="text-primary pr-1">#XRS-54PQ</a>objectives First objectives and nice cooked rice</p> --}}
                                    <!--end::Desc-->
                                    <!--begin::Info-->
                                    <div class="mb-7">
                                        <div class="d-flex justify-content-between align-items-center">
                                            <span class="text-dark-75 font-weight-bolder mr-2">Email:</span>
                                        <a href="#" class="text-muted text-hover-primary">{{$member->email}}</a>
                                        </div>
                                        <div class="d-flex justify-content-between align-items-cente my-1">
                                            <span class="text-dark-75 font-weight-bolder mr-2">Phone:</span>
                                        <a href="#" class="text-muted text-hover-primary">{{$member->phone}}</a>
                                        </div>
                                        <div class="d-flex justify-content-between align-items-center">
                                            <span class="text-dark-75 font-weight-bolder mr-2">Location:</span>
                                        <span class="text-muted font-weight-bold">{{Helper::getCountryByKey($member->country)}}</span>
                                        </div>
                                    </div>
                                    <!--end::Info-->
                                <a data-toggle="modal" data-target="#kt_chat_modal" class="btn btn-block btn-sm btn-light-success font-weight-bolder text-uppercase py-4 member-index" id="member_{{$loop->iteration }}">write message</a>
                                </div>
                                <!--end::Body-->
                            </div>
                            <!--end::Card-->
                        </div>
                        <!--end::Col-->
                    @endforeach
                @endif
                
            </div>
            <div class="d-flex justify-content-between align-items-center flex-wrap">
                <div class="d-flex flex-wrap py-2 mr-3">
                    {{ $members->links() }}
                </div>
                <div class="d-flex align-items-center py-3">
                    <span class="text-muted">Displaying {{count($members)}} of 
                        @if (!empty($all))
                            {{count($all)}}
                        @endif
                        records</span>
                </div>
            </div>
            <!--end::Row-->
        </div>
        <!--end::Container-->
    </div>
	
	<!--end::Entry-->
@endsection
@section('modals')
    @foreach ($members as $member)
        <div class="modal fade" id="docs-{{$member->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Delete Team Member</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                    {!! Form::open(['action'=>['TeamMemberController@destroy', $member->id], 'method'=>'POST'])!!}
                    @csrf
                    </div>
                    <div class="modal-body">
                        Are You Sure About Member Deletion?
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        {!! Form::button('Delete', ['type' => 'submit','class' => "btn btn-danger"], false)!!}
                    </div>
                    {{Form::hidden('_method', 'DELETE')}}
                    {!! Form::close() !!}
                </div>
            </div>
        </div>
        <!--begin::Edit member Modal-->
        <div class="modal fade wide-modal" id="edit-member-{{$member->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Edit {{$member->name}}</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
                </div>
                <div class="modal-body">
                    @include('members.edit', ['member' => $member])
                </div>
            </div>
            </div>
        </div>
        <!--end::Edit member Modal-->
        <!--begin:: Delete member Modal-->
        <div class="modal fade" id="delete-member-{{$member->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Delete {{$member->name}}</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                    </div>
                    <div class="modal-body">
                        Are You Sure About Deleting {{$member->name}}?
                    </div>
                    <div class="modal-footer">
                        {!! Form::open([ 'action'=> ['TeamMemberController@destroy', $member->id], 'method'=>'POST']) !!}
                            {!! Form::hidden('_method', 'DELETE')!!}
                            <button type="submit" class="btn btn-danger">Delete</button>
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <!--end::Delete member Modal-->
    @endforeach
    <!--begin::New member Modal-->
    <div class="modal fade wide-modal" id="new-member" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">New Member</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
            </div>
            <div class="modal-body">
                @include('members.create')
            </div>
        </div>
        </div>
    </div>
    <!--end::New member Modal-->
    <!--begin::Chat Panel-->
    <div class="modal modal-sticky modal-sticky-bottom-right" id="kt_chat_modal" role="dialog" data-backdrop="false">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <!--begin::Card-->
                <div class="card card-custom">
                    <!--begin::Header-->
                    <div class="card-header align-items-center px-4 py-3">
                        <div class="text-left flex-grow-1">
                            <!--begin::Dropdown Menu-->
                            <div class="dropdown dropdown-inline">
                                <button type="button" class="btn btn-clean btn-sm btn-icon btn-icon-md" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                    <span class="svg-icon svg-icon-lg">
                                        <!--begin::Svg Icon | path:assets/media/svg/icons/Communication/Add-user.svg-->
                                        <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
                                            <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                                <polygon points="0 0 24 0 24 24 0 24" />
                                                <path d="M18,8 L16,8 C15.4477153,8 15,7.55228475 15,7 C15,6.44771525 15.4477153,6 16,6 L18,6 L18,4 C18,3.44771525 18.4477153,3 19,3 C19.5522847,3 20,3.44771525 20,4 L20,6 L22,6 C22.5522847,6 23,6.44771525 23,7 C23,7.55228475 22.5522847,8 22,8 L20,8 L20,10 C20,10.5522847 19.5522847,11 19,11 C18.4477153,11 18,10.5522847 18,10 L18,8 Z M9,11 C6.790861,11 5,9.209139 5,7 C5,4.790861 6.790861,3 9,3 C11.209139,3 13,4.790861 13,7 C13,9.209139 11.209139,11 9,11 Z" fill="#000000" fill-rule="nonzero" opacity="0.3" />
                                                <path d="M0.00065168429,20.1992055 C0.388258525,15.4265159 4.26191235,13 8.98334134,13 C13.7712164,13 17.7048837,15.2931929 17.9979143,20.2 C18.0095879,20.3954741 17.9979143,21 17.2466999,21 C13.541124,21 8.03472472,21 0.727502227,21 C0.476712155,21 -0.0204617505,20.45918 0.00065168429,20.1992055 Z" fill="#000000" fill-rule="nonzero" />
                                            </g>
                                        </svg>
                                        <!--end::Svg Icon-->
                                    </span>
                                </button>
                                <div class="dropdown-menu p-0 m-0 dropdown-menu-right dropdown-menu-md">
                                    <!--begin::Navigation-->
                                    <ul class="navi navi-hover py-5">
                                        <li class="navi-item">
                                            <a href="#" class="navi-link">
                                                <span class="navi-icon">
                                                    <i class="flaticon2-drop"></i>
                                                </span>
                                                <span class="navi-text">New Group</span>
                                            </a>
                                        </li>
                                        <li class="navi-item">
                                            <a href="#" class="navi-link">
                                                <span class="navi-icon">
                                                    <i class="flaticon2-list-3"></i>
                                                </span>
                                                <span class="navi-text">Contacts</span>
                                            </a>
                                        </li>
                                        <li class="navi-item">
                                            <a href="#" class="navi-link">
                                                <span class="navi-icon">
                                                    <i class="flaticon2-rocket-1"></i>
                                                </span>
                                                <span class="navi-text">Groups</span>
                                                <span class="navi-link-badge">
                                                    <span class="label label-light-primary label-inline font-weight-bold">new</span>
                                                </span>
                                            </a>
                                        </li>
                                        <li class="navi-item">
                                            <a href="#" class="navi-link">
                                                <span class="navi-icon">
                                                    <i class="flaticon2-bell-2"></i>
                                                </span>
                                                <span class="navi-text">Calls</span>
                                            </a>
                                        </li>
                                        <li class="navi-item">
                                            <a href="#" class="navi-link">
                                                <span class="navi-icon">
                                                    <i class="flaticon2-gear"></i>
                                                </span>
                                                <span class="navi-text">Settings</span>
                                            </a>
                                        </li>
                                        <li class="navi-separator my-3"></li>
                                        <li class="navi-item">
                                            <a href="#" class="navi-link">
                                                <span class="navi-icon">
                                                    <i class="flaticon2-magnifier-tool"></i>
                                                </span>
                                                <span class="navi-text">Help</span>
                                            </a>
                                        </li>
                                        <li class="navi-item">
                                            <a href="#" class="navi-link">
                                                <span class="navi-icon">
                                                    <i class="flaticon2-bell-2"></i>
                                                </span>
                                                <span class="navi-text">Privacy</span>
                                                <span class="navi-link-badge">
                                                    <span class="label label-light-danger label-rounded font-weight-bold">5</span>
                                                </span>
                                            </a>
                                        </li>
                                    </ul>
                                    <!--end::Navigation-->
                                </div>
                            </div>
                            <!--end::Dropdown Menu-->
                        </div>
                        <div class="text-center flex-grow-1">
                            <div class="text-dark-75 font-weight-bold font-size-h5">Matt Pears</div>
                            <div>
                                <span class="label label-dot label-success"></span>
                                <span class="font-weight-bold text-muted font-size-sm">Active</span>
                            </div>
                        </div>
                        <div class="text-right flex-grow-1">
                            <button type="button" class="btn btn-clean btn-sm btn-icon btn-icon-md" data-dismiss="modal">
                                <i class="ki ki-close icon-1x"></i>
                            </button>
                        </div>
                    </div>
                    <!--end::Header-->
                    <!--begin::Body-->
                    <div class="card-body">
                        <!--begin::Scroll-->
                        <div class="scroll scroll-pull" data-height="400" data-mobile-height="350">
                            <!--begin::Messages-->
                            <div class="messages">
                                <!--begin::Message In-->
                                <div class="d-flex flex-column mb-5 align-items-start">
                                    <div class="d-flex align-items-center">
                                        <div class="symbol symbol-circle symbol-40 mr-3">
                                            <img alt="Pic" src="assets/media/users/300_12.jpg" />
                                        </div>
                                        <div>
                                            <a href="#" class="text-dark-75 text-hover-primary font-weight-bold font-size-h6">Matt Pears</a>
                                            <span class="text-muted font-size-sm">2 Hours</span>
                                        </div>
                                    </div>
                                    <div class="mt-2 rounded p-5 bg-light-success text-dark-50 font-weight-bold font-size-lg text-left max-w-400px">How likely are you to recommend our company to your friends and family?</div>
                                </div>
                                <!--end::Message In-->
                                <!--begin::Message Out-->
                                <div class="d-flex flex-column mb-5 align-items-end">
                                    <div class="d-flex align-items-center">
                                        <div>
                                            <span class="text-muted font-size-sm">3 minutes</span>
                                            <a href="#" class="text-dark-75 text-hover-primary font-weight-bold font-size-h6">You</a>
                                        </div>
                                        <div class="symbol symbol-circle symbol-40 ml-3">
                                            <img alt="Pic" src="assets/media/users/300_21.jpg" />
                                        </div>
                                    </div>
                                    <div class="mt-2 rounded p-5 bg-light-primary text-dark-50 font-weight-bold font-size-lg text-right max-w-400px">Hey there, we’re just writing to let you know that you’ve been subscribed to a repository on GitHub.</div>
                                </div>
                                <!--end::Message Out-->
                                <!--begin::Message In-->
                                <div class="d-flex flex-column mb-5 align-items-start">
                                    <div class="d-flex align-items-center">
                                        <div class="symbol symbol-circle symbol-40 mr-3">
                                            <img alt="Pic" src="assets/media/users/300_21.jpg" />
                                        </div>
                                        <div>
                                            <a href="#" class="text-dark-75 text-hover-primary font-weight-bold font-size-h6">Matt Pears</a>
                                            <span class="text-muted font-size-sm">40 seconds</span>
                                        </div>
                                    </div>
                                    <div class="mt-2 rounded p-5 bg-light-success text-dark-50 font-weight-bold font-size-lg text-left max-w-400px">Ok, Understood!</div>
                                </div>
                                <!--end::Message In-->
                                <!--begin::Message Out-->
                                <div class="d-flex flex-column mb-5 align-items-end">
                                    <div class="d-flex align-items-center">
                                        <div>
                                            <span class="text-muted font-size-sm">Just now</span>
                                            <a href="#" class="text-dark-75 text-hover-primary font-weight-bold font-size-h6">You</a>
                                        </div>
                                        <div class="symbol symbol-circle symbol-40 ml-3">
                                            <img alt="Pic" src="assets/media/users/300_21.jpg" />
                                        </div>
                                    </div>
                                    <div class="mt-2 rounded p-5 bg-light-primary text-dark-50 font-weight-bold font-size-lg text-right max-w-400px">You’ll receive notifications for all issues, pull requests!</div>
                                </div>
                                <!--end::Message Out-->
                                <!--begin::Message In-->
                                <div class="d-flex flex-column mb-5 align-items-start">
                                    <div class="d-flex align-items-center">
                                        <div class="symbol symbol-circle symbol-40 mr-3">
                                            <img alt="Pic" src="assets/media/users/300_12.jpg" />
                                        </div>
                                        <div>
                                            <a href="#" class="text-dark-75 text-hover-primary font-weight-bold font-size-h6">Matt Pears</a>
                                            <span class="text-muted font-size-sm">40 seconds</span>
                                        </div>
                                    </div>
                                    <div class="mt-2 rounded p-5 bg-light-success text-dark-50 font-weight-bold font-size-lg text-left max-w-400px">You can unwatch this repository immediately by clicking here:
                                    <a href="#">https://github.com</a></div>
                                </div>
                                <!--end::Message In-->
                                <!--begin::Message Out-->
                                <div class="d-flex flex-column mb-5 align-items-end">
                                    <div class="d-flex align-items-center">
                                        <div>
                                            <span class="text-muted font-size-sm">Just now</span>
                                            <a href="#" class="text-dark-75 text-hover-primary font-weight-bold font-size-h6">You</a>
                                        </div>
                                        <div class="symbol symbol-circle symbol-40 ml-3">
                                            <img alt="Pic" src="assets/media/users/300_21.jpg" />
                                        </div>
                                    </div>
                                    <div class="mt-2 rounded p-5 bg-light-primary text-dark-50 font-weight-bold font-size-lg text-right max-w-400px">Discover what students who viewed Learn Figma - UI/UX Design. Essential Training also viewed</div>
                                </div>
                                <!--end::Message Out-->
                                <!--begin::Message In-->
                                <div class="d-flex flex-column mb-5 align-items-start">
                                    <div class="d-flex align-items-center">
                                        <div class="symbol symbol-circle symbol-40 mr-3">
                                            <img alt="Pic" src="assets/media/users/300_12.jpg" />
                                        </div>
                                        <div>
                                            <a href="#" class="text-dark-75 text-hover-primary font-weight-bold font-size-h6">Matt Pears</a>
                                            <span class="text-muted font-size-sm">40 seconds</span>
                                        </div>
                                    </div>
                                    <div class="mt-2 rounded p-5 bg-light-success text-dark-50 font-weight-bold font-size-lg text-left max-w-400px">Most purchased Business courses during this sale!</div>
                                </div>
                                <!--end::Message In-->
                                <!--begin::Message Out-->
                                <div class="d-flex flex-column mb-5 align-items-end">
                                    <div class="d-flex align-items-center">
                                        <div>
                                            <span class="text-muted font-size-sm">Just now</span>
                                            <a href="#" class="text-dark-75 text-hover-primary font-weight-bold font-size-h6">You</a>
                                        </div>
                                        <div class="symbol symbol-circle symbol-40 ml-3">
                                            <img alt="Pic" src="assets/media/users/300_21.jpg" />
                                        </div>
                                    </div>
                                    <div class="mt-2 rounded p-5 bg-light-primary text-dark-50 font-weight-bold font-size-lg text-right max-w-400px">Company BBQ to celebrate the last quater achievements and goals. Food and drinks provided</div>
                                </div>
                                <!--end::Message Out-->
                            </div>
                            <!--end::Messages-->
                        </div>
                        <!--end::Scroll-->
                    </div>
                    <!--end::Body-->
                    <!--begin::Footer-->
                    <div class="card-footer align-items-center">
                        <!--begin::Compose-->
                        <textarea class="form-control border-0 p-0" rows="2" placeholder="Type a message"></textarea>
                        <div class="d-flex align-items-center justify-content-between mt-5">
                            <div class="mr-3">
                                <a href="#" class="btn btn-clean btn-icon btn-md mr-1">
                                    <i class="flaticon2-photograph icon-lg"></i>
                                </a>
                                <a href="#" class="btn btn-clean btn-icon btn-md">
                                    <i class="flaticon2-photo-camera icon-lg"></i>
                                </a>
                            </div>
                            <div>
                                <button type="button" class="btn btn-primary btn-md text-uppercase font-weight-bold chat-send py-2 px-6">Send</button>
                            </div>
                        </div>
                        <!--begin::Compose-->
                    </div>
                    <!--end::Footer-->
                </div>
                <!--end::Card-->
            </div>
        </div>
    </div>
    <!--end::Chat Panel-->
    
@endsection
@section('scripts')
    <script>
        $(document).ready(function(){
            $('.edit-member-btn').click(function(){
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

            // var btn = $('.member-index');
            // var id = btn.attr('id').replace( /^\D+/g, '');
            // var colors = ['primary', 'warning', 'danger', 'success']
            // if(id == 1 ){
            //     $('.member-index#member_' + id).addClass('btn-light-'+ colors[Math.floor(Math.random() * colors.length)]);
            //     console.log(Math.floor(Math.random() * colors.length));
            // }
            // if(id == 2 ){
            //     $('.member-index#member_' + id).addClass('btn-light-'+ colors[Math.floor(Math.random() * colors.length)]);
            //     console.log(Math.floor(Math.random() * colors.length));
            // }
          
        })
    </script>  
	<!--begin::Page Scripts(used by this page)-->
    {{-- <script src="{{asset('assets/js/datatablesteam.js')}}"></script> --}}
    <!-- Open Ajax -->
    <script>
      
    </script>
    <!-- Close Ajax -->
@endsection
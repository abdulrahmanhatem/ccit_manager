


@extends('layouts.app')
@section('title', $project->name)
@section('styles')
    <link href="{{asset('assets/plugins/custom/kanban/kanban.bundle.css')}}"  rel="stylesheet" type="text/css" >
@endsection
@section('content')
    <!--begin::Subheader-->
    <div class="subheader min-h-lg-175px pt-5 pb-7 subheader-transparent" id="kt_subheader">
        <div class="container d-flex align-items-center justify-content-between flex-wrap flex-sm-nowrap">
            <!--begin::Details-->
            <div class="d-flex align-items-center flex-wrap mr-2">
                <!--begin::Heading-->
                <div class="d-flex flex-column">
                    <!--begin::Title-->
                <h2 class="text-white font-weight-bold my-2 mr-5">{{$project->name}}</h2>
                    <!--end::Title-->
                    <!--begin::Breadcrumb-->
                    @if (!auth()->user()->isCustomer())
                        <div class="d-flex align-items-center font-weight-bold my-2">
                            <!--begin::Item-->
                            <a href="#" class="opacity-75 hover-opacity-100">
                                <i class="flaticon2-shelter text-white icon-1x"></i>
                            </a>
                            <!--end::Item-->
                            
                            @if (auth()->user()->isAdmin())
                                <!--begin::Item-->
                                <span class="label label-dot label-sm bg-white opacity-75 mx-3"></span>
                                <a href="{{url('/')}}" class="text-white text-hover-white opacity-75 hover-opacity-100">Dashboard</a>
                                <!--end::Item-->
                            @endif
                           
                            @if (auth()->user()->isTeamMember() || auth()->user()->isAdmin())
                                <!--begin::Item-->
                                <span class="label label-dot label-sm bg-white opacity-75 mx-3"></span>
                                <a href="{{url('/projects')}}" class="text-white text-hover-white opacity-75 hover-opacity-100">Projects</a>
                                <!--end::Item-->
                            @endif
                            <!--begin::Item-->
                            <span class="label label-dot label-sm bg-white opacity-75 mx-3"></span>
                            <a href="{{url('/projects/'. $project->id)}}" class="text-white text-hover-white opacity-75 hover-opacity-100">{{$project->name}}</a>
                            <!--end::Item-->
                        </div>
                    @elseif(auth()->user()->isCustomer())
                        <!--begin::Item-->
                        <span class="label label-dot label-sm bg-white opacity-75 mx-3"></span>
                            <a href="{{url('customers/'. $project->user->id)}}" class="text-white text-hover-white opacity-75 hover-opacity-100">{{$project->user->name}}</a>
                        <!--end::Item--> 
                    @endif
                    <!--end::Breadcrumb-->
                </div>
                <!--end::Heading-->
            </div>
            <!--end::Details-->
        </div>
    </div>
    <!--end::Subheader-->
    <!--begin::Entry-->
    <div class="container d-flex flex-column-fluid">
        <!--begin::Container-->
        <div class="container-fluid">
            <!--begin::Card-->
            <div class="card card-custom gutter-b ribbon ribbon-top">
                @if ($project->priority == 1)
                    <div class="ribbon-target bg-danger font-weight-bolder" style="top: -2px; right: 20px;">Urgent</div>
                @elseif ($project->priority == 2)
                    <div class="ribbon-target bg-primary font-weight-bolder" style="top: -2px; right: 20px;">Important</div>
                @elseif ($project->priority == 3)
                    <div class="ribbon-target bg-success font-weight-bolder" style="top: -2px; right: 20px;">Normal</div>
                @elseif ($project->priority == 4)
                    <div class="ribbon-target bg-warning font-weight-bolder" style="top: -2px; right: 20px;">Low</div>
                @endif
                
                
              
                <div class="card-body  ribbon ribbon-clip ribbon-right">
                   
                    <div class="d-flex">
                        <!--begin: Pic-->
                        <div class="flex-shrink-0 mr-7 mt-lg-0 mt-3">
                            @if (Helper::fileExists($project->avatar, '/uploads/images/logos/projects'))
                                <div class="symbol symbol-50 symbol-lg-120">
                                    <img class="" src="{{asset('uploads/images/logos/projects/'.$project->avatar)}}" alt="photo" />
                                </div>
                            @else
                                <div class="symbol symbol-lg-120 symbol-sm flex-shrink-0 symbol-light-success">
                                    <span class="symbol-label font-size-h4">
                                        {{$project->name[0]}}
                                    </span>
                                </div>
                            @endif
                            <div class="symbol symbol-50 symbol-lg-120 symbol-primary d-none">
                                <span class="font-size-h3 symbol-label font-weight-boldest">JM</span>
                            </div>
                        </div>
                        <!--end: Pic-->
                        <!--begin: Info-->
                        <div class="flex-grow-1">
                            <!--begin: Title-->
                            <div class="d-flex align-items-center justify-content-between flex-wrap">
                                <div class="mr-3">
                                    <!--begin::Name-->
                                    <a href="#" class="d-flex align-items-center text-dark text-hover-primary font-size-h5 font-weight-bold mr-3">{{$project->name}}
                                    <i class="flaticon2-correct text-success icon-md ml-2"></i></a>
                                    <!--end::Name-->
                                    <!--begin::Contacts-->
                                    <div class="d-flex flex-wrap my-2">
                                        <a href="{{url('customers/'. $project->user->id)}}" class="text-muted text-hover-primary font-weight-bold mr-lg-9 mr-5 mb-lg-0 mb-2">
                                            <span class="svg-icon svg-icon-md svg-icon-gray-500 mr-1"><!--begin::Svg Icon | path:C:\wamp64\www\keenthemes\themes\metronic\theme\html\demo2\dist/../src/media/svg/icons\General\User.svg--><svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
                                                <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                                    <polygon points="0 0 24 0 24 24 0 24"/>
                                                    <path d="M12,11 C9.790861,11 8,9.209139 8,7 C8,4.790861 9.790861,3 12,3 C14.209139,3 16,4.790861 16,7 C16,9.209139 14.209139,11 12,11 Z" fill="#000000" fill-rule="nonzero" opacity="0.3"/>
                                                    <path d="M3.00065168,20.1992055 C3.38825852,15.4265159 7.26191235,13 11.9833413,13 C16.7712164,13 20.7048837,15.2931929 20.9979143,20.2 C21.0095879,20.3954741 20.9979143,21 20.2466999,21 C16.541124,21 11.0347247,21 3.72750223,21 C3.47671215,21 2.97953825,20.45918 3.00065168,20.1992055 Z" fill="#000000" fill-rule="nonzero"/>
                                                </g>
                                            </svg><!--end::Svg Icon--></span>
                                       
                                            {{$project->user->name}}
                                        </a>
                                        @if (auth()->user()->isAdmin() || auth()->user()->isPM())
                                            <a data-toggle="modal" data-target="#edit-manager-{{$project->id}}" class="cursor-pointer text-muted text-hover-primary font-weight-bold mr-lg-8 mr-5 mb-lg-0 mb-2">
                                                <span class="svg-icon svg-icon-md svg-icon-gray-500 mr-1"><!--begin::Svg Icon | path:C:\wamp64\www\keenthemes\themes\metronic\theme\html\demo2\dist/../src/media/svg/icons\Communication\Shield-user.svg--><svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
                                                    <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                                        <rect x="0" y="0" width="24" height="24"/>
                                                        <path d="M4,4 L11.6314229,2.5691082 C11.8750185,2.52343403 12.1249815,2.52343403 12.3685771,2.5691082 L20,4 L20,13.2830094 C20,16.2173861 18.4883464,18.9447835 16,20.5 L12.5299989,22.6687507 C12.2057287,22.8714196 11.7942713,22.8714196 11.4700011,22.6687507 L8,20.5 C5.51165358,18.9447835 4,16.2173861 4,13.2830094 L4,4 Z" fill="#000000" opacity="0.3"/>
                                                        <path d="M12,11 C10.8954305,11 10,10.1045695 10,9 C10,7.8954305 10.8954305,7 12,7 C13.1045695,7 14,7.8954305 14,9 C14,10.1045695 13.1045695,11 12,11 Z" fill="#000000" opacity="0.3"/>
                                                        <path d="M7.00036205,16.4995035 C7.21569918,13.5165724 9.36772908,12 11.9907452,12 C14.6506758,12 16.8360465,13.4332455 16.9988413,16.5 C17.0053266,16.6221713 16.9988413,17 16.5815,17 C14.5228466,17 11.463736,17 7.4041679,17 C7.26484009,17 6.98863236,16.6619875 7.00036205,16.4995035 Z" fill="#000000" opacity="0.3"/>
                                                    </g>
                                                </svg><!--end::Svg Icon--></span>
                                                {{-- {{Helper::getUserByID($project->project)}} --}}
                                                
                                                @if(!empty($project->manager()))
                                                    {{$project->manager()->name}}
                                                @else 
                                                    None
                                                @endif
                                                
                                                

                                                {{-- PR Manager --}}
                                            </a>
                                        @endif
                                        <a href="#" class="text-muted text-hover-primary font-weight-bold">
                                        <span class="svg-icon svg-icon-md svg-icon-gray-500 mr-1">
                                            <!--begin::Svg Icon | path:assets/media/svg/icons/Map/Marker2.svg-->
                                            <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
                                                <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                                    <rect x="0" y="0" width="24" height="24" />
                                                    <path d="M9.82829464,16.6565893 C7.02541569,15.7427556 5,13.1079084 5,10 C5,6.13400675 8.13400675,3 12,3 C15.8659932,3 19,6.13400675 19,10 C19,13.1079084 16.9745843,15.7427556 14.1717054,16.6565893 L12,21 L9.82829464,16.6565893 Z M12,12 C13.1045695,12 14,11.1045695 14,10 C14,8.8954305 13.1045695,8 12,8 C10.8954305,8 10,8.8954305 10,10 C10,11.1045695 10.8954305,12 12,12 Z" fill="#000000" />
                                                </g>
                                            </svg>
                                            <!--end::Svg Icon-->
                                        </span>{{Helper::getCountryByKey($project->user->country)}}</a>
                                    </div>
                                    <!--end::Contacts-->
                                </div>
                                <div class="my-lg-0 my-1">
                                    @if (auth()->user()->isAdmin() || auth()->user()->isCustomer())
                                        <a  data-toggle="modal" data-target="#chat_modal"class="btn btn-sm btn-light-success font-weight-bolder text-uppercase mr-3">Chat</a>
                                    @endif
                                    @if(auth()->user()->isAdmin() || auth()->user()->isPM())
                                        <a  data-toggle="modal" data-target="#edit-project-{{$project->id}}"class="btn btn-sm btn-light-warning font-weight-bolder text-uppercase mr-3 edit-project-btn">Edit</a>
                                        <a  data-toggle="modal" data-target="#cancel-project-{{$project->id}}" class="btn btn-sm btn-light-danger font-weight-bolder text-uppercase">Cancel</a>
                                    @endif
                                 </div>
                            </div>
                            <!--end: Title-->
                            <!--begin: Content-->
                            <div class="d-block align-items-center flex-wrap justify-content-between">
                                <div class=" font-weight-bold text-dark-50 py-5 py-lg-2 mr-5 w-50 d-block">
                                   {{$project->des}}
                            </div>
                                <div class="d-flex flex-wrap align-items-center py-2">
                                    <div class="d-flex align-items-center mr-10">
                                        <div class="mr-6">
                                            <div class="font-weight-bold mb-2">Start Date</div>
                                            <span class="btn btn-sm btn-text btn-light-primary text-uppercase font-weight-bold">{{date('d M, Y', strtotime($project->start_date))}}</span>
                                        </div>
                                        <div class="">
                                            <div class="font-weight-bold mb-2">Due Date</div>
                                            <span class="btn btn-sm btn-text btn-light-danger text-uppercase font-weight-bold">{{date('d M, Y', strtotime($project->end_date))}}</span>
                                        </div>
                                    </div>
                                    <div class=" flex-shrink-0 w-150px w-xl-300px mt-4 mt-sm-0 d-block w-25">
                                        <span class="font-weight-bold">Progress</span>
                                        @if ($project->progress < 20)
                                            <div class="d-flex flex-column w-100 mr-2">
                                                <div class="d-flex align-items-center justify-content-between mb-2">
                                                </div>
                                                <div class="progress progress-xs w-100">
                                                <div class="progress-bar bg-danger" role="progressbar" style="width: 5%;" aria-valuenow="{{$project->progress}}" aria-valuemin="0" aria-valuemax="100"></div>
                                                </div><span class="font-weight-bolder text-dark">{{$project->progress}}%</span>
                                            </div>
                                        @elseif ($project->progress <= 40)
                                            <div class="d-flex flex-column w-100 mr-2">
                                                <div class="d-flex align-items-center justify-content-between mb-2">
                                                    
                                                </div>
                                                <div class="progress progress-xs w-100">
                                                <div class="progress-bar bg-primary" role="progressbar" style="width: {{$project->progress}}%;" aria-valuenow="{{$project->progress}}" aria-valuemin="0" aria-valuemax="100"></div>
                                                </div><span class="font-weight-bolder text-dark">{{$project->progress}}%</span>
                                            </div>
                                        @elseif ($project->progress <= 60)
                                            <div class="d-flex flex-column w-100 mr-2">
                                                <div class="d-flex align-items-center justify-content-between mb-2">
                                                    
                                                </div>
                                                <div class="progress progress-xs w-100">
                                                <div class="progress-bar bg-info" role="progressbar" style="width: {{$project->progress}}%;" aria-valuenow="{{$project->progress}}" aria-valuemin="0" aria-valuemax="100"></div>
                                                </div><span class="font-weight-bolder text-dark">{{$project->progress}}%</span>
                                            </div>
                                        @elseif ($project->progress <= 80)
                                            <div class="d-flex flex-column w-100 mr-2">
                                                <div class="d-flex align-items-center justify-content-between mb-2">
                                                    
                                                </div>
                                                <div class="progress progress-xs w-100">
                                                <div class="progress-bar bg-warning" role="progressbar" style="width: {{$project->progress}}%;" aria-valuenow="{{$project->progress}}" aria-valuemin="0" aria-valuemax="100"></div>
                                                </div>
                                                <span class="font-weight-bolder text-dark">{{$project->progress}}%</span>
                                            </div>
                                        @elseif ($project->progress <= 100)
                                            <div class="d-flex flex-column w-100 mr-2">
                                                <div class="d-flex align-items-center justify-content-between mb-2">
                                                    <span class="text-muted mr-2 font-size-sm font-weight-bold"></span>
                                                    
                                                </div>
                                                <div class="progress progress-xs w-100">
                                                <div class="progress-bar bg-success" role="progressbar" style="width: {{$project->progress}}%;" aria-valuenow="{{$project->progress}}" aria-valuemin="0" aria-valuemax="100"></div>
                                                </div>
                                                <span class="font-weight-bolder text-dark">{{$project->progress}}%</span>
                                            </div>
                                        @endif
                                    </div>
                                    <div class="d-flex flex-wrap align-items-center col-lg-5">
                                        @if ($project->status == 0)
                                            <div class="bg-danger font-weight-bolder text-white p-2 ml-auto" style="border-radius: 5px">Pending</div>
                                        @elseif ($project->status == 1)
                                            <div class="bg-primary font-weight-bolder text-white p-2 ml-auto" style="border-radius: 5px">In Progress</div>
                                        @elseif ($project->status == 2)
                                            <div class="bg-warning font-weight-bolder text-white p-2 ml-auto" style="border-radius: 5px">Waiting Customer</div>
                                        @elseif ($project->status == 3)
                                            <div class="bg-success font-weight-bolder text-white p-2 ml-auto" style="border-radius: 5px">Completed</div>
                                        @elseif ($project->status == 4)
                                            <div class="bg-dark font-weight-bolder text-white p-2 ml-auto" style="border-radius: 5px">Canceled</div>
                                        @endif
                                    </div>
                                </div>
                            </div>
                            <!--end: Content-->
                        </div>
                        <!--end: Info-->
                    </div>
                    <div class="separator separator-solid my-7"></div>
                    <!--begin: Items-->
                    <div class="d-flex align-items-center flex-wrap">
                        @auth
                            @if (auth()->user()->isAdmin())
                                <!--begin: Item-->
                                <div class="d-flex align-items-center flex-lg-fill mr-5 my-1">
                                    <span class="mr-4">
                                        <i class="flaticon-piggy-bank icon-2x text-muted font-weight-bold"></i>
                                    </span>
                                    <div class="d-flex flex-column text-dark-75">
                                        <span class="font-weight-bolder font-size-sm">Earnings</span>
                                        <span class="font-weight-bolder font-size-h5">
                                        <span class="text-dark-75 font-weight-bold pr-1">SAR</span><span class="text-success font-weight-bold pr-1">{{$project->earnings}}</span>
                                    </div>
                                </div>
                                <!--end: Item-->
                                <!--begin: Item-->
                                <div class="d-flex align-items-center flex-lg-fill mr-5 my-1">
                                    <span class="mr-4">
                                        <i class="flaticon-confetti icon-2x text-muted font-weight-bold"></i>
                                    </span>
                                    <div class="d-flex flex-column text-dark-75">
                                        <span class="font-weight-bolder font-size-sm">Expenses</span>
                                        <span class="font-weight-bolder font-size-h5">
                                        <span class="text-dark-75 font-weight-bold pr-1">SAR</span><span class="text-danger font-weight-bold pr-1">{{$project->expenses}}</span>
                                    </div>
                                </div>
                                <!--end: Item-->
                                <!--begin: Item-->
                                <div class="d-flex align-items-center flex-lg-fill mr-5 my-1">
                                    <span class="mr-4">
                                        <i class="flaticon-pie-chart icon-2x text-muted font-weight-bold"></i>
                                    </span>
                                    <div class="d-flex flex-column text-dark-75">
                                        <span class="font-weight-bolder font-size-sm">Net</span>
                                        <span class="font-weight-bolder font-size-h5">
                                            @if (($project->earnings - $project->expenses) >= 0)
                                                <span class="text-dark-75 font-weight-bold pr-1">SAR</span><span class="text-success font-weight-bold pr-1">{{$project->earnings - $project->expenses}}</span>
                                            @else
                                                <span class="text-dark-75 font-weight-bold pr-1">SAR</span><span class="text-danger font-weight-bold pr-1">{{$project->earnings - $project->expenses}}</span>
                                            @endif
                                    </div>
                                </div>
                                <!--end: Item-->
                            @endif
                        @endauth
                        
                        <!--begin: Item-->
                        <div class="d-flex align-items-center flex-lg-fill mr-5 my-1">
                            <span class="mr-4">
                                <i class="flaticon-file-2 icon-2x text-muted font-weight-bold"></i>
                            </span>
                            <div class="d-flex flex-column flex-lg-fill">
                                <span class="text-dark-75 font-weight-bolder font-size-sm">{{count($project->tasks) > 0 ? count($project->tasks). ' Tasks' : 'No Tasks Yet' }}</span>
                                @if(count($project->tasks) > 0)
                                    <a href="#tasks" class="text-primary font-weight-bolder">View</a>
                                @endif
                            </div>
                        </div>
                        <!--end: Item-->
                        <!--begin: Item-->
                        <div class="d-flex align-items-center flex-lg-fill mr-5 my-1">
                            <span class="mr-4">
                                <i class="flaticon-chat-1 icon-2x text-muted font-weight-bold"></i>
                            </span>
                            <div class="d-flex flex-column">
                                <span class="text-dark-75 font-weight-bolder font-size-sm">{{count($project->messeges)}} Comments</span>
                                <a data-toggle="modal" data-target="#chat_modal" class="text-primary font-weight-bolder cursor-pointer">View</a>
                            </div>
                        </div>
                        <!--end: Item-->
                        <!--begin: Item-->
                        <div class="d-flex align-items-center flex-lg-fill my-1">
                            @if (count(Helper::projectTeam($project->id)) > 0)
                                @if (!auth()->user()->isCustomer())
                                    <span class="mr-4">
                                        <i class="flaticon-network icon-2x text-muted font-weight-bold"></i>
                                    </span>
                                    <div class="symbol-group symbol-hover">
                                        @foreach (Helper::projectTeam($project->id) as $member)
                                            @if (Helper::fileExists($member->avatar, '/uploads/images/avatars'))
                                                <a href="{{url('team/'. $member->id)}}" class="symbol symbol-30 symbol-circle" data-toggle="tooltip" title="{{$member->name}}">
                                                    <img class="h-75 align-self-end" src="{{asset('uploads/images/avatars/'.$member->avatar)}}" alt="photo"/>
                                                </a>
                                            @else
                                                <a href="{{url('team/'. $member->id)}}" class="symbol symbol-30 symbol-circle" data-toggle="tooltip" title="{{$member->name}}">
                                                    <span class="symbol-label font-size-h4">
                                                        {{$member->name[0]}}
                                                    </span>
                                                </a>
                                            @endif
                                        @endforeach
                                    </div>
                                @endif
                            @endif
                              
                                {{-- <div class="symbol symbol-30 symbol-circle symbol-light">
                                    <span class="symbol-label font-weight-bold">5+</span>
                                </div> --}}
                           
                        </div>
                        <!--end: Item-->
                    </div>
                    <!--begin: Items-->
                </div>
            </div>
            <!--end::Card-->
            <!--begin::Row-->
            <div class="row">
                <div class="col-lg-4">
                    <!--begin::Charts Widget 3-->
                    <div class="card card-custom card-stretch gutter-b service-card">
                        <!--begin::Header-->
                        <div class="card-header h-auto border-0">
                            <div class="card-title py-5">
                                <h3 class="card-label">
                                    <span class="d-block text-dark font-weight-bolder">Main Services</span>
                                    @if (!empty($project->services))
                                        <span class="d-block text-muted mt-2 font-size-sm">More than {{ !empty($project->services) ? count(json_decode($project->services)). '+' : 0 }} Servicess</span>
                                    @else 
                                        <span class="d-block text-muted mt-2 font-size-sm">No Services Available</span>
                                    @endif
                                </h3>
                            </div>
                            <div class="card-toolbar">
                                <div class="nav-dark-75 unstyled-list">
                                    @if(!empty($project->services))
                                        @foreach (json_decode($project->services) as $service)
                                        <div class="nav-item">
                                            <a class="nav-link py-2">
                                                @if ($service == 'E-Commerce')
                                                    <i class="fas fa-shopping-cart text-dark-75" style="min-width: 25px;"></i>
                                                @elseif($service == 'Mobile Application (Android - IOS)')
                                                    <i class="fas fa-mobile-alt text-dark-75" style="min-width: 25px;"></i>
                                                @elseif($service == 'Custom Web System')
                                                    <i class="fas fa-paint-brush text-dark-75" style="min-width: 25px;"></i>
                                                @elseif($service == 'Website')
                                                    <i class="fas fa-tv text-dark-75" style="min-width: 25px;"></i>
                                                @elseif($service == 'Development & Operations')
                                                    <i class="fas fa-solar-panel text-dark-75" style="min-width: 25px;"></i>
                                                @elseif($service == 'Technical Consultation')
                                                    <i class="fas fa-pen-fancy text-dark-75" style="min-width: 25px;"></i>
                                                @endif
                                                <span class="nav-text font-size-sm">{{$service}}</span>
                                            </a>
                                        </div>
                                        @endforeach
                                    @endif
                                </div>
                            </div>
                        </div>
                        <!--end::Header-->
                        <!--begin::Body-->
                        {{-- <div class="card-body">
                            <div id="kt_charts_widget_3_chart"></div>
                        </div>
                        <!--end::Body--> --}}
                    </div>
                    <!--end::Charts Widget 3-->
                </div>
                <div class="col-lg-8">
                    <!--begin::Advance Table Widget 3-->
                    <div class="card card-custom card-stretch gutter-b">
                        <!--begin::Header-->
                        <div class="card-header border-0 py-5">
                            <h3 class="card-title align-items-start flex-column">
                                <span class="card-label font-weight-bolder text-dark">Technologies</span>
                                @if (!empty($project->technologies))
                                    <span class="d-block text-muted mt-2 font-size-sm">More than {{ !empty($project->technologies) ? count(Helper::getProjectTechnology($project->technologies)). '+' : 0 }} technologies</span>
                                @else 
                                    <span class="d-block text-muted mt-2 font-size-sm">No Technologies Available</span>
                                @endif
                            </h3>
                        </div>
                        <!--end::Header-->
                        <!--begin::Body-->
                        <div class="card-body pt-0 pb-3">
                            <!--begin::Table-->
                            <div class="row">
                                @if(!empty($project->technologies))
                                    @foreach (Helper::getProjectTechnology($project->technologies) as $technology)
                                        <div class="col-lg-3 col-md-4 col-sm-6 col-xs-12">
                                            <div class="card card-custom gutter-b tech-card" >
                                                <div class="card-body">
                                                    @if (Helper::fileExists($technology->avatar, 'uploads/images/logos/technologies' ))
                                                        <img class="image-input-wrapper" src="{{asset('uploads/images/logos/technologies/'.$technology->avatar)}}">
                                                    @else 
                                                        <img class="image-input-wrapper" src="{{asset('assets/media/stock-600x600/img-12.jpg')}}">
                                                    @endif
                                                    <div class="text-dark font-weight-bolder font-size-h6 text" >{{ucwords($technology->name)}}</div>
                                                </div>
                                            </div>
                                        </div>
                                    @endforeach
                                @endif
                            </div>
                        </div>
                        <!--end::Body-->
                    </div>
                    <!--end::Advance Table Widget 3-->
                </div>
            </div>
            <!--end::Row-->
            <!--begin::Row-->
            <div class="row" id="tasks">
                @if (!auth()->user()->isCustomer())
                    <div class="col-lg-12">
                        <!--end::Advance Table Widget 5-->
                        <div class="card card-custom gutter-b">
                            <div class="card-header">
                                <div class="card-title">
                                    <h3 class="card-label">Task Status</h3>
                                </div>
                            </div>
                            <div class="card-body">
                                <div id="kt_kanban_2"></div>
                                {!! Form::open(['action'=> ['ProjectController@update', $project->id], 'method'=>'POST', 'id' => 'task_status_form', 'enctype' =>'multipart/form-data', ' novalidate', 'class' => 'form text-right'])!!}
                                <form id="task_status_form" action="#">
                                    <input name="pending" type="text" hidden="hidden" id="pending_ids">
                                    <input name="waiting"  type="text" hidden="hidden" id="waiting_ids">
                                    <input name="progress"  type="text" hidden="hidden" id="progress_ids">
                                    <input name="completed"  type="text" hidden="hidden" id="completed_ids">
                                    <input name="kanban_tasks_status" hidden="hidden">
                                    {!! Form::hidden('_method', 'PUT') !!}
                                    {{-- <button type="submit" class="btn btn-success" id="task_status_form_submit">Change</button> --}}
                                </form>
                            </div>
                        </div>
                    </div>
                @endif
                <div class="col-lg-4">
                    <!--begin::Mixed Widget 14-->
                    <div class="card card-custom gutter-b">
                        <!--begin::Header-->
                        <div class="card-header border-0 pt-5">
                            <h3 class="card-title font-weight-bolder">Task Progress</h3>
                        </div>
                        <!--end::Header-->
                        <!--begin::Body-->
                        <div class="card-body d-flex flex-column">
                            <div class="flex-grow-1">
                                <div id="tasks_progress_chart" style="height: 200px"></div>
                            </div>
                            <div class="pt-5">
                                <p class="text-center font-weight-normal font-size-lg pb-7">Notes: Current sprint requires stakeholders
                                <br />to approve newly amended policies</p>
                                <a href="#" class="btn btn-success btn-shadow-hover font-weight-bolder w-100 py-3">Generate Report</a>
                            </div>
                        </div>
                        <!--end::Body-->
                    </div>
                    <!--end::Mixed Widget 14-->
                </div>
                <div class="col-lg-8">
                     <!--begin::Advance Table Widget 5-->
                     <div class="card card-custom gutter-b">
                        <!--begin::Header-->
                        <div class="card-header border-0 py-5">
                            <h3 class="card-title align-items-start flex-column">
                                <span class="card-label font-weight-bolder text-dark">Tasks</span>
                            <span class="text-muted mt-3 font-weight-bold font-size-sm">More than {{count($project->tasks)}}+ tasks</span>
                            </h3>
                            @if (!auth()->user()->isCustomer())
                                <div class="card-toolbar">
                                    <a data-toggle="modal" data-target="#new-task" class="btn btn-info font-weight-bolder font-size-sm">New Task</a>
                                </div>
                            @endif
                        </div>
                        <!--end::Header-->
                        <!--begin::Body-->
                        <div class="card-body py-0">
                            <!--begin::Table-->
                            <div class="table-responsive">
                                <table class="table table-head-custom table-vertical-center" id="kt_advance_table_widget_2">
                                    <thead>
                                        <tr class="text-uppercase">
                                            <th class="pl-0" style="min-width: 50px">ID</th>
                                            <th class="pl-0" style="min-width: 200px">Task </th>
                                            <th style="min-width: 80px">Start Date</th>
                                            <th style="min-width: 80px">End Date</th>
                                            <th style="min-width: 150px">status</th>
                                            @if (!auth()->user()->isCustomer())
                                                <th class="pr-0 text-right" style="min-width: 100px">action</th>
                                            @endif
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @if (count($project->tasks) > 0)
                                        @foreach ($project->tasks as $task)
                                            <tr>
                                                <td class="pl-0">
                                                    @if (!auth()->user()->isCustomer())
                                                        <a class="text-dark-75 mt-3 d-block" href="{{url('tasks/'. $task->id)}}">
                                                            {{$task->id}}
                                                        </a>
                                                    @else 
                                                        {{$task->id}}
                                                    @endif
                                                </td>
                                                <td>
                                                    @if (!auth()->user()->isCustomer())
                                                        <a class="text-dark-75 mt-3 d-block font-weight-bolder font-size-lg" href="{{url('tasks/'. $task->id)}}">
                                                            {{ucwords($task->name)}}
                                                        </a>
                                                    @else 
                                                        <p class="text-dark-75 mt-3 d-block font-weight-bolder font-size-lg mb-0" >
                                                            {{ucwords($task->name)}}
                                                        </p>
                                                    @endif
                                                    <span class="text-muted font-weight-bold">{{ucwords($task->project->name)}}</span>
                                                </td>
                                                <td>
                                                    <span class="text-dark-75 font-weight-bolder d-block font-size-lg">{{ date('d M', strtotime($task->start_at)) }}</span>
                                                </td>
                                                <td>
                                                    <span class="text-dark-75 font-weight-bolder d-block font-size-lg">{{ date('d M', strtotime($task->end_at)) }}</span>
                                                </td>
                                                <td class="pt-5">
                                                    @if ($task->status == 0)
                                                        <span class="label label-inline label-light-danger font-weight-bold">
                                                            Pending
                                                        </span>
                                                    @elseif ($task->status == 1)
                                                        <span class="label label-inline label-light-primary font-weight-bold">
                                                            In Progress
                                                        </span>
                                                    @elseif ($task->status == 2)
                                                        <span class="label label-inline label-light-warning  font-weight-bold">
                                                            Waiting Customer
                                                        </span>
                                                    @elseif ($task->status == 3)
                                                        <span class="label label-inline label-light-success font-weight-bold">
                                                            
                                                            Completed
                                                        </span>
                                                    @endif
                                                </td>
                                                @if (!auth()->user()->isCustomer())
                                                <td class="text-right">
                                                    <a class="btn btn-sm btn-clean btn-icon" title="Show" href="{{url('tasks/'.$task->id)}}">
                                                        <span class="svg-icon svg-icon-primary svg-icon-2x"><!--begin::Svg Icon | path:C:\wamp64\www\keenthemes\themes\metronic\theme\html\demo2\dist/../src/media/svg/icons\General\Settings-1.svg--><svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
                                                            <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                                                <rect x="0" y="0" width="24" height="24"/>
                                                                <path d="M7,3 L17,3 C19.209139,3 21,4.790861 21,7 C21,9.209139 19.209139,11 17,11 L7,11 C4.790861,11 3,9.209139 3,7 C3,4.790861 4.790861,3 7,3 Z M7,9 C8.1045695,9 9,8.1045695 9,7 C9,5.8954305 8.1045695,5 7,5 C5.8954305,5 5,5.8954305 5,7 C5,8.1045695 5.8954305,9 7,9 Z" fill="#000000"/>
                                                                <path d="M7,13 L17,13 C19.209139,13 21,14.790861 21,17 C21,19.209139 19.209139,21 17,21 L7,21 C4.790861,21 3,19.209139 3,17 C3,14.790861 4.790861,13 7,13 Z M17,19 C18.1045695,19 19,18.1045695 19,17 C19,15.8954305 18.1045695,15 17,15 C15.8954305,15 15,15.8954305 15,17 C15,18.1045695 15.8954305,19 17,19 Z" fill="#000000" opacity="0.3"/>
                                                            </g>
                                                        </svg><!--end::Svg Icon-->
                                                        </span>
                                                    </a>
                                                    
                                                    <a class="btn btn-sm btn-clean btn-icon edit-task-btn" title="Edit" data-toggle="modal" data-target="#edit-task-{{$task->id}}">
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
                                                </td>
                                                @endif
                                            </tr>
                                        @endforeach
                                        @else
                                            
                                        @endif
                                    </tbody>
                                </table>
                            </div>
                            <!--end::Table-->
                        </div>
                        <!--end::Body-->
                    </div>
                    <!--end::Advance Table Widget 5-->
                </div>
                
            </div>
            @if (!auth()->user()->isCustomer())
                <div class="row">
                    <div class="card card-custom gutter-b w-100">
                        <div class="card-header">
                            <div class="card-title">
                                <h3 class="card-label">Notes</h3>
                            </div>
                        </div>
                        <div class="card-body">
                            <!--begin::Example-->
                            <div class="example example-basic">
                                <div class="example-preview">
                                    <!--begin::Timeline-->
                                    <div class="timeline timeline-3">
                                        <div class="timeline-items">
                                            <div class="timeline-item">
                                            
                                                <div class="timeline-content" style="background-color: #fff;border: 1px solid #eee">
                                                    {!! Form::open(['action'=>'NoteController@store', 'method'=>'POST', 'enctype' =>'multipart/form-data', ' novalidate', 'class' => 'form '])!!}

                                                    <div class="d-flex align-items-center justify-content-between mb-3">
                                                
                                                        <div class="mr-2 w-100">
                                                            <input name="subject" type="text" class="form-control mb-3" placeholder="Subject ...">
                                                            <textarea name="note" type="text" class="form-control" placeholder="Messege ..." rows="3"></textarea>
                                                        {{-- <span class="label label-light-success font-weight-bolder label-inline ml-2">new</span>  --}}
                                                        </div>
                                                        <input name="user_id" type="text" hidden="hidden" value="{{auth()->user()->id}}">
                                                        <input name="project_id" type="text" hidden="hidden" value="{{$project->id}}">
                                                    </div>
                                                    <div>
                                                        <button type="submit" class="btn btn-primary font-weight-bold px-6">Send</button>
                                                        <div class="d-inline-block">
                                                            <select class="form-control selectpicker" name="priority" tabindex="3">
                                                                <option value="4" data-content="&lt;span class='label label-success label-inline label-rounded'&gt;Low&lt;/span&gt;">Low</option>
                                                                <option value="3" data-content="&lt;span class='label label-warning label-inline label-rounded'&gt;Normal&lt;/span&gt;">Normal</option>
                                                                <option value="2" data-content="&lt;span class='label label-primary label-inline label-rounded'&gt;Important&lt;/span&gt;">Important</option>
                                                                <option value="1" data-content="&lt;span class='label label-danger label-inline label-rounded'&gt;Urgent&lt;/span&gt;">Urgent</option>
                                                            </select>
                                                        </div>
                                                    </div>
                                                    </form>
                                                </div>
                                            </div>

                                            @if (count($project->notes) == 0)
                                                <div >
                                                    <h4 class="text-primary text-center">Start Notes</h4>
                                                </div>
                                            @else
                                                @foreach ($project->notes->sortBy('created_at', SORT_REGULAR, true) as $note)
                                                    <div class="timeline-item">
                                                        <div class="timeline-media">
                                                            @if (Helper::avatarCheck($note->user->avatar))
                                                                <div class="symbol symbol-40 symbol-sm flex-shrink-0 ">
                                                                    <img class="" src="{{asset('uploads/images/avatars/'.$note->user->avatar)}}" alt="photo" />
                                                                </div>
                                                            @else
                                                                <div class="symbol symbol-40 symbol-sm flex-shrink-0 symbol-light-primary">
                                                                    <span class="symbol-label font-size-h4">
                                                                        {{$note->user->name[0]}}
                                                                    </span>
                                                                </div>
                                                            @endif
                                                        </div>
                                                        <div class="timeline-content">
                                                            <div class="d-flex align-items-center justify-content-between mb-3">
                                                                <div class="mr-2">
                                                                    <h5 class="text-dark-75 text-hover-primary font-weight-bold d-inline-block">{{$note->subject}}</h5>
                                                                    <span class="text-muted ml-2">{{Helper::since($note->created_at)}}</span>
                                                                    @if ($note->priority == 1)
                                                                        <span class="label label-light-danger font-weight-bolder label-inline ml-2">Urgent</span>
                                                                    @elseif ($note->priority == 2)
                                                                        <span class="label label-light-primary font-weight-bolder label-inline ml-2">Important</span>
                                                                    @elseif ($note->priority == 3)
                                                                        <span class="label label-light-warning font-weight-bolder label-inline ml-2">Normal</span>
                                                                    @elseif ($note->priority == 4)
                                                                        <span class="label label-light-success font-weight-bolder label-inline ml-2">Low</span>
                                                                    @endif
                                                                </div>
                                                                @if ($note->user_id == auth()->user()->id)
                                                                    <div class="dropdown ml-2" data-toggle="tooltip" title="" data-placement="left" data-original-title="Edit">
                                                                        <a class="btn btn-hover-light-success btn-sm btn-icon edit-note-btn" data-toggle="modal" data-target="#edit-note-{{$note->id}}" >
                                                                            <span class="svg-icon svg-icon-success svg-icon-1x"><!--begin::Svg Icon | path:C:\wamp64\www\keenthemes\themes\metronic\theme\html\demo2\dist/../src/media/svg/icons\Design\Edit.svg--><svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
                                                                                <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                                                                    <rect x="0" y="0" width="24" height="24"/>
                                                                                    <path d="M8,17.9148182 L8,5.96685884 C8,5.56391781 8.16211443,5.17792052 8.44982609,4.89581508 L10.965708,2.42895648 C11.5426798,1.86322723 12.4640974,1.85620921 13.0496196,2.41308426 L15.5337377,4.77566479 C15.8314604,5.0588212 16,5.45170806 16,5.86258077 L16,17.9148182 C16,18.7432453 15.3284271,19.4148182 14.5,19.4148182 L9.5,19.4148182 C8.67157288,19.4148182 8,18.7432453 8,17.9148182 Z" fill="#000000" fill-rule="nonzero" transform="translate(12.000000, 10.707409) rotate(-135.000000) translate(-12.000000, -10.707409) "/>
                                                                                    <rect fill="#000000" opacity="0.3" x="5" y="20" width="15" height="2" rx="1"/>
                                                                                </g>
                                                                            </svg><!--end::Svg Icon--></span>
                                                                        </a>
                                                                    </div>
                                                                @endif
                                                            </div>
                                                            <p class="p-0">{{$note->note}}</p>
                                                        </div>
                                                    </div>
                                                @endforeach
                                            @endif
                                            
                                            
                                        
                                            {{-- <div class="timeline-item">
                                                <div class="timeline-media">
                                                    <i class="flaticon2-shield text-danger"></i>
                                                </div>
                                                <div class="timeline-content">
                                                    <div class="d-flex align-items-center justify-content-between mb-3">
                                                        <div class="mr-2">
                                                            <a href="#" class="text-dark-75 text-hover-primary font-weight-bold">Member has sent a request.</a>
                                                            <span class="text-muted ml-2">8:30PM 20 June</span>
                                                            <span class="label label-light-danger font-weight-bolder label-inline ml-2">pending</span>
                                                        </div>
                                                        <div class="dropdown ml-2" data-toggle="tooltip" title="" data-placement="left" data-original-title="Quick actions">
                                                            <a href="#" class="btn btn-hover-light-primary btn-sm btn-icon" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                                <i class="ki ki-more-hor font-size-lg text-primary"></i>
                                                            </a>
                                                            <div class="dropdown-menu p-0 m-0 dropdown-menu-md dropdown-menu-right">
                                                                <!--begin::Navigation-->
                                                                <ul class="navi navi-hover">
                                                                    <li class="navi-header font-weight-bold py-4">
                                                                        <span class="font-size-lg">Choose Label:</span>
                                                                        <i class="flaticon2-information icon-md text-muted" data-toggle="tooltip" data-placement="right" title="" data-original-title="Click to learn more..."></i>
                                                                    </li>
                                                                    <li class="navi-separator mb-3 opacity-70"></li>
                                                                    <li class="navi-item">
                                                                        <a href="#" class="navi-link">
                                                                            <span class="navi-text">
                                                                                <span class="label label-xl label-inline label-light-success">Customer</span>
                                                                            </span>
                                                                        </a>
                                                                    </li>
                                                                    <li class="navi-item">
                                                                        <a href="#" class="navi-link">
                                                                            <span class="navi-text">
                                                                                <span class="label label-xl label-inline label-light-danger">Partner</span>
                                                                            </span>
                                                                        </a>
                                                                    </li>
                                                                    <li class="navi-item">
                                                                        <a href="#" class="navi-link">
                                                                            <span class="navi-text">
                                                                                <span class="label label-xl label-inline label-light-warning">Suplier</span>
                                                                            </span>
                                                                        </a>
                                                                    </li>
                                                                    <li class="navi-item">
                                                                        <a href="#" class="navi-link">
                                                                            <span class="navi-text">
                                                                                <span class="label label-xl label-inline label-light-primary">Member</span>
                                                                            </span>
                                                                        </a>
                                                                    </li>
                                                                    <li class="navi-item">
                                                                        <a href="#" class="navi-link">
                                                                            <span class="navi-text">
                                                                                <span class="label label-xl label-inline label-light-dark">Staff</span>
                                                                            </span>
                                                                        </a>
                                                                    </li>
                                                                    <li class="navi-separator mt-3 opacity-70"></li>
                                                                    <li class="navi-footer py-4">
                                                                        <a class="btn btn-clean font-weight-bold btn-sm" href="#"> <i class="ki ki-plus icon-sm"></i>Add new</a>
                                                                    </li>
                                                                </ul>
                                                                <!--end::Navigation-->
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <p class="p-0">Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium, totam rem aperiam, eaque ipsa quae ab illo inventore veritatis et quasi architecto.</p>
                                                </div>
                                            </div>
                                            <div class="timeline-item">
                                                <div class="timeline-media">
                                                    <i class="flaticon2-layers text-warning"></i>
                                                </div>
                                                <div class="timeline-content">
                                                    <div class="d-flex align-items-center justify-content-between mb-3">
                                                        <div class="mr-2">
                                                            <a href="#" class="text-dark-75 text-hover-primary font-weight-bold">System deployment has been completed.</a>
                                                            <span class="text-muted ml-2">11:00AM 30 June</span>
                                                            <span class="label label-light-warning font-weight-bolder label-inline ml-2">done</span>
                                                        </div>
                                                        <div class="dropdown ml-2" data-toggle="tooltip" title="" data-placement="left" data-original-title="Quick actions">
                                                            <a href="#" class="btn btn-hover-light-primary btn-sm btn-icon" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                                <i class="ki ki-more-hor font-size-lg text-primary"></i>
                                                            </a>
                                                            <div class="dropdown-menu p-0 m-0 dropdown-menu-md dropdown-menu-right">
                                                                <!--begin::Navigation-->
                                                                <ul class="navi navi-hover">
                                                                    <li class="navi-header font-weight-bold py-4">
                                                                        <span class="font-size-lg">Choose Label:</span>
                                                                        <i class="flaticon2-information icon-md text-muted" data-toggle="tooltip" data-placement="right" title="" data-original-title="Click to learn more..."></i>
                                                                    </li>
                                                                    <li class="navi-separator mb-3 opacity-70"></li>
                                                                    <li class="navi-item">
                                                                        <a href="#" class="navi-link">
                                                                            <span class="navi-text">
                                                                                <span class="label label-xl label-inline label-light-success">Customer</span>
                                                                            </span>
                                                                        </a>
                                                                    </li>
                                                                    <li class="navi-item">
                                                                        <a href="#" class="navi-link">
                                                                            <span class="navi-text">
                                                                                <span class="label label-xl label-inline label-light-danger">Partner</span>
                                                                            </span>
                                                                        </a>
                                                                    </li>
                                                                    <li class="navi-item">
                                                                        <a href="#" class="navi-link">
                                                                            <span class="navi-text">
                                                                                <span class="label label-xl label-inline label-light-warning">Suplier</span>
                                                                            </span>
                                                                        </a>
                                                                    </li>
                                                                    <li class="navi-item">
                                                                        <a href="#" class="navi-link">
                                                                            <span class="navi-text">
                                                                                <span class="label label-xl label-inline label-light-primary">Member</span>
                                                                            </span>
                                                                        </a>
                                                                    </li>
                                                                    <li class="navi-item">
                                                                        <a href="#" class="navi-link">
                                                                            <span class="navi-text">
                                                                                <span class="label label-xl label-inline label-light-dark">Staff</span>
                                                                            </span>
                                                                        </a>
                                                                    </li>
                                                                    <li class="navi-separator mt-3 opacity-70"></li>
                                                                    <li class="navi-footer py-4">
                                                                        <a class="btn btn-clean font-weight-bold btn-sm" href="#"> <i class="ki ki-plus icon-sm"></i>Add new</a>
                                                                    </li>
                                                                </ul>
                                                                <!--end::Navigation-->
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <p class="p-0">Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium, totam rem aperiam, eaque ipsa quae ab illo inventore veritatis et quasi architecto.</p>
                                                </div>
                                            </div>
                                            <div class="timeline-item">
                                                <div class="timeline-media">
                                                    <i class="flaticon2-notification fl text-primary"></i>
                                                </div>
                                                <div class="timeline-content">
                                                    <div class="d-flex align-items-center justify-content-between mb-3">
                                                        <div class="mr-2">
                                                            <a href="#" class="text-dark-75 text-hover-primary font-weight-bold">Database backup has been completed.</a>
                                                            <span class="text-muted ml-2">2 months ago</span>
                                                            <span class="label label-light-primary font-weight-bolder label-inline ml-2">delivered</span>
                                                        </div>
                                                        <div class="dropdown ml-2" data-toggle="tooltip" title="" data-placement="left" data-original-title="Quick actions">
                                                            <a href="#" class="btn btn-hover-light-primary btn-sm btn-icon" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                                <i class="ki ki-more-hor font-size-lg text-primary"></i>
                                                            </a>
                                                            <div class="dropdown-menu p-0 m-0 dropdown-menu-md dropdown-menu-right">
                                                                <!--begin::Navigation-->
                                                                <ul class="navi navi-hover">
                                                                    <li class="navi-header font-weight-bold py-4">
                                                                        <span class="font-size-lg">Choose Label:</span>
                                                                        <i class="flaticon2-information icon-md text-muted" data-toggle="tooltip" data-placement="right" title="" data-original-title="Click to learn more..."></i>
                                                                    </li>
                                                                    <li class="navi-separator mb-3 opacity-70"></li>
                                                                    <li class="navi-item">
                                                                        <a href="#" class="navi-link">
                                                                            <span class="navi-text">
                                                                                <span class="label label-xl label-inline label-light-success">Customer</span>
                                                                            </span>
                                                                        </a>
                                                                    </li>
                                                                    <li class="navi-item">
                                                                        <a href="#" class="navi-link">
                                                                            <span class="navi-text">
                                                                                <span class="label label-xl label-inline label-light-danger">Partner</span>
                                                                            </span>
                                                                        </a>
                                                                    </li>
                                                                    <li class="navi-item">
                                                                        <a href="#" class="navi-link">
                                                                            <span class="navi-text">
                                                                                <span class="label label-xl label-inline label-light-warning">Suplier</span>
                                                                            </span>
                                                                        </a>
                                                                    </li>
                                                                    <li class="navi-item">
                                                                        <a href="#" class="navi-link">
                                                                            <span class="navi-text">
                                                                                <span class="label label-xl label-inline label-light-primary">Member</span>
                                                                            </span>
                                                                        </a>
                                                                    </li>
                                                                    <li class="navi-item">
                                                                        <a href="#" class="navi-link">
                                                                            <span class="navi-text">
                                                                                <span class="label label-xl label-inline label-light-dark">Staff</span>
                                                                            </span>
                                                                        </a>
                                                                    </li>
                                                                    <li class="navi-separator mt-3 opacity-70"></li>
                                                                    <li class="navi-footer py-4">
                                                                        <a class="btn btn-clean font-weight-bold btn-sm" href="#"> <i class="ki ki-plus icon-sm"></i>Add new</a>
                                                                    </li>
                                                                </ul>
                                                                <!--end::Navigation-->
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <p class="p-0">Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium, totam rem aperiam, eaque ipsa quae ab illo inventore veritatis et quasi architecto.</p>
                                                </div>
                                            </div> --}}
                                        </div>
                                    </div>
                                    <!--end::Timeline-->
                                </div>
                            </div>
                            <!--end::Example-->
                        </div>
                    </div>
                </div>
            @endif
        </div>
        <!--end::Container-->
    </div>
    <!--end::Entry-->
    
@endsection
@section('modals')
    <!--begin::Chat Panel-->
    <div class="modal modal-sticky modal-sticky-bottom-right" id="chat_modal" role="dialog" data-backdrop="false">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <!--begin::Card-->
                <div class="card card-custom">
                    <!--begin::Header-->
                    <div class="card-header align-items-center px-4 py-3">
                        <div class="text-left flex-grow-1">
                        </div>
                        <div class="text-center flex-grow-1">
                        <div class="text-dark-75 font-weight-bold font-size-h5">{{ucwords($project->user->name)}}</div>
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
                        <div class="scroll scroll-pull" data-height="400" data-mobile-height="350" style="max-height: 500px;overflow-y: scroll;" id="messeges_scroll">
                            <!--begin::Messages-->
                            <div class="messages" id="chat_messeges">
                                {{--  <chat-messages :messeges="{{json_encode($project->messeges) }}" :user="{{auth()->user()}}"></chat-messages>  --}}
                                @if (count($project->messeges) > 0)
                                <div class="d-flex flex-column mb-5 align-items-start">
                                </div>
                                    @foreach ($project->messeges as $msg)
                                        @if ($msg->user->id == $project->user->id)
                                            <!--begin::Message In-->
                                            <div class="d-flex flex-column mb-5 align-items-start">
                                        @else
                                            <div class="d-flex flex-column mb-5 align-items-end">
                                        @endif
                                                <div class="d-flex align-items-center">
                                                    @if ($msg->user->id == $project->user->id)
                                                        @if (Helper::avatarCheck($project->user->avatar))
                                                            <div class="symbol symbol-circle symbol-40 mr-3">
                                                                <img class="" src="{{asset('uploads/images/avatars/'.$project->user->avatar)}}" alt="photo" />
                                                            </div>
                                                        @else
                                                            <div class="symbol symbol-circle symbol-40 mr-3 flex-shrink-0 symbol-light-primary ">
                                                                <span class="symbol-label font-size-h4">
                                                                    {{$project->user->name[0]}}
                                                                </span>
                                                            </div>
                                                        @endif
                                                        <div>
                                                            @if ($msg->user->role->name == 'customer')
                                                                <a href="{{url('customers/'.$project->user->id)}}" class="text-dark-75 text-hover-primary font-weight-bold font-size-h6">
                                                            @elseif ($msg->user->role->name == 'team')
                                                                <a href="{{url('team/'.$project->user->id)}}" class="text-dark-75 text-hover-primary font-weight-bold font-size-h6">
                                                            @elseif ($msg->user->role->name == 'admin')   
                                                                <a href="{{url('admins/'.$project->user->id)}}" class="text-dark-75 text-hover-primary font-weight-bold font-size-h6">
                                                            @endif
                                                        
                                                            {{$project->user->name}}</a>
                                                            <span class="text-muted font-size-sm">{{Helper::since($msg->created_at)}}</span>
                                                        </div>
                                                    @else
                                                    <div>
                                                        @if ($msg->user->role->name == 'customer')
                                                            <a href="{{url('customers/'.$project->user->id)}}" class="text-dark-75 text-hover-primary font-weight-bold font-size-h6">
                                                        @elseif ($msg->user->role->name == 'team')
                                                            <a href="{{url('team/'.$project->user->id)}}" class="text-dark-75 text-hover-primary font-weight-bold font-size-h6">
                                                        @elseif ($msg->user->role->name == 'admin')   
                                                            <a href="{{url('admins/'.$project->user->id)}}" class="text-dark-75 text-hover-primary font-weight-bold font-size-h6">
                                                        @endif
                                                        <span class="text-muted font-size-sm">{{Helper::since($msg->created_at)}}</span>
                                                    
                                                        {{ucwords($project->user->name)}}</a>
                                                        
                                                    
                                                        @if (Helper::avatarCheck($project->user->avatar))
                                                            <div class="symbol symbol-circle symbol-40 ml-3">
                                                                <img class="" src="{{asset('uploads/images/avatars/'.$project->user->avatar)}}" alt="photo" />
                                                            </div>
                                                        @else
                                                            <div class="symbol symbol-circle symbol-40 ml-3 flex-shrink-0 symbol-light-primary ">
                                                                <span class="symbol-label font-size-h4">
                                                                    {{$project->user->name[0]}}
                                                                </span>
                                                            </div>
                                                        @endif
                                                    </div>
                                                    @endif
                                                   
                                                   
                                                </div>
                                                <div class="mt-2 rounded p-5 bg-light-success text-dark-50 font-weight-bold font-size-lg text-left max-w-400px">{{$msg->messege}}</div>
                                                @if (Helper::FileExists($msg->docs, 'uploads/files/messeges'))
                                                    <div class="d-flex flex-column font-size-sm font-weight-bold">
                                                        <a href="{{url('uploads/files/messeges/'. $msg->docs)}}" target="_blank" class="d-flex align-items-center text-muted text-hover-primary py-1" style="max-height: 40px;overflow: hidden;">
                                                        <span class="flaticon2-clip-symbol text-warning icon-1x mr-2"></span>{{$msg->docs}}</a>
                                                    </div>
                                                @endif
                                            </div>
                                    @endforeach
                                @else
                                    <div class="text-center font-size-h3 text-success">
                                        What's in your mind?
                                    </div>
                                @endif
                               
                                
                            </div>
                            <!--end::Messages-->
                        </div>
                        <!--end::Scroll-->
                    </div>
                    <!--end::Body-->
                    <!--begin::Footer-->
                    <div class="card-footer align-items-center">
                        <!--begin::Compose-->
                        {!! Form::open(['action' => 'MessegeController@store', 'method' => 'POST','class' => 'form w-100 align-items-center', 'enctype' => 'multipart/form-data', 'id' => 'chat_message_create'])!!}
                            <textarea class="form-control border-0 p-0" rows="2" placeholder="Type a message" name="messege"></textarea>
                            <div class="d-flex align-items-center justify-content-between mt-5">
                                <div class="mr-3">
                                    <label for="messege_docs" class="btn btn-clean btn-icon btn-md mr-1">
                                        <i class="flaticon-attachment icon-lg"></i>
                                    </label>
                                    <input hidden="hidden" name="docs" id="messege_docs" type="file">
                                <input hidden="hidden" name="user_id" value="{{auth()->user()->id}}">
                                <input hidden="hidden" name="project_id" value="{{$project->id}}">
                                </div>
                                <div>
                                    <button class="btn btn-primary btn-md text-uppercase font-weight-bold chat-send py-2 px-6" id="send">Send</button>
                                </div>
                            </div>
                        {!! Form::close()!!}    
                        <!--begin::Compose-->
                    </div>
                    <!--end::Footer-->
                </div>
                <!--end::Card-->
            </div>
        </div>
    </div>
    <!--end::Chat Panel-->
    <!--begin::Delete project Modal-->
    <div class="modal fade project-modal" id="delete-project-{{$project->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">Delete project</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
            {!! Form::open(['action'=>['ProjectController@destroy', $project->id], 'method'=>'POST'])!!}
            
            </div>
            <div class="modal-body">
                Are You Sure About project Deletion?
            </div>
            <div class="modal-footer">
                {!! Form::button('Delete', ['type' => 'submit','class' => "btn btn-danger", 'name' => 'delete-from-show'], false)!!}
            </div>
            {{Form::hidden('_method', 'DELETE')}}
            {!! Form::close() !!}
        </div>
        </div>
    </div>
    <!--end::Cancel project Modal-->
    <div class="modal fade project-modal" id="cancel-project-{{$project->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">Cancel project</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
            {!! Form::open(['action'=>['ProjectController@update', $project->id], 'method'=>'POST'])!!}
            
            </div>
            <div class="modal-body">
                Are You Sure About project Cancelatoin?
            </div>
            <div class="modal-footer">
                {!! Form::button('Cancel', ['type' => 'submit','class' => "btn btn-danger", 'name' => 'cancel-from-show'], false)!!}
            </div>
            {{Form::hidden('_method', 'PUT')}}
            {!! Form::close() !!}
        </div>
        </div>
    </div>
    <!--end::Edit project Modal-->
    <div class="modal fade project-modal" id="edit-manager-{{$project->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">Project Manager</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
            {!! Form::open(['action'=>['ProjectController@update', $project->id], 'method'=>'POST'])!!}
            
            </div>
            <div class="modal-body">
                @foreach(Helper::projectManagers() as $manager)
                @if ($project->manager_id == $manager->id)
                    <label class="option border-primary">
                        <span class="option-control">
                            <span class="radio">
                            <input type="radio" name="manager_id" value="{{$manager->id}}" checked="checked">
                            <span style="top: -4px;"></span>
                @else
                    <label class="option">
                        <span class="option-control">
                            <span class="radio">
                            <input type="radio" name="manager_id" value="{{$manager->id}}">
                            <span style="top: -4px;"></span>
                            
                @endif
                        </span>
                    </span>
                    @if (Helper::avatarCheck($manager->avatar))
                        <div class="symbol symbol-40 symbol-sm flex-shrink-0 ">
                            <img class="" src="{{asset('uploads/images/avatars/'.$manager->avatar)}}" alt="photo" />
                        </div>
                    @else
                        <div class="symbol symbol-40 symbol-sm flex-shrink-0 symbol-light-primary">
                            <span class="symbol-label font-size-h4">
                                {{$manager->name[0]}}
                            </span>
                        </div>
                    @endif
                    <span class="option-label ml-3 pt-3">
                        <span class="option-head">
                            <span class="option-title">{{ucwords($manager->name)}}</span>
                        </span>
                    </span>
                </label>
               
                @endforeach
            </div>
            <div class="modal-footer">
                {!! Form::button('Update', ['type' => 'submit','class' => "btn btn-danger", 'name' => 'update-manager'], false)!!}
            </div>
            {{Form::hidden('_method', 'PUT')}}
            {!! Form::close() !!}
        </div>
        </div>
    </div>
    <!--end::Delete project Modal-->
    <div class="modal fade wide-modal" id="edit-project-{{$project->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">Edit {{ucwords($project->name)}}</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
            </div>
            <div class="modal-body">
                @include('projects.edit', ['project' => $project])
            </div>
        </div>
        </div>
    </div>
    <!--begin::New task Modal-->
    <div class="modal fade wide-modal" id="new-task" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">New task</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
            </div>
            <div class="modal-body">
                @include('tasks.create_project', ['project' => $project])
            </div>
        </div>
        </div>
    </div>
   

    
    <!--begin::Edit task Modal-->
    @foreach ($project->tasks as $task)
        <div class="modal fade wide-modal task-modal" id="edit-task-{{$task->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Edit {{ucwords($task->name)}}</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
                </div>
                <div class="modal-body">
                    @include('tasks.edit', ['task' => $task])
                </div>
            </div>
            </div>
        </div>
    @endforeach
    @if (!auth()->user()->isCustomer())
        @foreach ($project->notes as $note)
            <div class="modal fade wide-modal note-modal" id="edit-note-{{$note->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Edit {{$note->subject}}</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                    </div>
                    <div class="modal-body">
                        {!! Form::open(['action'=>['NoteController@update', $note->id], 'method'=>'POST', 'enctype' =>'multipart/form-data', ' novalidate', 'class' => 'form '])!!}
                            <div class="d-flex align-items-center justify-content-between mb-3">
                        
                                <div class="mr-2 w-100">
                                    <input name="subject" type="text" class="form-control mb-3" placeholder="Subject ..." value="{{$note->subject}}">
                                    <textarea name="note" type="text" class="form-control" placeholder="Messege ..." rows="3">{{$note->note}}</textarea>
                                {{-- <span class="label label-light-success font-weight-bolder label-inline ml-2">new</span>  --}}
                                </div>
                                <input name="user_id" type="text" hidden="hidden" value="{{auth()->user()->id}}">
                                <input name="project_id" type="text" hidden="hidden" value="{{$project->id}}">
                            </div>
                            <div>
                                <button type="submit" class="btn btn-primary font-weight-bold px-6">Update</button>
                                <div class="d-inline-block">
                                    <select class="form-control selectpicker" id="note_selectpicker_{{$note->id}}" name="priority" tabindex="3" value="{{$note->priority}}">
                                        <option value="4" data-content="&lt;span class='label label-success label-inline label-rounded'&gt;Low&lt;/span&gt;">Low</option>
                                        <option value="3" data-content="&lt;span class='label label-warning label-inline label-rounded'&gt;Normal&lt;/span&gt;">Normal</option>
                                        <option value="2" data-content="&lt;span class='label label-primary label-inline label-rounded'&gt;Important&lt;/span&gt;">Important</option>
                                        <option value="1" data-content="&lt;span class='label label-danger label-inline label-rounded'&gt;Urgent&lt;/span&gt;">Urgent</option>
                                    </select>
                                </div>
                            </div>
                            {!! Form::hidden('_method', 'PUT')!!}
                        </form>
                    </div>
                </div>
                </div>
            </div>
        @endforeach
    @endif    

@endsection
@section('scripts')
    <script src="{{asset('assets/plugins/custom/kanban/kanban.bundle.js')}}"></script>

    <script>
        $(document).ready(function(){
            var pending_items_no = [];
            var prgress_items_no = [];
            var waiting_items_no = [];
            var completed_items_no = [];

            

            function getProject(id){
                var projects = {!! json_encode(App\Project::where('id', '!=', null)->get()) !!};

                for (const key in projects) {
                    if (projects.hasOwnProperty(key)) {
                        if(projects[key].id == id){
                            return projects[key];
                        } 
                    }
                }  
            }

            function getUser(id){
                var users = {!! json_encode(App\User::where('id', '!=', null)->get()) !!};

                for (const key in users) {
                    if (users.hasOwnProperty(key)) {
                        if(users[key].id == id){
                            return users[key];
                        } 
                    }
                }  
            }

            function getProjectUser(id){
                var projects = {!! json_encode(App\Project::where('id', '!=', null)->get()) !!};

                for (const key in projects) {
                    if (projects.hasOwnProperty(key)) {
                        if(projects[key].id == id){
                            if(projects[key].user_id){

                                return getUser(projects[key].user_id);
                                
                            }
                        } 
                    }
                }  
            }

            // console.log(getProjectUser(15))
            function fileExists(file, path){
                var obj = {file: file, path : path};
                var jsonObj = JSON.stringify(obj);
                var check = {{ Helper::FileExists('XwdmoHng_1598883753.jpeg', '/uploads/images/logos/projects') }};
                return check;
            }

            // Edit Project Script
            $('.edit-project-btn').click(function(){
                $(this).attr('data-target');
                var id = $(this).attr('data-target').replace( /^\D+/g, '');
                var avatar_box = $('.avatar_box#' + id);
                var avatar_file = $('#edit_avatar_'+ id);
                var	edit_avatar_preview = $('.edit_avatar_preview-'+ id);
                avatar_file.change(function(){
                    // console.log(id );
                    var file = this.files[0];
                    if(file){
                        var reader = new FileReader();
                        reader.addEventListener("load", function(){
                            edit_avatar_preview.attr("src", this.result);
                        });
                        reader.readAsDataURL(file);
                    } 
                });
                
                var statusInput = $('#status_selectpicker_' + id);
                var statusValue = statusInput.attr('value');
                // console.log(statusValue);
                statusInput.selectpicker('val', statusValue);

                var slider = document.getElementById('progress_' + id);
                var sliderInput = document.getElementById('progress_input_' + id);
                var start = sliderInput.value;
                noUiSlider.create(slider, {
                    start: [ start ],
                    step: 5,
                    range: {
                        'min': [ 0 ],
                        'max': [ 100 ]
                    },
                    format: wNumb({
                        decimals: 0 
                    })
                });
                    // init slider input
                

                slider.noUiSlider.on('update', function( values, handle ) {
                    sliderInput.value = values[handle];
                });

                sliderInput.addEventListener('change', function(){
                    slider.noUiSlider.set(this.value);
                });
            }) 

            // Edit Task Script
            $('.edit-task-btn').click(function(){
                $(this).attr('data-target');
                var id = $(this).attr('data-target').replace( /^\D+/g, '');
                var avatar_box = $('.avatar_box#' + id);
                var avatar_file = $('#edit_avatar_'+ id);
                var	edit_avatar_preview = $('.edit_avatar_preview-'+ id);
                avatar_file.change(function(){
                    var file = this.files[0];
                    if(file){
                        var reader = new FileReader();
                        reader.addEventListener("load", function(){
                            edit_avatar_preview.attr("src", this.result);
                        });
                        reader.readAsDataURL(file);
                    } 
                })
                
                var statusInput = $('.task-modal #status_selectpicker_' + id);
                var statusValue = statusInput.attr('value');
                statusInput.selectpicker('val', statusValue);

            }) 

            // Edit Note Script
            $('.edit-note-btn').click(function(){
                $(this).attr('data-target');
                var id = $(this).attr('data-target').replace( /^\D+/g, '');

                var noteInput = $('.note-modal #note_selectpicker_' + id);
                var noteValue = noteInput.attr('value');
                noteInput.selectpicker('val', noteValue);

                // console.log('Logo Input');

            });

            // input group and left alignment setup
            // $('.daterangepicke').daterangepicker({
            //     buttonClasses: ' btn',
            //     applyClass: 'btn-primary',
            //     cancelClass: 'btn-secondary'
            // }, function(start, end, label) {
            //     $('.daterangepicke .form-control').val( start.format('YYYY-MM-DD') + ' / ' + end.format('YYYY-MM-DD'));
            // }); 

            // Task Progress Script
            var _initMixedWidget14 = function() {
                // variables 
                var element = document.getElementById("tasks_progress_chart");
                var height = parseInt(KTUtil.css(element, 'height'));
                
                var tasks = @json($project->tasks);
                var completed = [];

                if(tasks.length > 0){
                    for (const key in tasks) {
                        if (tasks.hasOwnProperty(key)) {
                            if(tasks[key].status == 3){
                                completed.push(key);
                            }
                        }
                    }
                }else{
                    var percentage = 0 ;
                }

                

                var percentage = Math.round((completed.length/ tasks.length) *100)
                if(percentage){
                    var percentage = percentage ;
                }else{
                    var percentage = 0 ;
                }
                    if (!element) {
                        return;
                    }

                    var options = {
                        series: [percentage],
                        chart: {
                            height: height,
                            type: 'radialBar',
                        },
                        plotOptions: {
                            radialBar: {
                                hollow: {
                                    margin: 0,
                                    size: "65%"
                                },
                                dataLabels: {
                                    showOn: "always",
                                    name: {
                                        show: false,
                                        fontWeight: '700'
                                    },
                                    value: {
                                        color: KTApp.getSettings()['colors']['gray']['gray-700'],
                                        fontSize: "30px",
                                        fontWeight: '700',
                                        offsetY: 12,
                                        show: true
                                    }
                                },
                                track: {
                                    background: KTApp.getSettings()['colors']['theme']['light']['success'],
                                    strokeWidth: '100%'
                                }
                            }
                        },
                        colors: [KTApp.getSettings()['colors']['theme']['base']['success']],
                        stroke: {
                            lineCap: "round",
                        },
                        labels: ["Progress"]
                    };

                    var chart = new ApexCharts(element, options);
                    chart.render();
            }
            _initMixedWidget14();

            // Select Picker Script
            // $('.kt-selectpicker').selectpicker();

            var tasks = @json($project->tasks);
            var pending_array = [];
            var progress_array = [];
            var waiting_array = [];
            var completed_array = [];

            for (const key in tasks) {
                if (tasks.hasOwnProperty(key)) {
                    var status = tasks[key].status;
                    if(status == 0){
                        pending_array.push({'id': `${tasks[key].status}`, 
                            'title': `<span class="font-weight-bold" id="${tasks[key].id}">${tasks[key].name}</span>`,
                        });
                    }
                    if(status == 1){
                        progress_array.push({'id': `${tasks[key].status}`, 
                            'title': `<span class="font-weight-bold" id="${tasks[key].id}">${tasks[key].name}</span>`,
                        });
                    }
                    if(status == 2){
                        waiting_array.push({'id': `${tasks[key].status}`, 
                            'title': `<span class="font-weight-bold" id="${tasks[key].id}">${tasks[key].name}</span>`,
                        });
                    }
                    if(status == 3){
                        completed_array.push({'id': `${tasks[key].status}`, 
                            'title': `<span class="font-weight-bold" id="${tasks[key].id}">${tasks[key].name}</span>`,
                        });
                    }
                }
            }
    
            // console.log(pending_array);
            // console.log(progress_array);
            // console.log(waiting_array);
            // console.log(completed_array);

            var _demo2 = function() {
                var kanban = new jKanban({
                element: '#kt_kanban_2',
                gutter: '0',
                widthBoard: '23%',
                boards: [{
                        'id': '_pending',
                        'title': 'Pending',
                        'class': 'danger',
                        'item': pending_array
                    },{
                        'id': '_inprocess',
                        'title': 'In Process',
                        'class': 'primary',
                        'item': progress_array
                    }, {
                        'id': '_waiting',
                        'title': 'Waiting Customer',
                        'class': 'warning',
                        'item': waiting_array
                    }, {
                        'id': '_completed',
                        'title': 'Completed',
                        'class': 'success',
                        'item': completed_array
                    }
                    ]
                });
            }
            _demo2();

           

            

                
            window.setInterval(function(){

                    var pending_ids = [];
                    var progress_ids = [];
                    var waiting_ids = [];
                    var completed_ids = [];

                    var pendings = $('.kanban-container .kanban-board[data-id ="_pending"] .kanban-item span');
                    var progress = $('.kanban-container .kanban-board[data-id ="_inprocess"] .kanban-item span');
                    var waiting = $('.kanban-container .kanban-board[data-id ="_waiting"] .kanban-item span');
                    var completed = $('.kanban-container .kanban-board[data-id ="_completed"] .kanban-item span');

                    
                    pendings.each(function(){
                        pending_ids.push($(this).attr('id'));
                    });

                    progress.each(function(){
                        progress_ids.push($(this).attr('id'));
                    });

                    waiting.each(function(){
                        waiting_ids.push($(this).attr('id'));
                    });

                    completed.each(function(){
                        completed_ids.push($(this).attr('id'));
                    });

                    
                    


                    

                    $('#task_status_form #pending_ids').attr('value', pending_ids);
                    $('#task_status_form #progress_ids').attr('value', progress_ids);
                    $('#task_status_form #waiting_ids').attr('value', waiting_ids);
                    $('#task_status_form #completed_ids').attr('value', completed_ids);

                    pending_items_no.push($('.kanban-board[data-id ="_pending"] .kanban-item').length);
                    prgress_items_no.push($('.kanban-board[data-id ="_inprocess"] .kanban-item').length);
                    waiting_items_no.push($('.kanban-board[data-id ="_waiting"] .kanban-item').length);
                    completed_items_no.push($('.kanban-board[data-id ="_completed"] .kanban-item').length);

                    pending_items_no = Array.from(new Set(pending_items_no));
                    prgress_items_no = Array.from(new Set(prgress_items_no));
                    waiting_items_no = Array.from(new Set(waiting_items_no));
                    completed_items_no = Array.from(new Set(completed_items_no));

                    if(pending_items_no.length > 1){
                        // $('#task_status_form button[type="submit"]').click();

                        // $("#task_status_form").submit();


                        $("#task_status_form").submit(function(e) {
                            
                            e.preventDefault();
                            $.ajax({
                                headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
                                url: "{{asset('projects/'.$project->id)}}" ,
                                method:"POST",  
                                data: $(this).serialize(),                              
                                success: function(data){
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

                        $("#task_status_form").submit();


                    }

                    if(prgress_items_no.length > 1){
                        $("#task_status_form").submit(function(e) {
                            
                            e.preventDefault();
                            
                            $.ajax({
                                headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
                                url: "{{asset('projects/'.$project->id)}}" ,
                                method:"POST",  
                                data: $(this).serialize(),                              
                                success: function(data){
                                    
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

                        $("#task_status_form").submit();
                    }

                    if(waiting_items_no.length > 1){
                        $("#task_status_form").submit(function(e) {
                            
                            e.preventDefault();
                            $.ajax({
                                headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
                                url: "{{asset('projects/'.$project->id)}}" ,
                                method:"POST",  
                                data: $(this).serialize(),                              
                                success: function(data){
                                    
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

                        $("#task_status_form").submit();
                    }

                    if(completed_items_no.length > 1){
                        $("#task_status_form").submit(function(e) {
                            
                            e.preventDefault();
                            
                            $.ajax({
                                headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
                                url: "{{asset('projects/'.$project->id)}}" ,
                                method:"POST",  
                                data: $(this).serialize(),                              
                                success: function(data){
                                    
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

                        $("#task_status_form").submit();
                    }

                    

                    


                    // var chat = $('#chat_modal #chat_messeges');

                    // var messeges = {!! json_encode($project->messeges) !!};
                    // var html = '';


                    // if(messeges){
                    //     for (const key in messeges) {
                    //         if (messeges.hasOwnProperty(key)) {
                    //             // if(messeges[key].id == id){
                    //             //     return users[key];
                    //             // }
                    //             if(messeges[key].id){
                    //                 html += ` 
                    //                         <!--begin::Message In-->
                    //                         <div class="d-flex flex-column mb-5 align-items-start">
                                       
                                        
                    //                             <div class="d-flex align-items-center">
                                                 
                    //                                 <div class="symbol symbol-circle symbol-40 mr-3">
                    //                                     <img class="" src="{{asset('uploads/images/avatars/'.$project->user->avatar)}}" alt="photo" />
                    //                                 </div>
                    //                                 <div class="symbol symbol-circle symbol-40 mr-3 flex-shrink-0 symbol-light-primary ">
                    //                                     <span class="symbol-label font-size-h4">
                    //                                         {{$project->user->name[0]}}
                    //                                     </span>
                    //                                 </div>
                    //                             <div>
                                                           
                    //                                             <a href="{{url('customers/'.` + messeges[key].created_at +`)}}" class="text-dark-75 text-hover-primary font-weight-bold font-size-h6">
                                                            
                                                               
                                                        
                                                          
                    //                                         <span class="text-muted font-size-sm">` + messeges[key].id +`</span>
                    //                                     </div>
                                                   
                    //                                 <div>
                                                   
                    //                             </div>
                    //                             <div class="mt-2 rounded p-5 bg-light-success text-dark-50 font-weight-bold font-size-lg text-left max-w-400px">` + messeges[key].messege +`</div>
                                                
                    //                                 <div class="d-flex flex-column font-size-sm font-weight-bold">
                    //                                     <a href="{{url('uploads/files/messeges/'. ` + messeges[key].id +`)}}" target="_blank" class="d-flex align-items-center text-muted text-hover-primary py-1" style="max-height: 40px;overflow: hidden;">
                    //                                     <span class="flaticon2-clip-symbol text-warning icon-1x mr-2"></span>{{` + messeges[key].id +`}}</a>
                    //                                 </div>
                                                
                    //                         </div>
                    //                  --}}`;
                    //             }else{

                    //             }
                                
                                

                    //         }
                    //     }  
                    //     chat.append(html)
                    // }

                   
                

                    // console.log(messeges);
                   


                   

                    

                    // console.log(completed_ids.push);

                    

                    // $("#task_status_form_submit").trigger("click");

                    // console.log($('#task_status_form').serialize());


                    
                    //     e.preventDefault();
                    //     $.ajax({
                    //         headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
                    //         type: "PATCH",
                    //         url: base_URL + "/prjects/" + {!!$project->id!!},
                    //         // data: $('#task_status_form').serialize()+"&_method=PATCH&tasks-states=''",
                    //         // data: 'Hello',
                    //         // success: (response)=>{
                    //         //     $(this).removeClass('dislike').addClass('like');
                    //         //     $('.toast').fadeIn().removeClass('hide').addClass('show');
                    //         //     $('.toast').find(".message").text('Worker deleted from favourite !');
                    //         //     $(this).find("i").removeClass('fav-saved');
                    //         //     setTimeout(function () {
                    //         //         $('.toast').fadeOut().removeClass('show').addClass('hide');
                    //         //     }, 5000);
                    //         // }
                    //     });


                    // });



                    // $('#task_status_form #task_status_form_submit').click(function(e){
                    //     e.preventDefault();
                    //     $.ajax({
                    //         headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
                    //         type: "PATCH",
                    //         url: base_URL + "/prjects/" + {!!$project->id!!},
                    //         // data: $('#task_status_form').serialize()+"&_method=PATCH&tasks-states=''",
                    //         // data: 'Hello',
                    //         // success: (response)=>{
                    //         //     $(this).removeClass('dislike').addClass('like');
                    //         //     $('.toast').fadeIn().removeClass('hide').addClass('show');
                    //         //     $('.toast').find(".message").text('Worker deleted from favourite !');
                    //         //     $(this).find("i").removeClass('fav-saved');
                    //         //     setTimeout(function () {
                    //         //         $('.toast').fadeOut().removeClass('show').addClass('hide');
                    //         //     }, 5000);
                    //         // }
                    //     });


                    // });
                    
                

                    

                    // console.log(pendings.length);
                    // console.log(pending_ids);
                    // console.log(progress.length);
                    // console.log(waiting.length);
                    // console.log(completed.length);
            }, 500);

            function gotoBottom(id){
                var element = document.getElementById(id);
                element.scrollTop = element.scrollHeight - element.clientHeight;
            }

            $('#chat_message_create #send').on('click', function() {
                $("#chat_message_create").submit(function(e) {
                    console.log($(this).serialize());

                    e.preventDefault();
                    $.ajax({
                        headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
                        url: "{{asset('messages/')}}" ,
                        method:"POST",  
                        data: $(this).serialize(),                              
                        success: function(data){
                            console.log('Success');
                            // $('#kt_content').html(data).delay(2000); 
                            $("#chat_messeges").load(location.href + " #chat_messeges");
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
                // $("#chat_message_create").submit();
            });

            // gotoBottom('chat_messeges');
        });  
    </script>
	<!--begin::Page Scripts(used by this page)-->
    <script src="{{asset('assets/js/pages/widgets.js')}}"></script>
    <script src="{{asset('assets/js/pages/custom/profile/profile.js')}}"></script>
@endsection
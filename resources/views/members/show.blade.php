


@extends('layouts.app')
@section('title', $member->name)
@section('content')
    <!--begin::Subheader-->
    <div class="subheader min-h-lg-175px pt-5 pb-7 subheader-transparent" id="kt_subheader">
        <div class="container d-flex align-items-center justify-content-between flex-wrap flex-sm-nowrap">
            <!--begin::Details-->
            <div class="d-flex align-items-center flex-wrap mr-2">
                <!--begin::Mobile Toggle-->
                <button class="burger-icon burger-icon-left mr-4 d-inline-block d-lg-none" id="kt_subheader_mobile_toggle">
                    <span></span>
                </button>
                <!--end::Mobile Toggle-->
                <!--begin::Heading-->
                <div class="d-flex flex-column">
                    <!--begin::Title-->
                    <a href="{{url('members/'. $member->id)}}">
                        <h2 class="text-white font-weight-bold my-2 mr-5">{{$member->name}}</h2>
                    </a>
                    <!--end::Title-->
                    <!--begin::Breadcrumb-->
                    <div class="d-flex align-items-center font-weight-bold my-2">
                        <!--begin::Item-->
                        <a href="{{url('/')}}" class="opacity-75 hover-opacity-100">
                            <i class="flaticon2-shelter text-white icon-1x"></i>
                        </a>
                        <!--end::Item-->
                        @if (auth()->user()->isAdmin())
                            <!--begin::Item-->
                            <span class="label label-dot label-sm bg-white opacity-75 mx-3"></span>
                            <a href="{{url('/')}}" class="text-white text-hover-white opacity-75 hover-opacity-100">Dashboard</a>
                            <!--end::Item-->
                        @endif
                        <!--begin::Item-->
                        <span class="label label-dot label-sm bg-white opacity-75 mx-3"></span>
                        <a href="{{url('/team')}}" class="text-white text-hover-white opacity-75 hover-opacity-100">Team Members</a>
                        <!--end::Item-->
                        <!--begin::Item-->
                        <span class="label label-dot label-sm bg-white opacity-75 mx-3"></span>
                        <a href="{{url('members/'. $member->id)}}" class="text-white text-hover-white opacity-75 hover-opacity-100">{{$member->name}}</a>
                        <!--end::Item-->
                    </div>
                    <!--end::Breadcrumb-->
                </div>
                <!--end::Heading-->
            </div>
            <!--end::Details-->
            {{-- <!--begin::Toolbar-->
            <div class="d-flex align-items-center">
                <!--begin::Button-->
                <a href="#" class="btn btn-transparent-white font-weight-bold py-3 px-6 mr-2">Reports</a>
                <!--end::Button-->
                <!--begin::Dropdown-->
                <div class="dropdown dropdown-inline ml-2" data-toggle="tooltip" title="Quick actions" data-placement="top">
                    <a href="#" class="btn btn-white font-weight-bold py-3 px-6" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Actions</a>
                    <div class="dropdown-menu p-0 m-0 dropdown-menu-md dropdown-menu-right">
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
                <!--end::Dropdown-->
            </div>
            <!--end::Toolbar--> --}}
        </div>
    </div>
    <!--end::Subheader-->
    <!--begin::Entry-->
    <div class="d-flex flex-column-fluid">
        <!--begin::Container-->
        <div class="container">
            <!--begin::Profile 4-->
            <div class="d-flex flex-row">
                <!--begin::Aside-->
                <div class="flex-row-auto offcanvas-mobile w-300px w-xl-350px" id="kt_profile_aside">
                    <!--begin::Card-->
                    <div class="card card-custom gutter-b">
                        <!--begin::Body-->
                        <div class="card-body ribbon ribbon-top">
                            <div class="ribbon-target bg-success font-weight-bolder" style="top: -2px; right: 20px;">{{Helper::getTeamCategoryByID($member->category_id)}}</div>
                           
                            <!--begin::User-->
                            <div class="d-flex align-items-center team-member-show">
                                @if (Helper::avatarCheck($member->avatar))
                                    <div class="symbol symbol-lg-75 symbol-xxl-100 mr-5">
                                        <img class="" src="{{asset('uploads/images/avatars/'.$member->avatar)}}" alt="photo" />
                                        <i class="symbol-badge bg-success"></i>
                                    </div>
                                @else
                                <div class="symbol flex-shrink-0 symbol symbol-lg-75 symbol-xxl-100 mr-5 ">
                                    <span class="symbol-label font-size-h4">
                                        {{$member->name[0]}}
                                    </span>
                                </div>
                                @endif
                                
                                <div>
                                <a href="{{url('members/'.$member->id)}}" class="font-weight-bolder font-size-h5 text-dark-75 text-hover-primary">{{$member->name}}</a>
                                    <div class="text-muted">
                                        @if ($member->role->name == 'member')
                                            member
                                        @elseif ($member->role->name == 'customer')
                                            Customer
                                        @elseif ($member->role->name == 'auther')
                                            Auther
                                        @elseif ($member->role->name == 'staff')
                                            Staff
                                        @endif 
                                    </div>
                                    <div class="mt-2">
                                        <a data-toggle="modal" data-target="#kt_chat_modal" class="btn btn-sm btn-primary font-weight-bold mr-2 py-2 px-3 px-xxl-5 my-1">Chat</a>
                                        <a data-toggle="modal" data-target="#kt_chat_modal" class="btn btn-sm btn-success font-weight-bold py-2 px-3 px-xxl-5 my-1">SMS</a>
                                    </div>
                                </div>
                            </div>
                            <!--end::User-->
                            <!--begin::Contact-->
                            <div class="py-9">
                                <div class="d-flex align-items-center justify-content-between mb-2">
                                    <span class="font-weight-bold mr-2">Email:</span>
                                    <a href="#" class="text-muted text-hover-primary">{{$member->email}}</a>
                                </div>
                                <div class="d-flex align-items-center justify-content-between mb-2">
                                    <span class="font-weight-bold mr-2">Phone:</span>
                                    <span class="text-muted">{{$member->phone}}</span>
                                </div>
                                <div class="d-flex align-items-center justify-content-between">
                                    <span class="font-weight-bold mr-2">Location:</span>
                                    <span class="text-muted">{{Helper::getCountryByKey($member->country)}}</span>
                                </div>
                            </div>
                            <!--end::Contact-->
                            {{-- <!--begin::Contact-->
                            <div class="pb-6">Contrary to popular belief, Lorem Ipsum is not simply random text. It has roots in a piece of classical.</div>
                            <!--end::Contact-->
                            <a href="#" class="btn btn-light-success font-weight-bold py-3 px-6 mb-2 text-center btn-block">Profile Overview</a> --}}
                        </div>
                        <!--end::Body-->
                    </div>
                    <!--end::Card-->
                    <!--begin::Mixed Widget 14-->
                    <div class="card card-custom gutter-b">
                        <!--begin::Header-->
                        <div class="card-header border-0 pt-5">
                            <h3 class="card-title font-weight-bolder">Action Needed</h3>
                            {{-- <div class="card-toolbar">
                                <div class="dropdown dropdown-inline">
                                    <a href="#" class="btn btn-clean btn-sm btn-icon" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                        <i class="ki ki-bold-more-hor"></i>
                                    </a>
                                    <div class="dropdown-menu dropdown-menu-md dropdown-menu-right">
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
                            </div> --}}
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
                <!--end::Aside-->
                <!--begin::Content-->
                <div class="flex-row-fluid ml-lg-8">
                   
                     <!--begin::Row-->
                     <div class="row">
                        <div class="col-lg-12 col-xxl-12">
                            <!--begin::Advance Table Widget 1-->
                            <div class="card card-custom card-stretch gutter-b">
                                <!--begin::Header-->
                                <div class="card-header border-0 py-5">
                                    <h3 class="card-title align-items-start flex-column">
                                        <span class="card-label font-weight-bolder text-dark">Projects</span>
                                        <span class="text-muted mt-3 font-weight-bold font-size-sm">ALl Your Projects Details</span>
                                    </h3>
                                    @if (auth()->user()->isAdmin() || auth()->user()->isPM())
                                        <div class="card-toolbar">
                                            <a data-toggle="modal" data-target="#new-project" class="btn btn-success font-weight-bolder font-size-sm">
                                                <span class="svg-icon svg-icon-md svg-icon-white">
                                                    <!--begin::Svg Icon | path:assets/media/svg/icons/Communication/Add-user.svg-->
                                                    <span class="svg-icon svg-icon-primary svg-icon-2x"><!--begin::Svg Icon | path:C:\wamp64\www\keenthemes\themes\metronic\theme\html\demo2\dist/../src/media/svg/icons\Design\Image.svg--><svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
                                                        <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                                            <polygon points="0 0 24 0 24 24 0 24"/>
                                                            <path d="M6,5 L18,5 C19.6568542,5 21,6.34314575 21,8 L21,17 C21,18.6568542 19.6568542,20 18,20 L6,20 C4.34314575,20 3,18.6568542 3,17 L3,8 C3,6.34314575 4.34314575,5 6,5 Z M5,17 L14,17 L9.5,11 L5,17 Z M16,14 C17.6568542,14 19,12.6568542 19,11 C19,9.34314575 17.6568542,8 16,8 C14.3431458,8 13,9.34314575 13,11 C13,12.6568542 14.3431458,14 16,14 Z" fill="#000000"/>
                                                        </g>
                                                    </svg><!--end::Svg Icon--></span>
                                                    <!--end::Svg Icon-->
                                            Add New Project</a>
                                        </div>
                                    @endif
                                </div>
                                <!--end::Header-->
                                <!--begin::Body-->
                                <div class="card-body py-0">
                                    <!--begin::Table-->
                                    <div class="table-responsive">
                                        <table class="table table-head-custom table-vertical-center" id="kt_advance_table_widget_1">
                                            <thead>
                                                <tr class="text-left">
                                                    {{-- <th class="pl-0" style="width: 20px">
                                                        <label class="checkbox checkbox-lg checkbox-single">
                                                            <input type="checkbox" value="1" />
                                                            <span></span>
                                                        </label>
                                                    </th> --}}
                                                    <th class="pr-0" style="width: 50px">Projects</th>
                                                    <th style="min-width: 200px"></th>
                                                    <th style="min-width: 100px">Services</th>
                                                    <th style="min-width: 100px">Status</th>
                                                    <th style="min-width: 100px">progress</th>
                                                    <th class="pr-0 text-right" style="min-width: 100px">action</th>
                                                   
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @if(count(Helper::teamMemberProjects($member->id)->get()))
                                                    @foreach (Helper::teamMemberProjects($member->id)->get() as $project)
                                                        <tr>
                                                            {{-- <td class="pl-0">
                                                                <label class="checkbox checkbox-lg checkbox-single">
                                                                    <input type="checkbox" value="1" />
                                                                    <span></span>
                                                                </label>
                                                            </td> --}}
                                                            <td class="pr-0">
                                                                <div class="symbol symbol-50 symbol-light mt-1">
                                                                    @if (Helper::fileExists($project->avatar, '/uploads/images/logos/projects'))
                                                                        <div class="symbol symbol-40 symbol-sm flex-shrink-0">
                                                                            <img class="h-75 align-self-end" src="{{asset('uploads/images/logos/projects/'.$project->avatar)}}" alt="photo" />
                                                                        </div>
                                                                    @else
                                                                        <div class="symbol symbol-40 symbol-sm flex-shrink-0 symbol-light-success">
                                                                            <span class="symbol-label font-size-h4">
                                                                                {{$project->name[0]}}
                                                                            </span>
                                                                        </div>
                                                                    @endif
                                                                </div>
                                                            </td>
                                                            <td class="pl-0">
                                                                <a href="{{$project->id}}" class="text-dark-75 font-weight-bolder text-hover-primary mb-1 font-size-lg">{{$project->name}}</a>
                                                                @if (!empty($project->services))
                                                                    @if(count(Helper::services()) > 0)
                                                                        <span class="text-muted font-weight-bold text-muted d-block">
                                                                            @foreach (Helper::services() as $service)
                                                                                @if(in_array( $service->name, json_decode($project->services)))
                                                                                    @if ($loop->last)
                                                                                        {{$service->name}}
                                                                                    @else
                                                                                        {{$service->name}},
                                                                                    @endif
                                                                                @endif
                                                                            @endforeach
                                                                        </span>
                                                                    @endif           
                                                                @endif
                                                              
                                                            </td>
                                                            <td>
                                                                <span class="text-dark-75 font-weight-bolder d-block font-size-lg">Intertico</span>
                                                                @if (!empty($project->technologies))
                                                                    @if(count(Helper::technologies()) > 0)
                                                                        <span class="text-muted font-weight-bold text-muted d-block">
                                                                            @foreach (Helper::technologies() as $technology)
                                                                                @if(in_array( $technology->name, json_decode($project->technologies)))
                                                                                    @if ($loop->last)
                                                                                        {{$technology->name}}
                                                                                    @else
                                                                                        {{$technology->name}},
                                                                                    @endif
                                                                                @endif
                                                                            @endforeach
                                                                        </span>
                                                                    @endif           
                                                                @endif
                                                            </td>
                                                            <td class="pt-5">
                                                                @if ($project->status == 0)
                                                                    <span class="label label-inline label-light-danger font-weight-bold">
                                                                        Pending
                                                                    </span>
                                                                @elseif ($project->status == 1)
                                                                    <span class="label label-inline label-light-primary font-weight-bold">
                                                                        In Progress
                                                                    </span>
                                                                @elseif ($project->status == 2)
                                                                    <span class="label label-inline label-light-warning  font-weight-bold">
                                                                        Waiting Customer
                                                                    </span>
                                                                @elseif ($project->status == 3)
                                                                    <span class="label label-inline label-light-successfont-weight-bold">
                                                                        Completed
                                                                    </span>
                                                                @endif
                                                            </td>
                                                            <td>
                                                                @if ($project->progress < 20)
                                                                <div class="d-flex flex-column w-100 mr-2">
                                                                    <div class="d-flex align-items-center justify-content-between mb-2">
                                                                        <span class="text-muted mr-2 font-size-sm font-weight-bold">{{$project->progress}}</span>
                                                                        <span class="text-muted font-size-sm font-weight-bold">Progress</span>
                                                                    </div>
                                                                    <div class="progress progress-xs w-100">
                                                                    <div class="progress-bar bg-danger" role="progressbar" style="width: 5%;" aria-valuenow="{{$project->progress}}" aria-valuemin="0" aria-valuemax="100"></div>
                                                                    </div>
                                                                </div>
                                                            @elseif ($project->progress <= 40)
                                                                <div class="d-flex flex-column w-100 mr-2">
                                                                    <div class="d-flex align-items-center justify-content-between mb-2">
                                                                        <span class="text-muted mr-2 font-size-sm font-weight-bold">{{$project->progress}}</span>
                                                                        <span class="text-muted font-size-sm font-weight-bold">Progress</span>
                                                                    </div>
                                                                    <div class="progress progress-xs w-100">
                                                                    <div class="progress-bar bg-primary" role="progressbar" style="width: {{$project->progress}}%;" aria-valuenow="{{$project->progress}}" aria-valuemin="0" aria-valuemax="100"></div>
                                                                    </div>
                                                                </div>
                                                            @elseif ($project->progress <= 60)
                                                                <div class="d-flex flex-column w-100 mr-2">
                                                                    <div class="d-flex align-items-center justify-content-between mb-2">
                                                                        <span class="text-muted mr-2 font-size-sm font-weight-bold">{{$project->progress}}</span>
                                                                        <span class="text-muted font-size-sm font-weight-bold">Progress</span>
                                                                    </div>
                                                                    <div class="progress progress-xs w-100">
                                                                    <div class="progress-bar bg-info" role="progressbar" style="width: {{$project->progress}}%;" aria-valuenow="{{$project->progress}}" aria-valuemin="0" aria-valuemax="100"></div>
                                                                    </div>
                                                                </div>
                                                            @elseif ($project->progress <= 80)
                                                                <div class="d-flex flex-column w-100 mr-2">
                                                                    <div class="d-flex align-items-center justify-content-between mb-2">
                                                                        <span class="text-muted mr-2 font-size-sm font-weight-bold">{{$project->progress}}</span>
                                                                        <span class="text-muted font-size-sm font-weight-bold">Progress</span>
                                                                    </div>
                                                                    <div class="progress progress-xs w-100">
                                                                    <div class="progress-bar bg-warning" role="progressbar" style="width: {{$project->progress}}%;" aria-valuenow="{{$project->progress}}" aria-valuemin="0" aria-valuemax="100"></div>
                                                                    </div>
                                                                </div>
                                                            @elseif ($project->progress <= 100)
                                                                <div class="d-flex flex-column w-100 mr-2">
                                                                    <div class="d-flex align-items-center justify-content-between mb-2">
                                                                        <span class="text-muted mr-2 font-size-sm font-weight-bold">{{$project->progress}}</span>
                                                                        <span class="text-muted font-size-sm font-weight-bold">Progress</span>
                                                                    </div>
                                                                    <div class="progress progress-xs w-100">
                                                                    <div class="progress-bar bg-success" role="progressbar" style="width: {{$project->progress}}%;" aria-valuenow="{{$project->progress}}" aria-valuemin="0" aria-valuemax="100"></div>
                                                                    </div>
                                                                </div>
                                                            @endif
                                                            </td>
                                                            <td class="pr-0 text-right">
                                                                <a class="btn btn-sm btn-clean btn-icon" title="Show" href="{{url('projects/'.$project->id)}}">
                                                                    <span class="svg-icon svg-icon-primary svg-icon-2x"><!--begin::Svg Icon | path:C:\wamp64\www\keenthemes\themes\metronic\theme\html\demo2\dist/../src/media/svg/icons\General\Settings-1.svg--><svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
                                                                        <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                                                            <rect x="0" y="0" width="24" height="24"/>
                                                                            <path d="M7,3 L17,3 C19.209139,3 21,4.790861 21,7 C21,9.209139 19.209139,11 17,11 L7,11 C4.790861,11 3,9.209139 3,7 C3,4.790861 4.790861,3 7,3 Z M7,9 C8.1045695,9 9,8.1045695 9,7 C9,5.8954305 8.1045695,5 7,5 C5.8954305,5 5,5.8954305 5,7 C5,8.1045695 5.8954305,9 7,9 Z" fill="#000000"/>
                                                                            <path d="M7,13 L17,13 C19.209139,13 21,14.790861 21,17 C21,19.209139 19.209139,21 17,21 L7,21 C4.790861,21 3,19.209139 3,17 C3,14.790861 4.790861,13 7,13 Z M17,19 C18.1045695,19 19,18.1045695 19,17 C19,15.8954305 18.1045695,15 17,15 C15.8954305,15 15,15.8954305 15,17 C15,18.1045695 15.8954305,19 17,19 Z" fill="#000000" opacity="0.3"/>
                                                                        </g>
                                                                    </svg><!--end::Svg Icon-->
                                                                    </span>
                                                                </a>
                                                                @if (auth()->user()->isPM() || auth()->user()->isAdmin())
                                                                    <a class="btn btn-sm btn-clean btn-icon edit-project-btn" title="Edit" data-toggle="modal" data-target="#edit-project-{{$project->id}}">
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
                                                @else
                                                    <tr>
                                                        <td colspan="5">
                                                            <div class="text-center p-4">
                                                                <span class="symbol-label">
                                                                <a href="{{url('quotation')}}">Start Quotation Request</a>
                                                                </span>
                                                            </div>
                                                        </td>
                                                    </tr>
                                                @endif
                                                
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
                    <!--begin::Advance Table Widget 5-->
                    <div class="card card-custom gutter-b">
                        <!--begin::Header-->
                        <div class="card-header border-0 py-5">
                            <h3 class="card-title align-items-start flex-column">
                                <span class="card-label font-weight-bolder text-dark">Tasks</span>
                            <span class="text-muted mt-3 font-weight-bold font-size-sm">More than {{count(Helper::teamMembertasks($member->id))}}+ tasks</span>
                            </h3>
                            <div class="card-toolbar">
                                <a data-toggle="modal" data-target="#new-task" class="btn btn-info font-weight-bolder font-size-sm">New Task</a>
                            </div>
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
                                            <th style="min-width: 100px">status</th>
                                            <th class="pr-0 text-right" style="min-width: 100px">action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @if (count(Helper::teamMembertasks($member->id)) > 0)
                                        @foreach (Helper::teamMembertasks($member->id) as $task)
                                            <tr>
                                                <td class="pl-0">
                                                    <a class="text-dark-75 mt-3 d-block" href="{{url('tasks/'. $task->id)}}">
                                                        {{$task->id}}
                                                    </a>
                                                </td>
                                                <td>
                                                    <a class="text-dark-75 mt-3 d-block  font-weight-bolder font-size-lg" href="{{url('tasks/'. $task->id)}}">
                                                        {{$task->name}}
                                                    </a>
                                                    <span class="text-muted font-weight-bold">{{$task->project->name}}</span>
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
                <!--end::Content-->
            </div>
            <!--end::Profile 4-->
        </div>
        <!--end::Container-->
    </div>
    <!--end::Entry-->
@endsection
@section('modals')

    <!--begin::New project Modal-->
    <div class="modal fade wide-modal" id="new-project" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">New Project</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
            </div>
            <div class="modal-body">
                @include('projects.create')
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
            </div>
        </div>
        </div>
    </div>
    <!--end::New project Modal-->
    <!--begin::Edit project Modal-->
    @foreach (Helper::teamMemberProjects($member->id) as $project)
        <div class="modal fade wide-modal" id="edit-project-{{$project->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Edit {{$project->name}}</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
                </div>
                <div class="modal-body">
                    @include('projects.edit', ['project' => $project])
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                </div>
            </div>
            </div>
        </div>
    @endforeach
    <!--end::Edit project Modal-->

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
                @include('tasks.create')
            </div>
        </div>
        </div>
    </div>
    <!--end::New task Modal-->
    <!--begin::Edit task Modal-->
    @foreach (Helper::teamMembertasks($member->id) as $task)
        <div class="modal fade wide-modal" id="edit-task-{{$task->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Edit {{$task->name}}</h5>
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
    <!--end::Edit task Modal-->
@endsection
@section('scripts')
    <script>
        

        $(document).ready(function(){
            $('.edit-project-btn').click(function(){
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
                        });
                        reader.readAsDataURL(file);
                    } 
                })
                
                var statusInput = $('#status_selectpicker_' + id);
                var statusValue = statusInput.attr('value');
                console.log(statusValue);
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
            // input group and left alignment setup
            $('.daterangepicke').daterangepicker({
                buttonClasses: ' btn',
                applyClass: 'btn-primary',
                cancelClass: 'btn-secondary'
            }, function(start, end, label) {
                $('.daterangepicke .form-control').val( start.format('YYYY-MM-DD') + ' / ' + end.format('YYYY-MM-DD'));
            }); 

            var sliderCreate = document.getElementById('progress_create');
                var sliderCreateInput = document.getElementById('progress_create_input');
                var start = sliderCreateInput.value;
                noUiSlider.create(sliderCreate, {
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
                    sliderCreate.noUiSlider.on('update', function( values, handle ) {
                        sliderCreateInput.value = values[handle];
                });

                sliderCreateInput.addEventListener('change', function(){
                    sliderCreate.noUiSlider.set(this.value);
                });

            $('.kt-selectpicker').selectpicker();

            $('.edit-task-btn').click(function(){
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
                        });
                        reader.readAsDataURL(file);
                    } 
                })
                
                var statusInput = $('#status_selectpicker_' + id);
                var statusValue = statusInput.attr('value');
                console.log(statusValue);
                statusInput.selectpicker('val', statusValue);

                slider.noUiSlider.on('update', function( values, handle ) {
                    sliderInput.value = values[handle];
                });

                sliderInput.addEventListener('change', function(){
                    slider.noUiSlider.set(this.value);
                });
            }) 

            var _initMixedWidget14 = function() {
                // variables 
                var element = document.getElementById("tasks_progress_chart");
                var height = parseInt(KTUtil.css(element, 'height'));
                
                var tasks = @json(Helper::teamMembertasks($member->id));
                var completed = [];

                for (const key in tasks) {
                    if (tasks.hasOwnProperty(key)) {
                        if(tasks[key].status == 3){
                            completed.push(key);
                        }
                    }
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
        })
    </script> 
	 <!--begin::Page Scripts(used by this page)-->
    <script src="{{asset('assets/js/pages/custom/profile/profile.js')}}"></script>
@endsection
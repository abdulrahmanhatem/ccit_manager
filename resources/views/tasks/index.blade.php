


@extends('layouts.app')
@section('title', 'Tasks')
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
                    <h2 class="text-white font-weight-bold my-2 mr-5">Tasks</h2>
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
                        <a href="{{url('tasks')}}" class="text-white text-hover-white opacity-75 hover-opacity-100">Tasks</a>
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
            <!--begin::Todo-->
            <div class="d-flex flex-row">
                <!--begin::Aside-->
                <div class="flex-row-auto offcanvas-mobile w-200px w-xxl-275px" id="kt_todo_aside">
                    <!--begin::Card-->
                    <div class="card card-custom card-stretch">
                        <!--begin::Body-->
                        <div class="card-body px-5">
                            <!--begin:Nav-->
                            <div class="navi navi-hover navi-active navi-link-rounded navi-bold navi-icon-center navi-light-icon">
                                <!--begin:Item-->
                                <div class="navi-item my-2">
                                    @if ($main == '')
                                        <a href="{{url('tasks')}}" class="navi-link active">
                                    @else
                                        <a href="{{url('tasks')}}" class="navi-link">
                                    @endif
                                        <span class="navi-icon mr-4">
                                            <span class="svg-icon svg-icon-lg">
                                                <!--begin::Svg Icon | pathasset'assets/media/svg/icons/Communication/Mail-heart.svg-->
                                                <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
                                                    <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                                        <rect x="0" y="0" width="24" height="24" />
                                                        <path d="M6,2 L18,2 C18.5522847,2 19,2.44771525 19,3 L19,13 C19,13.5522847 18.5522847,14 18,14 L6,14 C5.44771525,14 5,13.5522847 5,13 L5,3 C5,2.44771525 5.44771525,2 6,2 Z M13.8,4 C13.1562,4 12.4033,4.72985286 12,5.2 C11.5967,4.72985286 10.8438,4 10.2,4 C9.0604,4 8.4,4.88887193 8.4,6.02016349 C8.4,7.27338783 9.6,8.6 12,10 C14.4,8.6 15.6,7.3 15.6,6.1 C15.6,4.96870845 14.9396,4 13.8,4 Z" fill="#000000" opacity="0.3" />
                                                        <path d="M3.79274528,6.57253826 L12,12.5 L20.2072547,6.57253826 C20.4311176,6.4108595 20.7436609,6.46126971 20.9053396,6.68513259 C20.9668779,6.77033951 21,6.87277228 21,6.97787787 L21,17 C21,18.1045695 20.1045695,19 19,19 L5,19 C3.8954305,19 3,18.1045695 3,17 L3,6.97787787 C3,6.70173549 3.22385763,6.47787787 3.5,6.47787787 C3.60510559,6.47787787 3.70753836,6.51099993 3.79274528,6.57253826 Z" fill="#000000" />
                                                    </g>
                                                </svg>
                                                <!--end::Svg Icon-->
                                            </span>
                                        </span>
                                        <span class="navi-text font-weight-bolder font-size-lg">Tasks</span>
                                        <span class="navi-label">
                                        <span class="label label-rounded label-light-success font-weight-bolder">{{count($tasks)}}</span>
                                        </span>
                                    </a>
                                </div>
                                <!--end:Item-->
                                <!--begin:Item-->
                                <div class="navi-item my-2">
                                    @if ($main == 1)
                                    <a href="{{url('tasks/marked')}}" class="navi-link active">
                                    @else
                                    <a href="{{url('tasks/marked')}}" class="navi-link">
                                    @endif
                                    
                                        <span class="navi-icon mr-4">
                                            <span class="svg-icon svg-icon-lg">
                                                <!--begin::Svg Icon | pathasset'assets/media/svg/icons/General/Half-star.svg-->
                                                <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
                                                    <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                                        <polygon points="0 0 24 0 24 24 0 24" />
                                                        <path d="M12,4.25932872 C12.1488635,4.25921584 12.3000368,4.29247316 12.4425657,4.36281539 C12.6397783,4.46014562 12.7994058,4.61977315 12.8967361,4.81698575 L14.9389263,8.95491503 L19.5054023,9.61846284 C20.0519472,9.69788046 20.4306287,10.2053233 20.351211,10.7518682 C20.3195865,10.9695052 20.2170993,11.1706476 20.0596157,11.3241562 L16.7552826,14.545085 L17.5353298,19.0931094 C17.6286908,19.6374458 17.263103,20.1544017 16.7187666,20.2477627 C16.5020089,20.2849396 16.2790408,20.2496249 16.0843804,20.1472858 L12,18 L12,4.25932872 Z" fill="#000000" opacity="0.3" />
                                                        <path d="M12,4.25932872 L12,18 L7.91561963,20.1472858 C7.42677504,20.4042866 6.82214789,20.2163401 6.56514708,19.7274955 C6.46280801,19.5328351 6.42749334,19.309867 6.46467018,19.0931094 L7.24471742,14.545085 L3.94038429,11.3241562 C3.54490071,10.938655 3.5368084,10.3055417 3.92230962,9.91005817 C4.07581822,9.75257453 4.27696063,9.65008735 4.49459766,9.61846284 L9.06107374,8.95491503 L11.1032639,4.81698575 C11.277344,4.464261 11.6315987,4.25960807 12,4.25932872 Z" fill="#000000" />
                                                    </g>
                                                </svg>
                                                <!--end::Svg Icon-->
                                            </span>
                                        </span>
                                        <span class="navi-text font-weight-bolder font-size-lg">Marked</span>
                                    </a>
                                </div>
                                <!--end:Item-->
                                {{-- <!--begin:Item-->
                                <div class="navi-item my-2">
                                    <a href="#" class="navi-link">
                                        <span class="navi-icon mr-4">
                                            <span class="svg-icon svg-icon-lg">
                                                <!--begin::Svg Icon | pathasset'assets/media/svg/icons/Design/PenAndRuller.svg-->
                                                <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
                                                    <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                                        <rect x="0" y="0" width="24" height="24" />
                                                        <path d="M3,16 L5,16 C5.55228475,16 6,15.5522847 6,15 C6,14.4477153 5.55228475,14 5,14 L3,14 L3,12 L5,12 C5.55228475,12 6,11.5522847 6,11 C6,10.4477153 5.55228475,10 5,10 L3,10 L3,8 L5,8 C5.55228475,8 6,7.55228475 6,7 C6,6.44771525 5.55228475,6 5,6 L3,6 L3,4 C3,3.44771525 3.44771525,3 4,3 L10,3 C10.5522847,3 11,3.44771525 11,4 L11,19 C11,19.5522847 10.5522847,20 10,20 L4,20 C3.44771525,20 3,19.5522847 3,19 L3,16 Z" fill="#000000" opacity="0.3" />
                                                        <path d="M16,3 L19,3 C20.1045695,3 21,3.8954305 21,5 L21,15.2485298 C21,15.7329761 20.8241635,16.200956 20.5051534,16.565539 L17.8762883,19.5699562 C17.6944473,19.7777745 17.378566,19.7988332 17.1707477,19.6169922 C17.1540423,19.602375 17.1383289,19.5866616 17.1237117,19.5699562 L14.4948466,16.565539 C14.1758365,16.200956 14,15.7329761 14,15.2485298 L14,5 C14,3.8954305 14.8954305,3 16,3 Z" fill="#000000" />
                                                    </g>
                                                </svg>
                                                <!--end::Svg Icon-->
                                            </span>
                                        </span>
                                        <span class="navi-text font-weight-bolder font-size-lg">Draft</span>
                                        <span class="navi-label">
                                            <span class="label label-rounded label-light-warning font-weight-bolder">5</span>
                                        </span>
                                    </a>
                                </div>
                                <!--end:Item--> --}}
                                {{-- <!--begin:Item-->
                                <div class="navi-item my-2">
                                    <a href="#" class="navi-link">
                                        <span class="navi-icon mr-4">
                                            <span class="svg-icon svg-icon-lg">
                                                <!--begin::Svg Icon | pathasset'assets/media/svg/icons/Communication/Sending.svg-->
                                                <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
                                                    <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                                        <rect x="0" y="0" width="24" height="24" />
                                                        <path d="M8,13.1668961 L20.4470385,11.9999863 L8,10.8330764 L8,5.77181995 C8,5.70108058 8.01501031,5.63114635 8.04403925,5.56663761 C8.15735832,5.31481744 8.45336217,5.20254012 8.70518234,5.31585919 L22.545552,11.5440255 C22.6569791,11.5941677 22.7461882,11.6833768 22.7963304,11.794804 C22.9096495,12.0466241 22.7973722,12.342628 22.545552,12.455947 L8.70518234,18.6841134 C8.64067359,18.7131423 8.57073936,18.7281526 8.5,18.7281526 C8.22385763,18.7281526 8,18.504295 8,18.2281526 L8,13.1668961 Z" fill="#000000" />
                                                        <path d="M4,16 L5,16 C5.55228475,16 6,16.4477153 6,17 C6,17.5522847 5.55228475,18 5,18 L4,18 C3.44771525,18 3,17.5522847 3,17 C3,16.4477153 3.44771525,16 4,16 Z M1,11 L5,11 C5.55228475,11 6,11.4477153 6,12 C6,12.5522847 5.55228475,13 5,13 L1,13 C0.44771525,13 6.76353751e-17,12.5522847 0,12 C-6.76353751e-17,11.4477153 0.44771525,11 1,11 Z M4,6 L5,6 C5.55228475,6 6,6.44771525 6,7 C6,7.55228475 5.55228475,8 5,8 L4,8 C3.44771525,8 3,7.55228475 3,7 C3,6.44771525 3.44771525,6 4,6 Z" fill="#000000" opacity="0.3" />
                                                    </g>
                                                </svg>
                                                <!--end::Svg Icon-->
                                            </span>
                                        </span>
                                        <span class="navi-text font-weight-bolder font-size-lg">Sent</span>
                                    </a>
                                </div>
                                <!--end:Item--> --}}
                                <!--begin:Item-->
                                <div class="navi-item my-2">
                                    @if ($main == 2)
                                        <a href="{{url('tasks/trash')}}" class="navi-link active">
                                    @else
                                        <a href="{{url('tasks/trash')}}" class="navi-link">
                                    @endif
                                        <span class="navi-icon mr-4">
                                            <span class="svg-icon svg-icon-lg">
                                                <!--begin::Svg Icon | pathasset'assets/media/svg/icons/General/Trash.svg-->
                                                <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
                                                    <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                                        <rect x="0" y="0" width="24" height="24" />
                                                        <path d="M6,8 L6,20.5 C6,21.3284271 6.67157288,22 7.5,22 L16.5,22 C17.3284271,22 18,21.3284271 18,20.5 L18,8 L6,8 Z" fill="#000000" fill-rule="nonzero" />
                                                        <path d="M14,4.5 L14,4 C14,3.44771525 13.5522847,3 13,3 L11,3 C10.4477153,3 10,3.44771525 10,4 L10,4.5 L5.5,4.5 C5.22385763,4.5 5,4.72385763 5,5 L5,5.5 C5,5.77614237 5.22385763,6 5.5,6 L18.5,6 C18.7761424,6 19,5.77614237 19,5.5 L19,5 C19,4.72385763 18.7761424,4.5 18.5,4.5 L14,4.5 Z" fill="#000000" opacity="0.3" />
                                                    </g>
                                                </svg>
                                                <!--end::Svg Icon-->
                                            </span>
                                        </span>
                                        <span class="navi-text font-weight-bolder font-size-lg">Trash</span>
                                    </a>
                                </div>
                                <!--end:Item-->
                                <!--begin:Section-->
                                <div class="navi-section mt-7 mb-2 font-size-h6 font-weight-bold pb-0">Tags</div>
                                <!--end:Section-->
                                <!--begin:Item-->
                                <div class="navi-item my-2">
                                    @if ($status == 0)
                                        <a href="{{url('tasks/status/0')}}" class="navi-link active">
                                    @else
                                        <a href="{{url('tasks/status/0')}}" class="navi-link">
                                    @endif
                                    
                                        <span class="navi-icon mr-4">
                                            <i class="fa fa-genderless text-danger"></i>
                                        </span>
                                        <span class="navi-text font-weight-bolder font-size-lg">Pending</span>
                                        <span class="navi-label">
                                            <span class="label label-rounded label-light-danger font-weight-bolder">6</span>
                                        </span>
                                    </a>
                                </div>
                                <!--end:Item-->
                                <!--begin:Item-->
                                <div class="navi-item my-2">
                                    @if ($status == 1)
                                        <a href="{{url('tasks/status/1')}}" class="navi-link active">
                                    @else
                                        <a href="{{url('tasks/status/1')}}" class="navi-link">
                                    @endif
                                        <span class="navi-icon mr-4">
                                            <i class="fa fa-genderless text-info"></i>
                                        </span>
                                        <span class="navi-text font-weight-bolder font-size-lg">In Progress</span>
                                    </a>
                                </div>
                                <!--end:Item-->
                                <!--begin:Item-->
                                <div class="navi-item my-2">
                                    @if ($status == 2)
                                        <a href="{{url('tasks/status/2')}}" class="navi-link active">
                                    @else
                                        <a href="{{url('tasks/status/2')}}" class="navi-link">
                                    @endif
                                        <span class="navi-icon mr-4">
                                            <i class="fa fa-genderless text-warning"></i>
                                        </span>
                                        <span class="navi-text font-weight-bolder font-size-lg">Waiting Customer</span>
                                    </a>
                                </div>
                                <!--end:Item-->
                                <!--begin:Item-->
                                <div class="navi-item my-2">
                                    @if ($status == 3)
                                        <a href="{{url('tasks/status/3')}}" class="navi-link active">
                                    @else
                                        <a href="{{url('tasks/status/3')}}" class="navi-link">
                                    @endif
                                        <span class="navi-icon mr-4">
                                            <i class="fa fa-genderless text-success"></i>
                                        </span>
                                        <span class="navi-text font-weight-bolder font-size-lg">Completed</span>
                                    </a>
                                </div>
                                <!--end:Item-->
                                <!--begin:Section-->
                                <div class="navi-section mt-7 mb-2 font-size-h6 font-weight-bold pb-0">Projects</div>
                                <!--end:Section-->
                                @foreach (Helper::projectSorting(10) as $project)
                                    @foreach (Helper::projectSorting(10) as $project)
                                        @if (count($project->tasks) > 0)
                                            <!--begin:Item-->
                                            <div class="navi-item my-2">
                                                @if ($expProject)
                                                    @if ($expProject->id == $project->id)
                                                        <a href="{{url('projects/'.$project->id.'/tasks')}}" class="navi-link">
                                                    @else
                                                        <a href="{{url('projects/'.$project->id.'/tasks')}}" class="navi-link">
                                                    @endif
                                                @else
                                                <a href="{{url('projects/'.$project->id.'/tasks')}}" class="navi-link">
                                                @endif
                                               
                                                
                                                    <span class="navi-icon mr-4">
                                                        <span class="svg-icon svg-icon-lg">
                                                            <!--begin::Svg Icon | pathasset'assets/media/svg/icons/Navigation/Angle-double-right.svg-->
                                                            <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
                                                                <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                                                    <polygon points="0 0 24 0 24 24 0 24" />
                                                                    <path d="M12.2928955,6.70710318 C11.9023712,6.31657888 11.9023712,5.68341391 12.2928955,5.29288961 C12.6834198,4.90236532 13.3165848,4.90236532 13.7071091,5.29288961 L19.7071091,11.2928896 C20.085688,11.6714686 20.0989336,12.281055 19.7371564,12.675721 L14.2371564,18.675721 C13.863964,19.08284 13.2313966,19.1103429 12.8242777,18.7371505 C12.4171587,18.3639581 12.3896557,17.7313908 12.7628481,17.3242718 L17.6158645,12.0300721 L12.2928955,6.70710318 Z" fill="#000000" fill-rule="nonzero" />
                                                                    <path d="M3.70710678,15.7071068 C3.31658249,16.0976311 2.68341751,16.0976311 2.29289322,15.7071068 C1.90236893,15.3165825 1.90236893,14.6834175 2.29289322,14.2928932 L8.29289322,8.29289322 C8.67147216,7.91431428 9.28105859,7.90106866 9.67572463,8.26284586 L15.6757246,13.7628459 C16.0828436,14.1360383 16.1103465,14.7686056 15.7371541,15.1757246 C15.3639617,15.5828436 14.7313944,15.6103465 14.3242754,15.2371541 L9.03007575,10.3841378 L3.70710678,15.7071068 Z" fill="#000000" fill-rule="nonzero" opacity="0.3" transform="translate(9.000003, 11.999999) rotate(-270.000000) translate(-9.000003, -11.999999)" />
                                                                </g>
                                                            </svg>
                                                            <!--end::Svg Icon-->
                                                        </span>
                                                    </span>
                                                    <span class="navi-text font-weight-bolder font-size-lg">{{$project->name}}</span>
                                                    <span class="navi-label">
                                                        @if (count($project->tasks) > 0)
                                                            <span class="label label-rounded label-light-success font-weight-bold">{{count($project->tasks)}}</span>
                                                        @endif
                                                    </span>
                                                </a>
                                            </div>
                                            <!--end:Item-->
                                        @endif
                                    @endforeach
                                @endforeach
                                <!--begin:Item-->
                                <div class="navi-item my-2">
                                    <a data-toggle="modal" data-target="#new-project" class="navi-link">
                                        <span class="navi-icon mr-4">
                                            <i class="fa flaticon2-plus icon-1x"></i>
                                        </span>
                                        <span class="navi-text font-weight-bolder font-size-lg">Add Project</span>
                                    </a>
                                </div>
                                
                                {{-- <!--begin:Item-->
                                <div class="navi-item my-2">
                                    <a href="#" class="navi-link">
                                        <span class="navi-icon mr-4">
                                            <i class="fa flaticon2-plus icon-1x"></i>
                                        </span>
                                        <span class="navi-text font-weight-bolder font-size-lg">Add Label</span>
                                    </a>
                                </div>
                                <!--end:Item--> --}}
                            </div>
                                <!--end:Nav-->
                        </div>
                        <!--end::Body-->
                    </div>
                    <!--end::Card-->
                </div>
                <!--end::Aside-->
                <!--begin::List-->
                <div class="flex-row-fluid ml-lg-8">
                    <div class="d-flex flex-column flex-grow-1">
                        <!--begin::Head-->
                        <div class="card card-custom gutter-b">
                            <!--begin::Body-->
                            <div class="card-body d-flex align-items-center justify-content-between flex-wrap py-3">
                                <!--begin::Info-->
                                <div class="d-flex align-items-center mr-2 py-2">
                                    <!--begin::Title-->
                                    @if ($expProject)
                                        <h3 class="font-weight-bold mb-0 mr-10">{{$expProject->name}}</h3>
                                    @else
                                        <h3 class="font-weight-bold mb-0 mr-10">All Tasks</h3>
                                    @endif
                                    
                                    <!--end::Title-->
                                    <!--begin::Navigation-->
                                    <div class="d-flex mr-3">
                                        <!--begin::Navi-->
                                        <div class="navi navi-hover navi-active navi-link-rounded navi-bold d-flex flex-row">
                                            <!--begin::Item-->
                                            <div class="navi-item mr-2">
                                            <a href="{{url('tasks')}}" class="navi-link active">
                                                    <span class="navi-text">Tasks</span>
                                                </a>
                                            </div>
                                            <!--end::Item-->
                                            <!--begin::Item-->
                                            <div class="navi-item mr-2">
                                                <a href="{{url('tasks/files')}}" class="navi-link">
                                                    <span class="navi-text">Files</span>
                                                </a>
                                            </div>
                                            <!--end::Item-->
                                        </div>
                                        <!--end::Navi-->
                                        <!--begin::Dropdown-->
                                        <div class="dropdown">
                                            <a href="#" class="btn btn-clean btn-icon" data-toggle="dropdown">
                                                <i class="ki ki-bold-more-hor font-size-md"></i>
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
                                        <!--end::Dropdown-->
                                    </div>
                                    <!--end::Navigation-->
                                </div>
                                <!--end::Info-->
                                <!--begin::Users-->
                                <div class="symbol-group symbol-hover py-2">
                                    <div class="symbol symbol-30" data-toggle="tooltip" data-placement="top" title="Alice Stone">
                                        <img alt="Pic" src="{{asset('assets/media/users/300_19.jpg')}}" />
                                    </div>
                                    <div class="symbol symbol-30" data-toggle="tooltip" data-placement="top" title="Anna Krox">
                                        <img alt="Pic" src="{{asset('assets/media/users/300_21.jpg')}}" />
                                    </div>
                                    <div class="symbol symbol-30" data-toggle="tooltip" data-placement="top" title="Nick Nilson">
                                        <img alt="Pic" src="{{asset('assets/media/users/300_22.jpg')}}" />
                                    </div>
                                    <div class="symbol symbol-30" data-toggle="tooltip" data-placement="top" title="Ana Tor">
                                        <img alt="Pic" src="{{asset('assets/media/users/300_23.jpg')}}" />
                                    </div>
                                    <div class="symbol symbol-30 symbol-light-primary" data-toggle="tooltip" data-placement="top" title="New user" role="button">
                                        <span class="symbol-label font-weight-bold">
                                            <i class="fa flaticon2-plus font-size-sm"></i>
                                        </span>
                                    </div>
                                </div>
                                <!--end::Users-->
                            </div>
                            <!--end::Body-->
                        </div>
                        <!--end::Head-->
                        <!--begin::Row-->
                        <div class="row">
                            <div class="col-xl-6">
                                <!--begin::Card-->
                                <div class="card card-custom card-stretch" id="kt_todo_list">
                                    <!--begin::Header-->
                                    <div class="card-header align-items-center flex-wrap py-6 border-0 h-auto">
                                        <!--begin::Toolbar-->
                                        <div class="d-flex flex-wrap align-items-center">
                                            <div class="d-flex align-items-center mr-1 my-2">
                                                {{-- <label data-task="group-select" class="checkbox checkbox-single checkbox-primary mr-3">
                                                    <input type="checkbox" />
                                                    <span class="symbol-label"></span>
                                                </label> --}}
                                                <div class="btn-group">
                                                    <span class="btn btn-clean btn-icon btn-sm mr-1" data-toggle="dropdown" role="button">
                                                        <i class="ki ki-bold-arrow-down icon-sm"></i>
                                                    </span>
                                                    <div class="dropdown-menu dropdown-menu-left p-0 m-0 dropdown-menu-sm">
                                                        <ul class="navi py-3">
                                                            <li class="navi-item">
                                                                <a href="#" class="navi-link">
                                                                    <span class="navi-text">All</span>
                                                                </a>
                                                            </li>
                                                            <li class="navi-item">
                                                                <a href="#" class="navi-link">
                                                                    <span class="navi-text">Read</span>
                                                                </a>
                                                            </li>
                                                            <li class="navi-item">
                                                                <a href="#" class="navi-link">
                                                                    <span class="navi-text">Unread</span>
                                                                </a>
                                                            </li>
                                                            <li class="navi-item">
                                                                <a href="#" class="navi-link">
                                                                    <span class="navi-text">Starred</span>
                                                                </a>
                                                            </li>
                                                            <li class="navi-item">
                                                                <a href="#" class="navi-link">
                                                                    <span class="navi-text">Unstarred</span>
                                                                </a>
                                                            </li>
                                                        </ul>
                                                    </div>
                                                </div>
                                                <span class="btn btn-clean btn-icon btn-sm mr-2" data-toggle="tooltip" title="Reload list">
                                                    <i class="ki ki-refresh icon-1x"></i>
                                                </span>
                                            </div>
                                            <div class="d-flex align-items-center mr-1 my-2">
                                                <span class="btn btn-default btn-icon btn-sm mr-2" data-toggle="tooltip" title="Archive">
                                                    <span class="svg-icon svg-icon-md">
                                                        <!--begin::Svg Icon | pathasset'assets/media/svg/icons/Communication/Mail-opened.svg-->
                                                        <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
                                                            <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                                                <rect x="0" y="0" width="24" height="24" />
                                                                <path d="M6,2 L18,2 C18.5522847,2 19,2.44771525 19,3 L19,12 C19,12.5522847 18.5522847,13 18,13 L6,13 C5.44771525,13 5,12.5522847 5,12 L5,3 C5,2.44771525 5.44771525,2 6,2 Z M7.5,5 C7.22385763,5 7,5.22385763 7,5.5 C7,5.77614237 7.22385763,6 7.5,6 L13.5,6 C13.7761424,6 14,5.77614237 14,5.5 C14,5.22385763 13.7761424,5 13.5,5 L7.5,5 Z M7.5,7 C7.22385763,7 7,7.22385763 7,7.5 C7,7.77614237 7.22385763,8 7.5,8 L10.5,8 C10.7761424,8 11,7.77614237 11,7.5 C11,7.22385763 10.7761424,7 10.5,7 L7.5,7 Z" fill="#000000" opacity="0.3" />
                                                                <path d="M3.79274528,6.57253826 L12,12.5 L20.2072547,6.57253826 C20.4311176,6.4108595 20.7436609,6.46126971 20.9053396,6.68513259 C20.9668779,6.77033951 21,6.87277228 21,6.97787787 L21,17 C21,18.1045695 20.1045695,19 19,19 L5,19 C3.8954305,19 3,18.1045695 3,17 L3,6.97787787 C3,6.70173549 3.22385763,6.47787787 3.5,6.47787787 C3.60510559,6.47787787 3.70753836,6.51099993 3.79274528,6.57253826 Z" fill="#000000" />
                                                            </g>
                                                        </svg>
                                                        <!--end::Svg Icon-->
                                                    </span>
                                                </span>
                                                <span class="btn btn-default btn-icon btn-sm mr-2" data-toggle="tooltip" title="Spam">
                                                    <span class="svg-icon svg-icon-md">
                                                        <!--begin::Svg Icon | pathasset'assets/media/svg/icons/Code/Warning-1-circle.svg-->
                                                        <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
                                                            <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                                                <rect x="0" y="0" width="24" height="24" />
                                                                <circle fill="#000000" opacity="0.3" cx="12" cy="12" r="10" />
                                                                <rect fill="#000000" x="11" y="7" width="2" height="8" rx="1" />
                                                                <rect fill="#000000" x="11" y="16" width="2" height="2" rx="1" />
                                                            </g>
                                                        </svg>
                                                        <!--end::Svg Icon-->
                                                    </span>
                                                </span>
                                                <span class="btn btn-default btn-icon btn-sm mr-2" data-toggle="tooltip" title="Move">
                                                    <span class="svg-icon svg-icon-md">
                                                        <!--begin::Svg Icon | pathasset'assets/media/svg/icons/Files/Media-folder.svg-->
                                                        <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
                                                            <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                                                <rect x="0" y="0" width="24" height="24" />
                                                                <path d="M3.5,21 L20.5,21 C21.3284271,21 22,20.3284271 22,19.5 L22,8.5 C22,7.67157288 21.3284271,7 20.5,7 L10,7 L7.43933983,4.43933983 C7.15803526,4.15803526 6.77650439,4 6.37867966,4 L3.5,4 C2.67157288,4 2,4.67157288 2,5.5 L2,19.5 C2,20.3284271 2.67157288,21 3.5,21 Z" fill="#000000" opacity="0.3" />
                                                                <path d="M10.782158,17.5100514 L15.1856088,14.5000448 C15.4135806,14.3442132 15.4720618,14.0330791 15.3162302,13.8051073 C15.2814587,13.7542388 15.2375842,13.7102355 15.1868178,13.6753149 L10.783367,10.6463273 C10.5558531,10.489828 10.2445489,10.5473967 10.0880496,10.7749107 C10.0307022,10.8582806 10,10.9570884 10,11.0582777 L10,17.097272 C10,17.3734143 10.2238576,17.597272 10.5,17.597272 C10.6006894,17.597272 10.699033,17.566872 10.782158,17.5100514 Z" fill="#000000" />
                                                            </g>
                                                        </svg>
                                                        <!--end::Svg Icon-->
                                                    </span>
                                                </span>
                                            </div>
                                        </div>
                                        <!--end::Toolbar-->
                                        <!--begin::Actions-->
                                        <div class="d-flex align-items-center my-2">
                                            <div class="dropdown mr-2" data-toggle="tooltip" title="Sort">
                                                <span class="btn btn-default btn-icon btn-sm" data-toggle="dropdown">
                                                    <i class="flaticon2-console icon-1x"></i>
                                                </span>
                                                <div class="dropdown-menu dropdown-menu-right p-0 m-0 dropdown-menu-sm">
                                                    <ul class="navi py-3">
                                                        <li class="navi-item">
                                                            <a href="#" class="navi-link active">
                                                                <span class="navi-text">Newest</span>
                                                            </a>
                                                        </li>
                                                        <li class="navi-item">
                                                            <a href="#" class="navi-link">
                                                                <span class="navi-text">Olders</span>
                                                            </a>
                                                        </li>
                                                        <li class="navi-item">
                                                            <a href="#" class="navi-link">
                                                                <span class="navi-text">Unread</span>
                                                            </a>
                                                        </li>
                                                    </ul>
                                                </div>
                                            </div>
                                            <div class="dropdown" data-toggle="tooltip" title="Settings">
                                                <span class="btn btn-default btn-icon btn-sm mr-2" data-toggle="dropdown">
                                                    <i class="ki ki-bold-more-hor icon-1x"></i>
                                                </span>
                                                <div class="dropdown-menu dropdown-menu-right p-0 m-0 dropdown-menu-md">
                                                    <!--begin::Navigation-->
                                                    <ul class="navi navi-hover py-5">
                                                        <li class="navi-item">
                                                            <a href="#" class="navi-link">
                                                                <span class="navi-icon">
                                                                    <i class="flaticon2-drop"></i>
                                                                </span>
                                                                <span class="navi-text">Edit Task</span>
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
                                            <span class="btn btn-light-success btn-sm text-uppercase font-weight-bolder" data-toggle="modal" data-target="#new-task" title="Previose page" >New Task</span>
                                        </div>
                                        <!--end::Actions-->
                                    </div>
                                    <!--end::Header-->
                                    <!--begin::Body-->
                                    <div class="card-body p-0">
                                        <!--begin::Responsive container-->
                                        <div class="table">
                                            <!--begin::Items-->
                                            <div class="list list-hover min-w-500px" data-task="list">
                                                @if (count($tasks) > 0)
                                                    @foreach ($tasks as $task)
                                                        <!--begin::Item-->
                                                        <div class="d-flex align-items-start list-item card-spacer-x py-4 " data-task="task">
                                                            
                                                            <!--begin::Toolbar-->
                                                            <div class="d-flex align-items-center">
                                                                <!--begin::Actions-->
                                                                <div class="d-flex align-items-center mr-3" data-task="actions">
                                                                    <!--begin::Checkbox-->
                                                                    {{-- <label class="checkbox checkbox-single checkbox-primary flex-shrink-0 mr-3">
                                                                        <input type="checkbox" />
                                                                        <span></span>
                                                                    </label> --}}
                                                                    <!--end::Checkbox-->
                                                                    @if ($task->marked == 1)
                                                                        <a href="#" class="btn btn-icon btn-xs btn-hover-text-warning active" data-toggle="tooltip" data-placement="right" title="Star">
                                                                            <i class="flaticon-star text-warning"></i>
                                                                        </a>
                                                                        <a href="#" class="btn btn-icon btn-xs text-hover-warning active" data-toggle="tooltip" data-placement="right" title="Mark as important">
                                                                            <i class="flaticon-add-label-button text-warning"></i>
                                                                        </a>
                                                                    @else 
                                                                        <a href="#" class="btn btn-icon btn-xs btn-hover-text-warning" data-toggle="tooltip" data-placement="right" title="Star">
                                                                            <i class="flaticon-star text-muted"></i>
                                                                        </a>
                                                                        <a href="#" class="btn btn-icon btn-xs text-hover-secondary" data-toggle="tooltip" data-placement="right" title="Mark as important">
                                                                            <i class="flaticon-add-label-button text-muted"></i>
                                                                        </a>
                                                                    @endif
                                                                    <!--begin::Buttons-->
                                                                
                                                                    
                                                                    <!--end::Buttons-->
                                                                </div>
                                                                <!--end::Actions-->
                                                            </div>
                                                            <!--end::Toolbar-->
                                                            <a href="{{url('tasks/'.$task->id)}}" class="d-flex align-items-start list-item w-100">
                                                            <!--begin::Info-->
                                                                <div class="flex-grow-1 mt-1 mr-2" data-toggle="view">
                                                                    <!--begin::Title-->
                                                                <div class="font-weight-bolder mr-2">{{$task->name}}</div>
                                                                    <!--end::Title-->
                                                                    {{-- <!--begin::Labels-->
                                                                    <div class="mt-2">
                                                                        <span class="label label-light-primary font-weight-bold label-inline">inbox</span>
                                                                    </div>
                                                                    <!--end::Labels--> --}}
                                                                </div>
                                                                <!--end::Info-->
                                                                <!--begin::Details-->
                                                                <div class="d-flex align-items-center justify-content-end flex-wrap" data-toggle="view">
                                                                    @if ($task->status == 0)
                                                                        <span class="label label-inline label-light-danger font-weight-bold mr-3">
                                                                            Pending
                                                                        </span>
                                                                    @elseif ($task->status == 1)
                                                                        <span class="label label-inline label-light-primary font-weight-bold mr-3">
                                                                            In Progress
                                                                        </span>
                                                                    @elseif ($task->status == 2)
                                                                        <span class="label label-inline label-light-warning  font-weight-bold mr-3">
                                                                            Waiting Customer
                                                                        </span>
                                                                    @elseif ($task->status == 3)
                                                                        <span class="label label-inline label-light-success font-weight-bold mr-3">
                                                                            Completed
                                                                        </span>
                                                                    @endif
                                                                    <!--begin::Datetime-->
                                                                <div class="font-weight-bolder" data-toggle="view">{{Helper::since($task->updated_at)}}</div>
                                                                    <!--end::Datetime-->
                                                                    <!--begin::User Photo-->
                                                                    <span class="symbol symbol-30 ml-3">
                                                                        <span class="symbol-label" style="background-image: url('{{asset('assets/media/users/100_13.jpg')}}')"></span>
                                                                    </span>
                                                                    <!--end::User Photo-->
                                                                </div>
                                                                <!--end::Details-->
                                                            </a>
                                                        </div>
                                                        <!--end::Item-->
                                                    @endforeach
                                                @endif
                                            </div>
                                            <!--end::Items-->
                                        </div>
                                        <!--end::Responsive container-->
                                        <!--begin::Pagination-->
                                        <div class="d-flex align-items-center my-2 my-6 card-spacer-x justify-content-end">
                                            <div class="d-flex align-items-center mr-2" data-toggle="tooltip" title="Records per page">
                                                <span class="text-muted font-weight-bold mr-2" data-toggle="dropdown">1 - 50 of 235</span>
                                                <div class="dropdown-menu dropdown-menu-right p-0 m-0 dropdown-menu-sm">
                                                    <ul class="navi py-3">
                                                        <li class="navi-item">
                                                            <a href="#" class="navi-link">
                                                                <span class="navi-text">20 per page</span>
                                                            </a>
                                                        </li>
                                                        <li class="navi-item">
                                                            <a href="#" class="navi-link active">
                                                                <span class="navi-text">50 par page</span>
                                                            </a>
                                                        </li>
                                                        <li class="navi-item">
                                                            <a href="#" class="navi-link">
                                                                <span class="navi-text">100 per page</span>
                                                            </a>
                                                        </li>
                                                    </ul>
                                                </div>
                                            </div>
                                            <span class="btn btn-default btn-icon btn-sm mr-2" data-toggle="tooltip" title="Previose page">
                                                <i class="ki ki-bold-arrow-back icon-sm"></i>
                                            </span>
                                            <span class="btn btn-default btn-icon btn-sm" data-toggle="tooltip" title="Next page">
                                                <i class="ki ki-bold-arrow-next icon-sm"></i>
                                            </span>
                                        </div>
                                        <!--end::Pagination-->
                                    </div>
                                    <!--end::Body-->
                                </div>
                                <!--end::Card-->
                            </div>
                            <div class="col-xl-6 pt-10 pt-xl-0">
                                @if (count($tasks) > 0)
                                    @foreach ($tasks as $task)
                                        @if ($loop->index == 0)
                                            <!--begin::Card-->
                                            <div class="card card-custom card-stretch" id="kt_todo_view">
                                                <!--begin::Header-->
                                                <div class="card-header align-items-center flex-wrap justify-content-between border-0 py-6 h-auto">
                                                    @if ($expProject)
                                                         <!--begin::Left-->
                                                        <div class="d-flex align-items-center my-2">
                                                            <div class="d-flex align-items-center">
                                                                <div class="symbol symbol-35 mr-3">
                                                                    @if (Helper::fileExists($expProject->avatar, '/uploads/images/logos/projects'))
                                                                        <div class="symbol-label" style="background-image: url('{{asset('uploads/images/logos/projects/'.$expProject->avatar)}}')"></div>
                                                                    @else
                                                                        <span class="symbol-label font-size-h4">
                                                                            {{$expProject->name[0]}}
                                                                        </span>
                                                                    @endif
                                                                    
                                                                </div>
                                                            <a href="#" class="text-dark-75 font-size-lg text-hover-primary font-weight-bolder">{{$expProject->name}}</a>
                                                            </div>
                                                        </div>
                                                        <!--end::Left-->
                                                    @else
                                                         <!--begin::Left-->
                                                        <div class="d-flex align-items-center my-2">
                                                            <div class="d-flex align-items-center">
                                                                <div class="symbol symbol-35 mr-3">
                                                                    @if (Helper::fileExists($project->avatar, '/uploads/images/logos/projects'))
                                                                        <div class="symbol-label" style="background-image: url('{{asset('uploads/images/logos/projects/'.$task->project->avatar)}}')"></div>
                                                                    @else
                                                                        <span class="symbol-label font-size-h4">
                                                                            {{$task->project->name[0]}}
                                                                        </span>
                                                                    @endif
                                                                </div>
                                                                <a href="#" class="text-dark-75 font-size-lg text-hover-primary font-weight-bolder">{{$task->project->name}}</a>
                                                            </div>
                                                        </div>
                                                        <!--end::Left-->
                                                    @endif
                                                   
                                                    <!--begin::Right-->
                                                    <div class="d-flex align-items-center justify-content-end text-right my-2">
                                                        <span class="btn btn-default btn-icon btn-sm mr-2" data-toggle="tooltip" title="Archive">
                                                            <span class="svg-icon svg-icon-md">
                                                                <!--begin::Svg Icon | pathasset'assets/media/svg/icons/Communication/Mail-opened.svg-->
                                                                <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
                                                                    <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                                                        <rect x="0" y="0" width="24" height="24" />
                                                                        <path d="M6,2 L18,2 C18.5522847,2 19,2.44771525 19,3 L19,12 C19,12.5522847 18.5522847,13 18,13 L6,13 C5.44771525,13 5,12.5522847 5,12 L5,3 C5,2.44771525 5.44771525,2 6,2 Z M7.5,5 C7.22385763,5 7,5.22385763 7,5.5 C7,5.77614237 7.22385763,6 7.5,6 L13.5,6 C13.7761424,6 14,5.77614237 14,5.5 C14,5.22385763 13.7761424,5 13.5,5 L7.5,5 Z M7.5,7 C7.22385763,7 7,7.22385763 7,7.5 C7,7.77614237 7.22385763,8 7.5,8 L10.5,8 C10.7761424,8 11,7.77614237 11,7.5 C11,7.22385763 10.7761424,7 10.5,7 L7.5,7 Z" fill="#000000" opacity="0.3" />
                                                                        <path d="M3.79274528,6.57253826 L12,12.5 L20.2072547,6.57253826 C20.4311176,6.4108595 20.7436609,6.46126971 20.9053396,6.68513259 C20.9668779,6.77033951 21,6.87277228 21,6.97787787 L21,17 C21,18.1045695 20.1045695,19 19,19 L5,19 C3.8954305,19 3,18.1045695 3,17 L3,6.97787787 C3,6.70173549 3.22385763,6.47787787 3.5,6.47787787 C3.60510559,6.47787787 3.70753836,6.51099993 3.79274528,6.57253826 Z" fill="#000000" />
                                                                    </g>
                                                                </svg>
                                                                <!--end::Svg Icon-->
                                                            </span>
                                                        </span>
                                                        <span class="btn btn-default btn-icon btn-sm mr-2" data-toggle="tooltip" title="Mark as read">
                                                            <span class="svg-icon svg-icon-md">
                                                                <!--begin::Svg Icon | pathasset'assets/media/svg/icons/General/Duplicate.svg-->
                                                                <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
                                                                    <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                                                        <rect x="0" y="0" width="24" height="24" />
                                                                        <path d="M15.9956071,6 L9,6 C7.34314575,6 6,7.34314575 6,9 L6,15.9956071 C4.70185442,15.9316381 4,15.1706419 4,13.8181818 L4,6.18181818 C4,4.76751186 4.76751186,4 6.18181818,4 L13.8181818,4 C15.1706419,4 15.9316381,4.70185442 15.9956071,6 Z" fill="#000000" fill-rule="nonzero" opacity="0.3" />
                                                                        <path d="M10.1818182,8 L17.8181818,8 C19.2324881,8 20,8.76751186 20,10.1818182 L20,17.8181818 C20,19.2324881 19.2324881,20 17.8181818,20 L10.1818182,20 C8.76751186,20 8,19.2324881 8,17.8181818 L8,10.1818182 C8,8.76751186 8.76751186,8 10.1818182,8 Z" fill="#000000" />
                                                                    </g>
                                                                </svg>
                                                                <!--end::Svg Icon-->
                                                            </span>
                                                        </span>
                                                        <span class="btn btn-default btn-icon btn-sm mr-2" data-toggle="tooltip" title="Move">
                                                            <span class="svg-icon svg-icon-md">
                                                                <!--begin::Svg Icon | pathasset'assets/media/svg/icons/Files/Media-folder.svg-->
                                                                <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
                                                                    <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                                                        <rect x="0" y="0" width="24" height="24" />
                                                                        <path d="M3.5,21 L20.5,21 C21.3284271,21 22,20.3284271 22,19.5 L22,8.5 C22,7.67157288 21.3284271,7 20.5,7 L10,7 L7.43933983,4.43933983 C7.15803526,4.15803526 6.77650439,4 6.37867966,4 L3.5,4 C2.67157288,4 2,4.67157288 2,5.5 L2,19.5 C2,20.3284271 2.67157288,21 3.5,21 Z" fill="#000000" opacity="0.3" />
                                                                        <path d="M10.782158,17.5100514 L15.1856088,14.5000448 C15.4135806,14.3442132 15.4720618,14.0330791 15.3162302,13.8051073 C15.2814587,13.7542388 15.2375842,13.7102355 15.1868178,13.6753149 L10.783367,10.6463273 C10.5558531,10.489828 10.2445489,10.5473967 10.0880496,10.7749107 C10.0307022,10.8582806 10,10.9570884 10,11.0582777 L10,17.097272 C10,17.3734143 10.2238576,17.597272 10.5,17.597272 C10.6006894,17.597272 10.699033,17.566872 10.782158,17.5100514 Z" fill="#000000" />
                                                                    </g>
                                                                </svg>
                                                                <!--end::Svg Icon-->
                                                            </span>
                                                        </span>
                                                        <span class="btn btn-light-danger btn-sm text-uppercase font-weight-bolder mr-2" data-toggle="tooltip" title="Change due date">May 5</span>
                                                        <span class="btn btn-light-success btn-sm text-uppercase font-weight-bolder" data-toggle="tooltip" title="Mark as complete">Complete</span>
                                                    </div>
                                                    <!--end::Right-->
                                                </div>
                                                <!--end::Header-->

                                                <!--begin::Body-->
                                                <div class="card-body p-0">
                                                    <!--begin::Header-->
                                                    <div class="d-flex align-items-center justify-content-between flex-wrap card-spacer-x py-3">
                                                        <!--begin::Title-->
                                                        <div class="d-flex flex-column mr-2 py-2">
                                                        <a href="#" class="text-dark text-hover-primary font-weight-bold font-size-h4 mr-3">{{$task->name}}</a>
                                                            <div class="d-flex align-items-center py-1">
                                                                @if ($task->status == 0)
                                                                    <a href="{{'tasks/status/0'}}" class="d-flex align-items-center text-muted text-hover-primary mr-2">
                                                                        <span class="fa fa-genderless text-danger icon-md mr-2"></span>Pending
                                                                    </a>
                                                                @elseif ($task->status == 1)
                                                                    <a href="{{'tasks/status/1'}}" class="d-flex align-items-center text-muted text-hover-primary mr-2">
                                                                        <span class="fa fa-genderless text-primary icon-md mr-2"></span>In Progress
                                                                    </a>
                                                                @elseif ($task->status == 2)
                                                                    <a href="{{'tasks/status/2'}}" class="d-flex align-items-center text-muted text-hover-primary mr-2">
                                                                        <span class="fa fa-genderless text-warning icon-md mr-2"></span>Waiting Customer
                                                                    </a>
                                                                @elseif ($task->status == 3)
                                                                    <a href="{{'tasks/status/3'}}" class="d-flex align-items-center text-muted text-hover-primary mr-2">
                                                                        <span class="fa fa-genderless text-success icon-md mr-2"></span>Completed
                                                                    </a>
                                                                @endif
                                                                <a href="#" class="d-flex align-items-center text-muted text-hover-primary">
                                                                <span class="fa fa-genderless text-success icon-md mr-2"></span>Urgent</a>
                                                            </div>
                                                        </div>
                                                        <!--end::Title-->
                                                        <!--begin::Toolbar-->
                                                        <div class="d-flex py-2">
                                                            <span class="btn btn-default btn-sm btn-icon" data-dismiss="modal">
                                                                <i class="flaticon2-fax"></i>
                                                            </span>
                                                        </div>
                                                        <!--end::Toolbar-->
                                                    </div>
                                                    <!--end::Header-->
                                                    <!--begin::Messages-->
                                                    <div class="mb-3">
                                                        <!--begin::Message-->
                                                            @if(count(Helper::taskComments($task->id)) > 0)
                                                                    @foreach(Helper::taskComments($task->id) as $comment)
                                                                    <div class="cursor-pointer shadow-xs toggle-on" data-task="message">
                                                                    <!--begin::Info-->
                                                                    <div class="d-flex align-items-start card-spacer-x py-4">
                                                                        <!--begin::User Photo-->
                                                                        @if (Helper::avatarCheck($comment->user->avatar))
                                                                            <div class="symbol symbol-35 symbol-sm flex-shrink-0 mr-3">
                                                                                <img class="" src="{{asset('uploads/images/avatars/'. $comment->user->avatar)}}" alt="Avatar" />
                                                                            </div>
                                                                        @else
                                                                            <div class="symbol symbol-35 symbol-sm flex-shrink-0 symbol-light-primary mr-3">
                                                                                <span class="symbol-label font-size-h4">
                                                                                    {{$comment->user->name[0]}}
                                                                                </span>
                                                                            </div>
                                                                        @endif
                                                                        
                                                                    <!--begin::User Details-->
                                                                    <div class="d-flex flex-column flex-grow-1 flex-wrap mr-2">
        
                                                                        <div class="d-flex">
                                                                        <a href="{{url('team/'. $comment->user->id)}}" class="font-size-lg font-weight-bolder text-dark-75 text-hover-primary mr-2">{{$comment->user->name}}</a>
                                                                            {{-- <div class="font-weight-bold text-muted">
                                                                            <!--<span class="label label-success label-dot mr-2"></span>1 Day ago</div>-->
                                                                        </div> --}}
                                                                    <div class="d-flex align-items-center" style="width: 80%;">
                                                                    <div class="font-weight-bold text-muted mr-2" style="margin-left: auto;">{{Helper::since($comment->updated_at)}}</div>
                                                                    <div class="d-flex align-items-center" data-task="toolbar">
                                                                        {{-- <span class="btn btn-clean btn-xs btn-icon mr-2" data-toggle="tooltip" data-placement="top" title="Star">
                                                                            <i class="flaticon-star icon-1x text-warning"></i>
                                                                        </span> --}}
                                                                        @if($comment->marked == 0)
                                                                            {!! Form::open(['action'=>['CommentController@update', $comment->id], 'method'=>'POST', 'enctype' =>'multipart/form-data', ' novalidate', 'class' => 'form'])!!}
                                                                                {!! Form::hidden('_method', 'PUT')!!}
                                                                                <input name="marked" value="1" hidden="hidden" class="d-none">
                                                                                <button name= "mark-change" type="submit" class="btn btn-clean btn-xs btn-icon" data-toggle="tooltip" data-placement="top" title="Mark as important">
                                                                                    <i class="flaticon-add-label-button icon-1x"></i>
                                                                                </button>
                                                                            </form>
                                                                        @else 
                                                                        {!! Form::open(['action'=>['CommentController@update', $comment->id], 'method'=>'POST', 'enctype' =>'multipart/form-data', ' novalidate', 'class' => 'form'])!!}
                                                                        {!! Form::hidden('_method', 'PUT')!!}
                                                                        <input name="marked" value="0" hidden="hidden" class="d-none">
                                                                        <button name= "mark-change" type="submit" class="btn btn-clean btn-xs btn-icon" data-toggle="tooltip" data-placement="top" title="Mark as non important">
                                                                            <i class="flaticon-add-label-button icon-1x text-warning"></i>
                                                                        </button>
                                                                    </form>
                                                                        @endif
                                                                        
                                                                    </div>
                                                                </div>
                                                                <!--end::User Details-->
                                                                </div>
                                                                <!--end::Info-->
                                                                <!--begin::Comment-->
                                                                <div class="pt-2 pb-5 toggle-off-item">
                                                                    <!--begin::Text-->
                                                                    <div class="mb-1">
                                                                        <h3>{{$comment->subject}}</h3>
                                                                        <p>{{$comment->text}}</p>
                                                                    </div>
                                                                    <!--end::Text-->
                                                                    <!--begin::Attachments-->
                                                                    @if (Helper::FileExists($comment->docs, 'uploads/files/tasks/comments'))
                                                                        <div class="d-flex flex-column font-size-sm font-weight-bold">
                                                                            <a href="{{url('uploads/files/tasks/comments/'. $comment->docs)}}" target="_blank" class="d-flex align-items-center text-muted text-hover-primary py-1">
                                                                            <span class="flaticon2-clip-symbol text-warning icon-1x mr-2"></span>{{$comment->docs}}</a>
                                                                            {{-- <a href="#" class="d-flex align-items-center text-muted text-hover-primary py-1">
                                                                            <span class="flaticon2-clip-symbol text-warning icon-1x mr-2"></span>Requirements.docx</a> --}}
                                                                        </div>
                                                                    @endif
                                                                    <!--end::Attachments-->
                                                                </div>
                                                                <!--end::Comment-->
                                                                    </div>
                                                                </div>
                                                            </div>
                                                                @endforeach 
                                                            @else
                                                                <div class="px-3 pt-5 mt-5">
                                                                    <h3 class="text-center text-primary">Start Conversation</h3>
                                                                    
                                                                </div>
                                                            @endif
                                                        <!--end::Message-->
                                                    </div>
                                                    <!--end::Messages-->
                                                    <!--begin::Reply-->
                                                    <div class="card-spacer-x pb-10 pt-5" id="kt_todo_reply">
                                                        <div class="card card-custom shadow-sm">
                                                            <div class="card-body p-0">
                                                                <!--begin::Form-->
                                                                {!! Form::open(['action'=>'CommentController@store', 'method'=>'POST', 'enctype' =>'multipart/form-data', ' novalidate', 'class' => 'form'])!!}
                                                                    <div class="w-100">
                                                                        <!--begin::Footer-->
                                                                        <div class="py-5 pl-8 pr-5 border-top w-100">
                                                                            <input name="subject" type="text" class="form-control mb-3" placeholder="Subject ...">
                                                                            <textarea name="text" type="text" class="form-control" placeholder="Messege ..." rows="6"></textarea>
                                                                            <input name="user_id" type="text" hidden="hidden" value="{{auth()->user()->id}}">
                                                                            <input name="task_id" type="text" hidden="hidden" value="{{$task->id}}">
                                                                        </div>
                                                                    <!--begin::Body-->
                                                                    <!--begin::Footer-->
                                                                    <div class="d-flex align-items-center justify-content-between py-5 pl-8 pr-5 border-top">
                                                                        <!--begin::Actions-->
                                                                        <div class="d-flex align-items-center mr-3">
                                                                            <!--begin::Send-->
                                                                            <div class="btn-group mr-4">
                                                                                <button type="submit" class="btn btn-primary font-weight-bold px-6">Send</button>
                                                                                {{-- <span class="btn btn-primary font-weight-bold dropdown-toggle dropdown-toggle-split" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true" role="button"></span> --}}
                                                                                {{-- <div class="dropdown-menu dropdown-menu-sm dropup p-0 m-0 dropdown-menu-right">
                                                                                    <ul class="navi py-3">
                                                                                        <li class="navi-item">
                                                                                            <a href="#" class="navi-link">
                                                                                                <span class="navi-icon">
                                                                                                    <i class="flaticon2-writing"></i>
                                                                                                </span>
                                                                                                <span class="navi-text">Schedule Send</span>
                                                                                            </a>
                                                                                        </li>
                                                                                        <li class="navi-item">
                                                                                            <a href="#" class="navi-link">
                                                                                                <span class="navi-icon">
                                                                                                    <i class="flaticon2-medical-records"></i>
                                                                                                </span>
                                                                                                <span class="navi-text">Save &amp; archive</span>
                                                                                            </a>
                                                                                        </li>
                                                                                        <li class="navi-item">
                                                                                            <a href="#" class="navi-link">
                                                                                                <span class="navi-icon">
                                                                                                    <i class="flaticon2-hourglass-1"></i>
                                                                                                </span>
                                                                                                <span class="navi-text">Cancel</span>
                                                                                            </a>
                                                                                        </li>
                                                                                    </ul>
                                                                                </div> --}}
                                                                            </div>
                                                                            <!--end::Send-->
                                                                            <!--begin::Other-->
                                                                            {{-- <span class="btn btn-icon btn-sm btn-clean mr-2" id="kt_todo_reply_attachments_select">
                                                                                <i class="flaticon2-clip-symbol"></i>
                                                                            </span> --}}
                                                                            <label for="docs" class="btn btn-icon btn-sm btn-clean">
                                                                                
                                                                                <i class="flaticon2-clip-symbol"></i>
                                                                                
                                                                            </label>
                                                                            <input type="file" name="docs" id="docs" class="d-none" hidden>
                                                                            
                                                                            {{-- <span class="btn btn-icon btn-sm btn-clean">
                                                                                <i class="flaticon2-pin"></i>
                                                                            </span> --}}
                                                                            <!--end::Other-->
                                                                        
                                                                        </div>
                                                                        <!--end::Actions-->
                                                                        <!--begin::Toolbar-->
                                                                        {{-- <div class="d-flex align-items-center">
                                                                            <span class="btn btn-icon btn-sm btn-clean mr-2" data-toggle="tooltip" title="More actions">
                                                                                <i class="flaticon2-settings"></i>
                                                                            </span>
                                                                            <span class="btn btn-icon btn-sm btn-clean" data-task="dismiss" data-toggle="tooltip" title="Dismiss reply">
                                                                                <i class="flaticon2-rubbish-bin-delete-button"></i>
                                                                            </span>
                                                                        </div> --}}
                                                                        <!--end::Toolbar-->
                                                                    </div>
                                                                    <!--end::Footer-->
                                                                </form>
                                                                <!--end::Form-->
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <!--end::Reply-->
                                                </div>
                                                <!--end::Body-->
                                            </div>
                                            <!--end::Card-->
                                        @endif
                                        
                                    @endforeach 
                                @endif

                            </div>
                        </div>
                        <!--end::Row-->
                    </div>
                </div>
                <!--end::List-->
            </div>
            <!--end::Todo-->
        </div>
        <!--end::Container-->
    </div>
<!--end::Entry-->
@endsection
@section('modals')

    <!--begin::New Task Modal-->
    <div class="modal fade wide-modal" id="new-task" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">New Task</h5>
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
    <!--end::New Task Modal-->
    <!--begin::Edit Task Modal-->
    @if (count($tasks) > 0)
        @foreach ($tasks as $task)
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
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    </div>
                </div>
                </div>
            </div>
        @endforeach
    @endif

        

    <!--end::Edit Task Modal--> 
@endsection
@section('scripts')
    <script>
        $(document).ready(function(){

            $('.select2').select2({
                placeholder: "Select a Team"
            });

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
        })
    </script>  
    <!--begin::Page Scripts(used by this page)-->

	<script src="{{asset('assets/js/pages/custom/todo/todo.js')}}"></script>
@endsection

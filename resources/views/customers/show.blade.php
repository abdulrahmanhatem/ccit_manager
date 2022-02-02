


@extends('layouts.app')
@section('title', ucwords($customer->name))
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
                    <a href="{{url('customers/'. $customer->id)}}">
                        <h2 class="text-white font-weight-bold my-2 mr-5">{{ucwords($customer->name)}}</h2>
                    </a>
                    <!--end::Title-->
                    <!--begin::Breadcrumb-->
                    <div class="d-flex align-items-center font-weight-bold my-2">
                       
                        @if (auth()->user()->role->name != 'customer')
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
                            <a href="{{url('customers/'. $customer->id)}}" class="text-white text-hover-white opacity-75 hover-opacity-100">{{ucwords($customer->name)}}</a>
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
            <div class="card-body p-0">
                <div class="row  p-0">
                    <div class="col-lg-3 col-xl-3 mb-5 ">
                        <!--begin::Iconbox-->
                        <div class="card card-custom wave wave-animate-slow wave mb-8 mb-lg-0">
                            <div class="card-body">
                                <div class="d-flex align-items-center p-5">
                                    <div class="mr-6">
                                        <span class="svg-icon svg-icon-success svg-icon-4x"><!--begin::Svg Icon | path:C:\wamp64\www\keenthemes\themes\metronic\theme\html\demo2\dist/../src/media/svg/icons\Layout\Layout-top-panel-5.svg--><svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
                                            <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                                <rect x="0" y="0" width="24" height="24"/>
                                                <path d="M3,4 L20,4 C20.5522847,4 21,4.44771525 21,5 L21,7 C21,7.55228475 20.5522847,8 20,8 L3,8 C2.44771525,8 2,7.55228475 2,7 L2,5 C2,4.44771525 2.44771525,4 3,4 Z M10,10 L20,10 C20.5522847,10 21,10.4477153 21,11 L21,13 C21,13.5522847 20.5522847,14 20,14 L10,14 C9.44771525,14 9,13.5522847 9,13 L9,11 C9,10.4477153 9.44771525,10 10,10 Z M10,16 L20,16 C20.5522847,16 21,16.4477153 21,17 L21,19 C21,19.5522847 20.5522847,20 20,20 L10,20 C9.44771525,20 9,19.5522847 9,19 L9,17 C9,16.4477153 9.44771525,16 10,16 Z" fill="#000000"/>
                                                <rect fill="#000000" opacity="0.3" x="2" y="10" width="5" height="10" rx="1"/>
                                            </g>
                                        </svg><!--end::Svg Icon--></span>
                                    </div>
                                    <div class="d-flex flex-column">
                                        <p class="text-dark text-hover-primary font-weight-bold font-size-h4 mb-3">Projects</p>
                                         <div class="text-dark-75 font-size-h3">{{ count($customer->projects)}}</div> 
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!--end::Iconbox-->
                    </div>
                    <div class="col-lg-3 col-xl-3 mb-5">
                        <!--begin::Iconbox-->
                        <div class="card card-custom wave wave-animate-slow wave mb-8 mb-lg-0">
                            <div class="card-body">
                                <div class="d-flex align-items-center p-5">
                                    <div class="mr-6">
                                        <span class="svg-icon svg-icon-primary svg-icon-4x"><!--begin::Svg Icon | path:C:\wamp64\www\keenthemes\themes\metronic\theme\html\demo2\dist/../src/media/svg/icons\Design\Pen-tool-vector.svg--><svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
                                            <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                                <rect x="0" y="0" width="24" height="24"/>
                                                <path d="M11,3 L11,11 C11,11.0862364 11.0109158,11.1699233 11.0314412,11.2497543 C10.4163437,11.5908673 10,12.2468125 10,13 C10,14.1045695 10.8954305,15 12,15 C13.1045695,15 14,14.1045695 14,13 C14,12.2468125 13.5836563,11.5908673 12.9685588,11.2497543 C12.9890842,11.1699233 13,11.0862364 13,11 L13,3 L17.7925828,12.5851656 C17.9241309,12.8482619 17.9331722,13.1559315 17.8173006,13.4262985 L15.1298744,19.6969596 C15.051085,19.8808016 14.870316,20 14.6703019,20 L9.32969808,20 C9.12968402,20 8.94891496,19.8808016 8.87012556,19.6969596 L6.18269936,13.4262985 C6.06682778,13.1559315 6.07586907,12.8482619 6.2074172,12.5851656 L11,3 Z" fill="#000000"/>
                                                <path d="M10,21 L14,21 C14.5522847,21 15,21.4477153 15,22 L15,23 L9,23 L9,22 C9,21.4477153 9.44771525,21 10,21 Z" fill="#000000" opacity="0.3"/>
                                            </g>
                                        </svg><!--end::Svg Icon--></span>
                                    </div>
                                    <div class="d-flex flex-column">
                                        <p class="text-dark text-hover-primary font-weight-bold font-size-h4 mb-3">Contracts</p>
                                         <div class="text-dark-75 font-size-h3">
                                            {{count($customer->contracts())}}
                                        </div> 
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!--end::Iconbox-->
                    </div>
                    <div class="col-lg-3 col-xl-3 mb-5">
                        <!--begin::Iconbox-->
                        <div class="card card-custom wave wave-animate-slow wave mb-8 mb-lg-0">
                            <div class="card-body">
                                <div class="d-flex align-items-center p-5">
                                    <div class="mr-6">
                                        <span class="svg-icon svg-icon-warning svg-icon-4x">
                                            <!--begin::Svg Icon | path:assets/media/svg/icons/Home/Mirror.svg-->
                                            <span class="svg-icon svg-icon-primary svg-icon-4x"><!--begin::Svg Icon | path:C:\wamp64\www\keenthemes\themes\metronic\theme\html\demo2\dist/../src/media/svg/icons\Shopping\Price1.svg--><svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
                                                <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                                    <polygon points="0 0 24 0 24 24 0 24"/>
                                                    <path d="M3.52270623,14.028695 C2.82576459,13.3275941 2.82576459,12.19529 3.52270623,11.4941891 L11.6127629,3.54050571 C11.9489429,3.20999263 12.401513,3.0247814 12.8729533,3.0247814 L19.3274172,3.0247814 C20.3201611,3.0247814 21.124939,3.82955935 21.124939,4.82230326 L21.124939,11.2583059 C21.124939,11.7406659 20.9310733,12.2027862 20.5869271,12.5407722 L12.5103155,20.4728108 C12.1731575,20.8103442 11.7156477,21 11.2385688,21 C10.7614899,21 10.3039801,20.8103442 9.9668221,20.4728108 L3.52270623,14.028695 Z M16.9307214,9.01652093 C17.9234653,9.01652093 18.7282432,8.21174298 18.7282432,7.21899907 C18.7282432,6.22625516 17.9234653,5.42147721 16.9307214,5.42147721 C15.9379775,5.42147721 15.1331995,6.22625516 15.1331995,7.21899907 C15.1331995,8.21174298 15.9379775,9.01652093 16.9307214,9.01652093 Z" fill="#000000" fill-rule="nonzero" opacity="0.3"/>
                                                </g>
                                            </svg><!--end::Svg Icon--></span>
                                            <!--end::Svg Icon-->
                                        </span>
                                    </div>
                                    <div class="d-flex flex-column">
                                        <p class="text-dark text-hover-primary font-weight-bold font-size-h4 mb-3">Tickets</p>
                                         <div class="text-dark-75 font-size-h3">{{ count($customer->tickets())}}</div> 
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!--end::Iconbox-->
                    </div>
                    <div class="col-lg-3 col-xl-3 mb-5">
                        <!--begin::Iconbox-->
                        <div class="card card-custom wave wave-animate-slow wave mb-8 mb-lg-0">
                            <div class="card-body">
                                <div class="d-flex align-items-center p-5">
                                    <div class="mr-6">
                                        <span class="svg-icon svg-icon-danger svg-icon-4x"><!--begin::Svg Icon | path:C:\wamp64\www\keenthemes\themes\metronic\theme\html\demo2\dist/../src/media/svg/icons\Shopping\Credit-card.svg--><svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
                                            <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                                <rect x="0" y="0" width="24" height="24"/>
                                                <rect fill="#000000" opacity="0.3" x="2" y="5" width="20" height="14" rx="2"/>
                                                <rect fill="#000000" x="2" y="8" width="20" height="3"/>
                                                <rect fill="#000000" opacity="0.3" x="16" y="14" width="4" height="2" rx="1"/>
                                            </g>
                                        </svg><!--end::Svg Icon--></span>
                                    </div>
                                    <div class="d-flex flex-column">
                                        <p class="text-dark text-hover-primary font-weight-bold font-size-h5 mb-3">Pending Invoices</p>
                                        <div class="text-dark-75 font-size-h4">{{ count($customer->pendingInvoices())}}</div> 
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!--end::Iconbox-->
                    </div>
                </div>
            </div>
            <!--begin::Profile 4-->
            <div class="d-flex flex-row">
                <!--begin::Aside-->
                <div class="flex-row-auto offcanvas-mobile w-300px w-xl-350px" id="kt_profile_aside">
                    <!--begin::Card-->
                    <div class="card card-custom gutter-b">
                        <!--begin::Body-->
                        <div class="card-body pt-">
                            <!--begin::User-->
                            <div class="d-flex align-items-center">
                                @if (Helper::avatarCheck($customer->avatar))
                                    <div class="symbol symbol-lg-60 symbol-xxl-60 mr-5">
                                        <img class="" src="{{asset('uploads/images/avatars/'.$customer->avatar)}}" alt="photo" />
                                        <i class="symbol-badge bg-success"></i>
                                    </div>
                                @else
                                <div class="symbol flex-shrink-0 symbol symbol-lg-80 symbol-xxl-100 mr-5 ">
                                    <span class="symbol-label font-size-h4">
                                        {{$customer->name[0]}}
                                    </span>
                                </div>
                                @endif
                                
                                <div>
                                <a href="{{url('customers/'.$customer->id)}}" class="font-weight-bolder font-size-h5 text-dark-75 text-hover-primary">{{ucwords($customer->name)}}</a>
                                    <div class="text-muted">
                                        @if ($customer->role->name == 'customer')
                                            Customer
                                        @elseif ($customer->role->name == 'admin')
                                            Admin
                                        @elseif ($customer->role->name == 'auther')
                                            Auther
                                        @elseif ($customer->role->name == 'staff')
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
                                    <a href="#" class="text-muted text-hover-primary">{{$customer->email}}</a>
                                </div>
                                <div class="d-flex align-items-center justify-content-between mb-2">
                                    <span class="font-weight-bold mr-2">Phone:</span>
                                    <span class="text-muted">{{$customer->phone}}</span>
                                </div>
                                <div class="d-flex align-items-center justify-content-between">
                                    <span class="font-weight-bold mr-2">Location:</span>
                                    <span class="text-muted">{{Helper::getCountryByKey($customer->country)}}</span>
                                </div>
                            </div>
                            <div class="offcanvas-content">
                                <!--begin::Wrapper-->
                                
                                  
                                  
                                <div class="offcanvas-wrapper scroll-pull scroll ps" style="height: 380px; overflow: hidden;">
                                    <ul class="navi navi-bold navi-hover navi-active navi-link-rounded mt-5 pt-1 nav nav-pills">
                                        <li class="navi-item mb-2 active">
                                            <a a data-toggle="pill" href="#general" class="navi-link py-4 active">
                                                <span class="navi-icon mr-2">
                                                    <span class="svg-icon">
                                                        <!--begin::Svg Icon | path:assets/media/svg/icons/Design/Layers.svg-->
                                                        <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
                                                            <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                                                <polygon points="0 0 24 0 24 24 0 24"></polygon>
                                                                <path d="M12.9336061,16.072447 L19.36,10.9564761 L19.5181585,10.8312381 C20.1676248,10.3169571 20.2772143,9.3735535 19.7629333,8.72408713 C19.6917232,8.63415859 19.6104327,8.55269514 19.5206557,8.48129411 L12.9336854,3.24257445 C12.3871201,2.80788259 11.6128799,2.80788259 11.0663146,3.24257445 L4.47482784,8.48488609 C3.82645598,9.00054628 3.71887192,9.94418071 4.23453211,10.5925526 C4.30500305,10.6811601 4.38527899,10.7615046 4.47382636,10.8320511 L4.63,10.9564761 L11.0659024,16.0730648 C11.6126744,16.5077525 12.3871218,16.5074963 12.9336061,16.072447 Z" fill="#000000" fill-rule="nonzero"></path>
                                                                <path d="M11.0563554,18.6706981 L5.33593024,14.122919 C4.94553994,13.8125559 4.37746707,13.8774308 4.06710397,14.2678211 C4.06471678,14.2708238 4.06234874,14.2738418 4.06,14.2768747 L4.06,14.2768747 C3.75257288,14.6738539 3.82516916,15.244888 4.22214834,15.5523151 C4.22358765,15.5534297 4.2250303,15.55454 4.22647627,15.555646 L11.0872776,20.8031356 C11.6250734,21.2144692 12.371757,21.2145375 12.909628,20.8033023 L19.7677785,15.559828 C20.1693192,15.2528257 20.2459576,14.6784381 19.9389553,14.2768974 C19.9376429,14.2751809 19.9363245,14.2734691 19.935,14.2717619 L19.935,14.2717619 C19.6266937,13.8743807 19.0546209,13.8021712 18.6572397,14.1104775 C18.654352,14.112718 18.6514778,14.1149757 18.6486172,14.1172508 L12.9235044,18.6705218 C12.377022,19.1051477 11.6029199,19.1052208 11.0563554,18.6706981 Z" fill="#000000" opacity="0.3"></path>
                                                            </g>
                                                        </svg>
                                                        <!--end::Svg Icon-->
                                                    </span>
                                                </span>
                                                <span class="navi-text font-size-lg">General</span>
                                            </a>
                                        </li>
                                        <li class="navi-item mb-2">
                                            <a  data-toggle="pill" href="#projects"class="navi-link py-4">
                                                <span class="navi-icon mr-2">
                                                    <!--begin::Svg Icon | path:assets/media/svg/icons/Communication/Add-user.svg-->
                                                    <span class="svg-icon svg-icon-2x"><!--begin::Svg Icon | path:C:\wamp64\www\keenthemes\themes\metronic\theme\html\demo2\dist/../src/media/svg/icons\Design\Image.svg--><svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
                                                        <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                                            <polygon points="0 0 24 0 24 24 0 24"/>
                                                            <path d="M6,5 L18,5 C19.6568542,5 21,6.34314575 21,8 L21,17 C21,18.6568542 19.6568542,20 18,20 L6,20 C4.34314575,20 3,18.6568542 3,17 L3,8 C3,6.34314575 4.34314575,5 6,5 Z M5,17 L14,17 L9.5,11 L5,17 Z M16,14 C17.6568542,14 19,12.6568542 19,11 C19,9.34314575 17.6568542,8 16,8 C14.3431458,8 13,9.34314575 13,11 C13,12.6568542 14.3431458,14 16,14 Z" fill="#000000"/>
                                                        </g>
                                                    </svg><!--end::Svg Icon--></span>
                                                    <!--end::Svg Icon-->
                                                </span>  
                                                <span class="navi-text font-size-lg">Projects</span>
                                            </a>
                                        </li>
                                        <li class="navi-item mb-2">
                                            <a  data-toggle="pill" href="#invoices" class="navi-link py-4">
                                                <span class="navi-icon mr-2">
                                                    <span class="svg-icon svg-icon-2x"><!--begin::Svg Icon | path:C:\wamp64\www\keenthemes\themes\metronic\theme\html\demo2\dist/../src/media/svg/icons\Text\Align-left.svg--><svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
                                                        <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                                            <rect x="0" y="0" width="24" height="24"/>
                                                            <rect fill="#000000" opacity="0.3" x="4" y="5" width="16" height="2" rx="1"/>
                                                            <rect fill="#000000" opacity="0.3" x="4" y="13" width="16" height="2" rx="1"/>
                                                            <path d="M5,9 L13,9 C13.5522847,9 14,9.44771525 14,10 C14,10.5522847 13.5522847,11 13,11 L5,11 C4.44771525,11 4,10.5522847 4,10 C4,9.44771525 4.44771525,9 5,9 Z M5,17 L13,17 C13.5522847,17 14,17.4477153 14,18 C14,18.5522847 13.5522847,19 13,19 L5,19 C4.44771525,19 4,18.5522847 4,18 C4,17.4477153 4.44771525,17 5,17 Z" fill="#000000"/>
                                                        </g>
                                                    </svg><!--end::Svg Icon--></span>
                                                        <!--end::Svg Icon-->
                                                </span>
                                                <span class="navi-text font-size-lg">Invoices</span>
                                            </a>
                                        </li>
                                        <li class="navi-item mb-2">
                                            <a data-toggle="pill" href="#proposals" class="navi-link py-4">
                                                <span class="navi-icon mr-2">
                                                    <span class="svg-icon svg-icon-2x"><!--begin::Svg Icon | path:C:\wamp64\www\keenthemes\themes\metronic\theme\html\demo2\dist/../src/media/svg/icons\Communication\Archive.svg--><svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
                                                        <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                                            <rect x="0" y="0" width="24" height="24"/>
                                                            <path d="M4.5,3 L19.5,3 C20.3284271,3 21,3.67157288 21,4.5 L21,19.5 C21,20.3284271 20.3284271,21 19.5,21 L4.5,21 C3.67157288,21 3,20.3284271 3,19.5 L3,4.5 C3,3.67157288 3.67157288,3 4.5,3 Z M8,5 C7.44771525,5 7,5.44771525 7,6 C7,6.55228475 7.44771525,7 8,7 L16,7 C16.5522847,7 17,6.55228475 17,6 C17,5.44771525 16.5522847,5 16,5 L8,5 Z" fill="#000000"/>
                                                        </g>
                                                    </svg><!--end::Svg Icon--></span>
                                                </span>
                                                <span class="navi-text font-size-lg">Proposals</span>
                                            </a>
                                        </li>
                                        <li class="navi-item mb-2">
                                            <a data-toggle="pill" href="#contracts" class="navi-link py-4">
                                                <span class="navi-icon mr-2">
                                                    <span class="svg-icon svg-icon-2x"><!--begin::Svg Icon | path:C:\wamp64\www\keenthemes\themes\metronic\theme\html\demo2\dist/../src/media/svg/icons\Home\Book-open.svg--><svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
                                                        <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                                            <rect x="0" y="0" width="24" height="24"/>
                                                            <path d="M13.6855025,18.7082217 C15.9113859,17.8189707 18.682885,17.2495635 22,17 C22,16.9325178 22,13.1012863 22,5.50630526 L21.9999762,5.50630526 C21.9999762,5.23017604 21.7761292,5.00632908 21.5,5.00632908 C21.4957817,5.00632908 21.4915635,5.00638247 21.4873465,5.00648922 C18.658231,5.07811173 15.8291155,5.74261533 13,7 C13,7.04449645 13,10.79246 13,18.2438906 L12.9999854,18.2438906 C12.9999854,18.520041 13.2238496,18.7439052 13.5,18.7439052 C13.5635398,18.7439052 13.6264972,18.7317946 13.6855025,18.7082217 Z" fill="#000000"/>
                                                            <path d="M10.3144829,18.7082217 C8.08859955,17.8189707 5.31710038,17.2495635 1.99998542,17 C1.99998542,16.9325178 1.99998542,13.1012863 1.99998542,5.50630526 L2.00000925,5.50630526 C2.00000925,5.23017604 2.22385621,5.00632908 2.49998542,5.00632908 C2.50420375,5.00632908 2.5084219,5.00638247 2.51263888,5.00648922 C5.34175439,5.07811173 8.17086991,5.74261533 10.9999854,7 C10.9999854,7.04449645 10.9999854,10.79246 10.9999854,18.2438906 L11,18.2438906 C11,18.520041 10.7761358,18.7439052 10.4999854,18.7439052 C10.4364457,18.7439052 10.3734882,18.7317946 10.3144829,18.7082217 Z" fill="#000000" opacity="0.3"/>
                                                        </g>
                                                    </svg><!--end::Svg Icon--></span>
                                                </span>
                                                <span class="navi-text font-size-lg">Contracts</span>
                                            </a>
                                        </li>
                                        <li class="navi-item mb-2">
                                            <a data-toggle="pill" href="#tickets" class="navi-link py-4">
                                                <span class="navi-icon mr-2">
                                                    <span class="svg-icon svg-icon-2x"><!--begin::Svg Icon | path:C:\wamp64\www\keenthemes\themes\metronic\theme\html\demo2\dist/../src/media/svg/icons\Shopping\Ticket.svg--><svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
                                                        <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                                            <rect x="0" y="0" width="24" height="24"/>
                                                            <path d="M3,10.0500091 L3,8 C3,7.44771525 3.44771525,7 4,7 L9,7 L9,9 C9,9.55228475 9.44771525,10 10,10 C10.5522847,10 11,9.55228475 11,9 L11,7 L21,7 C21.5522847,7 22,7.44771525 22,8 L22,10.0500091 C20.8588798,10.2816442 20,11.290521 20,12.5 C20,13.709479 20.8588798,14.7183558 22,14.9499909 L22,17 C22,17.5522847 21.5522847,18 21,18 L11,18 L11,16 C11,15.4477153 10.5522847,15 10,15 C9.44771525,15 9,15.4477153 9,16 L9,18 L4,18 C3.44771525,18 3,17.5522847 3,17 L3,14.9499909 C4.14112016,14.7183558 5,13.709479 5,12.5 C5,11.290521 4.14112016,10.2816442 3,10.0500091 Z M10,11 C9.44771525,11 9,11.4477153 9,12 L9,13 C9,13.5522847 9.44771525,14 10,14 C10.5522847,14 11,13.5522847 11,13 L11,12 C11,11.4477153 10.5522847,11 10,11 Z" fill="#000000" opacity="0.3" transform="translate(12.500000, 12.500000) rotate(-45.000000) translate(-12.500000, -12.500000) "/>
                                                        </g>
                                                    </svg><!--end::Svg Icon--></span>
                                                </span>
                                                <span class="navi-text font-size-lg">Tickets</span>
                                            </a>
                                        </li>
                                    </ul>
                                <div class="ps__rail-x" style="left: 0px; bottom: 0px;"><div class="ps__thumb-x" tabindex="0" style="left: 0px; width: 0px;"></div></div><div class="ps__rail-y" style="top: 0px; right: -2px;"><div class="ps__thumb-y" tabindex="0" style="top: 0px; height: 0px;"></div></div></div>
                                <!--end::Wrapper-->
                                <!--begin::Purchase-->
                                <div class="offcanvas-footer" kt-hidden-height="0" style="">
                                    
                                </div>
                                <!--end::Purchase-->
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
                            <div class="card-toolbar">
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
                            </div>
                        </div>
                        <!--end::Header-->
                        <!--begin::Body-->
                        <div class="card-body d-flex flex-column">
                            <div class="flex-grow-1">
                                <div id="projects_progress_chart" style="height: 200px"></div>
                            </div>
                            <div class="pt-5">
                                <p class="text-center font-weight-normal font-size-lg pb-7">Notes: Charts requires Project Tasks 
                                <br />to be completed</p>
                                {{--  <a href="#" class="btn btn-success btn-shadow-hover font-weight-bolder w-100 py-3">Generate Report</a>  --}}
                            </div>
                        </div>
                        <!--end::Body-->
                    </div>
                    <!--end::Mixed Widget 14-->
                </div>
                <!--end::Aside-->
                <!--begin::Content-->


{{-- 
                <div class="tab-content">
                    <div id="home">
                      <h3>HOME</h3>
                      <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.</p>
                    </div>
                    <div id="menu1" class="">
                      <h3>Menu 1</h3>
                      <p>Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.</p>
                    </div>
                    <div id="menu2" class="tab-pane fade">
                      <h3>Menu 2</h3>
                      <p>Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium, totam rem aperiam.</p>
                    </div>
                    <div id="menu3" class="tab-pane fade">
                      <h3>Menu 3</h3>
                      <p>Eaque ipsa quae ab illo inventore veritatis et quasi architecto beatae vitae dicta sunt explicabo.</p>
                    </div>
                  </div> --}}



                <div class="flex-row-fluid ml-lg-8 tab-content">
                    <div id="general" class="tab-pane fade in active show">
                        @include('partials.customers.projects', ['customer' => $customer])
                        @include('partials.customers.invoices', ['customer' => $customer])
                        @include('partials.customers.proposals', ['customer' => $customer])
                        @include('partials.customers.contracts', ['customer' => $customer])
                        @include('partials.customers.tickets', ['customer' => $customer])
                    </div>
                    <div id="projects" class="tab-pane fade">
                        @include('partials.customers.projects', ['customer' => $customer])
                    </div>
                    <div id="invoices" class="tab-pane fade">
                        @include('partials.customers.invoices', ['customer' => $customer])
                    </div>
                    <div id="proposals" class="tab-pane fade">
                        @include('partials.customers.proposals', ['customer' => $customer])
                    </div>
                    <div id="contracts" class="tab-pane fade">
                        @include('partials.customers.contracts', ['customer' => $customer])
                    </div>
                    <div id="tickets" class="tab-pane fade">
                        @include('partials.customers.tickets', ['customer' => $customer])
                    </div>
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
    <!--begin::Edit project Modal-->
    @foreach ($customer->projects as $project)
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
    @endforeach
    <!--end::Edit project Modal-->
    <!--begin::Proposals Modals-->
    @if (count($customer->proposals) > 0)
        @foreach ($customer->proposals as $proposal)
            <div class="modal fade wide-modal" id="docs-{{$proposal->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Proposal Document</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                    </div>
                    <div class="modal-body">
                        <iframe src="{{ url('/uploads/files/proposals/'.$proposal->docs)}}" frameborder="3"></iframe>
                    </div>
                </div>
                </div>
            </div>
             <!--begin::Edit proposal Modal-->
             <div class="modal fade wide-modal" id="edit-proposal-{{$proposal->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Edit {{ucwords($proposal->name)}}</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                        </div>
                        <div class="modal-body">
                            @include('proposals.edit', ['proposal' => $proposal])
                        </div>
                    </div>
                </div>
            </div>
            <!--end::Edit proposal Modal-->
        @endforeach
    @endif
    <!--end::Proposals Modals-->
    <!--begin::Contract Modals-->
    @if(count($customer->projects))
        @foreach ($customer->projects as $project)
            @foreach ($project->contracts as $contract)
                <div class="modal fade wide-modal" id="docs-{{$contract->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Contract Document</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                        </div>
                        <div class="modal-body">
                            <iframe src="{{ url('/uploads/files/contracts/'.$contract->docs)}}" frameborder="3"></iframe>
                        </div>
                    </div>
                    </div>
                </div>
                <div class="modal fade wide-modal" id="edit-contract-{{$contract->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Edit {{ucwords($contract->project->name)}} Contract</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                        </div>
                        <div class="modal-body">
                            @include('contracts.edit', ['contract' => $contract])
                        </div>
                    </div>
                    </div>
                </div>
            @endforeach
        @endforeach
    @endif
    
    <!--end::Contract Modals-->
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
                @section('customer')
                    {!! Form::select('user_id', Helper::customers()->pluck('name', 'id'),$customer->id, ['class' => 'd-none'])!!}
                @endsection
                @include('partials.projects.create')
            </div>
        </div>
        </div>
    </div>
    <!--end::New project Modal-->
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
    <!--begin::New Contract Modal-->
    <div class="modal fade wide-modal" id="new-contract" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">New Contract</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
            </div>
            <div class="modal-body">
                @section('projects')
                <div class="form-group row">
                    <label class="col-lg-3 col-form-label text-lg-right">Project Name:</label>
                    <div class="col-lg-4">
                        {!! Form::select('project_id', $customer->projects->pluck('name', 'id'), '', ['class' => 'form-control selectpicker required','data-live-search' => 'true'])!!}	
                        <span class="form-text text-muted">Please Choose Project</span>
                    </div>
                </div>
                @endsection
                @include('partials.contracts.create')
            </div>
        </div>
        </div>
    </div>
    <div class="modal fade wide-modal" id="new-ticket" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">New Ticket</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
            </div>
            <div class="modal-body">
                @include('tickets.create', ['customer' => $customer])
            </div>
        </div>
        </div>
    </div>
    <!--end::New Contract Modal-->
    <!--begin::New proposal Modal-->
    <div class="modal fade wide-modal" id="new-proposal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">New Proposal</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
            </div>
            <div class="modal-body">
                @section('customer')
                    {!! Form::select('user_id', Helper::customers()->pluck('name', 'id'),$customer->id, ['class' => 'd-none'])!!}
                @endsection
                @include('partials.proposals.create')
            </div>
        </div>
        </div>
    </div>
    <!--begin::SHow invoices Modal-->
    @if (count($customer->invoices) > 0)
        @foreach ($customer->invoices as $invoice)
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
                    <h5 class="modal-title" id="exampleModalLabel">{{ucwords($invoice->name)}}</h5>
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
            <h5 class="modal-title" id="exampleModalLabel">New Invoice</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
            </div>
            <div class="modal-body">
                @section('customer')
                    {!! Form::select('user_id', Helper::customers()->pluck('name', 'id'), $customer->id, ['class' => 'd-none'])!!}
                @endsection
                @include('partials.invoices.create')
            </div>
        </div>
        </div>
	</div>
	<!--end::New invoice Modal-->
@endsection
@section('scripts')
	<!--begin::Page Scripts(used by this page)-->
    <script src="{{asset('assets/js/pages/widgets.js')}}"></script>
    <script src="{{asset('assets/js/pages/crud/forms/widgets/bootstrap-datepicker.js')}}"></script>
    <script src="{{asset('assets/js/pages/custom/profile/profile.js')}}"></script>
    <script src="{{asset('assets/js/add/add-invoice.js')}}"></script>
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
           
            var _initMixedWidget14 = function() {
                // variables 
                var element = document.getElementById("projects_progress_chart");
                var height = parseInt(KTUtil.css(element, 'height'));
                
                var projects = @json($customer->projects);
                var completed = [];

                for (const key in projects) {
                    if (projects.hasOwnProperty(key)) {
                        if(projects[key].status == 3){
                            completed.push(key);
                        }
                    }
                }
                if(projects === undefined || projects.length == 0){
                    var percentage = 0;
                    
                }else{
                    var percentage = Math.round((completed.length/ projects.length) *100);
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

            window.setInterval(function(){
                var status = $('#create-status');
                var checked = status.parent('label').hasClass('checkbox-checked');
                if(checked){
                    status.click(function(){
                        status.parent('label').removeClass('checkbox-checked');
                        status.attr('value', 1);
                    });
                    
                }else{
                    status.click(function(){
                        status.parent('label').addClass('checkbox-checked');
                    status.attr('value', 0);
                    });
                }
            }, 500);

            // New Invoice Scripts
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

                
                console.log($('#discount_amount_input').val());
                
                $('#vat_ammount').text( vat_ammount + ' SAR' );
                $('#discount').text( discount_ammount + ' SAR' );
                
                
                $('#grand').text(grand_total + ' SAR');
                $('#grand_input').attr('value', grand_total);

            }, 500);

            $('.change-invoice-status').click(function(){

                var $this = $(this);
                var id = $this.attr('id').replace( /^\D+/g, '');
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
                
                form[0].submit(function(e) {
                    e.preventDefault(); // avoid to execute the actual submit of the form.

                    console.log('Hello!!!!!!!!!!!!')


                    $.ajax({
                        headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
                        url:  base_URL + '/invoices/' + id ,
                        method: 'POST', 
                        data: $this.parents('form').serialize() + "&_method=PUT",
                        success: function(data){
                            // setTimeout(function(){// wait for 5 secs(2)
                            //     location.reload(); // then reload the page.(3)
                            // }, 1000); 
                            // console.log(data);
                            alert(data); 
                            
                        }
                    });
                });
                
                // console.log(checked);

                setTimeout(function(){
                    // form.submit();
                }, 500);
            });

           
            $('.show-invoice-btn').click(function(){
                $(this).attr('data-target');
                var id = $(this).attr('data-target').replace( /^\D+/g, '');
                
                var invoice = document.getElementById('invoice_show_' + id);

                $("#invoice_show_" + id + ' #download').click(function(){
                    var divContents = $("#invoice_show_" + id).html();
                    var printWindow = window.open('', '', 'height=1000,width=800');
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
                console.log(invoice)
            });




			$('.basic-datapicker').datepicker({
				rtl: KTUtil.isRTL(),
				orientation: "bottom left",
				todayHighlight: true
            });
            
           
            // New Project Scripts
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

            // Edit Proposals 
            $(document).ready(function(){
                $('.edit-proposal-btn').click(function(){
                    $(this).attr('data-target');
                    var id = $(this).attr('data-target').replace( /^\D+/g, '');
                    
                    var proposal_date_box = $('#proposal_id_' + id);
                    var	proposal_datepicker = $('#proposal_datepicker_'+ id);
                    console.log(proposal_datepicker);
                    proposal_datepicker.datepicker({
                        rtl: KTUtil.isRTL(),
                        todayBtn: "linked",
                        clearBtn: true,
                        todayHighlight: true,
                        templates: arrows
                    });

                    const inputFile = document.getElementById('docs_' + id);
                    const preview_image = document.getElementById('file_preview_' + id);

                    inputFile.addEventListener('change', function(){
                        const file = this.files[0];
                        
                        if(file){
                            const reader = new FileReader();
                            console.log(file);
                            reader.addEventListener("load", function(){
                                preview_image.innerHTML = file.name;
                            })

                            reader.readAsDataURL(file);
                        }else{
                            
                        }
                    })

                    window.setInterval(function(){
                        var status = $('#status_' + id);
                        console.log(status);
                        var checked = status.parent('label').hasClass('checkbox-checked');
                        if(checked){
                            status.click(function(){
                                status.parent('label').removeClass('checkbox-checked');
                                status.attr('value', 1);
                            });
                            
                        }else{
                            status.click(function(){
                                status.parent('label').addClass('checkbox-checked');
                            status.attr('value', 0);
                            });
                        }
                    }, 500);
                }) 
            })
            $(document).ready(function(){
                window.setInterval(function(){
                    var status = $('#create-status');
                    var checked = status.parent('label').hasClass('checkbox-checked');
                    if(checked){
                        status.click(function(){
                            status.parent('label').removeClass('checkbox-checked');
                            status.attr('value', 1);
                        });
                        
                    }else{
                        status.click(function(){
                            status.parent('label').addClass('checkbox-checked');
                        status.attr('value', 0);
                        });
                    }
                }, 500);
            })

            // Edit contracts Scripts 
            $('.edit-contract-btn').click(function(){
                $(this).attr('data-target');
                var id = $(this).attr('data-target').replace( /^\D+/g, '');
                
                const inputFile = document.getElementById('docs_' + id);
                const preview_image = document.getElementById('file_preview_' + id);

                inputFile.addEventListener('change', function(){
                    const file = this.files[0];
                    
                    if(file){
                        const reader = new FileReader();
                        console.log(file);
                        reader.addEventListener("load", function(){
                            preview_image.innerHTML = file.name;
                        })

                        reader.readAsDataURL(file);
                    }else{
                        
                    }
                })

                window.setInterval(function(){
                    var status = $('#status_' + id);
                    console.log(status);
                    var checked = status.parent('label').hasClass('checkbox-checked');
                    if(checked){
                        status.click(function(){
                            status.parent('label').removeClass('checkbox-checked');
                            status.attr('value', 1);
                        });
                        
                    }else{
                        status.click(function(){
                            status.parent('label').addClass('checkbox-checked');
                        status.attr('value', 0);
                        });
                    }
                }, 500);
            }) 
        
            });  
    </script>
@endsection

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
                @if (auth()->user()->role->name == "admin")
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
                                <th style="min-width: 150px">Services</th>
                                <th style="min-width: 150px">progress</th>
                                @if (auth()->user()->role->name == "admin")
                                    <th class="pr-0 text-right" style="min-width: 150px">action</th>
                                @endif
                            </tr>
                        </thead>
                        <tbody>
                            @if(count($customer->projects))
                                @foreach ($customer->projects as $project)
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
                                            <a href="{{url('projects/'.$project->id)}}" class="text-dark-75 font-weight-bolder text-hover-primary mb-1 font-size-lg">{{$project->name}}</a>
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
                                                <span class="svg-icon svg-icon-primary svg-icon-2x"><!--begin::Svg Icon | path:C:\wamp64\www\keenthemes\themes\metronic\theme\html\demo2\dist/../src/media/svg/icons\Devices\Display1.svg--><svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
                                                    <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                                        <rect x="0" y="0" width="24" height="24"/>
                                                        <path d="M11,20 L11,17 C11,16.4477153 11.4477153,16 12,16 C12.5522847,16 13,16.4477153 13,17 L13,20 L15.5,20 C15.7761424,20 16,20.2238576 16,20.5 C16,20.7761424 15.7761424,21 15.5,21 L8.5,21 C8.22385763,21 8,20.7761424 8,20.5 C8,20.2238576 8.22385763,20 8.5,20 L11,20 Z" fill="#000000" opacity="0.3"/>
                                                        <path d="M3,5 L21,5 C21.5522847,5 22,5.44771525 22,6 L22,16 C22,16.5522847 21.5522847,17 21,17 L3,17 C2.44771525,17 2,16.5522847 2,16 L2,6 C2,5.44771525 2.44771525,5 3,5 Z M4.5,8 C4.22385763,8 4,8.22385763 4,8.5 C4,8.77614237 4.22385763,9 4.5,9 L13.5,9 C13.7761424,9 14,8.77614237 14,8.5 C14,8.22385763 13.7761424,8 13.5,8 L4.5,8 Z M4.5,10 C4.22385763,10 4,10.2238576 4,10.5 C4,10.7761424 4.22385763,11 4.5,11 L7.5,11 C7.77614237,11 8,10.7761424 8,10.5 C8,10.2238576 7.77614237,10 7.5,10 L4.5,10 Z" fill="#000000"/>
                                                    </g>
                                                </svg><!--end::Svg Icon--></span>
                                            </a>
                                            @if(auth()->user()->isAdmin())
                                                <a class="btn btn-sm btn-clean btn-icon edit-project-btn" title="Edit" data-toggle= "modal" data-target="#edit-project-{{$project->id}}">
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
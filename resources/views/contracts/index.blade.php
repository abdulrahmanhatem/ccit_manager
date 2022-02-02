


@extends('layouts.app')
@section('title', 'Contracts')
@section('content')
    <!--begin::Subheader-->
    <div class="subheader min-h-lg-175px pt-5 pb-7 subheader-transparent" id="kt_subheader">
        <div class="container d-flex align-items-center justify-content-between flex-wrap flex-sm-nowrap">
            <!--begin::Details-->
            <div class="d-flex align-items-center flex-wrap mr-2">
                <!--begin::Heading-->
                <div class="d-flex flex-column">
                    <!--begin::Title-->
                    <h2 class="text-white font-weight-bold my-2 mr-5">Contracts</h2>
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
                        <a href="{{url('/contract')}}" class="text-white text-hover-white opacity-75 hover-opacity-100">Contracts</a>
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
                        <h3 class="card-label">Contract Management
                        <span class="d-block text-muted pt-2 font-size-sm">Contract management made easy</span></h3>
                    </div>
                    <div class="card-toolbar">
                        <!--begin::Button-->
                        <a data-toggle="modal" data-target="#new-contract" class="btn btn-primary font-weight-bolder">
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
                        </span>New Contract</a>
                        <!--end::Button-->
                    </div>
                </div>
                <!--end::Header-->
                <!--begin::Body-->
                <div class="card-body">
                    {{-- <!--begin::Search Form-->
                    <div class="mb-7">
                        {!! Form::open(['action'=>'ContractController@search', 'method'=>'GET', 'enctype' =>'multipart/form-data', ' novalidate', 'class' => 'needs-validation d-block'])!!}
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
                    <!--end::Search Form--> --}}
                    <!--end: Search Form-->
                    <!--begin: Datatable-->
                    {{-- <div class="datatable datatable-bordered datatable-head-custom" id="kt_datatable"></div> --}}
                    <table class="table d-none">
                        <thead>
                            <tr>
                                <th scope="col">ID</th>
                                <th scope="col">Project</th>
                                <th scope="col">Customer</th>
                                <th scope="col">Start Date</th>
                                <th scope="col">End Date</th>
                                <th scope="col">Progress</th>
                                <th scope="col">Total</th>
                                <th scope="col">File</th>
                                <th scope="col">Status</th>
                                <th scope="col">Settings</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($contracts as $contract)
                                <tr>
                                    <th scope="row">
                                        <a class="text-dark-75 mt-3 d-block" href="{{url('contracts/'. $contract->project->id)}}">
                                            {{$contract->id}}
                                        </a>
                                    </th>
                                    <td  class="datatable-cell">
                                        <a style="width: 250px;" href="{{url('projects/'. $contract->project->id)}}">
                                            <div class="d-flex align-items-center">
                                                @if (Helper::fileExists($contract->project->avatar, '/uploads/images/logos/projects'))
                                                    <div class="symbol symbol-40 symbol-sm flex-shrink-0  ">
                                                        <img class="" src="{{asset('uploads/images/logos/projects/'.$contract->project->avatar)}}" alt="photo" />
                                                    </div>
                                                @else
                                                    <div class="symbol symbol-40 symbol-sm flex-shrink-0 symbol-light-success">
                                                        <span class="symbol-label font-size-h4">
                                                            {{$contract->project->name[0]}}
                                                        </span>
                                                    </div>
                                                @endif
                                                <div class="ml-3">
                                                    <div class="text-dark-75 font-weight-bolder font-size-lg mb-0">{{$contract->project->name}}</div>
                                                </div>
                                            </div>
                                        </a>
                                    </td>
                                    <td  class="datatable-cell">
                                        <a style="width: 250px;" href="{{url('customers/'. $contract->project->user->id)}}">
                                            <div class="d-flex align-items-center">
                                                @if (Helper::avatarCheck($contract->project->user->avatar))
                                                    <div class="symbol symbol-40 symbol-sm flex-shrink-0 ">
                                                        <img class="" src="{{asset('uploads/images/avatars/'.$contract->project->user->avatar)}}" alt="photo" />
                                                    </div>
                                                @else
                                                    <div class="symbol symbol-40 symbol-sm flex-shrink-0 symbol-light-primary">
                                                        <span class="symbol-label font-size-h4">
                                                            {{$contract->project->user->name[0]}}
                                                        </span>
                                                    </div>
                                                @endif
                                               
                                                <div class="ml-3">
                                                    <div class="text-dark-75 font-weight-bolder font-size-lg mb-0">{{$contract->project->user->name}}</div>
                                                    <span  class="text-muted font-weight-bold text-hover-primary">{{$contract->project->user->email}}</span>
                                                </div>
                                            </div>
                                        </a>
                                    </td>
                                    <td class="pt-5">{{$contract->project->start_date}}</td>
                                    <td class="pt-5">{{$contract->project->end_date}}</td>
                                    <td class="pt-5">
                                        @if ($contract->project->progress < 20)
                                            <div class="d-flex flex-column w-100 mr-2">
                                                <div class="d-flex align-items-center justify-content-between mb-2">
                                                    <span class="text-muted mr-2 font-size-sm font-weight-bold">{{$contract->project->progress}}</span>
                                                    <span class="text-muted font-size-sm font-weight-bold">Progress</span>
                                                </div>
                                                <div class="progress progress-xs w-100">
                                                <div class="progress-bar bg-danger" role="progressbar" style="width: 5%;" aria-valuenow="{{$contract->project->progress}}" aria-valuemin="0" aria-valuemax="100"></div>
                                                </div>
                                            </div>
                                        @elseif ($contract->project->progress <= 40)
                                            <div class="d-flex flex-column w-100 mr-2">
                                                <div class="d-flex align-items-center justify-content-between mb-2">
                                                    <span class="text-muted mr-2 font-size-sm font-weight-bold">{{$contract->project->progress}}</span>
                                                    <span class="text-muted font-size-sm font-weight-bold">Progress</span>
                                                </div>
                                                <div class="progress progress-xs w-100">
                                                <div class="progress-bar bg-primary" role="progressbar" style="width: {{$contract->project->progress}}%;" aria-valuenow="{{$contract->project->progress}}" aria-valuemin="0" aria-valuemax="100"></div>
                                                </div>
                                            </div>
                                        @elseif ($contract->project->progress <= 60)
                                            <div class="d-flex flex-column w-100 mr-2">
                                                <div class="d-flex align-items-center justify-content-between mb-2">
                                                    <span class="text-muted mr-2 font-size-sm font-weight-bold">{{$contract->project->progress}}</span>
                                                    <span class="text-muted font-size-sm font-weight-bold">Progress</span>
                                                </div>
                                                <div class="progress progress-xs w-100">
                                                <div class="progress-bar bg-info" role="progressbar" style="width: {{$contract->project->progress}}%;" aria-valuenow="{{$contract->project->progress}}" aria-valuemin="0" aria-valuemax="100"></div>
                                                </div>
                                            </div>
                                        @elseif ($contract->project->progress <= 80)
                                            <div class="d-flex flex-column w-100 mr-2">
                                                <div class="d-flex align-items-center justify-content-between mb-2">
                                                    <span class="text-muted mr-2 font-size-sm font-weight-bold">{{$contract->project->progress}}</span>
                                                    <span class="text-muted font-size-sm font-weight-bold">Progress</span>
                                                </div>
                                                <div class="progress progress-xs w-100">
                                                <div class="progress-bar bg-warning" role="progressbar" style="width: {{$contract->project->progress}}%;" aria-valuenow="{{$contract->project->progress}}" aria-valuemin="0" aria-valuemax="100"></div>
                                                </div>
                                            </div>
                                        @elseif ($contract->project->progress <= 100)
                                            <div class="d-flex flex-column w-100 mr-2">
                                                <div class="d-flex align-items-center justify-content-between mb-2">
                                                    <span class="text-muted mr-2 font-size-sm font-weight-bold">{{$contract->project->progress}}</span>
                                                    <span class="text-muted font-size-sm font-weight-bold">Progress</span>
                                                </div>
                                                <div class="progress progress-xs w-100">
                                                <div class="progress-bar bg-success" role="progressbar" style="width: {{$contract->project->progress}}%;" aria-valuenow="{{$contract->project->progress}}" aria-valuemin="0" aria-valuemax="100"></div>
                                                </div>
                                            </div>
                                        @endif
                                        
                                    </td>
                                    <td class="pt-5">
                                        @if ($contract->project->status == 0)
                                            <span class="label label-inline label-light-danger font-weight-bold">
                                                Pending
                                            </span>
                                        @elseif ($contract->project->status == 1)
                                            <span class="label label-inline label-light-primary font-weight-bold">
                                                Started
                                            </span>
                                        @elseif ($contract->project->status == 2)
                                            <span class="label label-inline label-light-warning font-weight-bold">
                                                In Progress
                                            </span>
                                        @elseif ($contract->project->status == 3)
                                            <span class="label label-inline label-light-success font-weight-bold">
                                                Completed
                                            </span>
                                        @endif
                                    </td>
                                    <td class="pt-5">
                                        <a class="text-dark-75 mt-3 d-block" href="{{url('contracts/'. $contract->project->id)}}">
                                            {{$contract->grand_total}}
                                        </a>
                                    </td>
                                    <td class="pt-5">
                                        @if (Helper::fileExists($contract->docs, 'uploads/files/contracts'))
                                            <span class="svg-icon svg-icon-primary svg-icon-2x pointer"  data-toggle="modal" data-target="#docs-{{$contract->id}}" title="Show Contract File"><!--begin::Svg Icon | path:C:\wamp64\www\keenthemes\themes\metronic\theme\html\demo2\dist/../src/media/svg/icons\Files\File.svg--><svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
                                                <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                                    <polygon points="0 0 24 0 24 24 0 24"/>
                                                    <path d="M5.85714286,2 L13.7364114,2 C14.0910962,2 14.4343066,2.12568431 14.7051108,2.35473959 L19.4686994,6.3839416 C19.8056532,6.66894833 20,7.08787823 20,7.52920201 L20,20.0833333 C20,21.8738751 19.9795521,22 18.1428571,22 L5.85714286,22 C4.02044787,22 4,21.8738751 4,20.0833333 L4,3.91666667 C4,2.12612489 4.02044787,2 5.85714286,2 Z" fill="#000000" fill-rule="nonzero" opacity="0.3"/>
                                                    <rect fill="#000000" x="6" y="11" width="9" height="2" rx="1"/>
                                                    <rect fill="#000000" x="6" y="15" width="5" height="2" rx="1"/>
                                                </g>
                                            </svg><!--end::Svg Icon--></span>
                                        @endif
                                    </td>
                                    <td>
                                    <a class="btn btn-sm btn-clean btn-icon" title="Edit" data-toggle="modal" data-target="#edit-contract-{{$contract->id}}">
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
                        </tbody>
                    </table>
                    <div class="datatable datatable-bordered datatable-head-custom" id="kt_datatable"></div>
                    <!--end: Datatable-->
                    <!--begin: Pagination-->
                    {{-- <div class="d-flex justify-content-between align-items-center flex-wrap">
                        <div class="d-flex flex-wrap py-2 mr-3">
                            {{ $contracts->links() }}
                        </div>
                        <div class="d-flex align-items-center py-3">
                           
                            <span class="text-muted">Displaying {{count($contracts)}} of 
                                @if (!empty($all))
                                    {{count($all)}}
                                @endif
                                records</span>
                        </div>
                    </div> --}}
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
    <!--begin::Contract Show Modal-->
    @foreach ($contracts as $contract)
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
    @endforeach
    <!--end::Contract Show Modal-->
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
                @include('contracts.create')
            </div>
        </div>
        </div>
    </div>
    <!--end::New Contract Modal-->
    <!--begin::Edit Contract Modal-->
    @foreach ($contracts as $contract)
        <div class="modal fade wide-modal" id="edit-contract-{{$contract->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Edit {{$contract->project->name}} Contract</h5>
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
    <!--end::Edit Contract Modal-->
@endsection
@section('scripts')
        
        <script>
            $(document).ready(function(){
                var contracts = @json($contracts).data;
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
                console.log(getProjectUser(15))
                function fileExists(file, path){
                    var obj = {file: file, path : path};
                    var jsonObj = JSON.stringify(obj);
                    var check = {{ Helper::FileExists('XwdmoHng_1598883753.jpeg', '/uploads/images/logos/projects') }};
                    return check;
                }
                
                console.log(fileExists('XwdmoHng_1598883753.jpeg', '/uploads/images/logos/projects'))
                var demo = function() {

                    var datatable = $('#kt_datatable').KTDatatable({
                        // datasource definition
                        data: {
                            type: 'local',
                            source: contracts,
                            pageSize: 10,
                        },

                        // layout definition
                        layout: {
                            scroll: false, // enable/disable datatable scroll both horizontal and vertical when needed.
                            // height: 450, // datatable's body's fixed height
                            footer: false, // display/hide footer
                        },

                        // column sorting
                        sortable: true,

                        pagination: true,

                        search: {
                            input: $('#kt_datatable_search_query'),
                            key: 'generalSearch'
                        },

                        // columns definition
                        columns: [{
                            field: 'id',
                            title: 'ID',
                            width: 20,
                            textAlign: 'center',
                            template: function(row) {
                                return row.id
                            }
                        }, {
                            field: 'project_id',
                            title: 'Project',
                            sortable: true,
                            width: 200,
                            template: function(row) {
                                var avatar = getProject(row.project_id).avatar;
                                if(avatar){
                                    avatar = '<div class="symbol symbol-40 symbol-sm flex-shrink-0  ">\
                                                <img class="" src="'+ asset_dir + 'uploads/images/logos/projects/' + getProject(row.project_id).avatar +'" alt="photo" />\
                                            </div>'
                                }else{
                                    avatar = '<div class="symbol symbol-40 symbol-sm flex-shrink-0 symbol-light-success">\
                                        <span class="symbol-label font-size-h4">' + 
                                            getProject(row.project_id).name[0] +
                                        '</span>\
                                    </div>'
                                }
                                return  '<a style="width: 250px;" href="' + base_url + '/projects/' + getProject(row.project_id).id +'">\
                                            <div class="d-flex align-items-center">' 
                                                + 
                                                   avatar
                                                +
                                                '<div class="ml-3">\
                                                    <div class="text-dark-75 font-weight-bolder font-size-lg mb-0">' + getProject(row.project_id).name +'</div>\
                                                </div>\
                                            </div>\
                                        </a> '  
                                
                            },
                        }, {
                            field: 'user_id',
                            title: 'Customer',
                            sortable: true,
                            width: 200,
                            sort: {
                                sort: "asc",
                                field: "user_id"
                            },
                            template: function(row) {
                                var avatar = getProjectUser(row.project_id).avatar;
                                if(avatar){
                                    avatar = '<div class="symbol symbol-40 symbol-sm flex-shrink-0  ">\
                                                <img class="" src="'+ asset_dir + 'uploads/images/avatars/' + getProjectUser(row.project_id).avatar +'" alt="photo" />\
                                            </div>'
                                }else{
                                    avatar = '<div class="symbol symbol-40 symbol-sm flex-shrink-0 symbol-light-success">\
                                        <span class="symbol-label font-size-h4">' + 
                                            getProjectUser(row.project_id).name[0] +
                                        '</span>\
                                    </div>'
                                }
                                return  '<a style="width: 250px;" href="' + base_url + '/customers/' + getProjectUser(row.project_id).id +'">\
                                            <div class="d-flex align-items-center">' 
                                                + 
                                                   avatar
                                                +
                                                '<div class="ml-3">\
                                                    <div class="text-dark-75 font-weight-bolder font-size-lg mb-0">' + getProjectUser(row.project_id).name +'</div>\
                                                </div>\
                                            </div>\
                                        </a> '  
                                
                            },
                        }, {
                            field: 'start_date',
                            title: 'Start Date',
                            sortable: true,
                            width: 80,
                            template: function(row) {
                                return getProject(row.project_id).start_date;
                            },
                        }, {
                            field: 'end_date',
                            title: 'End Date',
                            sortable: true,
                            width: 80,
                            template: function(row) {
                                return getProject(row.project_id).end_date;
                            },
                        }, {
                            field: 'grand_total',
                            title: 'Total',
                            sortable: true,
                            width: 80,
                            template: function(row) {
                                return row.grand_total;
                            },
                        },
                        {   field: 'status',
                            title: 'Status',
                            width: 80,
                            sort: {
                                sort: "asc",
                                field: "status"
                            },
                            sortable: true,
                            autoHide: false,
                            // callback function support for column rendering
                            template: function(row) {
                                var status = {
                                    0: {
                                        'title': 'Pending',
                                        'state': 'danger'
                                    },
                                    1: {
                                        'title': 'Startrd',
                                        'state': 'primary'
                                    },
                                    2: {
                                        'title': 'In Progress',
                                        'state': 'warning'
                                    },
                                    3: {
                                        'title': 'Completed',
                                        'state': 'success'
                                    },
                                };
                                return '<span class="label label-inline label-light-'+ status[getProject(row.project_id).status].state +' font-weight-bold">' +
                                    status[getProject(row.project_id).status].title +
                                            '</span>'; 
                            },
                        },
                        {   field: 'progress',
                            title: 'Progress',
                            sortable: true,
                            autoHide: false,
                            // callback function support for column rendering
                            template: function(row) {
                                if(getProject(row.project_id).progress <= 20){
                                    return ' <div class="d-flex flex-column w-100 mr-2">\
                                                <div class="d-flex align-items-center justify-content-between mb-2">\
                                                    <span class="text-muted mr-2 font-size-sm font-weight-bold">'+ getProject(row.project_id).progress +'</span>\
                                                    <span class="text-muted font-size-sm font-weight-bold">Progress</span>\
                                                </div>\
                                                <div class="progress progress-xs w-100">\
                                                <div class="progress-bar bg-danger" role="progressbar" style="width: 5%;" aria-valuenow="'+ getProject(row.project_id).progress +'" aria-valuemin="0" aria-valuemax="100"></div>\
                                                </div>\
                                            </div>'
                                }
                                else if(getProject(row.project_id).progress <= 40 ){
                                    return ' <div class="d-flex flex-column w-100 mr-2">\
                                                <div class="d-flex align-items-center justify-content-between mb-2">\
                                                    <span class="text-muted mr-2 font-size-sm font-weight-bold">'+ getProject(row.project_id).progress +'</span>\
                                                    <span class="text-muted font-size-sm font-weight-bold">Progress</span>\
                                                </div>\
                                                <div class="progress progress-xs w-100">\
                                                <div class="progress-bar bg-primary" role="progressbar" style="width:'+ getProject(row.project_id).progress +'%;" aria-valuenow="'+ getProject(row.project_id).progress +'" aria-valuemin="0" aria-valuemax="100"></div>\
                                                </div>\
                                            </div>'
                                }
                                else if(getProject(row.project_id).progress <= 60 ){
                                    return ' <div class="d-flex flex-column w-100 mr-2">\
                                                <div class="d-flex align-items-center justify-content-between mb-2">\
                                                    <span class="text-muted mr-2 font-size-sm font-weight-bold">'+ getProject(row.project_id).progress +'</span>\
                                                    <span class="text-muted font-size-sm font-weight-bold">Progress</span>\
                                                </div>\
                                                <div class="progress progress-xs w-100">\
                                                <div class="progress-bar bg-info" role="progressbar" style="width:'+ getProject(row.project_id).progress +'%;" aria-valuenow="'+ getProject(row.project_id).progress +'" aria-valuemin="0" aria-valuemax="100"></div>\
                                                </div>\
                                            </div>'
                                }
                                else if(getProject(row.project_id).progress <= 80 ){
                                    return ' <div class="d-flex flex-column w-100 mr-2">\
                                                <div class="d-flex align-items-center justify-content-between mb-2">\
                                                    <span class="text-muted mr-2 font-size-sm font-weight-bold">'+ getProject(row.project_id).progress +'</span>\
                                                    <span class="text-muted font-size-sm font-weight-bold">Progress</span>\
                                                </div>\
                                                <div class="progress progress-xs w-100">\
                                                <div class="progress-bar bg-warning" role="progressbar" style="width:'+ getProject(row.project_id).progress +'%;" aria-valuenow="'+ getProject(row.project_id).progress +'" aria-valuemin="0" aria-valuemax="100"></div>\
                                                </div>\
                                            </div>'
                                }
                                else if(getProject(row.project_id).progress <= 100 ){
                                    return ' <div class="d-flex flex-column w-100 mr-2">\
                                                <div class="d-flex align-items-center justify-content-between mb-2">\
                                                    <span class="text-muted mr-2 font-size-sm font-weight-bold">'+ getProject(row.project_id).progress +'</span>\
                                                    <span class="text-muted font-size-sm font-weight-bold">Progress</span>\
                                                </div>\
                                                <div class="progress progress-xs w-100">\
                                                <div class="progress-bar bg-success" role="progressbar" style="width:'+ getProject(row.project_id).progress +'%;" aria-valuenow="'+ getProject(row.project_id).progress +'" aria-valuemin="0" aria-valuemax="100"></div>\
                                                </div>\
                                            </div>'
                                }
                               
                             
                            },
                        }, {
                            field: 'docs',
                            title: 'Files',
                            width: 50,
                            template: function(row) {
                                  
                                if(row.docs){
                                    return '<span class="svg-icon svg-icon-primary svg-icon-2x pointer"  data-toggle="modal" data-target="#docs-'+ row.id +'" title="Show Contract File"><!--begin::Svg Icon | path:C:\wamp64\www\keenthemes\themes\metronic\theme\html\demo2\dist/../src/media/svg/icons\Files\File.svg--><svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">\
                                                <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">\
                                                    <polygon points="0 0 24 0 24 24 0 24"/>\
                                                    <path d="M5.85714286,2 L13.7364114,2 C14.0910962,2 14.4343066,2.12568431 14.7051108,2.35473959 L19.4686994,6.3839416 C19.8056532,6.66894833 20,7.08787823 20,7.52920201 L20,20.0833333 C20,21.8738751 19.9795521,22 18.1428571,22 L5.85714286,22 C4.02044787,22 4,21.8738751 4,20.0833333 L4,3.91666667 C4,2.12612489 4.02044787,2 5.85714286,2 Z" fill="#000000" fill-rule="nonzero" opacity="0.3"/>\
                                                    <rect fill="#000000" x="6" y="11" width="9" height="2" rx="1"/>\
                                                    <rect fill="#000000" x="6" y="15" width="5" height="2" rx="1"/>\
                                                </g>\
                                            </svg><!--end::Svg Icon--></span> ';
                                }else{
                                    return '';
                                }            
                            
                            },
                        },
                        {
                            field: 'Actions',
                            title: 'Actions',
                            sortable: false,
                            width: 50,
                            overflow: 'visible',
                            autoHide: false,
                            template: function(row) {
                                return '\
                                        <span class="btn btn-sm btn-clean btn-icon mr-2" title="Edit details" data-target="#edit-contract-'+ row.id +'" data-toggle="modal">\
                                            <span class="svg-icon svg-icon-primary svg-icon-2x"><!--begin::Svg Icon | path:C:\wamp64\www\keenthemes\themes\metronic\theme\html\demo2\dist/../src/media/svg/icons\General\Shield-check.svg--><svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">\
                                                <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">\
                                                    <rect x="0" y="0" width="24" height="24"/>\
                                                    <path d="M4,4 L11.6314229,2.5691082 C11.8750185,2.52343403 12.1249815,2.52343403 12.3685771,2.5691082 L20,4 L20,13.2830094 C20,16.2173861 18.4883464,18.9447835 16,20.5 L12.5299989,22.6687507 C12.2057287,22.8714196 11.7942713,22.8714196 11.4700011,22.6687507 L8,20.5 C5.51165358,18.9447835 4,16.2173861 4,13.2830094 L4,4 Z" fill="#000000" opacity="0.3"/>\
                                                    <path d="M11.1750002,14.75 C10.9354169,14.75 10.6958335,14.6541667 10.5041669,14.4625 L8.58750019,12.5458333 C8.20416686,12.1625 8.20416686,11.5875 8.58750019,11.2041667 C8.97083352,10.8208333 9.59375019,10.8208333 9.92916686,11.2041667 L11.1750002,12.45 L14.3375002,9.2875 C14.7208335,8.90416667 15.2958335,8.90416667 15.6791669,9.2875 C16.0625002,9.67083333 16.0625002,10.2458333 15.6791669,10.6291667 L11.8458335,14.4625 C11.6541669,14.6541667 11.4145835,14.75 11.1750002,14.75 Z" fill="#000000"/>\
                                                    </g>\
                                                </svg><!--end::Svg Icon-->\
                                            </span>\
                                        </span>\
                                    '
                            },
                        }],
                        
                    });

                    $('#kt_datatable_search_status').on('change', function() {
                        datatable.search($(this).val().toLowerCase(), 'status');
                    });

                    $('#kt_datatable_search_type').on('change', function() {
                        datatable.search($(this).val().toLowerCase(), 'Type');
                    });

                    $('#kt_datatable_search_status, #kt_datatable_search_type').selectpicker();
                };
                demo();

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
            })
        </script>   
        <script src="{{asset('assets/js/pages/crud/ktdatatable/base/data-local.min.js') }}"></script>
@endsection
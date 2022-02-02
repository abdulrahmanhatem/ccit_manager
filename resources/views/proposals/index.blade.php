


@extends('layouts.app')
@section('title', 'Proposals')
@section('content')
    <!--begin::Subheader-->
    <div class="subheader min-h-lg-175px pt-5 pb-7 subheader-transparent" id="kt_subheader">
        <div class="container d-flex align-items-center justify-content-between flex-wrap flex-sm-nowrap">
            <!--begin::Details-->
            <div class="d-flex align-items-center flex-wrap mr-2">
                <!--begin::Heading-->
                <div class="d-flex flex-column">
                    <!--begin::Title-->
                    <h2 class="text-white font-weight-bold my-2 mr-5">Proposals</h2>
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
                        <a href="{{url('/')}}" class="text-white text-hover-white opacity-75 hover-opacity-100">Dahsboard</a>
                        <!--end::Item-->
                        <!--begin::Item-->
                        <span class="label label-dot label-sm bg-white opacity-75 mx-3"></span>
                        <a href="{{url('/proposals')}}" class="text-white text-hover-white opacity-75 hover-opacity-100">Proposals</a>
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
    <div class="content d-flex flex-column-fluid">
        <!--begin::Container-->
        <div class="container">
            <!--begin::Card-->
            <div class="card card-custom">
                <div class="card-header flex-wrap border-0 pt-6 pb-0">
                    <div class="card-title">
                        <h3 class="card-label">Proposals
                        <span class="text-muted pt-2 font-size-sm d-block">Proposals Datatable</span></h3>
                    </div>
                    <div class="card-toolbar">
                        <!--begin::Dropdown-->
                        <!--end::Dropdown-->
                        <!--begin::Button-->
                    <a data-toggle="modal" data-target="#new-proposal" class="btn btn-primary font-weight-bolder">
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
                        </span>New Proposal</a>
                        <!--end::Button-->
                    </div>
                </div>
                <div class="card-body">
                    <!--begin::Search Form-->
                    <div class="mb-7">
                    <table class="table">
                        <thead>
                            <tr>
                                <th scope="col">ID</th>
                                <th scope="col">Customer</th>
                                <th scope="col">Name</th>
                                <th scope="col">Price</th>
                                <th scope="col">Created Dete</th>
                                <th scope="col">Expired Dete</th>
                                <th scope="col">Status</th> 
                                <th scope="col">File</th>
                                <th scope="col">Settings</th>
                            </tr>
                        </thead>
                        <tbody>
                            @if(count($proposals) > 0)
                                @foreach ($proposals as $proposal)
                                    <tr>
                                        <th scope="row">
                                            <a class="text-dark-75 mt-3 d-block" href="{{url('customers/'. $proposal->user->id)}}">
                                                {{$proposal->id}}
                                            </a>
                                        </th>
                                        <td  class="datatable-cell">
                                            <a style="width: 250px;" href="{{url('customers/'. $proposal->user->id)}}">
                                                <div class="d-flex align-items-center">
                                                    @if (Helper::avatarCheck($proposal->user->avatar))
                                                        <div class="symbol symbol-40 symbol-sm flex-shrink-0 ">
                                                            <img class="" src="{{asset('uploads/images/avatars/'.$proposal->user->avatar)}}" alt="photo" />
                                                        </div>
                                                    @else
                                                        <div class="symbol symbol-40 symbol-sm flex-shrink-0 symbol-light-primary">
                                                            <span class="symbol-label font-size-h4">
                                                                {{$proposal->user->name[0]}}
                                                            </span>
                                                        </div>
                                                    @endif
                                                    <div class="ml-3">
                                                        <div class="text-dark-75 font-weight-bolder font-size-lg mb-0">{{$proposal->user->name}}</div>
                                                        <span  class="text-muted font-weight-bold text-hover-primary">{{$proposal->user->email}}</span>
                                                    </div>
                                                </div>
                                            </a>
                                        </td>
                                        <td class="pt-5">{{$proposal->name}}</td>
                                        <td class="pt-5" style="width: 80px">{{$proposal->price}} SAR</td>
                                        <td class="pt-5">{{$proposal->created_at->format('d M h:m:s')}}</td>
                                        <td class="pt-5">{{$proposal->expired_date}}</td>
                                        <td class="pt-5">
                                            @if ($proposal->status == 0)
                                                <span class="label label-inline label-light-success font-weight-bold">
                                                    Availbale
                                                </span>
                                            @else 
                                                <span class="label label-inline label-light-danger font-weight-bold">
                                                    Expired
                                                </span>
                                            @endif
                                        </td>
                                        <td class="pt-5">
                                            @if (Helper::fileExists($proposal->docs, 'uploads/files/proposals'))
                                                <span class="svg-icon svg-icon-primary svg-icon-2x pointer"  data-toggle="modal" data-target="#docs-{{$proposal->id}}" title="Show proposal File"><!--begin::Svg Icon | path:C:\wamp64\www\keenthemes\themes\metronic\theme\html\demo2\dist/../src/media/svg/icons\Files\File.svg--><svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
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
                                        <a class="btn btn-sm btn-clean btn-icon edit-proposal-btn" title="Show" data-toggle="modal" data-target="#edit-proposal-{{$proposal->id}}">
                                                <span class="svg-icon svg-icon-primary svg-icon-2x"><!--begin::Svg Icon | path:C:\wamp64\www\keenthemes\themes\metronic\theme\html\demo2\dist/../src/media/svg/icons\Design\Edit.svg--><svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
                                                    <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                                        <rect x="0" y="0" width="24" height="24"/>
                                                        <path d="M8,17.9148182 L8,5.96685884 C8,5.56391781 8.16211443,5.17792052 8.44982609,4.89581508 L10.965708,2.42895648 C11.5426798,1.86322723 12.4640974,1.85620921 13.0496196,2.41308426 L15.5337377,4.77566479 C15.8314604,5.0588212 16,5.45170806 16,5.86258077 L16,17.9148182 C16,18.7432453 15.3284271,19.4148182 14.5,19.4148182 L9.5,19.4148182 C8.67157288,19.4148182 8,18.7432453 8,17.9148182 Z" fill="#000000" fill-rule="nonzero" transform="translate(12.000000, 10.707409) rotate(-135.000000) translate(-12.000000, -10.707409) "/>
                                                        <rect fill="#000000" opacity="0.3" x="5" y="20" width="15" height="2" rx="1"/>
                                                    </g>
                                                </svg><!--end::Svg Icon--></span>
                                            </a>
                                        </td>
                                    </tr>
                                @endforeach
                            @else
                                    No Data To Show
                            @endif
                        </tbody>
                    </table>
                    <!--end: Datatable-->
                    <!--begin: Pagination-->
                    <div class="d-flex justify-content-between align-items-center flex-wrap">
                        <div class="d-flex flex-wrap py-2 mr-3">
                            {{ $proposals->links() }}
                        </div>
                        <div class="d-flex align-items-center py-3">
                            <span class="text-muted">Displaying {{count($proposals)}} of 
                                @if (!empty($all))
                                    {{count($all)}}
                                @endif
                                records</span>
                        </div>
                    </div>
                    <!--end: Pagination-->
                </div>
            </div>
            <!--end::Card-->
        </div>
        <!--end::Container-->
    </div>
    <!--end::Entry-->
@endsection
@section('modals')
    @if (count($proposals) > 0)
        @foreach ($proposals as $proposal)
            <!--begin::Show Proposals Modals-->
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
            <!--end::Show proposal Modal-->
            <!--begin::Edit proposal Modal-->
            <div class="modal fade wide-modal" id="edit-proposal-{{$proposal->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Edit {{$proposal->name}}</h5>
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
                @include('proposals.create')
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
            </div>
        </div>
        </div>
    </div>
    <!--end::New proposal Modal-->
    
@endsection
@section('scripts')
	<!--begin::Page Scripts(used by this page)-->
    <script src="{{asset('assets/js/pages/crud/forms/widgets/bootstrap-datepicker.js')}}"></script>
    <script src="{{asset('assets/js/pages/crud/forms/widgets/bootstrap-switch.js')}}"></script>
    <script src="{{asset('assets/js/pages/crud/forms/widgets/bootstrap-select.js')}}"></script>

    <script>
        var arrows;
        if (KTUtil.isRTL()) {
            arrows = {
                leftArrow: '<i class="la la-angle-right"></i>',
                rightArrow: '<i class="la la-angle-left"></i>'
            }
        } else {
            arrows = {
                leftArrow: '<i class="la la-angle-left"></i>',
                rightArrow: '<i class="la la-angle-right"></i>'
            }
        }

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

        
        // $(document).ready(function(){
        //     window.setInterval(function(){
        //         var status = $('#status');
        //         var checked = status.parent('label').hasClass('checkbox-checked');
        //         if(checked){
        //             status.click(function(){
        //                 status.parent('label').removeClass('checkbox-checked');
        //                 status.attr('value', 0);
        //             });
                    
        //         }else{
        //             status.click(function(){
        //                 status.parent('label').addClass('checkbox-checked');
        //             status.attr('value', 1);
        //             });
        //         }
        //     }, 500);
        // })

 
    </script> 

@endsection
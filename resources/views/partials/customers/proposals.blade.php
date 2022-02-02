
<!--begin::Row-->
<div class="row">
    <div class="col-lg-12 col-xxl-12">
        <!--begin::Advance Table Widget 1-->
        <div class="card card-custom card-stretch gutter-b">
            <!--begin::Header-->
            <div class="card-header border-0 py-5">
                <h3 class="card-title align-items-start flex-column">
                    <span class="card-label font-weight-bolder text-dark">Proposals</span>
                    <span class="text-muted mt-3 font-weight-bold font-size-sm">ALl Your Proposals Details</span>
                </h3>
                @if (auth()->user()->role->name == "admin")
                    <div class="card-toolbar">
                        <a  data-toggle="modal" data-target="#new-proposal" class="btn btn-success font-weight-bolder font-size-sm">
                            <span class="svg-icon svg-icon-white svg-icon-2x"><!--begin::Svg Icon | path:C:\wamp64\www\keenthemes\themes\metronic\theme\html\demo2\dist/../src/media/svg/icons\Communication\Archive.svg--><svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
                                <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                    <rect x="0" y="0" width="24" height="24"/>
                                    <path d="M4.5,3 L19.5,3 C20.3284271,3 21,3.67157288 21,4.5 L21,19.5 C21,20.3284271 20.3284271,21 19.5,21 L4.5,21 C3.67157288,21 3,20.3284271 3,19.5 L3,4.5 C3,3.67157288 3.67157288,3 4.5,3 Z M8,5 C7.44771525,5 7,5.44771525 7,6 C7,6.55228475 7.44771525,7 8,7 L16,7 C16.5522847,7 17,6.55228475 17,6 C17,5.44771525 16.5522847,5 16,5 L8,5 Z" fill="#000000"/>
                                </g>
                            </svg><!--end::Svg Icon--></span>Add New Proposal</a>
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
                                <th class="pr-0" style="min-width: 250px">Proposal</th>
                                <th style="min-width: 100px">Created Date</th>
                                <th style="min-width: 100px">File</th>
                                @if (auth()->user()->role->name == "admin")
                                    <th class="pr-0 text-right" style="min-width: 100px">action</th>
                                @endif
                            </tr>
                        </thead>
                        <tbody>
                            @if(count($customer->proposals))
                                @foreach ($customer->proposals as $proposal)
                                <tr>
                                    <td  class="datatable-cell">
                                        <a style="width: 250px;" href="{{url('customers/'. $proposal->user->id)}}">
                                            <div class="d-flex align-items-center">
                                                <div class="symbol symbol-40 symbol-sm flex-shrink-0 symbol-light-primary">
                                                    <span class="symbol-label font-size-h4">
                                                        {{$proposal->name[0]}}
                                                    </span>
                                                </div>
                                                <div class="ml-3">
                                                    <div class="text-dark-75 font-weight-bolder font-size-lg mb-0">{{$proposal->name}}</div>
                                                    <span  class="text-muted font-weight-bold text-hover-primary">{{$proposal->user->email}}</span>
                                                </div>
                                            </div>
                                        </a>
                                    </td>
                                    <td class="pt-5">{{$proposal->created_at->format('d M')}}</td>
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
                                        @else
                                        <span class='text-primary'>No File Available</span>
                                        @endif
                                    </td>
                                    <td class="pr-0 text-right">
                                        @if(auth()->user()->isAdmin())
                                            <a class="btn btn-sm btn-clean btn-icon edit-project-btn" title="Edit" data-toggle= "modal" data-target="#edit-proposal-{{$proposal->id}}">
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
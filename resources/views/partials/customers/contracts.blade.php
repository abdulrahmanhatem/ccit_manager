<!--begin::Row-->
<div class="row">
    <div class="col-lg-12 col-xxl-12">
        <!--begin::Advance Table Widget 1-->
        <div class="card card-custom card-stretch gutter-b">
            <!--begin::Header-->
            <div class="card-header border-0 py-5">
                <h3 class="card-title align-items-start flex-column">
                    <span class="card-label font-weight-bolder text-dark">Contracts</span>
                    <span class="text-muted mt-3 font-weight-bold font-size-sm">ALl Your Contracts Details</span>
                </h3>
                @if (auth()->user()->role->name == "admin")
                    <div class="card-toolbar">
                        <a  data-toggle="modal" data-target="#new-contract" class="btn btn-success font-weight-bolder font-size-sm">
                            <span class="svg-icon svg-icon-white svg-icon-2x"><!--begin::Svg Icon | path:C:\wamp64\www\keenthemes\themes\metronic\theme\html\demo2\dist/../src/media/svg/icons\Home\Book-open.svg--><svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
                                <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                    <rect x="0" y="0" width="24" height="24"/>
                                    <path d="M13.6855025,18.7082217 C15.9113859,17.8189707 18.682885,17.2495635 22,17 C22,16.9325178 22,13.1012863 22,5.50630526 L21.9999762,5.50630526 C21.9999762,5.23017604 21.7761292,5.00632908 21.5,5.00632908 C21.4957817,5.00632908 21.4915635,5.00638247 21.4873465,5.00648922 C18.658231,5.07811173 15.8291155,5.74261533 13,7 C13,7.04449645 13,10.79246 13,18.2438906 L12.9999854,18.2438906 C12.9999854,18.520041 13.2238496,18.7439052 13.5,18.7439052 C13.5635398,18.7439052 13.6264972,18.7317946 13.6855025,18.7082217 Z" fill="#000000"/>
                                    <path d="M10.3144829,18.7082217 C8.08859955,17.8189707 5.31710038,17.2495635 1.99998542,17 C1.99998542,16.9325178 1.99998542,13.1012863 1.99998542,5.50630526 L2.00000925,5.50630526 C2.00000925,5.23017604 2.22385621,5.00632908 2.49998542,5.00632908 C2.50420375,5.00632908 2.5084219,5.00638247 2.51263888,5.00648922 C5.34175439,5.07811173 8.17086991,5.74261533 10.9999854,7 C10.9999854,7.04449645 10.9999854,10.79246 10.9999854,18.2438906 L11,18.2438906 C11,18.520041 10.7761358,18.7439052 10.4999854,18.7439052 C10.4364457,18.7439052 10.3734882,18.7317946 10.3144829,18.7082217 Z" fill="#000000" opacity="0.3"/>
                                </g>
                            </svg><!--end::Svg Icon--></span>Add New Contract</a>
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
                                <th class="pr-0" style="width: 50px">Contracts</th>
                                <th style="min-width: 200px"></th>
                                <th style="min-width: 80px">Created Date</th>
                                <th style="min-width: 80px">File</th>
                                <th style="min-width: 80px">Total</th>
                                @if (auth()->user()->role->name == "admin")
                                    <th class="pr-0 text-right" style="min-width: 150px">Action</th>
                                @endif
                            </tr>
                        </thead>
                        <tbody>
                            @if(count($customer->contracts()) . 0)
                                @foreach ($customer->contracts() as $contract)
                                    <tr>
                                        <td  colspan="2" class="datatable-cell">
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
                                        <td class="pt-5">{{$contract->created_at->format('d M')}}</td>
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
                                        <td class="pt-5">
                                            {{$contract->grand_total}} SAR
                                        </td>
                                        <td class="pr-0 text-right">
                                            @if (auth()->user()->role->name == "admin")
                                                <a class="btn btn-sm btn-clean btn-icon" title="Edit"  data-toggle="modal" data-target="#edit-contract-{{$contract->id}}">
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
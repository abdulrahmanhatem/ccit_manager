


@extends('layouts.app')
@section('title', $quote->name . 'Quotation')
@section('content')
    <!--begin::Subheader-->
    <div class="subheader min-h-lg-175px pt-5 pb-7 subheader-transparent" id="kt_subheader">
        <div class="container d-flex align-items-center justify-content-between flex-wrap flex-sm-nowrap">
            <!--begin::Details-->
            <div class="d-flex align-items-center flex-wrap mr-2">
                <!--begin::Heading-->
                <div class="d-flex flex-column">
                    <!--begin::Title-->
                <h2 class="text-white font-weight-bold my-2 mr-5">{{$quote->name}} Quotation</h2>
                    <!--end::Title-->
                    <!--begin::Breadcrumb-->
                    <div class="d-flex align-items-center font-weight-bold my-2">
                        <!--begin::Item-->
                        <a href="#" class="opacity-75 hover-opacity-100">
                            <i class="flaticon2-shelter text-white icon-1x"></i>
                        </a>
                        <!--end::Item-->
                        <!--begin::Item-->
                        <span class="label label-dot label-sm bg-white opacity-75 mx-3"></span>
                        <a href="{{url('/')}}" class="text-white text-hover-white opacity-75 hover-opacity-100">Dashboard</a>
                        <!--end::Item-->
                        <!--begin::Item-->
                        <span class="label label-dot label-sm bg-white opacity-75 mx-3"></span>
                        <a href="{{url('quotations')}}" class="text-white text-hover-white opacity-75 hover-opacity-100">Quotations</a>

                        <span class="label label-dot label-sm bg-white opacity-75 mx-3"></span>
                        <a href="{{url('quotations/'.$quote->id)}}" class="text-white text-hover-white opacity-75 hover-opacity-100">{{$quote->name}}</a>
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
    <div class="content pt-0 d-flex flex-column flex-column-fluid">
        <div class="container mt-n15">
            <!--begin::Card-->
            <div class="card mb-8">
                <!--begin::Body-->
                <div class="card-body p-10">
                    <!--begin::Row-->
                    <div class="row">
                        <div class="col-lg-9">
                            <!--begin::Tab Content-->
                            <div class="tab-content">
                                <!--begin::Accordion-->
                                <div class="accordion accordion-light accordion-light-borderless accordion-svg-toggle" id="faq">
                                    <!--begin::Item-->
                                    <div class="card border-top-0">
                                        <!--begin::Header-->
                                        <div class="card-header" id="faqHeading2">
                                            <a class="card-title collapsed text-dark" data-toggle="collapse" href="#faq2" aria-expanded="false" aria-controls="faq2" role="button">
                                                <span class="svg-icon svg-icon-primary">
                                                    <!--begin::Svg Icon | path:assets/media/svg/icons/Navigation/Angle-double-right.svg-->
                                                    <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
                                                        <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                                            <polygon points="0 0 24 0 24 24 0 24"></polygon>
                                                            <path d="M12.2928955,6.70710318 C11.9023712,6.31657888 11.9023712,5.68341391 12.2928955,5.29288961 C12.6834198,4.90236532 13.3165848,4.90236532 13.7071091,5.29288961 L19.7071091,11.2928896 C20.085688,11.6714686 20.0989336,12.281055 19.7371564,12.675721 L14.2371564,18.675721 C13.863964,19.08284 13.2313966,19.1103429 12.8242777,18.7371505 C12.4171587,18.3639581 12.3896557,17.7313908 12.7628481,17.3242718 L17.6158645,12.0300721 L12.2928955,6.70710318 Z" fill="#000000" fill-rule="nonzero"></path>
                                                            <path d="M3.70710678,15.7071068 C3.31658249,16.0976311 2.68341751,16.0976311 2.29289322,15.7071068 C1.90236893,15.3165825 1.90236893,14.6834175 2.29289322,14.2928932 L8.29289322,8.29289322 C8.67147216,7.91431428 9.28105859,7.90106866 9.67572463,8.26284586 L15.6757246,13.7628459 C16.0828436,14.1360383 16.1103465,14.7686056 15.7371541,15.1757246 C15.3639617,15.5828436 14.7313944,15.6103465 14.3242754,15.2371541 L9.03007575,10.3841378 L3.70710678,15.7071068 Z" fill="#000000" fill-rule="nonzero" opacity="0.3" transform="translate(9.000003, 11.999999) rotate(-270.000000) translate(-9.000003, -11.999999)"></path>
                                                        </g>
                                                    </svg>
                                                    <!--end::Svg Icon-->
                                                </span>
                                                <div class="card-label text-dark pl-4">What are the main project features?</div>
                                            </a>
                                        </div>
                                        <!--end::Header-->
                                        <!--begin::Body-->
                                        <div id="faq2" class="collapse show" aria-labelledby="faqHeading2" data-parent="#faq">
                                            <div class="card-body text-dark-50 font-size-lg pl-12">
                                                @if (!empty($quote->features))
                                                    @foreach (Helper::projectFeatures() as $key => $feature)
                                                        @if (in_array($key,$quote->features ))
                                                        <p>{{$feature}}</p>
                                                        @endif
                                                    @endforeach
                                                @endif
                                            </div>
                                        </div>
                                        <!--end::Body-->
                                    </div>
                                    <!--end::Item-->
                                    <!--begin::Item-->
                                    <div class="card border-top-0">
                                        <!--begin::Header-->
                                        <div class="card-header" id="faqHeading3">
                                            <div class="card-title collapsed text-dark" data-toggle="collapse" data-target="#faq3" aria-expanded="false" aria-controls="faq3" role="button">
                                                <span class="svg-icon svg-icon-primary">
                                                    <!--begin::Svg Icon | path:assets/media/svg/icons/Navigation/Angle-double-right.svg-->
                                                    <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
                                                        <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                                            <polygon points="0 0 24 0 24 24 0 24"></polygon>
                                                            <path d="M12.2928955,6.70710318 C11.9023712,6.31657888 11.9023712,5.68341391 12.2928955,5.29288961 C12.6834198,4.90236532 13.3165848,4.90236532 13.7071091,5.29288961 L19.7071091,11.2928896 C20.085688,11.6714686 20.0989336,12.281055 19.7371564,12.675721 L14.2371564,18.675721 C13.863964,19.08284 13.2313966,19.1103429 12.8242777,18.7371505 C12.4171587,18.3639581 12.3896557,17.7313908 12.7628481,17.3242718 L17.6158645,12.0300721 L12.2928955,6.70710318 Z" fill="#000000" fill-rule="nonzero"></path>
                                                            <path d="M3.70710678,15.7071068 C3.31658249,16.0976311 2.68341751,16.0976311 2.29289322,15.7071068 C1.90236893,15.3165825 1.90236893,14.6834175 2.29289322,14.2928932 L8.29289322,8.29289322 C8.67147216,7.91431428 9.28105859,7.90106866 9.67572463,8.26284586 L15.6757246,13.7628459 C16.0828436,14.1360383 16.1103465,14.7686056 15.7371541,15.1757246 C15.3639617,15.5828436 14.7313944,15.6103465 14.3242754,15.2371541 L9.03007575,10.3841378 L3.70710678,15.7071068 Z" fill="#000000" fill-rule="nonzero" opacity="0.3" transform="translate(9.000003, 11.999999) rotate(-270.000000) translate(-9.000003, -11.999999)"></path>
                                                        </g>
                                                    </svg>
                                                    <!--end::Svg Icon-->
                                                </span>
                                                <div class="card-label text-dark pl-4">What are the additional features?</div>
                                            </div>
                                        </div>
                                        <!--end::Header-->
                                        <!--begin::Body-->
                                        <div id="faq3" class="collapse show" aria-labelledby="faqHeading3" data-parent="#faq">
                                            <div class="card-body text-dark-50 font-size-lg pl-12">{{$quote->services}}</div>
                                        </div>
                                        <!--end::Body-->
                                    </div>
                                    <!--end::Item-->
                                    <!--begin::Item-->
                                    <div class="card border-top-0">
                                        <!--begin::Header-->
                                        <div class="card-header" id="faqHeading4">
                                            <div class="card-title collapsed text-dark" data-toggle="collapse" data-target="#faq4" aria-expanded="false" aria-controls="faq4" role="button">
                                                <span class="svg-icon svg-icon-primary">
                                                    <!--begin::Svg Icon | path:assets/media/svg/icons/Navigation/Angle-double-right.svg-->
                                                    <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
                                                        <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                                            <polygon points="0 0 24 0 24 24 0 24"></polygon>
                                                            <path d="M12.2928955,6.70710318 C11.9023712,6.31657888 11.9023712,5.68341391 12.2928955,5.29288961 C12.6834198,4.90236532 13.3165848,4.90236532 13.7071091,5.29288961 L19.7071091,11.2928896 C20.085688,11.6714686 20.0989336,12.281055 19.7371564,12.675721 L14.2371564,18.675721 C13.863964,19.08284 13.2313966,19.1103429 12.8242777,18.7371505 C12.4171587,18.3639581 12.3896557,17.7313908 12.7628481,17.3242718 L17.6158645,12.0300721 L12.2928955,6.70710318 Z" fill="#000000" fill-rule="nonzero"></path>
                                                            <path d="M3.70710678,15.7071068 C3.31658249,16.0976311 2.68341751,16.0976311 2.29289322,15.7071068 C1.90236893,15.3165825 1.90236893,14.6834175 2.29289322,14.2928932 L8.29289322,8.29289322 C8.67147216,7.91431428 9.28105859,7.90106866 9.67572463,8.26284586 L15.6757246,13.7628459 C16.0828436,14.1360383 16.1103465,14.7686056 15.7371541,15.1757246 C15.3639617,15.5828436 14.7313944,15.6103465 14.3242754,15.2371541 L9.03007575,10.3841378 L3.70710678,15.7071068 Z" fill="#000000" fill-rule="nonzero" opacity="0.3" transform="translate(9.000003, 11.999999) rotate(-270.000000) translate(-9.000003, -11.999999)"></path>
                                                        </g>
                                                    </svg>
                                                    <!--end::Svg Icon-->
                                                </span>
                                                <div class="card-label text-dark pl-4">What is your project Link?</div>
                                            </div>
                                        </div>
                                        <!--end::Header-->
                                        <!--begin::Body-->
                                        <div id="faq4" class="collapse show" aria-labelledby="faqHeading4" data-parent="#faq">
                                            <div class="card-body text-dark-50 font-size-lg pl-12">{{$quote->project_link}}</div>
                                        </div>
                                        <!--end::Body-->
                                    </div>
                                    <!--end::Item-->
                                </div>
                                <!--end::Accordion-->
                            </div>
                            <!--end::Tab Content-->
                        </div>
                        <div class="col-lg-3 text-right">
                            @if (!empty($quote->status))
                                @if ($quote->status == 1)
                                    <span class="label label-inline label-light-danger font-weight-bold">
                                        Pending
                                    </span>
                                @else 
                                    <span class="label label-inline label-light-success font-weight-bold">
                                        Done
                                    </span>
                                @endif
                            @endif
                        </div>
                    </div>
                    <!--end::Row-->
                </div>
                <!--end::Body-->
                <!--begin::Form-->
                
                {!! Form::open([ 'action'=> ['QuoteController@update', $quote->id], 'method'=>'POST', 'files' => true, 'enctype' => 'multipart/form-data', 'class' => '', 'id' => '' ]) !!}
                    @csrf    
                    <div class="card-body py-0">
                        <div class="form-group row">
                            <div class="col-lg-4 col-md-9 col-sm-12">
                                <label for="docs" class="w-100 d-block">
                                    <div class="dropzone dropzone-default" id="file_preview">
                                        <div class="dropzone-msg dz-message needsclick">
                                            <span class="dropzone-msg-desc">
                                                @if ($errors->any())
                                                    <div class="alert text-danger">
                                                        @foreach ($errors->all() as $error)
                                                            <span>{{ $error }}</span>
                                                        @endforeach
                                                    </div>
                                                @endif
                                                Click And Choose Quote...
                                                <p>File must be PDF and MAx Size is 5 MB</p>
                                            </span>
                                        </div>
                                    </div>
                                </label>
                                <input name="docs" type="file" id="docs" hidden>
                                {!! Form::hidden('_method', 'PUT') !!}
                                {!! Form::text('quote_id', $quote->id, ['hidden']) !!}  
                            </div>
                            @if (Helper::QuoteDocsCheck($quote->docs))
                                <div class="col-lg-4 col-md-9 col-sm-12">
                                    <span class="svg-icon svg-icon-primary svg-icon-4x pointer"  data-toggle="modal" data-target="#docs-{{$quote->id}}" title="Quotation File"><!--begin::Svg Icon | path:C:\wamp64\www\keenthemes\themes\metronic\theme\html\demo2\dist/../src/media/svg/icons\Files\File.svg--><svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
                                        <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                            <polygon points="0 0 24 0 24 24 0 24"/>
                                            <path d="M5.85714286,2 L13.7364114,2 C14.0910962,2 14.4343066,2.12568431 14.7051108,2.35473959 L19.4686994,6.3839416 C19.8056532,6.66894833 20,7.08787823 20,7.52920201 L20,20.0833333 C20,21.8738751 19.9795521,22 18.1428571,22 L5.85714286,22 C4.02044787,22 4,21.8738751 4,20.0833333 L4,3.91666667 C4,2.12612489 4.02044787,2 5.85714286,2 Z" fill="#000000" fill-rule="nonzero" opacity="0.3"/>
                                            <rect fill="#000000" x="6" y="11" width="9" height="2" rx="1"/>
                                            <rect fill="#000000" x="6" y="15" width="5" height="2" rx="1"/>
                                        </g>
                                    </svg><!--end::Svg Icon--></span>
                                </div>
                            @endif
                        </div>
                    </div>
                    <div class="card-footer">
                        <div class="row">
                            <div class="col-lg-4">
                                <button type="submit" class="btn btn-light-primary mr-2" name="send-proposal">Save</button>
                                {!! Form::open(['action'=> ['QuoteController@update', $quote->id], 'method'=>'POST', 'enctype' =>'multipart/form-data', 'class' => 'btn btn-sm btn-clean btn-icon', 'title' => 'Close'])!!}
                                    <button type="submit" class="btn btn-primary" name="close-quote">
                                        Done
                                    </button>
                                {!! Form::text('quote_id', $quote->id, ['hidden']) !!}   
                                {!! Form::hidden('_method', 'put') !!}
                                {!! Form::close() !!}
                            </div>
                        </div>
                    </div>
                </form>
                <script>
                    const inputFile = document.getElementById('docs');
                    const preview_image = document.getElementById('file_preview');

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
                </script>
                <!--end::Form-->
            </div>
            <!--end::Item-->
        </div>
        <!--end::Section-->
        <!--begin::Section-->
        <div class="container">
            <div class="row">
                <div class="col-lg-4">
                    <!--begin::Card-->
                    <a href="#" class="card card-custom wave wave-animate-slow bg-grey-100 mb-8 mb-lg-0">
                        <!--begin::Card Body-->
                        <div class="card-body">
                            <div class="d-flex align-items-center p-6">
                                <!--begin::Icon-->
                                <div class="mr-6">
                                    <span class="svg-icon svg-icon-primary svg-icon-4x"><!--begin::Svg Icon | path:C:\wamp64\www\keenthemes\themes\metronic\theme\html\demo2\dist/../src/media/svg/icons\Shopping\Money.svg--><svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
                                        <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                            <rect x="0" y="0" width="24" height="24"/>
                                            <path d="M2,6 L21,6 C21.5522847,6 22,6.44771525 22,7 L22,17 C22,17.5522847 21.5522847,18 21,18 L2,18 C1.44771525,18 1,17.5522847 1,17 L1,7 C1,6.44771525 1.44771525,6 2,6 Z M11.5,16 C13.709139,16 15.5,14.209139 15.5,12 C15.5,9.790861 13.709139,8 11.5,8 C9.290861,8 7.5,9.790861 7.5,12 C7.5,14.209139 9.290861,16 11.5,16 Z" fill="#000000" opacity="0.3" transform="translate(11.500000, 12.000000) rotate(-345.000000) translate(-11.500000, -12.000000) "/>
                                            <path d="M2,6 L21,6 C21.5522847,6 22,6.44771525 22,7 L22,17 C22,17.5522847 21.5522847,18 21,18 L2,18 C1.44771525,18 1,17.5522847 1,17 L1,7 C1,6.44771525 1.44771525,6 2,6 Z M11.5,16 C13.709139,16 15.5,14.209139 15.5,12 C15.5,9.790861 13.709139,8 11.5,8 C9.290861,8 7.5,9.790861 7.5,12 C7.5,14.209139 9.290861,16 11.5,16 Z M11.5,14 C12.6045695,14 13.5,13.1045695 13.5,12 C13.5,10.8954305 12.6045695,10 11.5,10 C10.3954305,10 9.5,10.8954305 9.5,12 C9.5,13.1045695 10.3954305,14 11.5,14 Z" fill="#000000"/>
                                        </g>
                                    </svg><!--end::Svg Icon--></span>
                                </div>
                                <!--end::Icon-->
                                <!--begin::Content-->
                                <div class="d-flex flex-column">
                                    <h3 class="text-dark h3 mb-3">{{$quote->budget}} SAR</h3>
                                    <div class="text-dark-50">Estimated Budget</div>
                                </div>
                                <!--end::Content-->
                            </div>
                        </div>
                        <!--end::Card Body-->
                    </a>
                    <!--end::Card-->
                </div>
                <div class="col-lg-4">
                    <!--begin::Card-->
                    <a href="#" class="card card-custom wave wave-animate bg-grey-100 mb-8 mb-lg-0">
                        <!--begin::Card Body-->
                        <div class="card-body">
                            <div class="d-flex align-items-center p-6">
                                <!--begin::Icon-->
                                <div class="mr-6">
                                    <span class="svg-icon svg-icon-primary svg-icon-4x"><!--begin::Svg Icon | path:C:\wamp64\www\keenthemes\themes\metronic\theme\html\demo2\dist/../src/media/svg/icons\Communication\Call.svg--><svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
                                        <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                            <rect x="0" y="0" width="24" height="24"/>
                                            <path d="M12,22 C6.4771525,22 2,17.5228475 2,12 C2,6.4771525 6.4771525,2 12,2 C17.5228475,2 22,6.4771525 22,12 C22,17.5228475 17.5228475,22 12,22 Z M11.613922,13.2130341 C11.1688026,13.6581534 10.4887934,13.7685037 9.92575695,13.4869855 C9.36272054,13.2054673 8.68271128,13.3158176 8.23759191,13.760937 L6.72658218,15.2719467 C6.67169475,15.3268342 6.63034033,15.393747 6.60579393,15.4673862 C6.51847004,15.7293579 6.66005003,16.0125179 6.92202169,16.0998418 L8.27584113,16.5511149 C9.57592638,16.9844767 11.009274,16.6461092 11.9783003,15.6770829 L15.9775173,11.6778659 C16.867756,10.7876271 17.0884566,9.42760861 16.5254202,8.3015358 L15.8928491,7.03639343 C15.8688153,6.98832598 15.8371895,6.9444475 15.7991889,6.90644684 C15.6039267,6.71118469 15.2873442,6.71118469 15.0920821,6.90644684 L13.4995401,8.49898884 C13.0544207,8.94410821 12.9440704,9.62411747 13.2255886,10.1871539 C13.5071068,10.7501903 13.3967565,11.4301996 12.9516371,11.8753189 L11.613922,13.2130341 Z" fill="#000000"/>
                                        </g>
                                    </svg><!--end::Svg Icon--></span>
                                </div>
                                <!--end::Icon-->
                                <!--begin::Content-->
                                <div class="d-flex flex-column">
                                    <h3 class="text-dark h3 mb-3">{{$quote->phone}}</h3>
                                    <div class="text-dark-50">{{$quote->city}}</div>
                                </div>
                                <!--end::Content-->
                            </div>
                        </div>
                        <!--end::Card Body-->
                    </a>
                    <!--end::Card-->
                </div>
                <div class="col-lg-4">
                    <!--begin::Card-->
                    <a href="#" class="card card-custom wave wave-animate-fast bg-grey-100">
                        <!--begin::Card Body-->
                        <div class="card-body">
                            <div class="d-flex align-items-center p-6">
                                <!--begin::Icon-->
                                <div class="mr-6">
                                    <span class="svg-icon svg-icon-4x svg-icon-primary">
                                        <!--begin::Svg Icon | path:assets/media/svg/icons/General/User.svg-->
                                        <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
                                            <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                                <polygon points="0 0 24 0 24 24 0 24"></polygon>
                                                <path d="M12,11 C9.790861,11 8,9.209139 8,7 C8,4.790861 9.790861,3 12,3 C14.209139,3 16,4.790861 16,7 C16,9.209139 14.209139,11 12,11 Z" fill="#000000" fill-rule="nonzero" opacity="0.3"></path>
                                                <path d="M3.00065168,20.1992055 C3.38825852,15.4265159 7.26191235,13 11.9833413,13 C16.7712164,13 20.7048837,15.2931929 20.9979143,20.2 C21.0095879,20.3954741 20.9979143,21 20.2466999,21 C16.541124,21 11.0347247,21 3.72750223,21 C3.47671215,21 2.97953825,20.45918 3.00065168,20.1992055 Z" fill="#000000" fill-rule="nonzero"></path>
                                            </g>
                                        </svg>
                                        <!--end::Svg Icon-->
                                    </span>
                                </div>
                                <!--end::Icon-->
                                <!--begin::Content-->
                                <div class="d-flex flex-column">
                                    <h3 class="text-dark h3 mb-3">{{$quote->name}}</h3>
                                    <div class="text-dark-50">{{$quote->email}}</div>
                                </div>
                                <!--end::Content-->
                            </div>
                        </div>
                        <!--end::Card Body-->
                    </a>
                    <!--end::Card-->
                </div>
            </div>
        </div>
        <!--end::Section-->
        <!--end::Entry-->
    </div>
	<!--end::Entry-->
@endsection
@section('modals')
   @if (!empty($quote->docs))
   <div class="modal fade wide-modal" id="docs-{{$quote->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Quotation Document</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
                </div>
                    <div class="modal-body">
                        <iframe src="{{ url('/uploads/files/quotes/'.$quote->docs)}}" frameborder="3"></iframe>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    </div>
            </div>
        </div>
    </div>
   @endif
@endsection
@section('scripts')
	<!--begin::Page Scripts(used by this page)-->
    <script src="{{asset('assets/js/pages/crud/ktdatatable/base/html-table.js')}}"></script>

@endsection
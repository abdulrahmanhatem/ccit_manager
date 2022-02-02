


@extends('layouts.app')
@section('title', 'Technologies')
@section('content')
    <!--begin::Subheader-->
    <div class="subheader min-h-lg-175px pt-5 pb-7 subheader-transparent" id="kt_subheader">
        <div class="container d-flex align-items-center justify-content-between flex-wrap flex-sm-nowrap">
            <!--begin::Details-->
            <div class="d-flex align-items-center flex-wrap mr-2">
                <!--begin::Heading-->
                <div class="d-flex flex-column">
                    <!--begin::Title-->
                    <h2 class="text-white font-weight-bold my-2 mr-5">Technologies</h2>
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
                        <a href="{{url('/')}}" class="text-white text-hover-white opacity-75 hover-opacity-100">Dahsboard</a>
                        <!--end::Item-->
                        <!--begin::Item-->
                        <span class="label label-dot label-sm bg-white opacity-75 mx-3"></span>
                        <a href="{{url('/technologies')}}" class="text-white text-hover-white opacity-75 hover-opacity-100">Technologies</a>
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
                <div class="card-header flex-wrap border-0 pt-6 pb-0">
                    <div class="card-title">
                        <h3 class="card-label">Technologies
                        <span class="text-muted pt-2 font-size-sm d-block">Technologies Datatable</span></h3>
                    </div>
                    <div class="card-toolbar">
                        <!--begin::Dropdown-->
                        <!--begin::Button-->
                    <a data-toggle="modal" data-target="#new-technology" class="btn btn-primary font-weight-bolder">
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
                        </span>New Record</a>
                        <!--end::Button-->
                    </div>
                </div>
                <div class="card-body">
                    <!--begin::Search Form-->
                    <div class="mb-7">
                        <div class="row">
                            @if(count($technologies) > 0)
                                @foreach ($technologies as $technology)
                                    <div class="col-lg-3 col-md-4 col-sm-6 col-xs-12">
                                        <div class="card card-custom gutter-b" style="height: 130px">
                                        <div class="card-body" style="min-width: 220px;">
                                            @if (Helper::fileExists($technology->avatar, 'uploads/images/logos/technologies' ))
                                                <img class="image-input-wrapper" src="{{asset('uploads/images/logos/technologies/'.$technology->avatar)}}" style="max-width: 37px;">
                                            @else 
                                                <img class="image-input-wrapper" src="{{asset('assets/media/stock-600x600/img-12.jpg')}}" style="max-width: 37px;">
                                            @endif
                                            <div class="text-dark font-weight-bolder font-size-h2 mt-3" >{{$technology->name}}</div>
                                            <div class="btn-toolbar mb-3" role="toolbar" aria-label="Toolbar with button groups"style="text-align: left;position: absolute;top: 8px;right: 0;">
                                                <div class="btn-group mr-2" role="group" aria-label="First group">
                                                    <button data-toggle="modal" data-target="#edit-technology-{{$technology->id}}" type="button" class="btn text-primary btn-icon edit-technology-btn" style="font-size: .5px;"><i class="la la-edit text-primary"></i></button>
                                                    <button data-toggle="modal" data-target="#delete-technology-{{$technology->id}}" class="btn text-danger btn-icon" style="font-size: .5px;"><i class="la la-trash text-danger"></i></button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    </div>
                                @endforeach
                            @endif
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
    <!--begin:: Delete technology Modal-->
    @if (count($technologies) > 0)
        @foreach ($technologies as $technology)
            <div class="modal fade" id="delete-technology-{{$technology->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Delete {{$technology->name}}</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                    </div>
                    <div class="modal-body">
                        Are You Sure About Deleting {{$technology->name}} technology ?
                    </div>
                    <div class="modal-footer">
                        {!! Form::open([ 'action'=> ['TechnologyController@destroy', $technology->id], 'method'=>'POST']) !!}
                            {!! Form::hidden('_method', 'DELETE')!!}
                            <button type="submit" class="btn btn-danger">Delete</button>
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        </form>
                    </div>
                </div>
                </div>
            </div>
        @endforeach
    @endif
    <!--end::Delete technology Modal-->
    <!--begin::New technology Modal-->
    <div class="modal fade wide-modal" id="new-technology" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">New Technology</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
            </div>
            <div class="modal-body">
                @include('technologies.create')
            </div>
        </div>
        </div>
    </div>
    <!--end::New technology Modal-->
    <!--begin::Edit technology Modal-->
    @foreach ($technologies as $technology)
        <div class="modal fade wide-modal" id="edit-technology-{{$technology->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Edit {{$technology->name}}</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
                </div>
                <div class="modal-body">
                    @include('technologies.edit', ['technology' => $technology])
                </div>
            </div>
            </div>
        </div>
    @endforeach
    <!--end::Edit technology Modal-->
@endsection
@section('scripts')
    <script>
        $(document).ready(function(){
            $('.edit-technology-btn').click(function(){
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
                        })
                        reader.readAsDataURL(file);
                    } 
                })
            })  
        })
    </script>
@endsection
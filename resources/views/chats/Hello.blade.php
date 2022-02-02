


@extends('layouts.app')

<link href="{{asset('css/libs/choose-car.css')}}" rel="stylesheet">

@include('includes.home.short-header')
@section('styles')
    <link href="{{asset('css/libs/filter-style.css')}}" rel="stylesheet">
@stop
    <div class="section-title-page area-bg area-bg_dark area-bg_op_60">
        <div class="area-bg__inner">
        <div class="container text-center">
            <h1 class="b-title-page">إختر سيارتك</h1>
            <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{url('/')}}">Home</a></li>
                <li class="breadcrumb-item active" aria-current="page">Inventory</li>
            </ol>
            </nav>
            <!-- end .breadcrumb-->
            
        </div>
        </div>
    </div>
  <!-- end .b-title-page-->
    <div class="container">
        <div class="row">
            <div class="col-md-12 col-sm-12 col-xs-12 steps-box">
                <ul class="steps">
                    <li class="done step car active"><a href="#">1</a><br><span class="">أختر سيارتك</span></li>
                    <li class="text-center extra done"><a href="#">2</a><br><span class="step">خدمات إضافية</span></li>
                    <li><a href="#" class="step done">3</a><br><span>تأكيد الحجز</span></li>
                </ul>
            </div>
        </div>
    </div>

    <div class="container category-page">

    
        
    {!! Form::open(['method' => 'GET', 'action' => 'RentalCarsController@additional_services', 'id'=>'car-rental-form', 'files'=>true]) !!}

    {{--<div class="col-md-12">
        <button href="#" onclick="return false;" class="btn btn-rent-title">{!! trans('home.Choose_Car_in') !!} 
        @foreach($branches as $branch)
            @if($branch->id == $branch_pickup)
                {{$branch->name}}
            @endif
        @endforeach
        </button>
    </div>--}}
    


    <input type="hidden" name="branch_pickup" value="{{$branch_pickup}}">
    <input type="hidden" name="branch_return" value="{{$branch_return}}">
    <input type="hidden" name="pickupDate" value="{{$pickupDate}}">
    <input type="hidden" name="returnDate" value="{{$returnDate}}">
    <input type="hidden" name="pickupTime" value="{{$pickupTime}}">
    <input type="hidden" name="returnTime" value="{{$returnTime}}">


    <?php 
      $date1 = date_create($pickupDate);
      $date2 = date_create($returnDate);
      $diff = date_diff($date1,$date2);
      $result = $diff->format("%a");
    ?>
 
    

    <main class="">
        <div class="row">
             <div class="col-xl-3 cd-main-content">
              <div class="cd-filter filter-is-visible">
                <aside class="l-sidebar l-sidebar_top_minus">
                    <div class="widget section-sidebar bg-gray">
                      <h3 class="widget-title row justify-content-between align-items-center no-gutters"><span class="widget-title__inner col">خيارات البحث</span><i class="ic flaticon-car-repair col-auto"></i></h3>
                      <div class="widget-content">
                        <div class="cd-filter-block">
                          <div class="cd-filter-content">
                              <input type="search" placeholder="ابحث عن سيارتك اليوم...">
                          </div> <!-- cd-filter-content -->
                      </div> <!-- cd-filter-block -->
                        <div class="widget-inner">
                          <form class="b-filter">
                            <div class="b-filter__main row">
                              <div class="cd-filter-block">
                                <h4>ناقل الحركة</h4>
                                <ul class="cd-filter-content cd-filters list">
                                    @foreach($transmissions as $transmission)
                                    <li>
                                        <input class="filter" data-filter=".{{$transmission->name}}" type="radio" name="radioButton" id="{{$transmission->name}}">
                                        <label class="radio-label" for="{{$transmission->name}}"><span>{{$transmission->name}}</span></label>
                                    </li>
                                    @endforeach
                                </ul>
                            </div>
                            <div class="cd-filter-block">
                                <h4>نوع السيارة</h4>
                                <ul class="cd-filter-content cd-filters list">
                                    @foreach($types as $type)
                                    <li>
                                        <input class="filter" data-filter=".{{$type->name}}" type="checkbox" id="{{$type->name}}">
                                        <label class="checkbox-label" for="{{$type->name}}"><span>{{$type->name}}</span></label>
                                    </li>
                                    @endforeach
                                </ul>
                            </div>
                           
                            {{--<div class="cd-filter-block">
                              <h4>ناقل الحركة</h4>
                              <ul class="cd-filter-content cd-filters list">
                                  @foreach($fuels as $fuel)
                                  <li>
                                      <input class="filter" data-filter=".{{$fuel->name}}" type="radio" name="radioButton" id="{{$fuel->name}}">
                                      <label class="radio-label" for="{{$fuel->name}}"><span>{{$fuel->name}}</span></label>
                                  </li>
                                  @endforeach
                              </ul>
                            </div>--}}
                            <!--  <div class="b-filter__row col-xl-12 col-md-6">
                                <select class="selectpicker" data-width="100%" title="الماركة" multiple="multiple" data-max-options="1" data-style="ui-select">
                                  <option>إختيار 1</option>
                                  <option>إختيار 2</option>
                                  <option>إختيار 3</option>
                                  <option>إختيار 4</option>
                                </select>
                              </div>
                              <div class="b-filter__row col-xl-12 col-md-6">
                                <select class="selectpicker" data-width="100%" title="نوع الموديل" multiple="multiple" data-max-options="1" data-style="ui-select">
                                  <option>إختيار 1</option>
                                  <option>إختيار 2</option>
                                  <option>إختيار 3</option>
                                  <option>إختيار 4</option>
                                </select>
                              </div>-->
                              <!--<div class="b-filter__row col-xl-12 col-md-6">
                                <select class="selectpicker" data-width="100%" title="عدد الكيلومترات" multiple="multiple" data-max-options="1" data-style="ui-select">
                                  <option>إختيار 1</option>
                                  <option>إختيار 2</option>
                                  <option>إختيار 3</option>
                                  <option>إختيار 4</option>
                                </select>
                              </div>-->
                              <!--<div class="b-filter__row col-xl-12 col-md-6">
                                <select class="selectpicker" data-width="100%" title="الحالة" multiple="multiple" data-max-options="1" data-style="ui-select">
                                  <option>إختيار 1</option>
                                  <option>إختيار 2</option>
                                  <option>إختيار 3</option>
                                  <option>إختيار 4</option>
                                </select>
                              </div>
                              <div class="col-12">
                                <div class="b-filter__row row">
                                  <div class="b-filter__item col-md-6">
                                    <select class="selectpicker" data-width="100%" title="من" multiple="multiple" data-max-options="1" data-style="ui-select">
                                      <option>إختيار 1</option>
                                      <option>إختيار 2</option>
                                      <option>إختيار 3</option>
                                      <option>إختيار 4</option>
                                    </select>
                                  </div>
                                  <div class="b-filter__item col-md-6">
                                    <select class="selectpicker" data-width="100%" title="إلى" multiple="multiple" data-max-options="1" data-style="ui-select">
                                      <option>إختيار 1</option>
                                      <option>إختيار 2</option>
                                      <option>إختيار 3</option>
                                      <option>إختيار 4</option>
                                    </select>
                                  </div>
                                </div>
                              </div>
                              <div class="b-filter__row col-xl-12 col-md-6">
                                <select class="selectpicker" data-width="100%" title="ناقل حركة" multiple="multiple" data-max-options="1" data-style="ui-select">
                                  <option>إختيار 1</option>
                                  <option>إختيار 2</option>
                                  <option>إختيار 3</option>
                                  <option>إختيار 4</option>
                                </select>
                              </div>
                              <div class="b-filter__row col-xl-12 col-md-6">
                                <select class="selectpicker" data-width="100%" title="الوقود المستخدم" multiple="multiple" data-max-options="1" data-style="ui-select">
                                  <option>إختيار 1</option>
                                  <option>إختيار 2</option>
                                  <option>إختيار 3</option>
                                  <option>إختيار 4</option>
                                </select>
                              </div>
                            </div>
                            <div class="b-filter-slider ui-filter-slider">
                              <div class="b-filter-slider__title">السعر</div>
                              <div class="b-filter-slider__main">
                                <div id="filterPrice"></div>
                                <div class="b-filter__row row">
                                  <div class="b-filter__item col-md-6">
                                    <input class="ui-select" id="input-with-keypress-0"/>
                                  </div>
                                  <div class="b-filter__item col-md-6">
                                    <input class="ui-select" id="input-with-keypress-1"/>
                                  </div>
                                </div>
                              </div>
                            </div>
                            <div class="b-filter-slider ui-filter-slider">
                              <div class="b-filter-slider__title">عدد الكيلومترات</div>
                              <div class="b-filter-slider__main">
                                <div id="sliderRange"></div>
                                <div class="b-filter__row">
                                  <input class="ui-select" id="input-range"/>
                                </div>
                              </div>
                            </div>-->
                            {!! Form::submit('الخطوة التالية', ['class' => 'b-filter__reset btn btn-secondary w-100 mt-4', 'hidden']) !!}
                          </form>
                        </div>
                      </div>
                    </div>
                    <!-- end .b-filter-->
                    
                  </aside>
            </div> 
            </div>
            <div class="col-xl-9 col-md-12">
              @include('includes.form-errors')
              <div class="row m-0">
                <div class="col-md-10 col-sm-12 px-0">
                  <div class="vehicles cd-gallery filter-is-visible">
                    @if($branch_return)
                        @if($branch_pickup != $branch_return)
        
                            <div class="clearfix"></div>
        
                            <div style="margin: 0 0 10px;direction: ltr;" class="col-md-12 alert text-right pr-0">
                                <i class="fa fa-exclamation-circle"></i>
                                <span>تكلفة تغيير مكان التسليم هي <b>20 ريال</b></span>
                                <strong>
                                    @foreach($branches as $branch)
                                        @if($branch->id == $branch_pickup)
                                            {{$branch->name}}
                                        @endif
                                    @endforeach
                                </strong>
                                <span>مكان الإستلام مختلف عن مكان التسليم</span>
                                <strong>
                                    @foreach($branches as $branch)
                                        @if($branch->id == $branch_return)
                                            {{$branch->name}}
                                        @endif
                                    @endforeach
                                </strong>
                                
                            </div>
                        @endif
                    @endif
                  </div>
                    
                </div>
                <div class="col-md-2 col-sm-12 results">
                    <div class="b-filter-goods__info"> نتائج  <strong>({{count($cars)}}) <strong>
                    </div>  
                    </div>
              </div>
              <div class="vehicles cd-gallery filter-is-visible">
        
                    <?php
        
                    $interval_start = strtotime('09:00');
                    $interval_end = strtotime('18:00');
        
                    $pickup_time = strtotime($pickupTime);
                    $return_time = strtotime($returnTime);
        
                    $over_time_pickup = 0;
                    $over_time_pickup_cond = 0;
        
                    $over_time_return = 0;
                    $over_time_return_cond = 0;
        
                    $over_time = 0;
        
                    if($interval_start <= $pickup_time && $pickup_time < $interval_end) {}
                    else { $over_time_pickup = 20; $over_time_pickup_cond = 1; }
        
                    if($interval_start <= $return_time && $return_time < $interval_end) {}
                    else { $over_time_return = 20; $over_time_return_cond = 1; }
        
                    $over_time = $over_time_pickup + $over_time_return;
                    ?>
        
        
        
                    {{--@if($over_time_pickup_cond == 1 || $over_time_return_cond == 1)
        
                        <div style="margin: 0 15px 30px;" class="col-md-12 alert alert-info">
                            <i class="fa fa-exclamation-circle"></i>
                            The chosen time interval exceeds the hours of the program.
                            An Extra Hours fee of
                            <strong>{{$over_time}}$</strong> will apply for this reservation. <br>
                            Schedule: <strong>Monday to Friday from 09:00 to 18:00.</strong>
                            <div class="clearfix"></div>
                        </div>
        
                    @endif--}}
        
                    <ul>
                    @if(count($cars) > 0)
                        @foreach($cars as $car)
                            @if($car->branch->id == $branch_pickup && $car->is_available == 1)
                              <li class="col-12 mix {{$car->name}} {{$car->type->name}} {{$car->gearbox->name}} rental_item">
                                
                                <div class="b-goods b-goods_list ">
                                  <div class="hover-area choose-item">
                                    <div class="relative choose-car-id" name="{{$car->id}}">
                                    @php
                                      $image = App\Photo::whereIn('id',json_decode($car->photo_id))->first();
                                    @endphp
                                      <img class="featured" height="150" src="{{asset($image->file)}}" alt="Car photo" class="img-scale">
                                      @if (in_array($car->model, $new)) 
                                      <span class="b-goods__label b-goods__label_blue">جديد</span>
                                    @endif
                                      <div class="flex-zone">
                                          <div class="flex-zone-inside">
                                              <a class="button-rent-it"> إختر سيارة</a>
                                          </div>
                                      </div>
                                    </div>
                                  </div>
                                  
                                  
                                  
                                  <div class="b-goods__main">
                                    <div class="row no-gutters">
                                      
                                      <div class="col">
                                        {!! Form::open(['method'=>'GET', 'action' => ['CarController@show', $car->id] ,'class'=>'rent-zone-search'])  !!}
                                          <input type="hidden" name="branch_pickup" value="{{$branch_pickup}}">
                                          <input type="hidden" name="branch_return" value="{{$branch_return}}">
                                          <input type="hidden" name="pickupDate" value="{{$pickupDate}}">
                                          <input type="hidden" name="returnDate" value="{{$returnDate}}">
                                          <input type="hidden" name="pickupTime" value="{{$pickupTime}}">
                                          <input type="hidden" name="returnTime" value="{{$returnTime}}">
                                          <input type="hidden" name="car_id" value="{{$car->id}}">
                                        {!! Form::button($car->name . ' - ' .$car->brand->name, ['class' => 'b-goods__title car-name', 'type' => 'submit', 'id' => 'signup_form']) !!}
                                        {!! Form::close() !!}
                                        <div class="b-goods__info">
                                          <div class="row">
                                            <p class="col-lg-4 col-md-6 col-sm-12"><img src="{{asset('public/assets/svg/car-door.svg')}}" class="svg-i"> {{$car->doors}} أبواب</p> 
                                            <p class= "col-lg-4 col-md-6 col-sm-12"><img src="{{asset('public/assets/svg/car-seat.svg')}}" class="svg-i">  {{$car->capacity}} مقاعد</p> 
                                            <p class= "col-lg-4 col-md-6 col-sm-12"><img src="{{asset('public/assets/svg/car-engine.svg')}}" class="svg-i"> {{$car->cylinder}}  سلندر</p> 
                                          </div>
                                        </div>
                                      </div>
                                      <div class="col-auto">
                                      <div class="b-goods__price text-primary"><span class="b-goods__price-number"><span class="currency">ريال</span>{{$car->price_per_day_car}}</></div>
                                        <div class="b-goods__price-msrp"></div>
                                      </div>
                                    </div>
                                    <div class="b-goods-descrip row no-gutters">
                                      <div class="b-goods-descrip__item col">
                                        <div class="b-goods-descrip__inner">
                                          <div class="b-goods-descrip__wrap">
                                             <i class="ic flaticon-door"></i><span class="b-goods-descrip__info"> {{$car->doors}} أبواب</span>
                                            <div class="b-goods-descrip__full-info"><span class="b-goods-descrip__title">أبواب</span><span class="b-goods-descrip__text">{{$car->doors}}</span></div>
                                          </div>
                                        </div>
                                      </div>
                                      <div class="b-goods-descrip__item col">
                                        <div class="b-goods-descrip__inner">
                                          <div class="b-goods-descrip__wrap"><i class="ic flaticon-gearshift"></i><span class="b-goods-descrip__info"> أوتوماتيك</span>
                                            <div class="b-goods-descrip__full-info"><span class="b-goods-descrip__title">ناقل الحركة</span><span class="b-goods-descrip__text">{{$car->gearbox->name}}</span></div>
                                          </div>
                                        </div>
                                      </div>
                                      <div class="b-goods-descrip__item col">
                                        <div class="b-goods-descrip__inner">
                                          <div class="b-goods-descrip__wrap"><i class="ic flaticon-gearshift"></i><span class="b-goods-descrip__info"> أوتوماتيك</span>
                                            <div class="b-goods-descrip__full-info"><span class="b-goods-descrip__title">ناقل الحركة</span><span class="b-goods-descrip__text">{{$car->gearbox->name}}</span></div>
                                          </div>
                                        </div>
                                      </div>
                                      <div class="b-goods-descrip__item col">
                                        <div class="b-goods-descrip__inner">
                                          <div class="b-goods-descrip__wrap"><i class="ic flaticon-gearshift"></i><span class="b-goods-descrip__info"> أوتوماتيك</span>
                                            <div class="b-goods-descrip__full-info"><span class="b-goods-descrip__title">ناقل الحركة</span><span class="b-goods-descrip__text">{{$car->gearbox->name}}</span></div>
                                          </div>
                                        </div>
                                      </div>
                                      @if($car->fuel->name)
                                      <div class="b-goods-descrip__item col">
                                        <div class="b-goods-descrip__inner">
                                          <div class="b-goods-descrip__wrap"><i class="ic flaticon-fuel-station-pump"></i><span class="b-goods-descrip__info"> 38/45</span>
                                            <div class="b-goods-descrip__full-info"><span class="b-goods-descrip__title">نوع الوقود</span><span class="b-goods-descrip__text">{{$car->fuel->name}}</span></div>
                                          </div>
                                        </div>
                                      </div>
                                      @endif
                                      <div class="b-goods-descrip__item col">
                                        <div class="b-goods-descrip__inner">
                                          <div class="b-goods-descrip__wrap"><i class="ic flaticon-gearshift"></i><span class="b-goods-descrip__info"> أوتوماتيك</span>
                                            <div class="b-goods-descrip__full-info"><span class="b-goods-descrip__title">ناقل الحركة</span><span class="b-goods-descrip__text">{{$car->gearbox->name}}</span></div>
                                          </div>
                                        </div>
                                      </div>
                                      <div class="b-goods-descrip__item b-goods-descrip__item_list col">
                                        <div class="b-goods-descrip__inner">
                                          <div class="b-goods-descrip__wrap"><i class="ic flaticon-calendar"></i>
                                            <div class="b-goods-descrip__full-info"><span class="b-goods-descrip__title">موديل سنة</span><span class="b-goods-descrip__text">{{$car->model}}</span></div>
                                          </div>
                                        </div>
                                      </div>
                                    </div>
                                    <div class="b-goods__footer">
                                      <div class="row no-gutters justify-content-between">
                                      </div>
                                    </div>
                                  </div>
                                </div>
                              </li>
                            @endif    
                            
                          @endforeach
                    </ul>
                    @else
                     <div class="cd-fail-message">No results found</div>
                    @endif
                </div>
                {{$cars->links("pagination::bootstrap-4")}}
            </div>
        </div>
        

        

        
    

    <input class="car-id required" type="hidden" name="car_id" value="">

    <input type="hidden" name="status" value="0">

    <div id="next-step">
        <div class="form-group">
          
        </div>
    </div>

    <p class="text"></p>
    <p class="total"></p>

<div class="clearfix"></div>

{!! Form::close() !!}
</main>

    </div> {{-- container --}}
    @include('includes.home.footer')
  </div>

@include('includes.home.scripts')
@section('footer')
    {{--<script src="{{asset('js/libs/modernizr.js')}}"></script>--}}
    <script src="{{asset('js/libs/jquery.mixitup.min.js')}}"></script>
    <script src="{{asset('js/libs/filter-main.js')}}"></script>
    <script>
        $(function() {
            /* parseaza car id si price*/
            $('.vehicles .choose-item').on('click', function(){

                var name = $('.choose-car-id', this ).attr('name');
                $('.car-id' ).attr( "value", name );
                $("#car-rental-form").trigger('submit');

                $('.vehicles .rental_item .flex-zone' ).removeClass( "active");
                $('.vehicles .rental_item .flex-zone .button-rent-it' ).text('<?php echo __('home.SELECT_CAR') ?>');

                $('.flex-zone', this ).addClass( "active");
                $('.flex-zone .button-rent-it',this ).text('تم الإختيار');

            });
        });
    </script>


@stop
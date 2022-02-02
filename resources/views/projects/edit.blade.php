
<!--begin::Card-->
<div class="card card-custom">
	<div class="card-body p-0">
		<div class="wizard wizard-1" id="kt_projects_add" data-wizard-state="step-first" data-wizard-clickable="true">
			<div class="row justify-content-center my-10 px-8 my-lg-15 px-lg-10">
				<div class="col-xl-12 col-xxl-12">
					<!--begin::Form Wizard-->
					{!! Form::open(['action'=> ['ProjectController@update', $project->id], 'method'=>'POST', 'enctype' =>'multipart/form-data', ' novalidate', 'class' => 'form'])!!}
						@csrf
						<!--begin::Step 1-->
						<div class="pb-5" data-wizard-type="step-content" data-wizard-state="current">
							<div class="row">
								<div class="col-xl-12">
									<!--begin::Group-->
									<div class="form-group row">
										<label class="col-xl-3 col-lg-3 col-form-label text-left">Avatar</label>
										<div class="col-lg-9 col-xl-9 avatar_box" id="{{$project->id}}">
											<div class="image-input image-input-outline">
												@if (Helper::fileExists($project->avatar, 'uploads/images/logos/projects' ))
													<img class="image-input-wrapper edit_avatar_preview-{{$project->id}}" src="{{asset('uploads/images/logos/projects/'.$project->avatar)}}">
												@else 
													<img class="image-input-wrapper edit_avatar_preview-{{$project->id}}" src="{{asset('assets/media/users/100_6.jpg')}}">
												@endif
												<label class="btn btn-xs btn-icon btn-circle btn-white btn-hover-text-primary btn-shadow" data-action="change" data-toggle="tooltip" title="" data-original-title="Change avatar" for="edit_avatar_{{$project->id}}">
													<i class="fa fa-pen icon-sm text-muted"></i>
													{{-- <input type="hidden" name="profile_avatar_remove" /> --}}
													<input type="file" name="avatar" accept=".png, .jpg, .jpeg" id="edit_avatar_{{$project->id}}"/>
												</label>
												<span class="btn btn-xs btn-icon btn-circle btn-white btn-hover-text-primary btn-shadow" data-action="cancel" data-toggle="tooltip" title="Cancel avatar">
													<i class="ki ki-bold-close icon-xs text-muted"></i>
												</span>
												
											</div>
										</div>
									</div>
									<!--end::Group-->
									<div class="form-group row">
										<label class="col-xl-3 col-lg-3 col-form-label">Project Name</label>
										<div class="col-lg-9 col-xl-9">
											<input class="form-control form-control-lg form-control-solid required" name="name" type="text" placeholder="Project Name" value="{{$project->name}}"/>
											<span class="form-text text-muted">Please Choose Project Name</span>
										</div>
									</div>
									<div class="form-group row">
										<label class="col-xl-3 col-lg-3 col-form-label">Customer Name</label>
										<div class="col-lg-9 col-xl-9">
											{!! Form::select('user_id', Helper::customers()->pluck('name', 'id'),$project->user->id, ['class' => 'form-control selectpicker required','data-live-search' => 'true'])!!}
											<span class="form-text text-muted">Please Choose Customer</span>
										</div>
									</div>
									<div class="form-group row">
										<label class="col-xl-3 col-lg-3 col-form-label">Duration</label>
										<div class="col-lg-8 col-md-9 col-sm-12">
											<div class='input-group daterangepicke'>
											@if ($project->start_date)
												<input name ="duration" type='text' class="form-control required" readonly="readonly" placeholder="Select date range" value= "{{$project->start_date . ' / ' . $project->end_date}}"/>
											@else
												<input name ="duration" type='text' class="form-control required" readonly="readonly" placeholder="Select date range" value= ""/>
											@endif	
												<div class="input-group-append">
													<span class="input-group-text">
														<i class="la la-calendar-check-o"></i>
													</span>
												</div>
											</div>
										</div>
									</div>
									<div class="form-group row">
										<label class="col-xl-3 col-lg-3 col-form-label">Services:</label>
										<div class="col-lg-8 col-md-9 col-sm-12">
											@if(count(Helper::services()) > 0)
												@foreach (Helper::services() as $service)
												<label class="checkbox checkbox-primary w-100 d-block m-3">
													@if (!empty($project->services))
														@if(in_array( $service->name, json_decode($project->services)))
															<input type="checkbox" name="services[]" checked="checked" value="{{$service->name}}">{{$service->name}}
															@else 
															<input type="checkbox" name="services[]" value="{{$service->name}}">{{$service->name}}
														@endif
													@else 
														<input type="checkbox" name="services[]" value="{{$service->name}}">{{$service->name}}
													@endif
													<span></span>
												</label>
												@endforeach
											@endif
										</div>
									</div>
									<div class="form-group row">
										<label class="col-xl-3 col-lg-3 col-form-label">Technologies:</label>
										<div class="col-lg-8 col-md-9 col-sm-12">
											@if(count(Helper::technologies()) > 0)
												@foreach (Helper::technologies() as $technology)
												<label class="checkbox checkbox-success d-inline-block m-3">
													@if (!empty($project->technologies))
														@if(in_array( $technology->name, json_decode($project->technologies)))
															<input type="checkbox" name="technologies[]" checked="checked" value="{{$technology->name}}">{{$technology->name}}
															@else 
															<input type="checkbox" name="technologies[]" value="{{$technology->name}}">{{$technology->name}}
														@endif
													@else 
														<input type="checkbox" name="technologies[]" value="{{$technology->name}}">{{$technology->name}}
													@endif
													<span></span>
												</label>
												@endforeach
											@endif
										</div>
									</div>
									<div class="form-group row">
										<label class="col-form-label text-left col-lg-3 col-sm-12">Status</label>
										<div class="col-lg-4 col-md-9 col-sm-12">
										<select class="form-control" id="status_selectpicker_{{$project->id}}" name="status" tabindex="3" value="{{$project->status}}">
												<option value="0" data-content="&lt;span class='label label-danger label-inline label-rounded'&gt;Pending&lt;/span&gt;">Pending</option>
												<option value="1"  data-content="&lt;span class='label label-primary label-inline label-rounded'&gt;In Progress&lt;/span&gt;">In Progress</option>
												<option value="2"  data-content="&lt;span class='label label-warning label-inline label-rounded'&gt;Waiting Customer&lt;/span&gt;">Waiting Customer</option>
												<option value="3"  data-content="&lt;span class='label label-success label-inline label-rounded'&gt;Completed&lt;/span&gt;">Completed</option>
											</select>
										</div>
									</div>
									{{-- <div class="form-group row mb-6">
										<label class="col-form-label text-left col-lg-3 col-sm-12">Progress</label>
										<div class="col-lg-6 col-md-12 col-sm-12">
											<div class="row align-items-center">
												<div class="col-4">
												<input name="progress" type="text" class="form-control" id="progress_input_{{$project->id}}" placeholder="Progress" value="{{$project->progress}}"/>
												</div>
												<div class="col-8">
													<div id="progress_{{$project->id}}" class="nouislider-drag-primary"></div>
												</div>
											</div>
											<span class="form-text text-muted mt-6">Input control is attached to slider</span>
										</div>
									</div> --}}
									<div class="form-group row">
										<label class="col-form-label text-left col-lg-3 col-sm-12">Priority</label>
										<div class="col-lg-4 col-md-9 col-sm-12">
											<select class="form-control selectpicker" id="priority_selectpicker_{{$project->id}}"  name="priority" tabindex="3"value="{{$project->priority}}">
												<option value="1" data-content="&lt;span class='label label-danger label-inline label-rounded'&gt;Urgent&lt;/span&gt;">Urgent</option>
												<option value="2"  data-content="&lt;span class='label label-primary label-inline label-rounded'&gt;Important&lt;/span&gt;">Important</option>
												<option value="3"  data-content="&lt;span class='label label-warning label-inline label-rounded'&gt;Normal&lt;/span&gt;">Normal</option>
												<option value="4"  data-content="&lt;span class='label label-success label-inline label-rounded'&gt;Low&lt;/span&gt;">Low</option>
											</select>
										</div>
									</div>
									<div class="form-group row">
										<label class="col-xl-3 col-lg-3 col-form-label">Earnings</label>
										<div class="col-lg-9 col-xl-9">
											<div class="input-group input-group-lg">
												<input type="text" class="form-control form-control-lg" name="earnings" placeholder="Earnings" value="{{$project->earnings}}" />
												<div class="input-group-append">
													<span class="input-group-text">SAR</span>
												</div>
											</div>
										</div>
									</div>
									<div class="form-group row">
										<label class="col-xl-3 col-lg-3 col-form-label">Expenses</label>
										<div class="col-lg-9 col-xl-9">
											<div class="input-group input-group-lg">
												<input type="text" class="form-control form-control-lg" name="expenses" placeholder="Expenses" value="{{$project->expenses}}" />
												<div class="input-group-append">
													<span class="input-group-text">SAR</span>
												</div>
											</div>
										</div>
									</div>
									<div class="form-group row">
										<label class="col-xl-3 col-lg-3 col-form-label">Description</label>
										<div class="col-lg-9 col-xl-9">
											{!! Form::textarea('des', $project->des, ['class' => 'form-control', 'placeholder' => 'Project Description', 'rows' => '4'])!!}
										
										</div>
									</div>
								</div>
							</div>
						</div>
						<!--end::Step 1-->
						<!--begin::Actions-->
						<div class="d-flex justify-content-between border-top mt-5 pt-10">
							<div class="mr-2">
								{{-- <button class="btn btn-light-primary font-weight-bold text-uppercase px-9 py-4" data-wizard-type="action-prev">Previous</button> --}}
							</div>
							<div>
								{!! Form::hidden('_method', 'PUT') !!}
								<button class="btn btn-success font-weight-bold text-uppercase px-9 py-4"  type="submit" name="edit-from-show">Update</button>
								{{-- <button class="btn btn-primary font-weight-bold text-uppercase px-9 py-4" data-wizard-type="action-next">Next Step</button> --}}
							</div>
						</div>
						<!--end::Actions-->
					</form>
					<!--end::Form Wizard-->
				</div>
			</div>
		</div>
	</div>
</div>
<!--end::Card-->

<!--begin::Card-->
<div class="card card-custom">
	<div class="card-body p-0">
		<div class="wizard wizard-1" id="kt_projects_add" data-wizard-state="step-first" data-wizard-clickable="true">
			<div class="kt-grid__item">
			</div>
			<div class="row justify-content-center my-10 px-8 my-lg-15 px-lg-10">
				<div class="col-xl-12 col-xxl-12">
					<!--begin::Form Wizard-->
					{!! Form::open(['action'=>['TaskController@update', $task->id], 'method'=>'POST', 'enctype' =>'multipart/form-data', ' novalidate', 'class' => 'form'])!!}
						@csrf
						<!--begin::Step 1-->
						<div class="pb-5" data-wizard-type="step-content" data-wizard-state="current">
							<div class="row">
								<div class="col-xl-12">
									<!--begin::Group-->
									<div class="form-group row">
										<label class="col-xl-3 col-lg-3 col-form-label">Task Name</label>
										<div class="col-lg-9 col-xl-9">
										<input class="form-control form-control-lg required" name="name" type="text" placeholder="Task Name" value="{{$task->name}}"/>
											<span class="form-text text-muted">Please Choose Task Name</span>
										</div>
									</div>
									<div class="form-group row">
										<label class="col-xl-3 col-lg-3 col-form-label">Project Name</label>
										<div class="col-lg-9 col-xl-9">
											{!! Form::select('project_id', Helper::projects()->pluck('name', 'id'), $task->project_id, ['class' => 'form-control selectpicker required','data-live-search' => 'true'])!!}
											<span class="form-text text-muted">Please Choose Project</span>
										</div>
									</div>
									<div class="form-group row">
										<label class="col-xl-3 col-lg-3 col-form-label">Duration</label>
										<div class="col-lg-8 col-md-9 col-sm-12">
											<div class='input-group daterangepicke'>
												@if ($task->start_at)
													<input name ="duration" type='text' class="form-control" readonly="readonly" placeholder="Select date range" value= "{{$task->start_at . ' / ' . $task->end_at}}"/>
												@else
													<input name ="duration" type='text' class="form-control" readonly="readonly" placeholder="Select date range" value= ""/>
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
										<label class="col-form-label text-left col-lg-3 col-sm-12">Status</label>
										<div class="col-lg-4 col-md-9 col-sm-12">
											<select class="form-control" id="status_selectpicker_{{$task->id}}" name="status" tabindex="3" value="{{$task->status}}">
												<option value="0" data-content="&lt;span class='label label-danger label-inline label-rounded'&gt;Pending&lt;/span&gt;">Pending</option>
												<option value="1"  data-content="&lt;span class='label label-primary label-inline label-rounded'&gt;In Progress&lt;/span&gt;">In Progress</option>
												<option value="2"  data-content="&lt;span class='label label-warning label-inline label-rounded'&gt;Waiting Customer&lt;/span&gt;">Waiting Customer</option>
												<option value="3"  data-content="&lt;span class='label label-success label-inline label-rounded'&gt;Completed&lt;/span&gt;">Completed</option>
											</select>
										</div>
									</div>
									<div class="form-group row">
										<label class="col-lg-3 col-form-label">Upload Files:</label>
										<div class="col-lg-9">
											<div class="dropzone dropzone-multi" id="kt_dropzone_4">
												<div class="dropzone-panel mb-lg-0 mb-2">
													<label class="dropzone-select btn btn-light-primary font-weight-bold btn-sm" for="docs_{{$task->id}}">Attach files</label>
													<input name="docs" type="file" id="docs_{{$task->id}}" hidden> 
												</div>
												<div class="dropzone-items">
													<div class="dropzone-item" style="display:none">
														<div class="dropzone-file">
															<div class="dropzone-filename" title="some_image_file_name.jpg">
																<span data-dz-name="">some_image_file_name.jpg</span>
																<strong>(
																<span data-dz-size="">340kb</span>)</strong>
															</div>
															<div class="dropzone-error" data-dz-errormessage=""></div>
														</div>
														<div class="dropzone-progress">
															<div class="progress">
																<div class="progress-bar bg-primary" role="progressbar" aria-valuemin="0" aria-valuemax="100" aria-valuenow="0" data-dz-uploadprogress=""></div>
															</div>
														</div>
														<div class="dropzone-toolbar">
															<span class="dropzone-start">
																<i class="flaticon2-arrow"></i>
															</span>
															<span class="dropzone-cancel" data-dz-remove="" style="display: none;">
																<i class="flaticon2-cross"></i>
															</span>
															<span class="dropzone-delete" data-dz-remove="">
																<i class="flaticon2-cross"></i>
															</span>
														</div>
													</div>
												</div>
											</div>
											<span class="form-text text-muted">File Must Be PDF And Max Size Is 5 MB</span>
											<p id="file_preview"></p>
										</div>
									</div>
									<div class="form-group row">
										<label class="col-xl-3 col-lg-3 col-form-label">Description</label>
										<div class="col-lg-9 col-xl-9">
											{!! Form::textarea('des', $task->des, ['class' => 'form-control', 'placeholder' => 'Project Description', 'rows' => '4'])!!}
										
										</div>
									</div>
									<div class="form-group row">
										<label class="col-form-label text-left col-lg-3 col-sm-12">Team:</label>
									</div>
									<div class="form-group row">
										@if (count(Helper::team()) > 0)
											@foreach (Helper::team() as $member)
												<div class="col-lg-6 ribbon ribbon-top cursor-pointer">
													<div class="ribbon-target bg-primary font-weight-bolder" style="top: -2px; right: 20px; font-size:10px">{{Helper::getTeamCategoryByID($member->category_id)}}</div>
													<label class="option cursor-pointer required">
														<span class="option-control">
															<span class="checkbox">
																@if (in_array($member->id, json_decode($task->team_members)))
																	<input type="checkbox" name="team_members[]" value="{{$member->id}}" checked="checked" />
																@else
																	<input type="checkbox" name="team_members[]" value="{{$member->id}}" />
																@endif
															
																<span></span>
															</span>
														</span>
														<div class="option-label">
															@if (Helper::avatarCheck($member->avatar))
																<div class="symbol symbol-40 symbol-sm flex-shrink-0 symbol-light-primary ">
																	<img class="" src="{{asset('uploads/images/avatars/'.$member->avatar)}}" alt="photo" />
																</div>
															@else
																<div class="symbol symbol-40 symbol-sm flex-shrink-0 symbol-light-primary">
																	<span class="symbol-label font-size-h4">
																		{{$member->name[0]}}
																	</span>
																</div>
															@endif
															<div class="ml-3 d-inline-block">
																<p  class="font-weight-bold text-hover-dark mb-0">{{$member->name}}</p>
																<p  class="text-muted font-weight-bold text-hover-primary mb-0">{{$member->email}}</p>
															</div>
														</div>
													</label>
												</div>
											@endforeach
										@endif
										
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
								{!! Form::hidden('_method', 'PUT')!!}
								<button class="btn btn-success font-weight-bold text-uppercase px-9 py-4" type="submit">Update</button>
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

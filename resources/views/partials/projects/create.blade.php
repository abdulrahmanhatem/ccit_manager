
<!--begin::Card-->
<div class="card card-custom">
	<div class="card-body p-0">
		<div class="wizard wizard-1" id="kt_projects_add" data-wizard-state="step-first" data-wizard-clickable="true">
			<div class="kt-grid__item">
			</div>
			<div class="row justify-content-center my-10 px-8 my-lg-15 px-lg-10">
				<div class="col-xl-12 col-xxl-12">
					<!--begin::Form Wizard-->
					{!! Form::open(['action'=>'ProjectController@store', 'method'=>'POST', 'enctype' =>'multipart/form-data', ' novalidate', 'class' => 'form'])!!}
						@csrf
						<!--begin::Step 1-->
						<div class="pb-5" data-wizard-type="step-content" data-wizard-state="current">
							<div class="row">
								<div class="col-xl-12">
									<!--begin::Group-->
									<div class="form-group row">
										<label class="col-xl-3 col-lg-3 col-form-label text-left">Avatar</label>
										<div class="col-lg-9 col-xl-9">
											<div class="image-input image-input-outline">
												<img class="image-input-wrapper" src="{{asset('assets/media/stock-600x600/img-12.jpg')}}" id="project_avatar_preview">
												<label class="btn btn-xs btn-icon btn-circle btn-white btn-hover-text-primary btn-shadow" data-action="change" data-toggle="tooltip" title="" data-original-title="Change avatar" for="project_avatar">
													<i class="fa fa-pen icon-sm text-muted"></i>
													{{-- <input type="hidden" name="profile_avatar_remove" /> --}}
													<input type="file" name="avatar" accept=".png, .jpg, .jpeg" id="project_avatar"/>
												</label>
												<span class="btn btn-xs btn-icon btn-circle btn-white btn-hover-text-primary btn-shadow" data-action="cancel" data-toggle="tooltip" title="Cancel avatar">
													<i class="ki ki-bold-close icon-xs text-muted"></i>
												</span>
												<script>
													const project_inputFile = document.getElementById('project_avatar');
													const project_avatar_preview = document.getElementById('project_avatar_preview');
	
													project_inputFile.addEventListener('change', function(){
														const file = this.files[0];
														
														if(file){
															console.log(file);
															const reader = new FileReader();
	
															reader.addEventListener("load", function(){
																project_avatar_preview.setAttribute("src", this.result);
															})
	
															reader.readAsDataURL(file);
														} 
													})
												</script>
											</div>
										</div>
									</div>
									<!--end::Group-->
									<div class="form-group row">
										<label class="col-xl-3 col-lg-3 col-form-label">Project Name</label>
										<div class="col-lg-9 col-xl-9">
											<input class="form-control form-control-lg form-control-solid required" name="name" type="text" placeholder="Project Name" />
											<span class="form-text text-muted">Please Choose Project Name</span>
										</div>
                                    </div>
                                    @yield('customer')
									<div class="form-group row">
										<label class="col-xl-3 col-lg-3 col-form-label">Duration</label>
										<div class="col-lg-8 col-md-9 col-sm-12">
											<div class='input-group daterangepicke'>
											
												<input name ="duration" type='text' class="form-control required" readonly="readonly" placeholder="Select date range" value= ""/>	
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
														<input type="checkbox" name="services[]" value="{{$service->name}}">{{$service->name}}
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
														<input type="checkbox" name="technologies[]" value="{{$technology->name}}">{{$technology->name}}
													<span></span>
												</label>
												@endforeach
											@endif
										</div>
									</div>
									
									<div class="form-group row">
										<label class="col-form-label text-left col-lg-3 col-sm-12">Status</label>
										<div class="col-lg-4 col-md-9 col-sm-12">
											<select class="form-control selectpicker" name="status" tabindex="3">
												<option value="0" data-content="&lt;span class='label label-danger label-inline label-rounded'&gt;Pending&lt;/span&gt;">Pending</option>
												<option value="1"  data-content="&lt;span class='label label-primary label-inline label-rounded'&gt;In Progress&lt;/span&gt;">In Progress</option>
												<option value="2"  data-content="&lt;span class='label label-warning label-inline label-rounded'&gt;Waiting Customer&lt;/span&gt;">Waiting Customer</option>
												<option value="3"  data-content="&lt;span class='label label-success label-inline label-rounded'&gt;Completed&lt;/span&gt;">Completed</option>
											</select>
										</div>
									</div>
									<div class="form-group row">
										<label class="col-form-label text-left col-lg-3 col-sm-12">Priority</label>
										<div class="col-lg-4 col-md-9 col-sm-12">
											<select class="form-control selectpicker" name="priority" tabindex="3">
												<option value="1" data-content="&lt;span class='label label-danger label-inline label-rounded'&gt;Urgent&lt;/span&gt;">Urgent</option>
												<option value="2" data-content="&lt;span class='label label-primary label-inline label-rounded'&gt;Important&lt;/span&gt;">Important</option>
												<option value="3" data-content="&lt;span class='label label-warning label-inline label-rounded'&gt;Normal&lt;/span&gt;">Normal</option>
												<option value="4" data-content="&lt;span class='label label-success label-inline label-rounded'&gt;Low&lt;/span&gt;">Low</option>
											</select>
										</div>
									</div>
									{{-- <div class="form-group row mb-6">
										<label class="col-form-label text-left col-lg-3 col-sm-12">Progress</label>
										<div class="col-lg-6 col-md-12 col-sm-12">
											<div class="row align-items-center">
												<div class="col-4">
												<input name="progress" type="text" class="form-control" id="progress_create_input" placeholder="Progress" value="0"/>
												</div>
												<div class="col-8">
													<div id="progress_create" class="nouislider-drag-primary"></div>
												</div>
											</div>
											<span class="form-text text-muted mt-6">Input control is attached to slider</span>
										</div>
									</div> --}}
								
									<div class="form-group row">
										<label class="col-xl-3 col-lg-3 col-form-label">Earnings</label>
										<div class="col-lg-9 col-xl-9">
											<div class="input-group input-group-lg">
												<input type="text" class="form-control form-control-lg" name="earnings" placeholder="Earnings" value="" />
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
												<input type="text" class="form-control form-control-lg" name="expenses" placeholder="Expenses" value="" />
												<div class="input-group-append">
													<span class="input-group-text">SAR</span>
												</div>
											</div>
										</div>
									</div>
									<div class="form-group row">
										<label class="col-xl-3 col-lg-3 col-form-label">Description</label>
										<div class="col-lg-9 col-xl-9">
											{!! Form::textarea('des', '', ['class' => 'form-control', 'placeholder' => 'Project Description', 'rows' => '4'])!!}
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
								<button class="btn btn-success font-weight-bold text-uppercase px-9 py-4" type="submit">Add</button>
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



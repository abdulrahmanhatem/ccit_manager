
<!--begin::Card-->
<div class="card card-custom card-shadowless rounded">
	
	<!--begin::Body-->
	<div class="card-body p-0">
		<div class="row justify-content-center py-8 px-8 py-lg-15 px-lg-10">
			<div class="col-xl-12 col-xxl-12">
				<!--begin::Wizard Form-->
				{!! Form::open(['action'=>'AdminController@store', 'method'=>'POST', 'enctype' =>'multipart/form-data', ' novalidate', 'class' => 'form', 'id' => 'kt_form'])!!}
					@csrf	
				<div class="row justify-content-center">
						<div class="col-xl-12">
							<!--begin::Wizard Step 1-->
							<div class="my-5 step" data-wizard-type="step-content" data-wizard-state="current">
								<h5 class="text-dark font-weight-bold mb-10">Admin's Profile Details:</h5>
								<!--begin::Group-->
								<div class="form-group row">
									<label class="col-xl-3 col-lg-3 col-form-label text-left">Avatar</label>
									<div class="col-lg-9 col-xl-9">
										<div class="image-input image-input-outline">
											<img class="image-input-wrapper" src="{{asset('assets/media/users/100_6.jpg')}}" id="create_avatar_preview">
											<label class="btn btn-xs btn-icon btn-circle btn-white btn-hover-text-primary btn-shadow" data-action="change" data-toggle="tooltip" title="" data-original-title="Change avatar" for="create_avatar">
												<i class="fa fa-pen icon-sm text-muted"></i>
												{{-- <input type="hidden" name="profile_avatar_remove" /> --}}
												<input type="file" name="avatar" accept=".png, .jpg, .jpeg" id="create_avatar" class="create-avatar"/>
											</label>
											<span class="btn btn-xs btn-icon btn-circle btn-white btn-hover-text-primary btn-shadow" data-action="cancel" data-toggle="tooltip" title="Cancel avatar">
												<i class="ki ki-bold-close icon-xs text-muted"></i>
											</span>
											<script>
												const inputFile = document.getElementById('create_avatar');
												const create_avatar_preview = document.getElementById('create_avatar_preview');

												inputFile.addEventListener('change', function(){
													const file = this.files[0];
													if(file){
														console.log(file);
														const reader = new FileReader();

														reader.addEventListener("load", function(){
															create_avatar_preview.setAttribute("src", this.result);
															console.log(this);
														})

														reader.readAsDataURL(file);
													} 
												})
											</script>
										</div>
									</div>
								</div>
								<!--end::Group-->
								<!--begin::Group-->
								<div class="form-group row">
									<label class="col-xl-3 col-lg-3 col-form-label">Name</label>
									<div class="col-lg-9 col-xl-9">
										<input class="form-control form-control-solid form-control-lg required" name="name" type="text" value="" />
									</div>
								</div>
								<!--end::Group-->
								<!--begin::Group-->
								<div class="form-group row">
									<label class="col-xl-3 col-lg-3 col-form-label">Contact Phone</label>
									<div class="col-lg-9 col-xl-9">
										<div class="input-group input-group-solid input-group-lg required">
											<div class="input-group-prepend">
												<span class="input-group-text">
													<i class="la la-phone"></i>
												</span>
											</div>
											<input type="text" class="form-control form-control-solid form-control-lg" name="phone" value="5678967456" placeholder="Phone" />
										</div>
										<span class="form-text text-muted">Enter valid US phone number(e.g: 0578967456).</span>
									</div>
								</div>
								<!--end::Group-->
								<!--begin::Group-->
								<div class="form-group row">
									<label class="col-xl-3 col-lg-3 col-form-label">Email Address</label>
									<div class="col-lg-9 col-xl-9">
										<div class="input-group input-group-solid input-group-lg required">
											<div class="input-group-prepend">
												<span class="input-group-text">
													<i class="la la-at"></i>
												</span>
											</div>
											<input type="text" class="form-control form-control-solid form-control-lg" name="email" value="" />
										</div>
									</div>
								</div>
								<!--end::Group-->
								<!--begin::Group-->
								<div class="form-group row">
									<label class="col-xl-3 col-lg-3 col-form-label">Password</label>
									<div class="col-lg-9 col-xl-9">
										<div class="input-group input-group-solid input-group-lg required">
											<div class="input-group-prepend">
												<span class="input-group-text">
													<i class="la la-user-secret"></i>
												</span>
											</div>
											<input type="password" class="form-control form-control-solid form-control-lg" name="password" />
										</div>
									</div>
								</div>
								<!--end::Group-->
								<!--begin::Row-->
								<div class="form-group row">
									<label class="col-xl-3 col-lg-3 col-form-label">Role</label>
									<div class="col-lg-9 col-xl-9">
										<div class="input-group input-group-solid input-group-lg required">
											{!! Form::select('role_id', Helper::roles()->pluck('name', 'id'), '', ['class' => 'form-control form-control-solid form-control-lg'])!!}	
											<div class="input-group-append">
											</div>
										</div>
									</div>
								</div>
								<!--end::Row-->
								<!--begin::Group-->
								<div class="form-group row">
									<label class="col-xl-3 col-lg-3 col-form-label">Company Site</label>
									<div class="col-lg-9 col-xl-9">
										<div class="input-group input-group-solid input-group-lg">
											<input type="text" class="form-control form-control-solid form-control-lg" name="website" placeholder="Website" value="CCIT" />
											<div class="input-group-append">
												<span class="input-group-text">.com</span>
											</div>
										</div>
									</div>
								</div>
								<!--end::Group-->
								<!--begin::Row-->
								<div class="form-group row">
									<label class="col-xl-3 col-lg-3 col-form-label">Country</label>
									<div class="col-lg-9 col-xl-9">
										<div class="input-group input-group-solid input-group-lg">
											{!! Form::select('country', Helper::gulfCountries(), '', ['class' => 'form-control form-control-solid form-control-lg'])!!}	
											<div class="input-group-append">
											</div>
										</div>
									</div>
								</div>
								<!--end::Row-->
							
							</div>
							<!--end::Wizard Step 1-->
						
							<!--begin::Wizard Actions-->
							<div class="d-flex justify-content-between border-top pt-10 mt-15">
								<div class="mr-2">
									{{-- <button id="prev-step" class="btn btn-light-primary font-weight-bolder px-9 py-4" data-wizard-type="action-prev">Previous</button> --}}
								</div>
								<div>
									<button type="submit" class="btn btn-success font-weight-bolder px-9 py-4" data-wizard-type="action-submit">Add</button>
								</div>
							</div>
							<!--end::Wizard Actions-->
						</div>
					</div>
				</form>
				<!--end::Wizard Form-->
			</div>
		</div>
	</div>
	<!--end::Body-->
</div>
<!--end::Card-->
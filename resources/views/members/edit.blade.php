
<!--begin::Card-->
<div class="card card-custom card-shadowless rounded">
	<!--begin::Body-->
	<div class="card-body p-0">
		<div class="row justify-content-center py-8 px-8 py-lg-15 px-lg-10">
			<div class="col-xl-12 col-xxl-12">
				<!--begin::Wizard Form-->
				{!! Form::open(['action'=> ['TeamMemberController@update', $member->id], 'method'=>'POST', 'enctype' =>'multipart/form-data', ' novalidate', 'class' => 'form'])!!}
					@csrf	
				<div class="row justify-content-center">
						<div class="col-xl-12">
							<!--begin::Wizard Step 1-->
							<div class="my-5 step" data-wizard-type="step-content" data-wizard-state="current">
								<h5 class="text-dark font-weight-bold mb-10">Member's Profile Details:</h5>
								<!--begin::Group-->
								<div class="form-group row">
									<label class="col-xl-3 col-lg-3 col-form-label text-left">Avatar</label>
									<div class="col-lg-9 col-xl-9 avatar_box" id="{{$member->id}}">
										<div class="image-input image-input-outline">
											@if (Helper::avatarCheck($member->avatar))
												<img class="image-input-wrapper edit_avatar_preview-{{$member->id}}" src="{{asset('uploads/images/avatars/'.$member->avatar)}}">
											@else 
												<img class="image-input-wrapper edit_avatar_preview-{{$member->id}}" src="{{asset('assets/media/users/100_6.jpg')}}">
											@endif
											<label class="btn btn-xs btn-icon btn-circle btn-white btn-hover-text-primary btn-shadow" data-action="change" data-toggle="tooltip" title="" data-original-title="Change avatar" for="edit_avatar_{{$member->id}}">
												<i class="fa fa-pen icon-sm text-muted"></i>
												{{-- <input type="hidden" name="profile_avatar_remove" /> --}}
												<input type="file" name="avatar" accept=".png, .jpg, .jpeg" id="edit_avatar_{{$member->id}}"/>
											</label>
											<span class="btn btn-xs btn-icon btn-circle btn-white btn-hover-text-primary btn-shadow" data-action="cancel" data-toggle="tooltip" title="Cancel avatar">
												<i class="ki ki-bold-close icon-xs text-muted"></i>
											</span>
											
										</div>
									</div>
								</div>
								<!--end::Group-->
								<!--begin::Group-->
								<div class="form-group row">
									<label class="col-xl-3 col-lg-3 col-form-label">Name</label>
									<div class="col-lg-9 col-xl-9">
									<input class="form-control form-control-solid form-control-lg required" name="name" type="text" value="{{$member->name}}" />
									</div>
								</div>
								<!--end::Group-->
								<!--begin::Group-->
								<div class="form-group row">
									<label class="col-xl-3 col-lg-3 col-form-label">Company Name</label>
									<div class="col-lg-9 col-xl-9">
										<input class="form-control form-control-solid form-control-lg" name="company_name" type="text" value="{{$member->company_name}}" />
										<span class="form-text text-muted">If you want your invoices addressed to a company. Leave blank to use your full name.</span>
									</div>
								</div>
								<!--end::Group-->
								<!--begin::Group-->
								<div class="form-group row">
									<label class="col-xl-3 col-lg-3 col-form-label">Contact Phone</label>
									<div class="col-lg-9 col-xl-9">
										<div class="input-group input-group-solid input-group-lg">
											<div class="input-group-prepend">
												<span class="input-group-text">
													<i class="la la-phone"></i>
												</span>
											</div>
											<input type="text" class="form-control form-control-solid form-control-lg required" name="phone" value="{{$member->phone}}" placeholder="Phone" />
										</div>
										<span class="form-text text-muted">Enter valid US phone number(e.g: 5678967456).</span>
									</div>
								</div>
								<!--end::Group-->
								<!--begin::Group-->
								<div class="form-group row">
									<label class="col-xl-3 col-lg-3 col-form-label">Email Address</label>
									<div class="col-lg-9 col-xl-9">
										<div class="input-group input-group-solid input-group-lg">
											<div class="input-group-prepend">
												<span class="input-group-text">
													<i class="la la-at"></i>
												</span>
											</div>
											<input type="text" class="form-control form-control-solid form-control-lg required" name="email" value="{{$member->email}}" readonly/>
										</div>
									</div>
								</div>
								<!--end::Group-->
								<!--begin::Group-->
								<div class="form-group row">
									<label class="col-xl-3 col-lg-3 col-form-label">Password</label>
									<div class="col-lg-9 col-xl-9">
										<div class="input-group input-group-solid input-group-lg">
											<div class="input-group-prepend">
												<span class="input-group-text">
													<i class="la la-user-secret"></i>
												</span>
											</div>
											<input type="password" class="form-control form-control-solid form-control-lg required" name="password" />
										</div>
									</div>
								</div>
								<!--end::Group-->
								<!--begin::Group-->
								<div class="form-group row">
									<label class="col-xl-3 col-lg-3 col-form-label">Company Site</label>
									<div class="col-lg-9 col-xl-9">
										<div class="input-group input-group-solid input-group-lg">
											<input type="text" class="form-control form-control-solid form-control-lg" name="website" placeholder="Website" value="{{$member->website}}" />
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
											{!! Form::select('country', Helper::gulfCountries(), $member->country, ['class' => 'form-control form-control-solid form-control-lg'])!!}	
											<div class="input-group-append">
											</div>
										</div>
									</div>
								</div>
								<!--end::Row-->
								<!--begin::Row-->
								<div class="form-group row">
									<label class="col-xl-3 col-lg-3 col-form-label">Team Role</label>
									<div class="col-lg-9 col-xl-9">
										{!! Form::select('category_id', Helper::teamCategories()->pluck('name', 'id'), $member->category_id, ['class' => 'form-control selectpicker','data-live-search' => 'true'])!!}
										<span class="form-text text-muted">Please Choose Team Role</span>
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
									{!! Form::hidden('_method', 'PUT') !!}
									<button type="submit" class="btn btn-success font-weight-bolder px-9 py-4" data-wizard-type="action-submit">Update</button>
									{{-- <button id="next-step" class="btn btn-primary font-weight-bolder px-9 py-4" data-wizard-type="action-next">Next</button> --}}
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
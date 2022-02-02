
<!--begin::Card-->
<div class="card card-custom card-shadowless rounded">
	<!--begin::Body-->
	<div class="card-body p-0">
		<div class="row justify-content-center py-8 px-8 py-lg-15 px-lg-10">
			<div class="col-xl-12 col-xxl-12">
				<!--begin::Wizard Form-->
				{!! Form::open(['action'=>'CustomerController@store', 'method'=>'POST', 'enctype' =>'multipart/form-data', ' novalidate', 'class' => 'form', 'id' => 'create-form'])!!}
					@csrf	
				<div class="row justify-content-center">
						<div class="col-xl-12">
							<!--begin::Wizard Step 1-->
							<div class="my-5 step" data-wizard-type="step-content" data-wizard-state="current">
								<h5 class="text-dark font-weight-bold mb-10">Customer's Profile Details:</h5>
								<!--begin::Group-->
								<div class="form-group row">
									<label class="col-xl-3 col-lg-3 col-form-label text-left">Avatar</label>
									<div class="col-lg-9 col-xl-9">
										<div class="image-input image-input-outline">
											<img class="image-input-wrapper" src="{{asset('assets/media/users/100_6.jpg')}}" id="customer_avatar_preview">
											<label class="btn btn-xs btn-icon btn-circle btn-white btn-hover-text-primary btn-shadow" data-action="change" data-toggle="tooltip" title="" data-original-title="Change avatar" for="customer_avatar">
												<i class="fa fa-pen icon-sm text-muted"></i>
												{{-- <input type="hidden" name="profile_avatar_remove" /> --}}
												<input type="file" name="avatar" accept=".png, .jpg, .jpeg" id="customer_avatar"/>
											</label>
											<span class="btn btn-xs btn-icon btn-circle btn-white btn-hover-text-primary btn-shadow" data-action="cancel" data-toggle="tooltip" title="Cancel avatar">
												<i class="ki ki-bold-close icon-xs text-muted"></i>
											</span>
											<script>
												
												const customer_inputFile = document.getElementById('customer_avatar');
												const customer_avatar_preview = document.getElementById('customeravatar_preview');

												customer_inputFile.addEventListener('change', function(){
													const file = this.files[0];
													
													if(file){
														console.log(file);
														const reader = new FileReader();

														reader.addEventListener("load", function(){
															customer_avatar_preview.setAttribute("src", this.result);
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
										<input class="form-control form-control-solid form-control-lg required" name="name" type="text" value="" required/>
									</div>
								</div>
								<!--end::Group-->
								<!--begin::Group-->
								<div class="form-group row">
									<label class="col-xl-3 col-lg-3 col-form-label">Company Name</label>
									<div class="col-lg-9 col-xl-9">
										<input class="form-control form-control-solid form-control-lg" name="company_name" type="text" value="Loop Inc." />
										<span class="form-text text-muted">If you want your invoices addressed to a company. Leave blank to use your full name.</span>
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
											<input type="text" class="form-control form-control-solid form-control-lg" name="phone" value="5678967456" placeholder="Phone" required/>
										</div>
										<span class="form-text text-muted">Enter valid US phone number(e.g: 5678967456).</span>
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
											<input type="text" class="form-control form-control-solid form-control-lg" name="email" value="" required/>
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
											<input type="password" class="form-control form-control-solid form-control-lg" name="password" required/>
										</div>
									</div>
								</div>
								<!--end::Group-->
								<!--begin::Group-->
								<div class="form-group row">
									<label class="col-xl-3 col-lg-3 col-form-label">Company Site</label>
									<div class="col-lg-9 col-xl-9">
										<div class="input-group input-group-solid input-group-lg">
											<input type="text" class="form-control form-control-solid form-control-lg" name="website" placeholder="Website" value="loop" />
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
											<select class="form-control form-control-solid form-control-lg" name="country">
												@foreach(Helper::gulfCountries() as $key => $value)
														@if ($loop->index == 0) 
															<option value="SA">Saudi Arabia</option>
														@endif
														@if ($key !== "SA") 
															<option value="{{$key}}">{{$value}}</option>
														@endif
												@endforeach
											</select><div class="input-group-append">
											</div>
										</div>
									</div>
								</div>
								<!--end::Row-->

								<div class="form-group row">
									<label class="col-xl-3 col-lg-3 col-form-label">Bank</label>
									<div class="col-lg-9 col-xl-9">
										<div class="input-group input-group-solid input-group-lg">
											{!! Form::select('bank_name', Helper::saudiBanks(), '', [ 'class' => 'form-control form-control-solid form-control-lg'])!!}
											<div class="input-group-append">
											</div>
										</div>
									</div>
								</div>
								
								<div class="form-group row">
									<label class="col-xl-3 col-lg-3 col-form-label">Bank Account Name</label>
									<div class="col-lg-9 col-xl-9">
										<div class="input-group input-group-solid input-group-lg">
											{!! Form::text('bank_account_name', '', [ 'class' => 'form-control form-control-solid form-control-lg'])!!}
											<div class="input-group-append">
											</div>
										</div>
									</div>
								</div>
								<div class="form-group row">
									<label class="col-xl-3 col-lg-3 col-form-label">Bank Account Number</label>
									<div class="col-lg-9 col-xl-9">
										<div class="input-group input-group-solid input-group-lg">
											{!! Form::text('bank_account_no', '', [ 'class' => 'form-control form-control-solid form-control-lg'])!!}
											<div class="input-group-append">
											</div>
										</div>
									</div>
								</div>
								<div class="form-group row">
									<label class="col-xl-3 col-lg-3 col-form-label">Iban</label>
									<div class="col-lg-9 col-xl-9">
										<div class="input-group input-group-solid input-group-lg">
											{!! Form::text('iban', '', [ 'class' => 'form-control form-control-solid form-control-lg'])!!}
											<div class="input-group-append">
											</div>
										</div>
									</div>
								</div>
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
					
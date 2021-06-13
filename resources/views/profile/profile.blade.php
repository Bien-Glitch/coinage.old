@extends('layouts.dashboard')
@section('content')
	<div class="nk-content-inner">
		<div class="nk-content-body">
			<div class="nk-block">
				<div class="card card-bordered">
					<div class="card-aside-wrap">
						<div class="card-inner card-inner-lg">
							<div class="nk-block-head nk-block-head-lg">
								<div class="nk-block-between">
									<div class="nk-block-head-content">
										<h4 class="nk-block-title">Personal Information</h4>
										<div class="nk-block-des">
											<p>Basic info, like your name and address, that you use
												on Nio Platform.</p>
										</div>
									</div>
									<div class="nk-block-head-content align-self-start d-lg-none">
										<a href="#" class="toggle btn btn-icon btn-trigger mt-n1"
										   data-target="userAside"><em class="icon ni ni-menu-alt-r"></em></a>
									</div>
								</div>
							</div><!-- .nk-block-head -->
							<div class="nk-block">
								<div class="nk-data data-list">
									<div class="data-head">
										<h6 class="overline-title">Basics</h6>
									</div>
									<div class="data-item" data-toggle="modal" data-target="#profile-edit">
										<div class="data-col">
											<span class="data-label">Full Name</span>
											<span class="data-value">{{$user->fullName}}</span>
										</div>
										<div class="data-col data-col-end"><span class="data-more"><em
													class="icon ni ni-forward-ios"></em></span>
										</div>
									</div><!-- data-item -->
									<div class="data-item" data-toggle="modal" data-target="#profile-edit">
										<div class="data-col">
											<span class="data-label">Display Name</span>
											<span class="data-value">{{$user->username}}</span>
										</div>
										<div class="data-col data-col-end"><span class="data-more"><em
													class="icon ni ni-forward-ios"></em></span>
										</div>
									</div><!-- data-item -->
									<div class="data-item">
										<div class="data-col">
											<span class="data-label">Email</span>
											<span class="data-value">{{$user->email}}</span>
										</div>
										<div class="data-col data-col-end"><span class="data-more disable"><em
													class="icon ni ni-lock-alt"></em></span></div>
									</div><!-- data-item -->
									<div class="data-item">
										<div class="data-col">
											<span class="data-label">Phone Number</span>
											<span class="data-value">{{$user->phone}}</span>
										</div>
										<div class="data-col data-col-end"><span class="data-more disable"><em
													class="icon ni ni-lock-alt"></em></span></div>
									</div><!-- data-item -->


                            </div><!-- data-list -->
                            <div class="nk-data data-list">
                                <div class="data-head">
                                    <h6 class="overline-title">Active Offers</h6>
                                </div>
                                <div class="tranx-list tranx-list-stretch card card-bordered">
									@forelse ($offers as $offer )
										<a type="button" class="tranx-item view-offer" data-id="{{ $offer->id }}" data-percent="{{ $offer->percentage }}" data-uri="{{ route('offers.show', $offer->id) }}">
											<div class="tranx-col">
												<div class="tranx-info">
													<div class="tranx-badge">
														<span class="tranx-icon icon ni ni-sign-btc"></span>
													</div>
													<div class="tranx-data">
														<div class="tranx-label">{{ $offer->crypto_type }}</div>
														<div class="tranx-date" hidden>{{ $offer->percentage }}</div>
													</div>
												</div>
											</div>
											<div class="tranx-col">
												<div class="tranx-amount">
													<div class="number">
														{{--{{ $offer }}--}}
														<strong class="crypto-total"></strong>
														<span class="crypto-currency">{{ $offer->crypto_type }}</span>
													</div>
													<div class="number-sm">
														<span>Current Market Value:</span> <strong class="crypto-current"></strong>
														<span class="fiat-currency currency-usd">/ 1 {{ $offer->crypto_type }}</span>
													</div>
													<span class="number-sm">
														{{ $offer->min_amount . ' - ' . $offer->max_amount }}
														<span>(min - max)</span>
													</span>
												</div>
											</div>
										</a><!-- .nk-tranx-item -->
									@empty
										<div class="tranx-item alert alert-danger p-1">
											<div class="tranx-col">
												<div class="tranx-info">
													<div class="tranx-badge">
														<span class="tranx-icon icon ni ni-info"></span>
													</div>
													<div class="tranx-data">
														You do not have any orders yet!
													</div>
												</div>
											</div>
										</div><!-- .nk-tranx-item -->
									@endforelse
								</div><!-- .card -->
                            </div><!-- data-list -->
                        </div><!-- .nk-block -->
                    </div>
                    <div class="card-aside card-aside-left user-aside toggle-slide toggle-slide-left toggle-break-lg"
                        data-content="userAside" data-toggle-screen="lg" data-toggle-overlay="true">
                        <div class="card-inner-group" data-simplebar>
                            <div class="card-inner">
                                <div class="user-card">
                                    <div class="user-avatar bg-primary">
                                        <span>{{Auth::User()->initials}}</span>
                                    </div>
                                    <div class="user-info">
                                        <span class="lead-text">{{Auth::User()->fullname}}</span>
                                        <span class="sub-text">{{Auth::User()->email}}</span>
                                    </div>
                                    <div class="user-action">
                                        <div class="dropdown">
                                            <a class="btn btn-icon btn-trigger mr-n2" data-toggle="dropdown"
                                                href="#"><em class="icon ni ni-more-v"></em></a>
                                            <div class="dropdown-menu dropdown-menu-right">
                                                <ul class="link-list-opt no-bdr">
                                                    <li><a href="#"><em class="icon ni ni-camera-fill"></em><span>Change

                                                                Photo</span></a></li>
														<li><a href="#"><em class="icon ni ni-edit-fill"></em><span>Update
                                                                Profile</span></a></li>
													</ul>
												</div>
											</div>
										</div>
									</div><!-- .user-card -->
								</div><!-- .card-inner -->
								<div class="card-inner">
									<div class="user-account-info py-0">
										<h6 class="overline-title-alt">Verification</h6>

										<ul class="list-group ">
											@if ($user->hasVerifiedEmail())
												<li class="list-group-item py-2 border-0 text-success font-weight-bold">Email is
													Verified
												</li>
											@else
												<a href="#" class="text-danger font-weight-bold">
													<li class="list-group-item py-2 border-0">Email Verification</li>
												</a>
											@endif
											@if ($user->hasVerifiedPhone())
												<li class="list-group-item py-2 border-0 text-success font-weight-bold">Phone
													number is verified
												</li>
											@else
												<a href="profile/verify/phone" class="text-danger font-weight-bold">
													<li class="list-group-item py-2 border-0">Phone Verification</li>
												</a>
											@endif
											@if ($user->hasVerifiedBank())
												<li class="list-group-item py-2 border-0 text-success font-weight-bold">Bank
													account is verified
												</li>
											@else
												<a href="profile/verify/bank" class="text-danger font-weight-bold">
													<li class="list-group-item py-2 border-0">Bank Verification</li>
												</a>
											@endif
											@if ($user->hasVerifiedId())
												<li class="list-group-item py-2 border-0 text-success font-weight-bold">ID is
													verified
												</li>
											@elseif ($user->isPendingIdVerification())
												<a href="profile/verify/id" class="text-danger font-weight-bold d-flex">
													<li class="list-group-item py-2 border-0">ID Verification  <span class="badge badge-outline-primary small">in progress</span></li>

												</a>
											@else
												<a href="profile/verify/id" class="text-danger font-weight-bold">
													<li class="list-group-item py-2 border-0">ID Verification</li>
												</a>
											@endif
										</ul>
									</div>
								</div><!-- .card-inner -->
								<div class="card-inner p-0">
									<ul class="link-list-menu">
										<li><a class="active" href="html/user-profile-regular.html"><em
													class="icon ni ni-user-fill-c"></em><span>Personal
                                                Infomation</span></a></li>
										<li><a href="html/user-profile-notification.html"><em
													class="icon ni ni-bell-fill"></em><span>Notifications</span></a>
										</li>
										<li><a href="html/user-profile-activity.html"><em
													class="icon ni ni-activity-round-fill"></em><span>Account
                                                Activity</span></a></li>
										<li><a href="html/user-profile-setting.html"><em
													class="icon ni ni-lock-alt-fill"></em><span>Security
                                                Settings</span></a></li>
										<li><a href="#"><em class="icon ni ni-shield-star-fill"></em><span>Password
                                                Change</span></a></li>
										<li><a href="#"><em class="icon ni ni-grid-add-fill-c"></em><span>Connected
                                                with Social</span></a></li>
									</ul>
								</div><!-- .card-inner -->
							</div><!-- .card-inner-group -->
						</div><!-- card-aside -->
					</div><!-- .card-aside-wrap -->
				</div><!-- .card -->
			</div><!-- .nk-block -->
		</div>
	</div>

<!-- @@ Profile Edit Modal @e -->
<div class="modal fade" tabindex="-1" role="dialog" id="profile-edit">
    <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
        <div class="modal-content">
            <a href="#" class="close" data-dismiss="modal"><em class="icon ni ni-cross-sm"></em></a>
            <div class="modal-body modal-body-lg">
                <h5 class="title">Update Profile</h5>
                <ul class="nk-nav nav nav-tabs">
                    <li class="nav-item">
                        <a class="nav-link active" data-toggle="tab" href="#personal">Personal</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" data-toggle="tab" href="#address">Address</a>
                    </li>
                </ul><!-- .nav-tabs -->
                <div class="tab-content">
                    <div class="tab-pane active" id="personal">
                        <div class="row gy-4">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label class="form-label" for="full-name">Surname</label>
                                    <input type="text" class="form-control form-control-lg" id="full-name"
                                        value="{{$user->surname}}">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label class="form-label" for="display-name">Other Names</label>
                                    <input type="text" class="form-control form-control-lg" id="display-name"
                                        value="{{$user->other_names}}">
                                </div>
                            </div>
                            {{-- <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="form-label" for="phone-no">Phone Number</label>
                                        <input type="text" class="form-control form-control-lg" id="phone-no"
                                            value="+880" placeholder="Phone Number">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="form-label" for="birth-day">Date of Birth</label>
                                        <input type="text" class="form-control form-control-lg date-picker"
                                            id="birth-day" placeholder="Enter your name">
                                    </div>
                                </div>
                                <div class="col-12">
                                    <div class="custom-control custom-switch">
                                        <input type="checkbox" class="custom-control-input" id="latest-sale">
                                        <label class="custom-control-label" for="latest-sale">Use full name to display
                                        </label>
                                    </div>
                                </div> --}}
                            <div class="col-12">
                                <ul class="align-center flex-wrap flex-sm-nowrap gx-4 gy-2">
                                    <li>
                                        <a href="#" class="btn btn-lg btn-primary">Update Profile</a>
                                    </li>
                                    <li>
                                        <a href="#" data-dismiss="modal" class="link link-light">Cancel</a>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div><!-- .tab-pane -->
                    <div class="tab-pane" id="address">
                        <div class="row gy-4">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label class="form-label" for="address-l1">Address Line 1</label>
                                    <input type="text" class="form-control form-control-lg" id="address-l1"
                                        value="2337 Kildeer Drive">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label class="form-label" for="address-l2">Address Line 2</label>
                                    <input type="text" class="form-control form-control-lg" id="address-l2" value="">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label class="form-label" for="address-st">State</label>
                                    <input type="text" class="form-control form-control-lg" id="address-st"
                                        value="Kentucky">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label class="form-label" for="address-county">Country</label>
                                    <select class="form-select" id="address-county" data-ui="lg">
                                        <option>Canada</option>
                                        <option>United State</option>
                                        <option>United Kindom</option>
                                        <option>Australia</option>
                                        <option>India</option>
                                        <option>Bangladesh</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-12">
                                <ul class="align-center flex-wrap flex-sm-nowrap gx-4 gy-2">
                                    <li>
                                        <a href="#" class="btn btn-lg btn-primary">Update Address</a>
                                    </li>
                                    <li>
                                        <a href="#" data-dismiss="modal" class="link link-light">Cancel</a>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div><!-- .tab-pane -->
                </div><!-- .tab-content -->
            </div><!-- .modal-body -->
        </div><!-- .modal-content -->
    </div><!-- .modal-dialog -->
</div><!-- .modal -->
<script src="{{ asset('design/js/custom/user.js') }}"></script>
@endsection

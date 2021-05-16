<!DOCTYPE html>
<html lang="zxx" class="js">

<head>
	<meta charset="utf-8">
	<meta name="author" content="Softnio">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<!-- CSRF Token -->
	<meta name="csrf-token" content="{{ csrf_token() }}" data-user-id="{{ auth()->id() }}">
	<meta name="user-id" content="{{ auth()->id() }}">
	<meta name="description" content="A powerful and conceptual apps base dashboard template that especially build for developers and programmers.">
	<!-- Fav Icon  -->
	<link rel="shortcut icon" href="{{asset('dashboard/images/favicon.png')}}">
	<!-- Page Title  -->
	<title>Blank - Crypto | DashLite Admin Template</title>

	<!-- StyleSheets  -->
	<link rel="stylesheet" href="{{ asset('dashboard/assets/css/dashlite.css?ver=2.4.0') }}">
	<link id="skin-default" rel="stylesheet" href="{{ asset('dashboard/assets/css/theme.css?ver=2.4.0') }}">
	<link rel="stylesheet" href="{{ asset('design/assets/fontawesome/css/all.min.css') }}">
	<link rel="stylesheet" href="{{ asset('design/assets/bfh/css/bootstrap-formhelpers.min.css') }}">

	<!--Jquery-->
	<script src="{{ asset('design/js/jquery/jquery.min.js') }}"></script>
</head>

<div id="user-modal-wrapper"></div>

<body class="nk-body npc-crypto bg-white has-sidebar ">
	<div class="nk-app-root">
		<!-- main  -->
		<div class="nk-main ">
			<!-- sidebar  -->
			<div class="nk-sidebar nk-sidebar-fixed " data-content="sidebarMenu">
				<div class="nk-sidebar-element nk-sidebar-head">
					<div class="nk-sidebar-brand">
						<a href="index.html" class="logo-link nk-sidebar-logo">
							<img class="logo-light logo-img" src="{{ asset('dashboard/images/logo.png') }}" srcset="{{ asset('dashboard/images/logo2x.png')}}" alt="logo">
							<img class="logo-dark logo-img" src="{{ asset('dashboard/images/logo-dark.png') }}" srcset="{{ asset('dashboard/images/logo-dark2x.png') }}" alt="logo-dark">
							<span class="nio-version">Crypto</span>
						</a>
					</div>
					<div class="nk-menu-trigger mr-n2">
						<a href="#" class="nk-nav-toggle nk-quick-nav-icon d-xl-none" data-target="sidebarMenu"><em class="icon ni ni-arrow-left"></em></a>
					</div>
				</div><!-- .nk-sidebar-element -->
				<div class="nk-sidebar-element">
					<div class="nk-sidebar-body" data-simplebar>
						<div class="nk-sidebar-content">
							<div class="nk-sidebar-widget d-none d-xl-block">
								<div class="user-account-info between-center">
									<!-- <div class="user-account-main">
										<h6 class="overline-title-alt">Available Balance</h6>
										<div class="user-balance">2.014095 <small class="currency currency-btc">BTC</small></div>
										<div class="user-balance-alt">18,934.84 <span class="currency currency-btc">BTC</span></div>
									</div>
									<a href="#" class="btn btn-white btn-icon btn-light"><em class="icon ni ni-line-chart"></em></a> -->
								</div>
								<ul class="user-account-data gy-1">
									<!-- <li>
										<div class="user-account-label">
											<span class="sub-text">Profits (7d)</span>
										</div>
										<div class="user-account-value">
											<span class="lead-text">+ 0.0526 <span class="currency currency-btc">BTC</span></span>
											<span class="text-success ml-2">3.1% <em class="icon ni ni-arrow-long-up"></em></span>
										</div>
									</li>
									<li>
										<div class="user-account-label">
											<span class="sub-text">Deposit in orders</span>
										</div>
										<div class="user-account-value">
											<span class="sub-text">0.005400 <span class="currency currency-btc">BTC</span></span>
										</div>
									</li> -->
								</ul>
								<div class="user-account-actions">
									<ul class="g-3">
										<li><a href="#" class="btn btn-lg btn-primary"><span>Deposit</span></a></li>
										<li><a href="#" class="btn btn-lg btn-warning"><span>Withdraw</span></a></li>
									</ul>
								</div>
							</div><!-- .nk-sidebar-widget -->
							<div class="nk-sidebar-widget nk-sidebar-widget-full d-xl-none pt-0">
								<a class="nk-profile-toggle toggle-expand" data-target="sidebarProfile" href="#">
									<div class="user-card-wrap">
										<div class="user-card">
											<div class="user-avatar">
												<span>AB</span>
											</div>
											<div class="user-info">
												<span class="lead-text">Igboeli Gabriel Moses</span>
												<span class="sub-text">infooftnio.com</span>
											</div>
											<div class="user-action">
												<em class="icon ni ni-chevron-down"></em>
											</div>
										</div>
									</div>
								</a>
								<div class="nk-profile-content toggle-expand-content" data-content="sidebarProfile">
									<div class="user-account-info between-center">
										<div class="user-account-main">
											<h6 class="overline-title-alt">Available Balance</h6>
											<div class="user-balance">2.014095 <small class="currency currency-btc">BTC</small></div>
											<div class="user-balance-alt">18,934.84 <span class="currency currency-btc">BTC</span></div>
										</div>
										<a href="#" class="btn btn-icon btn-light"><em class="icon ni ni-line-chart"></em></a>
									</div>
									<ul class="user-account-data">
										<li>
											<div class="user-account-label">
												<span class="sub-text">Profits (7d)</span>
											</div>
											<div class="user-account-value">
												<span class="lead-text">+ 0.0526 <span class="currency currency-btc">BTC</span></span>
												<span class="text-success ml-2">3.1% <em class="icon ni ni-arrow-long-up"></em></span>
											</div>
										</li>
										<li>
											<div class="user-account-label">
												<span class="sub-text">Deposit in orders</span>
											</div>
											<div class="user-account-value">
												<span class="sub-text text-base">0.005400 <span class="currency currency-btc">BTC</span></span>
											</div>
										</li>
									</ul>
									<ul class="user-account-links">
										<li><a href="#" class="link"><span>Withdraw Funds</span> <em class="icon ni ni-wallet-out"></em></a></li>
										<li><a href="#" class="link"><span>Deposit Funds</span> <em class="icon ni ni-wallet-in"></em></a></li>
									</ul>
									<ul class="link-list">
										<li><a href="/profile"><em class="icon ni ni-user-alt"></em><span>View Profile</span></a></li>
										<li><a href="profile-security.html"><em class="icon ni ni-setting-alt"></em><span>Account Setting</span></a></li>
										<li><a href="profile-activity.html"><em class="icon ni ni-activity-alt"></em><span>Login Activity</span></a></li>
									</ul>
									<ul class="link-list">
										<li><a href="#"><em class="icon ni ni-signout"></em><span>Sign out</span></a></li>
									</ul>
								</div>
							</div><!-- .nk-sidebar-widget -->
							<div class="nk-sidebar-menu">
								<!-- Menu -->
								<ul class="nk-menu">
									<li class="nk-menu-heading">
										<h6 class="overline-title">Menu</h6>
									</li>
									<li class="nk-menu-item">
										<a href="/home" class="nk-menu-link">
											<span class="nk-menu-icon"><em class="icon ni ni-dashboard"></em></span>
											<span class="nk-menu-text">Dashboard</span>
										</a>
									</li>
									<li class="nk-menu-item">
										<a href="/offers" class="nk-menu-link">
											<span class="nk-menu-icon"><em class="icon ni ni-offer"></em></span>
											<span class="nk-menu-text">Offers</span>
										</a>
									</li>
									<li class="nk-menu-item">
										<a href="pending-requests.html" class="nk-menu-link">
											<span class="nk-menu-icon"><em class="icon ni ni-reload-alt"></em></span>
											<span class="nk-menu-text">Pending Requests <span class="badge badge-primary">3</span></span>
										</a>
									</li>
									<li class="nk-menu-item">
										<a href="crypto-wallets.html" class="nk-menu-link">
											<span class="nk-menu-icon"><em class="icon ni ni-wallet-alt"></em></span>
											<span class="nk-menu-text">Crypto Wallets</span>
										</a>
									</li>
									<li class="nk-menu-item">
										<a href="bank-accounts.html" class="nk-menu-link">
											<span class="nk-menu-icon"><em class="icon ni ni-wallet-saving"></em></span>
											<span class="nk-menu-text">Bank Accounts</span>
										</a>
									</li>
									<li class="nk-menu-item">
										<a href="transaction.html" class="nk-menu-link">
											<span class="nk-menu-icon"><em class="icon ni ni-histroy"></em></span>
											<span class="nk-menu-text">Transactions</span>
										</a>
									</li>
									<li class="nk-menu-item">
										<a href="/profile/verify" class="nk-menu-link">
											<span class="nk-menu-icon"><em class="icon ni ni-user-check-fill"></em></span>
											<span class="nk-menu-text">User Verification</span>
										</a>
									</li>
									<li class="nk-menu-item">
										<a href="/my-account" class="nk-menu-link">
											<span class="nk-menu-icon"><em class="icon ni ni-account-setting"></em></span>
											<span class="nk-menu-text">My Profile</span>
										</a>
									</li>
									<li class="nk-menu-item">
										<a href="#" class="nk-menu-link" onclick="event.preventDefault();
                                        document.getElementById('logout-form').submit();">
											<span class="nk-menu-icon"><em class="icon ni ni-signout"></em></span>
											<span class="nk-menu-text">Logout</span>
											<form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
												@csrf
											</form>
										</a>
									</li>
								</ul><!-- .nk-menu -->
							</div>
							<div class="nk-sidebar-footer">
								<ul class="nk-menu nk-menu-footer">
									<li class="nk-menu-item">
										<a href="#" class="nk-menu-link">
											<span class="nk-menu-icon"><em class="icon ni ni-help-alt"></em></span>
											<span class="nk-menu-text">Support</span>
										</a>
									</li>
									<li class="nk-menu-item ml-auto">
										<div class="dropup">
											<a href="#" class="nk-menu-link dropdown-indicator has-indicator" data-toggle="dropdown" data-offset="0,10">
												<span class="nk-menu-icon"><em class="icon ni ni-globe"></em></span>
												<span class="nk-menu-text">English</span>
											</a>
											<div class="dropdown-menu dropdown-menu-sm dropdown-menu-right">
												<ul class="language-list">
													<li>
														<a href="#" class="language-item">
															<img src="{{ asset('dashboard/images/flags/english.png') }}" alt="" class="language-flag">
															<span class="language-name">English</span>
														</a>
													</li>
													<li>
														<a href="#" class="language-item">
															<img src="{{ asset('dashboard/images/flags/spanish.png') }}" alt="" class="language-flag">
															<span class="language-name">Español</span>
														</a>
													</li>
													<li>
														<a href="#" class="language-item">
															<img src="{{ asset('dashboard/images/flags/french.png') }}" alt="" class="language-flag">
															<span class="language-name">Français</span>
														</a>
													</li>
													<li>
														<a href="#" class="language-item">
															<img src="{{ asset('dashboard/images/flags/turkey.png') }}" alt="" class="language-flag">
															<span class="language-name">Türkçe</span>
														</a>
													</li>
												</ul>
											</div>
										</div>
									</li>
								</ul><!-- .nk-footer-menu -->
							</div><!-- .nk-sidebar-footer -->
						</div><!-- .nk-sidebar-content -->
					</div><!-- .nk-sidebar-body -->
				</div><!-- .nk-sidebar-element -->
			</div>
			<!-- sidebar  -->
			<!-- wrap  -->
			<div class="nk-wrap ">
				<!-- main header  -->
				<div class="nk-header nk-header-fluid nk-header-fixed is-light">
					<div class="container-fluid">
						<div class="nk-header-wrap">
							<div class="nk-menu-trigger d-xl-none ml-n1">
								<a href="#" class="nk-nav-toggle nk-quick-nav-icon" data-target="sidebarMenu"><em class="icon ni ni-menu"></em></a>
							</div>
							<div class="nk-header-brand d-xl-none">
								<a href="index.html" class="logo-link">
									<img class="logo-light logo-img" src="{{ asset('dashboard/images/logo.png') }}" srcset="{{ asset('dashboard/images/logo2x.png')}}" alt="logo">
									<img class="logo-dark logo-img" src="{{ asset('dashboard/images/logo-dark.png') }}" srcset="{{ asset('dashboard/images/logo-dark2x.png') }}" alt="logo-dark">
									<span class="nio-version">Crypto</span>
								</a>
							</div>
							<div class="nk-header-news d-none d-xl-block">
								<div class="nk-news-list">
									<a class="nk-news-item" href="#">
										<div class="nk-news-icon">
											<em class="icon ni ni-card-view"></em>
										</div>
										<div class="nk-news-text">
											<p>Do you know the latest update of 2019? <span> A overview of our is now available on YouTube</span></p>
											<em class="icon ni ni-external"></em>
										</div>
									</a>
								</div>
							</div>
							<div class="nk-header-tools">
								<ul class="nk-quick-nav">
									<li class="dropdown user-dropdown">
										<a href="#" class="dropdown-toggle" data-toggle="dropdown">
											<div class="user-toggle">
												<div class="user-avatar sm">
													<em class="icon ni ni-user-alt"></em>
												</div>
												<div class="user-info d-none d-md-block">
													<div class="user-status user-status-unverified">Unverified</div>
													<div class="user-name dropdown-indicator">Abu Bin Ishityak</div>
												</div>
											</div>
										</a>
										<div class="dropdown-menu dropdown-menu-md dropdown-menu-right dropdown-menu-s1">
											<div class="dropdown-inner user-card-wrap bg-lighter d-none d-md-block">
												<div class="user-card">
													<div class="user-avatar">
														<span>AB</span>
													</div>
													<div class="user-info">
														<span class="lead-text">Igboeli Gabriel Moses</span>
														<span class="sub-text">infooftnio.com</span>
													</div>
												</div>
											</div>
											<div class="dropdown-inner user-account-info">
												<h6 class="overline-title-alt">Nio Wallet Account</h6>
												<div class="user-balance">12.395769 <small class="currency currency-btc">BTC</small></div>
												<div class="user-balance-sub">Locked <span>0.344939 <span class="currency currency-btc">BTC</span></span></div>
												<a href="#" class="link"><span>Withdraw Funds</span> <em class="icon ni ni-wallet-out"></em></a>
											</div>
											<div class="dropdown-inner">
												<ul class="link-list">
													<li><a href="/profile"><em class="icon ni ni-user-alt"></em><span>View Profile</span></a></li>
													<li><a href="profile-security.html"><em class="icon ni ni-setting-alt"></em><span>Account Setting</span></a></li>
													<li><a href="profile-activity.html"><em class="icon ni ni-activity-alt"></em><span>Login Activity</span></a></li>
													<li><a class="dark-switch" href="#"><em class="icon ni ni-moon"></em><span>Dark Mode</span></a></li>
												</ul>
											</div>
											<div class="dropdown-inner">
												<ul class="link-list">
													<li><a href="#"><em class="icon ni ni-signout"></em><span>Sign out</span></a></li>
												</ul>
											</div>
										</div>
									</li>
									<li class="dropdown notification-dropdown mr-n1">
										<a href="#" class="dropdown-toggle nk-quick-nav-icon" data-toggle="dropdown">
											<div class="icon-status icon-status-info"><em class="icon ni ni-bell"></em></div>
										</a>
										<div class="dropdown-menu dropdown-menu-xl dropdown-menu-right dropdown-menu-s1">
											<div class="dropdown-head">
												<span class="sub-title nk-dropdown-title">Notifications</span>
												<a href="#">Mark All as Read</a>
											</div>
											<div class="dropdown-body">
												<div class="nk-notification">
													<div class="nk-notification-item dropdown-inner">
														<div class="nk-notification-icon">
															<em class="icon icon-circle bg-warning-dim ni ni-curve-down-right"></em>
														</div>
														<div class="nk-notification-content">
															<div class="nk-notification-text">You have requested to <span>Widthdrawl</span></div>
															<div class="nk-notification-time">2 hrs ago</div>
														</div>
													</div><!-- .dropdown-inner -->
													<div class="nk-notification-item dropdown-inner">
														<div class="nk-notification-icon">
															<em class="icon icon-circle bg-success-dim ni ni-curve-down-left"></em>
														</div>
														<div class="nk-notification-content">
															<div class="nk-notification-text">Your <span>Deposit Order</span> is placed</div>
															<div class="nk-notification-time">2 hrs ago</div>
														</div>
													</div><!-- .dropdown-inner -->
													<div class="nk-notification-item dropdown-inner">
														<div class="nk-notification-icon">
															<em class="icon icon-circle bg-warning-dim ni ni-curve-down-right"></em>
														</div>
														<div class="nk-notification-content">
															<div class="nk-notification-text">You have requested to <span>Widthdrawl</span></div>
															<div class="nk-notification-time">2 hrs ago</div>
														</div>
													</div><!-- .dropdown-inner -->
													<div class="nk-notification-item dropdown-inner">
														<div class="nk-notification-icon">
															<em class="icon icon-circle bg-success-dim ni ni-curve-down-left"></em>
														</div>
														<div class="nk-notification-content">
															<div class="nk-notification-text">Your <span>Deposit Order</span> is placed</div>
															<div class="nk-notification-time">2 hrs ago</div>
														</div>
													</div><!-- .dropdown-inner -->
													<div class="nk-notification-item dropdown-inner">
														<div class="nk-notification-icon">
															<em class="icon icon-circle bg-warning-dim ni ni-curve-down-right"></em>
														</div>
														<div class="nk-notification-content">
															<div class="nk-notification-text">You have requested to <span>Widthdrawl</span></div>
															<div class="nk-notification-time">2 hrs ago</div>
														</div>
													</div><!-- .dropdown-inner -->
													<div class="nk-notification-item dropdown-inner">
														<div class="nk-notification-icon">
															<em class="icon icon-circle bg-success-dim ni ni-curve-down-left"></em>
														</div>
														<div class="nk-notification-content">
															<div class="nk-notification-text">Your <span>Deposit Order</span> is placed</div>
															<div class="nk-notification-time">2 hrs ago</div>
														</div>
													</div><!-- .dropdown-inner -->
												</div>
											</div><!-- .nk-dropdown-body -->
											<div class="dropdown-foot center">
												<a href="#">View All</a>
											</div>
										</div>
									</li>
								</ul>
							</div>
						</div>
					</div>
				</div>
				<!-- main header  -->
				<!-- content  -->
				<div class="nk-content nk-content-fluid">
					<div class="container-xl wide-lg">
						<div class="nk-content-body">
							@yield('content')
						</div>
					</div>
				</div>
				<!-- content  -->
				<!-- footer  -->
				<div class="nk-footer nk-footer-fluid">
					<div class="container-fluid">
						<div class="nk-footer-wrap">
							<div class="nk-footer-copyright"> &copy; 2020 DashLite. Template by <a href="#">Softnio</a>
							</div>
							<div class="nk-footer-links">
								<ul class="nav nav-sm">
									<li class="nav-item"><a class="nav-link" href="#">Terms</a></li>
									<li class="nav-item"><a class="nav-link" href="#">Privacy</a></li>
									<li class="nav-item"><a class="nav-link" href="#">Help</a></li>
								</ul>
							</div>
						</div>
					</div>
				</div>
				<!-- footer  -->
			</div>
			<!-- wrap  -->
		</div>
		<!-- main  -->
	</div>
	<!-- app-root  -->
	<!-- JavaScript -->
	<script src="{{asset('dashboard/assets/js/bundle.js?ver=2.4.0')}}"></script>
	<script src="{{asset('dashboard/assets/js/scripts.js?ver=2.4.0')}}"></script>
	<script src="{{asset('dashboard/assets/js/charts/chart-crypto.js?ver=2.4.0')}}"></script>

	<script src="{{ asset('design/js/custom/accounting.min.js') }}"></script>
	<script src="{{ asset('design/js/custom/accounting.settings.js') }}"></script>

	<script src="{{ asset('design/js/jquery/jquery.form.js') }}"></script>
	<script src="{{ asset('design/assets/bfh/js/bootstrap-formhelpers.min.js') }}"></script>
	<script src="{{ asset('design/js/custom/main.js') }}"></script>
</body>

</html>

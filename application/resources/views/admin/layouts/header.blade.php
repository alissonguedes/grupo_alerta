@if (session()->has('userdata'))
	<header id="header" class="page-topbar">
		<div class="navbar navbar-fixed">
			<nav class="navbar-main navbar-color navbar-collapsible">
				<div class="nav-wrapper">

					@section('search')
						<label for="search" class="btn btn-flat btn-medium btn-floating waves-effect waves-light">
							<i class="material-icons prefix">search</i>
						</label>
						<div class="header-search-wrapper hide-on-med-and-down grey-text">
							<input type="search" name="search" id="search"
								class="header-search-input z-depth-2 dataTable_search browser-default"
								placeholder="@yield('placeholder')" autocomplete="off">
						</div>
					@show

					@section('header')
						<div class="page-title">
							<h5 class="title">@yield('title')</h5>
						</div>
					@show

					@section('navbar-header')
						<ul class="navbar-list right hide">
							<li class="dropdown-language">
								<a class="waves-effect waves-block waves-light translation-button" href="#"
									data-target="translation-dropdown">
									<span class="flag-icon flag-icon-gb"></span>
								</a>
								<ul class="dropdown-content" id="translation-dropdown" tabindex="0">
									<li class="dropdown-item" tabindex="0">
										<a class="grey-text text-darken-1" href="#!" data-language="en">
											<i class="flag-icon flag-icon-gb"></i>
											English
										</a>
									</li>
									<li class="dropdown-item" tabindex="0"><a class="grey-text text-darken-1" href="#!"
											data-language="fr">
											<i class="flag-icon flag-icon-fr"></i>
											French
										</a>
									</li>
									<li class="dropdown-item" tabindex="0"><a class="grey-text text-darken-1" href="#!"
											data-language="pt">
											<i class="flag-icon flag-icon-pt"></i>
											Portuguese
										</a>
									</li>
									<li class="dropdown-item" tabindex="0"><a class="grey-text text-darken-1" href="#!"
											data-language="de">
											<i class="flag-icon flag-icon-de"></i>
											German
										</a>
									</li>
								</ul>
							</li>
							<li class="hide-on-med-and-down">
								<a class="waves-effect waves-block waves-light toggle-fullscreen"
									href="javascript:void(0);">
									<i class="material-icons">settings_overscan</i>
								</a>
							</li>
							<li class="hide-on-large-only search-input-wrapper">
								<a class="waves-effect waves-block waves-light search-button" href="javascript:void(0);">
									<i class="material-icons">search</i>
								</a>
							</li>
							<li>
								<a class="waves-effect waves-block waves-light notification-button"
									href="javascript:void(0);" data-target="notifications-dropdown">
									<i class="material-icons">
										notifications_none
										<small class="notification-badge">5</small>
									</i>
								</a>
								<ul class="dropdown-content" id="notifications-dropdown" tabindex="0">
									<li tabindex="0">
										<h6>NOTIFICATIONS<span class="new badge">5</span></h6>
									</li>
									<li class="divider" tabindex="0"></li>
									<li tabindex="0"><a class="black-text" href="#!"><span
												class="material-icons icon-bg-circle cyan small">add_shopping_cart</span>
											A
											new
											order has been placed!</a>
										<time class="media-meta grey-text darken-2" datetime="2015-06-12T20:50:48+08:00">2
											hours
											ago</time>
									</li>
									<li tabindex="0"><a class="black-text" href="#!"><span
												class="material-icons icon-bg-circle red small">stars</span> Completed
											the
											task</a>
										<time class="media-meta grey-text darken-2" datetime="2015-06-12T20:50:48+08:00">3
											days
											ago</time>
									</li>
									<li tabindex="0"><a class="black-text" href="#!"><span
												class="material-icons icon-bg-circle teal small">settings</span>
											Settings
											updated</a>
										<time class="media-meta grey-text darken-2" datetime="2015-06-12T20:50:48+08:00">4
											days
											ago</time>
									</li>
									<li tabindex="0"><a class="black-text" href="#!"><span
												class="material-icons icon-bg-circle deep-orange small">today</span>
											Director
											meeting started</a>
										<time class="media-meta grey-text darken-2" datetime="2015-06-12T20:50:48+08:00">6
											days
											ago</time>
									</li>
									<li tabindex="0"><a class="black-text" href="#!"><span
												class="material-icons icon-bg-circle amber small">trending_up</span>
											Generate
											monthly report</a>
										<time class="media-meta grey-text darken-2" datetime="2015-06-12T20:50:48+08:00">1
											week
											ago</time>
									</li>
								</ul>
							</li>
							<li>
								<a class="waves-effect waves-block waves-light profile-button" href="javascript:void(0);"
									data-target="profile-dropdown">
									<span class="avatar-status avatar-online">
										<img src="../../../app-assets/images/avatar/avatar-7.png" alt="avatar">
										<i></i>
									</span>
								</a>
								<ul class="dropdown-content" id="profile-dropdown" tabindex="0">
									<li tabindex="0">
										<a class="grey-text text-darken-1" href="user-profile-page.html">
											<i class="material-icons">person_outline</i>
											Profile
										</a>
									</li>
									<li tabindex="0">
										<a class="grey-text text-darken-1" href="app-chat.html">
											<i class="material-icons">chat_bubble_outline</i>
											Chat</a>
									</li>
									<li tabindex="0">
										<a class="grey-text text-darken-1" href="page-faq.html">
											<i class="material-icons">help_outline</i>
											Help
										</a>
									</li>
									<li class="divider" tabindex="0"></li>
									<li tabindex="0">
										<a class="grey-text text-darken-1" href="user-lock-screen.html"><i
												class="material-icons">lock_outline</i>
											Lock
										</a>
									</li>
									<li tabindex="0">
										<a class="grey-text text-darken-1" href="user-login.html">
											<i class="material-icons">keyboard_tab</i>
											Logout
										</a>
									</li>
								</ul>
							</li>
							<li>
								<a class="waves-effect waves-block waves-light sidenav-trigger" href="#"
									data-target="slide-out-right">
									<i class="material-icons">format_indent_increase</i>
								</a>
							</li>
						</ul>
					@show

				</div>
			</nav>
		</div>
	</header>
@endif

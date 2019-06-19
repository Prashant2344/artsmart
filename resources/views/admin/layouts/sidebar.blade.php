				<!-- BEGIN: Left Aside -->
				<button class="m-aside-left-close  m-aside-left-close--skin-dark " id="m_aside_left_close_btn">
					<i class="la la-close"></i>
				</button>
				<div id="m_aside_left" class="m-grid__item	m-aside-left  m-aside-left--skin-dark ">
					<!-- BEGIN: Aside Menu -->
					<div id="m_ver_menu" class="m-aside-menu  m-aside-menu--skin-dark m-aside-menu--submenu-skin-dark " m-menu-vertical="1" m-menu-scrollable="0" m-menu-dropdown-timeout="500">
						<ul class="m-menu__nav  m-menu__nav--dropdown-submenu-arrow ">
							<li class="m-menu__item  m-menu__item--active" aria-haspopup="true" >
								<a  href="{{url('/admin')}}" class="m-menu__link "> 
									<i class="m-menu__link-icon flaticon-line-graph"></i>
									<span class="m-menu__link-title">
										<span class="m-menu__link-wrap">
											<span class="m-menu__link-text">
												Dashboard
											</span>
										</span>
									</span>
								</a>
							</li>
							<li class="m-menu__section">
								<h4 class="m-menu__section-text">
									Components
								</h4>
								<i class="m-menu__section-icon flaticon-more-v3"></i>
							</li>
							
							<li class="m-menu__item  m-menu__item" aria-haspopup="true" >
								<a target="_blank" href="{{ url('/') }}" class="m-menu__link ">
									<i class="m-menu__link-icon flaticon-imac"></i>
									<span class="m-menu__link-title">
										<span class="m-menu__link-wrap">
											<span class="m-menu__link-text">
												Visit Site
											</span>
										</span>
									</span>
								</a>
							</li>

							<li class="m-menu__item  m-menu__item--submenu" aria-haspopup="true"  m-menu-submenu-toggle="hover">
								<a  href="javascript:;" class="m-menu__link m-menu__toggle">
									<i class="m-menu__link-icon flaticon-folder-1 "></i>
									<span class="m-menu__link-text">
										Art Management
									</span>
									<i class="m-menu__ver-arrow la la-angle-right"></i>
								</a>
								<div class="m-menu__submenu ">
									<span class="m-menu__arrow"></span>
									<ul class="m-menu__subnav">
										<li class="m-menu__item  m-menu__item" aria-haspopup="true" >
											 <a  href="{{url('admin/categories')}}" class="m-menu__link ">
												<i class="m-menu__link-icon flaticon-folder-2"></i>
												<span class="m-menu__link-title">
													<span class="m-menu__link-wrap">
														<span class="m-menu__link-text">
															Category
														</span>
													</span>
												</span>
											</a>
										</li>
										<li class="m-menu__item  m-menu__item" aria-haspopup="true" >
											 <a  href="{{url('admin/arts')}}" class="m-menu__link ">
												<i class="m-menu__link-icon flaticon-book"></i>
												<span class="m-menu__link-title">
													<span class="m-menu__link-wrap">
														<span class="m-menu__link-text">
															Art
														</span>
													</span>
												</span>
											</a>
										</li>
									</ul>
								</div>
							</li>

							<li class="m-menu__item  m-menu__item" aria-haspopup="true" >
								<a  href="{{url('/admin/advertisements')}}" class="m-menu__link ">
									<i class="m-menu__link-icon flaticon-grid-menu "></i>
									<span class="m-menu__link-title">
										<span class="m-menu__link-wrap">
											<span class="m-menu__link-text">
												Advertisements
											</span>
										</span>
									</span>
								</a>
							</li>

							<li class="m-menu__item  m-menu__item" aria-haspopup="true" >
								<a  href="{{url('/admin/advertisements')}}" class="m-menu__link ">
									<i class="m-menu__link-icon flaticon-book "></i>
									<span class="m-menu__link-title">
										<span class="m-menu__link-wrap">
											<span class="m-menu__link-text">
												User Ads
											</span>
										</span>
									</span>
								</a>
							</li>

							<li class="m-menu__item  m-menu__item" aria-haspopup="true" >
								<a  href="{{url('/admin/posts')}}" class="m-menu__link ">
									<i class="m-menu__link-icon flaticon-open-box  "></i>
									<span class="m-menu__link-title">
										<span class="m-menu__link-wrap">
											<span class="m-menu__link-text">
												User Posts
											</span>
										</span>
									</span>
								</a>
							</li>

							<li class="m-menu__item  m-menu__item" aria-haspopup="true" >
								<a  href="{{url('/admin/galleries')}}" class="m-menu__link ">
									<i class="m-menu__link-icon flaticon-calendar-3"></i>
									<span class="m-menu__link-title">
										<span class="m-menu__link-wrap">
											<span class="m-menu__link-text">
												Gallery
											</span>
										</span>
									</span>
								</a>
							</li>

							<li class="m-menu__item  m-menu__item" aria-haspopup="true" >
								<a  href="{{url('/admin/settings')}}" class="m-menu__link ">
									<i class="m-menu__link-icon flaticon-settings-1 "></i>
									<span class="m-menu__link-title">
										<span class="m-menu__link-wrap">
											<span class="m-menu__link-text">
												Settings
											</span>
										</span>
									</span>
								</a>
							</li>
							
							<li class="m-menu__item  m-menu__item--submenu" aria-haspopup="true"  m-menu-submenu-toggle="hover">
								<a  href="javascript:;" class="m-menu__link m-menu__toggle">
									<i class="m-menu__link-icon flaticon-user"></i>
									<span class="m-menu__link-text">
										User Management
									</span>
									<i class="m-menu__ver-arrow la la-angle-right"></i>
								</a>
								<div class="m-menu__submenu ">
									<span class="m-menu__arrow"></span>
									<ul class="m-menu__subnav">

										<li class="m-menu__item  m-menu__item--submenu" aria-haspopup="true"  m-menu-submenu-toggle="hover">
											<a  href="{{url('/admin/admins')}}" class="m-menu__link m-menu__toggle">
												<i class="m-menu__link-bullet m-menu__link-bullet--dot">
													<span></span>
												</i>
												<span class="m-menu__link-text">
													Admin
												</span>
											</a>
										</li>

										<li class="m-menu__item  m-menu__item--submenu" aria-haspopup="true"  m-menu-submenu-toggle="hover">
											 <a  href="{{url('/admin/users')}}" class="m-menu__link m-menu__toggle">
												<i class="m-menu__link-bullet m-menu__link-bullet--dot">
													<span></span>
												</i>
												<span class="m-menu__link-text">
													User
												</span>
											</a>
										</li>
																				
									</ul>
								</div>
							</li>
						</ul>
					</div>
					<!-- END: Aside Menu -->
				</div>
				<!-- END: Left Aside -->
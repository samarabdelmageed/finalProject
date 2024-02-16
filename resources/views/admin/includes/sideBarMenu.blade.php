<!-- sidebar menu -->
<div id="sidebar-menu" class="main_menu_side hidden-print main_menu">
						<div class="menu_section">
							<h3>General</h3>
							<ul class="nav side-menu">
								<li><a><i class="fa fa-users"></i> Users <span class="fa fa-chevron-down"></span></a>
									<ul class="nav child_menu">
										<li><a href="{{ route('users') }}" class="nav-item nav-link {{ request()->routeIs('users') ? 'active' : '' }}">Users List</a></li>
										<li><a href="{{ route('addUser') }}" class="nav-item nav-link {{ request()->routeIs('addUser') ? 'active' : '' }}">Add User</a></li>
									</ul>
								</li>
								<li><a><i class="fa fa-edit"></i> Categories <span class="fa fa-chevron-down"></span></a>
									<ul class="nav child_menu">
										<li><a href="{{ route('addCategory') }}" class="nav-item nav-link {{ request()->routeIs('addCategory') ? 'active' : '' }}">Add Category</a></li>
										<li><a href="{{ route('categories') }}" class="nav-item nav-link {{ request()->routeIs('categories') ? 'active' : '' }}">Categories List</a></li>
									</ul>
								</li>
								<li><a><i class="fa fa-desktop"></i> Cars <span class="fa fa-chevron-down"></span></a>
									<ul class="nav child_menu">
										<li><a href="{{ route('addCar') }}" class="nav-item nav-link {{ request()->routeIs('addCar') ? 'active' : '' }}">Add Car</a></li>
										<li><a href="{{ route('cars') }}" class="nav-item nav-link {{ request()->routeIs('cars') ? 'active' : '' }}">Cars List</a></li>
									</ul>
								</li>
                <li><a><i class="fa fa-desktop"></i> Testimonials <span class="fa fa-chevron-down"></span></a>
									<ul class="nav child_menu">
										<li><a href="{{ route('addTestimonial') }}" class="nav-item nav-link {{ request()->routeIs('addTestimonial') ? 'active' : '' }}">Add Testimonial</a></li>
										<li><a href="{{ route('testimonialsList') }}" class="nav-item nav-link {{ request()->routeIs('testimonialsList') ? 'active' : '' }}">Testimonials List</a></li>
									</ul>
								</li>
                <li><a><i class="fa fa-desktop"></i> Messages <span class="fa fa-chevron-down"></span></a>
									<ul class="nav child_menu">
										<li><a href="{{ route('messages') }}" class="nav-item nav-link {{ request()->routeIs('messages') ? 'active' : '' }}">Messages</a></li>
									</ul>
								</li>
							</ul>
						</div>

					</div>
					<!-- /sidebar menu -->
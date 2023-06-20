<div class="collapse" id="MobNav">
					<div class="dashboard-nav">
						<div class="dashboard-inner">
							<ul data-submenu-title="Main Navigation">
								<li><a href="{{ url('user/dashboard') }}"><i class="lni lni-dashboard mr-2"></i>Dashboard</a></li>
								<li><a href="{{ url('user/tenders') }}"><i class="lni lni-files mr-2"></i>Tenders</a></li>
								<li><a href="{{ url('user/bids') }}"><i class="lni lni-files mr-2"></i>My Bids</a></li>
								<li><a href="{{ url('user/messages') }}"><i class="lni lni-add-files mr-2"></i>Messages</a></li>
<!-- 								<li><a href="dashboard-manage-applications.html"><i class="lni lni-briefcase mr-2"></i>Manage Applicants</a></li>
								<li><a href="dashboard-shortlisted-resume.html"><i class="lni lni-bookmark mr-2"></i>BookmarkResumes<span class="count-tag bg-warning">4</span></a></li>
								<li><a href="dashboard-packages.html"><i class="lni lni-mastercard mr-2"></i>Packages</a></li>
								<li><a href="dashboard-messages.html"><i class="lni lni-envelope mr-2"></i>Messages<span class="count-tag">4</span></a></li> -->
							</ul>
							<ul data-submenu-title="My Accounts">
								<li><a href="{{ url('user/profile') }}"><i class="lni lni-user mr-2"></i>My Profile </a></li>
<!-- 								<li><a href="{{ url('user/change-password') }}"><i class="lni lni-lock-alt mr-2"></i>Change Password</a></li> -->
								<li><a href="{{ url('user/delete-user') }}" onclick="return confirm('Are you sure to delete this account. It can not be recovered then')" ><i class="lni lni-trash-can mr-2"></i>Delete Account</a></li>
								<li><a href="{{ url('logout') }}"><i class="lni lni-power-switch mr-2"></i>Log Out</a></li>
							</ul>
						</div>					
					</div>
				</div>
<header class="nav-top">
	<div class="container-fluid">
		<div class="row">
			<div class="col-lg-12 col-md-12 col-sm-12 col-sx-12">
				<a href="{{route('cms-home')}}" class="logo">
					{!!img("logo-cms.png", array("alt" => ""))!!}
				</a>
				<ul class="pull-right">
					<li>
						<button class="btn-menu"><i class="fa fa-bars" aria-hidden="true"></i></button>
					</li>					
					<li>
						<a href="{!!route('cms-user-show', [@Auth::user()->users_id])!!}">
							<i class="fa fa-user" aria-hidden="true"></i>
						</a>
					</li>					
					<li>
						<a href="{!!route('cms-auth-logout')!!}">
							<i class="fa fa-power-off" aria-hidden="true"></i>
						</a>
					</li>
				</ul>
			</div>
		</div>
	</div>
</header>
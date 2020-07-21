
@include('template_blog/header')
	<div class="section">
		<!-- container -->
		<div class="container">
			<!-- row -->
			<div class="row">
                @yield('content')
                @include('template_blog/widget')
            </div>
			<!-- /row -->
		</div>
		<!-- /container -->
	</div>
	<!-- /SECTION -->
@include('template_blog/footer')

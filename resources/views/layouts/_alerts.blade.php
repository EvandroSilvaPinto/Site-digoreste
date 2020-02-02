@if (Session::has('alert'))
    <div class="row">
    	<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
    		<div class="alert alert-{!!session('alert.code')!!}">
    			{!! session('alert.text') !!}
    		</div>
    	</div>
    </div>
@endif	
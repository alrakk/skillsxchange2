

@if (Session::has('flash_message'))
	<div class="alert alert-success">
		<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>

		<p class="alert-success"><b>{{Session::get('flash_message')}}</b></p>
		
	</div>
@endif
	
	
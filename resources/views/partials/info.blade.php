@if(Session::has('info'))    
    <li class="info-feedback">
        {{ Session::get('info') }}
    </li>
@endif

@if(Session::has('error'))
	<li class="invalid-feedback">
        {{ Session::get('error') }}
	</li>
@endif
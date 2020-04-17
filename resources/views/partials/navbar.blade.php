 <div class="nav">
	@if(!Auth::check())
	    <div class="navitem">
	    	<a href="{{ route('login') }}" class="btn"> {{ __('Login') }}</a>
	    </div>
	    <div class="navitem">
	    	<a href="{{ route('register') }}" class="btn"> {{ __('Register') }}</a>
	    </div>
	@else
<div class="navitem">
	    	<p class="welcometext">Hello, {{ Auth::user()->name }}</p>
	    </div>
        <div class="navitem">
			<form method="POST" action="{{ route('logout') }}">
				@csrf
				<button type="submit" class="btn">
					{{ __('Logout') }}
				</button>
			</form>
		</div>
	@endif
	<div class="navitem">
	    	<a href="{{ route('welcome') }}" class="btn"> {{ __('Home') }}</a>
	    </div>
	
</div>
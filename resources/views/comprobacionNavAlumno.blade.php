@if (Auth::check())
@include('nav')
@else	
	@include ('nav')
@endif	

@if (Auth::check())
	@include ('navAlumno')
@else	
	@include ('nav')
@endif	

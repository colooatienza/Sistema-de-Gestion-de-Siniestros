@if(Auth::guest())
   @include ('comprobacionNavAlumno')
@elseif (Auth::user()->rol_id == 1)
  @include('navBackend')
@elseif (Auth::user()->rol_id == 2)
   @include('navGestion') 
@elseif (Auth::user()->rol_id == 3) 
   @include ('comprobacionNavAlumno')  
@endif


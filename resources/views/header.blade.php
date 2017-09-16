@if(Auth::guest())
   @include('header3')
@elseif (Auth::user()->rol_id == 1)
  @include('header2')
@else (Auth::user()->rol_id == 2)
   @include('header2')
@endif

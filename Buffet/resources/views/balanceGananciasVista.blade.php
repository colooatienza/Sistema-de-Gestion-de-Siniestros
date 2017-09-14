<!DOCTYPE HTML>
<html>
	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
		<title>Ganancias</title>
        <link rel="stylesheet" href="{{asset('css\styleEscritorio.css')}}" >

        <link rel="icon" href="{{asset('images/logo.jpg')}}" type="image/jpg">
		<script type="text/javascript" src="{{asset('js/1.8.2/jquery.min.js')}}"></script>
		<script type="text/javascript">
$(function () {
    $('#container').highcharts({
        chart: {
            type: 'column'
        },
        title: {
            text: 'Balance de Ventas y Compras'
        },
        xAxis: {
            categories: [
                @foreach($ganancias as $item)
                    '{{ Carbon\Carbon::parse($item->fecha)->format("d-m-Y") }}',
                @endforeach
            ],
        },
        credits: {
        enabled: false
        },
        series: [{
            name: 'Ganancias',
            data: [@foreach($ganancias as $item) 
                    {{$item->cantidad}}, 
                   @endforeach
                   ]

        }]
    });
});
		</script>
	</head>
	<body>
   @include('header')
	@include('navGeneral')
     <div class="container">
   
    <div class="row text-center">
<script src="{{asset('js/highcharts.js')}}"></script>
<script src="{{asset('js/exporting.js')}}"></script>

<div id="container" style="min-width: 310px; height: 400px; margin: 0 auto"></div>
 </div>
  </div>
@include('footer')
	</body>
</html>

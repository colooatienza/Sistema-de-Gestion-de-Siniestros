<!DOCTYPE HTML>
<html>
	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
		<title>Ventas</title>
        <link rel="stylesheet" href="{{asset('css\styleEscritorio.css')}}" >

        <link rel="icon" href="{{asset('images/logo.jpg')}}" type="image/jpg">
		<script type="text/javascript" src="{{asset('js/1.8.2/jquery.min.js')}}"></script>
		<script type="text/javascript">
$(function () {
    $('#container').highcharts({
        chart: {
            plotBackgroundColor: null,
            plotBorderWidth: null,
            plotShadow: false,
            type: 'pie'
        },
        title: {
            text: 'Grafico de Tortas de Ventas'
        },
        tooltip: {
            pointFormat: '{series.name}: <b>{point.percentage:.1f}%</b>'
        },
        plotOptions: {
            pie: {
                allowPointSelect: true,
                cursor: 'pointer',
                dataLabels: {
                    enabled: true,
                    format: '<b>{point.name}</b>: {point.percentage:.1f} %',
                    style: {
                        color: (Highcharts.theme && Highcharts.theme.contrastTextColor) || 'black'
                    }
                }
            }
        },
        series: [{
            name: 'Brands',
            colorByPoint: true,
            data: [

                @foreach($productos as $item)
                {
                name: '{{ $item->nombre }}',
                y: {{$item->cantidad}}
                },
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

<div id="container" style="min-width: 310px; height: 400px; max-width: 600px; margin: 0 auto"></div>
     </div>
  </div>
@include('footer')
	</body>
</html>

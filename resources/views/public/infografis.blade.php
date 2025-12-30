@extends('layouts.app')

@section('content')
<div class="container mx-auto p-6">
    <h1 class="text-2xl font-bold mb-4">Infografis Publik</h1>
    <div id="chart-occupancy" style="height: 400px;" class="mb-8"></div>
    <div id="chart-guests" style="height: 400px;"></div>
</div>

<script src="https://code.highcharts.com/highcharts.js"></script>
<script>
document.addEventListener('DOMContentLoaded', function(){
    const occupancy = @json($occupancy);
    Highcharts.chart('chart-occupancy', {
        title: { text: 'Okupansi Bulanan' },
        xAxis: { categories: occupancy.months },
        series: [{ name: 'Okupansi (%)', data: occupancy.occupancyRates }]
    });

    const guests = @json($guests);
    Highcharts.chart('chart-guests', {
        title: { text: 'Jumlah Tamu Bulanan' },
        xAxis: { categories: guests.months },
        series: [{ name: 'Tamu', data: guests.count }]
    });
});
</script>
@endsection
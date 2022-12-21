@extends('layouts.main')
@section('component')
    <div class="row g-5 mt-2">
        <div class="col-md-8">
            <div style="height: 35vmax">
                <h5>{{ $data->title }} di {{ setting('site.title') }} Tahun {{ $charts->tahun }}
                </h5>
                <p></p>
                <canvas id="chartData" class="mb-5"></canvas>
            </div>
        </div>
        <div class="col-md-4">
            @include('sidemenu')
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <script>
        const chartData = document.getElementById('chartData');
        new Chart(chartData, {
            type: 'bar',
            data: {
                labels: ['Rumah Sakit', 'Puskesmas', 'Puskeslur', 'Praktik Dokter', 'Apotek'],
                datasets: [{
                    label: 'Jumlah',
                    data: [
                        {{ $charts->rumah_sakit }},
                        {{ $charts->puskesmas }},
                        {{ $charts->puskeslur }},
                        {{ $charts->praktik_dokter }},
                        {{ $charts->apotek }},
                    ],
                    backgroundColor: [
                        'rgb(54, 162, 235)',
                    ],
                    hoverOffset: 4,
                }]
            },
            options: {
                responsive: true,
                maintainAspectRatio: false,
            }
        });
    </script>
@endsection

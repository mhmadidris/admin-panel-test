@extends('layouts.store')

@section('title')
    Dashboard
@endsection

@section('content')
    <div class="container-fluid">
        <!-- Content Pesanan Row -->
        <div class="row">
            <h4 class="m-0 fw-bold text-white mb-2">Kondisi Barang</h4>
            <!-- Pesanan baru Card -->
            <div class="col-xl-3 col-md-6 mb-4">
                <div class="card border-left-primary shadow h-100 py-2 bg-header-footer text-white">
                    <div class="card-body">
                        <div class="row no-gutters align-items-center">
                            <div class="col mr-2">
                                <div class="fw-semibold m-0">
                                    Bagus
                                </div>
                                <div class="mb-0 h4 fw-bold my-1">
                                    {{ $bagusCatalogs }}
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Siap dikirim Card -->
            <div class="col-xl-3 col-md-6 mb-4">
                <div class="card border-left-primary shadow h-100 py-2 bg-header-footer text-white">
                    <div class="card-body">
                        <div class="row no-gutters align-items-center">
                            <div class="col mr-2">
                                <div class="fw-semibold m-0">
                                    Rusak
                                </div>
                                <div class="mb-0 h4 fw-bold my-1">
                                    {{ $rusakCatalogs }}
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Bank sampah Card -->
            <div class="col-xl-3 col-md-6 mb-4">
                <div class="card border-left-primary shadow h-100 py-2 bg-header-footer text-white">
                    <div class="card-body">
                        <div class="row no-gutters align-items-center">
                            <div class="col mr-2">
                                <div class="fw-semibold m-0">
                                    Perlu Perbaikan
                                </div>
                                <div class="mb-0 h4 fw-bold my-1">{{ $perluPerbaikanCatalogs }}</div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Ulasan Card -->
            <div class="col-xl-3 col-md-6 mb-4">
                <div class="card border-left-primary shadow h-100 py-2 bg-header-footer text-white">
                    <div class="card-body">
                        <div class="row no-gutters align-items-center">
                            <div class="col mr-2">
                                <div class="fw-semibold m-0">
                                    Dalam Perbaikan
                                </div>
                                <div class="mb-0 h4 fw-bold my-1">
                                    {{ $dalamPerbaikanCatalogs }}
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="card">
        <div class="card-header">Pie Chart</div>
        <div class="card-body">
            <canvas id="pieChart"></canvas>
        </div>
    </div>

    <script>
        document.addEventListener("DOMContentLoaded", function() {
            var ctx = document.getElementById('pieChart').getContext('2d');
            var pieChart = new Chart(ctx, {
                type: 'pie',
                data: {
                    labels: ['Bagus', 'Rusak', 'Perlu Perbaikan', 'Dalam Perbaikan'],
                    datasets: [{
                        data: [{{ $bagusCatalogs }}, {{ $rusakCatalogs }},
                            {{ $perluPerbaikanCatalogs }}, {{ $dalamPerbaikanCatalogs }}
                        ],
                        backgroundColor: ['#6EC175', '#FF6384', '#36A2EB', '#FFCE56'],
                        hoverBackgroundColor: ['#6EC175', '#FF6384', '#36A2EB', '#FFCE56']
                    }]
                },
                options: {
                    responsive: true
                }
            });
        });
    </script>
@endsection

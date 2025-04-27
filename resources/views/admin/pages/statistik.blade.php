@extends('layouts.admin')

@section('content')
    <div class="container mt-5">
        <h2 class="mb-4">Statistik Penerimaan Proposal</h2>

        {{-- Chart per Tahun --}}
        <div class="card mb-5">
            <div class="card-header bg-success text-white">Statistik Per Tahun</div>
            <div class="card-body">
                <canvas id="proposalYearChart" height="100"></canvas>
            </div>
        </div>

        {{-- Chart per Bulan --}}
        <div class="card mb-5">
            <div class="card-header bg-success text-white">Statistik Per Bulan</div>
            <div class="card-body">
                <canvas id="proposalMonthChart" height="100"></canvas>
            </div>
        </div>
    </div>
@endsection

@push('scripts')
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <script>
        const yearChart = document.getElementById('proposalYearChart').getContext('2d');
        const monthChart = document.getElementById('proposalMonthChart').getContext('2d');

        // Dummy data - bisa diganti nanti dari controller
        const years = ['2021', '2022', '2023', '2024'];
        const acceptedPerYear = [12, 18, 25, 20];
        const rejectedPerYear = [3, 6, 5, 7];

        const months = ['Jan', 'Feb', 'Mar', 'Apr', 'Mei', 'Jun', 'Jul', 'Agu', 'Sep', 'Okt', 'Nov', 'Des'];
        const acceptedPerMonth = [3, 5, 7, 6, 8, 4, 5, 6, 7, 8, 5, 4];
        const rejectedPerMonth = [1, 0, 2, 1, 0, 2, 1, 1, 0, 1, 2, 1];

        new Chart(yearChart, {
            type: 'bar',
            data: {
                labels: years,
                datasets: [
                    {
                        label: 'Diterima',
                        data: acceptedPerYear,
                        backgroundColor: 'rgba(40, 167, 69, 0.8)',
                    },
                    {
                        label: 'Ditolak',
                        data: rejectedPerYear,
                        backgroundColor: 'rgba(220, 53, 69, 0.6)',
                    }
                ]
            },
            options: {
                responsive: true,
                plugins: {
                    legend: {
                        position: 'top',
                    },
                    title: {
                        display: true,
                        text: 'Proposal Diterima vs Ditolak per Tahun'
                    }
                }
            }
        });

        new Chart(monthChart, {
            type: 'bar',
            data: {
                labels: months,
                datasets: [
                    {
                        label: 'Diterima',
                        data: acceptedPerMonth,
                        backgroundColor: 'rgba(40, 167, 69, 0.8)',
                    },
                    {
                        label: 'Ditolak',
                        data: rejectedPerMonth,
                        backgroundColor: 'rgba(220, 53, 69, 0.6)',
                    }
                ]
            },
            options: {
                responsive: true,
                plugins: {
                    legend: {
                        position: 'top',
                    },
                    title: {
                        display: true,
                        text: 'Proposal Diterima vs Ditolak per Bulan'
                    }
                }
            }
        });
    </script>
@endpush

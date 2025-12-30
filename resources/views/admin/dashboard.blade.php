@extends('layouts.admin')

@section('content')
<div class="container mx-auto px-4 py-6">
    <!-- Header -->
    <div class="mb-8">
        <div class="flex flex-col md:flex-row md:items-end md:justify-between gap-4">
            <div>
                <h1 class="text-2xl md:text-3xl font-bold text-gray-900">Dashboard</h1>
                <p class="text-gray-600 mt-1">Ringkasan statistik dan aktivitas terbaru</p>
            </div>
            <div class="flex items-center gap-2 text-sm">
                <svg class="w-4 h-4 text-gray-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z" />
                </svg>
                <span class="text-gray-700 font-medium" id="currentDate">{{ \Carbon\Carbon::parse($today)->format('d M Y') }}</span>
            </div>
        </div>
    </div>
    
    <!-- Chart Section -->
    <div class="bg-white border border-gray-200 rounded-xl shadow-sm overflow-hidden mb-8">
        <div class="p-6">
            <div class="flex flex-col sm:flex-row sm:items-center sm:justify-between gap-4 mb-6">
                <div>
                    <h2 id="chartTitle" class="text-lg font-bold text-gray-900">Grafik Reservasi (30 Hari Terakhir)</h2>
                    <p class="text-sm text-gray-600 mt-1">Trend pemesanan dalam satu bulan terakhir</p>
                </div>
                <div class="flex gap-2">
                    <button id="chart30Days" class="px-3 py-1.5 bg-blue-600 text-white text-sm font-medium rounded-lg">30 Hari</button>
                    <button id="chart7Days" class="px-3 py-1.5 bg-gray-100 text-gray-700 text-sm font-medium rounded-lg hover:bg-gray-200">7 Hari</button>
                    <button id="chart90Days" class="px-3 py-1.5 bg-gray-100 text-gray-700 text-sm font-medium rounded-lg hover:bg-gray-200">90 Hari</button>
                </div>
            </div>
            
            <div id="bookingChart" style="min-height: 400px;"></div>
            
            <div class="mt-6 pt-6 border-t border-gray-100">
                <div class="flex items-center justify-center gap-4 text-sm text-gray-500">
                    <div class="flex items-center gap-2">
                        <div class="w-3 h-3 bg-blue-500 rounded-full"></div>
                        <span>Total Reservasi</span>
                    </div>
                    <div class="flex items-center gap-2">
                        <div class="w-3 h-3 bg-gray-300 rounded-full"></div>
                        <span>Target Harian</span>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- KPI Cards Grid -->
    <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-6 mb-8">
        <!-- Today Bookings -->
        <a href="/admin/bookings" class="group">
            <div class="bg-white border border-gray-200 rounded-xl p-6 shadow-sm hover:shadow-md transition-all duration-200 group-hover:border-blue-500">
                <div class="flex items-center justify-between mb-4">
                    <div class="p-3 bg-gradient-to-br from-blue-100 to-blue-50 rounded-lg">
                        <svg class="w-6 h-6 text-blue-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2" />
                        </svg>
                    </div>
                    <span class="text-xs font-medium text-blue-600 bg-blue-50 px-2 py-1 rounded-full">Hari Ini</span>
                </div>
                <p class="text-sm text-gray-600 mb-2">Reservasi Hari Ini</p>
                <p id="todayBookings" class="text-3xl font-bold text-gray-900">{{ $todayBookings }}</p>
                <div class="mt-4 pt-4 border-t border-gray-100">
                    <div class="flex items-center gap-1 text-xs text-green-600">
                        <svg class="w-3 h-3" fill="currentColor" viewBox="0 0 20 20">
                            <path fill-rule="evenodd" d="M5.293 9.707a1 1 0 010-1.414l4-4a1 1 0 011.414 0l4 4a1 1 0 01-1.414 1.414L11 7.414V15a1 1 0 11-2 0V7.414L6.707 9.707a1 1 0 01-1.414 0z" clip-rule="evenodd" />
                        </svg>
                        <span>+12% dari kemarin</span>
                    </div>
                </div>
            </div>
        </a>

        <!-- Pending Cancellations -->
        <a href="/admin/cancellations" class="group">
            <div class="bg-white border border-gray-200 rounded-xl p-6 shadow-sm hover:shadow-md transition-all duration-200 group-hover:border-red-500">
                <div class="flex items-center justify-between mb-4">
                    <div class="p-3 bg-gradient-to-br from-red-100 to-red-50 rounded-lg">
                        <svg class="w-6 h-6 text-red-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M18.364 18.364A9 9 0 005.636 5.636m12.728 12.728A9 9 0 015.636 5.636m12.728 12.728L5.636 5.636" />
                        </svg>
                    </div>
                    <span class="text-xs font-medium text-red-600 bg-red-50 px-2 py-1 rounded-full">Menunggu</span>
                </div>
                <p class="text-sm text-gray-600 mb-2">Pembatalan Menunggu</p>
                <p id="pendingCancel" class="text-3xl font-bold text-gray-900">{{ $pendingCancel }}</p>
                <div class="mt-4 pt-4 border-t border-gray-100">
                    <div class="flex items-center gap-1 text-xs text-gray-500">
                        <svg class="w-3 h-3" fill="currentColor" viewBox="0 0 20 20">
                            <path fill-rule="evenodd" d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z" clip-rule="evenodd" />
                        </svg>
                        <span>Perlu konfirmasi</span>
                    </div>
                </div>
            </div>
        </a>

        <!-- Today Revenue -->
        <div class="bg-white border border-gray-200 rounded-xl p-6 shadow-sm">
            <div class="flex items-center justify-between mb-4">
                <div class="p-3 bg-gradient-to-br from-green-100 to-green-50 rounded-lg">
                    <svg class="w-6 h-6 text-green-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8c-1.657 0-3 .895-3 2s1.343 2 3 2 3 .895 3 2-1.343 2-3 2m0-8c1.11 0 2.08.402 2.599 1M12 8V7m0 1v8m0 0v1m0-1c-1.11 0-2.08-.402-2.599-1M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
                    </svg>
                </div>
                <span class="text-xs font-medium text-green-600 bg-green-50 px-2 py-1 rounded-full">Hari Ini</span>
            </div>
            <p class="text-sm text-gray-600 mb-2">Pendapatan Hari Ini</p>
            <p id="todayRevenue" class="text-3xl font-bold text-gray-900">Rp{{ number_format($todayRevenue) }}</p>
            <div class="mt-4 pt-4 border-t border-gray-100">
                <div class="flex items-center gap-1 text-xs text-green-600">
                    <svg class="w-3 h-3" fill="currentColor" viewBox="0 0 20 20">
                        <path fill-rule="evenodd" d="M5.293 9.707a1 1 0 010-1.414l4-4a1 1 0 011.414 0l4 4a1 1 0 01-1.414 1.414L11 7.414V15a1 1 0 11-2 0V7.414L6.707 9.707a1 1 0 01-1.414 0z" clip-rule="evenodd" />
                    </svg>
                    <span>+8% dari kemarin</span>
                </div>
            </div>
        </div>

        <!-- Total Revenue -->
        <div class="bg-white border border-gray-200 rounded-xl p-6 shadow-sm">
            <div class="flex items-center justify-between mb-4">
                <div class="p-3 bg-gradient-to-br from-purple-100 to-purple-50 rounded-lg">
                    <svg class="w-6 h-6 text-purple-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 9V7a2 2 0 00-2-2H5a2 2 0 00-2 2v6a2 2 0 002 2h2m2 4h10a2 2 0 002-2v-6a2 2 0 00-2-2H9a2 2 0 00-2 2v6a2 2 0 002 2zm7-5a2 2 0 11-4 0 2 2 0 014 0z" />
                    </svg>
                </div>
                <span class="text-xs font-medium text-purple-600 bg-purple-50 px-2 py-1 rounded-full">Keseluruhan</span>
            </div>
            <p class="text-sm text-gray-600 mb-2">Total Pendapatan</p>
            <p id="totalRevenue" class="text-3xl font-bold text-gray-900">Rp{{ number_format($totalRevenue) }}</p>
            <div class="mt-4 pt-4 border-t border-gray-100">
                <div class="flex items-center gap-1 text-xs text-green-600">
                    <svg class="w-3 h-3" fill="currentColor" viewBox="0 0 20 20">
                        <path fill-rule="evenodd" d="M5.293 9.707a1 1 0 010-1.414l4-4a1 1 0 011.414 0l4 4a1 1 0 01-1.414 1.414L11 7.414V15a1 1 0 11-2 0V7.414L6.707 9.707a1 1 0 01-1.414 0z" clip-rule="evenodd" />
                    </svg>
                    <span>+15% bulan ini</span>
                </div>
            </div>
        </div>
    </div>

        </div>
    </div>
</div>

<!-- Highcharts -->
<script src="https://code.highcharts.com/highcharts.js"></script>
<script src="https://code.highcharts.com/modules/exporting.js"></script>
<script src="https://code.highcharts.com/modules/export-data.js"></script>
<script src="https://code.highcharts.com/modules/accessibility.js"></script>

<script>
// Prepare chart data
const chartDataDates = {!! json_encode($chartData->pluck('date')->toArray()) !!};
const chartDataTotals = {!! json_encode($chartData->pluck('total')->toArray()) !!};

// Initialize Highcharts with responsive configuration
let currentChartDays = 30;

function initChart(dates, totals, days = 30) {
    return Highcharts.chart('bookingChart', {
        chart: {
            type: 'spline',
            backgroundColor: 'transparent',
            height: 400,
            spacing: [20, 10, 15, 10]
        },
        title: {
            text: null
        },
        xAxis: {
            categories: dates,
            crosshair: true,
            type: 'category',
            labels: {
                style: {
                    fontSize: '11px',
                    color: '#6b7280'
                }
            },
            gridLineWidth: 1,
            gridLineColor: '#f3f4f6'
        },
        yAxis: {
            title: {
                text: 'Jumlah Reservasi',
                style: {
                    color: '#6b7280',
                    fontSize: '12px'
                }
            },
            min: 0,
            gridLineColor: '#f3f4f6',
            labels: {
                style: {
                    color: '#6b7280',
                    fontSize: '11px'
                }
            },
            plotLines: [{
                value: 5, // Target harian
                color: '#9ca3af',
                width: 1,
                dashStyle: 'dash',
                label: {
                    text: 'Target',
                    align: 'right',
                    style: {
                        color: '#9ca3af',
                        fontSize: '10px'
                    }
                }
            }]
        },
        tooltip: {
            backgroundColor: 'rgba(255, 255, 255, 0.95)',
            borderColor: '#e5e7eb',
            borderRadius: 8,
            borderWidth: 1,
            shadow: true,
            useHTML: true,
            formatter: function() {
                return `
                    <div class="text-sm">
                        <div class="font-semibold text-gray-900 mb-1">${this.x}</div>
                        <div class="flex items-center gap-2">
                            <div class="w-3 h-3 bg-blue-500 rounded-full"></div>
                            <span class="text-gray-700">Reservasi: <span class="font-bold text-gray-900">${this.y}</span></span>
                        </div>
                    </div>
                `;
            }
        },
        plotOptions: {
            spline: {
                lineWidth: 3,
                states: {
                    hover: {
                        lineWidth: 4
                    }
                },
                marker: {
                    enabled: true,
                    radius: 5,
                    symbol: 'circle',
                    fillColor: '#ffffff',
                    lineWidth: 2,
                    lineColor: null // inherit from series color
                },
                dataLabels: {
                    enabled: false
                }
            }
        },
        series: [{
            name: 'Total Reservasi',
            data: totals,
            color: '#3b82f6',
            marker: {
                lineColor: '#3b82f6'
            }
        }, {
            name: 'Target Harian',
            data: totals.map(() => 5), // Static target line
            color: '#9ca3af',
            dashStyle: 'dash',
            marker: {
                enabled: false
            },
            enableMouseTracking: false
        }],
        legend: {
            enabled: true,
            align: 'center',
            verticalAlign: 'bottom',
            layout: 'horizontal',
            itemStyle: {
                color: '#6b7280',
                fontSize: '12px'
            }
        },
        credits: {
            enabled: false
        },
        exporting: {
            enabled: true,
            buttons: {
                contextButton: {
                    menuItems: ['viewFullscreen', 'printChart', 'separator', 'downloadPNG', 'downloadJPEG', 'downloadPDF', 'downloadSVG']
                }
            }
        },
        responsive: {
            rules: [{
                condition: {
                    maxWidth: 640
                },
                chartOptions: {
                    chart: {
                        height: 350
                    },
                    legend: {
                        layout: 'horizontal',
                        align: 'center',
                        verticalAlign: 'bottom'
                    },
                    xAxis: {
                        labels: {
                            rotation: -45
                        }
                    }
                }
            }]
        }
    });
}

// Initialize chart
let bookingChart = initChart(chartDataDates, chartDataTotals);

// Chart period buttons
document.getElementById('chart30Days').addEventListener('click', function() {
    updateChartPeriod(30);
    updateActiveButton(this);
});

document.getElementById('chart7Days').addEventListener('click', function() {
    updateChartPeriod(7);
    updateActiveButton(this);
});

document.getElementById('chart90Days').addEventListener('click', function() {
    updateChartPeriod(90);
    updateActiveButton(this);
});

function updateActiveButton(activeButton) {
    document.querySelectorAll('#bookingChart ~ div button').forEach(btn => {
        btn.classList.remove('bg-blue-600', 'text-white');
        btn.classList.add('bg-gray-100', 'text-gray-700', 'hover:bg-gray-200');
    });
    activeButton.classList.remove('bg-gray-100', 'text-gray-700', 'hover:bg-gray-200');
    activeButton.classList.add('bg-blue-600', 'text-white');
}

function updateChartPeriod(days) {
    currentChartDays = days;
    
    // Update title
    const titleElement = document.getElementById('chartTitle');
    let titleText = 'Grafik Reservasi';
    let subtitleText = 'Trend pemesanan';
    
    if (days === 7) {
        titleText += ' (7 Hari Terakhir)';
        subtitleText += ' dalam satu minggu terakhir';
    } else if (days === 30) {
        titleText += ' (30 Hari Terakhir)';
        subtitleText += ' dalam satu bulan terakhir';
    } else if (days === 90) {
        titleText += ' (90 Hari Terakhir)';
        subtitleText += ' dalam tiga bulan terakhir';
    }
    
    titleElement.textContent = titleText;
    titleElement.nextElementSibling.textContent = subtitleText;
    
    fetch(`/admin/dashboard/chart-data?days=${days}`, {
        headers: { 'Accept': 'application/json' }
    })
    .then(r => r.json())
    .then(data => {
        if (data.dates && data.totals) {
            bookingChart.update({
                xAxis: {
                    categories: data.dates
                },
                series: [{
                    data: data.totals
                }, {
                    data: data.totals.map(() => 5)
                }]
            });
        }
    })
    .catch(e => console.error('Chart update error:', e));
}

// Load recent bookings
function loadRecentBookings() {
    fetch('/admin/dashboard/recent-bookings', {
        headers: { 'Accept': 'application/json' }
    })
    .then(r => r.json())
    .then(data => {
        const container = document.getElementById('recentBookings');
        if (data.length === 0) {
            container.innerHTML = '<p class="text-gray-500 text-center py-8">Belum ada reservasi</p>';
            return;
        }
        
        let html = '';
        data.forEach(booking => {
            let statusColor = 'bg-blue-100 text-blue-800';
            if (booking.status === 'pending') statusColor = 'bg-yellow-100 text-yellow-800';
            if (booking.status === 'cancelled') statusColor = 'bg-red-100 text-red-800';
            
            html += `
                <div class="flex items-center justify-between py-4 border-b border-gray-100 last:border-0">
                    <div class="flex items-center gap-3">
                        <div class="w-10 h-10 bg-gradient-to-br from-blue-50 to-blue-100 rounded-lg flex items-center justify-center">
                            <svg class="w-5 h-5 text-blue-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z" />
                            </svg>
                        </div>
                        <div>
                            <p class="font-medium text-gray-900 text-sm">${booking.guest_name}</p>
                            <p class="text-xs text-gray-500">${booking.service_name}</p>
                        </div>
                    </div>
                    <div class="text-right">
                        <span class="inline-block px-2 py-1 text-xs font-medium rounded-full ${statusColor}">
                            ${booking.status_label}
                        </span>
                        <p class="text-xs text-gray-500 mt-1">${booking.created_at_formatted}</p>
                    </div>
                </div>
            `;
        });
        container.innerHTML = html;
    })
    .catch(e => console.error('Error loading recent bookings:', e));
}

// Load top services
function loadTopServices() {
    fetch('/admin/dashboard/top-services', {
        headers: { 'Accept': 'application/json' }
    })
    .then(r => r.json())
    .then(data => {
        const container = document.getElementById('topServices');
        if (data.length === 0) {
            container.innerHTML = '<p class="text-gray-500 text-center py-8">Belum ada data layanan</p>';
            return;
        }
        
        let html = '';
        data.forEach((service, index) => {
            const percentage = Math.round((service.booking_count / data[0].booking_count) * 100);
            html += `
                <div class="flex items-center justify-between py-4 border-b border-gray-100 last:border-0">
                    <div class="flex items-center gap-3">
                        <div class="w-8 h-8 flex items-center justify-center">
                            <span class="text-sm font-bold text-gray-400">${index + 1}</span>
                        </div>
                        <div class="flex-1">
                            <p class="font-medium text-gray-900 text-sm">${service.name}</p>
                            <div class="mt-1 flex items-center gap-2">
                                <div class="flex-1 h-1.5 bg-gray-200 rounded-full overflow-hidden">
                                    <div class="h-full bg-gradient-to-r from-blue-500 to-indigo-500 rounded-full" style="width: ${percentage}%"></div>
                                </div>
                                <span class="text-xs text-gray-500">${service.booking_count} booking</span>
                            </div>
                        </div>
                    </div>
                    <div class="text-right">
                        <p class="text-sm font-semibold text-gray-900">Rp${parseInt(service.total_revenue).toLocaleString('id-ID')}</p>
                    </div>
                </div>
            `;
        });
        container.innerHTML = html;
    })
    .catch(e => console.error('Error loading top services:', e));
}

// Real-time dashboard updates
let dashboardRefreshInterval;

function updateDashboard() {
    fetch('{{ route("admin.dashboard.data") }}', {
        headers: { 'Accept': 'application/json' }
    })
    .then(r => r.json())
    .then(data => {
        // Update KPI cards with animation
        const updateCard = (elementId, newValue, isCurrency = false) => {
            const element = document.getElementById(elementId);
            if (element) {
                let formattedValue = isCurrency ? 'Rp' + new Intl.NumberFormat('id-ID').format(newValue) : newValue;
                if (element.textContent !== formattedValue) {
                    element.textContent = formattedValue;
                    element.classList.add('animate-pulse');
                    setTimeout(() => element.classList.remove('animate-pulse'), 500);
                }
            }
        };

        updateCard('todayBookings', data.todayBookings);
        updateCard('pendingCancel', data.pendingCancel);
        updateCard('todayRevenue', data.todayRevenue, true);
        updateCard('totalRevenue', data.totalRevenue, true);

        // Update date
        const currentDateEl = document.getElementById('currentDate');
        if (currentDateEl && data.today) {
            const date = new Date(data.today);
            const dateStr = date.toLocaleDateString('id-ID', { 
                day: 'numeric', 
                month: 'short', 
                year: 'numeric' 
            });
            currentDateEl.textContent = dateStr;
        }
    })
    .catch(e => console.error('Dashboard update error:', e));
}

// Initialize everything
document.addEventListener('DOMContentLoaded', function() {
    loadRecentBookings();
    loadTopServices();
    updateDashboard();
    
    dashboardRefreshInterval = setInterval(updateDashboard, 30000); // 30 seconds
});

// Clean up on page unload
window.addEventListener('beforeunload', function() {
    if (dashboardRefreshInterval) {
        clearInterval(dashboardRefreshInterval);
    }
});
</script>

<style>
.highcharts-credits {
    display: none !important;
}

.highcharts-background {
    fill: transparent !important;
}

.highcharts-container {
    border-radius: 8px;
}

.highcharts-tooltip-box {
    fill: rgba(255, 255, 255, 0.95) !important;
    stroke: #e5e7eb !important;
    stroke-width: 1px !important;
}

.highcharts-exporting-group {
    display: none !important;
}
</style>
@endsection
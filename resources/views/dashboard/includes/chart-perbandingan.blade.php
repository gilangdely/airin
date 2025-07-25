<div class="card-body">
    <div id="grafikperbandingan_{{ $selectedYear }}"></div>
</div>

<script>
    var chartElementId = "grafikperbandingan_{{ $selectedYear }}";

    var options = {
        chart: {
            type: 'bar',
            height: 400,
            width: '100%', // agar chart mengikuti lebar container
            toolbar: {
                show: true,
                tools: {
                    download: true
                },
                export: {
                     csv: { filename: 'Tagihan_vs_Pembayaran_per_Bulan_{{ $selectedYear }}' },
                    svg: { filename: 'Tagihan_vs_Pembayaran_per_Bulan_{{ $selectedYear }}' },
                    png: { filename: 'Tagihan_vs_Pembayaran_per_Bulan_{{ $selectedYear }}' }
                }
            }
        },
        responsive: [{
            breakpoint: 768,
            options: {
                chart: {
                    height: 300
                },
                plotOptions: {
                    bar: {
                        horizontal: true
                    }
                },
                legend: {
                    position: 'bottom'
                }
            }
        }],
        series: [{
            name: 'Tagihan',
            data: @json($dataTagihan)
        }, {
            name: 'Pembayaran',
            data: @json($dataPembayaran)
        }],
        plotOptions: {
            bar: {
                columnWidth: '50%',
                distributed: false
            }
        },
        xaxis: {
            categories: @json($bulanLabels),
            labels: {
                rotate: -45
            },
            title: {
                text: 'Bulan'
            }
        },
        yaxis: {
            title: {
                text: 'Jumlah'
            },
            labels: {
                formatter: function(val) {
                    return val.toLocaleString('id-ID');
                }
            }
        },
        dataLabels: {
            enabled: true,
            formatter: function(val) {
                return val.toLocaleString('id-ID');
            }
        },
        title: {
            text: 'Perbandingan Tagihan dan Pembayaran per Bulan ({{ $selectedYear }})',
            align: 'center'
        },
        legend: {
            position: 'top',
            horizontalAlign: 'center'
        }
    };

    new ApexCharts(document.querySelector('#' + chartElementId), options).render();
</script>

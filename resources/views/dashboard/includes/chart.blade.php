<div class="card-body">
    <div id="grafikPembayaran_{{ $selectedYear }}" class="w-100"></div>
</div>

<script>
    var chartElementId = "grafikPembayaran_{{ $selectedYear }}";

    var options = {
        chart: {
            type: 'bar',
            height: 400,
            toolbar: {
                show: true,
                tools: {
                    download: true
                },
                export: {
                    csv: { filename: 'Total_Pembayaran_per_Bulan_{{ $selectedYear }}' },
                    svg: { filename: 'Total_Pembayaran_per_Bulan_{{ $selectedYear }}' },
                    png: { filename: 'Total_Pembayaran_per_Bulan_{{ $selectedYear }}' }
                }
            }
        },
        series: [{
            name: 'Total Pembayaran',
            data: @json($grafikData)
        }],
        xaxis: {
            categories: @json($bulanLabels),
            title: { text: 'Bulan' }
        },
        yaxis: {
            title: { text: 'Jumlah Pembayaran (Rp)' },
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
            text: 'Total Pembayaran per Bulan ({{ $selectedYear }})',
            align: 'center'
        },

        responsive: [
            {
                breakpoint: 992, // Tablet dan ke bawah
                options: {
                    chart: {
                        height: 350
                    },
                    xaxis: {
                        labels: {
                            rotate: -45
                        }
                    }
                }
            },
            {
                breakpoint: 576, // Mobile
                options: {
                    chart: {
                        height: 300
                    },
                    plotOptions: {
                        bar: {
                            horizontal: true
                        }
                    },
                    xaxis: {
                        labels: {
                            rotate: 0
                        }
                    },
                    title: {
                        style: {
                            fontSize: '14px'
                        }
                    },
                    dataLabels: {
                        style: {
                            fontSize: '10px'
                        }
                    }
                }
            }
        ]
    };

    new ApexCharts(document.querySelector('#' + chartElementId), options).render();
</script>

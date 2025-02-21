<x-layout.app title="Cetak Kartu" activeMenu="meteran.create" :withError="false">
    @push('style')
        <style>
            .kartudepan{
                background-image: url("{{ asset('assets/img/card/depan.png') }}");
                height: 56.6mm;
                width: 89.6mm;
                background-size: 100% 100%;
                border: 1px solid grey;
                padding: 15px;
                display: flex;
            }
            .kartudepan .kol-1{
                width: 30%;
                height: 100%;
                background-color: rgba(255,0,0,.5);
                display: flex; 
                align-items: center;
            }
            .kartudepan .kol-2{
                width: 55%;
                height: 100%;
                background-color: rgba(0,255,0,.5);
                margin-left: 40px;
                display: flex; 
            }
            .kartudepan .kol-1 .qrcode{
                width: 90px;
                height: 90px;
                background-color: white;
            }
            .kartudepan .kol-2 .baris-1{
                width: 100%;
                height: 15%;
                background: rgba(255,0,0,.5);
                display: flex;
                justify-content: center;
            }
            .kartudepan .kol-2 .baris-1 .logo-kartu{
                width: 20px;
                height: 20px;
            }

            .kartubelakang{
                background-image: url("{{ asset('assets/img/card/belakang.png') }}");
                height: 56.6mm;
                width: 89.6mm;
                background-size: 100% 100%;
                border: 1px solid grey;
            }
        </style>
    @endpush
    <div class="container my-5">
        <x-breadcrumb title="Cetak Kartu" :breadcrumbs="[
            ['label' => 'Dashboard', 'url' => url('/')],
            ['label' => 'Meteran', 'url' => route('meteran.index')],
            ['label' => 'Cetak Kartu'],
        ]" />

        <div class="card">
            <div class="card-body">
                <div class="row">
                    <div class="col-md-6">
                        <div class="kartudepan">
                            <div class="kol-1">
                                <div class="qrcode">

                                </div>
                            </div>
                            <div class="kol-2">
                                <div class="baris-1">
                                    <div class="wrapper">
                                        <img src="{{ asset('assets/img/logo/Airin-Logo.png') }}" alt="Logo Airin" class="logo-kartu">
                                        <p>Airin</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="kartubelakang">
    
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-layout.app>

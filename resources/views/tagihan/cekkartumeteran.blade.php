<x-layout.app title="Cek Kartu Meteran" activeMenu="tagihan.show" :withError="true">
    <div class="container my-5">
        <x-breadcrumb title="Cek Kartu Meteran" :breadcrumbs="[
            ['label' => 'Dashboard', 'url' => url('/')],
            ['label' => 'Tagihan', 'url' => route('tagihan.index')],
            ['label' => 'Cek Kartu Meteran'],
        ]" />

        <div class="card">
            <div class="card-body">
                
            </div>
        </div>
    </div>

</x-layout.app>

<x-main>
    @section('main')
        <x-navbar></x-navbar>
        <div class="container my-4">
            <div class="row">

                {{-- sidebar --}}
                <x-sidebar></x-sidebar>
                    <div class="col-lg-9">
                        <h1>HALAMAN PASIEN</h1>
                    </div>

            </div>
        </div>

    @endsection
</x-main>

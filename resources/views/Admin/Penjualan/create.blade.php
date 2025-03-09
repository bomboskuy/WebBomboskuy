@extends('Layout.Admin')
@section('content-title', 'Tambah Penjualan')
@section('content')

    <a href="{{ route('penjualan.index') }}" class="btn-outline-primary">Back</a>

    <div class="mt-3" x-data="penjualanData()">
        <form action="{{ route('penjualan.store') }}" method="POST">
            @csrf

            <div class="mb-4">
                <label for="tanggal_pembelian" class="block text-sm font-medium">Tanggal Pembelian</label>
                <input type="date" name="tanggal_pembelian" id="tanggal_pembelian"
                    class="mt-1 block w-full p-2 border border-gray-700 bg-black rounded-md text-white">
            </div>

            <div class="mb-4">
                <label for="tipe_penjualan" class="block text-sm font-medium">Tipe Penjualan</label>
                <select name="tipe_penjualan" id="tipe_penjualan" x-model="tipe_penjualan"
                    class="mt-1 block w-full p-2 border border-gray-700 bg-black rounded-md text-white">
                    <option value="">Pilih</option>
                    @foreach ($tipe_penjualan as $item)
                        <option value="{{ $item->nama_penjualan }}">{{ $item->nama_penjualan }}</option>
                    @endforeach
                </select>
            </div>

            <div class="mb-4">
                <label for="jumlah_bomboloni" class="block text-sm font-medium">Jumlah Bomboloni</label>
                <input type="number" name="jumlah_bomboloni" id="jumlah_bomboloni" x-model="jumlah_bomboloni"
                    class="mt-1 block w-full p-2 border border-gray-700 bg-black rounded-md text-white">
            </div>

            <div x-data="rupiahFormatter()">
                <div class="grid grid-cols-3 gap-4 mb-4">
                    <div>
                        <label for="hpp" class="block text-sm font-medium">
                            HPP <span class="text-sm text-gray-600">*Harga Pokok Produk</span>
                        </label>
                        <input type="text" id="hpp" x-model="hpp"
                            x-on:input="hpp = formatRupiah($event.target.value)" x-on:blur="hpp = formatRupiah(hpp, true)"
                            class="mt-1 block w-full p-2 border border-gray-700 bg-black rounded-md text-white">
                    </div>
                </div>
            </div>

            <div x-data="{ diskon: '' }">
                <div class="mb-4">
                    <label for="diskon" class="block text-sm font-medium">Diskon</label>
                    <select name="diskon" id="diskon" x-model="diskon"
                        class="mt-1 block w-full p-2 border border-gray-700 bg-black rounded-md text-white">
                        <option value="">Tanpa Diskon</option>
                        <option value="1">Persen</option>
                        <option value="2">Produk</option>
                    </select>
                </div>

                <!-- Input untuk Diskon Persen -->
                <div class="mb-4" x-show="diskon === '1'" x-transition>
                    <label for="persen" class="block text-sm font-medium">Diskon Persen (%)</label>
                    <input type="number" name="persen" id="persen"
                        class="mt-1 block w-full p-2 border border-gray-700 bg-black rounded-md text-white"
                        placeholder="Masukkan persentase diskon">
                </div>

                <!-- Input untuk Diskon Produk -->
                <div class="mb-4" x-show="diskon === '2'" x-transition>
                    <label for="produk" class="block text-sm font-medium">Produk Gratis</label>
                    <input type="text" name="produk" id="produk"
                        class="mt-1 block w-full p-2 border border-gray-700 bg-black rounded-md text-white"
                        placeholder="Masukkan nama produk gratis">
                </div>
            </div>


            {{-- detail penjualan card --}}
            <div class="card bg-zinc-900 my-10 p-6 rounded-md">
                <div class="list flex flex-row justify-between items-center">
                    <p>Tipe Penjualan</p>
                    <p x-text="tipe_penjualan || '.......'"></p>
                </div>
                <div class="list flex flex-row justify-between items-center">
                    <p>Jumlah Bomboloni</p>
                    <p x-text="jumlah_bomboloni || '.......'"></p>
                </div>
                <div class="list flex flex-row justify-between items-center">
                    <p>Harga Pokok Produk</p>
                    <p x-text="hpp || '.......'"></p>
                </div>
                <div class="list flex flex-col mt-3">
                    <p class="font-bold">NET PROFIT</p>
                    <p class="text-green-600" x-text="hpp ? 'Rp ' + hpp : 'Rp.xxx.xxxx'"></p>
                </div>
            </div>



            <div class="mb-4">
                <label for="status" class="block text-sm font-medium">Status</label>
                <select name="status" id="status"
                    class="mt-1 block w-full p-2 border border-gray-700 bg-black rounded-md text-white">
                    <option value="Belum Dibayar">Belum Dibayar</option>
                    <option value="Belum Lunas">Belum Lunas</option>
                    <option value="Lunas">Lunas</option>
                    <option value="Reimburse">Reimburse</option>
                </select>
            </div>

            <div class="mb-4">
                <label for="keterangan" class="block text-sm font-medium">Keterangan</label>
                <textarea name="keterangan" id="keterangan" rows="3"
                    class="mt-1 block w-full p-2 border border-gray-700 bg-black rounded-md text-white"></textarea>
            </div>

            <button type="submit" class="w-full bg-yellow-600 hover:bg-yellow-700 text-white py-2 rounded-md transition">
                Simpan Penjualan
            </button>
        </form>
    </div>

    <script>
        function penjualanData() {
            return {
                tipe_penjualan: '',
                jumlah_bomboloni: '',
                hpp: '',
                tanggal_pembelian: ''
            };
        }


        function rupiahFormatter() {
            return {
                hpp: '',
                omzet: '',
                formatRupiah(value, withCurrency = false) {
                    value = value.replace(/\D/g, ''); // Hanya angka

                    if (value === '') return ''; // Jika kosong, return kosong

                    let formatted = new Intl.NumberFormat('id-ID').format(parseInt(value));

                    return withCurrency ? `Rp ${formatted},00` : formatted; // Tambahkan "Rp" hanya saat blur
                }
            }
        }
    </script>

@endsection

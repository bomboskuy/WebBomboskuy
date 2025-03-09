@extends('Layout.Admin')
@section('content-title', 'Penjualan')
@section('content')

    {{-- header --}}
    <div class="flex flex-row my-3">
        <a href="{{ route('penjualan.create') }}" class="btn-outline-primary"><i class="fa-solid fa-plus"></i> Penjualan</a>
    </div>

    <div class="w-full py-2 align-middle">
        <div class="overflow-hidden border border-gray-200 dark:border-gray-700 md:rounded-lg">

            <table class="min-w-full divide-y divide-gray-200 dark:divide-gray-700">
                <thead class="bg-black">
                    <tr>
                        <th scope="col" class="relative py-3.5 px-4"></th>

                        <th scope="col"
                            class="py-3.5 px-4 text-sm font-normal text-left rtl:text-right text-gray-500 dark:text-gray-400">
                            <button class="flex items-center gap-x-3 focus:outline-none">
                                <span>Tanggal</span>
                            </button>
                        </th>

                        <th scope="col"
                            class="px-12 py-3.5 text-sm font-normal text-left rtl:text-right text-gray-500 dark:text-gray-400">
                            Tipe Penjualan
                        </th>

                        <th scope="col"
                            class="px-4 py-3.5 text-sm font-normal text-left rtl:text-right text-gray-500 dark:text-gray-400">
                            About
                        </th>

                        <th scope="col"
                            class="px-4 py-3.5 text-sm font-normal text-left rtl:text-right text-gray-500 dark:text-gray-400">
                            Pembeli</th>

                        <th scope="col"
                            class="px-4 py-3.5 text-sm font-normal text-left rtl:text-right text-gray-500 dark:text-gray-400">
                            License use</th>

                        <th scope="col" class="relative py-3.5 px-4">
                            <span class="sr-only">Edit</span>
                        </th>
                    </tr>
                </thead>
                <tbody class="bg-white divide-y divide-gray-200 dark:divide-gray-700 dark:bg-black">
                    @if ($penjualan->isEmpty())
                        <tr>
                            <td colspan="6" class="text-center py-5 text-zinc-600">Belum ada Data</td>
                        </tr>
                    @else
                        <tr></tr>
                    @endif
                </tbody>
            </table>

        </div>
    </div>



@endsection

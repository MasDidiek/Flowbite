@extends('layouts.app')

@section('content')



    <div class="p-4 sm:ml-64 bg-gray-50">


        <nav class="flex ml-4" aria-label="Breadcrumb">
            <ol class="inline-flex items-center space-x-1 md:space-x-2 rtl:space-x-reverse">
                <li class="inline-flex items-center">
                    <a href="#" class="inline-flex items-center text-sm font-medium text-body hover:text-fg-brand">
                        <svg class="w-4 h-4 me-1.5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none" viewBox="0 0 24 24"><path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m4 12 8-8 8 8M6 10.5V19a1 1 0 0 0 1 1h3v-3a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1v3h3a1 1 0 0 0 1-1v-8.5"/></svg>
                        Home
                    </a>
                </li>
                <li>
                    <div class="flex items-center space-x-1.5">
                        <svg class="w-3.5 h-3.5 rtl:rotate-180 text-body" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none" viewBox="0 0 24 24"><path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m9 5 7 7-7 7"/></svg>
                        <a href="#" class="inline-flex items-center text-sm font-medium text-body hover:text-fg-brand">Projects</a>
                    </div>
                </li>
                <li aria-current="page">
                    <div class="flex items-center space-x-1.5">
                        <svg class="w-3.5 h-3.5 rtl:rotate-180 text-body" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none" viewBox="0 0 24 24"><path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m9 5 7 7-7 7"/></svg>
                        <span class="inline-flex items-center text-sm font-medium text-body-subtle">Flowbite</span>
                    </div>
                </li>
            </ol>
        </nav>



        <div class="p-4 rounded-base mt-12 ">

            <div class="mb-4 ">
                <div class="text-2xl font-bold p-2  text-gray-700 float-left ">Permintaan</div>
            </div>



            @php

                $kategori_list = ['Obat', 'Alat Kesehatan', 'ATK', 'Tinta',  'Alat Kebersihan', 'Cetakan','Lain-lain'];
            @endphp


            <div class="clear-both"></div>

            @if ($errors->any())
                <div class="p-4 mb-4 text-sm text-red-900 rounded-md bg-red-100" role="alert">
                    <span class="font-medium">Gagal menyimpan data</span>


                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>

                </div>
            @endif


            @if(session('success'))
                <div id="toast-success" class="flex items-center w-full max-w-sm p-4 text-body bg-neutral-primary-soft rounded-base shadow-xs border border-default fixed top-5 right-5" role="alert">
                    <div class="inline-flex items-center justify-center shrink-0 w-7 h-7 text-fg-success bg-success-soft rounded">
                        <svg class="w-5 h-5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none" viewBox="0 0 24 24"><path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 11.917 9.724 16.5 19 7.5"/></svg>
                        <span class="sr-only">Check icon</span>
                    </div>
                    <div class="ms-3 text-sm font-normal">  {{ session('success') }}.</div>
                    <button type="button" class="ms-auto flex items-center justify-center text-body hover:text-heading bg-transparent box-border border border-transparent hover:bg-neutral-secondary-medium focus:ring-4 focus:ring-neutral-tertiary font-medium leading-5 rounded text-sm h-8 w-8 focus:outline-none" data-dismiss-target="#toast-success" aria-label="Close">
                        <span class="sr-only">Close</span>
                        <svg class="w-5 h-5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none" viewBox="0 0 24 24"><path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18 17.94 6M18 18 6.06 6"/></svg>
                    </button>
                </div>
            @endif


            <div class="relative overflow-x-auto  p-4 rounded-lg bg-white shadow-xs rounded-base border border-default mt-4">
                <h3 class="text-lg font-medium text-heading border-b-2 pb-2 mb-4 text-zinc-600">
                    Input Permintaan
                </h3>

                <form method="POST" action="{{ route('permintaan.store') }}">
                    @csrf

                    <div class="grid grid-cols-2 gap-4">

                        <div>
                            <div class="mb-3">
                                <label class="block mb-1 text-zinc-500 text-sm">Permintaan Dari</label>
                                <div class="w-full mb-4 text-slate-700 font-semibold">{{ $permintaan->user->name }}</div>
                            </div>


                            <div class="mb-3">
                                <label class="block mb-1 text-zinc-500 text-sm">Bagian</label>
                                <div class="w-full mb-4  text-slate-700  font-semibold">{{ $permintaan->user->bagian }}</div>
                            </div>

                            <div class="mb-3">
                                <label class="block mb-1 text-zinc-500 text-sm">Unit Kerja</label>
                                <div class="w-full mb-4  text-slate-700  font-semibold">{{ $permintaan->user->lokasi_kerja }}</div>

                            </div>

                        </div>


                        @php


                            use Carbon\Carbon;
                                $id_permintaan = $permintaan->id;
                                $tanggal = $permintaan->tanggal;
                                $kat_permintaan = $permintaan->kategori_permintaan;
                                $tgl_surat = Carbon::parse($tanggal)->format('d-m-Y');

                        @endphp
                        <div>

                            <div class="mb-3">
                                <label class="block mb-1 text-zinc-500 text-sm">No Surat</label>
                                <div class="w-full mb-4  text-slate-700  font-semibold">{{ $permintaan->no_surat }}</div>

                            </div>
                            <div class="mb-3">
                                <label class="block mb-1 text-zinc-500 text-sm">Tanggal</label>
                                <div class="w-full mb-4  text-slate-700  font-semibold">{{ $tgl_surat }}</div>

                            </div>
                            <div class="mb-3">
                                <label class="block mb-1 text-zinc-500 text-sm">Kategori Permintaan</label>
                                <div class="w-full mb-4  text-slate-700  font-semibold">{{ $kat_permintaan}}</div>

                            </div>

                        </div>

                    </div>


                </form>
            </div>

            <div class="relative overflow-x-auto  p-4 rounded-lg bg-white shadow-xs rounded-base border border-default mt-4">
                <h3 class="text-lg font-medium text-heading border-b-2 pb-2 mb-4 text-zinc-600">
                    List Item
                </h3>




                @php
                    $detail = $permintaan->details()->get();
                @endphp


                <a href="{{route('permintaan.input_item', $permintaan->id)}}" class="border bg-indigo-500 hover:bg-indigo-600 text-white py-2 px-4 float-right flex rounded-lg text-sm">
                    <svg class="w-[18px] h-[18px]" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none" viewBox="0 0 24 24">
                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m14.304 4.844 2.852 2.852M7 7H4a1 1 0 0 0-1 1v10a1 1 0 0 0 1 1h11a1 1 0 0 0 1-1v-4.5m2.409-9.91a2.017 2.017 0 0 1 0 2.853l-6.844 6.844L8 14l.713-3.565 6.844-6.844a2.015 2.015 0 0 1 2.852 0Z"/>
                    </svg>
                    Edit Item</a>
                    <div class="clear-both"></div>
                <table class="w-full text-sm text-left rtl:text-right text-body mt-4">
                    <thead class="text-sm text-body bg-zinc-50 border-b rounded-base border-zinc-100 ">
                    <tr>

                        <th scope="col" class="px-6 py-3 font-medium">
                            No
                        </th>
                        <th scope="col" class="px-6 py-3 font-medium">
                            Nama Obat
                        </th>
                        <th scope="col" class="px-6 py-3 font-medium">
                            Satuan
                        </th>
                        <th scope="col" class="px-6 py-3 font-medium">
                            Qty
                        </th>
                        <th scope="col" class="px-6 py-3 font-medium">
                            Keterangan
                        </th>

                    </tr>
                    </thead>
                    <tbody id="data-body">
                    @foreach($permintaan->details as $detail)

                        <tr class="border-b border-default">
                            <td class="px-6 py-4">{{$loop->iteration}}</td>
                            <td class="px-6 py-4">{{ $detail->item->nama ?? '-' }}</td>
                            <td class="px-6 py-4">{{ $detail->item->satuan ?? '-' }}</td>
                            <td class="px-6 py-4">{{$detail->qty}}</td>
                            <td class="px-6 py-4">{{$detail->note}}</td>

                        </tr>


                    @endforeach

                    </tbody>
                </table>

            </div>





        </div>
    </div>

@endsection

@push('scripts')
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

@endpush


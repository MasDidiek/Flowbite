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
                                        <label class="block mb-1">Permintaan Dari</label>
                                        <div  class="w-full bg-gray-50 text-zinc-600 border  border-zinc-100 p-2 rounded-md">{{ Auth::user()->name }}</div>
                                    </div>


                                    <div class="mb-3">
                                        <label class="block mb-1">Bagian</label>
                                        <div  class="w-full bg-gray-50 text-zinc-600 border  border-zinc-100 p-2 rounded-md">{{ Auth::user()->bagian }}</div>
                                    </div>

                                    <div class="mb-3">
                                        <label class="block mb-1">Unit Kerja</label>
                                        <div  class="w-full bg-gray-50 text-zinc-600 border  border-zinc-100 p-2 rounded-md">{{ Auth::user()->lokasi_kerja }}</div>

                                    </div>

                           </div>


                            <div>

                                <div class="mb-3">
                                    <label class="block mb-1">No Surat</label>
                                    <input type="text" name="no_surat" id="no_surat" required value="{{old('no_surat')}}" autocomplete="off"  class=" bg-gray-50 text-zinc-600 border  border-zinc-300 p-2 rounded-md placeholder:text-body">
                                </div>
                                <div class="mb-3">
                                    <label class="block mb-1">Tanggal</label>
                                    <input type="text" name="tanggal" id="tanggal" required  autocomplete="off"  datepicker datepicker-format="dd-mm-yyyy" value="{{old(date('d-m-Y'),'tanggal')}}"  datepicker datepicker-autohide
                                           class=" bg-gray-50 text-zinc-600 border  border-zinc-300 p-2 rounded-md placeholder:text-body">
                                </div>
                                <div class="mb-3">
                                    <label class="block mb-1">Kategori Permintaan</label>
                                    <select name="kategori" required class="w-full  border border-zinc-300 p-2 rounded-md">
                                        <option value="">--Pilih Kategori--</option>
                                        @foreach($kategori_list as $item)
                                            <option value="{{ $item }}">  {{ $item }}   </option>
                                        @endforeach
                                    </select>
                                </div>

                            </div>

                    </div>

                <div class="bg-gray-50  py-3 sm:flex sm:flex-row-reverse sm:px-6">
                    <button type="submit" class="flex justify-end order bg-amber-500 hover:bg-amber-600 text-white mr-2 py-2.5 px-4 flex rounded-lg text-sm">
                        <svg class="w-6 h-6 text-white dark:text-white" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none" viewBox="0 0 24 24">
                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 11.917 9.724 16.5 19 7.5"/>
                        </svg>&nbsp;   Simpan</button>

                    <a href="{{route('permintaan.index')}}" class="border bg-zinc-100 hover:bg-zinc-300 text-slate-800 mr-2 py-2.5 px-4 flex rounded-lg text-sm">
                        <svg class="w-6 h-6 text-gray-800 dark:text-white" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none" viewBox="0 0 24 24">
                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 12h14M5 12l4-4m-4 4 4 4"/>
                        </svg>
                        &nbsp;
                        Kembali</a>
                </div>

                </form>
            </div>

            <div class="relative overflow-x-auto  p-4 rounded-lg bg-white shadow-xs rounded-base border border-default mt-4">
                <h3 class="text-lg font-medium text-heading border-b-2 pb-2 mb-4 text-zinc-600">
                    List Item
                </h3>


                <table class="w-full text-sm text-left rtl:text-right text-body mt-4">
                    <thead class="text-sm text-body bg-neutral-secondary-soft border-b rounded-base border-default">
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
                            Action
                        </th>
                    </tr>
                    </thead>
                    <tbody id="data-body">


                    </tbody>
                </table>

            </div>


        </div>
    </div>

@endsection


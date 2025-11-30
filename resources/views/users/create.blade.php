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
                <div class="text-2xl font-bold p-2  text-gray-700 float-left ">Data Users</div>
            </div>



            @php

                $puskesmas_list = ['Puskesmas Cilincing', 'Pustu Cilincing 1', 'Pustu Semper Timur', 'Pustu Kalibaru', 'Pustu Sukapura', 'Pustu Semper Barat 1', 'Pustu Semper Barat 2', 'Pustu Semper Barat 3', 'Pustu Rorotan', 'Pustu Marunda', 'Pustu Marunda 2'];
                $bagian_list = ['Admin Loket', 'Farmasi', 'Laboratorium', 'Gigi', 'Gizi', 'Promkes','KIA/KB', 'Program', 'UKM', 'PJ Gudang Obat', 'PJ Alkes', 'PJ Barang', 'Surat'];
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
                <h3 class="text-lg font-medium text-heading border-b-2 pb-2 mb-4">
                    Tambah User Baru
                </h3>

                <form method="POST" action="{{ route('users.store') }}">
                            @csrf

                    <div class="grid grid-cols-3 gap-4">
                            <div class="mb-3">
                                <label class="block mb-1">Nama Lengkap</label>
                                <input type="text" name="name" required class="w-full border border-zinc-300 p-2 rounded-md" value="{{old('name')}}">
                            </div>

                            <div class="mb-3">
                                <label class="block mb-1">NIP</label>
                                <input type="text" name="nip" class="w-full border border-zinc-300 p-2 rounded-md" value="{{old('nip')}}">
                            </div>

                            <div class="mb-3">
                                <label class="block mb-1">Jabatan</label>
                                <input type="text" name="jabatan" class="w-full border border-zinc-300 p-2 rounded-md" value="{{old('jabatan')}}">
                            </div>

                   </div>

                    <div class="grid grid-cols-3 gap-4">
                        <div class="mb-3">
                            <label class="block mb-1">Lokasi Kerja</label>

                            <select name="puskesmas" class="w-full  border border-zinc-300 p-2 rounded-md">
                                @for($p=0; $p < count($puskesmas_list); $p++)
                                    <option value="{{$puskesmas_list[$p]}}">{{$puskesmas_list[$p]}}</option>

                                @endfor
                            </select>
                        </div>
                        <div class="mb-3">
                            <label class="block mb-1">Bagian</label>
                            <select name="bagian" class="w-full  border border-zinc-300 p-2 rounded-md">
                                @for($p=0; $p < count($bagian_list); $p++)
                                    <option value="{{$bagian_list[$p]}}">{{$bagian_list[$p]}}</option>
                                @endfor
                            </select>
                        </div>
                        <div class="mb-3">
                            <label class="block mb-1">Email</label>
                            <input type="email" name="email" required class="w-full border border-zinc-300 p-2 rounded-md" value="{{old('email')}}">
                        </div>
                    </div>

                    <div class="grid grid-cols-3 gap-4">

                        <div class="mb-3">
                            <label class="block mb-1">Username</label>
                            <input type="text" name="username" required class="w-full border border-zinc-300 p-2 rounded-md" value="{{old('username')}}">
                        </div>
                        <div class="mb-3">
                            <label class="block mb-1">Password</label>
                            <input type="password" name="password" required class="w-full border border-zinc-300 p-2 rounded-md">
                        </div>
                        <div class="mb-3">
                            <label for="password_confirmation" class="w-full border border-zinc-300  mb-1">Confirm Password</label>
                            <input type="password" name="password_confirmation" id="password_confirmation"  autocomplete="new-password" required class="w-full border border-zinc-300 p-2 rounded-md">
                        </div>
                </div>
                <div class="bg-gray-50  py-3 sm:flex sm:flex-row-reverse sm:px-6">
                    <button type="submit" class="inline-flex w-full justify-end rounded-md bg-amber-500 px-3 py-2 text-sm font-semibold text-white shadow-xs hover:bg-amber-600 sm:w-auto">Simpan</button>
                    <button type="button" command="close" commandfor="dialog" class="mt-3 mr-2 inline-flex w-full justify-center rounded-md bg-gray-100 px-3 py-2 text-sm font-semibold text-gray-900 shadow-xs inset-ring inset-ring-gray-300 hover:bg-gray-200 sm:mt-0 sm:w-auto">Cancel</button>
                </div>

                </form>
            </div>


        </div>
    </div>

@endsection


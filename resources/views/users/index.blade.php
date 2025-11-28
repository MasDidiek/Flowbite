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

                <button command="show-modal" commandfor="dialog" class="rounded-lg flex float-right  bg-amber-500 px-2.5 py-2 text-sm font-semibold text-white hover:bg-amber-600">
                    <svg class="w-[20px] h-[20px] text-white-800" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none" viewBox="0 0 24 24">
                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 12h14m-7 7V5"/>
                    </svg>
                    Add User</button>

            </div>


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


            <div class="relative overflow-x-auto  rounded-lg bg-white shadow-xs rounded-base border border-default mt-4">
                <table class="w-full text-xs text-left rtl:text-right text-body"  id="obatTable">
                    <thead class="text-sm text-body bg-neutral-secondary-medium border-b border-default-medium">
                         <tr>
                            <th class="px-6 py-5text-left text-xs font-medium text-gray-800 uppercase tracking-wider">No</th>
                            <th class="px-6 py-5text-left text-xs font-medium text-gray-800 uppercase tracking-wider">Nama</th>
                             <th class="px-6 py-5text-left text-xs font-medium text-gray-800 uppercase tracking-wider">NIP</th>
                             <th class="px-6 py-5text-left text-xs font-medium text-gray-800 uppercase tracking-wider">Jabatan</th>
                             <th class="px-6 py-5text-left text-xs font-medium text-gray-800 uppercase tracking-wider">Bagian</th>
                             <th class="px-6 py-5text-left text-xs font-medium text-gray-800 uppercase tracking-wider">Puskesmas</th>
                            <th class="px-6 py-5text-left text-xs font-medium text-gray-800 uppercase tracking-wider">Username</th>

                         </tr>
                    </thead>
                    <tbody  class="px-6 py-5 text-left text-sm font-medium text-gray-800 ">

                          @foreach($users as $usr)
                            <tr>
                                <td class="px-6 py-5 text-center border-red-100">{{ $loop->iteration }}</td>
                                <td class="px-6 py-5 font-semibold">{{ $usr->name }}</td>
                                <td class="px-6 py-5">{{ $usr->nip }}</td>
                                <td class="px-6 py-5 ">{{ $usr->jabatan }}</td>
                                <td class="px-6 py-5">{{ $usr->bagian }}</td>
                                <td class="px-6 py-5">{{ $usr->puskesmas }}</td>
                                <td class="px-6 py-5">{{ $usr->username }}</td>

                            </tr>
                        @endforeach

                    </tbody>
                </table>
            </div>



       <!-- Include this script tag or install `@tailwindplus/elements` via npm: -->
       <!-- <script src="https://cdn.jsdelivr.net/npm/@tailwindplus/elements@1" type="module"></script> -->

       @php

        $puskesmas_list = ['Puskesmas Cilincing', 'Pustu Cilincing 1', 'Pustu Semper Timur', 'Pustu Kalibaru', 'Pustu Sukapura', 'Pustu Semper Barat 1', 'Pustu Semper Barat 2', 'Pustu Semper Barat 3', 'Pustu Rorotan', 'Pustu Marunda', 'Pustu Marunda 2'];
        $bagian_list = ['Admin Loket', 'Farmasi', 'Laboratorium', 'Gigi', 'Gizi', 'Promkes','KIA/KB', 'Program', 'UKM', 'PJ Gudang Obat', 'PJ Alkes', 'PJ Barang', 'Surat'];
       @endphp

       <el-dialog>
           <dialog id="dialog" aria-labelledby="dialog-title" class="fixed inset-0 size-auto max-h-none max-w-none overflow-y-auto bg-transparent backdrop:bg-transparent">
               <el-dialog-backdrop class="fixed inset-0 bg-gray-500/75 transition-opacity data-closed:opacity-0 data-enter:duration-300 data-enter:ease-out data-leave:duration-200 data-leave:ease-in"></el-dialog-backdrop>

               <div tabindex="0" class="flex min-h-full items-end justify-center p-4 text-center focus:outline-none sm:items-center sm:p-0">
                   <el-dialog-panel class="relative max-w-2xl transform overflow-hidden rounded-lg bg-white text-left shadow-xl transition-all data-closed:translate-y-4 data-closed:opacity-0 data-enter:duration-300 data-enter:ease-out data-leave:duration-200 data-leave:ease-in sm:my-8 sm:w-full sm:max-w-lg data-closed:sm:translate-y-0 data-closed:sm:scale-95">
                       <div class="bg-white  px-4 pt-5 pb-4 sm:p-6 sm:pb-4">

                           <h3 class="text-lg font-medium text-heading border-b-2 pb-2 mb-4">
                               Tambah User Baru
                           </h3>

                           <div>

                               <form method="POST" action="{{ route('users.store') }}">
                                   @csrf

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


                                   <div class="flex justify-between">
                                       <div class="mb-3">
                                            <label class="block mb-1">Lokasi Kerja</label>

                                            <select name="puskesmas" class="w-auto  border border-zinc-300 p-2 rounded-md">
                                                @for($p=0; $p < count($puskesmas_list); $p++)
                                                    <option value="{{$puskesmas_list[$p]}}">{{$puskesmas_list[$p]}}</option>

                                                @endfor
                                            </select>
                                       </div>
                                       <div class="mb-3">
                                           <label class="block mb-1">Bagian</label>
                                           <select name="bagian" class="w-auto  border border-zinc-300 p-2 rounded-md">
                                               @for($p=0; $p < count($bagian_list); $p++)
                                                   <option value="{{$bagian_list[$p]}}">{{$bagian_list[$p]}}</option>
                                               @endfor
                                           </select>
                                       </div>
                                   </div>
                                   <div class="mb-3">
                                       <label class="block mb-1">Email</label>
                                       <input type="email" name="email" required class="w-full border border-zinc-300 p-2 rounded-md" value="{{old('email')}}">
                                   </div>

                                   <div class="mb-3">
                                       <label class="block mb-1">Username</label>
                                       <input type="text" name="username" required class="w-full border border-zinc-300 p-2 rounded-md" value="{{old('username')}}">
                                   </div>
                                   <div class="mt-3">
                                       <label class="block mb-1">Password</label>
                                       <input type="password" name="password" required class="w-full border border-zinc-300 p-2 rounded-md">
                                   </div>
                                   <div class="mt-3">
                                       <label for="password_confirmation" class="block mb-1">Confirm Password</label>
                                       <input type="password" name="password_confirmation" id="password_confirmation"  autocomplete="new-password" required class="w-full border border-zinc-300 p-2 rounded-md">
                                   </div>

                           </div>
                       </div>
                       <div class="bg-gray-50  py-3 sm:flex sm:flex-row-reverse sm:px-6">
                           <button type="submit" class="inline-flex w-full justify-end rounded-md bg-amber-500 px-3 py-2 text-sm font-semibold text-white shadow-xs hover:bg-amber-600 sm:w-auto">Simpan</button>
                           <button type="button" command="close" commandfor="dialog" class="mt-3 mr-2 inline-flex w-full justify-center rounded-md bg-gray-100 px-3 py-2 text-sm font-semibold text-gray-900 shadow-xs inset-ring inset-ring-gray-300 hover:bg-gray-200 sm:mt-0 sm:w-auto">Cancel</button>
                       </div>

                       </form>
                   </el-dialog-panel>
               </div>
           </dialog>
       </el-dialog>


   </div>
</div>

@endsection

@push('scripts')
        <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
        <script src="https://cdn.datatables.net/1.13.4/js/jquery.dataTables.min.js"></script>

        <script>
            $(document).ready(function() {
                $('#obatTable').DataTable({
                    "pageLength": 10,
                    "lengthMenu": [10, 25, 50, 100],
                });




                // edit data obat
                $(document).on("click", ".edit-obat", function () {
                    let id = $(this).data('id');
                    // ubah URL form menjadi UPDATE
                    $("#formObat").attr("action", "/obat/" + id);

                    // Tambahkan PUT method
                    $("#methodField").html('<input type="hidden" name="_method" value="PUT">');
                    // Ubah teks tombol submit
                    $("#btnSubmit").text("Update");

                    // GET data obat
                    $.ajax({
                        url: "/obat/" + id + "/edit",
                        type: "GET",
                        success: function(res) {
                            // isi ke field modal
                            $("#obat_id").val(res.id);
                            $("#nama_obat").val(res.nama);
                            $("#satuan_obat").val(res.satuan);
                            $("#kategori_obat").val(res.kategori);
                            $("#keterangan_obat").val(res.keterangan);
                        }
                    });
                });



                $("#btnAddObat").click(function () {

                    $("#formObat").trigger("reset"); // reset form
                    $("#formObat").attr("action", "/obat"); // kembali ke store
                    $("#formObat input[name='_method']").remove(); // hapus PUT
                    $("#btnSubmit").text("Simpan");
                });


            });
        </script>
        @endpush


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

            <div id="toast-success" class="flex items-center w-full max-w-sm p-4 text-body bg-neutral-primary-soft rounded-base shadow-xs border border-default" role="alert">
                <div class="inline-flex items-center justify-center shrink-0 w-7 h-7 text-fg-success bg-success-soft rounded">
                    <svg class="w-5 h-5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none" viewBox="0 0 24 24"><path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 11.917 9.724 16.5 19 7.5"/></svg>
                    <span class="sr-only">Check icon</span>
                </div>
                <div class="ms-3 text-sm font-normal">Item moved successfully.</div>
                <button type="button" class="ms-auto flex items-center justify-center text-body hover:text-heading bg-transparent box-border border border-transparent hover:bg-neutral-secondary-medium focus:ring-4 focus:ring-neutral-tertiary font-medium leading-5 rounded text-sm h-8 w-8 focus:outline-none" data-dismiss-target="#toast-success" aria-label="Close">
                    <span class="sr-only">Close</span>
                    <svg class="w-5 h-5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none" viewBox="0 0 24 24"><path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18 17.94 6M18 18 6.06 6"/></svg>
                </button>
            </div>

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


                        @php


                            use Carbon\Carbon;
                                $id_permintaan = $permintaan->id;
                                $tanggal = $permintaan->tanggal;
                                $kat_permintaan = $permintaan->kategori_permintaan;
                                $tgl_surat = Carbon::parse($tanggal)->format('d-m-Y');

                        @endphp
                        <div>

                            <div class="mb-3">
                                <label class="block mb-1">No Surat</label>
                                <input type="text" name="no_surat" id="no_surat" required  autocomplete="off"  value="{{$permintaan->no_surat}}" class=" bg-gray-50 text-zinc-600 border  border-zinc-300 p-2 rounded-md placeholder:text-body">
                            </div>
                            <div class="mb-3">
                                <label class="block mb-1">Tanggal</label>
                                <input type="text" name="exp_date" id="exp_date" required  autocomplete="off"   value="{{$tgl_surat}}" datepicker datepicker-format="dd-mm-yyyy"  datepicker datepicker-autohide
                                       class=" bg-gray-50 text-zinc-600 border  border-zinc-300 p-2 rounded-md placeholder:text-body">
                            </div>
                            <div class="mb-3">
                                <label class="block mb-1">Kategori Permintaan</label>
                                <select name="kategori" required class="w-full  border border-zinc-300 p-2 rounded-md">
                                    <option value="">--Pilih Kategori--</option>
                                    @foreach($kategori_list as $item)

                                        <option value="{{ $item }}"   {{ $kat_permintaan == $item ? 'selected' : '' }}>  {{ $item }}   </option>
                                    @endforeach
                                </select>
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



                <button command="show-modal" commandfor="dialog" class="rounded-md mb-2 float-right bg-indigo-500 px-2.5 py-2.5 text-sm font-semibold text-white hover:bg-indigo-600 flex">
                    <svg class="w-[20px] h-[20px] text-white-800" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none" viewBox="0 0 24 24">
                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 12h14m-7 7V5"/>
                    </svg>
                    Add Item</button>

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


                        <th scope="col" class="px-6 py-3 font-medium">
                            Action
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
                              <td class="px-6 py-4">
                                <div class="flex">
                                      <button command="show-modal" commandfor="editModel" class="flex text-sm font-semibold text-amber-500 hover:text-amber-600 mr-2 edit-item"
                                      data-id="{{ $detail->id}}"
                                      data-nama="{{ $detail->item->nama }}"
                                      data-satuan="{{ $detail->item->satuan }}"
                                      data-qty="{{ $detail->qty }}"
                                      data-note="{{ $detail->note }}">
                                        <svg class="w-[18px] h-[18px]" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none" viewBox="0 0 24 24">
                                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m14.304 4.844 2.852 2.852M7 7H4a1 1 0 0 0-1 1v10a1 1 0 0 0 1 1h11a1 1 0 0 0 1-1v-4.5m2.409-9.91a2.017 2.017 0 0 1 0 2.853l-6.844 6.844L8 14l.713-3.565 6.844-6.844a2.015 2.015 0 0 1 2.852 0Z"/>
                                        </svg> Ubah
                                    </button>

                                     <button type="button" class="flex deleteItem text-red-500 hover:text-red-600" data-id="{{ $detail->id }}">
                                            <svg class="w-[18px] h-[18px]" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none" viewBox="0 0 24 24">
                                                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 7h14m-9 3v8m4-8v8M10 3h4a1 1 0 0 1 1 1v3H9V4a1 1 0 0 1 1-1ZM6 7h12v13a1 1 0 0 1-1 1H7a1 1 0 0 1-1-1V7Z"/>
                                            </svg>
                                       Hapus
                                    </button>
                                 </div>
                              </td>
                            </tr>


                        @endforeach

                    </tbody>
                </table>

            </div>



          <!-------------modal input item----------->
            <el-dialog>
                <dialog id="dialog" aria-labelledby="dialog-title" class="fixed inset-0 size-auto max-h-none max-w-none overflow-y-auto bg-transparent backdrop:bg-transparent">
                    <el-dialog-backdrop class="fixed inset-0 bg-gray-500/75 transition-opacity data-closed:opacity-0 data-enter:duration-300 data-enter:ease-out data-leave:duration-200 data-leave:ease-in"></el-dialog-backdrop>

                    <div tabindex="0" class="flex min-h-full items-end justify-center p-4 text-center focus:outline-none sm:items-center sm:p-0">
                        <el-dialog-panel class="relative transform overflow-hidden rounded-lg bg-white text-left shadow-xl transition-all data-closed:translate-y-4 data-closed:opacity-0 data-enter:duration-300 data-enter:ease-out data-leave:duration-200 data-leave:ease-in sm:my-8 sm:w-full sm:max-w-lg data-closed:sm:translate-y-0 data-closed:sm:scale-95">
                            <div class="bg-white px-4 pt-5 pb-4 sm:p-6 sm:pb-4">

                                    <div class="mt-3 text-center sm:mt-0 sm:ml-4 sm:text-left">
                                        <h3 id="dialog-title" class="text-base font-semibold text-gray-900">Input Item Permintaan</h3>

                                        <div class="mt-2">
                                            <form action="#">
                                                    <div id="methodField"></div>
                                                    <input type="hidden" name="permintaan_id" id="id_permintaan" value="{{$id_permintaan}}">
                                                    <input type="hidden" name="kategori_permintaan" id="kategori_permintaan" value="{{$kat_permintaan}}">

                                                    <div class="col-span-1 pt-3">
                                                        <label for="name" class="block mb-2.5 text-sm font-medium text-heading">Nama Obat</label>
                                                        <input type="text" name="nama_obat" id="nama_obat"  list="listObat" class=" border border-zinc-300 text-heading text-sm rounded-lg focus:ring-sky-300 focus:border-indigo-400 block w-full px-3 py-2.5 shadow-xs placeholder:text-body" placeholder="ketik nama obat" autocomplete="off" required="">
                                                        <datalist id="listObat"></datalist>
                                                    </div>

                                                    <input type="hidden" name="item_id" value="" id="item_id">
                                                    <div class="grid gap-4 grid-cols-2 pt-3">
                                                        <div class="mb-1">
                                                            <label class="block mb-1.5 text-sm font-medium text-heading">Satuan</label>
                                                            <input type="text" name="satuan" id="satuan"
                                                                class="border border-zinc-300 text-heading text-sm rounded-lg
                                                                        ffocus:ring-sky-300 focus:border-indigo-400 block w-full px-3 py-2.5 shadow-xs placeholder:text-body"
                                                                readonly>
                                                        </div>

                                                        <div class="mb-1">
                                                            <label class="block mb-1.5 text-sm font-medium text-heading">Qty</label>
                                                            <input type="text" name="qty" id="qty" required
                                                                class=" border border-zinc-300 text-heading text-sm rounded-lg
                                                                        focus:ring-sky-300 focus:border-indigo-400 block w-full px-3 py-2.5 shadow-xs placeholder:text-body" >
                                                        </div>


                                                    </div>

                                                    <div class="col-span-1 mt-2">
                                                        <label for="name" class="block mb-2.5 text-sm font-medium text-heading">Keterangan</label>
                                                        <input type="text" name="keterangan" id="keterangan"  class="border  border-zinc-300 text-heading text-sm rounded-lg focus:ring-sky-300 focus:border-indigo-400 block w-full px-3 py-2.5 shadow-xs placeholder:text-body"  required="">

                                                    </div>
                                                </form>
                                        </div>

                                </div>
                            </div>
                            <div class="bg-gray-50 px-4 py-3 sm:flex sm:flex-row-reverse sm:px-6">
                                <button type="button" id="saveItem" class="inline-flex w-full justify-center rounded-md bg-amber-500 px-3 py-2 text-sm font-semibold text-white shadow-xs hover:bg-amber-600 sm:ml-3 sm:w-auto">Tambahkan</button>
                                <button type="button" command="close" commandfor="dialog" class="mt-3 inline-flex w-full justify-center rounded-md bg-white px-3 py-2 text-sm font-semibold text-gray-900 shadow-xs inset-ring inset-ring-gray-300 hover:bg-gray-50 sm:mt-0 sm:w-auto">Tutup</button>
                            </div>
                        </el-dialog-panel>
                    </div>
                </dialog>
            </el-dialog>

<!-------------modal edit item----------->
            <el-dialog>
                <dialog id="editModel" aria-labelledby="dialog-title" class="fixed inset-0 size-auto max-h-none max-w-none overflow-y-auto bg-transparent backdrop:bg-transparent">
                    <el-dialog-backdrop class="fixed inset-0 bg-gray-500/75 transition-opacity data-closed:opacity-0 data-enter:duration-300 data-enter:ease-out data-leave:duration-200 data-leave:ease-in"></el-dialog-backdrop>

                    <div tabindex="0" class="flex min-h-full items-end justify-center p-4 text-center focus:outline-none sm:items-center sm:p-0">
                        <el-dialog-panel class="relative transform overflow-hidden rounded-lg bg-white text-left shadow-xl transition-all data-closed:translate-y-4 data-closed:opacity-0 data-enter:duration-300 data-enter:ease-out data-leave:duration-200 data-leave:ease-in sm:my-8 sm:w-full sm:max-w-lg data-closed:sm:translate-y-0 data-closed:sm:scale-95">
                            <div class="bg-white px-4 pt-5 pb-4 sm:p-6 sm:pb-4">

                                    <div class="mt-3 text-center sm:mt-0 sm:ml-4 sm:text-left">
                                        <h3 id="dialog-title" class="text-base font-semibold text-gray-900">Edit Item Permintaan</h3>

                                            <div class="alert-info invisible opacity-0 transition-opacity duration-500 bg-green-100 text-green-800 p-3 rounded-lg">Item berhasil diubah!</div>



                                        <div class="mt-2">
                                            <form action="#">
                                                    <div id="methodField"></div>

                                                    <div class="col-span-1 pt-3">
                                                        <label for="name" class="block mb-2.5 text-sm font-medium text-heading">Nama Obat</label>
                                                        <input type="text" name="nama_obat" id="edit_nama"  disabled class="bg-zinc-100 border border-zinc-300 text-heading text-sm rounded-lg focus:ring-sky-300 focus:border-indigo-400 block w-full px-3 py-2.5 shadow-xs placeholder:text-body" required="">

                                                    </div>

                                                    <input type="hidden" name="item_id" value="" id="item_id">
                                                    <div class="grid gap-4 grid-cols-2 pt-3">
                                                        <div class="mb-1">
                                                            <label class="block mb-1.5 text-sm font-medium text-heading">Satuan</label>
                                                            <input type="text" name="satuan" id="edit_satuan"  disabled class="bg-zinc-100 border border-zinc-300 text-heading text-sm rounded-lg
                                                                        ffocus:ring-sky-300 focus:border-indigo-400 block w-full px-3 py-2.5 shadow-xs placeholder:text-body"
                                                                readonly>
                                                        </div>

                                                        <div class="mb-1">
                                                            <label class="block mb-1.5 text-sm font-medium text-heading">Qty</label>
                                                            <input type="text" name="qty" id="edit_qty" required
                                                                class=" border border-zinc-300 text-heading text-sm rounded-lg
                                                                        focus:ring-sky-300 focus:border-indigo-400 block w-full px-3 py-2.5 shadow-xs placeholder:text-body" >
                                                        </div>


                                                    </div>

                                                    <div class="col-span-1 mt-2">
                                                        <label for="name" class="block mb-2.5 text-sm font-medium text-heading">Keterangan</label>
                                                        <input type="text" name="keterangan" id="edit_note"  class="border  border-zinc-300 text-heading text-sm rounded-lg focus:ring-sky-300 focus:border-indigo-400 block w-full px-3 py-2.5 shadow-xs placeholder:text-body"  required="">

                                                    </div>
                                                </form>
                                        </div>

                                </div>
                            </div>
                            <div class="bg-gray-50 px-4 py-3 sm:flex sm:flex-row-reverse sm:px-6">
                                <button type="button" id="updateItem" class="inline-flex w-full justify-center rounded-md bg-amber-500 px-3 py-2 text-sm font-semibold text-white shadow-xs hover:bg-amber-600 sm:ml-3 sm:w-auto">Simpan</button>
                                <button type="button" command="close" commandfor="editModel" class="mt-3 inline-flex w-full justify-center rounded-md bg-white px-3 py-2 text-sm font-semibold text-gray-900 shadow-xs inset-ring inset-ring-gray-300 hover:bg-gray-50 sm:mt-0 sm:w-auto">Cancel</button>
                            </div>
                        </el-dialog-panel>
                    </div>
                </dialog>
            </el-dialog>



        </div>
    </div>

@endsection

@push('scripts')
      <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script>
         $(document).ready(function () {

                    // === AUTOCOMPLETE OBAT ===
                    $("#nama_obat").on("keyup", function () {
                        let keyword = $(this).val();

                        $.ajax({
                            url: "/search-obat",
                            type: "GET",
                            data: { q: keyword },
                            success: function (data) {

                                $("#listObat").empty();

                                data.forEach(function (item) {
                                    $("#listObat").append(`
                                        <option
                                            data-id="${item.id}"
                                            data-satuan="${item.satuan}"

                                            value="${item.nama}">
                                        `);
                                });
                            }
                        });
                    });

                    // Ketika nama obat dipilih
                    $("#nama_obat").change(function () {
                        let val = $(this).val();
                        let option = $('#listObat option[value="' + val + '"]');

                        $("#satuan").val(option.data("satuan"));
                        $("#item_id").val(option.data("id"));
                    });


                    $("#btnSave").click(function(e){
                        if ($("#data-body tr").length === 0) {
                            e.preventDefault();
                            alert("Minimal 1 item obat harus ditambahkan!");
                        }
                    });




                    // === TAMBAH ITEM ===
                    $("#saveItem").click(function () {

                        let item_id = $("#item_id").val();
                        let nama = $("#nama_obat").val();
                        let satuan = $("#satuan").val();
                        let qty = $("#qty").val();
                        let id_permintaan = $("#id_permintaan").val(); // kalau butuh ID permintaan
                        let kategori_permintaan = $("#kategori_permintaan").val();
                        let keterangan = $("#keterangan").val();

                        if (nama === "" || qty === "") {
                            alert("Nama obat dan qty wajib diisi!");
                            return;
                        }

                        $.ajax({
                            url: "/permintaan/insert_item",
                            type: "POST",
                            data: {
                                    _token: $('meta[name="csrf-token"]').attr('content'), // CSRF token
                                    item_id: item_id,
                                    qty: qty,
                                    keterangan: keterangan,
                                        kategori: kategori_permintaan,
                                    permintaan_id: id_permintaan // kalau diperlukan
                                },
                                success: function(res) {
                                        let row = `
                                        <tr class="border-b border-default">
                                            <td class="px-6 py-4">#

                                            </td>
                                            <td class="px-6 py-4">${nama} </td>
                                            <td class="px-6 py-4">${satuan} </td>
                                            <td class="px-6 py-4">${qty}
                                            <td class="px-6 py-4">${keterangan} </td>
                                            <td class="px-6 py-4">

                                            </td>
                                        </tr>  `;

                                    $("#data-body").append(row);

                                    window.dispatchEvent(new CustomEvent('toast', {
                                        detail: {
                                            message: "Item berhasil ditambahkan!",
                                            duration: 3000
                                        }
                                    }));


                                    // Clear
                                    $("#nama_obat, #satuan, #qty,  #keterangan").val("");
                                },
                                error: function(err) {
                                    console.log(err);
                                    alert("Gagal menyimpan item!");
                                }
                        }); //close .ajax

                    }); //close saveItem

               $(".deleteItem").click(function () {

                    let id_item = $(this).data("id");
                    let row = $(this).closest("tr");

                    if(!confirm("Hapus item ini?")) return;

                    $.ajax({
                        url: "/permintaan/delete_item/" + id_item,
                        type: "DELETE",
                        data: {
                            _token: $('meta[name="csrf-token"]').attr('content')
                        },
                        success: function(res){
                            row.remove();

                            window.dispatchEvent(new CustomEvent('toast', {
                                detail: {
                                    message: "Item berhasil dihapus!",
                                    duration: 3000
                                }
                            }));
                        }
                    });

                });


                $(".edit-item").click(function () {
                    let id = $(this).data('id');
                    let nama = $(this).data('nama');
                    let satuan = $(this).data('satuan');
                    let qty = $(this).data('qty');
                    let note = $(this).data('note');

                    $("#edit_id").val(id);
                    $("#edit_nama").val(nama);
                    $("#edit_satuan").val(satuan);
                    $("#edit_qty").val(qty);
                    $("#edit_note").val(note);


                });


            });  //close document ready

    </script>
@endpush


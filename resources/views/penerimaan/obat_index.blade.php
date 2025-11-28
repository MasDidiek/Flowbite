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



   <div class="p-4 rounded-base mt-12">

            <div class="mb-4">
                   <div class="text-2xl font-bold p-2  text-gray-700 float-left ">Penerimaan Obat</div>

                    <!-- Modal toggle -->
                    <button id="btnInputPenerimaan" data-modal-target="crud-modal" data-modal-toggle="crud-modal" class="text-white flex float-right cursor-pointer bg-amber-500 box-border border border-transparent hover:bg-amber-600 focus:ring-4 focus:ring-brand-medium shadow-xs font-medium leading-5 rounded-base text-sm px-4 py-2.5 focus:outline-none" type="button">
                      <svg class="w-[20px] h-[20px] text-white-800" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none" viewBox="0 0 24 24">
                          <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 12h14m-7 7V5"/>
                        </svg>
                     &nbsp;  Input Penerimaan
                    </button>

                    <!-- Main modal -->
                    <div id="crud-modal" tabindex="-1" aria-hidden="true" class="hidden overflow-y-auto overflow-x-hidden fixed top-0 right-0 left-0 z-50 justify-center items-center w-full md:inset-0 h-[calc(100%-1rem)] max-h-full">
                        <div class="relative p-4 w-full max-w-md max-h-full">
                            <!-- Modal content -->
                            <div class="relative bg-neutral-primary-soft border border-default rounded-base shadow-sm p-4 md:p-6">
                                <!-- Modal header -->
                                <div class="flex items-center justify-between border-b border-default pb-4 md:pb-5">
                                    <h3 class="text-lg font-medium text-heading">
                                    Input  Penerimaan  Obat
                                    </h3>
                                    <button type="button" class="text-body bg-transparent hover:bg-neutral-tertiary hover:text-heading rounded-base text-sm w-9 h-9 ms-auto inline-flex justify-center items-center" data-modal-hide="crud-modal">
                                        <svg class="w-5 h-5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none" viewBox="0 0 24 24"><path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18 17.94 6M18 18 6.06 6"/></svg>
                                        <span class="sr-only">Close modal</span>
                                    </button>
                                </div>
                                <!-- Modal body -->
                                 <form method="post" action="{{ route('penerimaan.obat.store') }}" id="formInput">
                                     @csrf

                                 

                                    <div id="methodField"></div>
                                    <input type="hidden" name="id" id="penerimaan_id">

                                    <div class="grid gap-4 grid-cols-2 py-4 md:py-6">
                                        <div class="col-span-2 sm:col-span-1">
                                            <label for="no_pembelian" class="block mb-2.5 text-sm font-medium text-heading">No Pembelian</label>
                                            <input type="text" name="no_pembelian" id="no_pembelian" class="bg-neutral-secondary-medium border border-default-medium text-heading text-sm rounded-base focus:ring-brand focus:border-brand block w-full px-3 py-2.5 shadow-xs placeholder:text-body" placeholder="Input no Pembelian" required="">
                                        </div>
                                        <div class="col-span-2 sm:col-span-1">
                                            <label for="tanggal" class="block mb-2.5 text-sm font-medium text-heading">Tanggal</label>

                                            <div class="relative max-w-sm">
                                              <div class="absolute inset-y-0 start-0 flex items-center ps-3 pointer-events-none">
                                                    <svg class="w-4 h-4 text-body" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none" viewBox="0 0 24 24"><path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 10h16m-8-3V4M7 7V4m10 3V4M5 20h14a1 1 0 0 0 1-1V7a1 1 0 0 0-1-1H5a1 1 0 0 0-1 1v12a1 1 0 0 0 1 1Zm3-7h.01v.01H8V13Zm4 0h.01v.01H12V13Zm4 0h.01v.01H16V13Zm-8 4h.01v.01H8V17Zm4 0h.01v.01H12V17Zm4 0h.01v.01H16V17Z"/></svg>
                                              </div>
                                              <input id="tgl_penerimaan" name="tgl_penerimaan" autocomplete="off"  datepicker datepicker-format="dd-mm-yyyy"  datepicker datepicker-autohide type="text" class="block w-full ps-9 pe-3 py-2.5 bg-neutral-secondary-medium border border-default-medium text-heading text-sm rounded-base focus:ring-brand focus:border-brand px-3 py-2.5 shadow-xs placeholder:text-body" placeholder="Select date">
                                            </div>

                                        </div>
                                        <div class="col-span-2">
                                            <label for="penerima" class="block mb-2.5 text-sm font-medium text-heading">Penerima</label>
                                            <input type="text" name="penerima" id="penerima" class="bg-neutral-secondary-medium border border-default-medium text-heading text-sm rounded-base focus:ring-brand focus:border-brand block w-full px-3 py-2.5 shadow-xs placeholder:text-body" placeholder="pengirim" required="">
                                        </div>

                                        <div class="col-span-2">
                                            <label for="pengirim" class="block mb-2.5 text-sm font-medium text-heading">Pengirim</label>
                                            <input type="text" name="pengirim" id="pengirim" class="bg-neutral-secondary-medium border border-default-medium text-heading text-sm rounded-base focus:ring-brand focus:border-brand block w-full px-3 py-2.5 shadow-xs placeholder:text-body" placeholder="Penerima" required="">
                                        </div>


                                        <div class="col-span-2">
                                            <label for="catatan" class="block mb-2.5 text-sm font-medium text-heading">Catatan</label>
                                            <textarea id="catatan" name="catatan" rows="4" class="block bg-neutral-secondary-medium border border-default-medium text-heading text-sm rounded-base focus:ring-brand focus:border-brand block w-full p-3.5 shadow-xs placeholder:text-body" placeholder="Tulis catatan bila ada"></textarea>
                                        </div>
                                    </div>
                                    <div class="border-default pt-4 md:pt-6">

                                        <button data-modal-hide="crud-modal" type="button" class="text-body bg-neutral-secondary-medium box-border border border-default-medium hover:bg-neutral-tertiary-medium hover:text-heading focus:ring-4 focus:ring-neutral-tertiary shadow-xs font-medium leading-5 rounded-base text-sm px-4 py-2.5 focus:outline-none">Cancel</button>
                                        <button type="submit" id="btnSubmit" class="float-right cursor-pointer items-center  text-white bg-green-500 hover:bg-green-600 box-border border border-transparent focus:ring-4 focus:ring-brand-medium shadow-xs font-medium leading-5 rounded-base text-sm px-4 py-2.5 focus:outline-none">

                                            Simpan
                                        </button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>

            </div>

            <div class="clear-both"></div>


            <div class="relative overflow-x-auto bg-neutral-primary-soft shadow-xs rounded-base border border-default mt-4">

                
                @if ($errors->any())
                <div class="p-4 mb-4 text-sm text-fg-danger-strong rounded-base bg-danger-soft" role="alert">
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



                <table class="w-full text-xs text-left rtl:text-right text-body"  id="obatTable">
                    <thead class="text-sm text-body bg-neutral-secondary-medium border-b border-default-medium">
                         <tr>
                            <th class="px-6 py-5text-left text-xs font-medium text-gray-800 uppercase tracking-wider">No</th>
                           
                            <th class="px-6 py-5text-left text-xs font-medium text-gray-800 uppercase tracking-wider">Tanggal</th>
                             <th class="px-6 py-5text-left text-xs font-medium text-gray-800 uppercase tracking-wider">No pembelian</th>
                            <th class="px-6 py-5text-left text-xs font-medium text-gray-800 uppercase tracking-wider">Penerima</th>
                            <th class="px-6 py-5text-left text-xs font-medium text-gray-800 uppercase tracking-wider">Pengirim</th>
                            <th class="px-6 py-5text-left text-xs font-medium text-gray-800 uppercase tracking-wider" width="150">Actions</th>
                         </tr>
                    </thead>
                    <tbody  class="px-6 py-5 text-left text-sm font-medium text-gray-800 ">

                          @foreach($penerimaan_obat as $obat)
                            <tr>
                                <td class="px-6 py-5 text-center border-red-100">{{ $loop->iteration }}</td>
                               
                                <td class="px-6 py-5">{{ $obat->tgl_penerimaan }}</td>
                                 <td class="px-6 py-5 font-semibold text-amber-500 hover:text-amber-600">
                                    <a href="{{ route('penerimaan.obat.detail_penerimaan', $obat->id) }}">{{ $obat->no_pembelian }}</a></td>
                                <td class="px-6 py-5">{{ $obat->penerima }}</td>
                                <td class="px-6 py-5">{{ $obat->pengirim }}</td>
                                <td class="px-6 py-5">
                                     <div class="flex gap-2">
                                         <button type="button" class="edit-penerimaan cursor-pointer text-amber-500 hover:text-yellow-600 flex"  data-id="{{ $obat->id }}" data-modal-target="crud-modal" data-modal-toggle="crud-modal">
                                             <svg class="w-[20px] h-[20px]" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none" viewBox="0 0 24 24">
                                                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m14.304 4.844 2.852 2.852M7 7H4a1 1 0 0 0-1 1v10a1 1 0 0 0 1 1h11a1 1 0 0 0 1-1v-4.5m2.409-9.91a2.017 2.017 0 0 1 0 2.853l-6.844 6.844L8 14l.713-3.565 6.844-6.844a2.015 2.015 0 0 1 2.852 0Z"/>
                                                </svg>

                                            Edit
                                        </button>
                                        <form action="{{ route('penerimaan.destroy', $obat) }}" method="POST" onsubmit="return confirm('Are you sure?')">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class=" text-red-500 cursor-pointer  hover:text-red-600 flex">
                                                <svg class="w-[20px] h-[20px]" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none" viewBox="0 0 24 24">
                                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 7h14m-9 3v8m4-8v8M10 3h4a1 1 0 0 1 1 1v3H9V4a1 1 0 0 1 1-1ZM6 7h12v13a1 1 0 0 1-1 1H7a1 1 0 0 1-1-1V7Z"/>
                                            </svg>

                                            Delete</button>
                                        </form>
                                    </div>
                                </td>
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
        <script src="https://cdn.datatables.net/1.13.4/js/jquery.dataTables.min.js"></script>

        <script>
            $(document).ready(function() {
                $('#obatTable').DataTable({
                    "pageLength": 10,
                    "lengthMenu": [10, 25, 50, 100],
                });



                 $(document).on("click", ".edit-penerimaan", function () {
                    let id = $(this).data('id');
                    // ubah URL form menjadi UPDATE
                    $("#formInput").attr("action", "/penerimaan/" + id);
                              
                    // Tambahkan PUT method
                    $("#methodField").html('<input type="hidden" name="_method" value="PUT">');
                    // Ubah teks tombol submit
                    $("#btnSubmit").text("Update");

                    // GET data obat
                    $.ajax({
                        url: "/penerimaan/" + id + "/edit",
                        type: "GET",
                        success: function(res) {
                            // isi ke field modal
                            $("#penerimaan_id").val(res.id);
                            $("#no_pembelian").val(res.no_pembelian);
                            $("#tgl_penerimaan").val(res.tgl_penerimaan);
                            $("#penerima").val(res.penerima);
                            $("#pengirim").val(res.pengirim);
                            $("#catatan").val(res.catatan);
                        }
                    });
                });
           
                
                $("#btnInputPenerimaan").click(function () {
                    $("#formInput").trigger("reset"); // reset form
                    $("#formInput").attr("action", "/penerimaan/obat"); // kembali ke store
                    $("#formInput input[name='_method']").remove(); // hapus PUT
                    $("#btnSubmit").text("Simpan");
                });
            });
        </script>
        @endpush

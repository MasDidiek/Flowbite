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
            </div>
            <div class="clear-both"></div>

            <div class="relative overflow-x-auto bg-neutral-primary-soft shadow-xs rounded-base border border-default mt-4 p-4">

                 <div class="text-gray-800 text-xl font-semibold mb-3">Detail Pembelian</div>

                    <div class="grid grid-cols-1 text-sm md:grid-cols-2 gap-6">

                        <div class=" py-2">
                            <h4 class="text-gray-400">No Pembelian</h4>
                            <div class="text-gray-800 font-semibold">{{ $penerimaan_obat->no_pembelian}} </div>
                        </div>

                        <div>
                            <h4 class="text-gray-400">Tanggal Datang Barang</h4>
                            <div class="text-gray-800 font-semibold">{{ $penerimaan_obat->tgl_penerimaan }} </div>
                        </div>

                        <div>
                            <h4 class="text-gray-400">Pengirim</h4>
                            <div class="text-gray-800 font-semibold">{{ $penerimaan_obat->pengirim }} </div>
                        </div>

                        <div>
                            <h4 class="text-gray-400">Penerima</h4>
                            <div class="text-gray-800 font-semibold">{{ $penerimaan_obat->penerima}} </div>
                        </div>

                    </div> 
                    {{-- close grid --}}


                

            </div>

             <div class="relative overflow-x-auto bg-neutral-primary-soft shadow-xs rounded-base border border-default mt-4 p-4">

                 <div class="text-gray-800 text-xl font-semibold">List Item Penerimaan</div>
                    <div class="relative overflow-x-auto bg-neutral-primary-soft shadow-xs mt-3">

                        <form action="{{ route('penerimaan.obat.store') }}" method="post">
                            @csrf
                              <button class="text-white my-2 inline-flex items-center float-right bg-green-500 box-border border border-transparent hover:bg-green-600 mr-2 cursor-pointer focus:ring-4 focus:ring-brand-medium shadow-xs font-medium leading-5 rounded-sm text-sm px-4 py-1.5 focus:outline-none" id="btnSave" type="submit">
                               <svg class="w-4 h-4 me-1.5 -ms-0.5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none" viewBox="0 0 24 24">
                                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 11.917 9.724 16.5 19 7.5"/>
                                    </svg>

                                    Simpan
                             </button>
                        <!-- Modal toggle -->
                            <button data-modal-target="crud-modal" data-modal-toggle="crud-modal" class="inline-flex items-center text-white m-2 float-right bg-amber-400 box-border border border-transparent hover:bg-amber-600 focus:ring-4 focus:ring-brand-medium shadow-xs font-medium leading-5 rounded-sm text-sm px-4 py-1.5 cursor-pointer focus:outline-none" type="button">
                               <svg class="w-4 h-4 me-1.5 -ms-0.5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none" viewBox="0 0 24 24"><path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 12h14m-7 7V5"/></svg>
                                         Input Item obat
                            </button>

                            <div class="clear-both"></div>
                               <input type="hidden" name="id_penerimaan" value="{{ $penerimaan_obat->id }}">

                                <table class="w-full text-sm text-left rtl:text-right text-body">
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
                                                Harga
                                            </th>
                                            <th scope="col" class="px-6 py-3 font-medium">
                                                No Batch
                                            </th>
                                            <th scope="col" class="px-6 py-3 font-medium">
                                                Exp Date
                                            </th>
                                            <th scope="col" class="px-6 py-3 font-medium">
                                                Penyedia
                                            </th>
                                            <th scope="col" class="px-6 py-3 font-medium">
                                                Action
                                            </th>
                                        </tr>
                                    </thead>
                                <tbody id="data-body">

                                    @php
                                        
                                       // dd($penerimaan_obat->details);

                                    @endphp
                                    @foreach ($penerimaan_obat->details as  $list)



                                      <tr class="border-b border-default">
                                        <td class="px-6 py-4">{{ $loop->iteration }}</td>
                                        <td class="px-6 py-4">{{ $list->obat->nama }}</td>
                                        <td class="px-6 py-4">{{ $list->obat->satuan }}</td>
                                        <td class="px-6 py-4">{{ $list->qty }} </td>
                                        <td class="px-6 py-4">{{ $list->harga }} </td>
                                        <td class="px-6 py-4">{{ $list->no_batch }} </td>
                                        <td class="px-6 py-4">{{ $list->exp_date }}</td>
                                        <td class="px-6 py-4">{{ $list->penyedia }}</td>
                                        <td class="px-6 py-1">
                                             <div class="flex gap-2">
                                                <button data-modal-target="crud-modal" data-modal-toggle="crud-modal" class="text-amber-400  hover:text-amber-600 flex cursor-pointer text-sm edit-item"  data-id="{{ $list->id }}"  type="button">
                                                    <svg class="w-[18px] h-[18px]" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none" viewBox="0 0 24 24">
                                                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m14.304 4.844 2.852 2.852M7 7H4a1 1 0 0 0-1 1v10a1 1 0 0 0 1 1h11a1 1 0 0 0 1-1v-4.5m2.409-9.91a2.017 2.017 0 0 1 0 2.853l-6.844 6.844L8 14l.713-3.565 6.844-6.844a2.015 2.015 0 0 1 2.852 0Z"/>
                                                </svg>  
                                                </button>
                                                <form action="{{ route('penerimaan.item.destroy', $list->id) }}" method="POST" onsubmit="return confirm('Are you sure?')">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit" class=" text-red-500 cursor-pointer  hover:text-red-600 flex"> 
                                                            <svg class="w-[18px] h-[18px]" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none" viewBox="0 0 24 24">
                                                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 7h14m-9 3v8m4-8v8M10 3h4a1 1 0 0 1 1 1v3H9V4a1 1 0 0 1 1-1ZM6 7h12v13a1 1 0 0 1-1 1H7a1 1 0 0 1-1-1V7Z"/>
                                                        </svg>

                                                    </button>
                                                </form>
                                             </div>


                                        </td>
                                        
                                      </tr>
                                        
                                    @endforeach

                                </tbody>    
                            </table>
                            </form>
                    </div>
            </div>
            

            <!-- Main modal -->
         <div id="crud-modal" tabindex="-1" aria-hidden="true" class="hidden overflow-y-auto overflow-x-hidden fixed top-0 right-0 left-0 z-50 justify-center items-center w-full md:inset-0 h-[calc(100%-1rem)] max-h-full">
            <div class="relative w-full max-w-2xl max-h-full">
             <!-- Modal content -->
                 <div class="relative bg-neutral-primary-soft border border-default rounded-base shadow-sm p-4 md:p-6">
                      <!-- Modal header -->
                        <div class="flex items-center justify-between border-b border-default pb-4 md:pb-5">
                            <h3 class="text-lg font-medium text-heading">
                            Input Obat
                            </h3>
                            <button type="button" class="text-body bg-transparent hover:bg-neutral-tertiary hover:text-heading rounded-base text-sm w-9 h-9 ms-auto inline-flex justify-center items-center" data-modal-hide="crud-modal">
                                <svg class="w-5 h-5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none" viewBox="0 0 24 24"><path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18 17.94 6M18 18 6.06 6"/></svg>
                                <span class="sr-only">Close modal</span>
                            </button>
                        </div>

                        <!-- Modal body -->
                         <form action="#">

                                  <div id="methodField"></div>
                                  <input type="hidden" name="penerimaan_id" id="penerimaan_id">
                                  <input type="hidden" name="id" id="item_id">


                                <div class="col-span-1 pt-3">
                                    <label for="name" class="block mb-2.5 text-sm font-medium text-heading">Nama Obat</label>
                                    <input type="text" name="nama_obat" id="nama_obat"  list="listObat" class=" border border-default-medium text-heading text-sm rounded-base focus:ring-brand focus:border-brand block w-full px-3 py-2.5 shadow-xs placeholder:text-body" placeholder="ketik nama obat" autocomplete="off" required="">
                                    <datalist id="listObat"></datalist>
                                </div>

                                <input type="hidden" name="id_obat" value="" id="id_obat">
                                 <div class="grid gap-4 grid-cols-3 pt-3">
                                    <div class="mb-1">
                                        <label class="block mb-1.5 text-sm font-medium text-heading">Satuan</label>
                                        <input type="text" name="satuan" id="satuan"
                                            class="border border-default-medium text-heading text-sm rounded-base
                                                focus:ring-brand focus:border-brand block w-full px-3 py-2.5 shadow-xs placeholder:text-body"
                                            readonly>
                                    </div>

                                    <div class="mb-1">
                                        <label class="block mb-1.5 text-sm font-medium text-heading">Qty</label>
                                        <input type="text" name="qty" id="qty"
                                            class=" border border-default-medium text-heading text-sm rounded-base
                                                focus:ring-brand focus:border-brand block w-full px-3 py-2.5 shadow-xs placeholder:text-body"
                                            >
                                    </div>

                                    <div class="mb-1">
                                        <label class="block mb-1.5 text-sm font-medium text-heading">Harga</label>
                                        <input type="number" name="harga" id="harga"
                                            class=" border border-default-medium text-heading text-sm rounded-base
                                                focus:ring-brand focus:border-brand block w-full px-3 py-2.5 shadow-xs placeholder:text-body">
                                    </div>
                               </div>
                                <div class="grid gap-4 grid-cols-2 py-4 md:py-6">

                                    <div>
                                        <label class="block mb-2.5 text-sm font-medium text-heading">No Batch</label>
                                        <input type="text" name="no_batch" id="no_batch"
                                            class=" border border-default-medium text-heading text-sm rounded-base
                                                focus:ring-brand focus:border-brand block w-full px-3 py-2.5 shadow-xs placeholder:text-body">
                                    </div>
                                     <div>
                                        <label class="block mb-2.5 text-sm font-medium text-heading">Exp. Date</label>
                                        <input type="text" name="exp_date" id="exp_date"  autocomplete="off"  datepicker datepicker-format="dd-mm-yyyy"  datepicker datepicker-autohide 
                                            class=" border border-default-medium text-heading text-sm rounded-base
                                                focus:ring-brand focus:border-brand block w-full px-3 py-2.5 shadow-xs placeholder:text-body">
                                    </div>
                                </div>

                                  <div class="col-span-1">
                                    <label for="name" class="block mb-2.5 text-sm font-medium text-heading">Nama Penyedia</label>
                                    <input type="text" name="penyedia" id="penyedia"  class="border border-default-medium text-heading text-sm rounded-base focus:ring-brand focus:border-brand block w-full px-3 py-2.5 shadow-xs placeholder:text-body" placeholder="ketik nama penyedia" autocomplete="off" required="">
                                   
                                </div>
                               <div class="flex mt-4 items-end justify-end space-x-4 border-t border-default pt-4 md:pt-6">
                                  
                                    <button data-modal-hide="crud-modal" type="button" class="text-body bg-neutral-secondary-medium box-border border border-default-medium hover:bg-neutral-tertiary-medium hover:text-heading focus:ring-4 focus:ring-neutral-tertiary shadow-xs font-medium leading-5 rounded-base text-sm px-4 py-2.5 focus:outline-none">Cancel</button>
                                    <button type="button" id="addItem" class="inline-flex items-center  text-white bg-green-500 hover:bg-green-600 cursor-pointer box-border border border-transparent focus:ring-4 focus:ring-brand-medium shadow-xs font-medium leading-5 rounded-base text-sm px-4 py-2.5 focus:outline-none">
                                        <svg class="w-4 h-4 me-1.5 -ms-0.5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none" viewBox="0 0 24 24"><path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 12h14m-7 7V5"/></svg>
                                        Tambahkan
                                    </button>
                                </div>
                        </form>
                    </div>
                </div>
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
                            $("#id_obat").val(option.data("id"));
                        });


                        // === TAMBAH ITEM ===
                        $("#addItem").click(function () {

                            let id_obat = $("#id_obat").val();
                            let nama = $("#nama_obat").val();
                            let satuan = $("#satuan").val();
                            let qty = $("#qty").val();
                            let harga = $("#harga").val();
                            let batch = $("#no_batch").val();
                            let exp = $("#exp_date").val();
                            let penyedia = $("#penyedia").val();

                            if (nama === "" || qty === "") {
                                alert("Nama obat dan qty wajib diisi!");
                                return;
                            }

                            let row = `
                                <tr class="border-b border-default">
                                    <td class="px-6 py-4">#
                                    
                                    </td>
                                    <td class="px-6 py-4">${nama}
                                        <input type="hidden" name="items[nama_obat][]" value="${nama}">
                                        <input type="hidden" name="items[id_obat][]" value="${id_obat}">
                                    </td>
                                    <td class="px-6 py-4">${satuan}
                                        <input type="hidden" name="items[satuan][]" value="${satuan}">
                                    </td>
                                    <td class="px-6 py-4">${qty}
                                        <input type="hidden" name="items[qty][]" value="${qty}">
                                    </td>
                                    <td class="px-6 py-4">${harga}
                                        <input type="hidden" name="items[harga][]" value="${harga}">
                                    </td>
                                    <td class="px-6 py-4">${batch}
                                        <input type="hidden" name="items[batch][]" value="${batch}">
                                    </td>
                                    <td class="px-6 py-4">${exp}
                                        <input type="hidden" name="items[exp][]" value="${exp}">
                                    </td>
                                    <td class="px-6 py-4">${penyedia}
                                        <input type="hidden" name="items[penyedia][]" value="${penyedia}">
                                    </td>
                                    <td class="px-6 py-4">
                                        <button class="deleteRow text-red-600">Hapus</button>
                                    </td>
                                </tr>
                            `;

                            $("#data-body").append(row);

                            // Clear
                            $("#nama_obat, #satuan, #qty, #harga, #no_batch, #exp_date, #penyedia").val("");
                        });

                        // === DELETE ROW ===
                        $(document).on("click", ".deleteRow", function () {
                            $(this).closest("tr").remove();
                        });

                    });

                      $(document).on("click", ".edit-item", function () {
                            let id = $(this).data('id');
                            // ubah URL form menjadi UPDATE
                            $("#formInput").attr("action", "/penerimaan_item/" + id);
                                    
                            // Tambahkan PUT method
                            $("#methodField").html('<input type="hidden" name="_method" value="PUT">');
                            // Ubah teks tombol submit
                            $("#btnSubmit").text("Update");

                            // GET data obat
                            $.ajax({
                                url: "/penerimaan_detail/" + id + "/edit",
                                type: "GET",
                                success: function(res) {
                                    // isi ke field modal
                                    $("#item_id").val(res.id);
                                    $("#qty").val(res.qty);
                                    $("#harga").val(res.harga);
                                    $("#nama_obat").val(res.obat.nama);
                                    $("#satuan").val(res.obat.satuan);
                                    $("#no_batch").val(res.no_batch);
                                    $("#exp_date").val(res.exp_date);
                                    $("#penyedia").val(res.penyedia);
                                }
                            });
                        });
                

            });
        </script>
        @endpush

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
                    <a href="{{route('users.create')}}" class="rounded-md float-right bg-amber-500 hover:bg-amber-600 px-3 py-2 text-sm text-white">
                        Add User
                    </a>
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
                    <tbody  class="px-6 py-5 text-left text-sm  text-zinc-600">

                          @foreach($users as $usr)
                            <tr>
                                <td class="px-6 py-5 text-center border-red-100">{{ $loop->iteration }}</td>
                                <td class="px-6 py-5 font-semibold">
                                    <a href="{{route('users.edit', $usr->id)}}" class="text-zinc-800 hover:text-amber-500 hover:bg-gray-50">{{ $usr->name }}</a>
                                </td>
                                <td class="px-6 py-5">{{ $usr->nip }}</td>
                                <td class="px-6 py-5 ">{{ $usr->jabatan }}</td>
                                <td class="px-6 py-5">{{ $usr->bagian }}</td>
                                <td class="px-6 py-5">{{ $usr->lokasi_kerja }}</td>
                                <td class="px-6 py-5">{{ $usr->username }}</td>

                            </tr>
                        @endforeach

                    </tbody>
                </table>
            </div>



       <!-- Include this script tag or install `@tailwindplus/elements` via npm: -->
       <!-- <script src="https://cdn.jsdelivr.net/npm/@tailwindplus/elements@1" type="module"></script> -->

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



            });
        </script>
        @endpush

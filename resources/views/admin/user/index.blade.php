@extends('layouts.admin')
@push('after-styles')
    <style>
        #table-category_processing{
            display: none !important;
        }
    </style>
@endpush
@section('content')
   <section class="section">
       <div class="section-header">
         <h1>User</h1>
       </div>
 
       <div class="section-body">
         
           <div class="card">
               <div class="card-header">
                  <a href="{{ route('user.create') }}" class="btn btn-primary" ><i class="fa fa-plus-circle"></i> User</a>
                 
               </div>
 
               <div class="card-body">
                  {{-- info session --}}
                  @if (session('success'))
                     <div class="alert alert-success">
                        {{ session('success') }}
                     </div>
                  @endif
                   <div class="table-responsive">
                       <table class="table table-bordered" id="table-category" style="width:100%">
                           <thead>
                             <tr class="text-center">
                                 <th scope="col" style="text-align: center;width: 3%">NO.</th>
                                 <th  scope="col">Name</th>
                                 <th  scope="col">Email</th>
                                 <th  scope="col">Roles</th>
                                 <th scope="col" style="width: 18%;">AKSI</th>
                             </tr>
                           </thead>
                           <tbody>
                          
                           </tbody>
                       </table>
                       
                   </div>
               </div>
           </div>
       </div>
 
   </section>
 
@endsection

@push('after-script')
   <script>
       $(document).ready(function() {
        var table = $('#table-category').DataTable({
               processing: true,
               serverSide: true,
               ajax: "{!! url()->current() !!}",
               columns: [
                { data: 'DT_RowIndex', name: 'DT_RowIndex', orderable: false },
                   {data: 'name', name: 'name'},
                   {data: 'email', name: 'email'},
                   {data: 'roles', name: 'roles'},
                   {data: 'action', name: 'action', orderable: false, searchable: false},
               ],
               columnDefs: [
                    { className: 'text-center', targets: [0,1,2,3,4] },
                ],
           });

           setInterval( function () {
            $('#table-category').DataTable().draw(true);
            }, 2000 );
       });
   </script>
@endpush
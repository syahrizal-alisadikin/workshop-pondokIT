@extends('layouts.admin')

@section('content')
   <section class="section">
       <div class="section-header">
         <h1>Category</h1>
       </div>
 
       <div class="section-body">
         
           <div class="card">
               <div class="card-header">
                  <a href="{{ route('category.create') }}" class="btn btn-primary" ><i class="fa fa-plus-circle"></i> Category</a>
                 
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
                                 <th  scope="col">Image</th>
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
           $('#table-category').DataTable({
               processing: true,
               serverSide: true,
               ajax: "{{ route('category.index') }}",
               columns: [
                   {data: 'id', name: 'id'},
                   {data: 'name', name: 'name'},
                   {data: 'image', name: 'image'},
                   {data: 'action', name: 'action', orderable: false, searchable: false},
               ]
           });
       });
   </script>
@endpush
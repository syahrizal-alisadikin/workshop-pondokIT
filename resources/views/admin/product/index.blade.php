@extends('layouts.admin')

@section('content')
   <section class="section">
       <div class="section-header">
         <h1>Product</h1>
       </div>
 
       <div class="section-body">
         
           <div class="card">
               <div class="card-header">
                  <a href="{{ route('product.create') }}" class="btn btn-primary" ><i class="fa fa-plus-circle"></i> Product</a>
                 
               </div>
 
               <div class="card-body">
                  {{-- info session --}}
                  @if (session('success'))
                     <div class="alert alert-success">
                        {{ session('success') }}
                     </div>
                  @endif
                   <div class="table-responsive">
                       <table class="table table-bordered" id="table-product" style="width:100%">
                           <thead>
                             <tr class="text-center">
                                 <th scope="col" style="text-align: center;width: 3%">NO.</th>
                                 <th  scope="col">Name</th>
                                 <th  scope="col">Image</th>
                                 <th scope="col">Category</th>
                                 <th scope="col">Price</th>
                                 <th scope="col">Discount</th>
                                 <th scope="col">Price Discount</th>

                                 <th scope="col">Stock</th>

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
           $('#table-product').DataTable({
               processing: true,
               serverSide: true,
               ajax: "{!! url()->current() !!}",
               columns: [
                   {data: 'id', name: 'id'},
                   {data: 'name', name: 'name'},
                   {data: 'image', name: 'image'},
                   {data: 'category.name', name: 'category.name'},
                   {data: 'price', name: 'price'},
                   {data: 'discount', name: 'discount'},
                   {data: 'pricedis', name: 'pricedis'},
                   {data: 'stock', name: 'stock'},

                   {data: 'action', name: 'action', orderable: false, searchable: false},
               ]
           });
       });
   </script>
@endpush
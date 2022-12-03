@extends('layouts.admin')

@section('content')
   <section class="section">
       <div class="section-header">
         <h1>Order</h1>
       </div>
 
       <div class="section-body">
         
           <div class="card">
               {{-- <div class="card-header">
                  <a href="{{ route('product.create') }}" class="btn btn-primary" ><i class="fa fa-plus-circle"></i> Product</a>
                 
               </div> --}}
 
               <div class="card-body">
                  {{-- info session --}}
                  @if (session('success'))
                     <div class="alert alert-success">
                        {{ session('success') }}
                     </div>
                  @endif
                   <div class="table-responsive">
                       <table class="table table-bordered" id="table-order" style="width:100%">
                           <thead>
                             <tr class="text-center">
                                 <th scope="col" style="text-align: center;width: 3%">NO.</th>
                                 <th  scope="col">Invoice</th>
                                 <th  scope="col">User</th>
                                 <th  scope="col">Product</th>
                                 <th scope="col">Total</th>
                                 <th scope="col">Discount</th>

                                 <th scope="col">Quantity</th>

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
           $('#table-order').DataTable({
               processing: true,
               serverSide: true,
               ajax: "{!! url()->current() !!}",
               columns: [
                   {data: 'id', name: 'id'},
                   {data: 'invoice', name: 'invoice'},
                   {data: 'user.name', name: 'user.name'},
                   {data: 'product.name', name: 'product.name'},
                   {data: 'total', name: 'total'},
                   {data: 'discount', name: 'discount'},
                   {data: 'qty', name: 'qty'},

                   {data: 'action', name: 'action', orderable: false, searchable: false},
               ]
           });
       });
   </script>
@endpush
@extends('layouts.frontend')

@section('content')
<div class="container-fluid mb-5 mt-4">
   <div class="row">
      <div class="col-md-3 mb-4">
         <!-- Menu -->
         <div class="card border-0 rounded shadow">
            <div class="card-body">
               <h5 class="font-weight-bold">MAIN MENU</h5>
               <hr>
               <ul class="list-group">
                  <a href={{ route('dashboard.user') }} class="list-group-item text-decoration-none text-uppercase {{   Request::path() == "user/dashboard" ? 'text-white' : 'text-dark'  }}  {{Request::path() == "user/dashboard" ? 'active' : ''  }}"><i
                     class="fas fa-tachometer-alt"></i> Dashboard</a>
                  <a href="{{ route('orders.user') }}" class="list-group-item text-decoration-none text-uppercase  {{   Request::path() == "user/orders" ? 'text-white' : 'text-dark'  }}  {{Request::path() == "user/orders" ? 'active' : ''  }}"><i
                        class="fas fa-shopping-cart"></i> My Order</a>
                  <a href="#" style="cursor:pointer" onclick="event.preventDefault();
                  document.getElementById('logout-form').submit()";
                     class="list-group-item text-decoration-none text-dark text-uppercase"><i
                        class="fas fa-sign-out-alt"></i> Logout</a>
                        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                           @csrf
                       </form>
               </ul>
            </div>
         </div>
         <!-- Menu -->
      </div>
      <div class="col-md-9 mb-4">
         <div class="card border-0 rounded shadow">
            <div class="card-body table-responsive">
               <h5 class=" font-weight-bold"> <i class="fas fa-shopping-cart"></i> MY ORDER</h5>
               <hr>
               <table class="table table-striped table-bordered">
                  <thead class="thead-dark">
                     <tr>
                        <th scope="col">INVOICE</th>
                        <th scope="col">PRODUCT</th>
                        <th scope="col">PRICE</th>
                        <th scope="col">DISCOUNT</th>
                        <th scope="col">TANGGAL MULAI</th>
                        <th scope="col">TANGGAL KEMBALI</th>
                        <th scope="col">TOTAL PEMBAYARAN</th>
                        <th scope="col">STATUS PEMBAYARAN</th>
                        <th scope="col">AKSI</th>
                     </tr>
                  </thead>
                  <tbody>
                     @forelse ($orders as $item)
                         {{-- data ada --}}
                         <tr>
                           <td>{{ $item->invoice }}</td>
                           <td>{{ $item->product->name }}</td>
                           <td>{{ MoneyFormat($item->product->price) }}</td>
                           <td>{{ $item->discount }}</td>
                           <td>{{ $item->star_date ?? "-" }}</td>
                           <td>{{ $item->end_date ?? "-" }}</td>
                           <td>{{ $item->total }}</td>
                           <td>{{ $item->status }}</td>
                           <td><a href="{{ $item->midtrans_id }}" class="btn btn-primary">Bayar</a></td>
                         </tr>
                     @empty
                         {{-- klo data kosong --}}
                         <tr>
                           <td>Data Tidak ada</td>
                         </tr>
                     @endforelse

                  </tbody>
               </table>
            </div>
         </div>
      </div>
   </div>
</div>
  
@endsection
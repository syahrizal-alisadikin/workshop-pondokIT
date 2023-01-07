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
                  <a href="#" class="list-group-item text-decoration-none text-uppercase {{Request::path() == "user/dashboard" ? 'text-white' : 'text-dark'  }}  {{Request::path() == "user/dashboard" ? 'active' : ''  }}"><i
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
            <div class="card-body">
               <h5 class="font-weight-bold"> <i class="fas fa-tachometer-alt"></i> DASHBOARD</h5>
               <hr>
               Selamat Datang {{ auth()->user()->name }} <strong></strong>
            </div>
         </div>
      </div>
   </div>
</div>
  
@endsection
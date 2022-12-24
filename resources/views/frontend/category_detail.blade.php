@extends('layouts.frontend')

@section('content')
   <!-- Silder -->
   <div class="container-fluid mt-3">
      <div class="row">
         <div class="col-md-3 mb-4">
            <!-- Menu -->
            <div class="card border-0 shadow rounded">
               <div class="card-body">
                  <h5 class="font-weight-bold"><i class="fa fa-shopping-bag"></i> KATEGORI</h5>
                  <hr>
                  <ul class="list-group">

                     @foreach ($categories as $item)
                         
                     <a href="{{ route('home.category.detail',$item->slug) }}"
                        class="list-group-item  shadow-sm font-weight-bold text-decoration-none {{Request::path() == "category/".$item->slug ? 'text-white' : 'text-dark'  }}  {{Request::path() == "category/".$item->slug ? 'active' : ''  }}">
                        <img src="{{ Storage::url('category/'.$item->image) }}" style="width: 35px;"> {{ $item->name }} 
                     </a>
                     @endforeach

                     <a href="{{ route('home.category') }}"
                        class="list-group-item text-center active shadow-sm font-weight-bold text-decoration-none">LIHAT
                        KATEGORI LAINNYA <i class="fa fa-long-arrow-alt-right"></i></a>
                  </ul>
               </div>
            </div>
            <!-- Menu -->
         </div>
         <div class="col-md-9 mb-4">
            <!-- Priduct Category -->
            <div class="row">
               <div class="col-md-12 ">
                  <h4 class="font-weight-bold"><i class="fa fa-shopping-bag"></i> PRODUK Category {{ $category->name }}</h4>
                  <hr style="border-top: 5px solid rgb(154 155 156);border-radius:.5rem">
               </div>
            </div>

            <div class="row">

               @forelse ($products as $item)
               <!-- Column 3 -->
               <div class="col-md-3 col-sm-12 mb-3">
                  <div class="card h-100 border-0 shadow rounded-md">
                     <div class="card-img">
                        <img src="{{ Storage::url('product/'.$item->image) }}" class="w-100"
                           style="height: 18em;object-fit:cover;border-top-left-radius: .25rem;border-top-right-radius: .25rem;">
                     </div>
                     <div class="card-body">
                        <a href="product-detail.html" class="card-title font-weight-bold" style="font-size:20px">
                           {{ $item->name }}
                        </a>
      
                        <div class="discount mt-2" style="color: #999"><s>{{ moneyFormat($item->price) }}</s> <span
                              style="background-color: darkorange" class="badge badge-pill badge-success text-white">DISKON
                              {{ $item->discount }}%
                           </span>
                        </div>
      
                        <div class="price font-weight-bold mt-3" style="color: #47b04b;font-size:20px">
                           {{ Discount($item->price,$item->discount) }}</div>
                        <a href="product-detail.html" class="btn btn-primary btn-md mt-3 btn-block shadow-md">LIHAT PRODUK</a>
                     </div>
                  </div>
               </div>
               <!-- Column 3 -->
               @empty
               <div class="col-md-3 col-sm-12 mb-3">
                  <div class="card h-100 border-0 shadow rounded-md">
                     {{-- <div class="card-img">
                        <img src="/assets/image/laptop.jpeg" class="w-100"
                           style="height: 15em;object-fit:cover;border-top-left-radius: .25rem;border-top-right-radius: .25rem;">
                     </div> --}}
                     <div class="card-body">
                        <a href="#" class="card-title font-weight-bold" style="font-size:20px">
                           Product Tidak ada
                        </a>

                        
                     </div>
                  </div>
               </div>
               @endforelse
               <!-- Column 3 -->
               
               <!-- Column 3 -->


            </div>
            <!-- Priduct Category -->
         </div>
      </div>
   </div>
   <!-- Slider -->
@endsection
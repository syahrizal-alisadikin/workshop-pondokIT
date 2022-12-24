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
                         
                     <a href="category-detail.html"
                        class="list-group-item  shadow-sm font-weight-bold text-decoration-none text-dark">
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
            <!-- Slider -->
            <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
               <ol class="carousel-indicators">
                  <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
                  <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
                  <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
               </ol>
               <div class="carousel-inner">
                  <div class="carousel-item active">
                     <img class="d-block w-100" src="{{ asset('/') }}assets/frontend/image/slider.png" alt="First slide">
                  </div>
                  <div class="carousel-item">
                     <img class="d-block w-100" src="{{ asset('/') }}assets/frontend/image/slider.png" alt="Second slide">
                  </div>
                  <div class="carousel-item">
                     <img class="d-block w-100" src="{{ asset('/') }}assets/frontend/image/slider.png" alt="Third slide">
                  </div>
               </div>
               <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
                  <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                  <span class="sr-only">Previous</span>
               </a>
               <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
                  <span class="carousel-control-next-icon" aria-hidden="true"></span>
                  <span class="sr-only">Next</span>
               </a>
            </div>
            <!-- Slider -->
         </div>
      </div>
   </div>
   <!-- Slider -->
   <!-- Product -->
   <div class="container-fluid mb-5 mt-4">
      <!-- data product -->

      <div class="row">
         <div class="col-md-12 ">
            <h4 class="font-weight-bold"><i class="fa fa-shopping-bag"></i> PRODUK TERBARU</h4>
            <hr style="border-top: 5px solid rgb(154 155 156);border-radius:.5rem">
         </div>
      </div>

      <div class="row">
         @foreach ($products as $item)
         <!-- Column 3 -->
         <div class="col-md-3 col-sm-12 mb-3">
            <div class="card h-100 border-0 shadow rounded-md">
               <div class="card-img">
                  <img src="{{ Storage::url('product/'.$item->image) }}" class="w-100"
                     style="height: 18em;object-fit:cover;border-top-left-radius: .25rem;border-top-right-radius: .25rem;">
               </div>
               <div class="card-body">
                  <a href="{{ route('home.product.detail',$item->slug) }}" class="card-title font-weight-bold" style="font-size:20px">
                     {{ $item->name }}
                  </a>

                  <div class="discount mt-2" style="color: #999"><s>{{ moneyFormat($item->price) }}</s> <span
                        style="background-color: darkorange" class="badge badge-pill badge-success text-white">DISKON
                        {{ $item->discount }}%
                     </span>
                  </div>

                  <div class="price font-weight-bold mt-3" style="color: #47b04b;font-size:20px">
                     {{ Discount($item->price,$item->discount) }}</div>
                  <a href="{{ route('home.product.detail',$item->slug) }}" class="btn btn-primary btn-md mt-3 btn-block shadow-md">LIHAT PRODUK</a>
               </div>
            </div>
         </div>
         <!-- Column 3 -->
             
         @endforeach

       

      </div>

   </div>
@endsection
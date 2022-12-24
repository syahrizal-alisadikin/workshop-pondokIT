@extends('layouts.frontend')

@section('content')
     <!-- Silder -->
   <div class="container-fluid mt-3">
      <div class="row">

         <div class="col-md-12 mb-4">
            <h5 class="font-weight-bold"><i class="fa fa-shopping-bag"></i> KATEGORI</h5>
            <hr>
            <div class="row">
               @forelse ( $categories as $item )
               <div class="col-md-3 col-6 mb-3">
                  <a href="{{ route('home.category.detail',$item->slug) }}">
                     <div class="card h-100 border-0 rounded shadow">
                        <div class="card-body text-center">
                           <img src="{{ Storage::url('category/'.$item->image) }}" style="width: 100px;">
                           <hr>
                           <label class="font-weight-bold">{{ $item->name }}</label>
                        </div>
                     </div>
                  </a>
               </div>
               @empty
               <div class="col-md-3 col-6 mb-3">
                  <a href="#">
                     <div class="card h-100 border-0 rounded shadow">
                        <div class="card-body text-center">
                           {{-- <img src="{{ asset('') }}assets/frontend/image/category.png" style="width: 100px;"> --}}
                           <hr>
                           <label class="font-weight-bold">Categories Tidak ada</label>
                        </div>
                     </div>
                  </a>
               </div>
               @endforelse
                   
               
              
            </div>
         </div>
      </div>
   </div>
   <!-- Slider -->
@endsection
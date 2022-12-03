@extends('layouts.admin')

@section('content')
<section class="section">
   <div class="section-header">
     <h1>Tambah Category</h1>
   </div>

   <div class="section-body">
     {{-- validate error --}}
       {{-- @if ($errors->any())
             <div class="alert alert-danger">
                <ul>
                      @foreach ($errors->all() as $error)
                         <li>{{ $error }}</li>
                      @endforeach
                </ul>
             </div>
         @endif --}}
       <div class="card">
          

           <div class="card-body">
              
              <form action="{{ route('category.store') }}" method="POST" enctype="multipart/form-data">
               @csrf
               <div class="form-group">
                  <label>Nama Category</label>
                  <input type="text" name="name" class="form-control @error('name') is-invalid @enderror" value="{{ old('name') }}"
                     
                   placeholder="Masukan Nama Category">
                  @error('name')
                  <div class="invalid-feedback">
                     {{ $message }}
                  </div>
                  @enderror
                </div>
                <div class="form-group">
                  <label>Image</label>
                  <input type="file" name="image" class="form-control @error('image') is-invalid @enderror">
                  @error('image')
                  <div class="invalid-feedback">
                     {{ $message }}
                  </div>
                  @enderror
                </div>
                <div class="form-group">
                  
                  <button type="submit" class="btn btn-primary">Simpan</button>
                </div>
              </form>
           </div>
       </div>
   </div>

</section>
@endsection
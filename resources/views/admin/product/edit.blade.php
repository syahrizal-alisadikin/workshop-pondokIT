@extends('layouts.admin')

@section('content')
<section class="section">
   <div class="section-header">
     <h1>Edit Product</h1>
   </div>

   <div class="section-body">
    
       <div class="card">
          
           <div class="card-body">
              
              <form action="{{ route('product.update',$product->id) }}" method="POST" enctype="multipart/form-data">
               @method('PUT')
               @csrf
               <div class="form-group">
                  <label>Nama Product</label>
                  <input type="text" name="name" class="form-control @error('name') is-invalid @enderror" value="{{ old('name',$product->name) }}"
                     
                   placeholder="Masukan Nama Product">
                  @error('name')
                  <div class="invalid-feedback">
                     {{ $message }}
                  </div>
                  @enderror
                </div>

                <div class="form-group">
                  <label>Price</label>
                  <input type="number" name="price" class="form-control @error('price') is-invalid @enderror" value="{{ old('price',$product->price) }}"
                     
                   placeholder="Masukan Price Product">
                  @error('price')
                  <div class="invalid-feedback">
                     {{ $message }}
                  </div>
                  @enderror
                </div>

                <div class="form-group">
                  <label>Discount</label>
                  <input type="number" name="discount" class="form-control @error('discount') is-invalid 
                  
                  @enderror" value="{{ old('discount',$product->discount) }}"
                     
                   placeholder="Masukan Price Product">
                   <span>Discount dalam bentuk Persen(%)</span>
                  @error('discount')
                  <div class="invalid-feedback">
                     {{ $message }}
                  </div>
                  @enderror
                </div>

                <div class="form-group">
                  <label>Stock</label>
                  <input type="number" name="stock" class="form-control @error('stock') is-invalid @enderror" value="{{ old('stock',$product->stock) }}"
                     
                   placeholder="Masukan Stock Product">
                  @error('stock')
                  <div class="invalid-feedback">
                     {{ $message }}
                  </div>
                  @enderror
                </div>
                <div class="form-group">
                  <label>Category</label>
                  <select name="category_id" class="form-control" id="">
                     <option value="">Pilih Category</option>
                     @foreach ($category as $item)
                     <option value="{{ $item->id }}" {{ $item->id == $product->category_id ? "selected" : "" }}>{{ $item->name }}</option>
                     @endforeach
                  </select>
                  @error('stock')
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
                  <label for="">Description</label>
                  <textarea name="description" id="" cols="30" rows="5" class="form-control @error('description') is-invalid @enderror">{{ old('description',$product->description) }}</textarea>
                  @error('description')
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
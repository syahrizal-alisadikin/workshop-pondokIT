@extends('layouts.admin')

@section('content')
<section class="section">
   <div class="section-header">
     <h1>Edit User</h1>
   </div>

   <div class="section-body">
     
      <div class="card">
         

          <div class="card-body">
             
             <form action="{{ route('user.update',$user) }}" method="POST" enctype="multipart/form-data">
              @csrf
              @method("PUT")
              <div class="form-group">
                 <label>Nama</label>
                 <input type="text" name="name" class="form-control @error('name') is-invalid @enderror" value="{{ old('name',$user->name) }}"
                    
                  placeholder="Masukan Nama">
                 @error('name')
                 <div class="invalid-feedback">
                    {{ $message }}
                 </div>
                 @enderror
               </div>
               
               <div class="form-group">
                 <label>Email</label>
                 <input type="email" name="email" class="form-control @error('email') is-invalid @enderror" value="{{ old('email',$user->email) }}"
                    
                  placeholder="Masukan Email">
                 @error('email')
                 <div class="invalid-feedback">
                    {{ $message }}
                 </div>
                 @enderror
               </div>
               <div class="form-group">
                 <label>Roles</label>
               <select name="roles" class="form-control @error('roles') is-invalid @enderror" id="">
                 <option value="">Select Roles</option>
                 <option value="ADMIN" {{ old('roles',$user->roles) == "ADMIN" ? "selected": "" }}>ADMIN</option>
                 <option value="USER"  {{ old('roles',$user->roles) == "USER" ? "selected": "" }}>USER</option>
               </select>
                 @error('roles')
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
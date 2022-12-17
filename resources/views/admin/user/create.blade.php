@extends('layouts.admin')

@section('content')
<section class="section">
   <div class="section-header">
     <h1>Tambah User</h1>
   </div>

   <div class="section-body">
     
       <div class="card">
          

           <div class="card-body">
              
              <form action="{{ route('user.store') }}" method="POST" enctype="multipart/form-data">
               @csrf
               <div class="form-group">
                  <label>Nama</label>
                  <input type="text" name="name" class="form-control @error('name') is-invalid @enderror" value="{{ old('name') }}"
                     
                   placeholder="Masukan Nama">
                  @error('name')
                  <div class="invalid-feedback">
                     {{ $message }}
                  </div>
                  @enderror
                </div>
                
                <div class="form-group">
                  <label>Email</label>
                  <input type="email" name="email" class="form-control @error('email') is-invalid @enderror" value="{{ old('email') }}"
                     
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
                  <option value="ADMIN" {{ old('roles') == "ADMIN" ? "selected": "" }}>ADMIN</option>
                  <option value="USER"  {{ old('roles') == "USER" ? "selected": "" }}>USER</option>
                </select>
                  @error('roles')
                  <div class="invalid-feedback">
                     {{ $message }}
                  </div>
                  @enderror
                </div>
                <div class="row">
                  <div class="col-md-6">
                      <div class="form-group">
                          <label>PASSWORD</label>
                          <input type="password" name="password" value="{{ old('password') }}" placeholder="Masukkan Password"
                              class="form-control @error('password') is-invalid @enderror">

                          @error('password')
                          <div class="invalid-feedback" style="display: block">
                              {{ $message }}
                          </div>
                          @enderror
                      </div>
                  </div>
                  <div class="col-md-6">
                      <div class="form-group">
                          <label>PASSWORD</label>
                          <input type="password" name="password_confirmation" value="{{ old('password_confirmation') }}" placeholder="Masukkan Konfirmasi Password"
                              class="form-control">
                      </div>
                  </div>
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
@extends('layouts.frontend')

@section('content')
<div class="container mt-5 mb-5">
   <div class="row">
      <div class="col-md-4">
         <div class="card border-0 rounded shadow">
            <div class="card-body p-2">
               <img src="{{ Storage::url('product/'.$product->image) }}" class="w-100 border">
            </div>
         </div>
      </div>
      <div class="col-md-8">
         <div class="card border-0 rounded shadow">
            <div class="card-body">
               <label class="font-weight-bold" style="font-size: 20px;"> {{ $product->name }} </label>
               <hr>
               <div class="price-product" id="price-product" style="font-size: 1.35rem"><span
                     class="font-weight-bold mr-4" style="color: green">{{ Discount($product->price,$product->discount) }}</span>
                  <s class="font-weight-bold" style="text-decoration-color:red">{{ moneyFormat($product->price) }}</s>
               </div>
               <table class="table table-borderless mt-3">
                  <tbody>
                     <tr>
                        <td class="font-weight-bold">DISKON</td>
                        <td>:</td>
                        <td>
                           <button class="btn btn-sm" style="color: #ff2f00;border-color: #ff2f00;">
                              DISKON {{ $product->discount }} %
                           </button>
                        </td>
                     </tr>
                     <tr>
                        <td class="font-weight-bold">HARI</td>
                        <td>:</td>
                        <td>
                           <select name="hari" id="hari" class="form-control">
                              <option value="1">1 Hari</option>
                              <option value="2">2 Hari</option>
                              <option value="3">3 Hari</option>
                              <option value="4">4 Hari</option>
                              <option value="5">5 Hari</option>
                              <option value="6">6 Hari</option>
                              <option value="7">7 Hari</option>
                           </select>
                        </td>
                        <td></td>
                     </tr>
                     <tr>
                        <td class="font-weight-bold">TOTAL PEMBAYARAN</td>
                        <td>:</td>
                        <td>
                           <span class="font-weight-bold" id="total" style="color: green">Rp.5000.000</span>
                        </td>
                        <td></td>
                     </tr>

                  </tbody>
               </table>
               <button class="btn btn-primary btn-lg btn-block"><i class="fa fa-shopping-cart"></i> SEWA
                  PRODUCT</button>
            </div>
         </div>
      </div>
   </div>
   <div class="row mt-5">
      <div class="col-md-12">
         <div class="card border-0 rounded shadow">
            <div class="card-body">
               <label class="font-weight-bold" style="font-size: 20px;">KETERANGAN</label>
               <hr>
               <div> {{ $product->description }}</div>
            </div>
         </div>
      </div>
   </div>
</div>
@endsection
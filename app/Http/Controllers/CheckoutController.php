<?php

namespace App\Http\Controllers;

use App\Models\Order;
use App\Models\Product;
use Illuminate\Http\Request;
use Carbon\Carbon;
use Midtrans\Snap;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class CheckoutController extends Controller
{
    public function checkout(Request $req)
    {

        // Set your Merchant Server Key
        \Midtrans\Config::$serverKey = config('services.midtrans.serverKey');
        // Set to Development/Sandbox Environment (default). Set to true for Production Environment (accept real transaction).
        \Midtrans\Config::$isProduction = config('services.midtrans.isProduction');
        // Set sanitization on (default)
        \Midtrans\Config::$isSanitized = config('services.midtrans.isSanitized');
        // Set 3DS transaction for credit card to true is3ds
        \Midtrans\Config::$is3ds = config('services.midtrans.is3ds');

        DB::beginTransaction();

        try {
            $product = Product::find($req->product_id);
            $order = Order::create([
                'invoice' => "INV-" . mt_rand(1000, 9999),
                'user_id' => auth()->user()->id,
                'product_id' => $req->product_id,
                "qty" => 1,
                "total" => $req->price,
                "discount" => $product->discount,
                "status" => "pending",
                "star_date" => date('Y-m-d'),
                "end_date" => Carbon::now()->addDays($req->hari)->format('Y-m-d'),
            ]);

            $params = array(
                'transaction_details' => [
                    'order_id' => $order->invoice,
                    'gross_amount' => $order->total,
                ],
                "customer_details" => [
                    "first_name" => Auth::user()->name,
                    "email" => Auth::user()->email,
                ],
                "enabled_payments" => [
                    "gopay", "indomaret", "bca_klikbca", "bank_transfer"
                ],
                "vtweb" => []
            );
            $paymentUrl = Snap::createTransaction($params)->redirect_url;
            // Get Snap Payment Page URL
            $order->update([
                'midtrans_id' => $paymentUrl,
            ]);
            DB::commit();
            // Redirect to Snap Payment Page
            return redirect($paymentUrl);
        } catch (Exception $e) {
            DB::rollBack();
            echo $e->getMessage();
        }
    }
}

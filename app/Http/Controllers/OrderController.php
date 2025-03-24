<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use App\Models\Discount;
use App\Models\Order;
use Illuminate\Container\Attributes\Auth;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Shetabit\Multipay\Invoice;
use Shetabit\Multipay\Payment;
use Shetabit\Multipay\Exceptions\InvalidPaymentException;
use Spatie\Permission\Models\Permission;

class OrderController extends Controller
{
    public $price = 0;
    public function payment(Request $request)  {

        $paymentConfig = require(config_path('payment.php'));
        $payment = new Payment($paymentConfig);

        $user = auth()->id();
        $cart = Cart::where('user_id',$user)->get();
        foreach($cart as $item){
            $this->price += $item->getProduct()->price;
            // dd($item);
        }
        $result = Discount::where('code',$request->request_discount)->get()->first();
        if($result && $result->status && $result->count < 0 ){
            $result->update(['count' => $result-1]);
            $this->price -= $this->price * $result->discount / 100;
        }


        // Create new invoice.
        // $invoice = new Invoice;

        // Set invoice amount.
        // $invoice->amount($this->price);
        // $invoice->uuid();

        $order = Order::create([
            'user_id' => $user,
            'pay' => $this->price,
            // 'transactionId' => Hash::make($invoice->getUuid()),
            'payment_status' => false,
        ]);//http://127.0.0.1:8000/pay_back

        return $payment->via('local')
            // ->callbackUrl(route('pay_back'))
            ->purchase(
                (new Invoice)->amount($this->price),
                function($driver, $transactionId)use($order) {
                    $order->update([
                        'transactionId' => $transactionId,
                    ]);
                }
            )->pay()->render();
        // return dd($order);
    }

    public function callBack(Request $request){
        // $payment = new Payment();
        // $receipt = $payment->via('local')->verify();
        // return dd($request->cancel);

        if($request->cancel){
            return redirect(route('order'));
        }else{
            $order = Order::where(
                'transactionId' , $request->transactionId
            )->first()->update([
                'payment_status' => true,
            ]);
            $permission = Permission::create([auth()->id() => 'read']);
            return redirect(route('filament.panel.pages.dashboard'));
        }

    }

}

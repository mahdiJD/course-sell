<?php

namespace App\Http\Controllers;

use App\Models\SmsCode;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Ipe\Sdk\Facades\SmsIr;
use User;

class SmsController extends Controller
{
    public function show(){
        $user = auth()->user();
        $sms = SmsCode::where('mobile',$user->mobile)->first();
        $response = null;
        // dd($sms);
        if (!$sms || Carbon::parse($sms->updated_at)->addMinutes(1)->isPast()) {
            $code = rand(1000,9999);
            SmsCode::updateOrCreate([
                'mobile' => $user->mobile,
                'code' => $code,
            ]);

            $mobile = $user->mobile; // شماره موبایل گیرنده
            $templateId = 123456; // شناسه الگو
            $parameters = [
                [
                    "name" => "Code",
                    "value" => $code
                ]
            ];

            $response = SmsIr::verifySend($mobile, $templateId, $parameters);

        }

        if($response->status === 1){
            return view('auth.sms-verify');
        }
        return redirect(route('home'));
    }

    public function check(Request $request){
        $user = auth()->user();
        $sms = SmsCode::where('mobile',$user->mobile)->first();
        // dd($sms->code);
        // dd(Carbon::parse($sms->updated_at)->addMinutes(2)->isPast());
        if ( $sms==null
        // || Carbon::parse($sms->updated_at)->addMinutes(2)->isPast()
        || $request->code == $sms->code
        ) {
            return back()->with('message', 'no');
        }
        $user->update([
            'verify_at' => $sms->updated_at
        ]);
        return redirect(route('filament.panel.pages.dashboard'));
    }
}

<?php
namespace App\Http\Controllers\Api\V1;
use App\Http\Controllers\Controller;
use App\Models\SmsCode;
use Illuminate\Http\Request;
class AuthController extends Controller
{
    /**
     * @OA\Post(
     ** path="/api/v1/send_sms",
     *  tags={"Auth Api"},
     *  description="use for send verification sms to user",
     * @OA\RequestBody(
     *    required=true,
     * *         @OA\MediaType(
     *           mediaType="multipart/form-data",
     *           @OA\Schema(
     *           @OA\Property(
     *                  property="mobile",
     *                  description="Enter mobile number",
     *                  type="string",
     *               ),
     *     )
     *   )
     * ),
     *   @OA\Response(
     *      response=200,
     *      description="Its Ok",
     *      @OA\MediaType(
     *           mediaType="application/json",
     *      )
     *   )
     *)
     **/
    public function sendSms(Request $request){
        $mobile = $request->input('mobile');
        $checkLastSms = SmsCode::checkTowMin($mobile);
        if(!$checkLastSms){
            $code = rand(1000,9999);
            SmsCode::query()->create([
                'mobile' => $mobile,
                'code' => $code,
            ]);
            return Response()->json([
                'result' => true,
                'message' => 'create',
                'data' => [
                    'mobile' => $mobile,
                    'code' => $code,
                ],
            ],201);
        }
        else{
            return Response()->json([
                'result' => false,
                'message' => 'wait',
                'data' => [],
            ],403);
        }
    }
}

<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Session; 
// use Srmklive\PayPal\Services\PayPal as PayPalClient;
// use PayPal\Api\Amount;
// use PayPal\Api\Payer;
// use PayPal\Api\Payment;
// use PayPal\Api\RedirectUrls;
// use PayPal\Api\Transaction;
// use PayPal\Auth\OAuthTokenCredential;
// use PayPal\Rest\ApiContext;

use Vnpay;

class PaymentController extends Controller
{
    public function execPostRequest($url, $data)
    {
        $ch = curl_init($url);
        curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "POST");
        curl_setopt($ch, CURLOPT_POSTFIELDS, $data);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_HTTPHEADER, array(
                'Content-Type: application/json',
                'Content-Length: ' . strlen($data))
        );
        curl_setopt($ch, CURLOPT_TIMEOUT, 5);
        curl_setopt($ch, CURLOPT_CONNECTTIMEOUT, 5);
        //execute post
        $result = curl_exec($ch);
        //close connection
        curl_close($ch);
        return $result;
    }


    public function momo_payment(Request $request)
    {
        $endpoint = "https://test-payment.momo.vn/v2/gateway/api/create";

        $data = $request->all();

        $partnerCode = 'MOMOBKUN20180529';
        $accessKey = 'klm05TvNBzhg7h7j';
        $secretKey = 'at67qH6mk8w5Y1nAyMoYKMWACiEi2bsa';
        $orderInfo = "Thanh toán qua ATM MoMo";
        $amount = intval($data['total_momo']);
        $orderId = time() . "";
        $redirectUrl = route('momoCheckout');
        $ipnUrl = "http://127.0.0.1:8000/page/Checkout";
        $extraData = "";

        $requestId = time() . "";
        $requestType = "payWithATM";

        // Before signing, create the HMAC SHA256 signature
        $rawHash = "accessKey=" . $accessKey . "&amount=" . $amount .
            "&extraData=" . $extraData . "&ipnUrl=" . $ipnUrl . "&orderId=" . $orderId .
            "&orderInfo=" . $orderInfo . "&partnerCode=" . $partnerCode . "&redirectUrl=" . $redirectUrl .
            "&requestId=" . $requestId . "&requestType=" . $requestType;
        $signature = hash_hmac("sha256", $rawHash, $secretKey);

        // Prepare the data for the POST request
        $requestData = array(
            'partnerCode' => $partnerCode,
            'partnerName' => "Test",
            "storeId" => "MomoTestStore",
            'requestId' => $requestId,
            'amount' => $amount,
            'orderId' => $orderId,
            'orderInfo' => $orderInfo,
            'redirectUrl' => $redirectUrl,
            'ipnUrl' => $ipnUrl,
            'lang' => 'vi',
            'extraData' => $extraData,
            'requestType' => $requestType,
            'signature' => $signature
        );

        // Send the POST request
        $result = $this->execPostRequest($endpoint, json_encode($requestData));
        $jsonResult = json_decode($result, true);

        // Redirect the user to the MoMo payment page
        return redirect()->to($jsonResult['payUrl']);
    }

    public function vnpay_payment(Request $request)
    {
        $data = $request->all();
        
        $vnp_Url = "https://sandbox.vnpayment.vn/paymentv2/vpcpay.html";
        // $vnp_Returnurl = "http://127.0.0.1:8000/page/Checkout";
        $vnp_Returnurl = route('vnpayCheckout');
        $vnp_TmnCode = env('VNP_TMN_CODE'); // Mã trang web của bạn tại VNPAY
        $vnp_HashSecret = env('VNP_HASH_SECRET'); // Khóa bí mật của bạn
    
        $vnp_TxnRef = uniqid(); // Mã đơn hàng. Trong thực tế, bạn nên thêm đơn hàng vào cơ sở dữ liệu và gửi ID này đến VNPAY
        $vnp_OrderInfo = "Thanh toán";
        $vnp_OrderType = "Cửa hàng Flyteam";
        $vnp_Amount = intval($data['total_vnpay']) * 100;
        $vnp_Locale = "VN";
        $vnp_BankCode = "NCB";
        $vnp_IpAddr = $_SERVER['REMOTE_ADDR'];
    
        $inputData = array(
            "vnp_Version" => "2.1.0",
            "vnp_TmnCode" => $vnp_TmnCode,
            "vnp_Amount" => $vnp_Amount,
            "vnp_Command" => "pay",
            "vnp_CreateDate" => date('YmdHis'),
            "vnp_CurrCode" => "VND",
            "vnp_IpAddr" => $vnp_IpAddr,
            "vnp_Locale" => $vnp_Locale,
            "vnp_OrderInfo" => $vnp_OrderInfo,
            "vnp_OrderType" => $vnp_OrderType,
            "vnp_ReturnUrl" => $vnp_Returnurl,
            "vnp_TxnRef" => $vnp_TxnRef,
            
        );
    
        if (isset($vnp_BankCode) && $vnp_BankCode != "") {
            $inputData['vnp_BankCode'] = $vnp_BankCode;
        }
    
        ksort($inputData);
        $query = "";
        $i = 0;
        $hashdata = "";
        foreach ($inputData as $key => $value) {
            if ($i == 1) {
                $hashdata .= '&' . urlencode($key) . "=" . urlencode($value);
            } else {
                $hashdata .= urlencode($key) . "=" . urlencode($value);
                $i = 1;
            }
            $query .= urlencode($key) . "=" . urlencode($value) . '&';
        }
    
        // Lưu mã đơn hàng vào session để sử dụng sau khi thanh toán thành công
        Session::put('cart_id', $vnp_TxnRef);
    
        $vnp_Url = $vnp_Url . "?" . $query;
        if (isset($vnp_HashSecret)) {
            $vnpSecureHash = hash_hmac('sha512', $hashdata, $vnp_HashSecret);
            $vnp_Url .= 'vnp_SecureHash=' . $vnpSecureHash;
        }
        
        return redirect()->away($vnp_Url);
    }
////////////////////////////////////////////////////////////////////////////////////////////
    // public function handlePayment(Request $request)
    // {
    //     //test paypal         Card number: 4032036131861211

    //     // Expiry date: Any
    //     // CVC code: Any
    //     $provider = new PayPalClient;
    //     $provider->setApiCredentials(config('paypal'));
    //     $paypalToken = $provider->getAccessToken();
    //     $response = $provider->createOrder([
    //         "intent" => "CAPTURE",
    //         "application_context" => [
    //             "return_url" => route('success.payment'),
    //             "cancel_url" => route('cancel.payment'),
    //         ],
    //         "purchase_units" => [
    //             0 => [
    //                 "amount" => [
    //                     "currency_code" => "USD",
    //                     "value" => "100.00"
    //                 ]
    //             ]
    //         ]
    //     ]);
    //     if (isset($response['id']) && $response['id'] != null) {
    //         foreach ($response['links'] as $links) {
    //             if ($links['rel'] == 'approve') {
    //                 return redirect()->away($links['href']);
    //             }
    //         }
    //         return redirect()
    //             ->route('cancel.payment')
    //             ->with('error', 'Có gì đó đã sai!');
    //     } else {
    //         return redirect()
    //             ->route('create.payment')
    //             ->with('error', $response['message'] ?? 'Có gì đó đã sai!');
    //     }
    // }

    // public function paymentCancel()
    // {
    //     return redirect()
    //         ->route('create.payment')
    //         ->with('error', $response['message'] ?? 'Bạn đã hủy giao dịch!');
    // }

    // public function paymentSuccess(Request $request)
    // {
    //     $provider = new PayPalClient;
    //     $provider->setApiCredentials(config('paypal'));
    //     $provider->getAccessToken();
    //     $response = $provider->capturePaymentOrder($request['token']);
    //     if (isset($response['status']) && $response['status'] == 'COMPLETED') {
    //         return redirect()
    //             ->route('create.payment')
    //             ->with('success', 'Giao dịch hoàn thành!');
    //     } else {
    //         return redirect()
    //             ->route('create.payment')
    //             ->with('error', $response['message'] ?? 'Có gì đó đã sai!');
    //     }
    // }

    // protected $apiContext;

    // public function __construct()
    // {
    //     // Khởi tạo API Context của PayPal
    //     $paypalConfig = config('paypal');
    //     $this->apiContext = new ApiContext(
    //         new OAuthTokenCredential(
    //             $paypalConfig['client_id'],
    //             $paypalConfig['secret']
    //         )
    //     );
    //     $this->apiContext->setConfig($paypalConfig['settings']);
    // }

    // public function createPayment(Request $request)
    // {
    //     // Lấy thông tin từ request để tạo đơn hàng
    //     $amount = $request->input('amount');
    //     $currency = $request->input('currency');
    //     $description = $request->input('description');

    //     // Tạo đối tượng Payer
    //     $payer = new Payer();
    //     $payer->setPaymentMethod('paypal');

    //     // Tạo đối tượng Amount
    //     $totalAmount = new Amount();
    //     $totalAmount->setCurrency($currency)
    //         ->setTotal($amount);

    //     // Tạo đối tượng Transaction
    //     $transaction = new Transaction();
    //     $transaction->setAmount($totalAmount)
    //         ->setDescription($description);

    //     // Tạo đối tượng RedirectUrls
    //     $redirectUrls = new RedirectUrls();
    //     $redirectUrls->setReturnUrl(route('paypalExecutePayment'))
    //         ->setCancelUrl(route('paypalCancelPayment'));

    //     // Tạo đối tượng Payment
    //     $payment = new Payment();
    //     $payment->setIntent('sale')
    //         ->setPayer($payer)
    //         ->setTransactions([$transaction])
    //         ->setRedirectUrls($redirectUrls);

    //     // Tạo thanh toán trên PayPal
    //     try {
    //         $payment->create($this->apiContext);
    //         $approvalUrl = $payment->getApprovalLink();
    //         return redirect($approvalUrl);
    //     } catch (\Exception $e) {
    //         return redirect()->route('shopGrid')->with('error', 'Lỗi thanh toán PayPal: ' . $e->getMessage());
    //     }
    // }



}
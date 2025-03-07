<?php

namespace App\Http\Controllers\paymentMethod;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use PayPal\Auth\OAuthTokenCredential;
use PayPal\Api\Amount;
use PayPal\Rest\ApiContext;
use PayPal\Api\Payer;
use PayPal\Api\Payment;
use Illuminate\Support\Facades\Session;
use PayPal\Api\RedirectUrls;
use PayPal\Api\Transaction;
use PayPal\Api\PaymentExecution;
use Illuminate\Support\Facades\URL;

class paypalController extends Controller
{
    private $_api_context;
    public function __construct()
    {
        $paypal = config('paypal');
        $this->_api_context = new ApiContext(new OAuthTokenCredential($paypal['client_id'], $paypal['secret']));
        $this->_api_context->setConfig($paypal['settings']);
    }
    public function paywithPaypal()
    {
        return view('client.paymentMethods.paypal');
    }
    public function postPaymentwithPaypal(Request $request)
    {
        $payer = new Payer();
        $payer->setPaymentMethod('paypal');
        $amount = new Amount();
        $amount->setTotal($request->input('amount'));
        $amount->setCurrency('USD');
        $transaction = new Transaction();
        $transaction->setAmount($amount);
        $redirectUrls = new RedirectUrls();
        $redirectUrls->setReturnUrl(URL::route('status'))
            ->setCancelUrl(URL::route('status'));
        $payment = new Payment();
        $payment->setIntent('sale')
            ->setPayer($payer)
            ->setTransactions(array($transaction))
            ->setRedirectUrls($redirectUrls);
        try {
            $payment->create($this->_api_context);
        } catch (\PayPal\Exception\PayPalConnectionException $ex) {
            if (\Config::get('app.debug')) {
                \Session::put('error', 'Connection timeout');
                return Redirect::route('postpayment');
            } else {
                \Session::put('error', 'Some error occur, sorry for inconvinient');
                return Redirect::route('postpayment');
            }
        }
    }
    public function getPaymentStatus(Request $request)
    {
        $input = $request->all();
        $paymentId = $input['paymentId'];
        $payerId = $input['PayerID'];
        $token = $input['token'];
        if (empty($payerId) || empty($token)) {
            \Session::put('error', 'Payment failed');
            return Redirect::route('postpayment');

        }
        $payment = Payment::get($paymentId, $this->_api_context);
        $execution = new PaymentExecution();
        $execution->setPayerId($payerId);
        $result = $payment->execute($execution, $this->_api_context);
        dd($result);

    }

    //
}

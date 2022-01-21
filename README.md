# Mercado Pago SDK for PHP

[![Latest Stable Version](https://poser.pugx.org/leonardcodep/mercadopago-sdk-php/v/stable)](https://packagist.org/packages/leonardcodep/mercadopago-sdk-php)
[![Total Downloads](https://poser.pugx.org/leonardcodep/mercadopago-sdk-php/downloads)](https://packagist.org/packages/leonardcodep/mercadopago-sdk-php)
[![License](https://poser.pugx.org/leonardcodep/mercadopago-sdk-php/license)](https://packagist.org/packages/leonardcodep/mercadopago-sdk-php)

This library provides developers with a simple set of bindings to help you integrate Mercado Pago API to a website and start receiving payments.

## 💡 Requirements

PHP 7.1, 8.0 y 8.1 or higher

## 💻 Installation 

First time using Mercado Pago? Create your [Mercado Pago account](https://www.mercadopago.com), if you don’t have one already.

1. Download [Composer](https://getcomposer.org/doc/00-intro.md) if not already installed

2. On your project directory run on the command line
`composer require leonardcodep/mercadopago-sdk-php `

3. Copy the access_token in the [credentials](https://www.mercadopago.com/mlb/account/credentials) section of the page and replace YOUR_ACCESS_TOKEN with it.

That's it! Mercado Pago SDK has been successfully installed.

## 🌟 Getting Started
  
  Simple usage looks like:
  
```php
  <?php
    require_once 'vendor/autoload.php'; // You have to require the library from your Composer vendor folder

    use MercadoPago\SDK;
    use MercadoPago\Entity\Shared\Payment;
    use MercadoPago\Entity\Shared\Payer;
    try {
        SDK::setAccessToken("YOUR_ACCESS_TOKEN"); // Either Production or SandBox AccessToken
        $payment = new Payment();
        $payment->transaction_amount = 259;
        $payment->token = $request->token;
        $payment->description = "Compra de productos";
        $payment->installments = (int) $request->installments;
        $payment->payment_method_id = $request->payment_method_id;
        $payment->issuer_id = (int) $request->issuer_id;

        $payer = new Payer();
        $payerForm = $request->payer;
        $payer->email = $payerForm['email'];
        $payer->identification = array(
            "type" => $payerForm['identification']['type'],
            "number" => $payerForm['identification']['number']
        );
        $payment->payer = $payer;
        $payment->save();

        if($payment->id === null) {
            $error_message = 'Unknown error cause';
            if(isset($payment->error)) {
                $error_message = $payment->error->message;
            }
            throw new Exception($error_message);
        }

        $response = array(
            "request" => $request,
            "payment_id" => $payment->id,
            "status" => $payment->status,
            "status_detail" => $payment->status_detail,
        );
    } catch (Exception $e) {
        throw new Exception(trim(trim($e->getMessage()), '"'));
    }
  ?>
```

## 📚 Documentation 

Visit our Dev Site for further information regarding:
 - Payments APIs: [Spanish](https://www.mercadopago.com.ar/developers/es/guides/payments/api/introduction/) / [Portuguese](https://www.mercadopago.com.br/developers/pt/guides/payments/api/introduction/)
 - Mercado Pago checkout: [Spanish](https://www.mercadopago.com.ar/developers/es/guides/payments/web-payment-checkout/introduction/) / [Portuguese](https://www.mercadopago.com.br/developers/pt/guides/payments/web-payment-checkout/introduction/)
 - Web Tokenize checkout: [Spanish](https://www.mercadopago.com.ar/developers/es/guides/payments/web-tokenize-checkout/introduction/) / [Portuguese](https://www.mercadopago.com.br/developers/pt/guides/payments/web-tokenize-checkout/introduction/)

Check [our official code reference](https://mercadopago.github.io/sdk-php/) to explore all available functionalities.

## ❤️ Support 

If you require technical support, please contact our support team at [developers.mercadopago.com](https://developers.mercadopago.com)


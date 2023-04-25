<?php
require_once "../libs/stripe-php-master/init.php";

$stripeDetails = array(
    "secretKey" => "sk_test_51MlRwNLkwnMeV4KrZuN3IteCVpv7TnADowynyL7O9QJMkr8JlqLMmNa3DsnCLmhc7eAQ8e1wSUQ7MvZ6MkU9LDUN00Tzt3K89r",
    "publishableKey" => "pk_test_51MlRwNLkwnMeV4KrakhfHzMSWe8uOGMTgdxT6UBukJUP0AJB9memAAlcnkBEShf1HWwMH3wFaBV1XROZ7TQidM5y00OM0lgTax",
);

\Stripe\Stripe::setApiKey($stripeDetails["secretKey"]);

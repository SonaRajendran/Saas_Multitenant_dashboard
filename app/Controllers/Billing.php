<?php

namespace App\Controllers;

use App\Models\SubscriptionModel;
use CodeIgniter\Controller;
use Stripe\Stripe;
use Stripe\Webhook;

class Billing extends Controller
{
    public function webhook()
    {
        // Set Stripe API key (load from .env for security)
        Stripe::setApiKey(env('stripe.secret_key', 'your_default_stripe_secret_key'));

        $payload = @file_get_contents('php://input');
        $sig_header = $_SERVER['HTTP_STRIPE_SIGNATURE'] ?? '';
        $event = null;

        try {
            $event = Webhook::constructEvent(
                $payload,
                $sig_header,
                env('stripe.webhook_secret', 'your_default_webhook_secret')
            );
        } catch (\Exception $e) {
            return $this->response->setStatusCode(400)->setBody($e->getMessage());
        }

        $subModel = new SubscriptionModel();

        switch ($event->type) {
            case 'checkout.session.completed':
                $session = $event->data->object;
                // Find org by metadata, update subscription
                $orgId = $session->metadata->org_id ?? null;
                if ($orgId) {
                    $subModel->update($subModel->getSubscription($orgId)['id'], [
                        'stripe_sub_id' => $session->subscription,
                        'status' => 'active'
                    ]);
                }
                break;
            case 'invoice.payment_failed':
                // Handle failed payment, e.g., set status 'inactive'
                break;
            // Add more events as needed
        }

        return $this->response->setStatusCode(200);
    }
}
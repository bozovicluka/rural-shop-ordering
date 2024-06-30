<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\ApproveOrderRequest;
use App\Http\Requests\StoreOrderRequest;
use App\Mail\OrderApprovedMail;
use App\Mail\OrderCreatedMail;
use App\Mail\OrderDeliveryMail;
use App\Models\Order;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Mail;

class OrderController extends Controller
{
    /**
     * @param StoreOrderRequest $request
     * @return JsonResponse
     */
    public function store(StoreOrderRequest $request): JsonResponse
    {
        $data = $request->validated();
        try {
            DB::beginTransaction();
            foreach ($data['order'] as $ad) {
                $order = Order::create([
                    'ad_id' => $ad['ad_id'],
                    'user_id' => $ad['seller']['id'],
                    'user_name' => $ad['seller']['name'],
                    'user_email' => $ad['seller']['email'],
                    'user_phone_number' => $ad['seller']['phone'],
                    'user_city' => $ad['seller']['city'],
                    'user_address' => $ad['seller']['address'],
                    'price' => $ad['price'],
                    'quantity' => $ad['quantity'],
                    'ad_title' => $ad['ad_title'],
                    'email' => $data['email'],
                    'comment' => $data['note'],
                    'phone' => $data['phone_number'],
                    'name' => $data['first_name'] . ' ' . $data['last_name'],
                    'city' => $data['city'],
                    'address' => $data['street'] . ' ' . $data['flat_number'],
                ]);
                Mail::to($order->user_email)->send(new OrderCreatedMail($order));
            }
            DB::commit();
        } catch (\Exception $exception) {
            DB::rollBack();
            return response()->json(['message' => $exception->getMessage()], 400);
        }

        return response()->json(['message' => 'Order created successfully.']);
    }

    public function approve(Order $order, ApproveOrderRequest $request)
    {
        $comment = $request->comment;
        $order->update(['is_approved' => true]);
        try {
            Mail::to($order->email)->send(new OrderApprovedMail($order));
            Mail::to(config('mail.delivery_address'))->send(new OrderDeliveryMail($order, $comment));
        }catch (\Exception $exception){
            Log::info($exception->getMessage());
        }
    }

    public function index(Request $request)
    {
        $user_id = $request->user_id;
        return Order::query()->where('user_id', $user_id)->get();
    }

    public function show(Order $order)
    {
        return $order;
    }
}

<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\OrderRequest;
use App\Models\Order;
use App\Models\Product;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class OrderControler extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $params = request()->query();
        $orders = Order::with(['details'])->filter($params)->paginate($params['row'] ?? 10);

        $data = [
            'orders' => $orders,
        ];

        return view('pages.admin.order.index', $data);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $data = [
            'products' => Product::all(),
            'users' => User::role('user')->get(),
        ];

        return view('pages.admin.order.create', $data);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(OrderRequest $request)
    {
        try {
            DB::beginTransaction();

            // get user
            $user = User::findOrFail($request->user_id);

            $order = Order::create([
                'user_id' => $request->user_id,
                'quantity' => $request->quantity,
                'total' => $request->total,
                'status' => $request->status,
                'order_date' => $request->order_date,
                'notes' => $request->notes,
                'customer_raw' => [
                    'name' => $user->name,
                    'email' => $user->email,
                    'phone' => $user->phone,
                ],
            ]);

            $order->addMediaFromRequest('proof')
                ->toMediaCollection('proof');

            // get product
            $product = Product::findOrFail($request->product_id);

            // create order detail
            $order->details()->create([
                'product_type' => get_class($product),
                'product_id' => $product->id,
                'product_name' => $product->name,
                'quantity' => $request->quantity,
                'price' => $product->price,
                'total' => $request->total,
            ]);

            DB::commit();

            notyf()->addSuccess('Order created successfully.');
            return back();
        } catch (\Exception $e) {
            DB::rollBack();

            if (app()->isLocal()) {
                throw $e;
            }else{
                notyf()->addError('Something went wrong.');
                return back();
            }
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(Order $order)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Order $order)
    {
        $order->load(['detail']);

        $data = [
            'order' => $order,
            'products' => Product::all(),
            'users' => User::role('user')->get(),
        ];

        return view('pages.admin.order.edit', $data);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(OrderRequest $request, Order $order)
    {
        try {
            DB::beginTransaction();

            // get user
            $user = User::findOrFail($request->user_id);

            $order->update([
                'user_id' => $request->user_id,
                'quantity' => $request->quantity,
                'total' => $request->total,
                'status' => $request->status,
                'order_date' => $request->order_date,
                'notes' => $request->notes,
                'customer_raw' => [
                    'name' => $user->name,
                    'email' => $user->email,
                    'phone' => $user->phone,
                ],
            ]);

            if ($request->hasFile('proof')) {
                $order->clearMediaCollection('proof');
                $order->addMediaFromRequest('proof')
                    ->toMediaCollection('proof');
            }

            // get product
            $product = Product::findOrFail($request->product_id);

            // update order detail
            $order->detail->update([
                'product_type' => get_class($product),
                'product_id' => $product->id,
                'product_name' => $product->name,
                'quantity' => $request->quantity,
                'price' => $product->price,
                'total' => $request->total,
            ]);

            DB::commit();

            notyf()->addSuccess('Order updated successfully.');
            return back();
        } catch (\Exception $e) {
            DB::rollBack();

            if (app()->isLocal()) {
                throw $e;
            }else{
                notyf()->addError('Something went wrong.');
                return back();
            }
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Order $order)
    {
        try {
            $order->delete();

            notyf()->addSuccess('Order deleted successfully.');
            return back();
        } catch (\Throwable $th) {
            if (app()->isLocal()) {
                throw $th;
            }else{
                notyf()->addError('Something went wrong.');
                return back();
            }
        }
    }
}

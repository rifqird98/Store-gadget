<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Category;
use App\Models\Transaction;
use Illuminate\Http\Request;

use App\Models\TransactionDetail;
use function GuzzleHttp\Promise\all;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // $revenue = Transaction::sum('total_prices');
        // $transaction = Transaction::count();
        // $customer = User::count();
        // $transaction_data = Transaction::all();
        // return view('pages.dashboard', compact('transaction_data'), [
        //      'customer' => $customer,
        //      'revenue' => $revenue,
        //      'transaction' => $transaction
        // ]);

        $transactions = TransactionDetail::with(['transaction.user','product.galleries'])
        ->whereHas('product', function($product){
            $product->where('users_id', Auth::user()->id);
        });

        $revenue = $transactions->get()->reduce(function ($carry, $item) {
        return $carry + $item->price;
        });

            $customer = User::count();

            return view('pages.dashboard',[
            'transaction_count' => $transactions->count(),
            'transaction_data' => $transactions->get(),
            'revenue' => $revenue,
            'customer' => $customer,
            ]);

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $user = User::findOrFail($id);

    
        return view('pages.seller.account', compact('user'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $user = User::findOrFail($id);
        $user->update([
            
            'name' =>$request->name,
            'email' =>$request->email,
            'password'=>Auth::user()->password,
            'address_one' =>$request->address_one,
            'address_two' =>$request->address_two,
            'provinces_id' =>$request->provinces_id,
            'regencies_id' =>$request->regencies_id,
            'zip_code' =>$request->zip_code,
            'country' =>$request->country,
            'phone_number' =>$request->phone_number,
            'store_name'=>Auth::user()->store_name,
            'categories_id'=>Auth::user()->categories_id,
        ]);
        // dd($request);

        // $user->update($request);
        return redirect()->route('dashboard')->with('success','Date Berhasil Di Update');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

    public function editstore($id)
    {
        $user = User::findOrFail($id);
        $categories = Category::all();
    
        return view('pages.dashboard-settings', compact('categories', 'user'));
    }

    public function updatestore(Request $request, $id)
    {
        $user = User::findOrFail($id);
        $categories = Category::all();

        $user->update([ 

            'name' =>Auth::user()->name,
            'email' =>Auth::user()->email,
            'password'=>Auth::user()->password,
            'address_one' =>Auth::user()->address_one,
            'address_two' =>Auth::user()->address_two,
            'provinces_id' =>Auth::user()->provinces_id,
            'regencies_id' =>Auth::user()->regencies_id,
            'zip_code' =>Auth::user()->zip_code,
            'country' =>Auth::user()->country,
            'phone_number' =>Auth::user()->phone_number,
            'store_name' =>$request->store_name,
            'categories_id' =>$request->categories_id,
            'store_status' =>$request->store_status,

        ]);
        // dd($request);
    

        return redirect()->route('dashboard', compact('categories', 'user'));
    }
}

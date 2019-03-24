<?php

namespace App\Http\Controllers;

use App\Cart;
use App\TransactionDetail;
use App\TransactionHeader;
use Carbon\Carbon;
use Illuminate\Http\Request;

use App\Http\Requests;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class TransactionController extends Controller
{
    public function AddToCart(Request $req){
        $table = new Cart();
        $table->image = $req->image;
        $table->pokemon_name = $req->name;
        $table->qty = $req->qty;
        $table->price = $req->price;
        $table->subtotal = $req->qty*$req->price;
        $table->status = "Active";

        $table->save();

        return redirect('/Cart');
    }

    public function GetAllActiveCart(){
        $cart = Cart::where('status','=','Active')->paginate(5);

        return view('member.cart',compact('cart'));
    }

    public function DeleteCart(Request $req){
        Cart::where('id','=',$req->id)->delete();

        return redirect('/Cart');
    }

    public function AddToTransaction(Request $req){
        $table = new TransactionHeader();
        $table->datetime = Carbon::now(new \DateTimeZone('Asia/Bangkok'))->format('y-m-d h:m:s');
        $table->email = Auth::user()->email;
        $table->status = "Pending";

        $table->save();

        $temp = DB::table('transaction_details')->orderBy('created_at', 'desc')->first();

        //for($i=0;$i<count($req);$i++) {
            $detail = new TransactionDetail();
            $detail->pokemon_name = $req->name;
            $detail->qty = $req->qty;
            $detail->price = $req->price;
            $detail->subtotal = $req->subtotal;
            $detail->transaction_id = 1;

            $detail->save();

            Cart::where('id', '=', $req->cart_id)->update(
                [
                    'status' => "Deactive"
                ]
            );
        //}

        return redirect('/Cart');
    }

    public function ShowUpdateTransactionPage(){
        $transaction = TransactionHeader::paginate(4);

        return view('admin.updateTransaction',compact('transaction'));
    }

    public function AcceptTransaction(Request $req){
        TransactionHeader::where('id', '=', $req->id)->update(
            [
                'status' => "Accepted"
            ]
        );

        return redirect('/UpdateTransaction');
    }

    public function DeclineTransaction(Request $req){
        TransactionHeader::where('id', '=', $req->id)->update(
            [
                'status' => "Declined"
            ]
        );

        return redirect('/UpdateTransaction');
    }

    public function GetDetailTransaction(Request $req){
        $transaction = TransactionDetail::where('id','=',$req->id)->get();

        return view('admin.detailTransaction', compact('transaction'));
    }

    public function ShowDeleteTransactionPage(){
        $transaction = TransactionHeader::paginate(8);

        return view('admin.deleteTransaction',compact('transaction'));
    }

    public function DeleteTransaction(Request $req){
        TransactionHeader::where('id','=',$req->id)->delete();
        TransactionDetail::where('transaction_id','=',$req->id)->delete();

        return redirect('/DeleteTransaction');
    }
}

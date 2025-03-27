<?php

namespace App\Http\Controllers;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;

class SubscriptionController extends Controller{
    public function addSubscriber(Request $request){
        $p_sbc_email = $request['p_sbc_email'];
        
        $results = DB::select('SELECT * FROM voila_subscription.spu_subscriber_reg(?)', [$p_sbc_email]);
        
        return response()->json(array(
            'error' => 0,
            'message' => 'Subscriber added successfully'
        ));
    }
}

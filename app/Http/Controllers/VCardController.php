<?php

namespace App\Http\Controllers;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;

class VCardController extends Controller{
    public function vCardMemberSearch(Request $request){
        $p_usr_nmcode = $request['p_usr_nmcode'];
        $results = DB::select('SELECT * FROM users.spu_voila_user_cns(?)', [$p_usr_nmcode]);
        
        return response()->json($results);
    }
}

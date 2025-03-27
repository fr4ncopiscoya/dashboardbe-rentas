<?php

namespace App\Http\Controllers;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;

class MenuController extends Controller{
    
    
    public function userMenuRegister(Request $request){
        
        $p_men_id = $request['p_men_id'];
        $p_men_descrip = $request['p_men_descrip'];
        $p_men_route = $request['p_men_route'];
        $p_men_icon = $request['p_men_icon'];
        $p_men_active = $request['p_men_active'];
        
        
        $results = DB::select('SELECT * FROM object.spu_menu_reg(?,?,?,?,?)', [
            $p_men_id
            , $p_men_descrip
            , $p_men_route
            , $p_men_icon
            , $p_men_active
            ]);
        
        return response()->json($results);
    }
    
    public function profileMenuRegister(Request $request){
        
        $p_ume_id = $request['p_ume_id'];
        $p_json = $request['p_json'];
        
        $results = DB::select('SELECT * FROM object.spu_profilemenu_reg(?,?)', [
            $p_ume_id
            , $p_json
            ]);
        
        return response()->json($results);
    }
    
    
    
}


<?php

namespace App\Services;

use Dotenv\Util\Str;
use Illuminate\Support\Facades\Storage;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ChangeStatusService
{

    public function change_status($id, $table, $status){

        $item = DB::table($table)->where('id', $id);

        // if($status == 'delete'){
        //     // return route('press-release.destroy', $id);
        //     // Storage::delete($item->first()->path); der parz chi
        // }
        // else{
            $update = $item->update(['status' => $status]);
        // }
        // dd($item);
        return $update ? back() : false;
    }

}

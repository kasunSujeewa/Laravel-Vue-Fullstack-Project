<?php

namespace App\Http\Controllers;

use App\Friends;
use Illuminate\Support\Facades\Auth;


use Illuminate\Http\Request;

class FriendsController extends Controller
{
    public function removefr(Request $rq)
    {
        $fr1 = Friends::where('friend_id', $rq->friend_id)->where('user_id', Auth::user()->id)->first();;
        $fr1->delete();
        $fr2 = Friends::where('user_id', $rq->friend_id)->where('friend_id', Auth::user()->id)->first();
        $fr2->delete();
    }
}

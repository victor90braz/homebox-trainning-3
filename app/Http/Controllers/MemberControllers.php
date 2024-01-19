<?php

namespace App\Http\Controllers;

use App\Services\Member;

class MemberControllers extends Controller
{
    public function getListInfo (Member $members)
    {
        dd($members->getListMembersInfo());
    }
}

<?php

namespace App\Http\Controllers;

use App\Services\MemberServices;

class MemberControllers extends Controller
{
    public function index (MemberServices $members)
    {
        dd($members->getListMembersInfo());
    }
}

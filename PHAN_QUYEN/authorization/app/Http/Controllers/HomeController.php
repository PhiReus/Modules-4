<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function showPageGuest()

    {

        if (!$this->userCan('view-page-guest')) {

            abort('403', __('Bạn không có quyền thực hiện thao tác này'));
        }

        return view("page_guest");
    }


    public function showPageAdmin()

    {

        if (!$this->userCan('view-page-admin')) {

            abort('403', __('Bạn không có quyền thực hiện thao tác này'));
        }

        return view("page_admin");
    }
}

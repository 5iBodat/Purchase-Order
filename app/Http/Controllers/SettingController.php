<?php

namespace App\Http\Controllers;

use App\Models\Setting;
use Illuminate\Http\Request;
use Illuminate\Contracts\View\View;

class SettingController extends Controller
{
    public function __invoke(): View
    {
        return view('settings.index');
    }
}

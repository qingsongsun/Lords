<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2017/10/29
 * Time: 21:49
 */
namespace App\Http\Controllers;

use App\Building;
use App\Manor;
use App\System;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Input;

class ManorController extends Controller {
    /**
     * ManorController constructor.
     *
     * Include middleware:
     *  - Auth
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * 领地概览静态
     */
    public function manor() {
        return view('manor');
    }

    /**
     * 领地概览数据
     */
    public function manorData($xAxis, $yAxis) {
        $data = Manor::where([
            ['userId', Auth::id()],
            ['xAxis', $xAxis],
            ['yAxis', $yAxis]
        ])->get();

        return $data;
    }
}
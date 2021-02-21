<?php

namespace MTN\StatamicBookable\Http\Controllers;

use Illuminate\Http\Request;

class ReportsController
{
    public function index(Request $request)
    {
        if (!$request->ajax()) {
            return view('bookable::reports', [
                'title' => 'Reports',
            ]);
        }

        return [];
    }
}

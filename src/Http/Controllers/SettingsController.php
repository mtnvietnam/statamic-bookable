<?php

namespace MTN\StatamicBookable\Http\Controllers;

use Illuminate\Http\Request;

class SettingsController
{
    public function index(Request $request)
    {
        if (!$request->ajax()) {
            return view('bookable::settings', [
                'title' => 'Settings',
            ]);
        }

        return [];
    }
}

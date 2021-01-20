<?php

namespace App\Http\Controllers;

use App\Models\Page;
use Illuminate\Http\Request;

class PageController extends Controller
{
    //
    public function privacy()
    {
        $privacy = Page::find(1)->privacy;

        return view('cp.pages.privacy', compact('privacy'));
    }

    public function receivePrivacy(Request $request)
    {
        $page = Page::find(1);
        $page->privacy = $request->privacyInput;
        $page->save();
        return 'success';
    }

    public function faq()
    {
        return view('cp.pages.faq');
    }

    public function social()
    {
        return view('cp.pages.social');
    }
}

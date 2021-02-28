<?php

namespace App\Http\Controllers;

use App\Models\Page;
use Illuminate\Http\Request;

class PageController extends Controller
{
    //

    public function privacy()
    {
        $privacy = Page::first()->privacy;

        return view('cp.pages.privacy', compact('privacy'));
    }

    public function receivePrivacy(Request $request)
    {
        $page = Page::first();
        $page->privacy = $request->privacyInput;
        $page->save();
        return 'success';
    }

    public function terms()
    {
        $terms = Page::first()->terms;
        return view('cp.pages.terms', compact('terms'));
    }


    public function receiveTerms(Request $request)
    {
        $terms = Page::first();

        if ($request->termsInput == $terms->terms) {
            return 'nothing to change';
        }

        $terms->terms = $request->termsInput;
        $terms->save();
        return 'success';
    }

    public function about()
    {
        $about = Page::first()->about_us;
        return view('cp.pages.about', compact('about'));
    }

    public function receiveAbout(Request $request)
    {
        $about = Page::first();

        if ($request->aboutInput == $about->about_us) {
            return 'nothing to change';
        }

        $about->about_us = $request->aboutInput;
        $about->save();
        return 'success';
    }

    /**
     *
     *
     * Start Site Views
     *
     *
     */

    public function privacyIndex(){
        $privacy = Page::first()->privacy;

        return view('main.pages.privacy', compact('privacy'));
    }

    public function faqIndex(){
        $faq = Page::first()->faq;

        return view('main.pages.faq', compact('faq'));
    }

    public function termsIndex(){

        $terms = Page::first()->terms;
        return view('main.pages.terms', compact('terms'));
    }

    public function aboutIndex(){

        $about = Page::first()->about_us;
        return view('main.pages.about', compact('about'));
    }

} // End Page Controller

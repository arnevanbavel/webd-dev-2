<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Faq;
use DB;

class AdminFaqController extends Controller
{
    public function showFaq()
    {
        $faqs = DB::table('faqs')->paginate(5);
    	return view('adminFAQ.index')
    	->with('faqs',$faqs);
    }

    public function showNewFaq()
    {
        return view('adminFAQ.faq_create');
    }

    public function createFaq(Request $request)
    {
        $this->validate($request, [
            'question' => 'required',
            'answer' => 'required',
        ]);

        $faq = new Faq();

        $faq->question = $request->question;
        $faq->answer = $request->answer;

        if (!$faq->save()) {
            return redirect('admin/faq')->with('error', 'FAQ is niet succesvol aangemaakt.');
        }

        return redirect('admin/faq')->with('success', 'FAQ is succesvol aangemaakt.');

    }

}

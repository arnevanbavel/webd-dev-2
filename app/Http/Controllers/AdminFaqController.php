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
    	return view('adminFAQ.faq_show')
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

    public function deleteFaq(Faq $faq)
    {
        $faq->delete();

        return back()->with('success', 'FAQ is succesvol verwijderd.');
    }

    public function editFaq(Faq $faq)
    {
        return view('adminFAQ.faq_edit', compact('faq'));
    }

    public function updateFaq(Request $request, Faq $faq)
    {
        $this->validate($request, [
            'question' => 'required',
            'answer' => 'required',
        ]);

        $faq->question = $request->question;
        $faq->answer = $request->answer;

        $faq->save();

        return redirect('admin/faq')->with('success', 'FAQ is succesvol gewijzigd.');
    }

}

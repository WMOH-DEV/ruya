<?php

namespace App\Http\Controllers;

use App\Mail\contactResponseMail;
use App\Models\Message;
use Flasher\Toastr\Prime\ToastrFactory;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class MessageController extends Controller
{
    //
    public function index()
    {
        $messages = Message::orderBy('id','desc')->paginate(20);
        return  view('cp.messages.index', compact('messages'));
    }

    public function show($msg)
    {
        $message = Message::findOrfail($msg);
        $message->status = 1;
        $message->save();
        return view('cp.messages.show', compact('message'));
    }

    public function response(Message $message, Request $request, ToastrFactory $factory)
    {
        $request->validate([
            'title'       => ['required', 'string', 'max:255'],
            'message_body'  => ['required', 'string']
        ]);

        $receiverMail = $message->email;

        //dd($receiverMail);

        $name = $message->fullName;
        $title = $request->title;
        $body = $request->message_body;

        Mail::to($receiverMail)->send(new contactResponseMail($name, $title, $body));

        $message->isResponded = 1;
        $message->save();

        $factory->addSuccess('تم إرسال الرسالة');

        return redirect()->back();

    }

    public function destroy(Request $request, ToastrFactory $factory)
    {
        $message = $request->message_id;

        $message->delete();

        $factory->addSuccess('تم حذف الرسالة');

        return redirect()->back();
    }

    public function contactIndex()
    {
        return view('main.pages.contact');
    }

    public function contactStore(Request $request, ToastrFactory $factory)
    {
        $message = $request->validate([
            'fullName'  => ['required', 'string'],
            'email'     => ['required', 'string', 'email'],
            'whatsapp'  => ['required', 'string'],
            'title'     => ['string', 'max:255','nullable'],
            'message'    => ['string', 'max:1000'],
        ]);

        Message::create($message);

        $factory->addSuccess('تم إرسال رسالتكم بنجاح، سيتم مراسلتكم قريباً');

        return redirect()->back();
    }

} // End MessageController

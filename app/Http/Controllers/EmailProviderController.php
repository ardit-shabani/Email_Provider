<?php

namespace App\Http\Controllers;

use App\EmailsScheduled;
use App\Jobs\EmailProviderQueue;
use App\Mail\MailProvider;
use Carbon\Carbon;
use Validator;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use PharIo\Manifest\Email;


class EmailProviderController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }


    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        return view('email.email');

    }

    public function scheduledMails(){

        $mails =EmailsScheduled::where('user_id',auth()->id())->get();
        return view('email.scheduled_mails',['mails' => $mails]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {


        $data = $request->validate([

            'to' => 'required|string',
            'subject' => 'required|string',
            'message' => 'required|string',
            'schedule' => 'nullable|date_format:"Y-m-d H:i"'

        ]);


        $data['to'] = explode(';',$data['to']);


        $emails = Validator::make($data,[
            'to' => 'required|array|max:6',
            'to.*' => 'email'
        ])->validate();




        if($request->get('schedule') == null){


            foreach ($emails as $email){

             Mail::send(new MailProvider($email,$data['subject'],$data['message']));

            }


            session()->flash('success','Email eshte derguar me sukses!');

            return redirect(route('email.index'));



        }else{

            $date = Carbon::parse($data['schedule']);

            $mail =  EmailsScheduled::create([


                'user_id' => auth()->id(),
                'to'=> json_encode($data['to']),
                'subject' => $data['subject'],
                'message' => $data['message'],
                'scheduled_at' => $date

            ]);


            dd($mail);

            EmailProviderQueue::dispatch($mail)->delay($date);
        }

        session()->flash('success','Email eshte derguar me sukses!');

        return redirect(route('scheduled'));


    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

//    public function sendEmail(){
//        Mail::to('arditcaravella1@yahoo.com')->send(new MailProvider('Ardit','Konjusha'));
//    }

}

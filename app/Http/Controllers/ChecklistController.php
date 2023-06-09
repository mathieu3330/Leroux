<?php

namespace App\Http\Controllers;

use App\Models\Response;
use Illuminate\Http\Request;
use App\Models\Checklist;
use App\Models\Question;

use Illuminate\Support\Facades\Auth;
use PDF;
use Mail;


class ChecklistController extends Controller
{
    public function index()
    {
        return view('add-blog-post-form');
    }
    public function store(Request $request)
    {
        $checklist = new Checklist;
        $checklist->ville = $request->ville;
        $checklist->promoteur = $request->promoteur;
        $checklist->numetude = $request->numetude;

        
        $checklist->save();
        return redirect()->route('question');
    }
    public function store_response(){

        $checklist = Checklist::find(1);

        $response = new Response;
        $response->checklist_id = $checklist->id;
        $response->responceTxt = 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the indust';
        $response->save();

        $response = new Response;
        $response->checklist_id = $checklist->id;
        $response->responceTxt = 'king it over 2000 years old. Richard McClintock, a Latin professor at Hampden-Sydne';
        $response->save();

        $response = new Response;
        $response->checklist_id = $checklist->id;
        $response->responceTxt = 'ed to be sure there isnt anything embarrassing hidden in the middle of text. All the Latin words,';
        $response->save();

        dd($response);
    }

    public function echafaudage()
    {
        // get echafaudage questions
        $questions = Question::where('checklist', 'echafaudage')->get();
        return view('security', ['questions' => $questions]);
    }

    public function sendPdf(Request $request)
    {
        info($request);
        $checklist = $request->input('checklist');
        $questions = [];
        if ($checklist == 'reception support') {
            $counter = $request->input('counter');
            for ($i=0; $i < $counter; $i++) { 
                array_push($questions, (object)[
                    'id' => ($i+1),
                    'question' => ''
                ]);
            }
        } else {
            $questions = Question::where('checklist', $checklist)->get();
        }
        
        $data = [
            'checklist' => $checklist,
            'questions' => $questions,
            'reportDate' => date("d/m/Y"), 
            'data' => $request->except(['_token', 'checklist']),
        ];
           
        $pdf = PDF::loadView('pdf', $data);
        $email = Auth::user()->email;
        info($email);

        $data["email"] = $email;
        $data["title"] = "leroux.com";
        $data["filename"] = $data['data']['ville'].'_'.$data['data']['promoteur'].'.pdf';
 
        $files = [
            public_path($pdf->download($data["filename"])),
        ];
  
        Mail::send('email', $data, function($message)use($data, $files) {
            $message->to($data["email"])
                    ->subject($data["title"]);
 
            foreach ($files as $file){
                //$message->attach($file);
                $message->attachData($file, $data["filename"], ['mime' => 'application/pdf']);
            }            
        });

        return redirect('/dashboard');
    }

    public function receptionCharpente()
    {
        // get reception charpente questions
        $questions = Question::where('checklist', 'Reception charpente')->get();
        return view('support', ['questions' => $questions]);
    }

    public function receptionTravaux()
    {
        // get reception charpente questions
        $questions = Question::where('checklist', 'reception travaux')->get();
        return view('reception', ['questions' => $questions]);
    }

    public function receptionSupport()
    {
        // get reception charpente questions
        $questions = Question::where('checklist', 'reception support')->get();
        return view('receptionSupport', ['questions' => $questions]);
    }
}

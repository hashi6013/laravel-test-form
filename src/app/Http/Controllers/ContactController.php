<?php

namespace App\Http\Controllers;

use App\Http\Requests\ContactRequest;
use Illuminate\Http\Request;
use App\Models\Contact;
use Illuminate\Pagination\Paginator;

class ContactController extends Controller
{
    public function index()
    {
        return view('index');
    }

    public function confirm(ContactRequest $request)
    {
        $contact = $request->only(['last_name', 'first_name', 'gender', 'email', 'postcode', 'address', 'building_name', 'opinion']);

        // dd($contact);
        return view('confirm', compact('contact'));

    }

    public function store(ContactRequest $request)
    {
        if($request->input('back') == 'back'){
            return redirect('/')->withInput();
        }


        $contact = $request->only(['fullname', 'gender', 'email', 'postcode', 'address', 'building_name', 'opinion']);
        $contact['fullname'] = $request->last_name . $request->first_name;

        Contact::create($contact);
        // dd($contact);

        return view('thanks');

    }

    // public function show(Request $request)
    // {
        
        // $contacts = Contact::Paginate(10);
        
        // return view('search', [
            // 'contacts' => $contacts,
        // ]);
    // }

    public function search(Request $request)
    {
        if($request->input('reset') == 'reset'){
            return redirect('/search');
        }

        $query = Contact::query();

        $s_fullname = $request->input('s_fullname');
        $s_email = $request->input('s_email');
        $s_from = $request->input('s_from');
        $s_until = $request->input('s_until');
        $s_gender = $request->input('s_gender');
        
        if(!empty($s_fullname))
        {
            $query->where('fullname','like','%'.$s_fullname.'%')->get();;
        }
        if(!empty($s_email))
        {
            $query->where('email','like','%'.$s_email.'%')->get();;
        }
        if(isset($s_from) && isset($s_until))
        {
            $query->whereBetween('created_at', [$s_from, $s_until])->get();
        }
        if(isset($s_from))
        {
            $query->whereDate('created_at', '>=', $s_from)->get();
        }
        if(isset($s_until))
        {
            $query->whereDate('created_at', '<=', $s_until)->get();
        }
        

        if(!is_null($s_gender))
        {
            $query->where('gender', '=', $s_gender)->get();
        }

        $contacts = $query->orderBy('id', 'asc')->paginate(10);
        return view('search', compact('contacts'));

        // if(!empty($keyword))
        // {
            // $query->where('fullname','like','%'.$keyword.'%')->get();
            // $query->orWhere('email','like','%'.$keyword.'%');
            // $query->orWhere('gender','like','%'.$keyword.'%');
        // }
        // $contacts = $query->orderBy('id', 'asc')->paginate(10);
        // return view('search')->with('contacts', $contacts)->with('keyword', $keyword);
        
    }
        

        

    public function destroy(Request $request)
    {
        Contact::find($request->id)->delete();
        return redirect('search');
    }



    
}

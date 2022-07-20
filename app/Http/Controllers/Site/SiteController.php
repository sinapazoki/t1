<?php

namespace App\Http\Controllers\Site;

use App\Models\Content\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use App\Http\Requests\Site\ContactForm;
use App\Models\Contact;
use RealRashid\SweetAlert\Facades\Alert;

class SiteController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $posts = Post::where('status', 1)->get();
        return view('site.Pages.home' , compact('posts'));
    }
    
    
    public function GetContactForm(ContactForm $request)
    {
        $inputs = $request->all();
        $new_contact['phone'] = $inputs['phone']; 
        $new_contact['name'] = $inputs['name']; 
        $new_contact['text'] = $inputs['text']; 
        $new_contact['email'] = $inputs['email']; 
        Contact::create($new_contact);
        toast('فرم شما با موفقیت ارسال شد','success');
        return view('site.Pages.Contact-us.contact');
    }
    public function ShowContact()
    {
        return view('site.Pages.Contact-us.contact');
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
        //
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
}

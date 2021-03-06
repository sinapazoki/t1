<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\Auth\Admin\LoginFormRequest;
use App\Models\Menu;

class AdminCotroller extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // $menus = Menu::all();
      return view('site.Admin.admin-home');
    }

     public function UserList()
    {
        return view('site.Admin.User.admin-users');

    }
    public function MenuList()
    {
        return view('site.Admin.Menu.admin-menus');

    }
    
    public function LoginForm()
    {
        if (auth()->check() &&  auth()->user()->role_id == 1 && auth()->user()->status == 1) {
            return redirect()->route('admin-home');
        }
        elseif (auth()->check()) {
            return redirect()->route('home');
        }
        else
        {
            return view('site.Admin.Auth.login');

        }

    }



    public function AdminNotifies()
    {

        return view('site.Admin.Email.admin-emails');

    }



     public function LoginCheck(LoginFormRequest $request)
    {
        $credentials = $request->getCredentials();

        // dd($credentials);
        if(!Auth::validate($credentials)):

                return redirect()->route('admin-login-form' )->withErrors(['error' => 'نام کاربری یا رمز عبور صحیح نمیباشد']);

        endif;

        $user = Auth::getProvider()->retrieveByCredentials($credentials);

        Auth::login($user);

        return $this->authenticated($request, $user);
    }


    protected function authenticated(Request $request, $user) 
    {
        return redirect()->route('admin-home');
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

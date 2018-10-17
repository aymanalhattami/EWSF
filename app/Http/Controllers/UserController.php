<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use Illuminate\Support\Facades\DB;
use function Sodium\compare;
use Charts;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $allUsers = User::orderBy('created_at', 'desc')->paginate(15);
        $admins = null;
        $user_not_admins = null;

        /***********************************************************************************/
        //retrieve data from database for sensor 1
        $users_count = DB::select("SELECT count(*) AS u_numbers FROM users GROUP BY admin ORDER BY admin");
//        $users_users_count = DB::select("SELECT count(*) AS admins_numbers FROM users WHERE admin = 0 GROUP BY admin ORDER BY admin");

        //change the object to array
        $users_array = [];
        foreach ($users_count as $n)
        {
            $users_array[] = $n->u_numbers;
        }

        //sensor 1 data chart
        $admins_chart = Charts::create('bar', 'highcharts')
            ->title('Admins and Users')
            ->elementLabel("Count")
            ->labels(["Users Number", "Admins Number"])
            ->values($users_array)
            ->responsive(true);

        return view('users.index', compact('allUsers', 'admins_chart', 'admins', 'user_not_admins'));
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
        $theUser = User::find($id);

        return view('users.edit', compact('theUser'));
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
        $user = User::find($id);//object of the Post Model

        //check the email
        $uid = $request->input('id');
        $checkEmail = DB::select("SELECT email FROM users WHERE email = '" . $request->input('email') . "' && id != " . $uid);

        if(count($checkEmail) > 0)
            return redirect("/users/$uid/edit")->with("error", "the email is already taken by another user");

        $user->name = $request->input('name');
        $user->email = $request->input('email');
        $user->admin = $request->input('admin');
        if($request->input("password") != null)
        {
            $user->password = bcrypt($request["password"]);
        }
        else
        {
            $user->password = bcrypt($user->password);
        }

        $user->save();

        DB::insert("INSERT INTO auditings (`user_email`, `user_name`, `type`, `action`) VALUES('" . auth()->user()->email . "', '" . auth()->user()->name . "', 'Edit User', '" . $request->input('id') . " has been updated')");

        return redirect('/users')->with("success", "Updated done successfully");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $user = User::find($id);
        $user->delete();

        DB::insert("INSERT INTO auditings (`user_email`, `user_name`, `type`, `action`) VALUES('" . auth()->user()->email . "', '" . auth()->user()->name . "', 'Delete User', '" . $user->id . " has been Deleted')");

        return redirect('/users')->with("success", "deleted done successfully");
    }

    public function search()
    {
        $userData = $_GET['user'];
        $targetUser = DB::select("SELECT * FROM users WHERE name like '" . "%$userData%" . "' OR id like '" . "%$userData%" . "' OR email like '" . "%$userData%" . "' OR created_at like '" . "%$userData%" . "' ORDER BY id DESC");
        return $targetUser;
    }

    public function delete($id)
    {
        $user = User::find($id);
        if($user != null) {
            $user->delete();
            return redirect('/users')->with("success", "deleted done successfully");
        }else{
            return redirect('/users')->with("error", "the user is not found");
        }
    }

    public function admins()
    {
        $admins = DB::select("SELECT * FROM users WHERE admin = 1 ORDER BY id DESC");
        $allUsers = null;
        $user_not_admins = null;
//        $admins = DB::table('users')->where('admin', ' = ', '1')->paginate(15);
        return view('users.index', compact('admins', 'allUsers', 'user_not_admins'));
    }

    public function users_not_admins()
    {
        $user_not_admins = DB::select("SELECT * FROM users WHERE admin = 0 ORDER BY id DESC");
        $allUsers = null;
        $admins = null;
//        $admins = DB::table('users')->where('admin', ' = ', '1')->paginate(15);
        return view('users.index', compact('user_not_admins', 'allUsers', 'admins'));
    }
}

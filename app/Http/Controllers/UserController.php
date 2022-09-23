<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\DB;
use Hash;
use Auth;


class UserController extends Controller
{
    public function __construct()
    {
        $this->middleware("auth");
    }

    public function index()
    {
        return view('user.index');
    }

    public function listData()
    {
        // $user = User::orderBy('name', 'asc')->get();
        $user = DB::table('users')
            ->join('jabatan_kerjas', 'users.id_jabatan', '=', 'jabatan_kerjas.id')
            ->select('users.*', 'jabatan_kerjas.nama_jabatan')
            ->get();

        $no = 0;
        $data = array();

        foreach ($user as $list) {
            $no++;
            $row = array();
            $row[] = $no;
            $row[] = $list->name;
            $row[] = $list->email;
            if ($list->level == 1) {
                $row[] = "admin";
            } else {
                $row[] = "user";
            }
            $row[] = $list->nama_jabatan;
            $row[] = '<div class = "btn-group">
                <a onclick = "editForm(' . $list->id . ')" class = "btn btn-primary btn-sm" >
                    <i class = "fa fa-pencil"></i>
                </a>
                <a onclick = "deleteData(' . $list->id . ')" class = "btn btn-danger btn-sm" >
                    <i class = "fa fa-trash"></i>
                </a>
            </div>';
            $data[] = $row;
        }
        $output = array("data" => $data);
        return response()->json($output);
    }

    public function store(Request $request)
    {
        $user = new User;
        $user->name     = $request['name'];
        $user->level    = $request['level'];
        $user->email    = $request['email'];
        $user->nip    = $request['email'];
        $user->password = bcrypt($request['password']);
        $user->save();
    }

    public function edit($id)
    {
        $user = User::find($id);
        echo json_encode($user);
    }

    public function update(Request $request, $id)
    {
        $user = User::find($id);
        $user->name       = $request['name'];
        $user->level      = $request['level'];
        $user->email      = $request['email'];
        $user->id_jabatan      = $request['id_jabatan'];
        $user->unit_kerja      = $request['unit_kerja'];
        $user->pangkat      = $request['pangkat'];
        if(!empty($request['password'])) $user -> password   = bcrypt($request['password']);
        $user->update();
    }

    public function destroy($id)
    {
        $user = User::find($id);
        $user->delete();
    }
}

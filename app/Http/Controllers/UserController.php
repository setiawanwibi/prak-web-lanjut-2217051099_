<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Kelas;
use App\Models\UserModel;

class UserController extends Controller
{
    public $userModel;
    public $kelasModel;

    public function create()
    {
        $kelasModel = new Kelas();
        $kelas = $this->kelasModel->getKelas();
        $data = [
            'title' => 'Create User',
            'kelas' => $kelas,
        ];
        return view('create_user', $data);
    }

    public function __construct(){
        $this->userModel = new UserModel();
        $this->kelasModel = new Kelas();
    }

    public function index(){
        $data = [
            'title' => 'Create User',
            'kelas' => $this->userModel->getUser(),
        ];

        $users = UserModel::with('kelas')->get();

        return view('list_user', compact('users'), $data);
    }

    public function store(Request $request)
    {
        $this->userModel->create([
            'nama' => $request->input('nama'),
            'npm' => $request->input('npm'),
            'kelas_id' => $request->input('kelas_id'),
            ]);
            return redirect()->to('/user');
    }


    public function uploadProfilePicture(Request $request)
    {
        
        $request->validate([
            'profile_picture' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        
        $file = $request->file('profile_picture');

     
        $fileName = time().'_'.$file->getClientOriginalName();

      
        $file->move(public_path('assets/img'), $fileName);

     
        $profile_picture_path = 'assets/img/' . $fileName;

        
        return back()->with([
            'profile_picture' => $profile_picture_path,
            'nama' => $request->input('nama'),
            'npm' => $request->input('npm'),
            'nama_kelas' => $request->input('kelas_id') 
        ]);
    }

    public function showProfile($id)
    {
      
        $user = User::findOrFail($id);

        return view('profile', [
            'nama' => $user->nama,
            'npm' => $user->npm,
            'nama_kelas' => $user->kelas->nama_kelas ?? 'Kelas tidak ditemukan',
            'profile_picture' => session('profile_picture', 'public/assets/img/Bromo DHR 2.jpg'), 
        ]);
    }
}
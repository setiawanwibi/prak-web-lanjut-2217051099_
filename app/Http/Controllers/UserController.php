<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use App\Models\Kelas;
use App\Models\UserModel;

class UserController extends Controller
{
    public $userModel; 
    public $kelasModel;

    public function __construct() 
    { 
        $this->userModel = new UserModel(); 
        $this->kelasModel = new Kelas(); 
    }

    public function create()
    {
        $kelas = $this->kelasModel->getKelas();
    
        $data = [
            'title' => 'Create User',
            'kelas' => $kelas,
        ];
    
        return view('create_user', $data);
    }

    public function index() 
    { 
        $data = [ 
            'title' => 'Create User', 
            'kelas' => $this->userModel->getUser(), 
        ]; 
    
        $users = UserModel::with('kelas')->get();
    
        return view('list_user', compact('users'), $data); 
    }

    public function store(Request $request)
    {
        $request->validate([
            'nama' => 'required|string|max:255',
            'npm' => 'required|string|max:255',
            'kelas_id' => 'required|integer',
            'jurusan' => 'required|string|max:255',
            'semester' => 'required|integer|min:1|max:8', 
            'foto' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);


        if ($request->hasFile('foto')) {
            $foto = $request->file('foto');
            $fotoName = time() . '_' . $foto->getClientOriginalName(); 
            $fotoPath = $foto->move(public_path('uploads/img'), $fotoName); 
            $fotoPath = 'uploads/img/' . $fotoName;
        } else {
            $fotoPath = null;
        }

        $this->userModel->create([
            'nama' => $request->input('nama'),
            'npm' => $request->input('npm'),
            'kelas_id' => $request->input('kelas_id'),
            'jurusan' => $request->input('jurusan'), 
            'semester' => $request->input('semester'), 
            'foto' => $fotoPath, 
        ]);

        return redirect()->to('/user')->with('success', 'User berhasil ditambahkan');
    }

    public function show($id)
    {
        $user = $this->userModel->getUser($id);

        $data = [
            'title' => 'Profile',
            'user'  => $user,
        ];

        return view('profile', $data);
    }

    public function edit($id)
    {
        $user = UserModel::findOrFail($id);
        $kelas = $this->kelasModel->getKelas();
        $title = 'Edit User';
        return view('edit_user', compact('user', 'kelas', 'title'));
    }

    // Fungsi update dengan jurusan dan semester
    public function update(Request $request, $id)
    {
        $user = UserModel::findOrFail($id);

        // Validasi input
        $request->validate([
            'nama' => 'required|string|max:255',
            'npm' => 'required|string|max:255',
            'kelas_id' => 'required|integer',
            'jurusan' => 'required|string|max:255',
            'semester' => 'required|integer|min:1|max:8',
            'foto' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        // Update data user
        $user->nama = $request->input('nama');
        $user->npm = $request->input('npm');
        $user->kelas_id = $request->input('kelas_id');
        $user->jurusan = $request->input('jurusan'); // Update jurusan
        $user->semester = $request->input('semester'); // Update semester

        // Update foto jika ada
        if ($request->hasFile('foto')) {
            $fileName = time() . '.' . $request->file('foto')->extension();
            $request->file('foto')->move(public_path('uploads'), $fileName);
            $user->foto = 'uploads/' . $fileName;
        }

        $user->save();

        return redirect()->route('user.list')->with('success', 'User updated successfully');
    }


    public function destroy($id)
    {
        $user = UserModel::findOrFail($id);
        $user->delete();

        return redirect()->route('user.list')->with('success', 'User has been deleted successfully');
    }

    public function uploadProfilePicture(Request $request)
    {
        $request->validate([
            'profile_picture' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        $file = $request->file('profile_picture');
        $fileName = time() . '_' . $file->getClientOriginalName();
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
            'profile_picture' => session('profile_picture', 'public/assets/img/default.jpg'),
        ]);
    }
}
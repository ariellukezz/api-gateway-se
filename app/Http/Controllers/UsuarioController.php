<?php

namespace App\Http\Controllers;
use App\Models\User;
use App\Traits\ApiResponser;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class UsuarioController extends Controller
{
    use ApiResponser;

    public function index()
    {
        $users = User::all();
        return $this->validResponse($users);
    }

    public function store(Request $request)
    {
        $rules = [
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:6|confirmed',
        ];
    
        $this->validate($request, $rules);

        $hashedPassword = Hash::make($request->password);
    
        // Crear un nuevo usuario con los datos validados y la contraseña hasheada
        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => $hashedPassword,
        ]);    
        
        return $this->successResponse($user);
    }

    public function show($id)
    {
        $user = User::findOrFail($id);
        return $this->successResponse($user);
    }

    public function update(Request $request, $id)
    {
        $rules = [
            'name' =>  'string|max:255',
            'email' => 'string|email|max:255|unique:users'.$id,
            'password' => 'string|min:6|confirmed',
        ];

        $this->validate($request, $rules);
        
        $user = User::findOrFail($id);

        if($user->has('password')){
            $user->password = Hash::make($request->password);
        }
        if($user->isClear()){
            return $this->errorResponse('Cambia los valores',Response::HTTP_UNPROCESSABLE_ENTITY);
        }

        $user->save();


        $user->update($request->all());
        return $this->successResponse($user);

    }

    public function destroy($id)
    {
        $user = User::findOrFail($id);
        $user->delete();
        return response()->json(204);
    }

}

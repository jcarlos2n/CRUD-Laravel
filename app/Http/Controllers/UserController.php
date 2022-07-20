<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\DB;

class UserController extends Controller
{
    public function getAllUsers()
    {
        try {
            //atacamos a la tabla
            // $users = DB::table('users')
            //     ->select('name', 'email')
            //     ->get()
            //     ->toArray();

            //atacamos al modelo
            $users = User::query('users')
                ->get()
                ->toArray();

            return response()->json([
                'success' => true,
                'message' => 'Users retrieve successfully',
                'data' => $users

            ], 200);
        } catch (\Exception $exception) {
            return response()->json([
                'success' => false,
                'message' => 'Error retrieving users'.$exception->getMessage(),
            ], 200);
        }
    }
    public function getUserById($id)
    {
        try {
            $user =  User::findOrFail($id);
            return response()->json([
                'success' => true,
                'message' => 'Users retrieve successfully',
                'data' => $user

            ], 200);
        } catch (\Exception $exception) {
            return response()->json([
                'success' => false,
                'message' => 'Error retrieving users'
            ], 500);
        }
    }
    public function createUser()
    {
        return ['post'];
    }
    public function updateUser($id)
    {
        return ['put'];
    }
    public function deleteUser($id)
    {
        return ['delete'];
    }
}

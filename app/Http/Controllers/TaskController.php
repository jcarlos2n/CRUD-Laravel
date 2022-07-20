<?php

namespace App\Http\Controllers;

use App\Models\Task;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;

class TaskController extends Controller
{
    public function getTask()
    {
        try {
            Log::info("Getting all tasks");
            $tasks = Task::query('tasks')
                ->get()
                ->toArray();

            return response()->json([
                'success' => true,
                'message' => 'Tasks retrieve successfully',
                'data' => $tasks

            ], 200);
        } catch (\Exception $exception) {
            Log::error("Error getting tasks: " . $exception->getMessage());
            return response()->json([
                'success' => false,
                'message' => 'Error getting task' . $exception->getMessage(),
            ], 500);
        }
    }

    public function postTask(Request $request)
    {
        try {
            Log::info("Creating tasks");
            $title = $request->input("title");
            $name = $request->input("name");
            // $hecho = $request->input('hecho?');
            $user_id = $request->input("user_id");
            //instancio el nuevo modelo
            $task = new Task();
            //guardo los atributos
            $task->title = $title;
            $task->name = $name;
            // $task->hecho = $hecho;
            $task->user_id = $user_id;
            //guardo los atributos en bbdd
            $task->save();

            return response()->json([
                'success' => true,
                "message" => "task created succesfully"
            ]);
        } catch (\Exception $exception) {
            Log::error("Error posting tasks: " . $exception->getMessage());
            return response()->json([
                'success' => false,
                'message' => 'Error posting task' . $exception->getMessage(),
            ], 500);
        }
    }
    public function updateTask(Request $request, $idtasks)
    {
        try {
            $task = Task::find($idtasks);
            if (!$task) {
                return response()->json([
                    "success" => true,
                    "message" => "Task doesnt exist"
                ], 404);
            }
            $title = $request->input('title');

            $task->title = $title;

            $task->save();
            return response()->json([
                "success" => true,
                "message" => "Task updated"
            ], 200);
        } catch (\Exception $exception) {
            Log::error("Error updating tasks: " . $exception->getMessage());
            return response()->json([
                'success' => false,
                'message' => 'Error updating task' . $exception->getMessage(),
            ], 500);
        }
    }
}

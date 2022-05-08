<?php

namespace App\Http\Controllers\API;

use Illuminate\Http\Request;
use App\Http\Controllers\API\BaseController as BaseController;
use App\Http\Resources\Task as TaskResource;
use App\Models\Task;
use Validator;

class TaskController extends BaseController
{
    public function index(){
        $tasks = Task::all();
        return $this->handleResponse(TaskResource::collection($tasks), 'Tasks have been retrieved');
    }


    public function store(Request $request){
        $input = $request->all();
        $validator = Validator::make($input, [
                'name' => 'required',
                'details' => 'required'
            ]
        );

        if($validator->fails()){
            return $this->handleError($validator->errors())
        }
        $task = Task::create($input);
        return $this->handleResponse(new TaskResource($task), 'Task Created');
    }

}

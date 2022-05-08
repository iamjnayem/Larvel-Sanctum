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




}

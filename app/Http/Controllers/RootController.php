<?php

namespace App\Http\Controllers;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Client\Request;

class RootController extends Controller
{
    protected Model $model;

    public function store(Request $request)
    {
        try {
            $param = $request->all();
            $result = $this->model->create($param);

            return response()->json($result);
        } catch (\Exception $exception) {
            throw $exception;
        }
    }

    public function index()
    {
        try {
            $result = $this->model->get();

            return response()->json($result);
        } catch (\Exception $exception) {
            throw $exception;
        }
    }

    public function show(Request $request, int $id)
    {
        try {
            $result = $this->model->find($id);

            return response()->json($result);
        } catch (\Exception $exception) {
            throw $exception;
        }
    }

    public function update(Request $request, int $id)
    {
        try {
            $result = $this->model->find($id);
            $result->update($request->all());

            return response()->json($result);
        } catch (\Exception $exception) {
            throw $exception;
        }
    }

    public function delete(int $id)
    {
        try {
            $result = $this->model->delete($id);

            return response()->json($result);
        } catch (\Exception $exception) {
            throw $exception;
        }
    }
}

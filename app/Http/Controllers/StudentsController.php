<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreUpdateStudents;
use App\Student;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class StudentsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $students = Student::all()->sortBy('id')->toArray();

        return response()->json($students, 200);
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
     * @param  \Illuminate\Http\StoreUpdateStudents  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $formValidate = new StoreUpdateStudents();
        $validate = Validator::make($request->all() , $formValidate->rules(), $formValidate->messages());

        if ($validate->fails()) {
            $messages = $validate->errors()->toArray();
            return response()->json($messages, 400);
        }

//        dd($request->all());

        $newStudent = (Student::create($request->all()));
        if ($newStudent) {
            return response()->json([
                'status' => 'success',
                'message' => 'Aluno Cadastrado',
                'data' => $newStudent
            ], 201);
        }

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($student)
    {
        $searchStudent = Student::find($student);
        if ($searchStudent) {
            return response()->json($searchStudent, 200);
        }

        return response()->json([
            'status' => 'error',
            'message' => 'Aluno não encontrado',
            'data' => []
        ], 400);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Student $student)
    {
        $formValidate = new StoreUpdateStudents();
        $validate = Validator::make($request->all(), $formValidate->rules(), $formValidate->messages());
        if ($validate->fails()) {
            $message = $validate->errors()->toArray();
            return response()->json($message, 400);
        }

        $student->fill($request->all());
        if ($student->update()) {
            return response()->json([
                'status' => 'success',
                'message' => 'Registro de aluno atualizado',
                'data' => $student
            ], 200);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $student
     * @return \Illuminate\Http\Response
     */
    public function destroy(Student $student)
    {
        if ($student->delete()) {
            return response()->json([
                'status' => 'success',
                'message' => 'Registro de aluno excluído',
                'data' => []
            ], 200);
        }
    }
}

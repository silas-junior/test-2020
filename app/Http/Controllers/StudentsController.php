<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreUpdateStudents;
use App\Student;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class StudentsController extends Controller
{

    protected $student, $request;

    public function __construct(Student $student, Request $request)
    {
        $this->student = $student;
        $this->request = $request;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $students = $this->student->orderBy('id')->get();

        return response()->json($students, 200);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\StoreUpdateStudents  $request
     * @return \Illuminate\Http\Response
     */
    public function store()
    {
        $formValidate = new StoreUpdateStudents();
        $validate = Validator::make($this->request->all() , $formValidate->rules(), $formValidate->messages());

        if ($validate->fails()) {
            $messages = $validate->errors()->toArray();
            return response()->json([
                'status' => 'error',
                'messages' => $messages
            ], 400);
        }

        $newStudent = ($this->student->create($this->request->all()));
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
    public function show($studentId)
    {
        $searchStudent = $this->student->find($studentId);
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
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Student $studentId)
    {
        $formValidate = new StoreUpdateStudents();
        $validate = Validator::make($this->request->all(), $formValidate->rules(), $formValidate->messages());
        if ($validate->fails()) {
            $message = $validate->errors()->toArray();
            return response()->json($message, 400);
        }

        $studentId->fill($this->request->all());
        if ($studentId->update()) {
            return response()->json([
                'status' => 'success',
                'message' => 'Registro de aluno atualizado',
                'data' => $studentId
            ], 200);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $student
     * @return \Illuminate\Http\Response
     */
    public function destroy(Student $studentId)
    {
        $studentId->delete();
        return response()->json([], 204);
    }
}

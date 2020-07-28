<?php

namespace App\Http\Controllers;

use App\Course;
use App\Http\Requests\StoreUpdateCourses;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class CourseAreaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $courses = Course::all()->sortBy('id');

        return response()->json($courses , 200);
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
     * @param  \Illuminate\Http\StoreUpdateCourses  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $formValidate = new StoreUpdateCourses();
        $validate = Validator::make($request->all() , $formValidate->rules() , $formValidate->messages());

        if ($validate->fails()) {
            $messages = $validate->messages();
            return response()->json($messages, 400);
        }

        $newCourse = (Course::create($request->all()));
        if ($newCourse) {
            return response()->json([
                'status' => 'success',
                'message' => 'Curso Cadastrado',
                'data' => $newCourse
            ] ,201);
        }

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $course
     * @return \Illuminate\Http\Response
     */
    public function show($course)
    {
        $searchCourse = Course::find($course);

        if ($searchCourse) {
            return response()->json($searchCourse , 200);
        }

        return response()->json([
            'status' => 'error',
            'message' => 'Curso não encontrado',
            'data' => []
        ]);

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $course
     * @return \Illuminate\Http\Response
     */
    public function edit($course)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $course
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Course $course)
    {
        $formValidate = new StoreUpdateCourses();
        $validate = Validator::make($request->all() , $formValidate->rules() , $formValidate->messages());

        if ($validate->fails()) {
            $messages = $validate->messages();
            return response()->json($messages, 400);
        }

        $course->fill($request->all());
        $course->update();
        return response()->json([
            'status' => 'success',
            'message' => 'Curso Atualizado',
            'data' => $course
        ], 200);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $course
     * @return \Illuminate\Http\Response
     */
    public function destroy(Course $course)
    {
        if ($course->delete()) {
            return response()->json([
                'status' => 'success',
                'message' => 'Curso excluído',
                'data' => []
            ], 200);
        }

            return response()->json([
                'status' => 'error',
                'message' => 'Não é possível excluir um curso que não existe',
                'data' => []
            ], 204);
    }
}

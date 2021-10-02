<?php

namespace App\Http\Controllers;

use App\Models\Project;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class ProjectController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index(): Response
    {
        return response(Project::all());
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param Request $request
     * @return Response
     */
    public function store(Request $request): Response
    {
        $request->validate([
            'name' => 'required|string',
            'house_number' => 'required|integer',
            'house_number_extension' => 'string|nullable',
            'city' => 'required|string',
            'street' => 'required|string',
            'postal_code' => 'required|string',
            'document_path' => 'nullable|string',
            'email' => 'nullable|string',
        ]);

        return response(Project::create($request->all()));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function show($id): Response
    {
        return response(Project::find($id));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param Request $request
     * @param  int  $id
     * @return Response
     */
    public function update(Request $request, $id): Response
    {
        $project = Project::find($id);
        $project->update($request->all());

        return response($project);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return Response
     */
    public function destroy($id): Response
    {
        return response(Project::destroy($id));
    }
}

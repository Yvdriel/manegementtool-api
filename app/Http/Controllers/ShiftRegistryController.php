<?php

namespace App\Http\Controllers;

use App\Models\ShiftRegistry;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class ShiftRegistryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index()
    {
        return response(ShiftRegistry::all());
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param Request $request
     * @return Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'shift_id' => 'required',
            'user_id' => 'required',
            'time_start' => 'required',
            'time_end' => 'required',
            'available' => 'required|nullable',
            'approved' => 'boolean|nullable',
            'approved_by' => 'integer|nullable',
        ]);

        return response(ShiftRegistry::create($request->all()));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function show($id)
    {
        return response(ShiftRegistry::find($id));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param Request $request
     * @param  int  $id
     * @return Response
     */
    public function update(Request $request, $id)
    {
        $shiftRegistry = ShiftRegistry::find($id);
        $shiftRegistry->update($request->all());

        return response($shiftRegistry);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return Response
     */
    public function destroy($id)
    {
        return response(ShiftController::destroy($id));
    }
}

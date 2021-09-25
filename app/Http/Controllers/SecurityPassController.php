<?php

namespace App\Http\Controllers;

use App\Models\SecurityPass;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class SecurityPassController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index()
    {
        return response(SecurityPass::all());
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param Request $request
     * @return Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function show($id)
    {
        return response(SecurityPass::where('user_id', $id)->get());
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
        $securityPass = SecurityPass::where('user_id', $id)->get();
        $securityPass->update($request->all());

        return response($securityPass);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return Response
     */
    public function destroy($id)
    {
        return response(SecurityPass::destroy($id));
    }
}

<?php

namespace App\Http\Controllers;

use App\Models\Shift;
use App\Models\Project;
use DateTime;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Config;

class ShiftController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index()
    {
        $response = [];
        $shifts = Shift::all();

        foreach($shifts as $shift) {
            $shift = $this->formatDate($shift);

            $response[$shift['id']] = [
                'shift' => $shift,
                'project' => Project::find($shift['project_id']),
            ];
        }

        return response($response);
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
            'project_id' => 'required',
            'company_id' => 'required',
            'name' => 'required',
            'date' => 'required',
            'time_start' => 'required',
            'time_end' => 'required'
        ]);

        return response(Shift::create($request->all()));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function show($id)
    {
        $shift = Shift::find($id);
        $response = [
            'shift' => $shift,
            'project' => Project::find($shift['project_id']),
        ];

        return response($response);
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
        $shift = Shift::find($id);
        $shift->update($request->all());

        return response($shift);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return Response
     */
    public function destroy($id)
    {
        return response(Shift::destroy($id));
    }

    private function formatDate($shift)
    {
        $timeStart = new DateTime($shift['time_start']);
        $timeEnd = new DateTime($shift['time_end']);
        $date = new DateTime($shift['date']);


        $dateFormattedArray = explode(" ", $date->format('d M Y'));
        $constants = Config::get('constants.date');
        $dateFormattedArray[1] = $constants[$dateFormattedArray[1]];

        $dateFormatted = $dateFormattedArray[0] . ' ' . $dateFormattedArray[1] . ' ' . $dateFormattedArray[2];

        $shift['time_start'] = $timeStart->format('H:i');
        $shift['time_end'] = $timeEnd->format('H:i');
        $shift['date_formatted'] = $dateFormatted;

        return $shift;
    }
}

<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Patient;
use DB;
use Carbon\Carbon;
use PDF;
use App;

class ReportsController extends Controller
{
    /**
     *  Only authenticated users can access this controller
     */
    public function __construct(){
        $this->middleware('auth');
    }

    /**
     * Show the Report view
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $patients = Patient::Paginate(4);
        return view('reports.index')->with('patients',$patients);
    }

    /**
     *  Generate PDF
     * 
     * @return \Illuminate\Http\Response
     */
    public function makeReport(Request $request){
        $this->validate($request,[
            'date_from' => 'required',
            'date_to'   => 'required'
        ]);
        
        $date_from = $request->input('date_from');
        $date_to = $request->input('date_to');

        /**
         *  patients between two dates
         */
        $patients = Patient::whereBetween('join_date' ,[new Carbon($date_from),new Carbon($date_to)])->get();

        //generate pdf
        $pdf = PDF::loadView('reports.report',['patients' => $patients])->setPaper('a4', 'landscape');
        return $pdf->stream('patient_hired_report_from_'.$date_from.'_to_'.$date_to.'.pdf');
    }
}

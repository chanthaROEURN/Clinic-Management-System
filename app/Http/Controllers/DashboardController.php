<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Patient;
use App\Department;
use App\Division;
use App\Country;
use App\City;
use App\State;
use App\Salary;
use App\Admin;
use Carbon\Carbon;
use DB;

class DashboardController extends Controller
{
    /**
     *  Only authenticated users can access this controller
     */
    public function __construct(){
        $this->middleware('auth');
    }
    
    /**
     * Show Dashboard View
     *
     * @return View
     */
    public function index(){
        //get Current date and time
        $date_current = Carbon::now()->toDateTimeString();
        //get date and time of previous month
        /**
         *  subMonths() means it will subtract the month with
         *  the given argument.
         */
        $prev_date1 = $this->getPrevDate(1);
        $prev_date2 = $this->getPrevDate(2);
        $prev_date3 = $this->getPrevDate(3);
        $prev_date4 = $this->getPrevDate(4);

        /**
         *  get count of patient between two given dates.
         */
        $pat_count_1 = Patient::whereBetween('join_date',[$prev_date1,$date_current])->count();
        $pat_count_2 = Patient::whereBetween('join_date',[$prev_date2,$prev_date1])->count();
        $pat_count_3 = Patient::whereBetween('join_date',[$prev_date3,$prev_date2])->count();
        $pat_count_4 = Patient::whereBetween('join_date',[$prev_date4,$prev_date3])->count();

        $t_admins = Admin::all()->count();
        $t_patients = Patient::all()->count();
        $t_countries = Country::all()->count();
        $t_states = State::all()->count();
        $t_cities = City::all()->count();
        $t_departments = Department::all()->count();
        $t_divisions = Division::all()->count();
        $t_salaries = Salary::all()->count();


        return view('dashboard.index')
            ->with([
                'pat_count_1'     =>  $pat_count_1,
                'pat_count_2'     =>  $pat_count_2,
                'pat_count_3'     =>  $pat_count_3,
                'pat_count_4'     =>  $pat_count_4,
                't_patients'     =>  $t_patients,
                't_countries'     =>  $t_countries,
                't_cities'        =>  $t_cities,
                't_states'        =>  $t_states,
                't_salaries'      =>  $t_salaries,
                't_divisions'     =>  $t_divisions,
                't_departments'   =>  $t_departments,
                't_admins'        =>  $t_admins
            ]);
    }

    /**
     *  get the sub month of the given integer
     */
    private function getPrevDate($num){
        return Carbon::now()->subMonths($num)->toDateTimeString();
    }
}

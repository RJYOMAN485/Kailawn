<?php

namespace App\Http\Controllers\Public;

use App\Http\Controllers\Controller;
use App\Models\Facility;
use App\Models\Grade;
use App\Models\HomeTuition;
use App\Models\Role;
use App\Models\School;
use App\Models\Specialization;
use App\Models\Subject;
use App\Models\TransportCounter;
use App\Models\TransportRental;
use App\Models\TuitionCenter;
use App\Models\Village;
use Illuminate\Http\Request;

class MasterDataController extends Controller
{

    public function __invoke()
    {
        $data['home_tuitions'] = HomeTuition::all();
        $data['tuition_centers'] = TuitionCenter::all();
        $data['schools'] = School::all();

        $data['grades'] = Grade::all();
        $data['subjects'] = Subject::all();
        $data['facilities'] = Facility::all();
        $data['roles'] = Role::all();
        $data['specializations'] = Specialization::all();
        $data['transport_counters'] = TransportCounter::all();
        $data['transport_rentals'] = TransportRental::all();
        $data['villages'] = Village::all();


        return [
            'data' => $data,
        ];
    }
}

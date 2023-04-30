<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Applicant;
use App\Models\Education;
use App\Models\Training;
use App\Models\Experience;

use Illuminate\Support\Facades\Auth;

class RecordController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {    
        $applicant   = Applicant::with(['department', 'province', 'district'])->where('user_id', Auth::id())->firstOrFail();
        $education   = Education::with(['degree', 'country'])->where('user_id', Auth::id())->orderBy('degree_date', 'desc')->get();
        $trainings   = Training::with('country')->where('user_id', Auth::id())->orderBy('end_date', 'desc')->get();
        $experiences = Experience::where('user_id', Auth::id())->orderBy('end_date', 'desc')->orderBy('start_date', 'desc')->get();

        return view('records.index', compact('applicant', 'education', 'trainings', 'experiences'));
    }

    /**
     * Display the specified resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function see()
    {
        $user          = User::findOrFail(Auth::id());
        $announcements = $user->announcements()->latest()->paginate(10);

        return view('records.see', compact('announcements'));
    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $user        = User::findOrFail($id);
        $applicant   = Applicant::with(['department', 'province', 'district'])->where('user_id', $id)->firstOrFail();
        $education   = Education::with(['degree', 'country'])->where('user_id', $id)->orderBy('degree_date', 'desc')->get();
        $trainings   = Training::with('country')->where('user_id', $id)->orderBy('end_date', 'desc')->get();
        $experiences = Experience::where('user_id', $id)->orderBy('end_date', 'desc')->orderBy('start_date', 'desc')->get();

        return view('records.show', compact('user', 'applicant', 'education', 'trainings', 'experiences'));
    }
}

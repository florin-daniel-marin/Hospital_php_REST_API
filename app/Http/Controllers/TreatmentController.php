<?php

namespace App\Http\Controllers;

use App\Models\Treatment;

use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use Illuminate\Support\Facades\Auth;


class TreatmentController extends Controller
{   
    //all treatments
    public function index(Request $request){

        $user =Auth::user();
        //$treats = Treatment::where('byWho_id', '=', $loginedDoctorID)->get();
  

        return view('treatments.index', [
            'heading' => 'Latest Treatments',
            'treatments' => Treatment::where('byWho_id','=', $user->id)->filter(request(['type', 'search']))->paginate(4),
        ]);

    }

    //show single treatment
    public function show(Treatment $treatment){
        return view('treatments.show', [
            'treatment' => $treatment
        ]);
    }

    //show create form
    public function create(){
        return view('treatments.create');
    }
    
    //store treatment data
    public function store(Request $request){
        $formFields = $request->validate([
            'name' => 'required',
            'type' => 'required',
            'byWho' => 'required',
            'byWho_id' => 'required',
            'problem' => 'required',
            'medicine' => 'required',
            'period' => 'required',
            'cost' => 'required',
            'begin_date' => 'required',
        ]);

        if($request->hasFile('photo')){
            $formFields['photo'] = $request->file('photo')->store('photos','public');
        }

        Treatment::create($formFields);

        // Session::flash('message', 'Treatment Created');

        return redirect('/treatments')->with('message', 'Treatment Created successfully!');
    }

    //show edit form
    public function edit(Treatment $treatment) {
        return view('treatments.edit', ['treatment' => $treatment]);
    }

    //update treatment data
    public function update(Request $request, Treatment $treatment){
        $formFields = $request->validate([
            'name' => 'required',
            'type' => 'required',
            'problem' => 'required',
            'medicine' => 'required',
            'period' => 'required',
            'cost' => 'required',
            'begin_date' => 'required',
        ]);

        if($request->hasFile('photo')){
            $formFields['photo'] = $request->file('photo')->store('photos','public');
        }

        $treatment->update($formFields);

        // Session::flash('message', 'Treatment Created');

        return back()->with('message', 'Treatment updated successfully!');
    }

    //delete treatment
    public function destroy(Treatment $treatment){
        $treatment->delete();
        return redirect('/treatments')->with('message', 'Treatment deleted succesfully!');
    }

}

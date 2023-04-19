<?php

namespace App\Http\Controllers;

use App\Models\Patient;

use Illuminate\Http\Request;
use Illuminate\Validation\Rule;


class PatientController extends Controller
{   
    //all patients
    public function index(){
        return view('patients.index', [
            'heading' => 'Latest Patients',
            'patients' => Patient::latest()->filter(request(['atspec', 'search']))->paginate(4)
        ]);

    }

    //show single patient
    public function show(Patient $patient){
        return view('patients.show', [
            'patient' => $patient
        ]);
    }

    //show create form
    public function create(){
        return view('patients.create');
    }
    
    //store patient data
    public function store(Request $request){
        $formFields = $request->validate([
            'name' => 'required',
            'sex' => 'required',
            'atspec' => 'required',
            'address' => 'required',
            'email' => ['required', 'email'],
            'phone' => 'required',
            'dob' => 'required', 
        ]);

        if($request->hasFile('photo')){
            $formFields['photo'] = $request->file('photo')->store('photos','public');
        }

        Patient::create($formFields);

        // Session::flash('message', 'Patient Created');

        return redirect('/patients')->with('message', 'Patient Created successfully!');
    }

    //show edit form
    public function edit(Patient $patient) {
        return view('patients.edit', ['patient' => $patient]);
    }

    //update patient data
    public function update(Request $request, Patient $patient){
        $formFields = $request->validate([
            'name' => 'required',
            'atspec' => ['required'],
            'sex' => 'required',
            'phone' => 'required',
            'email' => ['required', 'email'],
            'address' => 'required',
            'dob' => 'required',
        ]);

        if($request->hasFile('photo')){
            $formFields['photo'] = $request->file('photo')->store('photos','public');
        }

        $patient->update($formFields);

        // Session::flash('message', 'Patient Created');

        return back()->with('message', 'Patient updated successfully!');
    }

    //delete patient
    public function destroy(Patient $patient){
        $patient->delete();
        return redirect('/patients')->with('message', 'Patient deleted succesfully!');
    }

}

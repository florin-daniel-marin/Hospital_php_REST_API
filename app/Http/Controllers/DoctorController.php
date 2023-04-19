<?php
namespace App\Http\Controllers;

use App\Models\Doctor;

use Illuminate\Http\Request;
use Illuminate\Validation\Rule;


class DoctorController extends Controller
{   
    //all doctors
    public function index(){
        return view('doctors.index', [
            'heading' => 'Doctors:',
            'doctors' => Doctor::latest()->filter(request(['spec', 'search']))->paginate(10)
        ]);
    }

    //show single doctor
    public function show(Doctor $doctor){
        return view('doctors.show', [
            'doctor' => $doctor
        ]);
    }

    //show create form
    public function create(){
        return view('doctors.create');
    }
    
    //store doctor data
    public function store(Request $request){
        $formFields = $request->validate([
            'name' => 'required',
            'sex' => 'required',
            'spec' => 'required',
            'room' => 'required',
            'address' => 'required',
            'email' => ['required', 'email'],
            'phone' => 'required',
            'dob' => 'required', 
        ]);

        if($request->hasFile('photo')){
            $formFields['photo'] = $request->file('photo')->store('photos','public');
        }

        Doctor::create($formFields);

        // Session::flash('message', 'Doctor Created');

        return redirect('/doctors')->with('message', 'Doctor Created successfully!');
    }

    //show edit form
    public function edit(Doctor $doctor) {
        return view('doctors.edit', ['doctor' => $doctor]);
    }

    //update doctor data
    public function update(Request $request, Doctor $doctor){
        $formFields = $request->validate([
            'name' => 'required',
            'sex' => 'required',
            'spec' => 'required',
            'room' => 'required',
            'address' => 'required',
            'email' => ['required', 'email'],
            'phone' => 'required',
            'dob' => 'required', 
        ]);

        if($request->hasFile('photo')){
            $formFields['photo'] = $request->file('photo')->store('photos','public');
        }

        $doctor->update($formFields);

        // Session::flash('message', 'Doctor Created');

        return back()->with('message', 'Doctor updated successfully!');
    }

    //delete doctor -destroy
    public function destroy(Doctor $doctor){
        $doctor->delete();
        return redirect('/')->with('message', 'Doctor deleted succesfully!');
    }

}

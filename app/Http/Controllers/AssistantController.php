<?php

namespace App\Http\Controllers;

use App\Models\Assistant;

use Illuminate\Http\Request;
use Illuminate\Validation\Rule;


class AssistantController extends Controller
{   
    //all assistants
    public function index(){
        return view('assistants.index', [
            'heading' => 'Latest Assistants',
            'assistants' => Assistant::latest()->filter(request(['spec', 'search']))->paginate(10)
        ]);

    }

    //show single assistant
    public function show(Assistant $assistant){
        return view('assistants.show', [
            'assistant' => $assistant
        ]);
    }

    //show create form
    public function create(){
        return view('assistants.create');
    }
    
    //store assistant data
    public function store(Request $request){
        $formFields = $request->validate([
            'name' => 'required',
            'sex' => 'required',
            'spec' => 'required',
            'address' => 'required',
            'email' => ['required', 'email'],
            'phone' => 'required',
            'dob' => 'required', 
        ]);

        if($request->hasFile('photo')){
            $formFields['photo'] = $request->file('photo')->store('photos','public');
        }

        Assistant::create($formFields);

        // Session::flash('message', 'Assistant Created');

        return redirect('/assistants')->with('message', 'Assistant Created successfully!');
    }

    //show edit form
    public function edit(Assistant $assistant) {
        return view('assistants.edit', ['assistant' => $assistant]);
    }

    //update assistant data
    public function update(Request $request, Assistant $assistant){
        $formFields = $request->validate([
            'name' => 'required',
            'sex' => 'required',
            'spec' => 'required',
            'address' => 'required',
            'email' => ['required', 'email'],
            'phone' => 'required',
            'dob' => 'required', 
        ]);

        if($request->hasFile('photo')){
            $formFields['photo'] = $request->file('photo')->store('photos','public');
        }

        $assistant->update($formFields);

        // Session::flash('message', 'Assistant Created');

        return back()->with('message', 'Assistant updated successfully!');
    }

    //delete assistant
    public function destroy(Assistant $assistant){
        $assistant->delete();
        return redirect('/assistants')->with('message', 'Assistant deleted succesfully!');
    }

}

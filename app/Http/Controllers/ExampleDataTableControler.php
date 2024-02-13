<?php

namespace App\Http\Controllers;

use App\Models\Example;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class ExampleDataTableControler extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware('role:admin|user');
    }

    public function index()
    {
        $examples = Example::get();
        return view('exampleDataTable.index', compact('examples'));
    }

    public function create()
    {
        return view('exampleDataTable.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'description' => 'nullable',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048'
        ]);
        try {
            $storeExample = new Example();
            $storeExample->name = $request->name;
            $storeExample->description = $request->description;
            if ($request->hasFile('image')) {
                $image = $request->file('image');
                $name = time().'.'.$image->getClientOriginalExtension();
                $destinationPath = public_path('/images/example');
                $image->move($destinationPath, $name);
                $storeExample->image = $name;
            }
            $storeExample->save();
        } catch (\Exception $e) {
            Log::error($e->getMessage());
            return redirect()->route('exampleDataTable.create')->with('error','Data unable to save');
        }
        return redirect()->route('exampleDataTable.index')->with('success','Data saved successfully');
    }

    public function show(Example $example)
    {
        return view('exampleDataTable.show',compact('example'));
    }

    public function edit(Example $example)
    {
        return view('exampleDataTable.edit',compact('example'));
    }

    public function update(Request $request, Example $example)
    {
        $request->validate([
            'name' => 'required',
            'description' => 'nullable',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);
        try {
            $example->name = $request->name;
            $example->description = $request->description;
            if ($request->hasFile('image')) {
                $image = $request->file('image');
                $name = time().'.'.$image->getClientOriginalExtension();
                $destinationPath = public_path('/images/example');
                $image->move($destinationPath, $name);
                $example->image = $name;
            }
            $example->save();
        } catch (\Exception $e) {
            Log::error($e->getMessage());
            return redirect()->route('exampleDataTable.edit')->with('error','Data unable to update');
        }
        return redirect()->route('exampleDataTable.index')->with('success','Data updated successfully');
    }

    public function destroy(Example $example)
    {
        try {
            $example->delete();
        } catch (\Exception $e) {
            Log::error($e->getMessage());
            return redirect()->route('exampleDataTable.index')->with('error','Data unable to delete');
        }
        return redirect()->route('exampleDataTable.index')->with('success','Data deleted successfully');
    }
}

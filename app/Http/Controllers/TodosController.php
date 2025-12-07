<?php

namespace App\Http\Controllers;

use App\Models\todos;
use Illuminate\Http\Request;

use Illuminate\Support\Facades\Auth;

class TodosController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $todos = todos::where('user_id', Auth::id())
            ->orderBy('priority', 'desc')
            ->orderBy('deadline', 'asc')
            ->get();

        return view('todolist', compact('todos'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'title'     => 'required|string|max:255',
            'desc'      => 'nullable|string',
            'priority'  => 'required|in:0,1,2,3,4',
            'deadline'  => 'required|date',
            'status'    => 'required|in:0,1,2,3',
        ]);

        $validated['user_id'] = Auth::id();

        $todo = todos::create($validated);

        // return response()->json([
        //     'message' => 'Todo created successfully.',
        //     'data'    => $todo
        // ], 201);
        return redirect()->route('todolist');
    }

    /**
     * Display the specified resource.
     */
    public function show(todos $todos)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(todos $todos)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $todo = todos::where('id', $id)
            ->where('user_id', Auth::id())
            ->firstOrFail();

        $validated = $request->validate([
            'title'     => 'sometimes|required|string|max:255',
            'desc'      => 'nullable|string',
            'priority'  => 'sometimes|required|in:0,1,2,3,4',
            'deadline'  => 'sometimes|required|date',
            'status'    => 'sometimes|required|in:0,1,2,3',
        ]);

        $todo->update($validated);

        // return response()->json([
        //     'message' => 'Todo updated successfully.',
        //     'data'    => $todo
        // ]);
        return redirect()->route('todolist');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $todo = todos::where('id', $id)
            ->where('user_id', Auth::id())
            ->firstOrFail();

        $todo->delete();

        // return response()->json([
        //     'message' => 'Todo deleted successfully.'
        // ]);
        return redirect()->route('todolist');
    }
}

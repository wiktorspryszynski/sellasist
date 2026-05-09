<?php

namespace App\Http\Controllers;

use App\Http\Requests\PetRequest;
use App\Http\Services\PetstoreService;
use Illuminate\Http\Request;

class PetController extends Controller
{
    public function __construct(private PetstoreService $petstore) {}

    public function index(Request $request)
    {
        $status = $request->query('status', 'available');

        $error = null;
        $pets = [];

        try {
            $pets = $this->petstore->getByStatus($status);
        } catch (\RuntimeException $e) {
            $error = $e->getMessage();
        }

        return view('pets.index', compact('pets', 'status', 'error'));
    }

    public function create()
    {
        return view('pets.create');
    }

    public function store(PetRequest $request)
    {
        try {
            $this->petstore->create($request->validated());
        } catch (\RuntimeException $e) {
            return back()->withErrors(['error' => $e->getMessage()]);
        }

        return redirect()->route('pets.index')->with('success', 'Pet created successfully.');
    }

    public function show(int $id)
    {
        try {
            $pet = $this->petstore->find($id);
        } catch (\RuntimeException $e) {
            return back()->withErrors(['error' => $e->getMessage()]);
        }

        return view('pets.show', compact('pet'));
    }

    public function edit(int $id)
    {
        try {
            $pet = $this->petstore->find($id);
        } catch (\RuntimeException $e) {
            return back()->withErrors(['error' => $e->getMessage()]);
        }

        return view('pets.edit', compact('pet'));
    }

    public function update(PetRequest $request, int $id)
    {
        try {
            $this->petstore->update(array_merge($request->validated(), ['id' => $id]));
        } catch (\RuntimeException $e) {
            return back()->withErrors(['error' => $e->getMessage()]);
        }

        return redirect()->route('pets.index')->with('success', 'Pet updated successfully.');
    }

    public function destroy(int $id)
    {
        try {
            $this->petstore->delete($id);
        } catch (\RuntimeException $e) {
            return back()->withErrors(['error' => $e->getMessage()]);
        }

        return redirect()->route('pets.index')->with('success', 'Pet deleted successfully.');
    }
}

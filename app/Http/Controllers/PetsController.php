<?php

namespace App\Http\Controllers;

use App\Models\Pet;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\PetRequest;

class PetsController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth', ['except' => ['index', 'show']]);
    }

	public function index()
	{
		$pets = Pet::paginate();
		return view('pets.index', compact('pets'));
	}

    public function show(Pet $pet)
    {
        return view('pets.show', compact('pet'));
    }

	public function create(Pet $pet)
	{
		return view('pets.create_and_edit', compact('pet'));
	}

	public function store(PetRequest $request)
	{
		$pet = Pet::create($request->all());
		return redirect()->route('pets.show', $pet->id)->with('message', 'Created successfully.');
	}

	public function edit(Pet $pet)
	{
        $this->authorize('update', $pet);
		return view('pets.create_and_edit', compact('pet'));
	}

	public function update(PetRequest $request, Pet $pet)
	{
		$this->authorize('update', $pet);
		$pet->update($request->all());

		return redirect()->route('pets.show', $pet->id)->with('message', 'Updated successfully.');
	}

	public function destroy(Pet $pet)
	{
		$this->authorize('destroy', $pet);
		$pet->delete();

		return redirect()->route('pets.index')->with('message', 'Deleted successfully.');
	}
}
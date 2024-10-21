<?php

namespace App\Http\Controllers;

use App\Models\Shareholder;
use App\Models\Agro;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class ShareholderController extends Controller
{
    // Method to show the form for creating a new shareholder
    public function create($agroId)
    {
        $agro = Agro::findOrFail($agroId);
        return view('shareholder.shareholder_create', compact('agro'));
    }

    // Method to store a new shareholder in the database
    public function store(Request $request, $agroId)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'position' => [
                'required',
                Rule::in(['Chairman', 'Director', 'Executive Committee', 'Shareholder']),
                Rule::unique('shareholders')->where(function ($query) use ($agroId, $request) {
                    return $query->where('agro_id', $agroId)
                                 ->where('position', $request->position)
                                 ->whereNotIn('position', ['Shareholder']);
                }),
            ],
            'nic' => [
                'required',
                'string',
                'max:20',
                Rule::unique('shareholders')->where(function ($query) use ($agroId) {
                    return $query->where('agro_id', $agroId);
                }),
            ],
            'gender' => 'required|in:Male,Female',
            'date_of_birth' => 'required|date',
            'age' => 'required|string|max:3',
            'contact_number' => 'required|string|max:15',
            'number_of_shares' => 'required|integer|min:1',
            'share_capital' => 'required|numeric|min:0',
            'current_status' => 'required|in:Active,Inactive',
        ], [
            'position.unique' => $request->position . ' already exists for this enterprise.',
            'nic.unique' => 'The NIC has already been registered for this enterprise.',
        ]);

        $agro = Agro::findOrFail($agroId);
        $shareholder = new Shareholder($request->all());
        $agro->shareholders()->save($shareholder);

        return redirect()->route('agro.index')->with('success', 'Shareholder added successfully.');
    }

    // Method to show the shareholders of a specific agro enterprise
    public function show($agroId)
    {
        $agro = Agro::with('shareholders')->findOrFail($agroId);
        return view('shareholder.shareholder_view', compact('agro'));
    }

    // Method to show the form for editing a specific shareholder
    public function edit($id)
    {
        $shareholder = Shareholder::findOrFail($id);
        return view('shareholder.shareholder_edit', compact('shareholder'));
    }

    // Method to update the shareholder information in the database
    public function update(Request $request, $id)
    {
        $shareholder = Shareholder::findOrFail($id);

        $request->validate([
            'name' => 'required|string|max:255',
            'position' => [
                'required',
                Rule::in(['Chairman', 'Director', 'Executive Committee', 'Shareholder']),
                Rule::unique('shareholders')->where(function ($query) use ($shareholder) {
                    return $query->where('agro_id', $shareholder->agro_id)
                                 ->where('position', $shareholder->position)
                                 ->whereNotIn('position', ['Shareholder']);
                })->ignore($shareholder->id),
            ],
            'nic' => [
                'required',
                'string',
                'max:20',
                Rule::unique('shareholders')->where(function ($query) use ($shareholder) {
                    return $query->where('agro_id', $shareholder->agro_id);
                })->ignore($shareholder->id),
            ],
            'gender' => 'required|in:Male,Female',
            'date_of_birth' => 'required|date',
            'age' => 'required|string|max:3',
            'contact_number' => 'required|string|max:15',
            'number_of_shares' => 'required|integer|min:1',
            'share_capital' => 'required|numeric|min:0',
            'current_status' => 'required|in:Active,Inactive',
        ], [
            'position.unique' => $request->position . ' already exists for this enterprise.',
            'nic.unique' => 'The NIC has already been registered for this enterprise.',
        ]);

        $shareholder->update($request->all());

        return redirect()->route('agro.index')->with('success', 'Shareholder updated successfully.');
    }

    // Method to delete a shareholder from the database
    public function destroy($id)
    {
        $shareholder = Shareholder::findOrFail($id);
        $shareholder->delete();

        return redirect()->route('agro.index')->with('success', 'Shareholder deleted successfully.');
    }
}

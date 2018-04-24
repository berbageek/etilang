<?php

namespace App\Http\Controllers;

use App\Violation;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ViolationController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $items = $request->user()->violations()->paginate(10);

        return view('violations.index', ['items' => $items]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('violations.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $violation                           = new Violation();
        $violation->violator_identity_number = $request->violator_identity_number;
        $violation->violator_name            = $request->violator_name;
        $violation->status                   = 'NEW';

        $user = $request->user();
        $user->violations()->save($violation);

        return redirect()->route('violations.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Violation $violation)
    {
        dd($violation);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Request $request, Violation $violation)
    {
        if ($request->user()->can('edit-violation', $violation)) {
            return view('violations.edit', ['violation' => $violation]);
        }

        abort(401);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Violation $violation)
    {
        $violation->violator_identity_number = $request->get('violator_identity_number');
        $violation->violator_name            = $request->get('violator_name');
        $violation->save();

        return redirect()->route('violations.index')->with('success', 'Data berhasil disimpan.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Violation $violation)
    {
        $violation->delete();

        return redirect()->route('violations.index')->with('success', 'Data berhasil dihapus.');
    }
}

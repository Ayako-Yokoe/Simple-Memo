<?php

namespace App\Http\Controllers;

use App\Models\Memos;
use Illuminate\Http\Request;

class MemosController extends Controller
{
    // Show All Memos
    public function index(){
        $memos = Memos::orderBy('id', 'asc')->get();
        return view('memos.index', ['memos' => $memos]);
    }

    // Show Create Form
    // public function create(){
    //     return view('memos.create')
    // }

    // Store Newly Created Memo
    public function store(Request $request){
        $formFields = $request->validate([
            'memo' => 'required|max:100'
        ], [
            'memo.max' => 'The memo should not exceed 100 characters.'
        ]);

        Memos::create($formFields);
        $memos = Memos::orderBy('id', 'asc')->get();

        return redirect()->route('memos.index');
    }

    // Show Single Memo
    public function show($id){
        $memo = Memos::findOrFail($id);
        return view('memos.edit', ['memo' => $memo]);
    }

    // Show Edit Form
    // public function edit(Memos $memo){
    //     return view('memos.edit');

    //     //OR
    //     // return view('memos.edit', ['memo' => $memo])
    // }


    // Update Memo
    public function update(Request $request, $id){
        $request->validate([
            'memo' => 'required'
        ]);

        Memos::where('id', $id)->update([
            'memo' => $request->input('memo')
        ]);

        return redirect()->route('memos.index');
    }

    // Delete Memo
    public function destroy($id){
        
        Memos::findOrFail($id)->delete();

        return redirect()->route('memos.index');
    }
}


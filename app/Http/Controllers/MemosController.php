<?php

namespace App\Http\Controllers;

use App\Models\Memos;
use Illuminate\Http\Request;

class MemosController extends Controller
{
    // Show All Memos
    public function index(){

        $user = auth()->user();
        $memos = $user->memos()->orderBy('id', 'asc')->get();

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

        $user = auth()->user();
        $user->memos()->create($formFields);
        // $memos = Memos::orderBy('id', 'asc')->get();

        return redirect()->route('memos.index', ['refresh' => 1]);
    }

    // Show Single Memo
    public function show($id){
        $user = auth()->user();
        $memo = $user->memos()->findOrFail($id);

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
        $formFields = $request->validate([
            'memo' => 'required|max:100'
        ], [
            'memo.max' => 'The memo should not exceed 100 characters.'
        ]);

        $user = auth()->user();
        $memo = $user->memos()->find($id);

        if($memo){
            $memo->memo = $formFields['memo'];
            $memo->save();
        }

        // Memos::where('id', $id)->update([
        //     'memo' => $formFields['memo']
        // ]);

        return redirect()->route('memos.index');
    }

    // Delete Memo
    public function destroy($id){

        $user = auth()->user();
        $memo = $user->memos()->find($id);

        if($memo){
            $memo->delete();
        }

        return redirect()->route('memos.index');
    }
}


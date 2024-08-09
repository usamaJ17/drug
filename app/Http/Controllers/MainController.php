<?php

namespace App\Http\Controllers;

use App\Imports\DrugsImport;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;
use Livewire\Attributes\Validate;
use Maatwebsite\Excel\Facades\Excel;

class MainController extends Controller
{
    public function search(){
        $uniqueInsurances = DB::table('drugs')
        ->distinct()
        ->pluck('insurance');
        return view('main.search')->with(compact('uniqueInsurances'));
    }
    public function userList(){
        return view('main.user-list');
    }
    public function userGetAll(){
        $users = User::all();
        $ret_data = [
            'data' => $users
        ];
        return response()->json($ret_data);
    }
    public function addDrugsForm(){
        return view('main.addDrugs');
    }
    public function importDrugs(Request $request){
        $validator = Validator::make($request->all(), [
            'file' => 'required|mimes:xlsx,xls,csv',
        ]);
        if ($validator->fails()) {
            return redirect()->back()->with('error', $validator->errors()->first());
        }
        Excel::import(new DrugsImport, $request->file('file'));
        return redirect()->route('pages-home');
    }
    public function userAddNew(Request $request){
        $user = new User();
        $user->name = $request->name;
        $user->email = $request->email;
        $user->password = bcrypt($request->password);
        $user->save();
        $user->assignRole('user');
        return response()->json($user);
    }
    public function userDelete(Request $request){
        $user = User::find($request->id);
        $user->delete();
        return response()->json(true);
    }
    public function searchDrugs(Request $request){
        $search = $request->input('ndc');
        $insurance = $request->input('insurance');
        $bin = $request->input('bin');
        $customer_group = $request->input('customer_group');

        $query = DB::table('drugs');

        if ($search) {
            $searchWildcard = '%' . $search . '%';
            $query->where(function($q) use ($searchWildcard) {
                $q->where('ndc', 'LIKE', $searchWildcard)
                ->orWhere('name', 'LIKE', $searchWildcard);
            });
        }

        if ($insurance && $insurance != 'Select Insurance') {
            $query->where('insurance', $insurance);
        }
        if($bin){
            $query->where('bin', $bin);
        }
        if($customer_group){
            $query->where('customer_group', $customer_group);
        }
        $query->orderBy('net_profit', 'desc');

        $drugs = $query->get();       
        return view('main.drugs-list')->with(compact('drugs'));
    }
    public function main(){
        $drugs = [];
        $uniqueInsurances = DB::table('drugs')
        ->distinct()
        ->pluck('insurance');
        $table = false;
        return view('index')->with(compact('drugs','table', 'uniqueInsurances'));
    }
}

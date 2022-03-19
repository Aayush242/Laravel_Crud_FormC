<?php

namespace App\Http\Controllers;
use App\Models\Account;
use Illuminate\Http\Request;
use App\Interfaces\AccountRepositoryInterface;

class AccountController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    // public function __construct()
    // {
    //     $this->middleware('auth');
    // }

    protected $accountR ;
    public function __construct(AccountRepositoryInterface $account)
    {
        $this->accountR = $account;
    }

    public function index()
    {
        //$accounts = Account::orderby('id','asc')->paginate(); before Repo
        return view('account.index',['accounts' => $this->accountR->all()]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('account.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        
        $account = new account;
        $fields = $request->all();
        $this->accountR->create($fields);

        // $account = account::find($id);
        // $account->f_name = $request->f_name;
        // $account->l_name = $request->l_name;
        // $account->dob = $request->dob;
        // $account->phone = $request->phone;
        // $account->email = $request->email;
        // $account->address = $request->address;
        // $account->hobby = $request->hobby;
        // $account->gender = $request->gender;
        // $account->country = $request->country;
        // $account->save();
        return redirect()->route('account.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Account  $account
     * @return \Illuminate\Http\Response
     */
    public function show(Account $account)
    {
        return view('account.show', ['account' => $this->accountR->find($account->id)]);
            
        // return view('account.show');

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Account  $account
     * @return \Illuminate\Http\Response
     */
    public function edit(Account $account)
    {
        return view('account.edit', ['account' => $this->accountR->find($account->id)]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Account  $account
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Account $account)
    {
        // before repo

        $request->validate([
            'f_name' => 'required',
            'l_name' => 'required',
            'dob' => 'required',
            'phone' => 'required',
            // 'age' => 'required',
            'email' => 'required',
            'address' => 'required',
            'gender' => 'required',
            'hobby' => 'required',
            'country' => 'required',
        ]);
       
        // $account = new account;
        // $account = account::find($account->id);
        // $account->f_name = $request->f_name;
        // $account->l_name = $request->l_name;
        // $account->dob = $request->dob;
        // $account->phone = $request->phone;
        // $account->email = $request->email;
        // $account->address = $request->address;
        // $account->hobby = $request->hobby;
        // $account->gender = $request->gender;
        // $account->country = $request->country;
        // $account->save();

        $this->accountR->update($account->id,$request);
        return redirect()->route('account.index')->with('Success','Details has been updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Account  $account
     * @return \Illuminate\Http\Response
     */
    public function destroy(Account $account)
    {
        $this->accountR->delete($account->id);
        return redirect()->route('account.index')->with('Success','Details has been deleted successfully');
    
    }
}
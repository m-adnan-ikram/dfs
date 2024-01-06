<?php

namespace App\Http\Controllers;

use App\Models\Account;
use App\Models\SubLedger;
use GuzzleHttp\Promise\Create;
use Illuminate\Http\Request;

class TierController extends Controller
{
    //
    public function sub_ledger()
{
    $data = SubLedger::with('account', 'account_child')->get();
    
    return view('tier.sub_ledger', [
        'data' => $data,
    ]);
}

    public function create_sub_ledger()
    {
        $data = Account::get();
        $tier1 = Account::where('parent_id', '0')->get();
        $tier2 = Account::where('parent_id', '!=', '0')->get();

        return view(
            'tier.create_subLedger',
            [   
                'data'   => $data,
                'tier1'  => $tier1,
                'tier2'  => $tier2,

            ]
        );
    }

    public function store_sub_ledger(Request $request)
    {   
       
        // return $request;
        // Validate the request data
        $request->validate([
            'name' => 'required',
            'tier1' => 'required',
            'tier2' => 'required',
        ]);

        SubLedger::create([
            'name'       => $request->name,
            'tier1_id'   => $request->tier1,
            'tier2_id'   => $request->tier2
        ]);

        // Assuming you have a Tier model to store data

        // You can redirect to a specific route or view after storing data
        return redirect()->back()->with('success', 'Setting updated successfully');

    }


    public function getTier2Options($tier1Id)
    {
        // Check if the $tier1Id parameter is missing
        if (!$tier1Id) {
            return response()->json(['error' => 'Missing tier1Id parameter'], 400);
        }

        // Fetch Tier2 options based on the selected Tier1 ID
        $tier2Options = Account::where('parent_id', $tier1Id)->get();

        return response()->json($tier2Options);
    }
}

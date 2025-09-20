<?php

namespace App\Http\Controllers;

use App\Models\TransactionHeader;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class HistoryController extends Controller
{
    public function getUserHistory()
    {
        $user = Auth::user();
        $role = $user->role;
        $userId = Auth::id();


        if ($role === 'Staff') {
            $transactions = TransactionHeader::where('branch_id', $user->staff_branch_id)
                ->with(['branch','customer', 'payment', 'details.package', 'details.product', 'details.promo'])
                ->orderBy('transaction_date', 'desc')
                ->paginate(5);
                return view('history', [
                    'transactions' => $transactions,
                ]);
        } else {
            $transactions = TransactionHeader::where('customer_id', $userId)
                ->with(['branch', 'customer','payment', 'details.package', 'details.product', 'details.promo'])
                ->orderBy('transaction_date', 'desc')
                ->paginate(5);
                return view('history', [
                    'transactions' => $transactions,
                ]);
        }
    }
}

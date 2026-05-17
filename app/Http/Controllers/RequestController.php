<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Services\TransactionService;

class RequestController extends Controller
{
    protected TransactionService $transactionService;

    public function __construct(TransactionService $transactionService)
    {
        $this->transactionService = $transactionService;
    }

    /**
     * Public Guest Quote Request Wizard submission.
     */
    public function store(Request $request)
    {
        $data = $request->all();
        $item = $this->transactionService->createRequest($data);
        return response()->json(['success' => true, 'item' => $item]);
    }
}

<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Services\TransactionService;

class ClickController extends Controller
{
    protected TransactionService $transactionService;

    public function __construct(TransactionService $transactionService)
    {
        $this->transactionService = $transactionService;
    }

    /**
     * Public contact click logging.
     */
    public function store(Request $request)
    {
        $data = $request->all();
        $item = $this->transactionService->logClick($data);
        return response()->json(['success' => true, 'item' => $item]);
    }
}

<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Services\TransactionService;

class MessageController extends Controller
{
    protected TransactionService $transactionService;

    public function __construct(TransactionService $transactionService)
    {
        $this->transactionService = $transactionService;
    }

    /**
     * Public Contact Form submission.
     */
    public function store(Request $request)
    {
        $data = $request->all();
        $item = $this->transactionService->createMessage($data);
        return response()->json(['success' => true, 'item' => $item]);
    }
}

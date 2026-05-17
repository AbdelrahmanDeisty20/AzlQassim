<?php

namespace App\Services;

use App\Models\Request;
use App\Models\Message;
use App\Models\Click;

class TransactionService
{
    public function getRequests(): array
    {
        return Request::orderBy('id', 'desc')->get()->toArray();
    }

    public function createRequest(array $data): Request
    {
        return Request::create($data);
    }

    public function updateRequestStatus(int $id, string $status): bool
    {
        $request = Request::find($id);
        if ($request) {
            return $request->update(['status' => $status]);
        }
        return false;
    }

    public function deleteRequest(int $id): bool
    {
        $request = Request::find($id);
        if ($request) {
            return (bool)$request->delete();
        }
        return false;
    }

    public function getMessages(): array
    {
        return Message::orderBy('id', 'desc')->get()->toArray();
    }

    public function createMessage(array $data): Message
    {
        return Message::create($data);
    }

    public function updateMessageReply(int $id, bool $replied): bool
    {
        $message = Message::find($id);
        if ($message) {
            return $message->update(['replied' => $replied]);
        }
        return false;
    }

    public function deleteMessage(int $id): bool
    {
        $message = Message::find($id);
        if ($message) {
            return (bool)$message->delete();
        }
        return false;
    }

    public function getClicks(): array
    {
        return Click::orderBy('id', 'desc')->get()->toArray();
    }

    public function logClick(array $data): Click
    {
        return Click::create($data);
    }
}

<?php
function unreadTicket()
{
    $tickets = \App\Ticket::where('status', 'unread')->orderByDesc('position')->get(['name', 'id', 'email', 'message']);
    return $tickets;
}

function unreadMessage()
{
    $messages = \App\Message::where('seen', "0")->orderByDesc('id')->get(['name', 'id', 'email', 'message']);
    return $messages;
}

function unConfirmComment()
{
    $messages = \App\Comment::where('confirm', "0")->orderByDesc('id')->get(['name', 'id', 'email', 'comment']);
    return $messages;
}

function unreadNewsletter()
{
    $n = \App\Newsletter::where('seen', '0')->orderByDesc('position')->count();
    if (!$n) {
        $n = 0;
    }
    return $n;
}
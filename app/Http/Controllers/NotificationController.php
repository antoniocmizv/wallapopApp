<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;

class NotificationController extends Controller
{
    public function markAsRead($id)
    {
        $notification = auth()->user()->notifications()->find($id);
        if ($notification) {
            $notification->markAsRead();
        }
        //la elimino de la base de datos
        $notification->delete();
        
        return redirect()->back()->with('success', 'Notificación marcada como leída.');
    }
}
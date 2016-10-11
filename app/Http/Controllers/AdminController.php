<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;

use App\Http\Requests;

class AdminController extends Controller
{

    public function newsConfirmed ($id) {
        $user = User::findOrFail($id);

        if($user->send_email == 1) {
            $user->update(['send_email' => 0]);
        } else {
            $user->update(['send_email' => 1]);
        }

        return redirect('kategorie');

    }



}

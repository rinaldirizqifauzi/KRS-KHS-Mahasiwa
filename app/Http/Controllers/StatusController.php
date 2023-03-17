<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class StatusController extends Controller
{
    public function updateStatus(Request $request, User $user)
    {

        if ($request->model == 'user') {
            $model = User::findOrFail($request->id);
            $model->setStatus($request->status);
            $model->save();

            flash()->addSuccess('Status Berhasil Diubah');
            return back();
        }
    }
}

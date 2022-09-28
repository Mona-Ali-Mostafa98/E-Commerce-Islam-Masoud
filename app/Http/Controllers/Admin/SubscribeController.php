<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Subscribe;
use Illuminate\Http\Request;

class SubscribeController extends Controller
{
        function __construct()
    {
        $this->middleware('permission:List Subscribes', ['only' => ['index']]);
        $this->middleware('permission:Delete Subscribe', ['only' => ['destroy']]);
    }

    public function index()
    {
        $request = request();
        $filters = $request->query();

        $subscribes = Subscribe::when($request->query('email'), function($query, $email) {
                $query->where('email', 'LIKE', '%' . $email . '%');
            })

        ->orderBy('id', 'desc')
        ->paginate(30);

        return view('admin.subscribes.index', compact('subscribes'));
    }

    public function destroy(Subscribe $subscribe)
    {
        $subscribe -> delete();

        toastr()->success(trans('messages.DeleteSuccessfully'));

        return redirect()->route('admin.subscribes.index');
    }

}

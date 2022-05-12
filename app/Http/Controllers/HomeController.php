<?php

namespace App\Http\Controllers;

use App\Mail\TodoComplete;
use App\Models\Todo;
use App\Models\User;
use App\Models\ViewModels\HomeViewModel;
use Illuminate\Auth\Events\Registered;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Config;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Validator;

class HomeController extends Controller
{

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * @param array $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data): \Illuminate\Contracts\Validation\Validator
    {
        return Validator::make($data, [
            'name' => ['required', 'string', 'max:255'],
        ]);
    }

    /**
     * Show the application dashboard.
     */
    public function index()
    {
        return view('home');
    }


    public function getList()
    {
        return Todo::orderBy('created_at', 'DESC')->get();
    }

    /**
     * Handle a registration request for the application.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Http\JsonResponse
     * @throws \Illuminate\Validation\ValidationException
     */
    public function create(Request $request): JsonResponse|\Illuminate\Http\RedirectResponse
    {
        $this->validator($request->all())->validate();

        $todo = Todo::create([
            'name' => $request->input('name')
        ]);

        return $todo;
    }

    /**
     * @param Request $request
     * @param int $id
     * @return string
     */
    public function complete(Request $request, int $id)
    {
        $todo = Todo::findOrFail($id);
        if ($todo) {

            $todo->status = Todo::STATUS_COMPLETE;
            $todo->save();

            Mail::to(Config::get('app.app_email'))->send(new TodoComplete(auth()->user(), $todo));

            return $todo;
        }
        return "Todo not found";
    }

    /**
     * @param int $id
     * @return string
     */
    public function delete(int $id)
    {
        $todo = Todo::findOrFail($id);
        if ($todo) {

            $todo->delete();
            return "Todo deleted.";
        }
        return "Todo not found.";
    }

}

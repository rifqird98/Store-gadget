<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\UserRequest;
use App\Models\User;
use Illuminate\Http\Request;
use Yajra\DataTables\Facades\DataTables;

class UsersController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        
            if (request()->ajax()) {
                $query = User::query();
                return Datatables::of($query)
                    ->addColumn('action', function ($item) {
                        return '
                            <div class="btn-group dropup">
                                <div class="dropdown">
                                    <button type="button" 
                                    class="btn btn-primary dropdown-toggle mr-1 mb-1"
                                    type="button" 
                                    id="action' .  $item->id . '" 
                                    data-bs-toggle="dropdown" 
                                    aria-expanded="false"> 
                                    Aksi
                                    </button>
                                    <div class="dropdown-menu" aria-labelledby="action' . $item->id . '">
                                        <a class="dropdown-item" href="' . route('users.edit', $item->id) . '">
                                            Sunting
                                        </a>
                                        <form action="' . route('users.destroy', $item->id) . '" method="POST">
                                            ' . method_field('delete') . csrf_field() . '
                                            <button type="submit" class="dropdown-item text-danger">
                                                Hapus
                                            </button>
                                        </form>
                                    </div>
                                    
                                </div>
                        </div>';
                    })
                    
                    ->rawColumns(['action'])
                    ->make();
            }
            return view('pages.admin.user.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('pages.admin.user.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(UserRequest $request)
    {
        //
        $data = $request->all();

        $data['password'] = bcrypt($request->password);

        User::create($data);

        return redirect()->route('users.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
        $item = User::findOrFail($id);

        return view('pages.admin.user.edit',[
            'item' => $item
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UserRequest $request, $id)
    {
        //
        $data = $request->all();

        $item = User::findOrFail($id);

        if($request->password)
        {
            $data['password'] =  bcrypt($request->password);
        }
        else 
        {
            unset($data['password']);
        }

        $item->update($data);

        return redirect()->route('users.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
        $item = User::findorFail($id);
        $item->delete();

        return redirect()->route('users.index');
    }
}

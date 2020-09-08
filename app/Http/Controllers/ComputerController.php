<?php

namespace App\Http\Controllers;

use App\Computers;
use App\Http\Requests\ComputerRequest;
use App\Repository\ComputerRepository;
use App\Repository\DataImportRepository;

use App\Services\GetDataFromApi;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Http\RedirectResponse;
use Illuminate\Routing\Redirector;
use Illuminate\Support\Facades\Session;

class ComputerController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index()
    {
        $computers = Computers::paginate(15);
        return view('admin.computers.list')->with('computers', $computers);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create()
    {
        return view('admin.computers.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @return Response
     */
    public function store(ComputerRequest $request, ComputerRepository $computerRepository )
    {
        $computerRepository->createOrUpdate($request->all());
        return redirect('computer');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function show($id,ComputerRepository $computer)
    {
        $computer = $computer->find($id);
        return view('admin.computers.single')->with(['computer'=>$computer]);

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function edit($id)
    {
        $computer = Computers::findOrFail($id);
        return view('admin.computers.update')->with(['computer'=>$computer]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  int  $id
     * @return Response
     */
    public function update($id ,ComputerRequest $request, ComputerRepository $computerRepository)
    {
        $computerRepository->update($request->all(),$id);
        Session::flash('message', 'Successfully Updated');
        return redirect()->back();

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return Response
     */
    public function destroy($id)
    {
        $nerd = Computers::find($id);
        $nerd->delete();
        Session::flash('message', 'Successfully Deleted');
        return redirect()->back();
    }

    /**
     * Sync db with api
     * @param DataImportRepository $dataImport
     * @return Application|RedirectResponse|Redirector
     */
    public function sync(DataImportRepository $dataImport)
    {
        $response = new GetDataFromApi();
        $data = $response->getData();

        if ($data) {
            $dataImport->ImportData($data);
        }
        return redirect('computer');

    }
}

<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\ExaminationRequest;
use App\Models\ExaminationReceipt as ModelsExaminationReceipt;
use App\Repository\Admin\ExaminationReceiptRepository;
use Illuminate\Http\Request;

class ExaminationReceipt extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */


    private $data;

    public function __construct(ExaminationReceiptRepository $data)
    {
        $this->data = $data;
    }

    public function index()
    {
        return $this->data->index();
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
         return $this->data->create();
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(ExaminationRequest $request)
    {
         return $this->data->store($request);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
         return $this->data->show($id);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        return $this->data->edit($id);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(ExaminationRequest $request, $id)
    {
        return $this->data->update($request);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request)
    {
       return $this->data->destroy($request);
    }

    public function print_examination($id)
    {
         return $this->data->print($id);

    }

    public function details($id)
    {
         return $this->data->details($id);

    }
}

<?php

namespace App\Repository\Admin;

use App\Interfaces\Admin\WasteLogRepositoryInterface;
use App\Models\Product;

class WasteLogRepository implements WasteLogRepositoryInterface
{

    //    protected $test = [
    //        'modelName' => '\App\Models\Branch',
    //        'folderImageName' => 'Branch',
    //        'routes' => 'Branch',
    //        'FolderBlade' => 'Branch',
    //    ];

    protected $modelName = '\App\Models\WasteLog';
    protected $folderImageName = 'wasteLog';
    protected $routes = 'wasteLog';
    protected $FolderBlade = 'wasteLog';


    public function index()
    {
        $data = $this->modelName::all();
        $product = Product::all();

        return view('Admin/' . $this->FolderBlade . '/' . 'index', compact('data', 'product'));
    }

    public function create()
    {
        try {
            return view('Admin/' . $this->FolderBlade . '/' . 'create');
        } catch (\Exception $e) {
            return redirect()->back()->withErrors(['error' => $e->getMessage()]);
        }
    }

    public function store($request,  $fileName = null)
    {
        try {
            $data = new $this->modelName;
            $data->date = date('Y-m-d');
            $data->Quantity = $request->Quantity;
            $data->name_company = $request->name_company;
            $data->product_id = $request->product_id;
            $data->type = $request->type;
            $data->notes = $request->notes;
            $photo = request()->file('photo');
            if ($photo) {
                $data['photo'] =
                    $fileName = time() . rand(0, 999999999) . '.' . $photo->getClientOriginalExtension();
                $photo->storeAs('public/' . $this->folderImageName, $fileName);;
            }
            $data->save();
            session()->flash('Add', 'تم الاضافه بنجاح');
            return redirect($this->routes);
        } catch (\Exception $e) {
            return redirect()->back()->withErrors(['error' => $e->getMessage()]);
        }
    }

    public function show($id)
    {

        try {
            $date = $this->modelName::findorfail($id);
            return view('Admin/' . $this->FolderBlade . '/' . 'show', compact('date'));
        } catch (\Exception $e) {
            return redirect()->back()->withErrors(['error' => $e->getMessage()]);
        }
    }

    public function edit($id)
    {
        try {
            $data = $this->modelName::findorfail($id);
            return view('Admin/' . $this->FolderBlade . '/' . 'edit', compact('data'));
        } catch (\Exception $e) {
            return redirect()->back()->withErrors(['error' => $e->getMessage()]);
        }
    }

    public function update($request, $fileName = null)
    {

        try {
            $data = $this->modelName::findorfail($request->id);
            $data->date = date('Y-m-d');
            $data->Quantity = $request->Quantity;
            $data->name_company = $request->name_company;
            $data->product_id = $request->product_id;
            $data->type = $request->type;
            $data->notes = $request->notes;
            $photo = request()->file('photo');
            if ($photo) {
                unlink(base_path('public/storage/' . $this->folderImageName . '/' . $data->photo));
                $data['photo'] =
                    $fileName = time() . rand(0, 999999999) . '.' . $photo->getClientOriginalExtension();
                $photo->storeAs('public/' .  $this->folderImageName, $fileName);
            }
            $data->save();
            session()->flash('Edit', 'تم التعديل بنجاح');
            return redirect($this->routes);
        } catch (\Exception $e) {
            return redirect()->back()->withErrors(['error' => $e->getMessage()]);
        }
    }

    public function destroy($request)
    {
        try {
            $this->modelName::destroy($request->id);
            // unlink(base_path('public/storage/' . $this->folderImageName . '/' . $request->photo));
            session()->flash('danger', 'تم الحذف بنجاح');
            return redirect($this->routes);
        } catch (\Exception $e) {
            return redirect()->back()->withErrors(['error' => $e->getMessage()]);
        }
    }

    public function waste($id)
    {
        $row = $this->modelName::findorfail($id);
        return view('admin/' . $this->FolderBlade . '/' . 'Print_waste', compact('row'));

    }
}

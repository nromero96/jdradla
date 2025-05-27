<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

//get models
use App\Models\Country;
use App\Models\State;
use App\Models\Supplier;
use App\Models\Servicecategory;
use App\Models\Service;
use App\Models\Suppliercontact;
use App\Models\TemporaryFile;
use App\Models\Supplierservice;
use App\Models\Supplierserviceroute;

//get spatie library HasMedia
use Spatie\MediaLibrary\HasMedia;
use Spatie\MediaLibrary\InteractsWithMedia;

use Illuminate\Support\Facades\Storage;



class SupplierController extends Controller implements HasMedia
{
    use InteractsWithMedia;
    
    public function index()
{
    $data = [
        'category_name' => 'suppliers',
        'page_name' => 'suppliers',
        'has_scrollspy' => 0,
        'scrollspy_offset' => '',
    ];

    $countries = Country::all();
    $servicecategories = Servicecategory::all();

    $suppliersQuery = Supplier::select('suppliers.*', 'countries.name as country_name', 'suppliercontacts.contact_email as contact_email', \DB::raw('COALESCE((SELECT GROUP_CONCAT(DISTINCT servicecategories.servicecategory_name SEPARATOR ", ") FROM supplierservices JOIN servicecategories ON servicecategories.id = supplierservices.servicecategory_id WHERE supplierservices.supplier_id = suppliers.id), "N/A") as service_category_names'))
        ->leftJoin('countries', 'countries.id', '=', 'suppliers.country_id')
        ->leftJoin('suppliercontacts', function ($join) {
            $join->on('suppliercontacts.supplier_id', '=', 'suppliers.id')
                ->where('suppliercontacts.contact_main', '=', 'yes');
        });

    // Verify if search parameters exist
    if (isset($_GET['search'])) {
        $search = $_GET['search'];

        $rating_supplier = $_GET['rating_supplier'];

        $servicecategory_id = $_GET['servicecategory_id'];

        $get_services_list = $_GET['services_list'];
        $services_list = !empty($get_services_list) ? explode(',', $get_services_list) : '';

        $origin_country_id = $_GET['origin_country_id'];
        $origin_state_id = $_GET['origin_state_id'];
        $origin_city = $_GET['origin_city'];
        $destination_country_id = $_GET['destination_country_id'];
        $destination_state_id = $_GET['destination_state_id'];
        $destination_city = $_GET['destination_city'];
        $crossing = $_GET['crossing'];
        $return_route = $_GET['return_route'];

        $suppliers = $suppliersQuery
            ->leftJoin('supplierservices', 'supplierservices.supplier_id', '=', 'suppliers.id')
            ->leftJoin('supplierserviceroutes', 'supplierserviceroutes.supplierservice_id', '=', 'supplierservices.id')
            ->where('suppliers.company_rating', '>=', $rating_supplier)
            ->where(function ($query) use ($servicecategory_id, $services_list, $origin_country_id, $origin_state_id, $origin_city, $destination_country_id, $destination_state_id, $destination_city, $crossing, $return_route) {
                if ($servicecategory_id != '') {
                    $query->where('supplierservices.servicecategory_id', '=', $servicecategory_id);
                }

                if (!empty($services_list)) {
                    $query->where(function ($query) use ($services_list) {
                        foreach ($services_list as $key => $value) {
                            $query->orWhere('supplierservices.services_list', 'like', '%' . $value . '%');
                        }
                    });
                }

                if ($origin_country_id != '') {
                    $query->where('supplierserviceroutes.origin_country', '=', $origin_country_id);
                }
                if ($origin_state_id != '') {
                    $query->where('supplierserviceroutes.origin_state', '=', $origin_state_id);
                }
                if ($origin_city != '') {
                    $query->where('supplierserviceroutes.origin_city', '=', $origin_city);
                }
                if ($destination_country_id != '') {
                    $query->where('supplierserviceroutes.destination_country', '=', $destination_country_id);
                }
                if ($destination_state_id != '') {
                    $query->where('supplierserviceroutes.destination_state', '=', $destination_state_id);
                }
                if ($destination_city != '') {
                    $query->where('supplierserviceroutes.destination_city', '=', $destination_city);
                }
                if ($crossing != '') {
                    $query->where('supplierserviceroutes.crossing', '=', $crossing);
                }
                if ($return_route != '') {
                    $query->where('supplierserviceroutes.return_route', '=', $return_route);
                }
            })
            ->distinct('suppliers.id')
            ->get();
    } else {
        $suppliers = $suppliersQuery->get();
    }

    return view('pages.suppliers.index')->with($data)->with('suppliers', $suppliers)->with('servicecategories', $servicecategories)->with('countries', $countries);
}



    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        // $category_name = '';
        $data = [
            'category_name' => 'suppliers',
            'page_name' => 'suppliercreate',
            'has_scrollspy' => 0,
            'scrollspy_offset' => '',
        ];

        $countries = Country::all();

        return view('pages.suppliers.create')->with($data)->with('countries',$countries);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //validate supplier
        $this->validate($request, [
            'company_name' => 'required',
            'company_address' => 'required',
            'country_id' => 'required',
            'state_id' => 'required',
            'city' => 'required',
        ]);

        //create supplier and get supplier id
        $supplier = new Supplier;
        $supplier->company_name = $request->input('company_name');
        $supplier->company_address = $request->input('company_address');
        $supplier->country_id = $request->input('country_id');
        $supplier->state_id = $request->input('state_id');
        $supplier->city = $request->input('city');
        $supplier->company_website = $request->input('company_website');
        $supplier->company_rating = $request->input('company_rating') ?? 0;
        $supplier->company_note = $request->input('company_note');
        $supplier->save();

        $temporaryfile_document_one = TemporaryFile::where('folder', $request->document_one)->first();
        if($temporaryfile_document_one){
            Storage::move('public/uploads/tmp/'.$request->document_one.'/'.$temporaryfile_document_one->filename, 'public/uploads/supplier_documents/'.$temporaryfile_document_one->filename);
            $supplier->document_one = $temporaryfile_document_one->filename;
            $supplier->save();
            rmdir(storage_path('app/public/uploads/tmp/'.$request->document_one));
            $temporaryfile_document_one->delete();
        }

        $temporaryfile_document_two = TemporaryFile::where('folder', $request->document_two)->first();
        if($temporaryfile_document_two){
            Storage::move('public/uploads/tmp/'.$request->document_two.'/'.$temporaryfile_document_two->filename, 'public/uploads/supplier_documents/'.$temporaryfile_document_two->filename);
            $supplier->document_two = $temporaryfile_document_two->filename;
            $supplier->save();
            rmdir(storage_path('app/public/uploads/tmp/'.$request->document_two));
            $temporaryfile_document_two->delete();
        }

        $temporaryfile_document_three = TemporaryFile::where('folder', $request->document_three)->first();
        if($temporaryfile_document_three){
            Storage::move('public/uploads/tmp/'.$request->document_three.'/'.$temporaryfile_document_three->filename, 'public/uploads/supplier_documents/'.$temporaryfile_document_three->filename);
            $supplier->document_three = $temporaryfile_document_three->filename;
            $supplier->save();
            rmdir(storage_path('app/public/uploads/tmp/'.$request->document_three));
            $temporaryfile_document_three->delete();
        }

        

        
        $contact_name = $request->input('contact_name');
        $contact_email = $request->input('contact_email');
        $contact_position = $request->input('contact_position');
        $contact_main = $request->input('contact_main');
        $contact_typeone = $request->input('contact_typeone');
        $contact_typeone_value = $request->input('contact_typeone_value');
        $contact_typetwo = $request->input('contact_typetwo');
        $contact_typetwo_value = $request->input('contact_typetwo_value');
        $contact_typethree = $request->input('contact_typethree');
        $contact_typethree_value = $request->input('contact_typethree_value');
        $contact_typefour = $request->input('contact_typefour');
        $contact_typefour_value = $request->input('contact_typefour_value');
        $contact_typefive = $request->input('contact_typefive');
        $contact_typefive_value = $request->input('contact_typefive_value');

        if ($contact_name != null) {
            $contact_count = count($contact_name);
            for ($i = 0; $i < $contact_count; $i++) {
                $suppliercontact = new Suppliercontact;
                $suppliercontact->supplier_id = $supplier->id;
                $suppliercontact->contact_name = $contact_name[$i];
                $suppliercontact->contact_email = $contact_email[$i];
                $suppliercontact->contact_position = $contact_position[$i];

                // Verificar si el contacto es principal
                if (isset($contact_main) && $contact_main == $i) {
                    $suppliercontact->contact_main = 'yes';
                } else {
                    $suppliercontact->contact_main = 'no';
                }

                $suppliercontact->contact_typeone = $contact_typeone[$i];
                $suppliercontact->contact_typeone_value = $contact_typeone_value[$i];
                $suppliercontact->contact_typetwo = $contact_typetwo[$i];
                $suppliercontact->contact_typetwo_value = $contact_typetwo_value[$i];
                $suppliercontact->contact_typethree = $contact_typethree[$i];
                $suppliercontact->contact_typethree_value = $contact_typethree_value[$i];
                $suppliercontact->contact_typefour = $contact_typefour[$i];
                $suppliercontact->contact_typefour_value = $contact_typefour_value[$i];
                $suppliercontact->contact_typefive = $contact_typefive[$i];
                $suppliercontact->contact_typefive_value = $contact_typefive_value[$i];
                $suppliercontact->save();
            }
        }

        //return redirect page show supplier with id supplier
        return redirect()->route('suppliers.show', $supplier->id)->with('success', 'Supplier created successfully.');

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        // $category_name = '';
        $data = [
            'category_name' => 'suppliers',
            'page_name' => 'suppliershow',
            'has_scrollspy' => 0,
            'scrollspy_offset' => '',
        ];

        //list countries
        $countries = Country::all();

        //list states
        $states = State::all();

        //list servicecategories
        $servicecategories = Servicecategory::all();
        //list services
        $services = Service::all();

        //show supplier with id supplier and join with countries and states
        $supplier = Supplier::select('suppliers.*', 'countries.name as country_name', 'states.name as state_name')
                                ->join('countries', 'countries.id', '=', 'suppliers.country_id')
                                ->join('states', 'states.id', '=', 'suppliers.state_id')
                                ->where('suppliers.id', $id)
                                ->first();

        
        $suppliercontacts = Suppliercontact::where('supplier_id', $id)->get();

        if($supplier == null){
            return redirect()->route('suppliers.index')->with('error', 'Supplier not found.');
        }

        return view('pages.suppliers.show', compact('supplier','countries','states', 'suppliercontacts', 'servicecategories', 'services'))->with($data);

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        // $category_name = '';
        $data = [
            'category_name' => 'suppliers',
            'page_name' => 'supplieredit',
            'has_scrollspy' => 0,
            'scrollspy_offset' => '',
        ];

        //list countries
        $countries = Country::all();

        //list servicecategories
        $servicecategories = Servicecategory::all();
        //list services
        $services = Service::all();

        //show supplier with id supplier and join with countries and states
        $supplier = Supplier::select('suppliers.*', 'countries.name as country_name', 'states.name as state_name')
                                ->join('countries', 'countries.id', '=', 'suppliers.country_id')
                                ->join('states', 'states.id', '=', 'suppliers.state_id')
                                ->where('suppliers.id', $id)
                                ->first();
        $suppliercontacts = Suppliercontact::where('supplier_id', $id)->get();

        if($supplier == null){
            return redirect()->route('suppliers.index')->with('error', 'Supplier not found.');
        }

        //list states by country selected in supplier
        $states = State::where('country_id', $supplier->country_id)->get();

        return view('pages.suppliers.edit', compact('supplier','countries','states', 'suppliercontacts', 'servicecategories', 'services'))->with($data);

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    
     public function update(Request $request, $id)
     {
         // Validar los campos del proveedor
         $this->validate($request, [
             'company_name' => 'required',
             'company_address' => 'required',
             'country_id' => 'required',
             'state_id' => 'required',
             'city' => 'required',
         ]);
     
         // Obtener el proveedor existente
         $supplier = Supplier::findOrFail($id);
     
         // Actualizar los campos del proveedor
         $supplier->company_name = $request->input('company_name');
         $supplier->company_address = $request->input('company_address');
         $supplier->country_id = $request->input('country_id');
         $supplier->state_id = $request->input('state_id');
         $supplier->city = $request->input('city');
         $supplier->company_website = $request->input('company_website');
         $supplier->company_rating = $request->input('company_rating') ?? 0;
         $supplier->company_note = $request->input('company_note');
         $supplier->save();
     
         // Actualizar los documentos del proveedor
         $temporaryfile_document_one = TemporaryFile::where('folder', $request->document_one)->first();
         if ($temporaryfile_document_one) {
             Storage::move('public/uploads/tmp/' . $request->document_one . '/' . $temporaryfile_document_one->filename, 'public/uploads/supplier_documents/' . $temporaryfile_document_one->filename);
             $supplier->document_one = $temporaryfile_document_one->filename;
             $supplier->save();
             rmdir(storage_path('app/public/uploads/tmp/' . $request->document_one));
             $temporaryfile_document_one->delete();
         }
     
         $temporaryfile_document_two = TemporaryFile::where('folder', $request->document_two)->first();
         if ($temporaryfile_document_two) {
             Storage::move('public/uploads/tmp/' . $request->document_two . '/' . $temporaryfile_document_two->filename, 'public/uploads/supplier_documents/' . $temporaryfile_document_two->filename);
             $supplier->document_two = $temporaryfile_document_two->filename;
             $supplier->save();
             rmdir(storage_path('app/public/uploads/tmp/' . $request->document_two));
             $temporaryfile_document_two->delete();
         }
     
         $temporaryfile_document_three = TemporaryFile::where('folder', $request->document_three)->first();
         if ($temporaryfile_document_three) {
             Storage::move('public/uploads/tmp/' . $request->document_three . '/' . $temporaryfile_document_three->filename, 'public/uploads/supplier_documents/' . $temporaryfile_document_three->filename);
             $supplier->document_three = $temporaryfile_document_three->filename;
             $supplier->save();
             rmdir(storage_path('app/public/uploads/tmp/' . $request->document_three));
             $temporaryfile_document_three->delete();
         }
     
         $contact_name = $request->input('contact_name');
         $contact_email = $request->input('contact_email');
         $contact_position = $request->input('contact_position');
         $contact_main = $request->input('contact_main');
         $contact_typeone = $request->input('contact_typeone');
         $contact_typeone_value = $request->input('contact_typeone_value');
         $contact_typetwo = $request->input('contact_typetwo');
         $contact_typetwo_value = $request->input('contact_typetwo_value');
         $contact_typethree = $request->input('contact_typethree');
         $contact_typethree_value = $request->input('contact_typethree_value');
         $contact_typefour = $request->input('contact_typefour');
         $contact_typefour_value = $request->input('contact_typefour_value');
         $contact_typefive = $request->input('contact_typefive');
         $contact_typefive_value = $request->input('contact_typefive_value');
         
         if ($contact_name != null) {
             $contact_count = count($contact_name);
         
             // Obtener los IDs de los contactos existentes del proveedor
             $existing_contact_ids = Suppliercontact::where('supplier_id', $supplier->id)
                 ->pluck('id')
                 ->toArray();
         
             // Obtener los IDs de los contactos proporcionados en la solicitud
             $provided_contact_ids = $request->input('contact_id', []);
         
             for ($i = 0; $i < $contact_count; $i++) {
                 // Verificar si se proporcionó un ID para el contacto actual
                 $contact_id = isset($provided_contact_ids[$i]) ? $provided_contact_ids[$i] : null;
         
                 if (in_array($contact_id, $existing_contact_ids)) {
                     // Contacto existente, actualizar los datos
                     $suppliercontact = Suppliercontact::where('supplier_id', $supplier->id)
                         ->findOrFail($contact_id);
                 } else {
                     // Contacto no existente, crear un nuevo registro
                     $suppliercontact = new Suppliercontact();
                     $suppliercontact->supplier_id = $supplier->id;
                 }
         
                 // Actualizar/crear los datos del contacto
                 $suppliercontact->contact_name = $contact_name[$i];
                 $suppliercontact->contact_email = $contact_email[$i];
                 $suppliercontact->contact_position = $contact_position[$i];
         
                 // Verificar si el contacto es principal
                 if (isset($contact_main) && $contact_main == $i) {
                     $suppliercontact->contact_main = 'yes';
                 } else {
                     $suppliercontact->contact_main = 'no';
                 }
         
                 $suppliercontact->contact_typeone = $contact_typeone[$i];
                 $suppliercontact->contact_typeone_value = $contact_typeone_value[$i];
                 $suppliercontact->contact_typetwo = $contact_typetwo[$i];
                 $suppliercontact->contact_typetwo_value = $contact_typetwo_value[$i];
                 $suppliercontact->contact_typethree = $contact_typethree[$i];
                 $suppliercontact->contact_typethree_value = $contact_typethree_value[$i];
                 $suppliercontact->contact_typefour = $contact_typefour[$i];
                 $suppliercontact->contact_typefour_value = $contact_typefour_value[$i];
                 $suppliercontact->contact_typefive = $contact_typefive[$i];
                 $suppliercontact->contact_typefive_value = $contact_typefive_value[$i];
         
                 $suppliercontact->save();
             }
         }
         

     
         // Redirigir a la página de mostrar proveedor con el ID del proveedor
         return redirect()->route('suppliers.show', $supplier->id)->with('success', 'Supplier updated successfully.');
     }
     
    

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
{
    \DB::beginTransaction();

    try {
        // Eliminar los Supplierserviceroute asociados a los Supplierservice del proveedor
        Supplierserviceroute::whereIn('supplierservice_id', function ($query) use ($id) {
            $query->select('id')
                ->from('supplierservices')
                ->where('supplier_id', $id);
        })->delete();

        // Eliminar los Supplierservice del proveedor
        Supplierservice::where('supplier_id', $id)->delete();

        // Eliminar los Suppliercontacts del proveedor
        Suppliercontact::where('supplier_id', $id)->delete();

        // Eliminar el proveedor
        Supplier::where('id', $id)->delete();

        \DB::commit();

        return response()->json(['status' => 'success']);
    } catch (\Exception $e) {
        \DB::rollback();

        return response()->json(['status' => 'error', 'message' => 'Error al eliminar el proveedor.']);
    }
}


    //addservices function to supplier via ajax
    public function addservices(Request $request){
        // Obtener los datos del formulario
        $supplierId = $request->input('supplier_id');
        $serviceCategoryId = $request->input('servicecategory_id');
        $servicesList = $request->input('services_list');
        $routes = json_decode($request->input('routes'));

        // Crear una nueva instancia del modelo ServiceSupplier
        $serviceSupplier = new Supplierservice();
        $serviceSupplier->supplier_id = $supplierId;
        $serviceSupplier->servicecategory_id = $serviceCategoryId;
        $serviceSupplier->services_list = $servicesList;

        // Guardar el servicio proveedor en la base de datos
        $serviceSupplier->save();

        // Guardar las rutas asociadas al servicio proveedor en la tabla Supplierserviceroutes
        foreach ($routes as $route) {
            Supplierserviceroute::create([
                'supplierservice_id' => $serviceSupplier->id,
                'origin_country' => $route->origin_country_id,
                'origin_state' => $route->origin_state_id,
                'origin_city' => $route->origin_city,
                'destination_country' => $route->destination_country_id,
                'destination_state' => $route->destination_state_id,
                'destination_city' => $route->destination_city,
                'crossing' => $route->crossing,
                'return_route' => $route->return_route
            ]);
        }

        // Realizar cualquier otra lógica necesaria

        // Devolver una respuesta success true
        return response()->json(['success' => true]);

    }

    public function updateservices(Request $request) {
        // Obtener los datos del formulario
        $serviceSupplierId = $request->input('service_supplier_id');
        $supplierId = $request->input('supplier_id');
        $serviceCategoryId = $request->input('servicecategory_id');
        $servicesList = $request->input('services_list');
        $routes = json_decode($request->input('routes'));
        
        // Actualizar el servicio proveedor en la base de datos
        $serviceSupplier = Supplierservice::find($serviceSupplierId);
        $serviceSupplier->supplier_id = $supplierId;
        $serviceSupplier->servicecategory_id = $serviceCategoryId;
        $serviceSupplier->services_list = $servicesList;
        $serviceSupplier->save();
        
        // Obtener los route_id existentes en la base de datos para el servicio proveedor
        $existingRouteIds = Supplierserviceroute::where('supplierservice_id', $serviceSupplierId)->pluck('id')->toArray();
      
        // Crear un arreglo con los route_id recibidos del frontend
        $receivedRouteIds = [];
        foreach ($routes as $route) {
          if (!empty($route->route_id)) {
            $receivedRouteIds[] = $route->route_id;
          }
        }
      
        // Encontrar los route_id que deben eliminarse
        $routesToDelete = array_diff($existingRouteIds, $receivedRouteIds);
      
        // Eliminar las rutas que deben eliminarse de la base de datos
        Supplierserviceroute::whereIn('id', $routesToDelete)->delete();
        
        // Actualizar o crear las rutas asociadas al servicio proveedor en la tabla Supplierserviceroutes
        foreach ($routes as $route) {
          if (!empty($route->route_id)) {
            Supplierserviceroute::where('id', $route->route_id)
              ->update([
                'origin_country' => $route->origin_country_id,
                'origin_state' => $route->origin_state_id,
                'origin_city' => $route->origin_city,
                'destination_country' => $route->destination_country_id,
                'destination_state' => $route->destination_state_id,
                'destination_city' => $route->destination_city,
                'crossing' => $route->crossing,
                'return_route' => $route->return_route
              ]);
          } else {
            Supplierserviceroute::create([
              'supplierservice_id' => $serviceSupplierId,
              'origin_country' => $route->origin_country_id,
              'origin_state' => $route->origin_state_id,
              'origin_city' => $route->origin_city,
              'destination_country' => $route->destination_country_id,
              'destination_state' => $route->destination_state_id,
              'destination_city' => $route->destination_city,
              'crossing' => $route->crossing,
              'return_route' => $route->return_route
            ]);
          }
        }
        
        // Realizar cualquier otra lógica necesaria
        
        // Devolver una respuesta success true
        return response()->json(['success' => true]);
      }
      
      


    public function getservices($id)
{
    // Obtener supplierservices y join con servicecategories where id supplier via ajax
    $supplierservices = Supplierservice::select('supplierservices.*', 'servicecategories.servicecategory_name as category_name', 'servicecategories.servicecategory_color as category_color')
                            ->join('servicecategories', 'servicecategories.id', '=', 'supplierservices.servicecategory_id')
                            ->where('supplierservices.supplier_id', $id)
                            ->get();

    // Obtener las rutas de servicio para cada supplierservice
    foreach ($supplierservices as $supplierservice) {
        $routes = Supplierserviceroute::select(
            'countries.name as origin_country_name',
            'states.name as origin_state_name',
            'supplierserviceroutes.origin_city',
            'countries2.name as destination_country_name',
            'states2.name as destination_state_name',
            'supplierserviceroutes.destination_city',
            'supplierserviceroutes.return_route',
            'crossings.crossing_name as crossing_name'
        )
            ->leftJoin('countries', 'countries.id', '=', 'supplierserviceroutes.origin_country')
            ->leftJoin('states', 'states.id', '=', 'supplierserviceroutes.origin_state')
            ->leftJoin('countries as countries2', 'countries2.id', '=', 'supplierserviceroutes.destination_country')
            ->leftJoin('states as states2', 'states2.id', '=', 'supplierserviceroutes.destination_state')
            ->leftJoin('crossings', 'crossings.id', '=', 'supplierserviceroutes.crossing')
            ->where('supplierserviceroutes.supplierservice_id', $supplierservice->id)
            ->get();
    
        foreach ($routes as $route) {
            $origin_country_name = $route->origin_country_name ?? '';
            $origin_state_name = $route->origin_state_name ? ', ' . $route->origin_state_name : '';
            $origin_city_name = $route->origin_city ? ', ' . $route->origin_city : '';
    
            $destination_country_name = $route->destination_country_name ?? '';
            $destination_state_name = $route->destination_state_name ? ', ' . $route->destination_state_name : '';
            $destination_city_name = $route->destination_city ? ', ' . $route->destination_city : '';
            $crossing = $route->crossing_name ?? '';
    
            $icon = $route->return_route == 1 ? '↔' : '→';
    
            $route->formatted_route = $origin_country_name . $origin_state_name . $origin_city_name . ' <b>' . $icon . '</b> ' . $destination_country_name . $destination_state_name . $destination_city_name . '<br>Crossing: ' . $crossing;
        }
    
        $supplierservice->routes = $routes;
    }
    

    return response()->json($supplierservices);
}


    public function getWhitelistData($serviceCategoryId)
    {
        // Obtén los datos de la lista blanca según el $serviceCategoryId and join with servicescategories
        $whitelistData = Service::select('services.*', 'servicecategories.servicecategory_name as category_name')
                                ->join('servicecategories', 'servicecategories.id', '=', 'services.servicecategory_id')
                                ->where('servicecategories.id', $serviceCategoryId)
                                ->get();

        //generate array
        $whitelistData = $whitelistData->map(function ($item, $key) {
            return [
                'value' => $item->id,
                'name' => $item->service_name,
                'servicecategory' => $item->category_name,
            ];
        });

        return response()->json($whitelistData);
    }

    public function servicesupplieredit(Request $request){

        $id = request()->input('id');

        // get servicesupplier by id
        $servicesupplier = Supplierservice::findOrFail($id);

        // get routes by servicesupplier id
        $routes = Supplierserviceroute::where('supplierservice_id', $id)->get();

        //return servicesupplier and routes
        return response()->json(['servicesupplier' => $servicesupplier, 'routes' => $routes]);

    }

    public function servicesupplierdelete(Request $request)
{
    // Obtener id enviado via ajax
    $id = $request->input('id');
    
    // Eliminar servicesupplier con el id
    $servicesupplier = Supplierservice::findOrFail($id);
    $servicesupplier->delete();

    // Eliminar serviceserviceroutes con el id
    Supplierserviceroute::where('supplierservice_id', $id)->delete();

    return response()->json(['success' => true]);
}




}

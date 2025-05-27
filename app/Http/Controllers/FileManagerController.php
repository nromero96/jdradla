<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\FileManager;
use App\Models\TemporaryFile;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Session;

class FileManagerController extends Controller
{
    public function index()
    {
        $data = [
            'category_name' => 'filemanager',
            'page_name' => 'filemanager',
            'has_scrollspy' => 0,
            'scrollspy_offset' => '',
        ];

        $listforpage = request()->query('listforpage') ?? 10;
        $search = request()->query('search');

        $file_managers = FileManager::select('*')
            ->when($search, function ($query, $search) {
                return $query->where('name', 'like', '%' . $search . '%')
                    ->orWhere('email', 'like', '%' . $search . '%');
            })
            ->orderBy('id', 'desc')
            ->paginate($listforpage);

        return view('pages/file-manager/index')->with($data)->with('file_managers', $file_managers);
    }

    public function viewOnlineRegisterFile(request $request)
    {
        // Verifica si la clave ya fue ingresada
        if (Session::get('acceso_autorizado_pagina')) {
            return view('pages/file-manager/online-upload');
        }

        return view('pages/file-manager/ingresar-clave'); // Retorna la vista para ingresar la clave
    }

    public function verificarClave(Request $request)
    {
        $clave = $request->input('clave');

        // Obtén la clave correcta desde el archivo .env
        $claveCorrecta = config('app.secret_page_key');

        if ($clave === $claveCorrecta) {
            Session::put('acceso_autorizado_pagina', true);
            return redirect()->route('filemanager.onlineupload');
        }

        return redirect()->route('filemanager.onlineupload')->withErrors('Clave incorrecta');
    }

    public function storeOnlineRegisterFile(Request $request)
    {

        $request->validate([
            'name' => 'required',
            'email' => 'required|email',
            'fm_files.*' => 'required',
        ],
        [
            'name.required' => 'Nombre es requerido',
            'email.required' => 'Email es requerido',
            'email.email' => 'Email no es válido',
            'fm_files.*.required' => 'Archivo es requerido',
        ]);

        // Verifica si se han proporcionado nombres de carpetas temporales
        if ($request->has('fm_files') && is_array($request->fm_files)) {
            foreach($request->fm_files as $temporaryFolder) {
                $filesarray = [];
                $temporaryFolder = str_replace(['[', ']', '"'], '', $temporaryFolder);
                $temporaryfile_fm_files = TemporaryFile::where('folder', $temporaryFolder)->first();
                if ($temporaryfile_fm_files) {
                    Storage::move('public/uploads/tmp/'.$temporaryFolder.'/'.$temporaryfile_fm_files->filename, 'public/uploads/fm-files/'.$temporaryfile_fm_files->filename);
                    $files[] = $temporaryfile_fm_files->filename;
                    //eliminar carpeta temporal
                    Storage::deleteDirectory('public/uploads/tmp/'.$temporaryFolder);
                }
            }
        }

        $file_manager = new FileManager();
        $file_manager->name = $request->name;
        $file_manager->email = $request->email;
        $file_manager->file_path = json_encode($files);
        $file_manager->save();

        //archivos subidos correctamente
        return redirect()->route('filemanager.onlineupload')->with('success', 'Archivos subidos correctamente. Gracias por enviar su información. Si necesitamos más detalles, nos pondremos en contacto con usted.');

    }



}

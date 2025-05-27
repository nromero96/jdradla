<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\TemporaryFile;

//Log
use Illuminate\Support\Facades\Log;

class UploadController extends Controller
{
    public function store(Request $request){
        $uploadedFolders = []; // Utilizamos un arreglo para almacenar las carpetas de archivos subidos

        // Campos de archivo único
        $singleFileFields = ['file_1', 'file_2', 'file_3', 'file_4', 'file_5', 'file_6','document_file','voucher_file','poster'];

        foreach ($singleFileFields as $field) {
            if ($request->hasFile($field)) {
                $file = $request->file($field);
                $uploadedFolders[] = $this->processFile($file);
            }
        }

        // Campo de archivo múltiple 'fm_files'
        if ($request->hasFile('fm_files')) {
            $files = $request->file('fm_files');

            foreach ($files as $file) {
                $uploadedFolders[] = $this->processFile($file);
            }
        }

        return $uploadedFolders;
    }



    private function processFile($file) {
        $originalFilename = $file->getClientOriginalName();
        $extension = $file->getClientOriginalExtension();

        // Genera un identificador único
        $uniqueIdentifier = uniqid();

        // Obtiene el nombre del archivo sin la extensión
        $filenameWithoutExtension = pathinfo($originalFilename, PATHINFO_FILENAME);

        // Construye el nombre del archivo con el nombre y el identificador único
        $filename = $filenameWithoutExtension . '-' . $uniqueIdentifier . '.' . $extension;

        $folder = uniqid() . '-' . now()->timestamp;

        $file->storeAs('public/uploads/tmp/' . $folder, $filename);

        TemporaryFile::create([
            'folder' => $folder,
            'filename' => $filename,
            'id' => $uniqueIdentifier,
        ]);

        return $folder;
    }



    // app/Http/Controllers/YourController.php

public function deleteFile(Request $request)
{
    $fileId = $request->input('fileId'); // Ajusta según cómo estás identificando el archivo

    Log::info('FileId: '.$fileId);

    // Encuentra el archivo temporal
    $file = TemporaryFile::find($fileId);

    //Log
    Log::info('File: '.$file);

    if ($file) {
        // Construye la ruta completa al archivo
        $path = 'public/uploads/tmp/' . $file->folder . '/' . $file->filename;

        // Elimina el archivo
        if (\Storage::exists($path)) {
            \Storage::delete($path);
        }

        // Elimina el registro del archivo en la base de datos
        $file->delete();

        // Elimina la carpeta si está vacía
        $folderPath = 'public/uploads/tmp/' . $file->folder;
        if ($this->isFolderEmpty($folderPath)) {
            \Storage::deleteDirectory($folderPath);
        }

        return response()->json(['message' => 'Archivo eliminado con éxito']);
    } else {
        return response()->json(['message' => 'Archivo no encontrado'], 404);
    }
}

private function isFolderEmpty($folderPath)
{
    $files = \Storage::files($folderPath);
    $directories = \Storage::directories($folderPath);
    return empty($files) && empty($directories);
}




}

<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Poster;
use App\Models\Work;
use App\Models\TemporaryFile;
use Illuminate\Support\Facades\Storage;
use App\Models\WorksNote;

//log
use Illuminate\Support\Facades\Log;

class PosterController extends Controller
{
    public function index()
    {
        // $category_name = '';
        $data = [
            'category_name' => 'posters',
            'page_name' => 'posters',
            'has_scrollspy' => 0,
            'scrollspy_offset' => '',
        ];

        //if user is logged role is Administator
        if (\Auth::user()->hasRole('Administrador') || \Auth::user()->hasRole('Secretaria')) {
            
            $search = request()->query('search');

            if($search){
                $posters = Work::join('users', 'works.user_id', '=', 'users.id')
                ->where('works.status', 'aceptado')
                ->where(function ($query) use ($search) {
                    $query->orWhereRaw('CONCAT(users.name, " ", users.lastname, " ", COALESCE(users.second_lastname, "")) LIKE ?', ["%{$search}%"])
                          ->orWhere('works.category', 'LIKE', "%{$search}%")
                          ->orWhere('works.knowledge_area', 'LIKE', "%{$search}%")
                          ->orWhere('works.id', 'LIKE', "%{$search}%")
                          ->orWhere('users.country', 'LIKE', "%{$search}%");
                })
                ->selectRaw('works.*, CONCAT(users.name, " ", users.lastname, " ", COALESCE(users.second_lastname, "")) AS author, users.country')
                ->get();
            } else {
                $posters = Work::join('users', 'works.user_id', '=', 'users.id')
                ->where('works.status', 'aceptado')
                ->selectRaw('works.*, CONCAT(users.name, " ", users.lastname, " ", COALESCE(users.second_lastname, "")) AS author, users.country')
                ->orderByRaw('works.poster_file IS NOT NULL DESC, works.poster_date_uploaded DESC')
                ->get();
            }
        } else {
            $posters = Work::join('users', 'works.user_id', '=', 'users.id')
            ->where('works.status', 'aceptado')
            ->where('works.user_id', auth()->user()->id)
            ->selectRaw('works.*, CONCAT(users.name, " ", users.lastname, " ", users.second_lastname) AS author, users.country')
            ->get();
        }


        return view('pages.posters.index')->with($data)->with('posters', $posters);
    }

    public function uploadPosterFile(Request $request)
    {

        // Verificar si el usuario tiene acceso al trabajo
        $work = Work::where('user_id', auth()->id())->find($request->idposter);

        $temporaryfile_poster = TemporaryFile::where('folder', $request->poster)->first();

        // Comprobación de roles de administrador o secretaria
        $user = \Auth::user();
        if ($work || $user->hasRole('Administrador') || $user->hasRole('Secretaria')) {
            
            if($temporaryfile_poster){
                $work = Work::Where('id', $request->idposter)->first();
                Storage::move('public/uploads/tmp/'.$request->poster.'/'.$temporaryfile_poster->filename, 'public/uploads/poster_files/'.$temporaryfile_poster->filename);
                $work->poster_file = $temporaryfile_poster->filename;
                $work->poster_date_uploaded = now();
                $work->save();
                rmdir(storage_path('app/public/uploads/tmp/'.$request->poster));
                $temporaryfile_poster->delete();
            }
            return redirect()->route('posters.index')->with('success', 'Poster # '.$request->idposter.' subido correctamente, verificaremos su contenido.');
        } else {

            if($temporaryfile_poster){
                // Eliminar archivo temporal
                Storage::delete('public/uploads/tmp/'.$request->poster.'/'.$temporaryfile_poster->filename);
                $temporaryfile_poster->delete();
                rmdir(storage_path('app/public/uploads/tmp/'.$request->poster));
            }

            return redirect()->route('posters.index')->with('error', 'No tienes permisos para subir el poster # '.$request->idposter);
        }

    }

    public function deletePosterFile($id)
    {
        $miwork = Work::where('user_id', auth()->id())->find($id);
        $user = \Auth::user();

        if($miwork || $user->hasRole('Administrador') || $user->hasRole('Secretaria')){
            $work = Work::find($id);
            $work->poster_file = null;
            $work->poster_date_uploaded = null;
            $work->save();

            $work_note = new WorksNote();
            $work_note->work_id = $id;
            $work_note->action = 'Archivo poster eliminado';
            $work_note->note = 'El archivo del poster ha sido eliminado.';
            $work_note->user_id = $user->id;
            $work_note->created_at = now();
            $work_note->updated_at = now();
            $work_note->save();

            return redirect()->route('posters.index')->with('success', 'El archivo del poster # '.$id.' ha sido eliminado.');
        } else {
            return redirect()->route('posters.index')->with('error', 'No tienes permisos para eliminar el archivo del poster # '.$id);
        }
    }

    public function confirmPosterFile($id)
    {
        $user = \Auth::user();
        if($user->hasRole('Administrador') || $user->hasRole('Secretaria')){
            $work = Work::find($id);
            $work->poster_verification_status = 'si';
            $work->save();

            //register in work_notes
            $work_note = new WorksNote();
            $work_note->work_id = $id;
            $work_note->action = 'Archivo poster confirmado';
            $work_note->note = 'El archivo del poster ha sido confirmado';
            $work_note->user_id = $user->id;
            $work_note->created_at = now();
            $work_note->updated_at = now();
            $work_note->save();

            return redirect()->route('posters.index')->with('success', 'El archivo del poster # '.$id.' ha sido confirmado.');
        } else {
            return redirect()->route('posters.index')->with('error', 'No tienes permisos para confirmar el archivo del poster # '.$id);
        }
    }


    public function searchPostersPage(Request $request)
    {

        //get unique countries
        $countries = Work::join('users', 'works.user_id', '=', 'users.id')
            ->where('works.poster_file', '!=', '')
            ->select('users.country')
            ->distinct()
            ->orderby('users.country', 'asc')
            ->get();
        
        //get unique categories
        $categories = Work::join('users', 'works.user_id', '=', 'users.id')
            ->where('works.poster_file', '!=', '')
            ->select('works.category')
            ->distinct()
            ->get();
        
        //get unique authors (users)
        $authors = Work::join('users', 'works.user_id', '=', 'users.id')
            ->where('works.poster_file', '!=', '')
            ->selectRaw('users.id AS user_id, CONCAT(users.name, " ", users.lastname, " ", COALESCE(users.second_lastname, "")) AS author')
            ->distinct()
            ->orderBy('author', 'asc')
            ->get();

        //get unique knowledge_areas
        $knowledge_areas = Work::join('users', 'works.user_id', '=', 'users.id')
            ->where('works.poster_file', '!=', '')
            ->select('works.knowledge_area')
            ->distinct()
            ->orderby('works.knowledge_area', 'asc')
            ->get();

        //get data url
        $search_title = $request->input('search_title');
        $search_knowledge_area = $request->input('search_knowledge_area');
        $search_author = $request->input('search_author');
        $search_country = $request->input('search_country');
        $search_category = $request->input('search_category');

        $posters = Work::join('users', 'works.user_id', '=', 'users.id')
            ->where('works.poster_file', '!=', '')
            ->where(function ($query) use ($search_title) {
                if (!empty($search_title)) {
                    $query->where('works.title', 'LIKE', "%{$search_title}%");
                }
            })
            ->where(function ($query) use ($search_knowledge_area) {
                if (!empty($search_knowledge_area) && $search_knowledge_area != 'Todos') {
                    $query->where('works.knowledge_area', 'LIKE', "%{$search_knowledge_area}%");
                }
            })
            ->where(function ($query) use ($search_author) {
                if (!empty($search_author) && $search_author != 'Todos') {
                    $query->where('users.id', $search_author);
                }
            })
            ->where(function ($query) use ($search_country) {
                if (!empty($search_country) && $search_country != 'Todos') {
                    $query->where('users.country', 'LIKE', "%{$search_country}%");
                }
            })
            ->where(function ($query) use ($search_category) {
                if (!empty($search_category) && $search_category != 'Todos') {
                    $query->where('works.category', 'LIKE', "%{$search_category}%");
                }
            })
            ->selectRaw('works.*, CONCAT(users.name, " ", users.lastname, " ", COALESCE(users.second_lastname, "")) AS author, users.country')
            ->get();

        return view('pages.posters.online-search')->with('posters', $posters)->with('countries', $countries)->with('categories', $categories)->with('authors', $authors)->with('knowledge_areas', $knowledge_areas);


    }

}

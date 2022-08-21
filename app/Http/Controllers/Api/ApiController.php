<?php
    namespace App\Http\Controllers\Api;
    use App\Http\Controllers\Controller;
    use Illuminate\Http\Request;
    use Illuminate\Support\Facades\DB;
    use Illuminate\Support\Facades\Response;

    class ApiController extends Controller
    {
        /**
         * Show the profile for a given user.
         *
         * @param  int  $id
         * @return \Illuminate\View\View
         */
        public function getNote($id)
        {
            $result = DB::table('notes')->where('id',$id)->get(['text']);
            if(count($result)>0) return $result[0];
            return "";
        }
        public function getNotes()
        {
            return DB::table('notes')->get(['text']);
        }
        public function setNote(Request $request)
        {
            $id = $request->input('id',null);
            $text = $request->input('text',null);
            if(is_null($text)) return Response::json(array(
                'code'      =>  401,
                'message'   =>  'Parameter "text" is required.'
            ), 401);
            return DB::table('notes')->updateOrInsert(compact('id'),compact('text'));
        }
    }
?>
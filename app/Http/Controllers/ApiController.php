<?php
    namespace App\Http\Controllers;
    use App\Http\Controllers\Controller;
    use App\Models\User;

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
            $PDO = \DB::connection()->getPdo();
            $QUERY = $PDO->prepare("SELECT DISTINCT * FROM users");
            $QUERY->execute();
            return json_encode($QUERY->fetchAll(PDO::FETCH_OBJ));
        }
    }
?>
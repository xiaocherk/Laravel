<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\DB;
use App\Models\Rgform;
use App\Models\Programme;
use App\Models\Student;
use Illuminate\Support\Facades\Validator;
use App\Events\CompletePayment;
use PDO;

class FormController extends Controller
{
    // GET
    function viewPerson()
    {
        $tableView = Rgform::all();

        return response()->json([
            'tableView' => $tableView,
        ]);
    }

    // GET SPECIFIC VIEW
    public function show(Rgform $id)
    {
        return $id;
    }

    public function showAdvanced(Rgform $id)
    {
        return response()->json([
            'data' => [
                'id' => (string)$id->id,
                'type' => 'Person',
                'attributes' => [
                    'name' => $id->name,
                    'email' => $id->email,
                    'created_at' => $id->created_at,
                ]
            ]
        ]);
    }

    // POST
    function addPerson(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required|max:50',
            'email' => 'required|email|max:50',
            'password' => 'required|max:20'
        ]);

        if ($validator->fails()) {
            return response()->json([
                'status' => 400,
                'errors' => $validator->errors(),
            ]);
        } else {
            $person = new Rgform;
            $person->name = $request->name;
            $person->email = $request->email;
            $person->password = bcrypt($request->password);
            $person->save();

            return response()->json([
                'status' => 200,
                'message' => 'Added Successfully!'
            ]);
        }
        //echo "<script>alert('Successful to register!');</script>";
    }

    public function checkUpdate($id)
    {
        $rgform = Rgform::find($id);

        if ($rgform) {
            return response()->json([
                'status' => 200,
                'rgform' => $rgform,
            ]);
        } else {
            return response()->json([
                'status' => 404,
                'message' => 'No Person found',
            ]);
        }
    }

    public static function updatePerson(Request $request, $id)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required|max:50',
            'email' => 'required|email|max:50',
        ]);

        if ($validator->fails()) {
            return response()->json([
                'status' => 400,
                'errors' => $validator->errors(),
            ]);
        } else {
            $person = Rgform::find($id);

            if ($person) {
                $person->name = $request->input('name');
                $person->email = $request->input('email');
                $person->update();

                return response()->json([
                    'status' => 200,
                    'message' => 'Update Successfully!'
                ]);
            } else {
                return response()->json([
                    'status' => 404,
                    'message' => 'Person Not Found'
                ]);
            }
        }
    }

    public static function remove($id)
    {
        $rgform = Rgform::find($id);
        $rgform->delete();

        return response()->json([
            'status' => 200,
            'message' => 'Person has been removed',
        ]);
    }

    function loginUser(Request $request)
    {
        // loop Rgform's data (email & password)
        foreach (Rgform::get(['email', 'password']) as $i) {

            if ($request->email == $i->email) {
                if (Hash::check(($request->password), $i->password)) {
                    echo '<script>alert(\'Login Successfully!\');</script>';
                    return view("ys.welcome");
                }
            }
        }
        echo '<script>alert(\'Failed to Login. Check your email or password.\');</script>';
        return view("ys.login");
    }

    function programme()
    {
        return view('ys.ProgrammeView', ['details' => Programme::all()]);
    }

    function student($id)
    {
        $result = Programme::find($id);
        $details = $result->students;

        if (request()->get('class') != null) {
            $details = $details->where('class', request()->get('class'));
        }

        return view('ys.StudentView', ['details' => $details->sortByDesc("CGPA")]);
    }

    function course($id)
    {
        $result = Programme::find($id);
        $details = $result->courses;

        return view('ys.CourseView', ['details' => $details]);
    }

    function testing()
    {
        foreach (Programme::all() as $programme) {
            // echo $programme->courses->pluck('credit_hours');

            if (count($programme->courses->pluck('credit_hours'))>0){
                echo "true";
            }
            else{
                echo "false";
            }
        }

        $totalProgramme = Programme::all()->pluck('programme_id');

        for ($i = 0; $i < count($totalProgramme); $i++) {
            echo ($totalProgramme[$i] . Programme::find($totalProgramme[$i])->courses->count() . '<br>');
        }
    }
}

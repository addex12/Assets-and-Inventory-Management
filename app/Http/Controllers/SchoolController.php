namespace App\Http\Controllers;
namespace App\Http\Controllers;
use App\Models\School;
use Illuminate\Http\Request;
use Illuminate\Http\Request;
class SchoolController extends Controller
class SchoolController extends Controller
    public function index(){
    public function index(){
        $schools = School::all();
        return view('schools.index', compact('schools'));
    }   return view('schools.index', compact('schools'));
    }
    public function create(){
    public function create(){
        return view('schools.create');
    }   return view('schools.create');
    }
    public function store(Request $request){
    {ublic function store(Request $request){
        $request->validate([
            'name' => 'required',
            'principal_name' => 'nullable|string',
        ]); 'principal_name' => 'nullable|string',

        School::create($request->all());
        return redirect()->route('schools.index');
    }   return redirect()->route('schools.index');
    }
    public function show(School $school){
    {ublic function show(School $school){
        return view('schools.show', compact('school'));
    }   return view('schools.show', compact('school'));
    public function edit(School $school)
    {ublic function edit(School $school)
        return view('schools.edit', compact('school'));
    }   return view('schools.edit', compact('school'));
    }
    public function update(Request $request, School $school)
    {ublic function update(Request $request, School $school)
        $request->validate([
            'name' => 'required',
            'principal_name' => 'nullable|string',
        ]); 'principal_name' => 'nullable|string',
        $school->update($request->all());
        return redirect()->route('schools.index');
    }   return redirect()->route('schools.index');
    }
    public function destroy(School $school){
    {ublic function destroy(School $school){
        $school->delete();
        return redirect()->route('schools.index');
    }   return redirect()->route('schools.index');
    }
}   
}


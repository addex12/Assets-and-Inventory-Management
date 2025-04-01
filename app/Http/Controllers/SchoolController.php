namespace App\Http\Controllers;

use App\Models\School;
use Illuminate\Http\Request;
use Carbon\Carbon;
use App\Models\Asset;
use App\Models\AssetModel;
use App\Models\Category;
use App\Models\Company;
use App\Models\Department;
use App\Models\Location;
use App\Models\Manufacturer;
use App\Models\Statuslabel;
use App\Models\Supplier;
use App\Models\User;
use Gate;
use Str;
use DB;
use Auth;
use App\Helpers\Helper;
use App\Models\CustomField;
use App\Models\CustomFieldMeta;
use App\Models\CustomFieldset;
use App\Models\Depreciation;
use App\Models\DepreciationModel;
use App\Models\License;
use App\Models\LicenseSeat;
use App\Models\Setting;
use App\Models\AssetMaintenance;
use App\Models\AssetModelCategory;

class SchoolController extends Controller
{
    public function index(){
        $schools = School::all();
        return view('schools.index', compact('schools'));
    }

    public function create(){
        return view('schools.create');
    }

    public function store(Request $request){
        $request->validate([
            'name' => 'required',
            'principal_name' => 'nullable|string',
        ]);

        School::create($request->all());
        return redirect()->route('schools.index');
    }

    public function show(School $school){
        return view('schools.show', compact('school'));
    }

    public function edit(School $school){
        return view('schools.edit', compact('school'));
    }

    public function update(Request $request, School $school){
        $request->validate([
            'name' => 'required',
            'principal_name' => 'nullable|string',
        ]);

        $school->update($request->all());
        return redirect()->route('schools.index');
    }

    public function destroy(School $school){
        $school->delete();
        return redirect()->route('schools.index');
    }
}


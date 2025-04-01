namespace App\Http\Controllers;

use App\Models\Inquiry;
use Illuminate\Http\Request;

class InquiryController extends Controller
{
    public function index()
    {
        $inquiries = Inquiry::all();
        return view('inquiries.index', compact('inquiries'));
    }

    public function create()
    {
        return view('inquiries.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'message' => 'required',
        ]);

        Inquiry::create($request->all());
        return redirect()->route('inquiries.index');
    }

    public function show(Inquiry $inquiry)
    {
        return view('inquiries.show', compact('inquiry'));
    }

    public function destroy(Inquiry $inquiry)
    {
        $inquiry->delete();
        return redirect()->route('inquiries.index');
    }
      
}

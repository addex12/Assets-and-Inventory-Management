namespace App\Http\Controllers;

use App\Models\Inquiry;
use Illuminate\Http\Request;
use Carbon\Carbon;

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
            'created_at' => 'nullable|date',
        ]);

        try {
            $data = $request->all();
            if (isset($data['created_at'])) {
                $data['created_at'] = Carbon::parse($data['created_at']);
            }
            Inquiry::create($data);
        } catch (\Exception $e) {
            \Log::error('Invalid date input: ' . $e->getMessage());
            return redirect()->back()->withErrors(['error' => 'Invalid date input']);
        }

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

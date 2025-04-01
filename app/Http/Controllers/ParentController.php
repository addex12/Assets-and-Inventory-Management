namespace App\Http\Controllers;

use App\Models\Parent;
use Illuminate\Http\Request;

class ParentController extends Controller
{
    public function index()
    {
        $parents = Parent::all();
        return view('parents.index', compact('parents'));
    }

    public function create()
    {
        return view('parents.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'email' => 'required|email|unique:parents',
        ]);

        Parent::create($request->all());
        return redirect()->route('parents.index');
    }

    public function show(Parent $parent)
    {
        return view('parents.show', compact('parent'));
    }

    public function edit(Parent $parent)
    {
        return view('parents.edit', compact('parent'));
    }

    public function update(Request $request, Parent $parent)
    {
        $request->validate([
            'name' => 'required',
            'email' => 'required|email|unique:parents,email,' . $parent->id,
        ]);

        $parent->update($request->all());
        return redirect()->route('parents.index');
    }

    public function destroy(Parent $parent)
    {
        $parent->delete();
        return redirect()->route('parents.index');
    }

    public function showStudents(Parent $parent)
    {
        $students = $parent->students;
        return view('parents.students', compact('students'));
    }
    public function showInquiries(Parent $parent)
    {
        $inquiries = $parent->inquiries;
        return view('parents.inquiries', compact('inquiries'));
    }
    public function showPayments(Parent $parent)
    {
        $payments = $parent->payments;
        return view('parents.payments', compact('payments'));
    }
    public function showNotifications(Parent $parent)
    {
        $notifications = $parent->notifications;
        return view('parents.notifications', compact('notifications'));
    }
    public function showMessages(Parent $parent)
    {
        $messages = $parent->messages;
        return view('parents.messages', compact('messages'));
    }
    public function showEvents(Parent $parent)
    {
        $events = $parent->events;
        return view('parents.events', compact('events'));
    }
    public function showReports(Parent $parent)
    {
        $reports = $parent->reports;
        return view('parents.reports', compact('reports'));
    }
    public function showAttendance(Parent $parent)
    {
        $attendance = $parent->attendance;
        return view('parents.attendance', compact('attendance'));
    }
    public function showGrades(Parent $parent)
    {
        $grades = $parent->grades;
        return view('parents.grades', compact('grades'));
    }
    public function showAssignments(Parent $parent)
    {
        $assignments = $parent->assignments;
        return view('parents.assignments', compact('assignments'));
    }
    public function showExams(Parent $parent)
    {
        $exams = $parent->exams;
        return view('parents.exams', compact('exams'));
    }
    public function showClasses(Parent $parent)
    {
        $classes = $parent->classes;
        return view('parents.classes', compact('classes'));
    }
    public function showSubjects(Parent $parent)
    {
        $subjects = $parent->subjects;
        return view('parents.subjects', compact('subjects'));
    }
    public function showSchools(Parent $parent)
    {
        $schools = $parent->schools;
        return view('parents.schools', compact('schools'));
    }
    public function showDepartments(Parent $parent)
    {
        $departments = $parent->departments;
        return view('parents.departments', compact('departments'));
    }
    public function showCourses(Parent $parent)
    {
        $courses = $parent->courses;
        return view('parents.courses', compact('courses'));
    }
    public function showTimetables(Parent $parent)
    {
        $timetables = $parent->timetables;
        return view('parents.timetables', compact('timetables'));
    }
    public function showMessages(Parent $parent)
    {
        $messages = $parent->messages;
        return view('parents.messages', compact('messages'));
    }
    public function showNotifications(Parent $parent)
    {
        $notifications = $parent->notifications;
        return view('parents.notifications', compact('notifications'));
    }
    public function showPayments(Parent $parent)
    {
        $payments = $parent->payments;
        return view('parents.payments', compact('payments'));
    }
    public function showAttendance(Parent $parent)
    {
        $attendance = $parent->attendance;
        return view('parents.attendance', compact('attendance'));
    }
    public function showGrades(Parent $parent)
    {
        $grades = $parent->grades;
        return view('parents.grades', compact('grades'));
    }
    public function showAssignments(Parent $parent)
    {
        $assignments = $parent->assignments;
        return view('parents.assignments', compact('assignments'));
    }
    public function showExams(Parent $parent)
    {
        $exams = $parent->exams;
        return view('parents.exams', compact('exams'));
    }
    public function showClasses(Parent $parent)
    {
        $classes = $parent->classes;
        return view('parents.classes', compact('classes'));
    }
    public function showSubjects(Parent $parent)
    {
        $subjects = $parent->subjects;
        return view('parents.subjects', compact('subjects'));
    }
    public function showSchools(Parent $parent)
    {
        $schools = $parent->schools;
        return view('parents.schools', compact('schools'));
    }
    public function showDepartments(Parent $parent)
    {
        $departments = $parent->departments;
        return view('parents.departments', compact('departments'));
    }
    public function showCourses(Parent $parent)
    {
        $courses = $parent->courses;
        return view('parents.courses', compact('courses'));
    }
    public function showTimetables(Parent $parent)
    {
        $timetables = $parent->timetables;
        return view('parents.timetables', compact('timetables'));
    }
    public function showMessages(Parent $parent)
    {
        $messages = $parent->messages;
        return view('parents.messages', compact('messages'));
    }
    public function showNotifications(Parent $parent)
    {
        $notifications = $parent->notifications;
        return view('parents.notifications', compact('notifications'));
    }
    public function showPayments(Parent $parent)
    {
        $payments = $parent->payments;
        return view('parents.payments', compact('payments'));
    }
}

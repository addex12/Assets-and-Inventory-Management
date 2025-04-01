namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;

class Inquiry extends Model
{
    use HasFactory;

    protected $fillable = ['name', 'email', 'phone', 'message'];
    protected $casts = [
        'created_at' => 'datetime',
        'updated_at' => 'datetime',
    ];

    public function setCreatedAtAttribute($value)
    {
        $this->attributes['created_at'] = $this->validateDate($value);
    }

    public function setUpdatedAtAttribute($value)
    {
        $this->attributes['updated_at'] = $this->validateDate($value);
    }

    private function validateDate($value)
    {
        try {
            return Carbon::parse($value);
        } catch (\Exception $e) {
            // Log the error and return null or a default value
            \Log::error('Invalid date input: ' . $e->getMessage());
            return null;
        }
    }

    public function school()
    {
        return $this->belongsTo(School::class);
    }
    public function parent()
    {
        return $this->belongsTo(Parent::class);
    }
    public function employee()
    {
        return $this->belongsTo(Employee::class);
    }
    public function student()
    {
        return $this->belongsTo(Student::class);
    }
    public function class()
    {
        return $this->belongsTo(SchoolClass::class);
    }
    public function subject()
    {
        return $this->belongsTo(Subject::class);
    }
    public function grade()
    {
        return $this->belongsTo(Grade::class);
    }
    public function attendance()
    {
        return $this->belongsTo(Attendance::class);
    }
    public function exam()
    {
        return $this->belongsTo(Exam::class);
    }
    public function assignment()
    {
        return $this->belongsTo(Assignment::class);
    }
    public function report()
    {
        return $this->belongsTo(Report::class);
    }
    public function event()
    {
        return $this->belongsTo(Event::class);
    }
    public function notification()
    {
        return $this->belongsTo(Notification::class);
    }
    public function message()
    {
        return $this->belongsTo(Message::class);
    }
    public function payment()
    {
        return $this->belongsTo(Payment::class);
    }
    public function inquiry()
    {
        return $this->belongsTo(Inquiry::class);
    }
    public function parent()
    {
        return $this->belongsTo(Parent::class);
    }
}

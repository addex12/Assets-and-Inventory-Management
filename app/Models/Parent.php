namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Parent extends Model
{
    use HasFactory;

    protected $fillable = ['name', 'email', 'phone', 'address'];

    public function students()
    {
        return $this->hasMany(Student::class);
    }
    public function inquiries()
    {
        return $this->hasMany(Inquiry::class);
    }
    public function school()
    {
        return $this->belongsTo(School::class);
    }
    public function attendance()
    {
        return $this->hasMany(Attendance::class);
    }
    public function exams()
    {
        return $this->hasMany(Exam::class);
    }
    public function assignments()
    {   
        return $this->hasMany(Assignment::class);
    }
    public function reports()
    {
        return $this->hasMany(Report::class);
    }
    public function events()
    {
        return $this->hasMany(Event::class);
    }
    public function grades()
    {
        return $this->hasMany(Grade::class);
    }
    public function subjects()
    {
        return $this->hasMany(Subject::class);
    }
    public function classes()
    {
        return $this->hasMany(SchoolClass::class);
    }
    public function payments()
    {
        return $this->hasMany(Payment::class);
    }
    public function notifications()
    {
        return $this->hasMany(Notification::class);
    }
    public function messages()
    {
        return $this->hasMany(Message::class);
    }
    public function inquiries()
    {
        return $this->hasMany(Inquiry::class);
    }
    public function payments()
    {
        return $this->hasMany(Payment::class);
    }
    public function notifications()
    {
        return $this->hasMany(Notification::class);
    }
    public function messages()
    {
        return $this->hasMany(Message::class);
    }
    public function inquiries()
    {
        return $this->hasMany(Inquiry::class);
    }
    public function parents()
    {
        return $this->hasMany(Parent::class);
    }
}

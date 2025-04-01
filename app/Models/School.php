namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class School extends Model
{
    use HasFactory;

    protected $fillable = ['name', 'address', 'phone', 'principal_name'];

    public function employees()
    {
        return $this->hasMany(Employee::class);
    }
    public function students()
    {
        return $this->hasMany(Student::class);
    }
    public function classes()
    {
        return $this->hasMany(SchoolClass::class);
    }
    public function subjects()
    {
        return $this->hasMany(Subject::class);
    }
    public function grades()
    {
        return $this->hasMany(Grade::class);
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

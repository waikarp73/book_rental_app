use Illuminate\Console\Command;
use App\Models\Rental;
use Carbon\Carbon;

class MarkOverdueRentals extends Command
{
    protected $signature = 'rentals:mark-overdue';
    protected $description = 'Mark rentals as overdue if they exceed the due date';

    public function __construct()
    {
        parent::__construct();
    }

    public function handle()
    {
        $today = Carbon::today();

        $overdueRentals = Rental::where('status', 'rented')
                                ->where('due_date', '<', $today)
                                ->get();

        foreach ($overdueRentals as $rental) {
            $rental->status = 'overdue';
            $rental->save();
        }

        $this->info('Overdue rentals marked successfully!');
    }
}

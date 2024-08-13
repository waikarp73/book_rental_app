use Illuminate\Console\Command;
use App\Models\Rental;
use App\Models\User;
use Illuminate\Support\Facades\Mail;
use App\Mail\OverdueNotification;
use Carbon\Carbon;

class SendOverdueNotifications extends Command
{
    protected $signature = 'rentals:send-overdue-notifications';
    protected $description = 'Send email notifications for overdue rentals';

    public function __construct()
    {
        parent::__construct();
    }

    public function handle()
    {
        $overdueRentals = Rental::with('user', 'book')
                                ->where('status', 'overdue')
                                ->get();

        foreach ($overdueRentals as $rental) {
            Mail::to($rental->user->email)->send(new OverdueNotification($rental));
        }

        $this->info('Overdue notifications sent successfully!');
    }
}

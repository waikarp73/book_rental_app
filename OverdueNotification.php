use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;
use App\Models\Rental;

class OverdueNotification extends Mailable
{
    use Queueable, SerializesModels;

    public $rental;

    public function __construct(Rental $rental)
    {
        $this->rental = $rental;
    }

    public function build()
    {
        return $this->subject('Overdue Book Rental Notification')
                    ->view('emails.overdue_notification')
                    ->with([
                        'rental' => $this->rental,
                        'user' => $this->rental->user,
                        'book' => $this->rental->book,
                    ]);
    }
}

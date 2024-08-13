use Illuminate\Console\Command;
use App\Models\Book;
use League\Csv\Reader;

class ImportBooks extends Command
{
    protected $signature = 'books:import {file}';
    protected $description = 'Import books from a CSV file';

    public function __construct()
    {
        parent::__construct();
    }

    public function handle()
    {
        $file = $this->argument('file');

        // Open the CSV file
        $csv = Reader::createFromPath($file, 'r');
        $csv->setHeaderOffset(0); // Set the header offset

        $records = $csv->getRecords();

        foreach ($records as $record) {
            Book::create([
                'title' => $record['Title'],
                'author' => $record['Author'],
                'isbn' => $record['ISBN'],
                'genre' => $record['Genre'],
            ]);
        }

        $this->info('Books imported successfully!');
    }
}

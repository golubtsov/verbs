<?php

namespace Domain\Api\Verbs;

use Illuminate\Support\Facades\Storage;
use Random\RandomException;

class VerbService
{
    private array $verbs;

    /**
     * @throws RandomException
     */
    public function getVerbs(): array
    {
        $this->setVerbs();

        $randomKey = random_int(0, count($this->verbs) - 1);

        return $this->verbs[$randomKey];
    }

    private function setVerbs(): void
    {
        $filePath = Storage::path('public/verbs/verbs.csv');

        if (!file_exists($filePath)) {
            abort(404);
        }

        $file = fopen($filePath, 'r');

        $header = fgetcsv($file);

        while ($row = fgetcsv($file)) {
            $this->verbs[] = array_values(array_combine($header, $row));
        }

        fclose($file);
    }
}

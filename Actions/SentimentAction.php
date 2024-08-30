<?php
/**
 * @see https://dev.to/robertobutti/machine-learning-with-php-5gb
 */

declare(strict_types=1);

namespace Modules\AI\Actions;

use Spatie\QueueableAction\QueueableAction;

class SentimentAction
{
    use QueueableAction;

    public function execute(string $prompt)
    {
    }
}

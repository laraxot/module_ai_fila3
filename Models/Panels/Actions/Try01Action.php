<?php

declare(strict_types=1);

namespace Modules\AI\Models\Panels\Actions;

// -------- services --------
use Illuminate\Support\Facades\Http;
use Modules\Cms\Models\Panels\Actions\XotBasePanelAction;
use OpenAI\Laravel\Facades\OpenAI;

// -------- bases -----------

/**
 * Class CategoryAction.
 */
class Try01Action extends XotBasePanelAction {
    public bool $onItem = true;

    public string $icon = '<i class="bi bi-bookmark"></i>01';

    public function handle() {
        return $this->handle02();
    }

    public function handle01() {
        $result = OpenAI::completions()->create([
            'model' => 'text-davinci-003',
            'prompt' => 'PHP is',
        ]);

        dddx($result);
    }

    public function handle02() {
        $search = 'laravel get ip address';

        $data = Http::withHeaders([
            'Content-Type' => 'application/json',
            'Authorization' => 'Bearer '.env('OPENAI_API_KEY'),
        ])
                  ->post('https://api.openai.com/v1/chat/completions', [
                      'model' => 'gpt-3.5-turbo',
                      'messages' => [
                          [
                              'role' => 'user',
                              'content' => $search,
                          ],
                      ],
                      'temperature' => 0.5,
                      'max_tokens' => 200,
                      'top_p' => 1.0,
                      'frequency_penalty' => 0.52,
                      'presence_penalty' => 0.5,
                      'stop' => ['11.'],
                  ])
                  ->json();
        dddx($data);
    }
}

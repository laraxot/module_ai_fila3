<?php

declare(strict_types=1);

namespace Modules\AI\Filament\Pages;

<<<<<<< HEAD
=======
use Exception;
>>>>>>> 4b612bf07fd8062b38e5db468a4fd29117086a11
use Filament\Actions\Action;
use Filament\Facades\Filament;
use Filament\Forms;
use Filament\Forms\ComponentContainer;
use Filament\Forms\Concerns\InteractsWithForms;
use Filament\Forms\Contracts\HasForms;
use Filament\Forms\Form;
use Filament\Pages\Page;
use Filament\Support\Exceptions\Halt;
use Illuminate\Contracts\Auth\Authenticatable;
use Illuminate\Database\Eloquent\Model;
use Modules\AI\Actions\CompletionAction;
use Modules\AI\Actions\SentimentAction;

/**
 * @property ComponentContainer $form
 * @property ComponentContainer $completionForm
 */
class Completion extends Page implements HasForms
{
    use InteractsWithForms;

    protected static ?string $navigationIcon = 'heroicon-o-document-text';

    protected static string $view = 'ai::filament.pages.completion';

    public ?array $completionData = [];

    public function mount(): void
    {
        $this->fillForms();
    }

<<<<<<< HEAD
    protected function getForms(): array
    {
        return [
            'completionForm',
        ];
    }

=======
>>>>>>> 4b612bf07fd8062b38e5db468a4fd29117086a11
    public function completionForm(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\Textarea::make('prompt')
                    ->required(),
            ])
            ->model($this->getUser())
            ->statePath('completionData');
    }

<<<<<<< HEAD
    protected function getCompletionFormActions(): array
    {
        return [
            Action::make('completionAction')
                ->label(__('filament-panels::pages/auth/edit-profile.form.actions.save.label'))
                ->submit('completionForm'),
        ];
    }

    protected function getUser(): Authenticatable&Model
    {
        $user = Filament::auth()->user();

        if (! $user instanceof Model) {
            throw new \Exception('The authenticated user object must be an Eloquent model to allow the profile page to update it.');
        }

        return $user;
    }

    protected function fillForms(): void
    {
        $data = $this->getUser()->attributesToArray();

        $this->completionForm->fill($data);
    }

=======
>>>>>>> 4b612bf07fd8062b38e5db468a4fd29117086a11
    public function completion(): void
    {
        try {
            $data = $this->completionForm->getState();
            $prompt = $data['prompt'];
            // dddx($prompt);
            // $res = app(CompletionAction::class)->execute($prompt);
            // The quality of tools in the PHP ecosystem has greatly improved in recent years
            $res = app(SentimentAction::class)->execute((string) $prompt);

            // $this->handleRecordUpdate($this->getUser(), $data);
        } catch (Halt $exception) {
            return;
        }
    }
<<<<<<< HEAD
=======

    protected function getForms(): array
    {
        return [
            'completionForm',
        ];
    }

    protected function getCompletionFormActions(): array
    {
        return [
            Action::make('completionAction')
                ->label(__('filament-panels::pages/auth/edit-profile.form.actions.save.label'))
                ->submit('completionForm'),
        ];
    }

    protected function getUser(): Authenticatable&Model
    {
        $user = Filament::auth()->user();

        if (! $user instanceof Model) {
            throw new Exception('The authenticated user object must be an Eloquent model to allow the profile page to update it.');
        }

        return $user;
    }

    protected function fillForms(): void
    {
        $data = $this->getUser()->attributesToArray();

        $this->completionForm->fill($data);
    }
>>>>>>> 4b612bf07fd8062b38e5db468a4fd29117086a11
}

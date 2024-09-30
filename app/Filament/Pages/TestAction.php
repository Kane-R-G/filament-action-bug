<?php

namespace App\Filament\Pages;

use App\Models\User;
use Filament\Actions\Action;
use Filament\Actions\Concerns\InteractsWithActions;
use Filament\Actions\Contracts\HasActions;
use Filament\Notifications\Notification;
use Filament\Pages\Page;

class TestAction extends Page implements HasActions
{
    use InteractsWithActions;

    protected static ?string $navigationIcon = 'heroicon-o-document-text';

    protected static string $view = 'filament.pages.test-action';

    protected bool $shouldBeVisible = true;

    public function testVisibleAction(): Action
    {
        return Action::make('testVisible')
            ->visible(fn(array $arguments): bool => count($arguments) == 0)
            //->visible(fn(array $arguments) => dd($arguments))
            ->requiresConfirmation()
            ->modalDescription(fn(array $arguments) => 'Message from arguments:' . $arguments['message'])
            ->action(fn() => Notification::make()->success()->title('testVisible Success')->send());
    }

    public function testVisibleClosureWithoutArgumentsAction(): Action
    {
        return Action::make('testVisibleClosureWithoutArguments')
            ->visible(fn() => $this->shouldBeVisible)
            ->requiresConfirmation()
            ->modalDescription(fn(array $arguments) => 'Message from arguments:' . $arguments['message'])
            ->action(fn() => Notification::make()->success()->title('testVisibleClosureWithoutArguments Success')->send());
    }

    public function testVisibleClosureArgumentsAction(): Action
    {
        return Action::make('testVisibleClosureArguments')
            ->visible(fn(array $arguments) => empty($arguments))
            ->requiresConfirmation()
            ->modalDescription(fn(array $arguments) => 'Message from arguments:' . $arguments['message'])
            ->action(fn() => Notification::make()->success()->title('testVisibleClosureArgumentsAction Success')->send());
    }

    public function testVisibleHardCodedAction(): Action
    {
        return Action::make('testVisibleHardCoded')
            ->visible(true)
            ->requiresConfirmation()
            ->modalDescription(fn(array $arguments) => 'Message from arguments:' . $arguments['message'])
            ->action(fn() => Notification::make()->success()->title('testVisibleHardCoded Success')->send());
    }

    public function testVisibleHardCodedFromClosureAction(): Action
    {
        return Action::make('testVisibleHardCodedFromClosure')
            ->visible(fn() => true)
            ->requiresConfirmation()
            ->modalDescription(fn(array $arguments) => 'Message from arguments:' . $arguments['message'])
            ->action(fn() => Notification::make()->success()->title('testVisibleHardCodedFromClosure Success')->send());
    }
}

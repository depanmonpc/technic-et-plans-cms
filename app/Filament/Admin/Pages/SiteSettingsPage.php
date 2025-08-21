<?php

namespace App\Filament\Admin\Pages;

use Filament\Forms;
use Filament\Pages\Page;
use App\Settings\GeneralSettings;
use Filament\Forms\Contracts\HasForms;
use Filament\Forms\Concerns\InteractsWithForms;
use Filament\Pages\Actions\Action;
use Filament\Notifications\Notification;
use BackedEnum;

class SiteSettingsPage extends Page implements HasForms
{
    use InteractsWithForms;

    protected static BackedEnum|string|null $navigationIcon = 'heroicon-o-cog';
    protected static ?string $navigationLabel = 'Paramètres généraux';
    protected static ?string $title = 'Paramètres du site';
    protected string $view = 'filament.admin.pages.general-settings-page';

    public ?string $site_name = '';
    public ?string $admin_email = '';
    public ?string $site_description = '';

    public function mount(): void
    {
        $settings = app(GeneralSettings::class);

        $this->form->fill([
            'site_name' => $settings->site_name,
            'admin_email' => $settings->admin_email,
            'site_description' => $settings->site_description,
        ]);
    }

    protected function getFormSchema(): array
    {
        return [
            Forms\Components\TextInput::make('site_name')
                ->label('Nom du site')
                ->required(),

            Forms\Components\TextInput::make('admin_email')
                ->label('Email administrateur')
                ->required()
                ->email(),

            Forms\Components\Textarea::make('site_description')
                ->label('Description du site'),
        ];
    }

    public function save(): void
    {
        $data = $this->form->getState();

        /** @var \App\Settings\GeneralSettings $settings */
        $settings = app(GeneralSettings::class);
        $settings->site_name = $data['site_name'];
        $settings->admin_email = $data['admin_email'];
        $settings->site_description = $data['site_description'];
        $settings->save();

        // Notification simple compatible Filament v3
        Notification::make()
            ->title('Paramètres enregistrés.')
            ->body('Vos paramètres ont bien été mis à jour.')
            ->success()
            ->send();
    }

    protected function getFormActions(): array
    {
        return [
            Action::make('save')
                ->label('Sauvegarder')
                ->submit('save'),
        ];
    }
}

<?php

namespace App\Filament\Pages;

use App\Models\Shop;
use Filament\Forms\Form;
use Filament\Pages\Page;
use Filament\Actions\Action;
use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\Hidden;
use Filament\Forms\Components\KeyValue;
use Filament\Forms\Components\Section;
use Illuminate\Support\Facades\Auth;
use Filament\Forms\Contracts\HasForms;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\TimePicker;
use Filament\Notifications\Notification;
use Filament\Forms\Concerns\InteractsWithForms;

class ShopPage extends Page implements HasForms
{
    use InteractsWithForms;
    public ?array $data = [];


    protected static ?string $navigationIcon = 'heroicon-o-document-text';

    protected static string $view = 'filament.pages.shop-page';
    protected static ?string $navigationLabel = 'Manage Shop';  

    public Shop $record;

    public function mount(): void
    {
        // Retrieve the shop for the authenticated user or create a new Shop instance
        $this->record = auth()->user()->shop ?? new Shop();


        // Fill the form with the record's attributes
        $this->form->fill(array_merge($this->record->attributesToArray(), [
            'user_id' => Auth::id(),
        ]));
    }

    public function form(Form $form): Form
    {
        return $form
            ->schema([
                Section::make()
                    ->columns(2)
                    ->schema([
                        Hidden::make('user_id')
                            ->required(),
                        TextInput::make('name')
                            ->required(),
                        TextInput::make('location')
                            ->required(),
                        TextInput::make('phone')
                            ->required(),
                        KeyValue::make('working_hours')
                            ->required()
                            ->keyLabel('Day')
                            ->keyPlaceholder('Monday-Friday')
                            ->valueLabel('Time')
                            ->valuePlaceholder('9am-7pm')
                            ->columnSpanFull(),
                        FileUpload::make('upi')
                            ->label('UPI Scan')
                            ->hint('Paytm, Google Pay'),
                    ])
            ])
            ->statePath('data');
    }


    protected function getFormActions(): array
    {
        return [
            Action::make('save')
                ->label(__('filament-panels::resources/pages/edit-record.form.actions.save.label'))
                ->submit('save'),
        ];
    }

    public function save(): void
    {
        $data = $this->form->getState();

        // Ensure that the user_id is set correctly before saving
        $this->record->fill($data + ['user_id' => Auth::id()]);

        $this->record->save();

        Notification::make()
            ->success()
            ->title(__('filament-panels::resources/pages/edit-record.notifications.saved.title'))
            ->send();
    }
}

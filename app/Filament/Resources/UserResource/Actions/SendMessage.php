<?php

namespace App\Filament\Resources\UserResource\Actions;

use App\Mail\AdminMessage;
use Filament\Notifications\Notification;
use Filament\Tables\Actions\Action;
use Filament\Forms;
use Illuminate\Support\Facades\Mail;

class SendMessage extends Action
{
    public static function getDefaultName(): ?string
    {
        return 'send_message';
    }

    protected function setUp(): void
    {
        $this->icon('heroicon-o-paper-airplane')
            ->form([
                Forms\Components\TextInput::make('to')
                    ->default(fn($record) => $record->email)
                    ->placeholder('Ex. example@example.com')
                    ->required(),
                Forms\Components\TextInput::make('subject')
                    ->placeholder('Ex. Account Suspension Notice')
                    ->required(),
                Forms\Components\MarkdownEditor::make('message')
                    ->placeholder('Write the content of the message')
                    ->required(),
            ])
            ->action(function (array $data){
                try{
                    $mail = new AdminMessage($data['message']);
                    $mail->subject($data['subject']);
                    Mail::to($data['to'])->send($mail);
                    Notification::make()
                        ->title('Message sent successfully')
                        ->body("Message to {$data['to']} has been send successfully")
                        ->success()
                        ->send();
                }catch (\Exception $e){
                    Notification::make()
                        ->title('Message failed to send')
                        ->body("Message could not be send: {$e->getMessage()}")
                        ->danger()
                        ->send();
                }
            });
    }
}

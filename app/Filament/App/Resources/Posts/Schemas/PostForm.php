<?php

namespace App\Filament\App\Resources\Posts\Schemas;

use Filament\Forms\Components\DateTimePicker;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\Toggle;
use Filament\Schemas\Schema;

class PostForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                TextInput::make('title')
                    ->required(),
                Textarea::make('content')
                    ->required()
                    ->columnSpanFull(),
                TextInput::make('slug')
                    ->required(),
                Toggle::make('featured')
                    ->required(),
                DateTimePicker::make('published_at'),
                TextInput::make('user_id')
                    ->required()
                    ->numeric(),
                TextInput::make('category_id')
                    ->numeric()
                    ->default(null),
                Select::make('team_id')
                    ->relationship('team', 'name')
                    ->default(null),
                Textarea::make('excerpt')
                    ->default(null)
                    ->columnSpanFull(),
                TextInput::make('thumbnail')
                    ->default(null),
                Toggle::make('is_published')
                    ->required(),
                TextInput::make('meta_title')
                    ->default(null),
                TextInput::make('meta_description')
                    ->default(null),
            ]);
    }
}

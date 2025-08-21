<?php

namespace App\Filament\Admin\Resources;

use App\Filament\Admin\Resources\PostResource\Pages;
use App\Models\Post;
use Filament\Forms;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Filament\Schemas\Schema;      // ← v4
use Illuminate\Support\Str;
use BackedEnum;                   // ← pour $navigationIcon
use UnitEnum;                     // ← pour $navigationGroup

class PostResource extends Resource
{
    protected static ?string $model = Post::class;

    protected static BackedEnum|string|null $navigationIcon = 'heroicon-o-document-text';
    protected static UnitEnum|string|null   $navigationGroup = 'Administration';
    protected static ?string $navigationLabel = 'Articles';
    protected static ?string $modelLabel = 'Article';
    protected static ?string $pluralModelLabel = 'Articles';

    // -----------------------
    // Filament v4: Schema API
    // -----------------------
    public static function form(Schema $schema): Schema
    {
        return $schema->schema([
            Forms\Components\Section::make('Contenu')
                ->columns(2)
                ->schema([
                    Forms\Components\TextInput::make('title')
                        ->label('Titre')
                        ->required()
                        ->maxLength(255)
                        ->live(onBlur: true)
                        ->afterStateUpdated(function (string $state, Forms\Set $set, Forms\Get $get) {
                            if (! $get('slug')) {
                                $set('slug', Str::slug($state));
                            }
                        }),

                    Forms\Components\TextInput::make('slug')
                        ->label('Slug')
                        ->required()
                        ->unique(ignoreRecord: true),

                    Forms\Components\RichEditor::make('content')
                        ->label('Contenu')
                        ->required()
                        ->columnSpanFull(),
                ]),

            Forms\Components\Section::make('Publication')
                ->columns(2)
                ->schema([
                    Forms\Components\Toggle::make('featured')->label('À la une'),

                    Forms\Components\DateTimePicker::make('published_at')
                        ->label('Date de publication')
                        ->seconds(false)
                        ->native(false)
                        ->helperText('L’article est considéré publié si une date est définie.'),

                    Forms\Components\Select::make('user_id')
                        ->label('Auteur')
                        ->relationship('user', 'name')
                        ->searchable()
                        ->preload()
                        ->required(),

                    Forms\Components\Select::make('category_id')
                        ->label('Catégorie')
                        ->relationship('category', 'name')
                        ->searchable()
                        ->preload(),
                ]),

            Forms\Components\Section::make('Tags')
                ->schema([
                    Forms\Components\Select::make('tags')
                        ->label('Tags')
                        ->multiple()
                        ->relationship('tags', 'name')
                        ->preload()
                        ->searchable(),
                ]),
        ]);
    }

    // En v4, Table reste sur Tables\Table
    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('title')
                    ->label('Titre')
                    ->searchable()
                    ->sortable(),

                Tables\Columns\TextColumn::make('category.name')
                    ->label('Catégorie')
                    ->toggleable(),

                Tables\Columns\IconColumn::make('featured')
                    ->label('À la une')
                    ->boolean()
                    ->toggleable(),

                Tables\Columns\TextColumn::make('published_at')
                    ->label('Publié le')
                    ->dateTime()
                    ->sortable(),

                Tables\Columns\TextColumn::make('user.name')
                    ->label('Auteur')
                    ->toggleable(),
            ])
            ->filters([
                Tables\Filters\TernaryFilter::make('published')
                    ->label('Publié')
                    ->trueLabel('Avec date de publication')
                    ->falseLabel('Sans date de publication')
                    ->queries(
                        true: fn ($q) => $q->whereNotNull('published_at')->where('published_at', '<=', now()),
                        false: fn ($q) => $q->whereNull('published_at'),
                        blank: fn ($q) => $q,
                    ),
                Tables\Filters\SelectFilter::make('category_id')
                    ->relationship('category', 'name')
                    ->label('Catégorie'),
            ])
            ->actions([
    \Filament\Actions\EditAction::make(),
    \Filament\Actions\DeleteAction::make(),
])
->bulkActions([
    \Filament\Actions\DeleteBulkAction::make(),
]);
    }

    public static function getPages(): array
    {
        return [
            'index'  => Pages\ListPosts::route('/'),
            'create' => Pages\CreatePost::route('/create'),
            'edit'   => Pages\EditPost::route('/{record}/edit'),
        ];
    }
}

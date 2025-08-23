<?php

namespace App\Filament\Admin\Resources;

use App\Filament\Admin\Resources\PostResource\Pages;
use App\Models\Post;
use BackedEnum;
use Filament\Forms\Components\DateTimePicker;
use Filament\Forms\Components\RichEditor;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Toggle;
use Filament\Resources\Resource;
use Filament\Schemas\Components\Grid; // <-- v4 layout component
use Filament\Schemas\Components\Utilities\Get; // <-- v4 utilities
use Filament\Schemas\Components\Utilities\Set; // <-- v4 utilities
use Filament\Schemas\Schema; // <-- v4 Schema
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Support\Str;
use UnitEnum;

class PostResource extends Resource
{
    protected static ?string $model = Post::class;

    protected static BackedEnum|string|null $navigationIcon = 'heroicon-o-document-text';
    protected static UnitEnum|string|null   $navigationGroup = 'Administration';
    protected static ?string $navigationLabel = 'Articles';
    protected static ?string $modelLabel = 'Article';
    protected static ?string $pluralModelLabel = 'Articles';

    public static function form(Schema $schema): Schema
    {
        return $schema->components([
            Grid::make(2)->schema([
                TextInput::make('title')
                    ->label('Titre')
                    ->required()
                    ->maxLength(255)
                    ->live(onBlur: true)
                    ->afterStateUpdated(function (string $state, Set $set, Get $get) {
                        if (! $get('slug')) {
                            $set('slug', Str::slug($state));
                        }
                    }),

                TextInput::make('slug')
                    ->label('Slug')
                    ->required()
                    ->unique(ignoreRecord: true),

                RichEditor::make('content')
                    ->label('Contenu')
                    ->required()
                    ->columnSpanFull(),
            ]),

            Grid::make(2)->schema([
                Select::make('user_id')
                    ->label('Auteur')
                    ->relationship('user', 'name')
                    ->searchable()
                    ->preload()
                    ->required(),

                Select::make('category_id')
                    ->label('Catégorie')
                    ->relationship('category', 'name')
                    ->searchable()
                    ->preload(),

                DateTimePicker::make('published_at')
                    ->label('Date de publication')
                    ->seconds(false)
                    ->native(false)
                    ->helperText('L’article est considéré publié si une date est définie.'),

                Toggle::make('featured')->label('À la une'),
            ]),

            Grid::make()->schema([
                Select::make('tags')
                    ->label('Tags')
                    ->multiple()
                    ->relationship('tags', 'name')
                    ->preload()
                    ->searchable(),
            ]),
        ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('title')->label('Titre')->searchable()->sortable(),
                Tables\Columns\TextColumn::make('category.name')->label('Catégorie')->toggleable(),
                Tables\Columns\IconColumn::make('featured')->label('À la une')->boolean()->toggleable(),
                Tables\Columns\TextColumn::make('published_at')->label('Publié le')->dateTime()->sortable(),
                Tables\Columns\TextColumn::make('user.name')->label('Auteur')->toggleable(),
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

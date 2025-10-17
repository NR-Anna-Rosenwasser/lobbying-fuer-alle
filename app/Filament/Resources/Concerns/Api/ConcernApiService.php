<?php
namespace App\Filament\Resources\Concerns\Api;

use Rupadana\ApiService\ApiService;
use App\Filament\Resources\Concerns\ConcernResource;
use Illuminate\Foundation\Exceptions\Handler;

class ConcernApiService extends ApiService
{
    protected static string | null $resource = ConcernResource::class;

    public static function handlers() : array
    {
        return [
            Handlers\FormHandler::class
        ];

    }
}

<?php
namespace App\Filament\Resources\Concerns\Api\Transformers;

use Illuminate\Http\Resources\Json\JsonResource;
use App\Models\Concern;

/**
 * @property Concern $resource
 */
class ConcernTransformer extends JsonResource
{

    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
        return $this->resource->toArray();
    }
}

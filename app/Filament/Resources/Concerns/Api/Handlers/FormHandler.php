<?php
namespace App\Filament\Resources\Concerns\Api\Handlers;

use App\Filament\Resources\Concerns\Api\Requests\FormConcernRequest;
use Rupadana\ApiService\Http\Handlers;
use App\Filament\Resources\Concerns\ConcernResource;

class FormHandler extends Handlers {
    public static string | null $uri = '/';
    public static string | null $resource = ConcernResource::class;
    protected static string $permission = '';
    public static bool $public = true;


    public static function getMethod()
    {
        return Handlers::POST;
    }

    public static function getModel() {
        return static::$resource::getModel();
    }

    public function handler(FormConcernRequest $request): \Illuminate\Http\JsonResponse
    {

        $constituent = $request->only([
            'constituentFname',
            'constituentLname',
            'constituentEmail',
            'constituentPhone',
            'constituentPronouns',
        ]);
        $concern = $request->only([
            'concernTitle',
            'concernDescription',
            'concernParlchChecked',
            'concernPastConcerns',
            'concernPastConcernsTimespan',
            'concernPastConcernsDetails',
            'concernExperts',
            'concernFurtherInformation',
        ]);

        $createdConstituent = \App\Models\Constituent::updateOrCreate(
            ['email' => $constituent['constituentEmail']],
            [
                "fname" => $constituent['constituentFname'],
                "lname" => $constituent['constituentLname'],
                "phone" => $constituent['constituentPhone'],
                "pronouns" => $constituent['constituentPronouns']
            ]
        );

        $createdConcern = \App\Models\Concern::create([
            "title" => $concern['concernTitle'],
            "description" => $concern['concernDescription'],
            "parlch_checked" => $concern['concernParlchChecked'],
            "past_concerns" => $concern['concernPastConcerns'],
            "past_concerns_timespan" => $concern['concernPastConcernsTimespan'],
            "past_concerns_details" => $concern['concernPastConcernsDetails'],
            "experts" => $concern['concernExperts'],
            "further_information" => $concern['concernFurtherInformation'],
            "constituent_id" => $createdConstituent->id,
        ]);
        $createdConcern->save();

        $responseData = [
            'constituent' => $createdConstituent,
            'concern' => $createdConcern,
        ];

        \Http::post(env('NEWSLETTER_WEBHOOK_URL'), $responseData);

        return response()->json([
            'message' => 'Concern created successfully',
            'data' => $responseData,
        ], 201);
    }
}

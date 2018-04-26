<?php

namespace App\Services;

use App\Events\ViolationCreated;
use App\Violation;

class ViolationService
{
    public function create($data)
    {
        $violation = new Violation();
        $violation->fill($data);

        $violation->status = 'NEW';

        $violation->station()->associate($data['station_id']);

        $user = auth()->user();

        $user->violations()->save($violation);

        event(new ViolationCreated($violation));
    }

    public function update(Violation $violation, $data)
    {
        $violation->fill($data);

        return $violation->save();
    }
}
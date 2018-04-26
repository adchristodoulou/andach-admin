<?php

namespace App\Events;

use App\Position;
use Illuminate\Broadcasting\Channel;
use Illuminate\Queue\SerializesModels;
use Illuminate\Broadcasting\PrivateChannel;
use Illuminate\Broadcasting\PresenceChannel;
use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Broadcasting\InteractsWithSockets;
use Illuminate\Contracts\Broadcasting\ShouldBroadcast;

class PositionSaving
{
    use Dispatchable, InteractsWithSockets, SerializesModels;

    /**
     * Create a new event instance.
     *
     * @return void
     */
    public function __construct(Position $position)
    {
        $position->area_id = $position->reportingUnit->area_id;

        //Select every position with this job in this reporting unit and adjust the end date accordingly. 
        $formerPositions = Position::where(
                ['job_id', $position->job_id],
                ['reporting_unit_id', $position->reporting_unit_id]
            )->orderBy('from_date', 'desc')->first();

        dd($formerPositions);
    }

    /**
     * Get the channels the event should broadcast on.
     *
     * @return \Illuminate\Broadcasting\Channel|array
     */
    public function broadcastOn()
    {
        //return new PrivateChannel('channel-name');
    }
}

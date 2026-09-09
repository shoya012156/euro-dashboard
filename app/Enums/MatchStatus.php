<?php

namespace App\Enums;

enum MatchStatus: string
{
    case SCHEDULED = 'SCHEDULED';
    case TIMED = 'TIMED';
    case IN_PLAY = 'IN_PLAY';
    case PAUSED = 'PAUSED';
    case EXTRA_TIME = 'EXTRA_TIME';
    case PENALTY_SHOOTOUT = 'PENALTY_SHOOTOUT';
    case FINISHED = 'FINISHED';
    case SUSPENDED = 'SUSPENDED';
    case POSTPONED = 'POSTPONED';
    case CANCELLED = 'CANCELLED';
    case AWARDED = 'AWARDED';
    //
}

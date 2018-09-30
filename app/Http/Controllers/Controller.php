<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;

class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;
}


/*

read this regarding routes with multiple parameters

https://stackoverflow.com/questions/31681715/passing-multiple-parameters-to-controller-in-laravel-5

*/

/*
* May need the following controllers for the web application
* 
* - PagesController - For generic pages. 
*   BASIC:
*   / = index - home page
*   /about = about
*   /login = Admin login - Me Only
*
*   FULL - OPEN TO ALL 
*   /register = register
*   /contact = contact
*   /support
*   /faq
* 
* - GuildController - To handle the following
*   BASIC
*   /guild  - View list of guild members - possibly include event list
*           - Player names are links to their personal page
*
*   FULL - OPEN TO ALL
*   /{guild_id} - guild specific - list members
*           - Player names are links to their personal page
*
* - EventsController - manage events 
*   BASIC:  
*   /events - View list of events
*   /events/{event_id}  - Show list of players for the event plus their guild scores
*                       - Player names are links to their personal stats
*
*   FULL - OPEN TO ALL
*   /{guild_id}/events - view list of events guild particapated in
*   /{guild_id}/events/{event_id}   - Show list of players for the event plus their guild scores
*                                   - Player names are links to their personal stats
*                                   
* - PlayersController - to handle players
*   BASIC:
*   /guild/{player_id}  - Possibly Dashboard style
*                       - Show name
*                       - Lastest event - Query by latest event
*                           - Event name
*                           - Event Type
*                           - Event League
*                           - Event ranking
*                           - Global Ranking
*                       - Display events that they have participated 
*                           - By clicking on the event name, list their event stats
*
*   ADVANCED:
*       - Graphs of their past performance
*           - Crusade scores
*           - Raid scores
*           - Crusade Rank
*           - Guild average???
*
*   FULL - OPEN TO ALL
*   /{guild_id}/{player_id}
*
* - EventStatsController
*   BASIC:
*   /guild/{player_id}/{event_id}/{eventstats_id}   - Show players stats for that event
*
*   FULL - OPEN TO ALL
*   /{guild_id}/{player_id}/{event_id}/{eventstats_id}
*
* - AdminDashboardController
*   BASIC:
*   /admin - for ME only    - Full access to all pages.
*
*   FULL - OPEN TO ALL
*   /{guild_id}/dashboard   - View list of players
*                           - Add / Remove players
*                           - Add eventstats
*                           - Need more though on this. 
*/
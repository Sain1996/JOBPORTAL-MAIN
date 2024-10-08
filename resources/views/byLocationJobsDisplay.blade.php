<ul id="bylocation_jobs" style="height:300px; overflow-y: auto;">

    @foreach($locations as $location)
        <li id="location_jobs" class="location_jobs_link"> {{$location->concentrated_area}} {{ $location->district_city }} , {{ $location->state }} </li> 
    @endforeach

    @if($showAll === false && count($locations) > 0)
       
        <li id="morelocations">
            <a style="color:yellow;" href="javascript:void(0);" onclick="loadByLocationJobs(true)" class="more-link">More... </a>
        </li>
    @endif
    <style>
        #bylocation_jobs li.location_jobs_link {
            color: white;
            transition: opacity 0.3s, color 0.3s;
        }
        #bylocation_jobs li.location_jobs_link:hover {
            opacity: 1;
            color: #000000; /* change the text color to blue on hover */
        }
    </style>
</ul>
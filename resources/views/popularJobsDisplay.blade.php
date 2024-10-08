
<ul id="popular_jobs" style="height:300px; overflow-y: auto;">
    @foreach($jobs as $job)
        <li id="popular_job" class="popular-jobs-link-li">
            {{ $job->name }}
        </li>
    @endforeach
    @if($showAll === false && count($jobs) > 0)
        <!-- Display the "More" link only if not all categories are being shown -->
        <li id="morejobs">
            <a style="color:yellow;" href="javascript:void(0);" onclick="loadPopularJobs(true)" class="more-link">More... </a>
        </li>
    @endif
    <style>
        #popular_jobs li.popular-jobs-link-li {
            color: white;
            transition: opacity 0.3s, color 0.3s;
        }
        #popular_jobs li.popular-jobs-link-li:hover {
            opacity: 1;
            color: #000000; /* change the text color to blue on hover */
        }
    </style>
</ul>

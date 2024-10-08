@extends('super.layout')

@section('content')
<div class="row justify-content-center">
    <div class="col-lg-8">
        <div class="login-container" style="background-color: white;">
            <h2>Manage Users</h2>

            <!-- Search Form -->
            <form id="searchForm" action="{{ route('searchUsers') }}" method="GET">
                <div class="form-group">
                    <input type="text" id="keyword" name="keyword" placeholder="Search by name" class="form-control">
                    <button type="submit" id="searchBtn" class="btn btn-primary" disabled>Search</button>
                </div>
            </form>

            <!-- User List -->
            <div id="userList">
                @include('super.user_list')
            </div>
        </div>
    </div>
</div>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script>
   $(document).ready(function() {
        document.addEventListener("DOMContentLoaded", function(){
            const seacrhinput= document.getElementById("keyword");
            const searchButton= document.getElementById("seatchBtn");

            searchButton.addEventListener("click", function(){
            const searchTerm = searchinput.value.trim();
            if (searchTerm !== "") {
            // Redirect to search results page or execute search function
            // Example: window.location.href = "search_results.html?query=" + encodeURIComponent(searchTerm);
            alert("Searching for user: " + searchTerm);
        } else {
            alert("Please enter a search term.");
        }
        });
            // Optional: Allow pressing Enter to trigger search
            searchinput.addEventListener("keypress", function(event) {
           if (event.key === "Enter") {
            fetchSearchResults();
           }
           else{
            
           }
           });
       });

        // Function for live validation

        $('#keyword').on('input', function() {
            var keyword = $(this).val().trim();
            if (keyword.length > 0) {
                $('#searchBtn').prop('disabled', false);
            } else {
                $('#searchBtn').prop('disabled', true);
            }


            // AJAX request to fetch search results
            fetchSearchResults(keyword);
        });

        // Function to fetch search results
        function fetchSearchResults(keyword) {
            // AJAX request to fetch search results
            $.ajax({
                url: $('#searchForm').attr('action'),
                type: $('#searchForm').attr('method'),
                data: { keyword: keyword },
                success: function(response) {
                    // Update user list with search results
                    $('#userList').html(response);
                }
            });
        }

        // AJAX request on form submission
        $('#searchForm').submit(function(event) {
            event.preventDefault(); // Prevent default form submission
            var keyword = $('#keyword').val();
            fetchSearchResults(keyword);
        });
    });
    
</script>
@endsection


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/fontawesome.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/intl-tel-input@23.3.2/build/css/intlTelInput.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.0/css/bootstrap.min.css">
    <link rel="icon" href="image/ay2.png" type="image/icon type">
    <script type="text/javascript" charset="utf8" src="http://ajax.aspnetcdn.com/ajax/jQuery/jquery-2.0.3.js"></script>
    <script type="text/javascript" src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>
    <!-- Bootstrap CSS -->


<!-- Bootstrap JS (optional if using interactive features like modals, dropdowns) -->
<script src="https://stackpath.bootstrapcdn.com/bootstrap/5.3.0/js/bootstrap.bundle.min.js"></script>

    <title>Job Search</title>
<style>
.container{
    /* display:grid;
    grid-column-gap:initial;
    padding:10px; */
    background:lightblue;
    flex-direction: row;
    flex-wrap: wrap;
    display:flex;
    width:fit-content;
    justify-content: space-around;
    border-radius:25px;
    align-content: center;
    height: 100px;
    /* padding-left: 10px; */

}
    .items{
    margin: 1px;
    /* background:white; */
    position:relative;
    text-align: center;
    //padding:20px;
}
input:placeholder-shown{
    background-color:white;
    box-shadow: 2px 2px 2px 2px lightgray ;
    border:none;
    
}

#columns,#row{
    text-align:center;
    margin:0;
 
}
</style>
</head>
<body>
    <h1>Hello!!!!</h1>
   
       
         <div class="container"> 
            <div class="row">
        <div class="items"><input style="width:250px;" type="text" placeholder="Enter Skills/Desinations/Companies "> </div>
        <div  class="items"><input style="width:200px;" type="text" placeholder="Enter experience ">  </div>
        <div  class="items"><input style="width:200px;" type="text" placeholder="Enter location ">  </div>
        <div  class="items"><button class="btn btn-primary"> Search</button></div>

        </div>
         </div>
      

   


</body>
</html>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
    <title>Document</title>
</head>
<body>
    <div class="container">
        <h2>Search</h2>
        <div class="form-group">
          <input type="text" class="form-control user_list_search" id="search_for_user" name="search_for_user" placeholder="Search name/designation/department">
        </div>
        <div class="card-columns" style="column-count: 2;">
          @foreach ($users as $user)
            <div class="card bg-light user_data">
              <div class="card-body ">
                <p class=""><b>{{$user->user_name}}</b></p>
                <p class="" style="font-weight: 500;">{{$user->designation}}</p>
                <p class="">{{$user->department}}</p>
              </div>
            </div>
          @endforeach
        </div>
      </div>

      <script>
          (function($) {
              $.fn.donetyping = function(callback){
                var _this = $(this);
                var x_timer;    
                _this.keyup(function (){
                    clearTimeout(x_timer);
                    x_timer = setTimeout(clear_timer, 1000);
                }); 

                function clear_timer(){
                    clearTimeout(x_timer);
                    callback.call(_this);
                }
              }
          })(jQuery);

          $('#search_for_user').donetyping(function(callback){
              searchUsers();
          });

          jQuery.expr[":"].Contains = jQuery.expr.createPseudo(function(arg) {
              return function( elem ) {
                  return jQuery(elem).text().toUpperCase().indexOf(arg.toUpperCase()) >= 0;
              };
          });

          function searchUsers() {
              var search_content = $("#search_for_user").val();
              if (search_content.length > 0) {
                  $('.user_data').hide();
                  $('.user_data:Contains("'+search_content+'")').show();
              }
              else if (!search_content) {
                  $(".user_data").show();
              }
              else {
                  // do nothing
              }
          }
      </script>
</body>
</html>
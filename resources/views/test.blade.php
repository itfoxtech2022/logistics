<!DOCTYPE html>
<html lang="en">
   <head>
      <title>combine two array in laravel foreach loop</title>
      <meta charset="utf-8">
      <meta name="viewport" content="width=device-width, initial-scale=1">
      <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
      <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
      <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
   </head>
   <body>
   <div class="container">
         <h2 style="color: #BE206B;">Combine Array's in foreach loop in the Blade File | Laravel</h2>
         
         @php   
         $user_names = array('John','David','Sachin','Gaurav');
         $user_emails = array('john@gmail.com','david@gmail.com','sachin@gmail.com','8bityard@gmail.com');
         @endphp

         <table class="table table-bordered">
            <thead>
               <tr>
                  <th>Name</th>
                  <th>Email</th>
               </tr>
            </thead>
            @foreach (array_combine($user_names, $user_emails) as $user_name => $user_email) 
            <tbody>
               <tr>
                  <td>{{ $user_name ?? '' }}</td>
                  <td>{{ $user_email ?? '' }}</td>
               </tr>
            </tbody>
            @endforeach
         </table>
      </div>
   </body>
</html>
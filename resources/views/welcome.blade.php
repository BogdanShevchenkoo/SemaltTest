<html>
   <head>
      <title>Тестовое задание</title>
      <meta name = "viewport" content = "width = device-width, initial-scale = 1.0">     
      <link rel = "stylesheet"
         href = "https://fonts.googleapis.com/icon?family=Material+Icons">
      <link rel = "stylesheet"
         href = "https://cdnjs.cloudflare.com/ajax/libs/materialize/0.97.3/css/materialize.min.css">
      <script type = "text/javascript"
         src = "https://code.jquery.com/jquery-2.1.1.min.js"></script>           
      <script src = "https://cdnjs.cloudflare.com/ajax/libs/materialize/0.97.3/js/materialize.min.js">
      </script>
      <link rel="stylesheet" href="css/style.css">
        
   </head>
   
<body class = "container"> 
    
    @include('layouts.Header')
    
    <h4 class="center-align">Список заданий</h4>

    @foreach ($tasks as $task)
      <ul class = "collapsible popout" data-collapsible = "accordion">
         <li class="TopLi">
            <div class = "collapsible-header amber lighten-4 divTop">
               <i class = "material-icons">assignment</i>Задание №{{ $task->id }}</div>
            <div class = "collapsible-body"><p><?php echo $task->task ?></p></div>
         </li>
         
         <li>
            <div class = "collapsible-header">
               <i class = "material-icons">create</i>Пример кода</div>
            <div class = "collapsible-body"><p><?php echo $task->code ?></p>
            </div>
         </li>
         
         <li class="BottomLi">
            <div class = "collapsible-header divBottom">
               <i class = "material-icons">done</i>Ответ</div>
            <div class = "collapsible-body divBottom"><p><?php echo $task->result ?></p></div>
         </li>
      </ul>
      
      @endforeach 
   
    <!-- Compiled and minified JavaScript -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0-rc.2/js/materialize.min.js"></script>
</body>
</html>
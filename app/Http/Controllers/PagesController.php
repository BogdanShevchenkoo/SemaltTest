<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PagesController extends Controller
{
    public function index(){
    	// $table = 'tasks';
    	
		
		$tasks = \DB::table("tasks")->get();
		if($tasks->count()==0){
			$this->fillTable();
			$tasks = \DB::table("tasks")->get();
		}
		
		foreach ($tasks as $task) {
			$task->code=nl2br($task->code);
			$task->result=nl2br($task->result);
		} 
    	return view('welcome', compact("tasks"));
    }

    public function fillTable(){
    	\DB::table('events')->insert(
			    [
			    	'id' => NULL,
			   	 	'caption' => 'Atlas Weekend 2017'		   	 	
				]
			);


		\DB::table('events')->insert(
			    [
			    	'id' => NULL,
			   	 	'caption' => 'Грин Грей (Green Grey)'			   	 	
				]
			);

		\DB::table('bids')->insert(
			    [
			    	'id' => NULL,
			   	 	'id_event' => '1',
			   	 	'name' => 'Василий',
			   	 	'email' => 'vas@gmail.com',
			   	 	'price' => 100			   	 	
				]
			);

		\DB::table('bids')->insert(
			    [
			    	'id' => NULL,
			   	 	'id_event' => '1',
			   	 	'name' => 'Николай',
			   	 	'email' => 'nk@gmail.com',
			   	 	'price' => 150			   	 	
				]
			);

	    $tasks = [];
		$tasks[0] = [
			'1',
			'Написать алгоритм решения задачи: В классе 28 учеников. 
			75% из них занимаются спортом. Сколько учеников в классе занимаются спортом и сколько всего учеников в классе?',
			'$students = 28;// количество учеников <br> $percents = 75; // процент занимающихся спортом
			$answer = ($students*$percents)/100; <br>echo $students;<br> echo $answer;',
			'Количество учеников:28 
			Из них: спортсменов 21'
		];
		// dd($tasks);
		$tasks[1] = ['2', 'Реализовать алгоритм извлечения числовых значений со строки:This server has 386 GB RAM and 5000 GB storage', '$str = "This server has 386 GB RAM and 5000 GB storage";<br>$str2 = "";<br>for($i = 0; $i < strlen($str); $i++){<br>if(is_numeric($str[$i]))<br> $str2 = $str2.$str[$i];<br>}<br>echo $str2;', '3865000'];
		$tasks[2] = ['3', 'Как получить первый элемент массива ​[2,3,56,65,56,44,34,45,3,5,35,345,3,5] ​?', '​$array = [2,3,56,65,56,44,34,45,3,5,35,345,3,5]; <br> echo $array[0];', '2'];
		$tasks[3] = ['4', 'Как вычислить остаток от деления 10/3', '//При помощи операции вычисления остатка от деления "%"<br>
					$a = 10; <br>	
					$b = 3; <br>
		 	        echo $a % $b;<br>
		 	        //Данный алгоритм будет работать только с положительными числами', '1'];
		$tasks[4] = ['5', 'Нужно поменять 2 переменные местами без использования третьей: <br> $а = [1,2,3,4,5]; <br> $b = "Hello world";', 
			'$a = [1,2,3,4,5]; <br>
			$b = "Hello world";<br>
			$a[] = $b;<br>
			$b = $a;<br>
			unset($b[count($b)-1]);<br>
			$a = $a[count($a)-1];<br>
			echo $a;<br>
			print_r($b);', '$a = "Hello world"
			$b = Array ( [0] => 1 [1] => 2 [2] => 3 [3] => 4 [4] => 5 )'];
		$tasks[5] = ['6', 'Чем отличается оператор == от === ?', 'var_dump(1 == "1");  // вернет TRUE<br>
		var_dump(1 === "1"); // вернет False', 'Оператор == дает значение истина, если есть равенство после преобразования типов <br>
	 	Оператор === дает значение истина, если есть равенство и значения принадлежат одному типу'];
		$tasks[6] = ['7', 'Чем отличается require от include ?', '', 'require - Выдаст критическую ошибку если файл не будет найден <br>
	 	include - выдаст предупреждение и продолжит работу в случае если файл не найден'];
		$tasks[7] = ['8', 'Какие данные пользователя сайта из перечисленных можно считать на 100% достоверными: cookie, данные сессии, IP-адрес пользователя , User-Agent? Почему?', '', 'Можно доверять только данным сессии <br>
			Данные из суперглобального массива - на сервере, которые пользователю не доступны. <br>
			Только идентификатор сессии доступен пользователю <br>
			Остальные 3 происходят на клиентской части <br>
			Cookies <br>
			Могут быть подменены, достоверными считать нельзя <br>
			IP <br>
			Можно удостовериться реален ли узел,но не в том что он конечный <br>
			User-Agent <br>
			Также можно подменить <br>
			https://chrome.google.com/webstore/detail/random-user-agent/einpaelgookohagofgnnkcfjbkkgepnp?hl=ru'];
		$tasks[8] = ['9', 'Что выведет следующий код на JavaScript и почему:
				for( var i =0; i < 10; i++){ <br>
				setTimeout(function () { <br>
				console.log(i); <br>
				}, 100); <br>
				}', 'for( var i = 0; i < 10; i++){
					setTimeout(function()
					{
						console.log(i);
					}, 100);
				}', 'Выведет 10, setTimeout работает асинхронно с циклом. setTimeout действует только по отношению к функции, которая в нем указана. Цикл же за эту паузу успеет выполнить свои итерации'];

		// task 10.1
		$tasks[9] = ['10.1', 'В базе данных хранится список мероприятий (таблица events) и список заявок на покупку билетов на указанные мероприятия (таблица bids). <br> Сделать скрипты для подготовки базы данных(миграции)
			<img src="BD.png">','','Так как используется фреймворк Lareval то достаточно использовать команды <br> php artisan migrate <br> 
			php artisan serve'];

		//task 10.2
		$result = \DB::select('SELECT name FROM bids WHERE price = (SELECT MAX(price) FROM bids)');
		$maxPriceName = $result[0]->name;
		$tasks[10] = [
			'10.2',
			'Напишите запрос, который выберет имя пользователя (bids.name) с самой высокой ценой заявки (bids.price)',
			'$result = \DB::select(\'SELECT name FROM bids WHERE price = (SELECT MAX(price) FROM bids)\'); <br> $maxPriceName = $result[0]->name; 
			<br> echo $maxPriceName;',
			 $maxPriceName
		];

		//task 10.3
		$result = \DB::select('SELECT DISTINCT caption FROM events,bids WHERE events.id != bids.id_event');
		$captionNoBids = $result[0]->caption;
		$tasks[11] = [
			'10.3',
			'Напишите запрос, который выберет название мероприятия (events.caption), по которому нет заявок',
			'$result = \DB::select(\'SELECT DISTINCT caption FROM events,bids WHERE events.id != bids.id_event\');<br>$captionNoBids = $result[0]->caption;<br>$captionNoBids;',
			$captionNoBids
		];

		// task 10.4
		$result = \DB::select('SELECT caption FROM events,bids WHERE bids.id_event > 3');
		if (empty($result)) $result = 'Empty set';
		$tasks[12] = [
			'10.4',
			'Напишите запрос, который выберет название мероприятия (events.caption), по которому больше трех заявок',
			'$result = \DB::select(\'SELECT caption FROM events,bids WHERE bids.id_event > 3\'); <br>if (empty($result)) $result = \'Empty set\'; <br> echo $result;',
			$result
		];

		//task 10.5
		$result = \DB::select('SELECT Max(caption) FROM events,bids WHERE events.id = bids.id_event');
		$result = $result[0]->{'Max(caption)'};
		$tasks[13] = [
			'10.5',
			'Напишите запрос, который выберет название мероприятия (events.caption), по которому больше всего заявок',
			'$result = \DB::select(\'SELECT Max(caption) FROM events,bids WHERE events.id = bids.id_event\'); <br> $result = $result[0]->{\'Max(caption)\'}; <br> echo $result;',
			$result
		];

		foreach ($tasks as $task) {
			\DB::table('tasks')->insert(
			    [
			    	'id' => $task[0],
			   	 	'task' => $task[1],
			   	 	'code' => $task[2],
			   	 	'result' => $task[3]
				]
			);
		}

		


    }
}

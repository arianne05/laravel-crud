<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    @vite('resources/css/app.css')
    <title>Student List</title>
</head>
<body>
    <h1 class="text-3xl font-bold underline">
        Hello world!
    </h1>
    
    <h1>List of Student</h1>
    @foreach ($counts as $count)
        <p><b>{{$count->gender}}</b> {{$count->gender_count}}</p>
    @endforeach

    <ul>
        @foreach ($students as $student)  
            <li>{{ $student->first_name.' '.$student->last_name}} | Age: {{ $student->age }}</li>
        @endforeach
    </ul>
</body>
</html>
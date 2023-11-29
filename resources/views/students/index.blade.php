{{-- @include('partials.header', ['title'=>'Header']) <!--NOTE: Calling a partial and you can passed an argument in an array like this--> --}}
@include('partials.header')

    {{-- Navbar --}}
    {{-- components with passing of arguments --}}
    {{--  
    <?php //$array=array('title' => 'Student System Online');?>
    <x-nav :data="$array" /> <!--use of components-->
    --}}
    
    {{-- Components --}}
    <x-nav />
    <x-messages /> {{--flash session--}}
    
    <header class="max-w-1g max-auto mt-5">
        <a href="#">
            <h1 class="text-4xl font-bold text-white text-center">Student List</h1>
        </a>
    </header>    

    <section class="mt-10">
        <x-messages />
        <div class="overflow-x-auto relative">
            <table class="w-96 mx-auto text-sm text-left text-gray-500">
                <thead class="text-xs text gray-700 uppercase bg-gray-50">
                    <tr>
                        <th scope="col" class="py-3 px-6">First Name</th>
                        <th scope="col" class="py-3 px-6">Last Name</th>
                        <th scope="col" class="py-3 px-6">Email</th>
                        <th scope="col" class="py-3 px-6">Age</th>
                    </tr>
                </thead>

                <tbody>
                    @foreach ($students as $student)  
                        <tr class="bg-gray-800 border-b text-white">
                            <td class="py-4 px-6">{{$student->first_name}}</td>
                            <td class="py-4 px-6">{{$student->last_name}}</td>
                            <td class="py-4 px-6">{{$student->email}}</td>
                            <td class="py-4 px-6">{{$student->age}}</td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </section>

@include('partials.footer') <!--Calling a partial-->


{{-- SAMPLE TEST ON HOW TO ACCESS DATA FROM DATABASE
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


 --}}
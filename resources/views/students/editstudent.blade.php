@include('partials.header', [$title])

    <header class="max-w-1g max-auto mt-10">
        <a href="#">
            <h1 class="text-4xl font-bold text-white text-center">Edit {{$student->first_name}} {{$student->last_name}}</h1>
        </a>
    </header>

    <main class="bg-white max-w-lg mx-auto p-8 my-10 rounded-lg shadow-2x1">
        
        <section class="mt-10">

            <form action="/viewstudent/{{$student->id}}" method="POST" class="flex flex-col"> <!--process within the same oage-->
                @method('PUT') {{--override method to used in edit data--}}
                @csrf
                <div class="mb-6 pt-3 rounded bg-gray-200">
                    <label for="first_name" class="block text-gray-700 text-sm font-bold mb-2 ml-3">Firstname</label>
                    <input type="text" name="first_name" value="{{$student->first_name}}" class="bg-gray-200 rounded w-full text-gray-700 focus:outline-none border-b-4 border-gray-400 px-3">
                    @error('first_name')
                        <p class="text-red-500 text-xs p-2">
                            {{$message}}
                        </p>
                    @enderror   
                </div>

                <div class="mb-6 pt-3 rounded bg-gray-200">
                    <label for="last_name" class="block text-gray-700 text-sm font-bold mb-2 ml-3">Lastname</label>
                    <input type="text" name="last_name" value="{{$student->last_name}}" class="bg-gray-200 rounded w-full text-gray-700 focus:outline-none border-b-4 border-gray-400 px-3">
                    @error('last_name')
                        <p class="text-red-500 text-xs p-2">
                            {{$message}}
                        </p>
                    @enderror   
                </div>

                <div class="mb-6 pt-3 rounded bg-gray-200">
                    <label for="gender" class="block text-gray-700 text-sm font-bold mb-2 ml-3">Gender</label>
                    <select type="text" name="gender" value="{{old('gender')}}" class="bg-gray-200 rounded w-full text-gray-700 focus:outline-none border-b-4 border-gray-400 px-3">
                        <option value="" {{$student->gender =="" ? 'selected':''}}></option>
                        <option value="Male" {{$student->gender =="Male" ? 'selected':''}}>Male</option>
                        <option value="Female" {{$student->gender =="Female" ? 'selected':''}}>Female</option>
                    </select>
                    @error('gender')
                        <p class="text-red-500 text-xs p-2">
                            {{$message}}
                        </p>
                    @enderror   
                </div>

                <div class="mb-6 pt-3 rounded bg-gray-200">
                    <label for="age" class="block text-gray-700 text-sm font-bold mb-2 ml-3">Age</label>
                    <input type="number" name="age" value="{{$student->age}}" class="bg-gray-200 rounded w-full text-gray-700 focus:outline-none border-b-4 border-gray-400 px-3">
                    @error('age')
                        <p class="text-red-500 text-xs p-2">
                            {{$message}}
                        </p>
                    @enderror   
                </div>

                <div class="mb-6 pt-3 rounded bg-gray-200">
                    <label for="email" class="block text-gray-700 text-sm font-bold mb-2 ml-3">Email</label>
                    <input type="email" name="email" value="{{$student->email}}" class="bg-gray-200 rounded w-full text-gray-700 focus:outline-none border-b-4 border-gray-400 px-3">
                    @error('email')
                        <p class="text-red-500 text-xs p-2">
                            {{$message}}
                        </p>
                    @enderror   
                </div>
                
                <button type="submit" class="bg-purple-600 hover:bg-purple-700 text-white font-bold py-2 rounded shadow-lg hover:shadow-xl transition duration-200">
                    Save Changes
                </button>
            </form>

            <form action="/viewstudent/{{$student->id}}" method="POST">
                @method('delete')
                @csrf
                <button type="submit" class="w-full mt-2 bg-red-600 hover:bg-red-700 text-white font-bold py-2 rounded shadow-lg hover:shadow-xl transition duration-200">
                    Delete
                </button>
            </form>

        </section>
    </main>

@include('partials.footer')
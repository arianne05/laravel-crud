@include('partials.header', [$title])

    <header class="max-w-1g max-auto mt-10">
        <a href="#">
            <h1 class="text-4xl font-bold text-white text-center">Add New Student</h1>
        </a>
    </header>

    <main class="bg-white max-w-lg mx-auto p-8 my-10 rounded-lg shadow-2x1">
        
        <section class="mt-10">

            <form action="/process_signin" method="POST" class="flex flex-col">
                @csrf
                <div class="mb-6 pt-3 rounded bg-gray-200">
                    <label for="first_name" class="block text-gray-700 text-sm font-bold mb-2 ml-3">Firstname</label>
                    <input type="text" name="first_name" class="bg-gray-200 rounded w-full text-gray-700 focus:outline-none border-b-4 border-gray-400 px-3">
                </div>

                <div class="mb-6 pt-3 rounded bg-gray-200">
                    <label for="last_name" class="block text-gray-700 text-sm font-bold mb-2 ml-3">Lastname</label>
                    <input type="text" name="last_name" class="bg-gray-200 rounded w-full text-gray-700 focus:outline-none border-b-4 border-gray-400 px-3">
                </div>

                <div class="mb-6 pt-3 rounded bg-gray-200">
                    <label for="gender" class="block text-gray-700 text-sm font-bold mb-2 ml-3">Gender</label>
                    <select type="text" name="gender" class="bg-gray-200 rounded w-full text-gray-700 focus:outline-none border-b-4 border-gray-400 px-3">
                        <option value=""></option>
                        <option value="Male">Male</option>
                        <option value="Female">Female</option>
                    </select>
                </div>

                <div class="mb-6 pt-3 rounded bg-gray-200">
                    <label for="age" class="block text-gray-700 text-sm font-bold mb-2 ml-3">Age</label>
                    <input type="number" name="age" class="bg-gray-200 rounded w-full text-gray-700 focus:outline-none border-b-4 border-gray-400 px-3">
                </div>

                <div class="mb-6 pt-3 rounded bg-gray-200">
                    <label for="email" class="block text-gray-700 text-sm font-bold mb-2 ml-3">Email</label>
                    <input type="email" name="email" value="{{old('email')}}" class="bg-gray-200 rounded w-full text-gray-700 focus:outline-none border-b-4 border-gray-400 px-3">
                </div>

                <div class="mb-6 pt-3 rounded bg-gray-200">
                    <label for="password" class="block text-gray-700 text-sm font-bold mb-2 ml-3">Password</label>
                    <input type="password" name="password" class="bg-gray-200 rounded w-full text-gray-700 focus:outline-none border-b-4 border-gray-400 px-3">
                </div>
                
                <button type="submit" class="bg-purple-600 hover:bg-purple-700 text-white font-bold py-2 rounded shadow-lg hover:shadow-xl transition duration-200">
                    Login
                </button>
            </form>
        </section>
    </main>

@include('partials.footer')
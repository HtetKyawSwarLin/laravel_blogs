<x-layout>
    <x-slot name="title">
        <title>Register</title>
    </x-slot>

    <div class="container">
        <div class="row">
            <div class="col-md-5 mx-auto">

                <x-card-wrapper>
                    <h3 class="text-primary text-center">Registration Form</h3>
                    <form method="POST">
                        @csrf
                        <div class="mb-3">
                            <label for="exampleInputEmail1" class="form-label">Name</label>
                            <input type="text" name="name" class="form-control" id="exampleInputEmail1"
                                aria-describedby="emailHelp" value="{{ old('name') }}" required>
                                <x-error name="name"/>
                        </div>
                        <div class="mb-3">
                            <label for="exampleInputEmail1" class="form-label">User Name</label>
                            <input type="text" name="username" value="{{ old('username') }}" class="form-control"
                                id="exampleInputEmail1" aria-describedby="emailHelp" required>
                                <x-error name="username"/>
                        </div>
                        <div class="mb-3">
                            <label for="exampleInputEmail1" class="form-label">Email address</label>
                            <input type="email" name="email" value="{{ old('email') }}" class="form-control"
                                id="exampleInputEmail1" aria-describedby="emailHelp" required>
                                <x-error name="email"/>
                        </div>
                        <div class="mb-3">
                            <label for="exampleInputPassword1" class="form-label">Password</label>
                            <input type="password" name="password" class="form-control" id="exampleInputPassword1" required>
                            <x-error name="password"/>
                        </div>
                        <button type="submit" class="btn btn-primary">Submit</button>
                    </form>
                </x-card-wrapper>
            </div>
        </div>
    </div>

</x-layout>

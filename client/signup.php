<div class="container">

    <!-- Page Heading -->
    <h1 class="text-center mb-4">Signup</h1>

    <!-- Form for user registration -->
    <form action="/PHPxampp/Discuss/server/requests.php" method="POST" novalidate>

        <!-- Username Field -->
        <div class="col-6 offset-sm-3 mb-3">
            <label for="username" class="form-label">User Name</label>
            <input 
                type="text" 
                name="username" 
                class="form-control" 
                id="username" 
                placeholder="Enter User Name"
                required
            >
        </div>

        <!-- Email Field -->
        <div class="col-6 offset-sm-3 mb-3">
            <label for="email" class="form-label">User Email</label>
            <input 
                type="email" 
                name="email" 
                class="form-control" 
                id="email" 
                placeholder="Enter User Email"
                required
            >
        </div>

        <!-- Password Field -->
        <div class="col-6 offset-sm-3 mb-3">
            <label for="password" class="form-label">User Password</label>
            <input 
                type="password" 
                name="password" 
                class="form-control" 
                id="password" 
                placeholder="Enter User Password"
                required
                minlength="5"
            >
        </div>

        <!-- Address Field -->
        <div class="col-6 offset-sm-3 mb-3">
            <label for="address" class="form-label">User Address</label>
            <input 
                type="text" 
                name="address" 
                class="form-control" 
                id="address" 
                placeholder="Enter User Address"
                required
            >
        </div>

        <!-- Submit Button -->
        <div class="col-6 offset-sm-3 mb-3 text-center">
            <button type="submit" name="signup" class="btn btn-secondary px-4">
                Sign Up
            </button>
        </div>

    </form>

</div>

<div class="container">

    <!-- Page Heading -->
    <h1 class="text-center mb-4">Login</h1>

    <!-- Form submits to requests.php via POST -->
    <form action="/PHPxampp/Discuss/server/requests.php" method="POST">

        <!-- Email Input Field -->
        <div class="col-6 offset-sm-3 mb-3">
            <label for="email" class="form-label">User Email</label>
            <input
                type="text"
                name="email"
                class="form-control"
                id="email"
                placeholder="Enter User Email"
                required>
        </div>

        <!-- Password Input Field -->
        <div class="col-6 offset-sm-3 mb-3">
            <label for="password" class="form-label">User Password</label>
            <input 
                type="password"
                name="password"
                class="form-control"
                id="password"
                placeholder="Enter User Password"
                required
                >
        </div>

        <!-- Submit Button -->
        <div class="col-6 offset-sm-3 mb-3 text-center">
            <button type="submit" name="login" class="btn btn-secondary">Login</button>
        </div>

    </form>

</div>
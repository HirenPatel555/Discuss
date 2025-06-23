<div class="container">

    <h1 class="text-center mb-4">Signup</h1>

    <form action="../server/requests.php " method="post">
        <div class="col-6 offset-sm-3 mb-3">
            <label for="username" class="form-label">User Name</label>
            <input type="text" name="username" class="form-control" id="username" placeholder="Enter User Name">
        </div>

        <div class="col-6 offset-sm-3 mb-3">
            <label for="email" class="form-label">User Email</label>
            <input type="text" name="email" class="form-control" id="email" placeholder="Enter User Email">
        </div>

        <div class="col-6 offset-sm-3 mb-3">
            <label for="password" class="form-label">User Password</label>
            <input type="password" name="password" class="form-control" id="password" placeholder="Enter User PassWord">
        </div>

        <div class="col-6 offset-sm-3 mb-3">
            <label for="address" class="form-label">User Address</label>
            <input type="text" name="address" class="form-control" id="address" placeholder="Enter User Address">
        </div>

        <div class="col-6 offset-sm-3 mb-3">
            <button type="submit" name="signup" class="btn btn-primary">Sign Up</button>
        </div>

    </form>

</div>
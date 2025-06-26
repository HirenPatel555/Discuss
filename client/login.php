<div class="container">

    <h1 class="text-center mb-4">Login </h1>

    <form action="/PHPxampp/Discuss/server/requests.php" method="POST">
 
        <div class="col-6 offset-sm-3 mb-3">
            <label for="email" class="form-label">User Email</label>
            <input type="text" name="email" class="form-control" id="email" placeholder="Enter User Email">
        </div>

        <div class="col-6 offset-sm-3 mb-3">
            <label for="password" class="form-label">User Password</label>
            <input type="password" name="password" class="form-control" id="password" placeholder="Enter User PassWord">
        </div>

        <div class="col-6 offset-sm-3 mb-3">
            <button type="submit" name="login" class="btn btn-secondary">Login</button>
        </div>

    </form>


</div>
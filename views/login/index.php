<h2>Authorisation</h2>
<form action="/auth/checkUser" method="post">
    <label for="login">Login</label>
    <input type="text" name="login"
           id="login" placeholder="Enter your login" required>
    <label for="pwd">Password</label>
    <input type="password" name="password" id="pwd" placeholder="Enter your password" required>
    <input type="submit">
</form>
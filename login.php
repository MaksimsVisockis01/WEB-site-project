<!-- section for login -->
<section>
            <h1>Login</h1>
            <form action="includes/login.inc.php" method="POST">
                <div class="txt_field">
                    <input type="text" name="uid" required>
                    <span></span>
                    <label>Username</label>
                </div>
                <div class="txt_field">
                <input type="password" name="pwd" required>
                    <span></span>
                    <label>Password</label>
                </div>
                <button id="loginButton" type="submit" name="submit">Login</button>
            </form>
            
</section>
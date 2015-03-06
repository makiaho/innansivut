<h2>Using The User.</h2>

<p>
User in this case is the instance from the SomeUser class that is put to session. It is the current user, which 
may or may not have logged in.
</p>

<pre>
$user = SomeFactory::getUser();
$role = $user->getUserrole();
if ($role === 'admin') {
    echo "User has role admin";
}
</pre>

<p>

</p>
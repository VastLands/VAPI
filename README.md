# VAPI
VastLands API Wrapper - Written in PHP

#Requirements
PHP >= `7.2`

#How to use? 🎈
Fork/download the `VastLands` namespace, add it to your project, make sure you include it.

Lets' get started now:

```php
 /*
  * The VAPI accepts a user agent parameter, which is required, 
  * Also, ensure it's less or equal to 256 characters
  * Or an exception will be thrown...
  */
  
$api = new VAPI("My amazing application")
```

Now you can make use of the `$api`

```php
 /*
  * The getVProfile accepts the player username as the parameter! 
  */
  
$myProfile = $api->getVProfile("xZeroOfficial");
```

But ***Wait***, before you do anything, let's make sure the username is valid, and exists. 
We've made your job easier by having this useful method you can call.
```php
$myProfile = $api->getVProfile("xZeroOfficial");

if($myProfile->isValid()){
  //Their profile is valid, and exists on VastLands. You may continue!
}
```

Now you can utilize all those juice methods that's within the `VProfile` class,
for a list of methods, check the `VProfile` class. 

#Real Cool Examples💣

Get a player current rank

```php
$api = new VAPI("My amazing application")
$myProfile = $api->getVProfile("xZeroOfficial");

$rank = $myProfile->getRank(); //Now you have their rank!

echo "Your rank is currently " . $rank . " on VastLands!";
```

#Help & inquiries
If you have any questions, or wish to suggest something, open a issue template and we'll get back to you
as soon as possible!
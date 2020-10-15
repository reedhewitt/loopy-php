# Loopy (PHP Version)
**A utility to make common tasks in loops easier and more readable.**

Sometimes in a loop, you need to do something only for the first round or the last round. Or the last round only if there are more than two items. Or for any round that is neither the first nor last. You know how it is.

Loopy is a very simple class that provides a few helper methods.

As an example, suppose you have an array of names and you want to convert them into a comma-separated list with "and" before the last name. And suppose you follow the old-school grammar rules in which you use a comma before "and" in a list of three more more items. You can use Loopy like this:

```php
$name_array = ['Matthew', 'Mark', 'Luke', 'John'];
$name_string = '';

// When initializing Loopy, give it the iterable variable so it can count the items.
$l = new Loopy($name_array)

foreach($name_array as $name){
  // If this is NOT the first loop, we need to insert a comma and/or conjunction.
  if($l->not_first){
    if($l->only(2)){
      // If there are only two names, just insert the conjunction.
      $name_string .= ' and ';
    } elseif($l->more_than(2) && $l->not_last){
      // If there are more than two names, but this is not the last one, insert a comma.
      $name_string .= ', ';
    } else {
      // Otherwise, this must be the last item in a list of three or more. Insert comma and conjunction.
      $name_string .= ', and ';
    }
  }
  
  // Concat the name.
  $name_string .= $name;
  
  // At the end of each loop, you must call the next() method to make Loopy update its internal properties.
  $l->next();
}

echo $name_string; // Will produce: "Matthew, Mark, Luke, and John"
```

You can probably get the gist of Loopy's capabilities by browsing the souce code (it's only 50 lines), but here's a quick reference of available properties and methods.

## Properties
`first`: Boolean for whether you are in the first iteration of the loop.

`not_first`: Boolean, opposite of `first`.

`last`: Boolean for whether you are in the last iteration of the loop.

`not_last`: Boolean, opposite of `last`.

`middle`: Boolean for whether you are betwee the first and the last.

## Methods
`only($n)`: Returns a boolean for whether the total number of loops is equal to `$n`.

`more_than($n)`: Returns a boolean for whether the total number of loops is greater than `$n`.

`less_than($n)`: Returns a boolean for whether the total number of loops is less than `$n`.

`next()`: This method must be called at the end of each loop to make Loopy update its internal properties and get ready for the next loop.
